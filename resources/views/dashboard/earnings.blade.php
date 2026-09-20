@extends('layouts.dashboard')
@section('title', 'Earnings | Soulmate India')
@section('content')
            <div class="middle-col" style="padding: 30px; width: 100%;">
        <div class="page-header">
          <div class="page-title">
            <h1>
              <svg width="24" height="24" fill="none" stroke="#E91E63" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              Earnings & Wallet
            </h1>
            <p>View your earnings and request withdrawals.</p>
          </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="background-color: #FEE2E2; color: #991B1B; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #F87171;">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div style="background-color: #FEE2E2; color: #991B1B; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #F87171;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
          <div class="card">
            <h5 style="color:#64748B; font-size:14px; text-transform:uppercase; font-weight:600; margin-bottom:10px;">Available Balance</h5>
            <h2 style="color:#E91E63; font-size:36px; font-weight:700; margin-bottom:0; margin-top:0;">₹{{ number_format($user->wallet_balance, 2) }}</h2>
          </div>
          <div class="card">
            <h5 style="color:#64748B; font-size:14px; text-transform:uppercase; font-weight:600; margin-bottom:10px;">Your Referral Code</h5>
            <div style="background:#F1F5F9; padding:12px; border-radius:8px; display:flex; align-items:center; justify-content:space-between;">
              <span style="font-size:20px; font-weight:700; color:#1E293B; letter-spacing:1px;">{{ $user->referral_code }}</span>
              <button onclick="navigator.clipboard.writeText('{{ $user->referral_code }}'); alert('Copied!');" style="border:none; background:#E91E63; color:#fff; border-radius:6px; padding:6px 12px; font-size:12px; font-weight:600; cursor:pointer;">Copy</button>
            </div>
            <p style="font-size:12px; color:#64748B; margin-top:10px; margin-bottom:0;">Earn ₹100 for every successful registration with your code!</p>
          </div>
        </div>

        <div class="card" style="margin-bottom: 30px;">
          <h4 style="font-size:18px; font-weight:600; color:#1E293B; margin-bottom:20px; margin-top:0;">Request Withdrawal</h4>
          <form action="{{ route('dashboard.withdraw') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
              <div class="form-group" style="margin-bottom:0;">
                <label style="font-size:14px; font-weight:500; color:#334155; margin-bottom:8px;">Amount (Min. ₹500)</label>
                <input type="number" name="amount" min="500" style="width: 100%; border-radius:8px; border:1px solid #E2E8F0; padding:12px;" required>
              </div>
              <div class="form-group" style="margin-bottom:0;">
                <label style="font-size:14px; font-weight:500; color:#334155; margin-bottom:8px;">Account Details (Bank/UPI)</label>
                <input type="text" name="account_details" style="width: 100%; border-radius:8px; border:1px solid #E2E8F0; padding:12px;" placeholder="UPI ID or Bank Acct No." required>
              </div>
            </div>
            <div>
              <button type="submit" class="btn-save" style="margin-top: 10px;">Submit Request</button>
            </div>
          </form>
        </div>

        <div class="card">
          <h4 style="font-size:18px; font-weight:600; color:#1E293B; margin-bottom:20px; margin-top:0;">Withdrawal History</h4>
          @if($withdrawals->isEmpty())
            <p style="color:#64748B; font-size: 14px;">No withdrawal requests found.</p>
          @else
            <div style="overflow-x: auto;">
              <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="border-bottom:1px solid #E2E8F0;">
                  <tr>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Date</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Amount</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Details</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($withdrawals as $w)
                  <tr style="border-bottom:1px solid #F1F5F9;">
                    <td style="color:#1E293B; font-size:14px; padding:16px 8px;">{{ $w->created_at->format('M d, Y') }}</td>
                    <td style="color:#1E293B; font-size:14px; font-weight:600; padding:16px 8px;">₹{{ number_format($w->amount, 2) }}</td>
                    <td style="color:#64748B; font-size:14px; padding:16px 8px;">{{ $w->account_details }}</td>
                    <td style="padding:16px 8px;">
                      @if($w->status === 'pending')
                        <span style="background:#FEF3C7; color:#D97706; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Pending</span>
                      @elseif($w->status === 'approved')
                        <span style="background:#D1FAE5; color:#059669; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Approved</span>
                      @else
                        <span style="background:#FEE2E2; color:#DC2626; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Rejected</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>

      </div>
    </div>
  </div>

@endsection
