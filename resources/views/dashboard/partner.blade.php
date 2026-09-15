<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Partner Dashboard | Soulmate India</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'DM Sans', sans-serif;
      background-color: #FAFAFA;
      color: #333;
      display: flex;
      height: 100vh;
      overflow: hidden;
    }
    
    /* Sidebar styling based on reference */
    .sidebar {
      width: 250px;
      background-color: #10162A;
      color: #FFF;
      display: flex;
      flex-direction: column;
      height: 100%;
    }
    .sidebar-header {
      padding: 20px;
      background-color: #FFF;
      text-align: center;
    }
    .sidebar-header img {
      max-width: 150px;
    }
    .nav-list {
      list-style: none;
      padding: 20px 0;
      margin: 0;
      flex: 1;
    }
    .nav-item {
      padding: 15px 25px;
      display: flex;
      align-items: center;
      color: #A0AEC0;
      text-decoration: none;
      font-weight: 500;
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
      width: 20px;
      height: 20px;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
    }
    .topbar {
      height: 70px;
      background-color: #FFF;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }

    /* Content Area */
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

    /* Stat Cards */
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
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="{{ asset('assets/images/logo.jpg') }}" alt="Soulmate India">
    </div>
    <ul class="nav-list">
      <a href="#" class="nav-item active">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        Dashboard
      </a>
      <a href="#" class="nav-item">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        Profile
      </a>
      <a href="#" class="nav-item">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        Bookings
      </a>
      <a href="#" class="nav-item">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Earnings
      </a>
      <a href="#" class="nav-item">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        Messages
      </a>
    </ul>
    <div style="padding: 20px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background: none; border: none; color: #E91E63; cursor: pointer; display: flex; align-items: center;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 10px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <header class="topbar">
      <div></div>
      <div style="display: flex; align-items: center; gap: 20px;">
        <div style="width: 40px; height: 40px; border-radius: 50%; background: #E2E8F0;"></div>
        <div>
            <div style="font-weight: 600;">{{ $user->name ?? 'User' }}</div>
            <div style="font-size: 12px; color: #718096;">Partner</div>
        </div>
      </div>
    </header>

    <div class="content-area">
      <!-- Welcome Banner -->
      <div class="welcome-banner">
        <div class="welcome-text">
          <h1>Hello, {{ $user->name ?? 'User' }} ✨</h1>
          <p>Ready to connect and earn? Your companion dashboard is ready.</p>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-value">12</div>
          <div class="stat-label">Total Bookings</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">₹18,500</div>
          <div class="stat-label">Total Earnings</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">₹4,200</div>
          <div class="stat-label">Pending Earnings</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">248</div>
          <div class="stat-label">Profile Views</div>
        </div>
      </div>
    </div>
  </main>

</body>
</html>
