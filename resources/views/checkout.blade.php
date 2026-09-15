<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Soulmate India - Select your membership and complete your secure checkout.">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Complete Checkout &amp; Membership Election | Soulmate India</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  
  <!-- Razorpay Checkout Script -->
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body class="checkout-page-body">

  <!-- Checkout Header -->
  <header class="checkout-header">
    <div class="checkout-nav-container">
      <a href="{{ url('/') }}" class="checkout-brand">
        <img src="{{ asset('assets/images/logo.jpg') }}" alt="Soulmate India">
      </a>
      
      <div class="checkout-header-security">
        <span class="security-badge">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
          </svg>
          <span>256-Bit SSL Encrypted Checkout</span>
        </span>
        <a href="{{ url('/') }}" class="checkout-back-link">
          <span>← Back to Home</span>
        </a>
      </div>
    </div>
  </header>

  <!-- Checkout Hero Banner -->
  <div class="checkout-hero-strip">
    <div class="container checkout-hero-inner">
      <div>
        <span class="checkout-hero-eyebrow">FINAL STEP • MEMBERSHIP ELECTION</span>
        <h1 class="checkout-hero-title">Complete Your Membership &amp; Start Connecting</h1>
        <p class="checkout-hero-desc">Choose a verified companion plan tailored to your lifestyle. Safe, discreet &amp; hassle-free.</p>
      </div>

      <!-- Stepper Indicator -->
      <div class="checkout-stepper">
        <div class="step-item step-completed">
          <div class="step-dot">✓</div>
          <div class="step-label">1. Profile Details</div>
        </div>
        <div class="step-connector active"></div>
        <div class="step-item step-current">
          <div class="step-dot">2</div>
          <div class="step-label">2. Elect Membership</div>
        </div>
        <div class="step-connector"></div>
        <div class="step-item">
          <div class="step-dot">3</div>
          <div class="step-label">3. Payment</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Checkout Container -->
  <main class="container checkout-main-wrap">
    <form id="checkoutForm" onsubmit="return false;" novalidate>
      <div class="checkout-layout">
        
        <!-- LEFT COLUMN: Plans & Member Review -->
        <div class="checkout-left-col">
          
          <!-- SECTION 1: MANDATORY MEMBERSHIP ELECTION -->
          <section class="checkout-card" id="membershipElectionSec">
            <div class="checkout-card-header">
              <div class="card-step-num">1</div>
              <div>
                <h2>Choose Your Membership Plan <span class="req-tag">MANDATORY</span></h2>
                <p>Select the plan that fits you best. You can change your plan anytime.</p>
              </div>
            </div>

            <div class="checkout-plans-grid">
              @foreach($plans as $key => $plan)
              <label class="checkout-plan-card {{ $selectedPlanKey === $key ? 'selected' : '' }} {{ $key === 'yearly' ? 'plan-card-featured' : '' }}" data-plan-id="{{ $key }}" data-price="{{ $plan['price'] }}" data-name="{{ $plan['name'] }}" data-period="{{ $plan['period'] }}" data-matches="{{ $plan['matches'] }}">
                <input type="radio" name="selected_plan" value="{{ $key }}" {{ $selectedPlanKey === $key ? 'checked' : '' }} required>
                
                @if(!empty($plan['badge']))
                <span class="plan-float-badge {{ $key === 'yearly' ? 'badge-gold' : 'badge-pink' }}">{{ $plan['badge'] }}</span>
                @endif

                <div class="plan-card-top">
                  <div class="plan-radio-circle"></div>
                  <div class="plan-icon-symbol">{{ $plan['icon'] }}</div>
                  <div class="plan-titles">
                    <h3 class="plan-title-name">{{ $plan['name'] }}</h3>
                    <div class="plan-validity-pill">{{ $plan['period'] }} • {{ $plan['matches'] }}</div>
                  </div>
                </div>

                <div class="plan-price-display">
                  <span class="plan-currency">₹</span>
                  <span class="plan-amount">{{ number_format($plan['price']) }}</span>
                  <span class="plan-term">/ {{ $plan['period'] }}</span>
                </div>

                <ul class="plan-feature-checklist">
                  @foreach($plan['features'] as $feat)
                  <li>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>{{ $feat }}</span>
                  </li>
                  @endforeach
                </ul>
              </label>
              @endforeach
            </div>
          </section>

          <!-- SECTION 2: MEMBER PROFILE REVIEW / EDIT -->
          <section class="checkout-card" id="memberProfileSec">
            <div class="checkout-card-header">
              <div class="card-step-num">2</div>
              <div>
                <h2>Member Information Review</h2>
                <p>Verify your details. These will be linked to your active Soulmate India account.</p>
              </div>
            </div>

            <div class="checkout-form-grid">
              <!-- Full Name -->
              <div class="form-group-modern">
                <label for="coFullName">Full Name <span class="req">*</span></label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  </span>
                  <input type="text" id="coFullName" name="full_name" placeholder="Your full name" required>
                </div>
              </div>

              <!-- Email -->
              <div class="form-group-modern">
                <label for="coEmail">Email Address <span class="req">*</span></label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                  </span>
                  <input type="email" id="coEmail" name="email" placeholder="name@example.com" required>
                </div>
              </div>

              <!-- Phone -->
              <div class="form-group-modern">
                <label for="coPhone">Mobile Number <span class="req">*</span></label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                  </span>
                  <input type="tel" id="coPhone" name="phone" placeholder="10-digit mobile" required maxlength="10">
                </div>
              </div>

              <!-- Gender -->
              <div class="form-group-modern">
                <label for="coGender">Gender</label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                  </span>
                  <select id="coGender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="non-binary">Non-Binary</option>
                    <option value="prefer-not-to-say">Prefer not to say</option>
                  </select>
                </div>
              </div>

              <!-- City -->
              <div class="form-group-modern">
                <label for="coCity">City</label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  </span>
                  <input type="text" id="coCity" name="city" placeholder="e.g. Mumbai, Delhi">
                </div>
              </div>

              <!-- Pincode -->
              <div class="form-group-modern">
                <label for="coPincode">Pincode</label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                  </span>
                  <input type="text" id="coPincode" name="pincode" placeholder="6-digit pincode" maxlength="6">
                </div>
              </div>

              <!-- Country -->
              <div class="form-group-modern">
                <label for="coCountry">Country</label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                  </span>
                  <select id="coCountry" name="country">
                    <option value="India" selected>India</option>
                    <option value="Australia">Australia</option>
                    <option value="Canada">Canada</option>
                    <option value="UAE">UAE</option>
                    <option value="UK">United Kingdom</option>
                    <option value="USA">United States</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>

              <!-- Purpose -->
              <div class="form-group-modern">
                <label for="coUserType">Purpose ("I want to")</label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                  </span>
                  <select id="coUserType" name="user_type">
                    <option value="find">Find a KoPartner</option>
                    <option value="become">Become a KoPartner</option>
                    <option value="both" selected>Both (Find &amp; Earn)</option>
                  </select>
                </div>
              </div>

              <!-- Referral Code -->
              <div class="form-group-modern">
                <label for="coReferralCode">Referral Code (Optional)</label>
                <div class="input-icon-wrap">
                  <span class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </span>
                  <input type="text" id="coReferralCode" name="referral_code" placeholder="Enter referral code">
                </div>
              </div>
            </div>

            <!-- Hidden DOB & Password fields transferred from registration -->
            <input type="hidden" id="coDob" name="date_of_birth">
            <input type="hidden" id="coPassword" name="password">
          </section>

          <!-- SECTION 3: PAYMENT METHOD -->
          <section class="checkout-card" id="paymentMethodSec">
            <div class="checkout-card-header">
              <div class="card-step-num">3</div>
              <div>
                <h2>Payment Method</h2>
                <p>Secure instant checkout via Razorpay with UPI, Debit/Credit Card or NetBanking.</p>
              </div>
            </div>

            <div class="payment-method-selector">
              <label class="payment-option selected">
                <input type="radio" name="payment_method" value="razorpay" checked>
                <div class="payment-option-body">
                  <div class="payment-brand-row">
                    <span class="razorpay-logo-badge">
                      <span class="rzp-icon">⚡</span> <strong>Razorpay Secure</strong>
                    </span>
                    <span class="payment-badges-list">
                      <span class="p-pill">UPI / GPay / PhonePe</span>
                      <span class="p-pill">Cards</span>
                      <span class="p-pill">NetBanking</span>
                    </span>
                  </div>
                  <p class="payment-sub">Safe &amp; encrypted transaction. Official payment partner of Soulmate India.</p>
                </div>
              </label>
            </div>
          </section>

          <!-- SECTION 4: AUTO-RENEW SELECTION -->
          <section class="checkout-card" id="autoRenewSec">
            <div class="checkout-card-header">
              <div class="card-step-num">4</div>
              <div>
                <h2>Auto-Renewal Settings</h2>
                <p>Never lose access — auto-renew keeps your membership active seamlessly.</p>
              </div>
            </div>

            <div class="auto-renew-option-wrap">
              <label class="auto-renew-toggle-card" id="autoRenewCard">
                <div class="auto-renew-icon">🔄</div>
                <div class="auto-renew-text">
                  <div class="auto-renew-title">Enable Auto-Renewal</div>
                  <div class="auto-renew-desc">Your membership will renew automatically at the same plan price before it expires. Cancel anytime from your account settings.</div>
                  <div class="auto-renew-note">🔒 You'll receive a reminder 3 days before renewal via email.</div>
                </div>
                <div class="auto-renew-switch-wrap">
                  <input type="checkbox" id="autoRenewCheckbox" name="auto_renew" class="auto-renew-checkbox">
                  <span class="auto-renew-switch" id="autoRenewSwitch"></span>
                </div>
              </label>
            </div>
          </section>
        </div>

        <!-- RIGHT COLUMN: STICKY ORDER SUMMARY -->
        <div class="checkout-right-col">
          <div class="order-summary-box">
            <h3 class="summary-title">Order Summary</h3>

            <!-- Plan Banner -->
            <div class="summary-plan-banner" id="summaryPlanBanner">
              <div class="summary-plan-icon" id="summaryPlanIcon">{{ $selectedPlan['icon'] }}</div>
              <div class="summary-plan-info">
                <h4 id="summaryPlanName">{{ $selectedPlan['name'] }}</h4>
                <p id="summaryPlanPeriod">{{ $selectedPlan['period'] }} • {{ $selectedPlan['matches'] }}</p>
              </div>
              <div class="summary-plan-price" id="summaryPlanPriceDisplay">₹{{ number_format($selectedPlan['price']) }}</div>
            </div>

            <!-- Coupon Box -->
            <div class="coupon-section">
              <div class="coupon-input-wrap">
                <input type="text" id="couponInput" placeholder="Promo code (e.g. WELCOME50)">
                <button type="button" id="applyCouponBtn">Apply</button>
              </div>
              <div class="coupon-msg" id="couponMsg"></div>
            </div>

            <!-- Pricing Breakdown -->
            <div class="price-breakdown-list">
              <div class="breakdown-row">
                <span>Plan Subtotal</span>
                <span id="subtotalDisplay">₹{{ number_format($selectedPlan['price']) }}</span>
              </div>
              <div class="breakdown-row discount-row" id="discountRow" style="display: none;">
                <span>Coupon Discount</span>
                <span id="discountDisplay">-₹0</span>
              </div>
              <div class="breakdown-row">
                <span>GST / Taxes</span>
                <span class="tax-included-tag">Included (18%)</span>
              </div>
              <div class="breakdown-divider"></div>
              <div class="breakdown-row total-row">
                <span>Total Amount Due</span>
                <span class="total-price" id="totalDisplay">₹{{ number_format($selectedPlan['price']) }}</span>
              </div>
            </div>

            <!-- Pay Now Button -->
            <button type="button" class="btn btn-primary checkout-pay-btn" id="payNowBtn">
              <span class="lock-icon">🔒</span>
              <span id="payBtnLabel">Pay ₹{{ number_format($selectedPlan['price']) }} &amp; Activate</span>
            </button>

            <!-- Trust Points -->
            <div class="summary-trust-points">
              <div class="trust-item">
                <span class="trust-icon">🛡️</span>
                <span>Verified Profiles &amp; ID Background Checks</span>
              </div>
              <div class="trust-item">
                <span class="trust-icon">💬</span>
                <span>Unlimited Secure Private Messaging</span>
              </div>
              <div class="trust-item">
                <span class="trust-icon">⚡</span>
                <span>Instant Account Activation Upon Payment</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>
  </main>

  <!-- Success Confirmation Modal -->
  <div class="modal-overlay" id="checkoutSuccessModal" aria-hidden="true">
    <div class="modal-card checkout-success-card">
      <div class="success-icon-wrap">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
          <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
      </div>

      <h2 class="success-title">Membership Activated!</h2>
      <p class="success-sub">Congratulations! Your payment has been processed and your membership is now active.</p>

      <div class="receipt-card">
        <div class="receipt-row">
          <span>Order Number</span>
          <strong id="receiptOrderNum">SM-2026-XXXXX</strong>
        </div>
        <div class="receipt-row">
          <span>Member Name</span>
          <strong id="receiptName">-</strong>
        </div>
        <div class="receipt-row">
          <span>Plan Activated</span>
          <strong id="receiptPlan">-</strong>
        </div>
        <div class="receipt-row">
          <span>Amount Paid</span>
          <strong class="receipt-amount" id="receiptAmount">₹-</strong>
        </div>
        <div class="receipt-row">
          <span>Transaction ID</span>
          <span class="receipt-tx" id="receiptTx">pay_...</span>
        </div>
      </div>

      <div class="success-actions">
        <a href="{{ url('/') }}" class="btn btn-primary success-btn">Browse Verified Companions →</a>
        <a href="{{ url('/dashboard') }}" id="successDashboardBtn" class="btn btn-outline success-admin-btn">Go to Dashboard →</a>
      </div>
    </div>
  </div>

  <!-- Test Payment Simulation Modal (Fallback if real Razorpay test key is not entered) -->
  <div class="modal-overlay" id="mockPaymentModal" aria-hidden="true">
    <div class="modal-card mock-payment-card">
      <div class="mock-header">
        <div class="mock-badge">⚡ RAZORPAY TEST GATEWAY</div>
        <button class="modal-close" id="closeMockModal">&times;</button>
      </div>
      
      <div class="mock-body">
        <h3>Complete Test Payment</h3>
        <p>You can complete a test checkout with simulated Razorpay response, or enter a real Razorpay Key ID.</p>

        <div class="mock-order-badge">
          <span>Payable: <strong id="mockPayable">₹399</strong></span>
          <span id="mockPlanTag">Silver Plan</span>
        </div>

        <div class="mock-key-box">
          <label for="rzpCustomKey">Optional: Real Razorpay Key ID</label>
          <input type="text" id="rzpCustomKey" placeholder="rzp_test_... (leave empty for test simulation)">
        </div>

        <button type="button" class="btn btn-primary mock-confirm-btn" id="simulateSuccessBtn">
          Simulate Successful Payment (Instant) ✓
        </button>
      </div>
    </div>
  </div>

  <!-- Checkout Script -->
  <script>
    window.checkoutPlans = @json($plans);
    window.csrfToken = "{{ csrf_token() }}";
    window.razorpayKey = "{{ $razorpayKey }}";
  </script>
  <script src="{{ asset('assets/js/checkout.js') }}"></script>
</body>

</html>
