
  <!-- Dark Footer (Contact Us Style) -->
  <footer class="contact-dark-footer">
    <div class="container">
      <!-- Top Row: Logo, Nav, Socials -->
      <div class="footer-top-row">
        <a href="index.html" class="footer-brand-logo">
          <img src="{{asset('assets/images/logo.jpeg')}}" alt="Soulmate India Logo">
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
                <input type="date" id="regDob" required max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}">
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
                  @foreach(get_genders() as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                  @endforeach
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