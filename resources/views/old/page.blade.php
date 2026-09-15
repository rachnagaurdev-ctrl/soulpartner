@extends('partial.layout')
@section('content')
   <section class="hero">
      <div class="container hero-content">
        <div class="hero-copy">
          <div class="eyebrow">Partner on Rent</div>
          <h1>Find the <em>Perfect</em><br>Companion for<br>Your Special Moments</h1>
          <p>Whether it's a movie, shopping, travel or just a great conversation —<br class="desktop"> find your ideal
            partner, safely and easily.</p>
        </div>
        <div class="hero-tag">Real People<br><span>Real Connections</span><br>For Real Moments ♡</div>
      </div>
      <form class="searchbox" onsubmit="return false">
        <div class="searchfield">
          <div class="ico">♙</div>
          <div><label>What do you need?</label><select>
              <option value="">e.g. Movie, Shopping, Travel</option>
              @foreach($categories as $cat)
              <option value="{{ $cat->name }}">{{ $cat->name }}</option>
              @endforeach
            </select></div>
        </div>
        <div class="searchfield">
          <div class="ico">⌖</div>
          <div><label>Location</label><select>
              <option>Select city</option>
              <option>Delhi</option>
              <option>Mumbai</option>
              <option>Bengaluru</option>
            </select></div>
        </div>
        <div class="searchfield">
          <div class="ico">▣</div>
          <div><label>Date & Time</label><select>
              <option>Select date & time</option>
              <option>Today</option>
              <option>Tomorrow</option>
            </select></div>
        </div>
        <button class="searchbtn">⌕ &nbsp; Find Partners</button>
      </form>
    </section>

    <section class="section categories" id="categories">
      <div class="container">
        <div class="section-head">
          <h2>Explore Categories</h2>
          <p>Choose from a variety of activities and find your perfect companion.</p>
        </div>
        <div class="category-grid">
          @forelse($categories as $cat)
          <article class="category-card">
            <div class="category-img">
              <img src="{{ $cat->image ? asset('storage/' . $cat->image) : asset('assets/images/movie.jpg') }}" alt="{{ $cat->name }}">
            </div>
            <div class="category-body">
              <div class="category-icon">{{ $cat->icon ?? '▣' }}</div>
              <h3>{{ $cat->name }}</h3>
              <p>{{ $cat->description ?? 'Find the perfect companion for this activity.' }}</p>
            </div>
          </article>
          @empty
          <p class="text-center" style="grid-column:1/-1;">No categories found.</p>
          @endforelse
        </div>
      </div>
    </section>

    <section class="section why" id="why">
      <div class="container">
        <div class="why-grid">
          <div class="why-intro">
            <div class="eyebrow">Why Choose Us?</div>
            <h2>Safe, Simple<br>&amp; Trusted</h2>
            <p>Your safety and comfort are our priority.</p>
          </div>
          <div class="feature-card">
            <div class="ficon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                <path d="m9 12 2 2 4-4"></path>
              </svg>
            </div>
            <h3>Verified Profiles</h3>
            <p>Real people, verified ID &amp; background checked.</p>
          </div>
          <div class="feature-card">
            <div class="ficon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
            </div>
            <h3>Secure Payments</h3>
            <p>100% safe and hassle-free transactions.</p>
          </div>
          <div class="feature-card">
            <div class="ficon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                <circle cx="9" cy="10" r="1"></circle>
                <circle cx="12" cy="10" r="1"></circle>
                <circle cx="15" cy="10" r="1"></circle>
              </svg>
            </div>
            <h3>In-App Chat</h3>
            <p>Connect and plan your time together.</p>
          </div>
          <div class="feature-card">
            <div class="ficon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
              </svg>
            </div>
            <h3>Trusted Community</h3>
            <p>Real reviews, ratings and verified experiences.</p>
          </div>
          <div class="feature-card">
            <div class="ficon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                <path
                  d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z">
                </path>
              </svg>
            </div>
            <h3>24/7 Support</h3>
            <p>We're always here to help you.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section how-section" id="how">
      <div class="container">
        <div class="how-title">
          <h2><span class="heart-icon">♥</span> How It Works</h2>
          <p>Getting your perfect partner is just a few simple steps.</p>
        </div>

        <div class="how-grid">
          <div class="steps-container">
            <div class="steps">
              <div class="step">
                <div class="step-top">
                  <span class="step-num">1</span>
                  <div class="step-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                  </div>
                </div>
                <div class="step-body">
                  <h3>Create Account</h3>
                  <p>Sign up and complete your profile.</p>
                </div>
              </div>

              <div class="step-arrow">→</div>

              <div class="step">
                <div class="step-top">
                  <span class="step-num">2</span>
                  <div class="step-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                  </div>
                </div>
                <div class="step-body">
                  <h3>Browse Partners</h3>
                  <p>Explore profiles and find your match.</p>
                </div>
              </div>

              <div class="step-arrow">→</div>

              <div class="step">
                <div class="step-top">
                  <span class="step-num">3</span>
                  <div class="step-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                  </div>
                </div>
                <div class="step-body">
                  <h3>Book &amp; Pay</h3>
                  <p>Choose your date, time and make a secure payment.</p>
                </div>
              </div>

              <div class="step-arrow">→</div>

              <div class="step">
                <div class="step-top">
                  <span class="step-num">4</span>
                  <div class="step-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                  </div>
                </div>
                <div class="step-body">
                  <h3>Chat</h3>
                  <p>Connect and plan your meeting.</p>
                </div>
              </div>

              <div class="step-arrow">→</div>

              <div class="step">
                <div class="step-top">
                  <span class="step-num">5</span>
                  <div class="step-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                      </path>
                    </svg>
                  </div>
                </div>
                <div class="step-body">
                  <h3>Enjoy Your Time</h3>
                  <p>Meet, make memories and share your experience.</p>
                </div>
              </div>
            </div>
          </div>

          <aside class="cta-card">
            <div class="cta-content">
              <h3>Ready for Your<br>Next Adventure?</h3>
              <p>Find the right partner for your favorite activities and make every moment special.</p>
              <a class="btn btn-primary" href="#discover">Explore Partners →</a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <section class="section reviews" id="discover">
      <div class="container">
        <div class="review-head">
          <div>
            <div class="eyebrow">What Our Users Say</div>
            <h2>Real Stories, Real Connections.</h2>
            <p>Hear from people who found their perfect partner and made unforgettable memories.</p>
          </div>
          <div class="review-arrows"><button class="arrow" id="prev">←</button><button class="arrow"
              id="next">→</button></div>
        </div>
        <div class="review-grid" id="reviewGrid">
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/shopping.jpg')}}" alt="">
              <div><strong>Priya Sharma</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“I booked a movie companion for the first time and it was an amazing experience. She was friendly, fun
              and made the evening special.”</p>
            <div class="tag">▣ &nbsp; Movie Companion</div>
          </article>
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/sports.jpg')}}" alt="">
              <div><strong>Rahul Mehta</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“The platform is simple to use and everything is so secure. I found a great travel partner and we had the
              best trip together!”</p>
            <div class="tag">✈ &nbsp; Travel Companion</div>
          </article>
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/dining.jpg')}}" alt="">
              <div><strong>Neha Verma</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“Loved the whole experience! The partner was genuinely kind and the service was smooth from booking to
              meeting.”</p>
            <div class="tag">♜ &nbsp; Dining Companion</div>
          </article>
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/travel.jpg')}}" alt="">
              <div><strong>Amit Singh</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“Very professional and trustworthy platform. I've already booked twice and both experiences were
              fantastic!”</p>
            <div class="tag">♨ &nbsp; Sports &amp; Activity</div>
          </article>
        </div>
      </div>
    </section>

    <section class="section membership-section" id="membership">
      <div class="container membership-outer">
        <!-- Left Intro -->
        <div class="membership-intro">
          <div class="eyebrow">💗 Membership Plans</div>
          <h2>More Benefits,<br><span class="highlight">More Connections</span></h2>
          <p>Choose the plan that works best for you<br>and start connecting with compatible partners.</p>
        </div>

        <!-- Right: Plan Cards Row -->
        <div class="plans-row">
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

    <!-- Earning Opportunity Section -->
    <section class="section earning-section" id="earning">
      <div class="earning-bg-decor-left">
        <img src="{{asset('assets/images/earning-couple.jpg')}}" alt="Partners with Soulmate India" class="earning-couple-img">
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
          <span>Earning Opportunity</span>
        </div>

        <!-- Heading -->
        <h2 class="earning-title">Earn Up to <span class="highlight-pink">₹2,000</span> Per Hour</h2>

        <!-- Subtitle -->
        <p class="earning-subtitle">
          Join India's trusted partner-on-rent platform. Set your own rates, choose your services, and<br
            class="desktop"> earn while helping others.
        </p>

        <!-- 4 Stats Cards -->
        <div class="earning-stats-grid">
          <div class="earning-stat-card">
            <div class="earning-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <ellipse cx="12" cy="7" rx="8" ry="4" />
                <path d="M4 7v5c0 2.21 3.58 4 8 4s8-1.79 8-4V7" />
                <path d="M4 12v5c0 2.21 3.58 4 8 4s8-1.79 8-4v-5" />
              </svg>
            </div>
            <div class="earning-stat-num">₹2K/hr</div>
            <div class="earning-stat-label">Earn Per Hour</div>
          </div>

          <div class="earning-stat-card">
            <div class="earning-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
            </div>
            <div class="earning-stat-num">80%</div>
            <div class="earning-stat-label">You Keep</div>
          </div>

          <div class="earning-stat-card">
            <div class="earning-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="11" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
            </div>
            <div class="earning-stat-num">Millions</div>
            <div class="earning-stat-label">of Potential Customers</div>
          </div>

          <div class="earning-stat-card">
            <div class="earning-card-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7zm3 16h14" />
              </svg>
            </div>
            <div class="earning-stat-num">₹199</div>
            <div class="earning-stat-label">Membership From</div>
          </div>
        </div>

        <!-- Special Launch Offer Banner -->
        <div class="earning-offer-banner">
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
        </div>

        <!-- Section Divider Heading -->
        <div class="earning-subhead-wrap">
          <span class="subhead-dash"></span>
          <h3 class="earning-subhead">How Partners Earn</h3>
          <span class="subhead-dash"></span>
        </div>
        <p class="earning-subhead-desc">Choose from a variety of activities and start earning today.</p>

        <!-- 4 Categories Grid -->
        <div class="earning-categories-grid">
          <!-- Card 1 -->
          <div class="earning-category-card">
            <div class="category-icon-wrap">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
            </div>
            <div class="category-details">
              <h4>Elder Care</h4>
              <div class="category-rate">₹1,000/hour</div>
              <p>Companionship and support for your loved ones.</p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="earning-category-card">
            <div class="category-icon-wrap">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8h1a4 4 0 0 1 0 8h-1" />
                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z" />
                <line x1="6" y1="1" x2="6" y2="4" />
                <line x1="10" y1="1" x2="10" y2="4" />
                <line x1="14" y1="1" x2="14" y2="4" />
              </svg>
            </div>
            <div class="category-details">
              <h4>Hangout</h4>
              <div class="category-rate">₹1,500/hour</div>
              <p>Enjoy casual outings, coffee and great conversations.</p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="earning-category-card">
            <div class="category-icon-wrap">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m14.5 17.5 3 3a1.4 1.4 0 0 0 2 0l2-2a1.4 1.4 0 0 0 0-2l-3-3" />
                <path d="m11 11-7.5 7.5a1.4 1.4 0 0 0 0 2l2 2a1.4 1.4 0 0 0 2 0L15 15" />
                <path d="M13 2 9 6l4 4 4-4-4-4z" />
                <path d="M19 8l2-2" />
                <path d="M21 14l2 2" />
                <path d="M14 21l2 2" />
              </svg>
            </div>
            <div class="category-details">
              <h4>Events &amp; Clubbing</h4>
              <div class="category-rate">₹2,000/hour</div>
              <p>Make events more special with the right company.</p>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="earning-category-card">
            <div class="category-icon-wrap">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3" />
                <path
                  d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
              </svg>
            </div>
            <div class="category-details">
              <h4>Set Your Own Rates</h4>
              <div class="category-rate">Flexible &amp; Customizable</div>
              <p>Choose your services and set your own price.</p>
            </div>
          </div>
        </div>

        <!-- Action Button -->
        <div class="earning-cta-wrap">
          <a href="#register" class="earning-cta-btn" id="startEarningBtn">Become a Partner →</a>
        </div>
      </div>
    </section>

    <section id="about" style="display:none"></section>
    <section id="contact" style="display:none"></section>
      <!-- FAQ Section -->
  <section class="section faq-section" id="faq">
    <div class="container faq-container">
      <div class="faq-head">
        <h2>Frequently Asked Questions</h2>
        <p>Everything you need to know about Soulmate India and how it works.</p>
      </div>

      <div class="faq-list">

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>What is Soulmate India?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>Soulmate India is a trusted companion platform that connects you with verified partners for activities
              like movies, shopping, dining, travel, events and more — safely and easily.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Are the companions verified?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>Yes! Every companion on Soulmate India goes through a thorough ID verification and background check
              process before their profile is approved and made visible on the platform.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>How do I book a companion?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>Simply create an account, browse available companion profiles, select your preferred companion, choose a
              date and time, make a secure payment and you're all set! You can also chat with them before your meeting.
            </p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Is my personal information safe?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>Absolutely. We take your privacy very seriously. Your personal data is encrypted, never shared with third
              parties, and all in-app communications happen through our secure messaging system.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>What activities can I book a companion for?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>You can book companions for movies, shopping, dining, travel, sports &amp; fitness, events, live
              concerts, corporate outings, and many more categories. We keep adding new activities regularly.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>How does payment work?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>All payments are made securely through our platform using UPI, credit/debit cards, or net banking.
              Payments are held until after the session, ensuring full safety for both parties.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Can I cancel or reschedule a booking?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>Yes. You can cancel or reschedule a booking up to 24 hours in advance without any penalty. Cancellations
              made within 24 hours may be subject to a partial refund policy as per our terms.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Is Soulmate India available in my city?</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            <p>We are currently available in Delhi, Mumbai, Bengaluru, Pune, Hyderabad, Chennai, Kolkata, and Ahmedabad.
              We are rapidly expanding to more cities. Join the waitlist to get notified when we launch in your city!
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection