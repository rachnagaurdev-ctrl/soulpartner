<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Soulmate India - Find a trusted companion for movies, shopping, travel, dining and special moments.">
  <title>Soulmate India | Partner on Rent</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  <header class="header">
    <div class="container nav">
      <a class="brand" href="#"><img src="{{asset('assets/images/logo.jpg')}}" alt="Soulmate India"></a>
      <nav class="navlinks" id="navlinks">
        <a class="active" href="#home">Home</a>
        <a href="partners.html">Discover</a>
        <a href="#categories">Categories</a>
        <a href="#membership">Membership</a>
        <a href="#earning">Earn With Us</a>
        <!-- <a href="#how">How It Works</a> -->
        <a href="about-us.html">About Us</a>
        <a href="contact-us.html">Contact</a>
      </nav>
      <div class="actions">
        <button class="search-icon" aria-label="Search">⌕</button>
        <button class="btn btn-outline" id="loginBtn">Login</button>
        <button class="btn btn-primary" id="registerBtn">Register</button>
        <button class="menu" id="menu" aria-label="Open navigation">☰</button>
      </div>
    </div>
  </header>

  <main id="home">
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
              <option>e.g. Movie, Shopping, Travel</option>
              <option>Movie Companion</option>
              <option>Shopping Companion</option>
              <option>Travel Companion</option>
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
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/movie.jpg')}}" alt="Movie companion"></div>
            <div class="category-body">
              <div class="category-icon">▣</div>
              <h3>Movie Companion</h3>
              <p>Enjoy your favorite movies together.</p>
            </div>
          </article>
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/shopping.jpg')}}" alt="Shopping companion"></div>
            <div class="category-body">
              <div class="category-icon">♧</div>
              <h3>Shopping Companion</h3>
              <p>Shop, explore and create memories.</p>
            </div>
          </article>
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/dining.jpg')}}" alt="Dining companion"></div>
            <div class="category-body">
              <div class="category-icon">♜</div>
              <h3>Dining Companion</h3>
              <p>Great food tastes better together.</p>
            </div>
          </article>
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/travel.jpg')}}" alt="Travel companion"></div>
            <div class="category-body">
              <div class="category-icon">✈</div>
              <h3>Travel Companion</h3>
              <p>Explore new places with a partner.</p>
            </div>
          </article>
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/event.jpg')}}" alt="Event companion"></div>
            <div class="category-body">
              <div class="category-icon">♧</div>
              <h3>Event Companion</h3>
              <p>Make events more special.</p>
            </div>
          </article>
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/sports.jpg')}}" alt="Sports and activity companion"></div>
            <div class="category-body">
              <div class="category-icon">♨</div>
              <h3>Sports &amp; Activity</h3>
              <p>Stay active, stay happy.</p>
            </div>
          </article>
          <article class="category-card">
            <div class="category-img"><img src="{{asset('assets/images/more.jpg')}}" alt="More categories"></div>
            <div class="category-body">
              <div class="category-icon">•••</div>
              <h3>And More</h3>
              <p>Many more categories to choose from.</p>
            </div>
          </article>
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

          <!-- Silver -->
          <article class="plan-card plan-silver">
            <div class="plan-card-header">
              <div class="plan-icon plan-icon-silver">🛡️</div>
              <div>
                <div class="plan-name">Silver</div>
                <div class="plan-price">₹399 <span class="plan-period">/ 3 Months</span></div>
              </div>
            </div>
            <div class="plan-match-pill plan-match-silver">25 Matches</div>
            <ul class="plan-features">
              <li>Browse verified profiles</li>
              <li>Basic matching</li>
              <li>Secure chat</li>
            </ul>
            <button class="plan-btn plan-btn-silver">Choose Plan</button>
          </article>

          <!-- Gold -->
          <article class="plan-card plan-gold">
            <div class="plan-card-header">
              <div class="plan-icon plan-icon-gold">🏆</div>
              <div>
                <div class="plan-name">Gold</div>
                <div class="plan-price">₹699 <span class="plan-period">/ 3 Months</span></div>
              </div>
            </div>
            <div class="plan-match-pill plan-match-gold">50 Matches</div>
            <ul class="plan-features">
              <li>Advanced matching</li>
              <li>More profile visibility</li>
              <li>Priority support</li>
            </ul>
            <button class="plan-btn plan-btn-gold">Choose Plan</button>
          </article>

          <!-- Premium -->
          <article class="plan-card plan-premium-card">
            <div class="plan-card-header">
              <div class="plan-icon plan-icon-premium">💎</div>
              <div>
                <div class="plan-name">Premium</div>
                <div class="plan-price">₹999 <span class="plan-period">/ 3 Months</span></div>
              </div>
            </div>
            <div class="plan-match-pill plan-match-premium">100 Matches</div>
            <ul class="plan-features">
              <li>Premium matching</li>
              <li>Priority profile visibility</li>
              <li>All premium features</li>
            </ul>
            <button class="plan-btn plan-btn-premium">Choose Plan</button>
          </article>

          <!-- Premium Yearly (Best Value) -->
          <article class="plan-card plan-yearly">
            <div class="plan-best-value-badge">BEST VALUE</div>
            <div class="plan-refund-badge">50%<br><span>Refund</span></div>
            <div class="plan-card-header">
              <div class="plan-icon plan-icon-yearly">🎁</div>
              <div>
                <div class="plan-name plan-name-yearly">Premium Yearly</div>
                <div class="plan-price plan-price-yearly">₹2,999 <span class="plan-period">/ 1 Year</span></div>
              </div>
            </div>
            <div class="plan-match-pill plan-match-yearly">Unlimited Matches</div>
            <ul class="plan-features plan-features-yearly">
              <li>Valid until you find your match</li>
              <li>50% refund after successful not matching (subject to policy)</li>
              <li>Priority matching</li>
              <li>All premium features</li>
            </ul>
            <button class="plan-btn plan-btn-yearly">Choose Plan</button>
          </article>

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
  </main>

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

  <!-- Dark Footer (Contact Us Style) -->
  <footer class="contact-dark-footer">
    <div class="container">
      <!-- Top Row: Logo, Nav, Socials -->
      <div class="footer-top-row">
        <a href="index.html" class="footer-brand-logo">
          <img src="{{asset('assets/images/logo.jpg')}}" alt="Soulmate India Logo">
        </a>

        <nav class="footer-nav-menu" aria-label="Footer Navigation">
          <a class="active" href="index.html#home">Home</a>
          <a href="partners.html">Discover</a>
          <a href="index.html#categories">Categories</a>
          <a href="index.html#membership">Membership</a>
          <a href="index.html#how">How It Works</a>
          <a href="about-us.html">About Us</a>
          <a href="contact-us.html">Contact</a>
        </nav>

        <div class="footer-social-icons">
          <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="footer-social-btn"
            aria-label="Facebook">
            <svg viewBox="0 0 24 24">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="footer-social-btn"
            aria-label="Instagram">
            <svg viewBox="0 0 24 24">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="footer-social-btn"
            aria-label="X (Twitter)">
            <svg viewBox="0 0 24 24">
              <path
                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z">
              </path>
            </svg>
          </a>
          <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="footer-social-btn"
            aria-label="YouTube">
            <svg viewBox="0 0 24 24">
              <path
                d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
              </path>
              <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#0c1022"></polygon>
            </svg>
          </a>
        </div>
      </div>

      <!-- Bottom Row: Copyright & Tagline -->
      <div class="footer-bottom-row">
        <p class="footer-copyright">&copy; 2025 Soulmate India. All rights reserved.</p>
        <p class="footer-tagline-script">
          Because every moment is better together <span class="script-heart">♡</span>
        </p>
      </div>
    </div>
  </footer>

  <!-- Login / Register Modal Popup -->
  <!-- Login / Register Modal Popup (Redesigned) -->
  <div class="modal-overlay" id="authModal" aria-hidden="true">
    <div class="modal-card modal-auth-card">
      <button class="modal-close" id="modalClose" aria-label="Close modal">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <!-- Modal Header Ribbon -->
      <div class="modal-top-ribbon">
        <div class="ribbon-brand">
          <span class="ribbon-heart">💗</span>
          <span class="ribbon-brand-text">SOULMATE INDIA</span>
        </div>
        <span class="ribbon-tag">Partner on Rent</span>
      </div>

      <div class="auth-tabs-wrap">
        <div class="auth-tabs">
          <button type="button" class="auth-tab" id="tabLogin">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
            <span>Log In</span>
          </button>
          <button type="button" class="auth-tab active" id="tabRegister">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            <span>Create Account</span>
          </button>
        </div>
      </div>

      <div class="auth-body">
        <!-- Login Form -->
        <form class="auth-form" id="loginForm" onsubmit="return false;">
          <div class="auth-header-text">
            <h3 class="auth-title">Welcome Back</h3>
            <p class="auth-sub">Log in to connect with your verified companions safely.</p>
          </div>

          <div class="form-group-modern">
            <label for="loginEmail">Email Address or Mobile Number</label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </span>
              <input type="text" id="loginEmail" name="email" placeholder="e.g. name@example.com or 9876543210" required>
            </div>
          </div>

          <div class="form-group-modern">
            <label for="loginPassword">Password</label>
            <div class="input-icon-wrap pw-wrap">
              <span class="input-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              </span>
              <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
              <button type="button" class="pw-toggle-btn" data-target="loginPassword" aria-label="Toggle password">
                <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <svg class="eye-closed" style="display:none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
              </button>
            </div>
          </div>

          <div class="form-options">
            <label class="checkbox-modern">
              <input type="checkbox" checked>
              <span class="custom-check"></span>
              <span>Remember me</span>
            </label>
            <a href="#" class="forgot-link">Forgot password?</a>
          </div>

          <button type="submit" class="btn btn-primary auth-submit-btn">Log In</button>

          <div class="auth-divider"><span>OR</span></div>

          <button type="button" class="btn btn-google">
            <svg width="18" height="18" viewBox="0 0 24 24">
              <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z" />
              <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.15C3.26 21.3 7.36 24 12 24z" />
              <path fill="#FBBC05" d="M5.28 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.39l3.99-3.15z" />
              <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.36 0 3.26 2.7 1.29 6.61l3.99 3.15c.95-2.85 3.6-4.96 6.72-4.96z" />
            </svg>
            Continue with Google
          </button>

          <div class="auth-switch">
            Don't have an account? <button type="button" class="switch-link" id="gotoRegister">Create Account Free</button>
          </div>
        </form>

        <!-- Redesigned Register Form -->
        <form class="auth-form active" id="registerForm" novalidate>
          <div class="auth-header-text">
            <h3 class="auth-title">Create an Account</h3>
            <p class="auth-sub">Join Soulmate India & connect with verified companions across India.</p>
          </div>

          <!-- Section Label -->
          <div class="form-section-label">
            <span class="step-badge">1</span>
            <span>Personal & Account Details</span>
          </div>

          <!-- Full Name -->
          <div class="form-group-modern">
            <label for="regName">Full Name <span class="req">*</span></label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </span>
              <input type="text" id="regName" placeholder="Enter your full name" required>
            </div>
          </div>

          <!-- Email & Phone (2 cols) -->
          <div class="form-grid-2">
            <div class="form-group-modern">
              <label for="regEmail">Email Address <span class="req">*</span></label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </span>
                <input type="email" id="regEmail" placeholder="name@example.com" required>
              </div>
            </div>
            <div class="form-group-modern">
              <label for="regPhone">Mobile Number <span class="req">*</span></label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </span>
                <input type="tel" id="regPhone" placeholder="10-digit mobile number" required maxlength="10">
              </div>
            </div>
          </div>

          <!-- Password & Confirm Password (2 cols) -->
          <div class="form-grid-2">
            <div class="form-group-modern">
              <label for="regPassword">Password <span class="req">*</span></label>
              <div class="input-icon-wrap pw-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </span>
                <input type="password" id="regPassword" placeholder="Create password (min 6 chars)" required minlength="6">
                <button type="button" class="pw-toggle-btn" data-target="regPassword" aria-label="Toggle password">
                  <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  <svg class="eye-closed" style="display:none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                </button>
              </div>
            </div>
            <div class="form-group-modern">
              <label for="regConfirmPassword">Confirm Password <span class="req">*</span></label>
              <div class="input-icon-wrap pw-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </span>
                <input type="password" id="regConfirmPassword" placeholder="Re-enter password" required>
                <button type="button" class="pw-toggle-btn" data-target="regConfirmPassword" aria-label="Toggle password">
                  <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  <svg class="eye-closed" style="display:none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                </button>
              </div>
            </div>
          </div>

          <!-- DOB & Gender (2 cols) -->
          <div class="form-grid-2">
            <div class="form-group-modern">
              <label for="regDob">Date of Birth <span class="req">*</span></label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </span>
                <input type="date" id="regDob" required>
              </div>
            </div>
            <div class="form-group-modern">
              <label for="regGender">Gender <span class="req">*</span></label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                </span>
                <select id="regGender" required>
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="non-binary">Non-Binary</option>
                  <option value="prefer-not-to-say">Prefer not to say</option>
                </select>
              </div>
            </div>
          </div>

          <!-- City, Pincode & Country (3 cols) -->
          <div class="form-grid-3">
            <div class="form-group-modern">
              <label for="regCity">City</label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </span>
                <input type="text" id="regCity" placeholder="e.g. Mumbai, Delhi">
              </div>
            </div>
            <div class="form-group-modern">
              <label for="regPincode">Pincode</label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                </span>
                <input type="text" id="regPincode" placeholder="6-digit" maxlength="6">
              </div>
            </div>
            <div class="form-group-modern">
              <label for="regCountry">Country</label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </span>
                <select id="regCountry">
                  <option value="India" selected>India</option>
                  <option value="Australia">Australia</option>
                  <option value="Canada">Canada</option>
                  <option value="Germany">Germany</option>
                  <option value="Singapore">Singapore</option>
                  <option value="UAE">United Arab Emirates</option>
                  <option value="UK">United Kingdom</option>
                  <option value="USA">United States</option>
                  <option value="Other">Other Country</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Section Label: Purpose -->
          <div class="form-section-label" style="margin-top: 8px;">
            <span class="step-badge">2</span>
            <span>I want to <span class="req">*</span></span>
          </div>

          <!-- Interactive Purpose Cards -->
          <div class="purpose-selection-grid">
            <label class="purpose-card active" id="cardFind">
              <input type="radio" name="iwantto" value="find" checked>
              <div class="purpose-radio-circle"></div>
              <div class="purpose-card-content">
                <div class="purpose-icon">🔍</div>
                <div class="purpose-title">Find a Partner</div>
                <div class="purpose-desc">Book companions for movies, dining, travel & events safely.</div>
              </div>
            </label>

            <label class="purpose-card" id="cardBecome">
              <input type="radio" name="iwantto" value="become">
              <div class="purpose-radio-circle"></div>
              <div class="purpose-card-content">
                <div class="purpose-icon">🌟</div>
                <div class="purpose-title">Become a Partner</div>
                <div class="purpose-desc">Earn up to ₹2,000/hr by offering companionship services.</div>
              </div>
            </label>

            <label class="purpose-card" id="cardBoth">
              <input type="radio" name="iwantto" value="both">
              <div class="purpose-radio-circle"></div>
              <div class="purpose-card-content">
                <div class="purpose-icon">🤝</div>
                <div class="purpose-title">Both (Find & Earn)</div>
                <div class="purpose-desc">Full access to discover partners and earn at your flexibility.</div>
              </div>
            </label>
          </div>

          <!-- Terms & Conditions Checkbox -->
          <div class="form-terms-wrap">
            <label class="checkbox-modern">
              <input type="checkbox" id="regTerms" required checked>
              <span class="custom-check"></span>
              <span>I agree to the <a href="#" target="_blank">Terms of Service</a> &amp; <a href="#" target="_blank">Privacy Policy</a></span>
            </label>
          </div>

          <!-- Inline Error Banner -->
          <div class="reg-error-msg" id="regErrorMsg" style="display: none;"></div>

          <!-- Action Button: Proceed to Membership Election / Checkout -->
          <button type="submit" class="btn btn-primary auth-submit-btn" id="regSubmitBtn">
            <span>Continue to Membership Selection</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </button>

          <!-- Trust Badges -->
          <div class="modal-trust-bar">
            <span>🔒 256-Bit SSL Encrypted</span>
            <span>•</span>
            <span>🛡️ 100% Verified Profiles</span>
            <span>•</span>
            <span>⚡ Instant Activation</span>
          </div>

          <div class="auth-switch">
            Already registered? <button type="button" class="switch-link" id="gotoLogin">Log In to Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>