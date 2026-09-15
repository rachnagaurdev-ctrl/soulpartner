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
        return view('dashboard.earnings', compact('user', 'withdrawals'));
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'amount' => 'required|numeric|min:500',
            'account_details' => 'required|string|max:500',
        ]);

        if ($user->wallet_balance < $request->amount) {
            return back()->with('error', 'Insufficient wallet balance.');
        }

        // Deduct from wallet immediately
        $user->wallet_balance -= $request->amount;
        $user->save();

        // Create withdrawal request
        $user->withdrawals()->create([
            'amount' => $request->amount,
            'account_details' => $request->account_details,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Withdrawal request submitted successfully.');
    }
}
