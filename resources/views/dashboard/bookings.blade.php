@extends('layouts.dashboard')
@section('title', 'My Bookings | Soulmate India')

@section('styles')
<style>
/* ── Reset & base ───────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; }

.middle-col { max-width: 100% !important; padding: 0 0 40px 0; }

/* ── Page header ────────────────────────────────────── */
.bk-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 12px;
}
.bk-header h1 {
    font-size: 26px;
    font-weight: 800;
    color: #1E293B;
    margin: 0 0 4px;
    letter-spacing: -0.5px;
}
.bk-header p { color: #64748B; font-size: 14px; margin: 0; }

.btn-find {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #E91E63, #9c27b0);
    color: #fff;
    border: none;
    padding: 11px 22px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(233,30,99,0.3);
    transition: transform .2s, box-shadow .2s;
    white-space: nowrap;
}
.btn-find:hover { transform: translateY(-2px); box-shadow: 0 10px 24px rgba(233,30,99,0.4); }

/* ── Stat cards ─────────────────────────────────────── */
.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}
@media(max-width:700px){ .stats-row { grid-template-columns: repeat(2,1fr); } }

.stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    border: 1.5px solid #F1F5F9;
    transition: transform .2s, box-shadow .2s;
}
.stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.07); }

.stat-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.stat-card.upcoming  { border-color: #FCE7F3; }
.stat-card.upcoming  .stat-icon { background: linear-gradient(135deg,#FCE7F3,#fdd6ec); color: #E91E63; }
.stat-card.pending   { border-color: #FEF3C7; }
.stat-card.pending   .stat-icon { background: linear-gradient(135deg,#FEF3C7,#fde68a); color: #D97706; }
.stat-card.completed { border-color: #DCFCE7; }
.stat-card.completed .stat-icon { background: linear-gradient(135deg,#DCFCE7,#bbf7d0); color: #10B981; }
.stat-card.cancelled { border-color: #FEE2E2; }
.stat-card.cancelled .stat-icon { background: linear-gradient(135deg,#FEE2E2,#fecaca); color: #EF4444; }

.stat-label { font-size: 12px; color: #94A3B8; font-weight: 600; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 4px; }
.stat-value { font-size: 28px; font-weight: 800; color: #1E293B; line-height: 1; }

/* ── Next booking banner ────────────────────────────── */
.next-booking {
    background: linear-gradient(135deg, #fff, #fdf2f8 70%);
    border: 1.5px solid #FCE7F3;
    border-radius: 18px;
    padding: 22px 24px;
    margin-bottom: 24px;
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap;
    position: relative;
    overflow: hidden;
}
.next-booking::before {
    content: '';
    position: absolute;
    top: -30px; right: -30px;
    width: 150px; height: 150px;
    background: radial-gradient(circle, rgba(233,30,99,.08), transparent 70%);
    pointer-events: none;
}
.next-img-wrap { position: relative; flex-shrink: 0; }
.next-img-wrap img {
    width: 110px; height: 110px;
    border-radius: 14px;
    object-fit: cover;
    border: 3px solid #FCE7F3;
}
.heart-btn {
    position: absolute; top: 7px; right: 7px;
    background: rgba(255,255,255,.85);
    border-radius: 50%; width: 28px; height: 28px;
    display: flex; align-items: center; justify-content: center;
    color: #E91E63;
    border: none; cursor: pointer;
}
.next-content { flex: 1; min-width: 0; }
.next-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: #FCE7F3; color: #E91E63;
    font-size: 10px; font-weight: 800;
    padding: 4px 10px; border-radius: 20px;
    text-transform: uppercase; letter-spacing: .6px;
    margin-bottom: 8px;
}
.next-name {
    font-size: 19px; font-weight: 800; color: #1E293B;
    display: flex; align-items: center; gap: 6px; margin-bottom: 3px;
    flex-wrap: wrap;
}
.verified-chip {
    display: inline-flex; align-items: center; gap: 4px;
    background: #EFF6FF; color: #3B82F6;
    font-size: 11px; font-weight: 600;
    padding: 2px 8px; border-radius: 20px;
}
.next-service { font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 12px; }
.next-meta { display: flex; gap: 16px; flex-wrap: wrap; font-size: 13px; color: #64748B; }
.next-meta span { display: flex; align-items: center; gap: 5px; }

.next-right {
    display: flex; flex-direction: column;
    align-items: flex-end; justify-content: center;
    gap: 12px; flex-shrink: 0;
}
.next-price { font-size: 26px; font-weight: 800; color: #E91E63; }
.next-timing {
    font-size: 11px; font-weight: 700;
    padding: 5px 12px; border-radius: 20px;
    display: flex; align-items: center; gap: 5px;
}
.timing-passed  { background: #FEE2E2; color: #EF4444; }
.timing-today   { background: #FEF3C7; color: #D97706; }
.timing-soon    { background: #DCFCE7; color: #10B981; }
.next-actions { display: flex; gap: 10px; }

.btn-solid {
    background: linear-gradient(135deg, #E91E63, #9c27b0);
    color: #fff; border: none;
    padding: 10px 20px; border-radius: 8px;
    font-size: 13px; font-weight: 700;
    cursor: pointer; transition: transform .15s;
    white-space: nowrap;
}
.btn-solid:hover { transform: translateY(-1px); }
.btn-outline-pink {
    background: #fff; color: #E91E63;
    border: 1.5px solid #E91E63;
    padding: 10px 20px; border-radius: 8px;
    font-size: 13px; font-weight: 700;
    cursor: pointer; transition: background .15s;
    white-space: nowrap;
}
.btn-outline-pink:hover { background: #FDF2F8; }

/* ── Filter bar ─────────────────────────────────────── */
.filters-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    flex-wrap: wrap;
    background: #fff;
    border-radius: 14px;
    border: 1.5px solid #F1F5F9;
    padding: 12px 16px;
}
.filter-search {
    flex: 1; min-width: 200px;
    position: relative;
}
.filter-search svg {
    position: absolute; left: 11px; top: 50%;
    transform: translateY(-50%);
    color: #94A3B8; width: 16px; height: 16px;
    pointer-events: none;
}
.filter-search input {
    width: 100%;
    padding: 9px 12px 9px 34px;
    border: 1.5px solid #E2E8F0;
    border-radius: 8px;
    font-size: 13px; color: #334155;
    outline: none; transition: border-color .2s;
}
.filter-search input:focus { border-color: #E91E63; }

.filter-select {
    padding: 9px 30px 9px 12px;
    border: 1.5px solid #E2E8F0;
    border-radius: 8px;
    font-size: 13px; color: #475569;
    outline: none; cursor: pointer;
    appearance: none;
    background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 8px center;
    min-width: 120px;
    transition: border-color .2s;
}
.filter-select:focus { border-color: #E91E63; }

.sort-wrap { display: flex; align-items: center; gap: 8px; margin-left: auto; white-space: nowrap; }
.sort-label { font-size: 12px; color: #94A3B8; font-weight: 600; text-transform: uppercase; letter-spacing: .4px; }

/* ── Tabs ───────────────────────────────────────────── */
.tabs {
    display: flex; gap: 8px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}
.tab-btn {
    padding: 8px 18px;
    border: 1.5px solid #E2E8F0;
    border-radius: 50px;
    font-size: 13px; font-weight: 600;
    color: #64748B; background: #fff;
    cursor: pointer;
    transition: all .2s;
}
.tab-btn:hover { border-color: #E91E63; color: #E91E63; background: #FDF2F8; }
.tab-btn.active {
    background: linear-gradient(135deg, #E91E63, #9c27b0);
    color: #fff; border-color: transparent;
    box-shadow: 0 4px 12px rgba(233,30,99,.3);
}

/* ── Booking list ───────────────────────────────────── */
.booking-list { display: flex; flex-direction: column; gap: 14px; }

.booking-card {
    background: #fff;
    border-radius: 14px;
    border: 1.5px solid #F1F5F9;
    padding: 18px 20px;
    display: flex;
    gap: 18px;
    align-items: stretch;
    transition: box-shadow .2s, border-color .2s, transform .2s;
}
.booking-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,.07); border-color: #FCE7F3; transform: translateY(-1px); }

.booking-img-wrap { position: relative; flex-shrink: 0; }
.booking-img-wrap img {
    width: 86px; height: 86px;
    border-radius: 10px; object-fit: cover;
    border: 2px solid #F1F5F9;
}
.fav-btn {
    position: absolute; top: 5px; right: 5px;
    background: rgba(255,255,255,.85); border-radius: 50%;
    width: 24px; height: 24px;
    display: flex; align-items: center; justify-content: center;
    color: #E91E63; border: none; cursor: pointer;
}

.booking-body {
    flex: 1; display: flex; gap: 16px;
    flex-wrap: wrap; align-items: stretch;
}

/* Left: partner info */
.booking-partner { flex: 2; min-width: 180px; }
.verified-tag {
    display: inline-flex; align-items: center; gap: 4px;
    color: #10B981; font-size: 11px; font-weight: 700;
    margin-bottom: 4px;
}
.partner-name {
    font-size: 16px; font-weight: 800; color: #1E293B;
    display: flex; align-items: center; gap: 6px;
    margin-bottom: 2px; flex-wrap: wrap;
}
.star-row {
    display: flex; align-items: center; gap: 4px;
    font-size: 12px; color: #64748B; margin-bottom: 8px;
}
.star-row svg { color: #F59E0B; width: 14px; height: 14px; }
.location-row { display: flex; align-items: center; gap: 4px; font-size: 12px; color: #64748B; margin-bottom: 10px; }

.tag-row { display: flex; gap: 7px; flex-wrap: wrap; margin-bottom: 10px; }
.tag {
    display: inline-flex; align-items: center; gap: 4px;
    font-size: 11px; padding: 3px 10px; border-radius: 20px;
    font-weight: 600;
}
.tag-pink  { color: #E91E63; background: #FCE7F3; }
.tag-blue  { color: #3B82F6; background: #DBEAFE; }
.tag-green { color: #10B981; background: #D1FAE5; }

.schedule-row { display: flex; gap: 14px; font-size: 12px; color: #64748B; flex-wrap: wrap; }
.schedule-row span { display: flex; align-items: center; gap: 4px; }

/* Middle: amount & ID */
.booking-meta {
    min-width: 150px; flex: 1;
    display: flex; flex-direction: column; justify-content: center; gap: 4px;
}
.meta-amount { font-size: 18px; font-weight: 800; color: #1E293B; }
.meta-type   { font-size: 12px; color: #94A3B8; margin-bottom: 6px; }
.meta-id-label { font-size: 11px; color: #94A3B8; font-weight: 600; text-transform: uppercase; letter-spacing: .4px; }
.meta-id-val { font-size: 12px; font-weight: 700; color: #334155; font-family: monospace; }

.status-badge {
    display: inline-block; padding: 4px 12px;
    border-radius: 20px; font-size: 11px; font-weight: 700;
    margin-top: 8px; letter-spacing: .3px;
}
.status-confirmed, .status-upcoming { background: #DCFCE7; color: #059669; }
.status-pending   { background: #FEF3C7; color: #D97706; }
.status-completed { background: #E0E7FF; color: #4F46E5; }
.status-cancelled { background: #FEE2E2; color: #DC2626; }

/* Right: actions */
.booking-actions {
    display: flex; flex-direction: column; gap: 8px;
    justify-content: center; min-width: 130px; flex-shrink: 0;
}
.btn-act {
    display: inline-flex; align-items: center; justify-content: center; gap: 6px;
    padding: 8px 14px; border-radius: 8px;
    font-size: 12px; font-weight: 700;
    text-decoration: none; cursor: pointer;
    border: none; transition: all .15s;
    white-space: nowrap;
}
.btn-act-primary { background: linear-gradient(135deg,#E91E63,#9c27b0); color: #fff; box-shadow: 0 3px 10px rgba(233,30,99,.25); }
.btn-act-primary:hover { transform: translateY(-1px); }
.btn-act-pink { background: #fff; color: #E91E63; border: 1.5px solid #FCE7F3; }
.btn-act-pink:hover { background: #FDF2F8; border-color: #E91E63; }
.btn-act-grey { background: #fff; color: #64748B; border: 1.5px solid #E2E8F0; }
.btn-act-grey:hover { background: #F8FAFC; }

/* ── Empty state ────────────────────────────────────── */
.empty-state {
    text-align: center; padding: 60px 30px;
    background: #fff; border-radius: 16px;
    border: 1.5px dashed #E2E8F0;
}
.empty-state h3 { color: #334155; font-size: 18px; margin: 16px 0 8px; }
.empty-state p  { color: #94A3B8; font-size: 14px; margin: 0 0 24px; }

/* ── No results after filter ────────────────────────── */
#no-results {
    display: none;
    text-align: center; padding: 40px 20px;
    background: #fff; border-radius: 14px;
    border: 1.5px dashed #E2E8F0;
    color: #94A3B8; font-size: 14px;
}
</style>
@endsection

@section('content')
@php
    $upcomingCount  = $bookings->whereIn('status', ['upcoming','confirmed'])->count();
    $pendingCount   = $bookings->where('status','pending')->count();
    $completedCount = $bookings->where('status','completed')->count();
    $cancelledCount = $bookings->where('status','cancelled')->count();

    $nextBooking = $bookings
        ->whereIn('status', ['upcoming','confirmed'])
        ->sortBy(fn($b) => \Carbon\Carbon::parse($b->booking_date . ' ' . $b->booking_time))
        ->first();
@endphp

<div class="middle-col">

    {{-- ── Header ── --}}
    <div class="bk-header">
        <div>
            <h1>My Bookings</h1>
            <p>Manage your upcoming, completed and cancelled bookings.</p>
        </div>
        <a href="/partners" class="btn-find">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            Find a Partner
        </a>
    </div>

    {{-- ── Stat cards ── --}}
    <div class="stats-row">
        <div class="stat-card upcoming">
            <div class="stat-icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <div class="stat-label">Upcoming</div>
                <div class="stat-value">{{ $upcomingCount }}</div>
            </div>
        </div>
        <div class="stat-card pending">
            <div class="stat-icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pendingCount }}</div>
            </div>
        </div>
        <div class="stat-card completed">
            <div class="stat-icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <div class="stat-label">Completed</div>
                <div class="stat-value">{{ $completedCount }}</div>
            </div>
        </div>
        <div class="stat-card cancelled">
            <div class="stat-icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <div class="stat-label">Cancelled</div>
                <div class="stat-value">{{ $cancelledCount }}</div>
            </div>
        </div>
    </div>

    {{-- ── Next booking banner ── --}}
    @if($nextBooking)
    @php
        $diff = now()->diffInDays(\Carbon\Carbon::parse($nextBooking->booking_date), false);
        $isPartnerNext = $nextBooking->partner_id == auth()->id();
        $otherPersonNext = $isPartnerNext ? $nextBooking->user : $nextBooking->partner;
    @endphp
    <div class="next-booking">
        <div class="next-img-wrap">
            <img src="{{ $otherPersonNext->profile_image ? asset('storage/' . $otherPersonNext->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($otherPersonNext->name) . '&background=E91E63&color=fff' }}"
                 alt="{{ $otherPersonNext->name }}">
            <button class="heart-btn" type="button">
                <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </button>
        </div>

        <div class="next-content">
            <div class="next-badge">
                <svg width="10" height="10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Your Next Booking
            </div>
            <div class="next-name">
                {{ $otherPersonNext->name }}
                @if($otherPersonNext->is_verified)
                <span class="verified-chip">
                    <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    Verified {{ $isPartnerNext ? 'Customer' : 'Partner' }}
                </span>
                @endif
            </div>
            <div class="next-service">{{ $nextBooking->category ? $nextBooking->category->name : 'General' }}</div>
            <div class="next-meta">
                <span><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ \Carbon\Carbon::parse($nextBooking->booking_date)->format('d M Y') }}</span>
                <span><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ \Carbon\Carbon::parse($nextBooking->booking_time)->format('h:i A') }} – {{ \Carbon\Carbon::parse($nextBooking->end_time)->format('h:i A') }}</span>
                @if($otherPersonNext->city)
                <span><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $otherPersonNext->city }}</span>
                @endif
            </div>
        </div>

        <div class="next-right">
            <div>
                <div class="next-price">₹{{ number_format($nextBooking->amount, 0) }}</div>
                <div class="next-timing {{ $diff < 0 ? 'timing-passed' : ($diff == 0 ? 'timing-today' : 'timing-soon') }}" style="margin-top:6px;">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @if($diff < 0) Already passed
                    @elseif($diff == 0) Starts today
                    @else Starts in {{ $diff }} {{ $diff == 1 ? 'day' : 'days' }}
                    @endif
                </div>
            </div>
            <div class="next-actions">
                <button class="btn-solid">View Booking</button>
                <a class="btn-outline-pink" href="{{ route('dashboard.messages', ['booking' => $nextBooking->id]) }}">Chat</a>
            </div>
        </div>
    </div>
    @endif

    {{-- ── Filters bar ── --}}
    <div class="filters-bar">
        <div class="filter-search">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="searchInput" placeholder="Search by booking ID, partner or service…">
        </div>

        <select class="filter-select" id="filterService">
            <option value="">All Services</option>
            @php $services = $bookings->map(fn($b) => $b->category?->name)->filter()->unique()->sort(); @endphp
            @foreach($services as $svc)
            <option value="{{ $svc }}">{{ $svc }}</option>
            @endforeach
        </select>

        <select class="filter-select" id="filterDate">
            <option value="">All Dates</option>
            <option value="today">Today</option>
            <option value="week">This Week</option>
            <option value="month">This Month</option>
            <option value="past">Past</option>
        </select>

        <select class="filter-select" id="filterStatus">
            <option value="">All Status</option>
            <option value="confirmed">Confirmed</option>
            <option value="upcoming">Upcoming</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <div class="sort-wrap">
            <span class="sort-label">Sort by:</span>
            <select class="filter-select" id="sortSelect" style="min-width:130px;">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="amount_high">Amount: High–Low</option>
                <option value="amount_low">Amount: Low–High</option>
                <option value="date_asc">Date: Soonest</option>
            </select>
        </div>
    </div>

    {{-- ── Status Tabs ── --}}
    <div class="tabs" id="tabsBar">
        <button class="tab-btn active" data-tab="all">All ({{ $bookings->count() }})</button>
        <button class="tab-btn" data-tab="upcoming">Upcoming ({{ $upcomingCount }})</button>
        <button class="tab-btn" data-tab="pending">Pending ({{ $pendingCount }})</button>
        <button class="tab-btn" data-tab="completed">Completed ({{ $completedCount }})</button>
        <button class="tab-btn" data-tab="cancelled">Cancelled ({{ $cancelledCount }})</button>
    </div>

    {{-- ── Booking cards ── --}}
    <div class="booking-list" id="bookingList">

        @forelse($bookings as $booking)
        @php
            $isPartner = $booking->partner_id == auth()->id();
            $otherPerson = $isPartner ? $booking->user : $booking->partner;
        @endphp
        <div class="booking-card"
             data-status="{{ strtolower($booking->status) }}"
             data-service="{{ strtolower($booking->category?->name ?? '') }}"
             data-partner="{{ strtolower($otherPerson->name) }}"
             data-id="{{ strtolower('SMI-' . date('Y', strtotime($booking->created_at)) . '-' . str_pad($booking->id, 6, '0', STR_PAD_LEFT)) }}"
             data-amount="{{ $booking->amount }}"
             data-date="{{ $booking->booking_date }}">

            {{-- Photo --}}
            <div class="booking-img-wrap">
                <img src="{{ $otherPerson->profile_image ? asset('storage/' . $otherPerson->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($otherPerson->name) . '&background=E91E63&color=fff' }}"
                     alt="{{ $otherPerson->name }}">
                <button class="fav-btn" type="button">
                    <svg width="11" height="11" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="booking-body">

                {{-- Partner info --}}
                <div class="booking-partner">
                    @if($otherPerson->is_verified)
                    <div class="verified-tag">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Verified {{ $isPartner ? 'Customer' : 'Partner' }}
                    </div>
                    @endif
                    <div class="partner-name">{{ $otherPerson->name }}</div>
                    @if(!$isPartner)
                    <div class="star-row">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        {{ number_format($otherPerson->rating ?? 5.0, 1) }}
                    </div>
                    @endif
                    @if($otherPerson->city)
                    <div class="location-row">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $otherPerson->city }}
                    </div>
                    @endif
                    <div class="tag-row">
                        <span class="tag tag-pink">
                            <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            {{ $booking->category ? $booking->category->name : 'General' }}
                        </span>
                    </div>
                    <div class="schedule-row">
                        <span><svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</span>
                        <span><svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }} – {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</span>
                    </div>
                </div>

                {{-- Meta --}}
                <div class="booking-meta">
                    <div class="meta-amount">₹{{ number_format($booking->amount, 0) }}</div>
                    <div class="meta-type">Package</div>
                    <div class="meta-id-label">Booking ID</div>
                    <div class="meta-id-val">SMI-{{ date('Y', strtotime($booking->created_at)) }}-{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</div>
                    <span class="status-badge status-{{ strtolower($booking->status) }}">{{ ucfirst($booking->status) }}</span>
                </div>

                {{-- Actions --}}
                <div class="booking-actions">
                    @if(in_array(strtolower($booking->status), ['upcoming','confirmed']))
                        <a href="{{ route('dashboard.messages', ['booking' => $booking->id]) }}" class="btn-act btn-act-pink">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            Chat
                        </a>
                        <a href="#" class="btn-act btn-act-grey">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Cancel
                        </a>
                    @elseif(strtolower($booking->status) == 'pending')
                        <a href="#" class="btn-act btn-act-primary">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            Pay Now
                        </a>
                        <a href="#" class="btn-act btn-act-grey">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Cancel
                        </a>
                    @elseif(strtolower($booking->status) == 'completed')
                        <a href="#" class="btn-act btn-act-pink">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            Review
                        </a>
                        <a href="#" class="btn-act btn-act-grey">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Book Again
                        </a>
                    @elseif(strtolower($booking->status) == 'cancelled')
                        <a href="#" class="btn-act btn-act-grey">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Book Again
                        </a>
                    @endif
                </div>

            </div>{{-- /booking-body --}}
        </div>{{-- /booking-card --}}

        @empty
        <div class="empty-state">
            <svg width="52" height="52" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <h3>No Bookings Yet</h3>
            <p>You haven't made any bookings. Find a partner to get started!</p>
            <a href="/partners" class="btn-find" style="display:inline-flex;">Find a Partner</a>
        </div>
        @endforelse

    </div>{{-- /booking-list --}}

    <div id="no-results">
        <svg width="40" height="40" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <div style="margin-top:12px; font-weight:600; color:#475569;">No bookings match your filters</div>
        <div style="margin-top:4px;">Try adjusting the search or filter options above.</div>
    </div>

</div>{{-- /middle-col --}}

<script>
(function () {
    var cards        = Array.from(document.querySelectorAll('.booking-card'));
    var searchInput  = document.getElementById('searchInput');
    var filterService= document.getElementById('filterService');
    var filterDate   = document.getElementById('filterDate');
    var filterStatus = document.getElementById('filterStatus');
    var sortSelect   = document.getElementById('sortSelect');
    var tabButtons   = document.querySelectorAll('.tab-btn');
    var noResults    = document.getElementById('no-results');
    var bookingList  = document.getElementById('bookingList');

    var activeTab = 'all';

    // ── TAB click ──────────────────────────────────────
    tabButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            tabButtons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            activeTab = btn.getAttribute('data-tab');
            applyFilters();
        });
    });

    // ── Input listeners ────────────────────────────────
    [searchInput, filterService, filterDate, filterStatus, sortSelect].forEach(function (el) {
        el.addEventListener('input', applyFilters);
        el.addEventListener('change', applyFilters);
    });

    // ── Main filter + sort function ────────────────────
    function applyFilters() {
        var search  = searchInput.value.trim().toLowerCase();
        var service = filterService.value.toLowerCase();
        var dateF   = filterDate.value;
        var statusF = filterStatus.value.toLowerCase();
        var sort    = sortSelect.value;

        var today  = new Date(); today.setHours(0,0,0,0);
        var weekEnd  = new Date(today); weekEnd.setDate(today.getDate() + 7);
        var monthEnd = new Date(today); monthEnd.setDate(today.getDate() + 30);

        var visible = [];

        cards.forEach(function (card) {
            var cardStatus  = card.getAttribute('data-status') || '';
            var cardService = card.getAttribute('data-service') || '';
            var cardPartner = card.getAttribute('data-partner') || '';
            var cardId      = card.getAttribute('data-id') || '';
            var cardDate    = new Date(card.getAttribute('data-date'));
            cardDate.setHours(0,0,0,0);

            // Tab filter
            if (activeTab !== 'all') {
                var tabMatch = activeTab === 'upcoming'
                    ? (cardStatus === 'upcoming' || cardStatus === 'confirmed')
                    : cardStatus === activeTab;
                if (!tabMatch) { card.style.display = 'none'; return; }
            }

            // Status dropdown
            if (statusF && cardStatus !== statusF) { card.style.display = 'none'; return; }

            // Service filter
            if (service && cardService !== service) { card.style.display = 'none'; return; }

            // Date filter
            if (dateF) {
                if (dateF === 'today' && cardDate.getTime() !== today.getTime()) { card.style.display = 'none'; return; }
                if (dateF === 'week'  && (cardDate < today || cardDate >= weekEnd)) { card.style.display = 'none'; return; }
                if (dateF === 'month' && (cardDate < today || cardDate >= monthEnd)) { card.style.display = 'none'; return; }
                if (dateF === 'past'  && cardDate >= today) { card.style.display = 'none'; return; }
            }

            // Search
            if (search && !cardPartner.includes(search) && !cardId.includes(search) && !cardService.includes(search)) {
                card.style.display = 'none'; return;
            }

            card.style.display = '';
            visible.push(card);
        });

        // ── Sort visible cards ──
        visible.sort(function (a, b) {
            var dateA   = new Date(a.getAttribute('data-date'));
            var dateB   = new Date(b.getAttribute('data-date'));
            var amountA = parseFloat(a.getAttribute('data-amount') || 0);
            var amountB = parseFloat(b.getAttribute('data-amount') || 0);
            if (sort === 'oldest')     return dateA - dateB;
            if (sort === 'amount_high') return amountB - amountA;
            if (sort === 'amount_low')  return amountA - amountB;
            if (sort === 'date_asc')    return dateA - dateB;
            return dateB - dateA; // newest first (default)
        });

        // Re-append in sorted order
        visible.forEach(function (card) { bookingList.appendChild(card); });

        // Show/hide no-results message
        noResults.style.display = visible.length === 0 ? 'block' : 'none';
    }

    // initial run
    applyFilters();
})();
</script>
@endsection
