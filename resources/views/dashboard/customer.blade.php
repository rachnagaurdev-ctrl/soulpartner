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
</style>
@endsection

    <div class="content-area">
      <!-- Welcome Banner -->
      <div class="welcome-banner">
        <div class="welcome-text">
          <h1>Hello, {{ $user->name ?? 'User' }} ❤️</h1>
          <p>Good things take time, and the right person is worth the wait.</p>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-value">5</div>
          <div class="stat-label">New Matches</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">3</div>
          <div class="stat-label">Messages</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">12</div>
          <div class="stat-label">Profile Views</div>
        </div>
        <div class="stat-card" style="text-align: left;">
          <div class="stat-label">Membership</div>
          <div class="stat-value" style="font-size: 18px;">Premium Yearly</div>
          <button style="border: 1px solid #E91E63; color: #E91E63; background: none; padding: 5px 15px; border-radius: 15px; margin-top: 10px;">Manage Plan</button>
        </div>
      </div>

    </div>
  


@endsection
