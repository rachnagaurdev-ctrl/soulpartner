@extends('layouts.dashboard')
@section('title', 'My Bookings | Soulmate India')

@section('styles')
<style>
/* Add specific styles for bookings page */
.bookings-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}
.bookings-title h1 {
    font-size: 32px;
    color: #1E3A8A; /* Dark blue from design */
    margin: 0 0 5px 0;
    font-weight: 700;
}
.bookings-title p {
    color: #64748B;
    margin: 0;
    font-size: 15px;
}
.btn-primary {
    background-color: #E91E63;
    color: white;
    border: none;
    padding: 10px 24px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}
.btn-primary:hover {
    background-color: #D81B60;
}

/* Stat Cards */
.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}
.stat-card {
    background: #FFF;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    border: 1px solid #F1F5F9;
}
.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.stat-card.upcoming { border: 1px solid #FCE7F3; }
.stat-card.upcoming .stat-icon { background: #FCE7F3; color: #E91E63; }
.stat-card.pending { border: 1px solid #FEF3C7; }
.stat-card.pending .stat-icon { background: #FEF3C7; color: #F59E0B; }
.stat-card.completed { border: 1px solid #DCFCE7; }
.stat-card.completed .stat-icon { background: #DCFCE7; color: #10B981; }
.stat-card.cancelled { border: 1px solid #FEE2E2; }
.stat-card.cancelled .stat-icon { background: #FEE2E2; color: #EF4444; }

.stat-info {
    flex: 1;
}
.stat-label {
    font-size: 13px;
    color: #64748B;
    font-weight: 500;
    margin-bottom: 4px;
}
.stat-value {
    font-size: 24px;
    font-weight: 700;
    color: #1E293B;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.stat-value svg {
    color: #94A3B8;
    width: 16px;
    height: 16px;
}

/* Next Booking Card */
.next-booking {
    background: #FFF;
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 30px;
    display: flex;
    gap: 20px;
    position: relative;
    border: 1px solid #FCE7F3; /* Light pink border */
    background: linear-gradient(to right, #FFF, #FDF2F8);
}
.next-booking-img {
    width: 140px;
    height: 140px;
    border-radius: 12px;
    object-fit: cover;
    position: relative;
}
.heart-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0,0,0,0.3);
    border-radius: 50%;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
.next-booking-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.next-badge {
    background: #FCE7F3;
    color: #E91E63;
    font-size: 10px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 12px;
    display: inline-block;
    margin-bottom: 10px;
}
.next-name {
    font-size: 20px;
    font-weight: 700;
    color: #1E293B;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 5px;
}
.verified-icon { color: #3B82F6; width: 16px; height: 16px; }
.next-service {
    font-size: 15px;
    font-weight: 600;
    color: #334155;
    margin-bottom: 15px;
}
.next-details {
    display: flex;
    gap: 20px;
    font-size: 13px;
    color: #64748B;
}
.next-details div {
    display: flex;
    align-items: center;
    gap: 5px;
}
.next-right {
    text-align: right;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-end;
}
.next-price {
    font-size: 24px;
    font-weight: 700;
    color: #1E3A8A;
}
.starts-in {
    background: #FEE2E2;
    color: #EF4444;
    font-size: 11px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 4px;
    margin-top: 5px;
}
.next-actions {
    display: flex;
    gap: 10px;
}
.btn-solid-pink {
    background: #E91E63;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
}
.btn-outline-pink {
    background: white;
    color: #E91E63;
    border: 1px solid #E91E63;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
}

/* Filters */
.filters-bar {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}
.filter-search {
    flex: 1;
    position: relative;
}
.filter-search input {
    width: 100%;
    padding: 10px 15px 10px 35px;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    font-size: 13px;
    box-sizing: border-box;
}
.filter-search svg {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #94A3B8;
    width: 16px;
    height: 16px;
}
.filter-select {
    padding: 10px 30px 10px 15px;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    font-size: 13px;
    color: #475569;
    appearance: none;
    background: #FFF url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 10px center;
    min-width: 130px;
}
.sort-by {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: #64748B;
    margin-left: auto;
}

/* Tabs */
.tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}
.tab-btn {
    padding: 8px 16px;
    border: 1px solid transparent;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    color: #64748B;
    background: transparent;
    cursor: pointer;
}
.tab-btn.active {
    background: #E91E63;
    color: white;
}
.tab-btn:not(.active):hover {
    background: #F1F5F9;
}

/* Booking List */
.booking-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.booking-item {
    background: #FFF;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    gap: 20px;
    border: 1px solid #E2E8F0;
}
.booking-img-wrapper {
    position: relative;
    width: 90px;
    height: 90px;
}
.booking-img-wrapper img {
    width: 100%;
    height: 100%;
    border-radius: 8px;
    object-fit: cover;
}
.booking-item-content {
    flex: 1;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 20px;
}
.booking-user-info .name {
    font-size: 16px;
    font-weight: 700;
    color: #1E293B;
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 2px;
}
.booking-user-info .rating {
    font-size: 12px;
    color: #64748B;
    display: flex;
    align-items: center;
    gap: 4px;
    margin-bottom: 10px;
}
.booking-user-info .rating svg {
    color: #F59E0B;
    width: 14px;
    height: 14px;
}
.tag-group {
    display: flex;
    gap: 8px;
    margin-bottom: 10px;
    flex-wrap: wrap;
}
.tag {
    font-size: 11px;
    padding: 2px 8px;
    border-radius: 12px;
    background: #F1F5F9;
    color: #475569;
    display: flex;
    align-items: center;
    gap: 4px;
}
.tag.pink { color: #E91E63; background: #FCE7F3; }
.tag.blue { color: #3B82F6; background: #DBEAFE; }
.schedule-info {
    display: flex;
    gap: 15px;
    font-size: 12px;
    color: #64748B;
}
.schedule-info div {
    display: flex;
    align-items: center;
    gap: 4px;
}

.booking-meta {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.meta-price {
    font-size: 16px;
    font-weight: 700;
    color: #1E293B;
}
.meta-sub {
    font-size: 12px;
    color: #64748B;
    margin-bottom: 10px;
}
.meta-id {
    font-size: 12px;
    color: #64748B;
    margin-bottom: 2px;
}
.meta-id strong {
    color: #334155;
}
.status-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    margin-top: 10px;
}
.status-confirmed { background: #DCFCE7; color: #10B981; }
.status-upcoming { background: #DCFCE7; color: #10B981; }
.status-pending { background: #FEF3C7; color: #F59E0B; }
.status-completed { background: #E0E7FF; color: #4F46E5; }
.status-cancelled { background: #FEE2E2; color: #EF4444; }

.booking-actions {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 8px;
}
.btn-action {
    padding: 8px 15px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
    width: 100%;
}
.btn-action.solid {
    background: #E91E63;
    color: white;
    border: none;
}
.btn-action.outline {
    background: white;
    color: #E91E63;
    border: 1px solid #FCE7F3;
}
.btn-action.outline-grey {
    background: white;
    color: #64748B;
    border: 1px solid #E2E8F0;
}

/* Page structural fix */
.middle-col {
    max-width: 100% !important;
}
</style>
@endsection

@section('content')
@php
    $upcomingCount = $bookings->whereIn('status', ['upcoming', 'confirmed'])->count();
    $pendingCount = $bookings->where('status', 'pending')->count();
    $completedCount = $bookings->where('status', 'completed')->count();
    $cancelledCount = $bookings->where('status', 'cancelled')->count();

    $nextBooking = $bookings->whereIn('status', ['upcoming', 'confirmed'])
        ->sortBy(function($b) {
            return \Carbon\Carbon::parse($b->booking_date . ' ' . $b->booking_time);
        })->first();
@endphp
<div class="middle-col">
    <div class="bookings-header">
        <div class="bookings-title">
            <h1>My Bookings</h1>
            <p>Manage your upcoming, completed and cancelled bookings.</p>
        </div>
        <a href="#" class="btn-primary">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            Find a Partner
        </a>
    </div>

    <div class="stats-row">
        <div class="stat-card upcoming">
            <div class="stat-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div class="stat-info">
                <div class="stat-label">Upcoming</div>
                <div class="stat-value">{{ $upcomingCount }} <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
            </div>
        </div>
        <div class="stat-card pending">
            <div class="stat-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="stat-info">
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pendingCount }} <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
            </div>
        </div>
        <div class="stat-card completed">
            <div class="stat-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="stat-info">
                <div class="stat-label">Completed</div>
                <div class="stat-value">{{ $completedCount }} <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
            </div>
        </div>
        <div class="stat-card cancelled">
            <div class="stat-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="stat-info">
                <div class="stat-label">Cancelled</div>
                <div class="stat-value">{{ $cancelledCount }} <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
            </div>
        </div>
    </div>

    @if($nextBooking)
    <div class="next-booking">
        <div style="position: relative;">
            <img src="{{ $nextBooking->partner->profile_image ? asset('storage/' . $nextBooking->partner->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($nextBooking->partner->name) }}" alt="{{ $nextBooking->partner->name }}" class="next-booking-img">
            <div class="heart-icon">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
        </div>
        
        <div class="next-booking-content">
            <div>
                <span class="next-badge">YOUR NEXT BOOKING</span>
                <div class="next-name">
                    {{ $nextBooking->partner->name }} 
                    @if($nextBooking->partner->is_verified)
                    <svg class="verified-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span style="font-size:12px; color:#64748B; font-weight:500;">Verified Partner</span>
                    @endif
                </div>
                <div class="next-service">{{ $nextBooking->category ? $nextBooking->category->name : 'General' }}</div>
                <div class="next-details">
                    <div><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ \Carbon\Carbon::parse($nextBooking->booking_date)->format('d M Y') }}</div>
                    <div><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ \Carbon\Carbon::parse($nextBooking->booking_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($nextBooking->end_time)->format('h:i A') }}</div>
                    @if($nextBooking->partner->city)
                    <div><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $nextBooking->partner->city }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="next-right">
            <div>
                <div class="next-price">₹{{ number_format($nextBooking->amount, 0) }}</div>
                @php 
                    $diffInDays = now()->diffInDays(\Carbon\Carbon::parse($nextBooking->booking_date), false);
                @endphp
                <div class="starts-in">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    @if($diffInDays == 0)
                        Starts today
                    @elseif($diffInDays < 0)
                        Already passed
                    @else
                        Starts in {{ $diffInDays }} {{ $diffInDays == 1 ? 'day' : 'days' }}
                    @endif
                </div>
            </div>
            <div class="next-actions">
                <button class="btn-solid-pink">View Booking</button>
                <button class="btn-outline-pink">Chat</button>
            </div>
        </div>
    </div>
    @endif

    <div class="filters-bar">
        <div class="filter-search">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" placeholder="Search by booking ID, partner or service...">
        </div>
        <select class="filter-select">
            <option>All Services</option>
        </select>
        <select class="filter-select">
            <option>All Dates</option>
        </select>
        <select class="filter-select">
            <option>All Status</option>
        </select>
        <select class="filter-select">
            <option>All Payments</option>
        </select>
        <div class="sort-by">
            Sort by: 
            <select class="filter-select" style="min-width: 110px;">
                <option>Newest First</option>
            </select>
        </div>
    </div>

    <div class="tabs">
        <button class="tab-btn active">All ({{ $bookings->count() }})</button>
        <button class="tab-btn">Upcoming ({{ $upcomingCount }})</button>
        <button class="tab-btn">Pending ({{ $pendingCount }})</button>
        <button class="tab-btn">Completed ({{ $completedCount }})</button>
        <button class="tab-btn">Cancelled ({{ $cancelledCount }})</button>
    </div>

    <div class="booking-list">
        @forelse($bookings as $booking)
        <div class="booking-item">
            <div class="booking-img-wrapper">
                <img src="{{ $booking->partner->profile_image ? asset('storage/' . $booking->partner->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($booking->partner->name) }}" alt="{{ $booking->partner->name }}">
                <div class="heart-icon" style="width:24px; height:24px; top:5px; right:5px;">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
            </div>
            <div class="booking-item-content">
                <div class="booking-user-info">
                    @if($booking->partner->is_verified)
                    <div style="font-size:11px; color:#10B981; font-weight:600; margin-bottom:2px; display:flex; align-items:center; gap:4px;">
                        <svg class="verified-icon" style="width:12px; height:12px; color:#10B981;" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Verified
                    </div>
                    @endif
                    <div class="name" @if(!$booking->partner->is_verified) style="margin-top: 18px;" @endif>{{ $booking->partner->name }}</div>
                    <div class="rating">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        {{ number_format($booking->partner->rating ?? 5.0, 1) }}
                    </div>
                    @if($booking->partner->city)
                    <div style="font-size: 12px; color: #64748B; display: flex; align-items: center; gap: 4px; margin-bottom: 10px;">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $booking->partner->city }}
                    </div>
                    @endif
                    <div class="tag-group">
                        <div class="tag pink"><svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg> {{ $booking->category ? $booking->category->name : 'General' }}</div>
                    </div>
                    <div class="schedule-info">
                        <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</div>
                        <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</div>
                    </div>
                </div>

                <div class="booking-meta">
                    <div class="meta-price">₹{{ number_format($booking->amount, 0) }}</div>
                    <div class="meta-sub">Package</div>
                    <div class="meta-id">Booking ID</div>
                    <div class="meta-id"><strong>SMI-{{ date('Y', strtotime($booking->created_at)) }}-{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</strong></div>
                    <div>
                        <span class="status-badge status-{{ strtolower($booking->status) }}">{{ ucfirst($booking->status) }}</span>
                    </div>
                </div>

                <div class="booking-actions">
                    <!-- <a href="#" class="btn-action solid">
                        View Details <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a> -->
                    
                    @if(in_array(strtolower($booking->status), ['upcoming', 'confirmed']))
                        <a href="#" class="btn-action outline">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg> Chat
                        </a>
                        <a href="#" class="btn-action outline">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Cancel Booking
                        </a>
                    @elseif(strtolower($booking->status) == 'pending')
                        <a href="#" class="btn-action outline">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg> Complete Payment
                        </a>
                        <a href="#" class="btn-action outline">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Cancel Request
                        </a>
                    @elseif(strtolower($booking->status) == 'completed')
                        <a href="#" class="btn-action outline-grey">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg> Write Review
                        </a>
                        <a href="#" class="btn-action outline-grey">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Book Again
                        </a>
                    @elseif(strtolower($booking->status) == 'cancelled')
                        <a href="#" class="btn-action outline-grey">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Book Again
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div style="text-align: center; padding: 50px; background: #FFF; border-radius: 12px; border: 1px solid #E2E8F0;">
            <svg width="48" height="48" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24" style="margin-bottom: 15px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <h3 style="color: #475569; margin: 0 0 10px 0; font-size: 18px;">No Bookings Found</h3>
            <p style="color: #94A3B8; font-size: 14px; margin: 0 0 20px 0;">You don't have any bookings yet.</p>
            <a href="#" class="btn-primary" style="display: inline-flex;">Find a Partner</a>
        </div>
        @endforelse
    </div>
</div>
@endsection
