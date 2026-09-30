@extends('layouts.dashboard')
@section('title', 'Customer Dashboard | Soulmate India')
@section('content')
@section('styles')
<style>
    .content-area {
      padding: 30px;
    }
    .welcome-banner {
      background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E1 100%);
      border-radius: 15px;
      padding: 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      position: relative;
    }
    .welcome-text h1 {
      margin: 0 0 10px 0;
      color: #2D3748;
      font-size: 24px;
    }
    .welcome-text p {
      margin: 0;
      color: #718096;
    }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-bottom: 30px;
    }
    .stat-card {
      background: #FFF;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.03);
      text-align: center;
    }
    .stat-value {
      font-size: 28px;
      font-weight: 700;
      color: #2D3748;
      margin: 10px 0;
    }
    .stat-label {
      color: #718096;
      font-size: 14px;
    }

    /* ── Target Highlight ───────────────────────────────── */
    .target-highlight {
        background: linear-gradient(135deg, #1e293b, #0f172a);
        border-radius: 18px;
        padding: 24px;
        margin-bottom: 30px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: center;
        justify-content: space-between;
        color: #fff;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.2);
        position: relative;
        overflow: hidden;
    }
    .target-highlight::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 250px; height: 100%;
        background: radial-gradient(circle at right, rgba(233,30,99,0.2), transparent 70%);
    }
    .target-highlight.target-met {
        background: linear-gradient(135deg, #059669, #047857);
    }
    .target-highlight.target-met::before {
        background: radial-gradient(circle at right, rgba(255,255,255,0.2), transparent 70%);
    }
    .target-info h3 {
        margin: 0 0 6px 0;
        font-size: 20px;
        font-weight: 800;
    }
    .target-info p {
        margin: 0;
        color: rgba(255,255,255,0.8);
        font-size: 14px;
    }
    .target-stats {
        flex: 1;
        min-width: 250px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        z-index: 1;
    }
    .target-numbers {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        font-weight: 600;
    }
    .completed-num {
        color: #fce7f3;
        font-size: 18px;
        font-weight: 800;
    }
    .target-highlight.target-met .completed-num { color: #fff; }
    .progress-bar-container {
        height: 8px;
        background: rgba(255,255,255,0.15);
        border-radius: 10px;
        overflow: hidden;
    }
    .progress-bar {
        height: 100%;
        background: #E91E63;
        border-radius: 10px;
        transition: width 0.5s ease-out;
    }
    .target-highlight.target-met .progress-bar {
        background: #fff;
    }
    .target-badge {
        align-self: flex-start;
        background: #fff;
        color: #047857;
        font-weight: 700;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 50px;
        margin-top: 4px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    /* ── Dashboard Layout ───────────────────────────────── */
    .dashboard-layout {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }
    @media(max-width: 992px) {
        .dashboard-layout { grid-template-columns: 1fr; }
    }
    
    .upcoming-bookings-panel {
        background: #fff;
        border-radius: 15px;
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        height: 100%;
    }
    .upcoming-bookings-panel h3 {
        margin: 0 0 20px 0;
        font-size: 18px;
        color: #1E293B;
        font-weight: 700;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .upcoming-bookings-panel h3 a {
        font-size: 13px;
        color: #E91E63;
        text-decoration: none;
        font-weight: 600;
    }
    .up-booking-card {
        border: 1px solid #F1F5F9;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 16px;
        display: flex;
        gap: 12px;
        align-items: flex-start;
        transition: transform .2s;
    }
    .up-booking-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.04); }
    .up-booking-card img {
        width: 45px; height: 45px;
        border-radius: 10px;
        object-fit: cover;
    }
    .up-bk-info h4 { margin: 0 0 4px 0; font-size: 14px; color: #1E293B; font-weight: 700; }
    .up-bk-info p { margin: 0; font-size: 12px; color: #64748B; display: flex; align-items: center; gap: 4px; }
    .up-bk-info .status-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 700;
        margin-top: 6px;
        text-transform: uppercase;
    }
    .up-bk-info .status-badge.confirmed, .up-bk-info .status-badge.upcoming { background: #DCFCE7; color: #059669; }
    .up-bk-info .status-badge.pending { background: #FEF3C7; color: #D97706; }
</style>
@endsection

    <div class="content-area">

@php
    $user = Auth::user();
    $completedBookings = \App\Models\Booking::where(function($query) use ($user) {
        $query->where('user_id', $user->id)->orWhere('partner_id', $user->id);
    })->where('status', 'completed')->count();

    $upcomingBookings = \App\Models\Booking::where(function($query) use ($user) {
        $query->where('user_id', $user->id)->orWhere('partner_id', $user->id);
    })->whereIn('status', ['upcoming', 'confirmed', 'pending'])->count();

    $isPartner = in_array($user->iwantto, ['become', 'both']);

    $isSalaryPartner = false;
    $target = 0;
    $targetCompleted = 0;
    $bonusAmount = 0;
    
    if ($user && in_array($user->iwantto, ['become', 'both'])) {
        $settings = \App\Models\CommissionSetting::first();
        if ($settings) {
            if ($user->is_salary_based) {
                $isSalaryPartner = true;
                $target = $settings->default_target;
                $bonusAmount = $settings->salary_target_bonus;
                
                $targetCompleted = \App\Models\Booking::where('partner_id', $user->id)
                    ->where('status', 'completed')
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->count();
            }
        }
    }

    $dashboardUpcomingBookings = \App\Models\Booking::where(function($query) use ($user) {
        $query->where('user_id', $user->id)->orWhere('partner_id', $user->id);
    })->whereIn('status', ['upcoming', 'confirmed', 'pending'])
      ->orderBy('booking_date', 'asc')
      ->orderBy('booking_time', 'asc')
      ->take(3)
      ->get();
@endphp
      <div class="dashboard-layout">
        <div class="dashboard-left">
          <!-- Welcome Banner -->
          <div class="welcome-banner">
            <div class="welcome-text">
              <h1>Hello, {{ $user->name ?? 'User' }} ❤️</h1>
              <p>Good things take time, and the right person is worth the wait.</p>
            </div>
          </div>

          {{-- ── Target Highlight for Salary Partners ── --}}
          @if($isSalaryPartner && $target > 0)
              @php
                  $progressPercent = $target > 0 ? min(100, round(($targetCompleted / $target) * 100)) : 0;
                  $isTargetMet = $targetCompleted >= $target;
              @endphp
              <div class="target-highlight {{ $isTargetMet ? 'target-met' : '' }}">
                  <div class="target-info">
                      <h3>🎯 Monthly Target Progress</h3>
                      <p>Complete <strong>{{ $target }} bookings</strong> this month to receive your ₹{{ number_format($bonusAmount) }} per booking bonus!</p>
                  </div>
                  <div class="target-stats">
                      <div class="target-numbers">
                          <span><span class="completed-num">{{ $targetCompleted }}</span> / {{ $target }} Bookings</span>
                          <span>{{ $progressPercent }}%</span>
                      </div>
                      <div class="progress-bar-container">
                          <div class="progress-bar" style="width: {{ $progressPercent }}%;"></div>
                      </div>
                      @if($isTargetMet)
                          <div class="target-badge">🎉 Target Met! Bonus Active</div>
                      @endif
                  </div>
              </div>
          @endif

          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-value">₹{{ number_format($user->wallet_balance ?? 0) }}</div>
              <div class="stat-label">Wallet Balance</div>
            </div>
            <div class="stat-card">
              <div class="stat-value">{{ $completedBookings }}</div>
              <div class="stat-label">Completed Bookings</div>
            </div>
            <div class="stat-card">
              <div class="stat-value">{{ $upcomingBookings }}</div>
              <div class="stat-label">Upcoming/Pending</div>
            </div>
            <div class="stat-card" style="text-align: left;">
              <div class="stat-label">Membership</div>
              <div class="stat-value" style="font-size: 18px;">{{ $user->is_active ? 'Active' : 'Inactive' }}</div>
              <button style="border: 1px solid #E91E63; color: #E91E63; background: none; padding: 5px 15px; border-radius: 15px; margin-top: 10px;">Manage Plan</button>
            </div>
          </div>
        </div>

        <div class="dashboard-right">
            <div class="upcoming-bookings-panel">
                <h3>Current & Upcoming Bookings <a href="{{ route('dashboard.bookings') }}">View All</a></h3>
                
                @forelse($dashboardUpcomingBookings as $bk)
                    @php
                        $isMyBooking = $bk->partner_id == $user->id;
                        $otherPerson = $isMyBooking ? $bk->user : $bk->partner;
                    @endphp
                    <div class="up-booking-card">
                        <img src="{{ $otherPerson->profile_image ? asset('storage/' . $otherPerson->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($otherPerson->name) . '&background=E91E63&color=fff' }}" alt="{{ $otherPerson->name }}">
                        <div class="up-bk-info">
                            <h4>{{ $otherPerson->name }}</h4>
                            <p>
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ \Carbon\Carbon::parse($bk->booking_date)->format('d M, Y') }} at {{ \Carbon\Carbon::parse($bk->booking_time)->format('h:i A') }}
                            </p>
                            <span class="status-badge {{ $bk->status }}">{{ ucfirst($bk->status) }}</span>
                        </div>
                    </div>
                @empty
                    <div style="text-align: center; padding: 30px 10px; color: #94A3B8; font-size: 14px;">
                        No upcoming bookings right now.
                    </div>
                @endforelse
            </div>
        </div>
      </div>
    </div>
  


@endsection
