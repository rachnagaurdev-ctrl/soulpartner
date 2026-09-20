@extends('layouts.dashboard')
@section('title', 'Partner Dashboard | Soulmate India')
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
</style>
@endsection

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
  


@endsection
