<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\EmailVerification;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->is_admin) {
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Please login via the admin panel.',
                ], 403);
            }

            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'redirect' => route('dashboard'),
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'The provided credentials do not match our records.',
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Send email verification link to the authenticated user.
     */
    public function sendVerificationEmail(Request $request)
    {
        $user = Auth::user();

        if ($user->email_verified_at) {
            return response()->json([
                'success' => false,
                'message' => 'Your email is already verified.',
            ]);
        }

        // Generate a secure token and store it
        $token = Str::random(64);
        $user->email_verification_token = $token;
        $user->save();

        try {
            Mail::to($user->email)->send(new EmailVerification($user));

            return response()->json([
                'success' => true,
                'message' => 'Verification email sent! Please check your inbox.',
            ]);
        } catch (\Exception $e) {
            \Log::error('Email verification send failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Please try again later.',
            ], 500);
        }
    }

    /**
     * Verify the email using the token from the link.
     */
    public function verifyEmail(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        if (!$token || !$email) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }

        $user = User::where('email', $email)
                    ->where('email_verification_token', $token)
                    ->first();

        if (!$user) {
            return view('email-verified', [
                'success' => false,
                'message' => 'Invalid or expired verification link. Please request a new one from your dashboard.',
            ]);
        }

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return view('email-verified', [
            'success' => true,
            'message' => 'Your email has been verified successfully! You are now fully visible to other members.',
            'userName' => $user->name,
        ]);
    }
}
