@extends('layouts.dashboard')
@section('title', 'My Bookings | Soulmate India')
@section('content')
            <div class="middle-col" style="padding: 30px; width: 100%;">
        <div class="page-header">
          <div class="page-title">
            <h1>
              <svg width="24" height="24" fill="none" stroke="#E91E63" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
              My Bookings
            </h1>
            <p>View your past and upcoming bookings.</p>
          </div>
        </div>

        <div class="card">
          @if($bookings->isEmpty())
            <p style="color:#64748B; font-size: 14px;">You have no bookings yet.</p>
          @else
            <div style="overflow-x: auto;">
              <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="border-bottom:1px solid #E2E8F0;">
                  <tr>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Date</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Partner</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Service</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Amount</th>
                    <th style="color:#64748B; font-weight:600; font-size:14px; padding: 12px 8px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($bookings as $b)
                  <tr style="border-bottom:1px solid #F1F5F9;">
                    <td style="color:#1E293B; font-size:14px; padding:16px 8px;">
                      <strong>{{ date('d M, Y', strtotime($b->booking_date)) }}</strong><br>
                      <span style="color:#64748B; font-size:12px;">{{ date('h:i A', strtotime($b->booking_time)) }}</span>
                    </td>
                    <td style="color:#1E293B; font-size:14px; font-weight:600; padding:16px 8px;">
                        <a href="{{ route('partners.profile', $b->partner->profile_id ?? '') }}" style="color: #E91E63; text-decoration: none;">
                            {{ $b->partner->name ?? 'N/A' }}
                        </a>
                    </td>
                    <td style="color:#64748B; font-size:14px; padding:16px 8px;">{{ $b->category->name ?? 'Service' }}</td>
                    <td style="color:#1E293B; font-size:14px; font-weight:600; padding:16px 8px;">₹{{ number_format($b->amount, 0) }}</td>
                    <td style="padding:16px 8px;">
                      @if($b->status === 'pending')
                        <span style="background:#FEF3C7; color:#D97706; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Pending</span>
                      @elseif($b->status === 'confirmed')
                        <span style="background:#D1FAE5; color:#059669; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Confirmed</span>
                      @elseif($b->status === 'completed')
                        <span style="background:#E0E7FF; color:#4338CA; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Completed</span>
                      @else
                        <span style="background:#FEE2E2; color:#DC2626; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600;">Cancelled</span>
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
