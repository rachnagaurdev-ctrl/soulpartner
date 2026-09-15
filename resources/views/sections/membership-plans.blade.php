 <section class="section membership-section" id="membership">
      <div class="container membership-outer">
        <!-- Left Intro -->
        <div class="membership-intro">
          <div class="eyebrow">{{$data['title'] ?? 'Membership Plans'}}</div>
          <h2>{!! $data['subtitle'] !!}</h2>
          <p>{!! $data['description'] !!}</p>
        </div>

        <!-- Right: Plan Cards Row -->
        <div class="plans-row">
            @php
    $plans = get_plans(10);
@endphp
          @forelse($plans as $key => $plan)
          <article class="plan-card plan-{{ $key }}{{ $key === 'yearly' ? '' : '' }}">
            @if(!empty($plan['badge']))
            <div class="plan-best-value-badge">{{ $plan['badge'] }}</div>
            @endif
            @if($key === 'yearly')
            <div class="plan-refund-badge">50%<br><span>Refund</span></div>
            @endif
            <div class="plan-card-header">
              <div class="plan-icon plan-icon-{{ $key }}">{{ $plan['icon'] ?? '🛡️' }}</div>
              <div>
                <div class="plan-name {{ $key === 'yearly' ? 'plan-name-yearly' : '' }}">{{ $plan['name'] }}</div>
                <div class="plan-price {{ $key === 'yearly' ? 'plan-price-yearly' : '' }}">₹{{ number_format($plan['price']) }} <span class="plan-period">/ {{ $plan['period'] }}</span></div>
              </div>
            </div>
            <div class="plan-match-pill plan-match-{{ $key }}">{{ $plan['matches'] }}</div>
            <ul class="plan-features {{ $key === 'yearly' ? 'plan-features-yearly' : '' }}">
              @foreach($plan['features'] as $feat)
              <li>{{ $feat }}</li>
              @endforeach
            </ul>
            <button class="plan-btn plan-btn-{{ $key }}" onclick="window.location='/checkout?plan={{ $key }}'">Choose Plan</button>
          </article>
          @empty
          <p class="text-center" style="width:100%;">No plans available. Please check back later.</p>
          @endforelse
        </div>
      </div>
    </section>