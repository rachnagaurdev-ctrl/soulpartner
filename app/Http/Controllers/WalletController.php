<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WithdrawalRequest;

class WalletController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $withdrawals = $user->withdrawals()->orderBy('created_at', 'desc')->get();
        $transactions = \App\Models\WalletTransaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $minWithdraw = \App\Models\Setting::get('min_withdraw_amount', 500);
        return view('dashboard.earnings', compact('user', 'withdrawals', 'transactions', 'minWithdraw'));
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        $minWithdraw = \App\Models\Setting::get('min_withdraw_amount', 500);
        
        $request->validate([
            'amount' => 'required|numeric|min:' . $minWithdraw,
            'account_details' => 'required|string|max:100',
        ]);

        if ($user->wallet_balance < $request->amount) {
            return back()->with('error', 'Insufficient wallet balance.');
        }

        $upiId = $request->account_details;
        
        try {
            // Deduct from wallet immediately
            $user->wallet_balance -= $request->amount;
            $user->save();
            
            // Create withdrawal request
            $user->withdrawals()->create([
                'amount' => $request->amount,
                'account_details' => $upiId,
                'status' => 'pending',
            ]);

            \App\Models\WalletTransaction::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'type' => 'debit',
                'description' => "Withdrawal request via UPI: {$upiId}",
            ]);

            return back()->with('success', 'Withdrawal request submitted successfully! Pending admin approval.');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Withdrawal Request Error: ' . $e->getMessage());
            return back()->with('error', 'Error processing withdrawal request. Please try again.');
        }
    }
}
