<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Partner Profile | Soulmate India</title>
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
        <a href="{{ route('dashboard.profile') }}" class="nav-item active">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          Edit Profile
        </a>
        <a href="{{ route('dashboard.bookings') }}" class="nav-item">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          My Bookings
        </a>
        <a href="{{ route('dashboard.earnings') }}" class="nav-item">
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
      <div class="middle-col">
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="page-header">
            <div class="page-title">
              <h1>
                <svg width="24" height="24" fill="none" stroke="#E91E63" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Edit Partner Profile
              </h1>
              <p>Update your profile information to attract more matches and bookings.</p>
            </div>
            <a href="#" class="btn-outline-primary">
              <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              View My Profile
            </a>
          </div>

          <!-- Profile Photos -->
          <div class="card">
            <div class="card-header">
              <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
              Profile Photos
            </div>
            <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 15px;">Add clear and recent photos. You can upload up to 8 photos.</p>
            <div class="photo-grid" id="photoGrid">
              @php 
                $photos = $user->profile_photos ?? []; 
                if($user->profile_image && !in_array($user->profile_image, $photos)) {
                    array_unshift($photos, $user->profile_image);
                }
              @endphp

              @foreach($photos as $photo)
              <div class="photo-item">
                <img src="{{ asset('storage/' . $photo) }}" alt="Photo">
                @if($user->profile_image == $photo)
                    <span class="photo-primary-badge">Primary</span>
                @else
                    <button type="submit" name="set_primary" value="{{ $photo }}" formnovalidate style="position:absolute; top:5px; left:5px; background:rgba(255,255,255,0.8); border:none; padding:2px 5px; font-size:10px; border-radius:4px; cursor:pointer; color:#E91E63; font-weight:bold; line-height: 1;">Set Primary</button>
                @endif
                <button type="submit" name="delete_photos[]" value="{{ $photo }}" formnovalidate style="position:absolute; top:5px; right:5px; background:rgba(255,0,0,0.8); border:none; padding:2px 5px; font-size:10px; border-radius:4px; cursor:pointer; color:#fff; font-weight:bold; line-height: 1;" onclick="return confirm('Delete this photo?')">✕</button>
              </div>
              @endforeach

              <label for="profileImageInput" class="photo-upload-btn" style="cursor: pointer;" id="addPhotoBtn">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                <span style="font-size: 11px; margin-top: 5px;">Add Photos</span>
                <input type="file" id="profileImageInput" name="profile_photos[]" style="display: none;" accept="image/*" multiple onchange="previewMultiplePhotos(this)">
              </label>
            </div>
            <script>
            function previewMultiplePhotos(input) {
                if (input.files) {
                    for (let i = 0; i < input.files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            let div = document.createElement('div');
                            div.className = 'photo-item';
                            div.innerHTML = '<img src="' + e.target.result + '" alt="Preview"><span class="photo-primary-badge" style="background: #a855f7;">Preview</span>';
                            document.getElementById('photoGrid').insertBefore(div, document.getElementById('addPhotoBtn'));
                        };
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
            </script>
          </div>

          <!-- Basic Information & About Me Grid -->
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Basic Information
              </div>
              <div class="form-grid">
                <div class="form-group">
                  <label>Full Name <span>*</span></label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                  <label>Height <span>*</span></label>
                  <select name="height" class="form-control">
                    <option value="5'4&quot; (163 cm)" {{ old('height', $user->height) == '5\'4" (163 cm)' ? 'selected' : '' }}>5'4" (163 cm)</option>
                    <option value="5'5&quot; (165 cm)" {{ old('height', $user->height) == '5\'5" (165 cm)' ? 'selected' : '' }}>5'5" (165 cm)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Date of Birth <span>*</span></label>
                  <input type="date" name="dob" class="form-control" value="{{ old('dob', $user->dob) }}">
                </div>
                <div class="form-group">
                  <label>Religion <span>*</span></label>
                  <select name="religion" class="form-control">
                    <option value="Hindu" {{ old('religion', $user->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Muslim" {{ old('religion', $user->religion) == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                    <option value="Christian" {{ old('religion', $user->religion) == 'Christian' ? 'selected' : '' }}>Christian</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gender <span>*</span></label>
                  <select name="gender" class="form-control">
                    <option value="female" {{ strtolower(old('gender', $user->gender)) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="male" {{ strtolower(old('gender', $user->gender)) == 'male' ? 'selected' : '' }}>Male</option>
                  </select>
                  <div style="font-size: 11px; color: #94A3B8; margin-top: 5px;">Age: {{ $user->age ?? 26 }}</div>
                </div>
                <div class="form-group">
                  <label>I want to <span>*</span></label>
                  <select name="iwantto" class="form-control">
                    <option value="become" {{ old('iwantto', $user->iwantto) == 'become' ? 'selected' : '' }}>Become a Partner</option>
                    <option value="find" {{ old('iwantto', $user->iwantto) == 'find' ? 'selected' : '' }}>Find a Partner</option>
                    <option value="both" {{ old('iwantto', $user->iwantto) == 'both' ? 'selected' : '' }}>Both</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Language(s) <span>*</span></label>
                  <select name="languages[]" class="form-control" multiple style="height: 40px;">
                    <option value="Hindi" {{ in_array('Hindi', $user->languages ?? []) ? 'selected' : '' }}>Hindi</option>
                    <option value="English" {{ in_array('English', $user->languages ?? []) ? 'selected' : '' }}>English</option>
                  </select>
                </div>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">
              <div class="card" style="flex: 1;">
                <div class="card-header">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                  About Me
                </div>
                <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 10px;">Tell people about yourself, your interests and what you are looking for.</p>
                <textarea name="bio" class="form-control" style="height: 120px;">{{ old('bio', $user->bio) }}</textarea>
                <div class="char-count">212/500</div>
              </div>

              <!-- Location & Availability moved here in CSS flow to match left-right grid alignment -->
            </div>
          </div>

          <!-- Location & Availability -->
          <div class="card">
            <div class="card-header">
              <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
              Location & Availability
            </div>
            <div class="form-grid">
              <div class="form-group">
                <label>City <span>*</span></label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
              </div>
              <div class="form-group">
                <label>Pincode <span>*</span></label>
                <input type="text" name="pincode" class="form-control" value="{{ old('pincode', $user->pincode) }}" required>
              </div>
              <div class="form-group" style="grid-column: 1 / -1;">
                <label>Preferred Location</label>
                <select name="preferred_location" class="form-control">
                  <option value="Delhi NCR" {{ old('preferred_location', $user->preferred_location) == 'Delhi NCR' ? 'selected' : '' }}>Delhi NCR</option>
                </select>
              </div>
              <div class="form-group" style="grid-column: 1 / -1;">
                <label>Availability Schedule <span>*</span></label>
                <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px;">
                  @php
                      $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                      $availabilities = old('availability', $user->availability ?? []);
                  @endphp
                  @foreach($days as $day)
                  @php
                      $dayActive = isset($availabilities[$day]) && isset($availabilities[$day]['active']);
                      $fromTime = $availabilities[$day]['from'] ?? '09:00';
                      $toTime = $availabilities[$day]['to'] ?? '18:00';
                  @endphp
                  <div style="display: flex; align-items: center; gap: 15px;">
                      <label style="margin:0; display:flex; align-items:center; cursor:pointer;">
                          <input type="checkbox" name="availability[{{$day}}][active]" value="1" style="display:none;" onchange="this.nextElementSibling.style.background = this.checked ? '#a855f7' : '#fff'; this.nextElementSibling.style.color = this.checked ? '#fff' : '#64748B';" {{ $dayActive ? 'checked' : '' }}>
                          <span style="display:inline-block; width: 60px; text-align:center; padding: 8px 0; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 500; font-size: 13px; background: {{ $dayActive ? '#a855f7' : '#fff' }}; color: {{ $dayActive ? '#fff' : '#64748B' }};">{{ $day }}</span>
                      </label>
                      <select name="availability[{{$day}}][from]" class="form-control" style="width: 100px; padding: 8px;">
                          @for($i=0; $i<24; $i++)
                          @php $t = sprintf('%02d:00', $i); @endphp
                          <option value="{{ $t }}" {{ $fromTime == $t ? 'selected' : '' }}>{{ $t }}</option>
                          @endfor
                      </select>
                      <span style="color: #64748B; font-size: 13px;">to</span>
                      <select name="availability[{{$day}}][to]" class="form-control" style="width: 100px; padding: 8px;">
                          @for($i=0; $i<24; $i++)
                          @php $t = sprintf('%02d:00', $i); @endphp
                          <option value="{{ $t }}" {{ $toTime == $t ? 'selected' : '' }}>{{ $t }}</option>
                          @endfor
                      </select>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <!-- Categories, Interests & Looking For Grid -->
          <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                My Categories
              </div>
              <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 15px;">Select your primary categories (you can choose multiple).</p>
              
              @php
                  $userCategories = explode(',', old('category', $user->category ?? ''));
              @endphp
              <div class="pill-group">
                @foreach($categories as $category)
                <label>
                  <input type="checkbox" name="category[]" value="{{ $category->slug }}" class="pill-checkbox" {{ in_array($category->slug, $userCategories) ? 'checked' : '' }}>
                  <span class="pill-label">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: {{ in_array($category->slug, $userCategories) ? 'block' : 'none' }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ $category->name }} 
                    (
                      @if($category->prices)
                        {{ number_format($category->prices, 0) }}
                      @else
                        N/A
                      @endif
                    )
                  </span>
                </label>
                @endforeach
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                Interests & Hobbies
              </div>
              <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 15px;">Type your interests and press Enter to add them.</p>
              
              <style>
                  .tag-container {
                      display: flex;
                      flex-wrap: wrap;
                      gap: 8px;
                      padding: 8px;
                      border: 1px solid #E2E8F0;
                      border-radius: 8px;
                      background: #FFF;
                      min-height: 42px;
                  }
                  .tag-container:focus-within {
                      border-color: #E91E63;
                  }
                  .tag-item {
                      background: #FDF2F8;
                      border: 1px solid #FCE7F3;
                      color: #E91E63;
                      padding: 4px 12px;
                      border-radius: 20px;
                      font-size: 13px;
                      display: flex;
                      align-items: center;
                      gap: 6px;
                      font-weight: 500;
                  }
                  .tag-item .remove-tag {
                      cursor: pointer;
                      font-weight: bold;
                      font-size: 16px;
                      line-height: 1;
                      color: #E91E63;
                  }
                  .tag-input {
                      border: none;
                      outline: none;
                      flex: 1;
                      min-width: 150px;
                      font-size: 14px;
                      background: transparent;
                      padding: 4px;
                      color: #1E293B;
                  }
              </style>
              
              <div class="tag-container" id="interestsContainer">
                  @foreach(old('interests', $user->interests ?? []) as $interest)
                      <div class="tag-item">
                          <span>{{ $interest }}</span>
                          <span class="remove-tag" onclick="this.parentElement.remove(); updateInterestsInput();">&times;</span>
                      </div>
                  @endforeach
                  <input type="text" class="tag-input" id="interestInput" placeholder="Type an interest and press Enter">
              </div>
              <div id="hiddenInterests">
                  @foreach(old('interests', $user->interests ?? []) as $interest)
                      <input type="hidden" name="interests[]" value="{{ $interest }}">
                  @endforeach
              </div>
              
              <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      const input = document.getElementById('interestInput');
                      input.addEventListener('keydown', function(e) {
                          if (e.key === 'Enter') {
                              e.preventDefault(); // Prevent form submission
                              const val = this.value.trim();
                              if (val) {
                                  // Create tag UI
                                  const tagItem = document.createElement('div');
                                  tagItem.className = 'tag-item';
                                  tagItem.innerHTML = '<span>' + val + '</span> <span class="remove-tag" onclick="this.parentElement.remove(); updateInterestsInput();">&times;</span>';
                                  this.parentElement.insertBefore(tagItem, this);
                                  
                                  this.value = '';
                                  updateInterestsInput();
                              }
                          }
                      });
                  });

                  function updateInterestsInput() {
                      const container = document.getElementById('interestsContainer');
                      const tags = container.querySelectorAll('.tag-item span:first-child');
                      const hiddenContainer = document.getElementById('hiddenInterests');
                      hiddenContainer.innerHTML = '';
                      tags.forEach(tag => {
                          const val = tag.textContent.trim();
                          hiddenContainer.innerHTML += '<input type="hidden" name="interests[]" value="' + val + '">';
                      });
                  }
              </script>
            </div>

            <!-- Other Details -->
            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Other Details
              </div>
              <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 10px;">Add any additional information.</p>
              <textarea name="other_details" class="form-control" style="height: 80px;">{{ old('other_details', $user->other_details ?? 'I love meeting new people and creating beautiful memories together.') }}</textarea>
              <div class="char-count">72/500</div>

              <div class="form-group" style="margin-top: 20px;">
                <label>Account Status</label>
                <select name="is_active" class="form-control">
                  <option value="1" {{ old('is_active', $user->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ old('is_active', $user->is_active ?? 1) == 0 ? 'selected' : '' }}>Deactivated</option>
                </select>
                <div style="font-size: 11px; color: #94A3B8; margin-top: 5px;">Deactivating your account will hide it from other users.</div>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <button type="button" class="btn-cancel">Cancel</button>
            <button type="submit" class="btn-save">
              <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
              Save Changes
            </button>
          </div>

        </form>
      </div>

      <!-- Right Column -->
      <div class="right-col">
        <!-- Preview Card -->
        <div class="card preview-card">
          <div style="padding: 15px 20px; font-weight: 700; color: #1E293B; display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" fill="none" stroke="#E91E63" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            Profile Preview
          </div>
          @if($user->profile_image)
            <img src="{{ asset('storage/' . $user->profile_image) }}" class="preview-img">
          @else
            <div style="height: 250px; background: #E2E8F0; display: flex; align-items: center; justify-content: center; color: #94A3B8;">No Image</div>
          @endif
          <div class="preview-content">
            <h3 class="preview-name">
              {{ $user->name }}
              <svg width="18" height="18" fill="#E91E63" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </h3>
            <div class="preview-meta">{{ $user->age ?? 26 }} • {{ $user->height ?? "5'4\"" }} • <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> {{ $user->city ?? 'Delhi' }}</div>
            
            <div class="preview-rating">
              <svg width="14" height="14" fill="#FBBF24" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              4.8 <span style="color: #94A3B8; font-weight: normal;">(120 Reviews)</span>
            </div>

            <div class="preview-tags">
              @foreach($user->interests ?? ['Movie', 'Shopping', 'Dining', 'Travel'] as $tag)
                <span class="preview-tag">{{ $tag }}</span>
              @endforeach
            </div>

            <div class="preview-desc">
              Fun, genuine and 100% real. Let's create beautiful memories together.
            </div>

            <div class="preview-details">
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> {{ $user->gender ?? 'Female' }}</div>
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> 18 - 35</div>
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg> Hindi, English</div>
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> Mon - Sun</div>
              <div style="grid-column: span 2;"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Within 1 hour</div>
            </div>
          </div>
        </div>

        <!-- Tips Card -->
        <div class="card tips-card">
          <div style="font-weight: 700; color: #E91E63; display: flex; align-items: center; gap: 8px; margin-bottom: 15px;">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            Profile Tips
          </div>
          <ul class="tips-list">
            <li>Use clear and recent photos.</li>
            <li>Write a genuine and positive bio.</li>
            <li>Mention your interests and hobbies.</li>
            <li>Keep your profile updated for better matches.</li>
          </ul>
          <div class="tips-signature">
            Be Real<br>Be You <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Add simple toggle logic for the pill checkboxes UI
    document.querySelectorAll('.pill-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const icon = this.nextElementSibling.querySelector('svg');
        if(this.checked) {
          icon.style.display = 'block';
        } else {
          icon.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>
