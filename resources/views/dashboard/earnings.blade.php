<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Earnings & Wallet | Soulmate India</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
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
    
    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #0B1120;
      color: #FFF;
      display: flex;
      flex-direction: column;
      height: 100%;
      padding-top: 20px;
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
    }
    .middle-col {
      flex: 1;
      max-width: 800px;
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
  </style>
</head>
<body>

  <!-- Topbar -->
  <div class="topbar">
    <div class="topbar-left">
      <img src="{{ asset('assets/images/logo.jpg') }}" alt="Soulmate India">
    </div>
    <div class="search-bar">
      <svg width="18" height="18" fill="none" stroke="#A0AEC0" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
      <input type="text" placeholder="Search partners, activities, or location...">
    </div>
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
    <!-- Sidebar -->
    <aside class="sidebar">
      <ul class="nav-list">
        <a href="{{ route('dashboard') }}" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
          Dashboard
        </a>
        <a href="{{ route('dashboard.profile') }}" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          Edit Profile
        </a>
        <a href="{{ route('dashboard.bookings') }}" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          My Bookings
        </a>
        <a href="{{ route('dashboard.earnings') }}" class="nav-item active">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Earnings
          <span class="nav-badge">3</span>
        </a>
        <a href="#" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
          Messages
        </a>
        <a href="#" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
          Reviews
        </a>
        <a href="#" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
          Membership
        </a>
        <a href="#" class="nav-item">
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
</body>
</html>