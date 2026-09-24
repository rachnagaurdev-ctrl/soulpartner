 <header class="header">
    <div class="container nav">
      <a class="brand" href="{{ url('/') }}">
        @if(\App\Models\Setting::get('logo'))
          <img src="{{ get_storage_url(\App\Models\Setting::get('logo')) }}" alt="{{ \App\Models\Setting::get('site_name', 'Soulmate India') }}">
        @else
          <img src="{{asset('assets/images/logo.jpeg')}}" alt="{{ \App\Models\Setting::get('site_name', 'Soulmate India') }}">
        @endif
      </a>
      <nav class="navlinks" id="navlinks">
        @php
            $headerNav = \App\Models\Setting::get('header_nav', []);
        @endphp
        @if(is_array($headerNav) && count($headerNav) > 0)
            @foreach($headerNav as $navItem)
                <a href="{{ $navItem['url'] ?? '#' }}" target="{{ !empty($navItem['open_in_new_tab']) ? '_blank' : '_self' }}">{{ $navItem['label'] ?? '' }}</a>
            @endforeach
        @else
            <a class="active" href="{{ url('/') }}#home">Home</a>
            <a href="partners.html">Discover</a>
            <a href="{{ url('/') }}#categories">Categories</a>
            <a href="{{ url('/') }}#membership">Membership</a>
            <a href="{{ url('/') }}#earning">Earn With Us</a>
            <a href="about-us.html">About Us</a>
            <a href="contact-us.html">Contact</a>
        @endif
      </nav>
      <div class="actions">
        <!-- <button class="search-icon" aria-label="Search">⌕</button> -->
        @auth
          <div class="user-dropdown-wrap" style="position: relative; display: inline-block;">
            <button class="btn btn-outline user-dropdown-btn" style="display: flex; align-items: center; gap: 8px;">
              {{ Auth::user()->name }} <i class="fa-solid fa-chevron-down" style="font-size: 0.8em;"></i>
            </button>
            <div class="user-dropdown-menu">
              <a href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
              <a href="{{ route('dashboard.profile') }}"><i class="fa-regular fa-user"></i> My Profile</a>
              <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
              </form>
            </div>
          </div>
          <style>
            .user-dropdown-menu {
              position: absolute;
              top: 100%;
              right: 0;
              margin-top: 10px;
              background: #fff;
              min-width: 180px;
              border-radius: 12px;
              box-shadow: 0 10px 30px rgba(0,0,0,0.1);
              border: 1px solid #f0e6ee;
              opacity: 0;
              visibility: hidden;
              transform: translateY(10px);
              transition: all 0.3s ease;
              z-index: 99;
              padding: 8px 0;
            }
            .user-dropdown-wrap:hover .user-dropdown-menu {
              opacity: 1;
              visibility: visible;
              transform: translateY(0);
            }
            .user-dropdown-menu a, .user-dropdown-menu .logout-btn {
              display: flex;
              align-items: center;
              gap: 10px;
              padding: 10px 20px;
              color: var(--navy);
              text-decoration: none;
              font-size: 14px;
              font-weight: 600;
              width: 100%;
              text-align: left;
              background: none;
              border: none;
              cursor: pointer;
              transition: background 0.2s, color 0.2s;
            }
            .user-dropdown-menu a:hover, .user-dropdown-menu .logout-btn:hover {
              background: #fcf4f9;
              color: var(--pink);
            }
            .user-dropdown-menu i {
              width: 16px;
              text-align: center;
              color: #a491a9;
            }
            .user-dropdown-menu a:hover i, .user-dropdown-menu .logout-btn:hover i {
              color: var(--pink);
            }
          </style>
        @else
          <button class="btn btn-outline" id="loginBtn">Login</button>
          <button class="btn btn-primary" id="registerBtn">Register</button>
        @endauth
        <button class="menu" id="menu" aria-label="Open navigation">☰</button>
      </div>
    </div>
  </header>