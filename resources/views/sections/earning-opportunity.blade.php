 <section class="section earning-section" id="earning">
      <div class="earning-bg-decor-left">
        <img src="{{isset($data['background_image']) ? get_storage_url($data['background_image']) : asset('assets/images/earning-couple.jpg')}}" alt="Partners with Soulmate India" class="earning-couple-img">
      </div>

      <div class="earning-decor-sticker">
        <span class="sticker-line1">Real People</span>
        <span class="sticker-line2">Real Connections</span>
        <span class="sticker-line3">For Real Moments <span class="sticker-heart">♡</span></span>
        <svg class="sticker-underline" width="115" height="12" viewBox="0 0 115 12" fill="none">
          <path d="M2 9C28 3 80 2 113 8" stroke="#ef2c8c" stroke-width="2.5" stroke-linecap="round" />
        </svg>
      </div>

      <div class="container earning-container">
        <!-- Top Badge -->
        <div class="earning-badge">
          <span class="earning-badge-icon">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 12V8H6a2 2 0 0 1-2-2c0-1.1.9-2 2-2h12v4" />
              <path d="M4 6v12c0 1.1.9 2 2 2h14v-4" />
              <path d="M18 12a2 2 0 0 0-2 2c0 1.1.9 2 2 2h4v-4h-4z" />
            </svg>
          </span>
          <span>{{$data['title'] ?? ''}}</span>
        </div>

        <!-- Heading -->
        <h2 class="earning-title">{!! $data['subtitle'] !!}</h2>

        <!-- Subtitle -->
        <p class="earning-subtitle">
          {!! $data['description'] !!}
        </p>

        <!-- 4 Stats Cards -->
         @if(isset($data['list']))
        <div class="earning-stats-grid">
          @foreach($data['list'] ?? []  as $item)
          <div class="earning-stat-card">
            <div class="earning-card-icon">
              <i class="{{ $item['icon'] ?? '' }}"></i>
            </div>
            <div class="earning-stat-num">{{ $item['numbers'] ?? '' }}</div>
            <div class="earning-stat-label">{{ $item['title'] ?? '' }}</div>
          </div>
          @endforeach

        </div>
        @endif

        <!-- Special Launch Offer Banner -->
        <!-- <div class="earning-offer-banner">
          <div class="offer-left">
            <span class="offer-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 12 20 22 4 22 4 12" />
                <rect x="2" y="7" width="20" height="5" />
                <line x1="12" y1="22" x2="12" y2="7" />
                <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z" />
                <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z" />
              </svg>
            </span>
            <strong>Special Launch Offer!</strong>
          </div>
          <span class="offer-divider"></span>
          <div class="offer-text">
            Get up to <strong>60% OFF</strong> on membership
          </div>
          <div class="offer-doodle">
            <svg width="36" height="20" viewBox="0 0 36 20" fill="none">
              <path d="M2 15C10 18 18 10 24 12C28 13.5 28 8 26 5C24 2 20 5 22 9C24 13 32 10 34 3" stroke="white"
                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div> -->

        <!-- Section Divider Heading -->
        <div class="earning-subhead-wrap">
          <span class="subhead-dash"></span>
          <h3 class="earning-subhead">{{$data['title_2'] ?? ''}}</h3>
          <span class="subhead-dash"></span>
        </div>
        <p class="earning-subhead-desc">{!! $data['description_2'] ?? '' !!}</p>

        <!-- 4 Categories Grid -->
        @if(isset($data['list_2']))
        <div class="earning-categories-grid">
          <!-- Card 1 -->
           @foreach($data['list_2'] as $list)
          <div class="earning-category-card">
            <div class="category-icon-wrap">
              <i class="{{ $list['icon'] ?? '' }}"></i>
                
            </div>
            <div class="category-details">
              <h4>{{ $list['title'] ?? '' }}</h4>
              <div class="category-rate"> {{$list['rate'] ?? ''}}</div>
              <p>{{$list['description'] ?? ''}}</p>
            </div>
          </div>
          @endforeach

        </div>
        @endif

        <!-- Action Button -->
        <div class="earning-cta-wrap">
            @if(isset($data['cta']['label']))
                <a href="{{ get_cta_link($data['cta']['label']) }}" class="earning-cta-btn">{{ $data['cta']['label'] }} →</a>
            @endif
        </div>
      </div>
    </section>