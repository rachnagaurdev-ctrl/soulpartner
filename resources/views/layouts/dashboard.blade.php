<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard | Soulmate India')</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <style>
    body {
      margin: 0;
      font-family: 'DM Sans', sans-serif;
      background-color: #F8FAFC;
      color: #333;
      display: flex;
      height: 100vh;
      overflow: hidden;
    }
    
    /* Topbar */
    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 70px;
      background-color: #FFF;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.02);
      z-index: 100;
    }
    .topbar-left {
      display: flex;
      align-items: center;
      gap: 30px;
      width: 250px;
    }
    .topbar-left img {
      max-width: 130px;
      max-height: 50px;
      object-fit: contain;
    }
    .search-bar {
      background-color: #F1F5F9;
      border-radius: 25px;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      flex: 1;
      max-width: 500px;
    }
    .search-bar input {
      border: none;
      background: transparent;
      outline: none;
      width: 100%;
      margin-left: 10px;
      font-size: 14px;
    }
    .topbar-right {
      display: flex;
      align-items: center;
      gap: 20px;
    }
    .icon-btn {
      position: relative;
      background: none;
      border: none;
      cursor: pointer;
      color: #0F172A;
    }
    .icon-badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background: #E91E63;
      color: #fff;
      font-size: 10px;
      border-radius: 50%;
      width: 16px;
      height: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid #FFF;
    }
    
    /* Layout */
    .layout-container {
      display: flex;
      width: 100%;
      padding-top: 70px;
      height: calc(100vh - 70px);
    }

    /* Sidebar Overlay (mobile only) */
    .sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15,23,42,0.5);
      z-index: 199;
      backdrop-filter: blur(2px);
    }
    .sidebar-overlay.active { display: block; }

    /* Hamburger button - hidden on desktop */
    .sidebar-toggle {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
      color: #0F172A;
      padding: 6px;
      border-radius: 8px;
      flex-shrink: 0;
    }
    
    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #0B1120;
      color: #FFF;
      display: flex;
      flex-direction: column;
      height: 100%;
      padding-top: 20px;
      flex-shrink: 0;
      transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
      z-index: 200;
    }
    .nav-list {
      list-style: none;
      padding: 0;
      margin: 0;
      flex: 1;
    }
    .nav-item {
      padding: 15px 25px;
      display: flex;
      align-items: center;
      color: #94A3B8;
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
      transition: 0.3s;
    }
    .nav-item:hover, .nav-item.active {
      color: #FFF;
      background-color: #E91E63;
      border-radius: 0 30px 30px 0;
      margin-right: 20px;
    }
    .nav-item svg {
      margin-right: 15px;
      width: 18px;
      height: 18px;
      flex-shrink: 0;
    }
    .nav-badge {
      margin-left: auto;
      background: #E91E63;
      color: #fff;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 30px;
      overflow-y: auto;
      display: flex;
      gap: 30px;
      min-width: 0;
    }
    .middle-col {
      flex: 1;
      max-width: 800px;
      min-width: 0;
    }
    .right-col {
      width: 320px;
      flex-shrink: 0;
    }

    /* Header */
    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .page-title h1 {
      margin: 0 0 5px 0;
      font-size: 22px;
      color: #1E293B;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .page-title p {
      margin: 0;
      color: #64748B;
      font-size: 14px;
    }
    .btn-outline-primary {
      border: 1px solid #E91E63;
      color: #E91E63;
      background: transparent;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
      text-decoration: none;
    }
    
    /* Cards */
    .card {
      background: #FFF;
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      border: 1px solid #F1F5F9;
    }
    .card-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 20px;
      color: #1E293B;
      font-weight: 700;
      font-size: 16px;
    }
    .card-header svg {
      color: #E91E63;
    }

    /* Forms */
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 13px;
      color: #475569;
      font-weight: 500;
    }
    .form-group label span {
      color: #E91E63;
    }
    .form-control {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid #E2E8F0;
      border-radius: 8px;
      font-family: inherit;
      font-size: 14px;
      color: #1E293B;
      box-sizing: border-box;
      background: #FFF;
    }
    .form-control:focus {
      outline: none;
      border-color: #E91E63;
    }
    textarea.form-control {
      resize: vertical;
      min-height: 100px;
    }
    .char-count {
      text-align: right;
      font-size: 12px;
      color: #94A3B8;
      margin-top: 5px;
    }

    /* Pills/Checkboxes */
    .pill-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .pill-checkbox {
      display: none;
    }
    .pill-label {
      padding: 6px 16px;
      border: 1px solid #E2E8F0;
      border-radius: 20px;
      font-size: 13px;
      color: #475569;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: 0.2s;
    }
    .pill-checkbox:checked + .pill-label {
      border-color: #FCE7F3;
      background-color: #FDF2F8;
      color: #E91E63;
      font-weight: 500;
    }
    
    /* Photo Upload Grid */
    .photo-grid {
      display: flex;
      gap: 15px;
      overflow-x: auto;
      padding-bottom: 10px;
    }
    .photo-item {
      position: relative;
      width: 100px;
      height: 120px;
      border-radius: 8px;
      overflow: hidden;
      flex-shrink: 0;
    }
    .photo-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .photo-primary-badge {
      position: absolute;
      bottom: 5px;
      left: 5px;
      background: #E91E63;
      color: #FFF;
      font-size: 10px;
      padding: 2px 6px;
      border-radius: 10px;
    }
    .photo-upload-btn {
      width: 100px;
      height: 120px;
      border: 2px dashed #CBD5E1;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #64748B;
      cursor: pointer;
      flex-shrink: 0;
      background: #F8FAFC;
    }

    /* Buttons */
    .form-actions {
      display: flex;
      justify-content: flex-end;
      gap: 15px;
      margin-top: 30px;
    }
    .btn-cancel {
      padding: 12px 24px;
      border: 1px solid #CBD5E1;
      background: #FFF;
      border-radius: 8px;
      color: #475569;
      font-weight: 500;
      cursor: pointer;
    }
    .btn-save {
      padding: 12px 24px;
      background: #E91E63;
      color: #FFF;
      border: none;
      border-radius: 8px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* Right Sidebar - Preview Card */
    .preview-card {
      padding: 0;
      overflow: hidden;
    }
    .preview-img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }
    .preview-content {
      padding: 20px;
    }
    .preview-name {
      font-size: 20px;
      font-weight: 700;
      margin: 0 0 5px 0;
      color: #0F172A;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .preview-meta {
      font-size: 13px;
      color: #64748B;
      margin-bottom: 10px;
    }
    .preview-rating {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 15px;
    }
    .preview-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 15px;
    }
    .preview-tag {
      background: #F1F5F9;
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 11px;
      color: #475569;
    }
    .preview-desc {
      font-size: 13px;
      color: #334155;
      line-height: 1.5;
      margin-bottom: 15px;
    }
    .preview-details {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      font-size: 12px;
      color: #475569;
    }
    .preview-details div {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    /* Right Sidebar - Tips Card */
    .tips-card {
      background: #FDF2F8;
      border: 1px solid #FCE7F3;
    }
    .tips-list {
      padding-left: 20px;
      font-size: 13px;
      color: #334155;
      line-height: 1.6;
      margin: 0;
    }
    .tips-list li {
      margin-bottom: 8px;
    }
    .tips-signature {
      text-align: right;
      color: #E91E63;
      font-family: cursive;
      font-size: 18px;
      margin-top: 15px;
      transform: rotate(-5deg);
    }

    .alert-success {
      background-color: #DEF7EC;
      color: #03543F;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #31C48D;
    }

    /* ===========================
       MOBILE RESPONSIVE
    =========================== */
    @media (max-width: 768px) {
      body { overflow: auto; height: auto; }

      .topbar { padding: 0 14px; height: 60px; }
      .topbar-left { width: auto; gap: 10px; }
      .topbar-left img { max-width: 90px; max-height: 36px; }
      .topbar-right { gap: 10px; }

      /* Show hamburger on mobile */
      .sidebar-toggle { display: flex; align-items: center; justify-content: center; }

      .layout-container {
        padding-top: 60px;
        height: auto;
        min-height: calc(100vh - 60px);
        flex-direction: column;
        overflow: visible;
      }

      /* Sidebar becomes a slide-in drawer */
      .sidebar {
        position: fixed;
        top: 60px;
        left: 0;
        bottom: 0;
        height: auto;
        width: 260px;
        transform: translateX(-100%);
        overflow-y: auto;
        padding-top: 12px;
      }
      .sidebar.open { transform: translateX(0); }

      body { overflow-x: hidden; overflow-y: auto; height: auto; }

      .main-content {
        flex-direction: column !important;
        padding: 14px;
        gap: 14px;
        overflow-y: visible;
        overflow-x: hidden;
        width: 100%;
        box-sizing: border-box;
        height: auto !important;
      }
      .middle-col { max-width: 100% !important; width: 100% !important; flex: none !important; }
      .right-col { width: 100% !important; flex-shrink: 1 !important; }

      .form-grid { grid-template-columns: 1fr; gap: 0; }

      .page-header { flex-direction: column; align-items: flex-start; gap: 10px; }
      .page-title h1 { font-size: 18px; }

      .form-actions { flex-direction: column-reverse; }
      .btn-save, .btn-cancel { width: 100%; justify-content: center; }

      .card { padding: 14px; }
    }

    @media (max-width: 480px) {
      .topbar-right .icon-btn:first-child { display: none; }
    }
  </style>
  @yield('styles')
</head>
<body>

  <!-- Topbar -->
  <div class="topbar">
    <div class="topbar-left">
      <!-- Hamburger for mobile -->
      <button class="sidebar-toggle" id="sidebarToggle" aria-label="Open navigation">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
      <a style="cursor: pointer;" href="/">
         @if(\App\Models\Setting::get('logo'))
          <img src="{{ get_storage_url(\App\Models\Setting::get('logo')) }}" alt="{{ \App\Models\Setting::get('site_name', 'Soulmate India') }}">
        @else
          <img src="{{asset('assets/images/logo.png')}}" alt="{{ \App\Models\Setting::get('site_name', 'Soulmate India') }}">
        @endif
      </a>
    </div>
    <!-- <div class="search-bar">
      <svg width="18" height="18" fill="none" stroke="#A0AEC0" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
      <input type="text" placeholder="Search partners, activities, or location...">
    </div> -->
    <div class="topbar-right">
      <button class="icon-btn">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        <span class="icon-badge">3</span>
      </button>
      <button class="icon-btn">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        <span class="icon-badge">5</span>
      </button>
      <div style="display: flex; align-items: center; gap: 10px; margin-left: 10px;">
        <div style="width: 36px; height: 36px; border-radius: 50%; overflow: hidden; background: #E2E8F0;">
            @if($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" style="width:100%; height:100%; object-fit:cover;">
            @endif
        </div>
        <div style="line-height: 1.2;">
            <div style="font-size: 14px; font-weight: 600;">{{ $user->name }}</div>
            <div style="font-size: 11px; color: #64748B;">Partner</div>
        </div>
      </div>
    </div>
  </div>

  <div class="layout-container">
    <!-- Mobile sidebar overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <!-- Sidebar -->
    <aside class="sidebar">
      <ul class="nav-list">
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
          Dashboard
        </a>
        <a href="{{ route('dashboard.profile') }}" class="nav-item {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          Edit Profile
        </a>
        <a href="{{ route('dashboard.bookings') }}" class="nav-item {{ request()->routeIs('dashboard.bookings') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          My Bookings
        </a>
        <a href="{{ route('dashboard.earnings') }}" class="nav-item {{ request()->routeIs('dashboard.earnings') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Earnings
        </a>
        <a href="{{ route('dashboard.messages') }}" class="nav-item {{ request()->routeIs('dashboard.messages') ? 'active' : '' }}" id="messagesNavLink">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
          Messages
          <span class="nav-badge" id="msgUnreadBadge" style="display:none;"></span>
        </a>
        @if(Auth::user()->iwantto !== 'find')
        <a href="{{ route('dashboard.salary') ?? '#' }}" class="nav-item {{ request()->routeIs('dashboard.salary') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Salary & Targets
        </a>
        @endif
        <a href="{{ route('dashboard.reviews') }}" class="nav-item {{ request()->routeIs('dashboard.reviews') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
          Reviews
        </a>
        <a href="{{ route('dashboard.membership') }}" class="nav-item {{ request()->routeIs('dashboard.membership') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
          Membership
        </a>
        <a href="{{ route('dashboard.settings') }}" class="nav-item {{ request()->routeIs('dashboard.settings') ? 'active' : '' }}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          Settings
        </a>
      </ul>
      <div style="padding: 20px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background: none; border: none; color: #E91E63; cursor: pointer; display: flex; align-items: center; font-size: 14px; font-weight: 500;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 15px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>
  </div>

  {{-- Global unread message counter & notification (polls every 10s) --}}
  <style>
    .global-toast {
        position: fixed; bottom: 30px; right: 30px; background: #fff;
        border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 16px 20px; display: flex; align-items: center; gap: 12px;
        transform: translateY(100px); opacity: 0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 9999; pointer-events: none;
        border: 1px solid #F1F5F9; border-left: 4px solid #E91E63;
    }
    .global-toast.show { transform: translateY(0); opacity: 1; pointer-events: auto; }
    .global-toast.error { border-left-color: #EF4444; }
    .global-toast.success { border-left-color: #10B981; }
    .global-toast-icon {
        width: 40px; height: 40px; border-radius: 50%;
        background: #FDF2F8; color: #E91E63;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .global-toast.error .global-toast-icon { background: #FEF2F2; color: #EF4444; }
    .global-toast.success .global-toast-icon { background: #ECFDF5; color: #10B981; }
    .global-toast-content { flex: 1; min-width: 150px; }
    .global-toast-title { font-weight: 700; color: #1E293B; font-size: 14px; margin-bottom: 2px; }
    .global-toast-desc { font-size: 13px; color: #64748B; }
    .global-toast-action {
        background: #E91E63; color: #fff; font-size: 12px; font-weight: 600;
        padding: 6px 12px; border-radius: 6px; text-decoration: none; transition: .2s;
    }
    .global-toast-action:hover { background: #d81b60; color: #fff; }
  </style>

  <div class="global-toast" id="globalToast">
      <div class="global-toast-icon" id="globalToastIcon"></div>
      <div class="global-toast-content">
          <div class="global-toast-title" id="globalToastTitle">Notification</div>
          <div class="global-toast-desc" id="globalToastDesc">Message goes here.</div>
      </div>
      <a href="#" class="global-toast-action" id="globalToastAction" style="display:none;">View</a>
  </div>

  {{-- Video Call Modal --}}
  <div id="videoCallModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.85); z-index:999999; flex-direction:column; align-items:center; justify-content:center; backdrop-filter:blur(8px);">
      <div style="background:#0F172A; width:90%; max-width:900px; height:80vh; border-radius:24px; overflow:hidden; position:relative; box-shadow:0 25px 50px rgba(0,0,0,0.5); display:flex; flex-direction:column;">
          
          {{-- Header --}}
          <div style="padding:16px 24px; background:rgba(255,255,255,0.05); border-bottom:1px solid rgba(255,255,255,0.1); display:flex; justify-content:space-between; align-items:center; z-index:10;">
              <div style="color:#fff; font-weight:600; font-size:16px; display:flex; align-items:center; gap:8px;">
                  <span id="vcStatusDot" style="width:10px; height:10px; background:#F59E0B; border-radius:50%; display:inline-block;"></span>
                  <span id="vcStatusText">Connecting...</span>
              </div>
          </div>

          {{-- Video Area --}}
          <div style="flex:1; position:relative; background:#000;">
              <video id="remoteVideo" autoplay playsinline style="width:100%; height:100%; object-fit:cover;"></video>
              <video id="localVideo" autoplay playsinline muted style="position:absolute; bottom:24px; right:24px; width:160px; height:240px; object-fit:cover; border-radius:12px; border:2px solid rgba(255,255,255,0.2); box-shadow:0 10px 20px rgba(0,0,0,0.3); transform:scaleX(-1);"></video>
          </div>

          {{-- Controls --}}
          <div style="padding:24px; background:linear-gradient(to top, rgba(15,23,42,1), transparent); position:absolute; bottom:0; left:0; right:0; display:flex; justify-content:center; gap:20px;">
              <button id="vcEndBtn" style="width:64px; height:64px; border-radius:50%; background:#EF4444; color:#fff; border:none; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 10px 25px rgba(239,68,68,0.4); transition:transform 0.2s;">
                  <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M12 9c-1.6 0-3.15.25-4.6.72v3.1c0 .39-.23.74-.56.9-1.2.6-2.28 1.41-3.19 2.37-.2.22-.52.28-.79.16l-2.02-.9c-.27-.12-.44-.39-.44-.7V5.41C.44 4.8 1 4.29 1.6 4.38 4.95 4.9 8.35 5.23 12 5.23s7.05-.33 10.4-.85c.6-.09 1.16.42 1.16 1.03v9.23c0 .31-.17.58-.44.7l-2.02.9c-.27.12-.59.06-.79-.16-.91-.96-1.99-1.77-3.19-2.37-.33-.16-.56-.51-.56-.9v-3.1C15.15 9.25 13.6 9 12 9z"/></svg>
              </button>
          </div>
      </div>
  </div>

  {{-- Incoming Call Modal --}}
  <div id="incomingCallModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.8); z-index:9999999; flex-direction:column; align-items:center; justify-content:center; backdrop-filter:blur(8px);">
      <div style="background:#fff; width:100%; max-width:320px; border-radius:24px; padding:32px 24px; text-align:center; box-shadow:0 25px 50px rgba(0,0,0,0.25); animation: vibrate 0.5s infinite;">
          <div style="width:80px; height:80px; background:#FCE7F3; color:#E91E63; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
              <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
          </div>
          <h3 style="margin:0 0 8px; color:#1E293B; font-size:20px;">Incoming Video Call</h3>
          <p id="incomingCallerName" style="margin:0 0 16px; color:#64748B; font-size:16px; font-weight:600;"></p>
          
          <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:12px; text-align:left; margin-bottom:24px; font-size:13px; color:#475569;">
              <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                  <span style="font-weight:600; color:#1E293B;">Booking ID</span>
                  <span id="inBookingId"></span>
              </div>
              <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                  <span style="font-weight:600; color:#1E293B;">Service</span>
                  <span id="inBookingService"></span>
              </div>
              <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                  <span style="font-weight:600; color:#1E293B;">Date</span>
                  <span id="inBookingDate"></span>
              </div>
              <div style="display:flex; justify-content:space-between;">
                  <span style="font-weight:600; color:#1E293B;">Time</span>
                  <span id="inBookingTime"></span>
              </div>
          </div>
          <div style="display:flex; justify-content:center; gap:16px;">
              <button id="icRejectBtn" style="width:56px; height:56px; border-radius:50%; background:#EF4444; color:#fff; border:none; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 8px 20px rgba(239,68,68,0.3); transition:transform 0.2s;"><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 9c-1.6 0-3.15.25-4.6.72v3.1c0 .39-.23.74-.56.9-1.2.6-2.28 1.41-3.19 2.37-.2.22-.52.28-.79.16l-2.02-.9c-.27-.12-.44-.39-.44-.7V5.41C.44 4.8 1 4.29 1.6 4.38 4.95 4.9 8.35 5.23 12 5.23s7.05-.33 10.4-.85c.6-.09 1.16.42 1.16 1.03v9.23c0 .31-.17.58-.44.7l-2.02.9c-.27.12-.59.06-.79-.16-.91-.96-1.99-1.77-3.19-2.37-.33-.16-.56-.51-.56-.9v-3.1C15.15 9.25 13.6 9 12 9z"/></svg></button>
              <button id="icAcceptBtn" style="width:56px; height:56px; border-radius:50%; background:#10B981; color:#fff; border:none; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 8px 20px rgba(16,185,129,0.3); transition:transform 0.2s;"><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg></button>
          </div>
      </div>
  </div>

  <script src="{{ asset('assets/js/webrtc.js') }}"></script>

  <script>
    let toastTimeout;
    function showToast(title, desc, type = 'success', actionUrl = null, actionText = 'View') {
        const toast = document.getElementById('globalToast');
        if (!toast) return;

        // Reset classes
        toast.className = 'global-toast ' + type;
        
        // Update content
        document.getElementById('globalToastTitle').textContent = title;
        document.getElementById('globalToastDesc').textContent = desc;
        
        // Icon logic
        const iconContainer = document.getElementById('globalToastIcon');
        if (type === 'success') {
            iconContainer.innerHTML = '<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
        } else if (type === 'error') {
            iconContainer.innerHTML = '<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
        } else {
            // default / message
            iconContainer.innerHTML = '<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>';
        }

        // Action logic
        const actionBtn = document.getElementById('globalToastAction');
        if (actionUrl) {
            actionBtn.href = actionUrl;
            actionBtn.textContent = actionText;
            actionBtn.style.display = 'inline-block';
        } else {
            actionBtn.style.display = 'none';
        }

        // Show toast
        clearTimeout(toastTimeout);
        toast.classList.add('show');
        toastTimeout = setTimeout(() => { toast.classList.remove('show'); }, 5000);
    }

    window.showToast = showToast;

    (function initUnreadPolling() {
      var badge = document.getElementById('msgUnreadBadge');
      if (!badge) return;
      
      let lastCount = -1;
      
      function checkUnread() {
        fetch('/chat/unread-count', { headers: { 'Accept': 'application/json' } })
          .then(function(r){ return r.json(); })
          .then(function(d){
            if (d.count > 0) {
              badge.textContent = d.count > 99 ? '99+' : d.count;
              badge.style.display = '';
              
              if (lastCount !== -1 && d.count > lastCount && !window.location.pathname.includes('/dashboard/messages')) {
                  showToast('New Message', 'You received a new message.', 'message', '{{ route('dashboard.messages') }}');
              }
            } else {
              badge.style.display = 'none';
            }
            lastCount = d.count;
          })
          .catch(function(){})
          .finally(function(){ setTimeout(checkUnread, 10000); });
      }
      
      checkUnread();
    })();
  </script>

  <!-- Mobile Sidebar Toggle JS -->
  <script>
    (function() {
      var toggle   = document.getElementById('sidebarToggle');
      var sidebar  = document.querySelector('.sidebar');
      var overlay  = document.getElementById('sidebarOverlay');

      if (!toggle || !sidebar || !overlay) return;

      function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
      function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      }

      toggle.addEventListener('click', function() {
        sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
      });

      overlay.addEventListener('click', closeSidebar);

      // Close when a nav link is clicked on mobile
      sidebar.querySelectorAll('.nav-item').forEach(function(link) {
        link.addEventListener('click', function() {
          if (window.innerWidth <= 768) closeSidebar();
        });
      });
    })();
  </script>
</body>
</html>
