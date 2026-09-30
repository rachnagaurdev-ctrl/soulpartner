@extends('layouts.dashboard')
@section('title', 'Salary & Targets | Soulmate India')
@section('content')

<div class="middle-col">
  <div class="page-header">
    <div class="page-title">
      <h1>
        <svg width="24" height="24" fill="none" stroke="#E91E63" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Salary & Targets
      </h1>
      <p>Manage your salary requests and track your targets</p>
    </div>
  </div>

  @if(session('success'))
    <div class="alert-success" style="background-color: #DEF7EC; color: #03543F; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #31C48D;">
      {{ session('success') }}
    </div>
  @endif
  @if(session('error'))
    <div class="alert-success" style="background-color: #FDE8E8; color: #9B1C1C; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #F8B4B4;">
      {{ session('error') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
      Request Salary Structure
    </div>
    
    <form action="{{ route('dashboard.salary.request') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Select Preferred Salary Structure</label>
            <select name="request_type" class="form-control" required>
                <option value="monthly_payroll">Monthly Payroll (Target Based)</option>
                <option value="per_booking">Per Booking Commission</option>
            </select>
        </div>
        <div class="form-actions" style="margin-top: 15px;">
            <button type="submit" class="btn-save">Send Request to Admin</button>
        </div>
    </form>
  </div>

  <div class="card">
    <div class="card-header">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
      Your Requests History
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
            <thead>
                <tr style="border-bottom: 1px solid #E2E8F0; color: #64748B;">
                    <th style="padding: 12px 10px;">Date</th>
                    <th style="padding: 12px 10px;">Type</th>
                    <th style="padding: 12px 10px;">Status</th>
                    <th style="padding: 12px 10px;">Notes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salaryRequests as $req)
                <tr style="border-bottom: 1px solid #F1F5F9;">
                    <td style="padding: 12px 10px;">{{ $req->created_at->format('d M Y') }}</td>
                    <td style="padding: 12px 10px;">
                        {{ $req->request_type === 'monthly_payroll' ? 'Monthly Payroll' : 'Per Booking' }}
                    </td>
                    <td style="padding: 12px 10px;">
                        @if($req->status === 'pending')
                            <span style="background: #FFFBEB; color: #D97706; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Pending</span>
                        @elseif($req->status === 'approved')
                            <span style="background: #DEF7EC; color: #03543F; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Approved</span>
                        @else
                            <span style="background: #FDE8E8; color: #9B1C1C; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Rejected</span>
                        @endif
                    </td>
                    <td style="padding: 12px 10px;">{{ $req->admin_notes ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 20px; text-align: center; color: #94A3B8;">No requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
