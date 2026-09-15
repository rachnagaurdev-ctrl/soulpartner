document.addEventListener('DOMContentLoaded', () => {
  // Mobile Navigation Toggle
  const menu = document.getElementById('menu');
  const nav = document.getElementById('navlinks');

  if (menu && nav) {
    menu.addEventListener('click', () => nav.classList.toggle('open'));
    nav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => nav.classList.remove('open'));
    });
  }

  // Reviews Slider / Pagination Logic
  const cards = [...document.querySelectorAll('.review-card')];
  const nextBtn = document.getElementById('next');
  const prevBtn = document.getElementById('prev');
  let offset = 0;

  function renderReviews() {
    if (!cards.length) return;
    if (window.innerWidth > 920) {
      cards.forEach((c, i) => {
        c.style.display = (i >= offset && i < offset + 4) ? 'flex' : 'none';
      });
    } else if (window.innerWidth > 600) {
      cards.forEach((c, i) => {
        c.style.display = (i >= offset && i < offset + 2) ? 'flex' : 'none';
      });
    } else {
      cards.forEach((c, i) => {
        c.style.display = (i === offset) ? 'flex' : 'none';
      });
    }
  }

  if (nextBtn && prevBtn) {
    nextBtn.onclick = () => {
      offset = (offset + 1) % cards.length;
      renderReviews();
    };
    prevBtn.onclick = () => {
      offset = (offset - 1 + cards.length) % cards.length;
      renderReviews();
    };
  }

  window.addEventListener('resize', renderReviews);
  renderReviews();

  // Searchbox Form Submit Handler
  const searchbox = document.querySelector('.searchbox');
  if (searchbox) {
    searchbox.addEventListener('submit', (e) => {
      e.preventDefault();
      const discoverSec = document.getElementById('discover');
      if (discoverSec) {
        discoverSec.scrollIntoView({ behavior: 'smooth' });
      }
    });
  }

  // Auth Modal Popup Controls
  const authModal = document.getElementById('authModal');
  const modalClose = document.getElementById('modalClose');
  const tabLogin = document.getElementById('tabLogin');
  const tabRegister = document.getElementById('tabRegister');
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const gotoRegister = document.getElementById('gotoRegister');
  const gotoLogin = document.getElementById('gotoLogin');

  function openModal(mode = 'login') {
    if (!authModal) return;
    authModal.classList.add('active');
    authModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    switchTab(mode);
  }

  function closeModal() {
    if (!authModal) return;
    authModal.classList.remove('active');
    authModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  function switchTab(mode) {
    if (mode === 'login') {
      if (tabLogin) tabLogin.classList.add('active');
      if (tabRegister) tabRegister.classList.remove('active');
      if (loginForm) loginForm.classList.add('active');
      if (registerForm) registerForm.classList.remove('active');
    } else {
      if (tabRegister) tabRegister.classList.add('active');
      if (tabLogin) tabLogin.classList.remove('active');
      if (registerForm) registerForm.classList.add('active');
      if (loginForm) loginForm.classList.remove('active');
    }
  }

  // Password Visibility Toggle
  document.querySelectorAll('.pw-toggle-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = btn.getAttribute('data-target');
      const input = document.getElementById(targetId);
      if (!input) return;

      const isPassword = input.getAttribute('type') === 'password';
      input.setAttribute('type', isPassword ? 'text' : 'password');

      const eyeOpen = btn.querySelector('.eye-open');
      const eyeClosed = btn.querySelector('.eye-closed');
      if (eyeOpen && eyeClosed) {
        eyeOpen.style.display = isPassword ? 'none' : 'block';
        eyeClosed.style.display = isPassword ? 'block' : 'none';
      }
    });
  });

  // Purpose Selection Cards Toggle
  const purposeCards = document.querySelectorAll('.purpose-card');
  purposeCards.forEach(card => {
    card.addEventListener('click', () => {
      purposeCards.forEach(c => c.classList.remove('active'));
      card.classList.add('active');
      const radio = card.querySelector('input[type="radio"]');
      if (radio) radio.checked = true;
    });
  });

  // Homepage Plan Buttons -> Direct to Checkout
  document.querySelectorAll('.plan-btn, .plan-btn-silver, .plan-btn-gold, .plan-btn-premium, .plan-btn-yearly').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      let planTier = 'gold';
      if (btn.classList.contains('plan-btn-silver') || btn.closest('.plan-silver')) {
        planTier = 'silver';
      } else if (btn.classList.contains('plan-btn-premium') || btn.closest('.plan-premium-card')) {
        planTier = 'premium';
      } else if (btn.classList.contains('plan-btn-yearly') || btn.closest('.plan-yearly')) {
        planTier = 'yearly';
      }
      window.location.href = `/checkout?plan=${planTier}`;
    });
  });

  // Attach trigger handlers to buttons
  const loginTriggers = document.querySelectorAll('#loginBtn');
  loginTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openModal('login');
    });
  });

  const registerTriggers = document.querySelectorAll('#registerBtn, #startEarningBtn');
  registerTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openModal('register');
    });
  });

  if (tabLogin) tabLogin.addEventListener('click', () => switchTab('login'));
  if (tabRegister) tabRegister.addEventListener('click', () => switchTab('register'));
  if (gotoRegister) gotoRegister.addEventListener('click', () => switchTab('register'));
  if (gotoLogin) gotoLogin.addEventListener('click', () => switchTab('login'));

  if (modalClose) modalClose.addEventListener('click', closeModal);

  if (authModal) {
    authModal.addEventListener('click', (e) => {
      if (e.target === authModal) closeModal();
    });
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && authModal && authModal.classList.contains('active')) {
      closeModal();
    }
  });

  // Handle Login Form Submission
  if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const formData = new FormData(loginForm);
      const email = formData.get('email');
      const password = formData.get('password');
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

      try {
        const response = await fetch('/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
          },
          body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (response.ok && data.success) {
          window.location.href = data.redirect || '/dashboard';
        } else {
          alert(data.message || 'Login failed. Please check your credentials.');
        }
      } catch (error) {
        console.error('Login error:', error);
        alert('An error occurred during login. Please try again.');
      }
    });
  }

  // Handle Redesigned Registration Form Submission -> Checkout Redirection
  if (registerForm) {
    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const errBox = document.getElementById('regErrorMsg');
      if (errBox) {
        errBox.style.display = 'none';
        errBox.textContent = '';
      }

      function showError(msg) {
        if (errBox) {
          errBox.textContent = msg;
          errBox.style.display = 'block';
          errBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
          alert(msg);
        }
      }

      const name = document.getElementById('regName')?.value.trim();
      const email = document.getElementById('regEmail')?.value.trim();
      const phone = document.getElementById('regPhone')?.value.trim();
      const password = document.getElementById('regPassword')?.value;
      const confirmPassword = document.getElementById('regConfirmPassword')?.value;
      const dob = document.getElementById('regDob')?.value;
      const gender = document.getElementById('regGender')?.value;
      const city = document.getElementById('regCity')?.value.trim();
      const pincode = document.getElementById('regPincode')?.value.trim();
      const country = document.getElementById('regCountry')?.value || 'India';
      const userTypeRadio = document.querySelector('input[name="iwantto"]:checked');
      const terms = document.getElementById('regTerms');

      if (!name) return showError('Please enter your full name.');
      if (!email || !email.includes('@')) return showError('Please enter a valid email address.');
      if (!phone || phone.length < 10) return showError('Please enter a valid 10-digit mobile number.');
      if (!password || password.length < 6) return showError('Password must be at least 6 characters long.');
      if (password !== confirmPassword) return showError('Passwords do not match. Please re-enter.');
      if (!dob) return showError('Please select your Date of Birth.');
      if (!gender) return showError('Please select your Gender.');
      if (terms && !terms.checked) return showError('You must agree to the Terms of Service & Privacy Policy.');

      // Bundle registration payload
      const regData = {
        full_name: name,
        email: email,
        phone: phone,
        password: password,
        date_of_birth: dob,
        gender: gender,
        city: city,
        pincode: pincode,
        country: country,
        user_type: userTypeRadio ? userTypeRadio.value : 'both',
        preferred_plan: 'gold',
      };

      // Save to sessionStorage
      try {
        sessionStorage.setItem('soulmate_reg_data', JSON.stringify(regData));
      } catch (err) {
        console.warn('sessionStorage write error', err);
      }

      const submitBtn = document.getElementById('regSubmitBtn');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Proceeding to Checkout...</span> ⏳';
      }

      // Smooth redirect to checkout
      setTimeout(() => {
        window.location.href = '/checkout?plan=gold';
      }, 400);
    });
  }

  // FAQ Accordion
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const isOpen = btn.getAttribute('aria-expanded') === 'true';
      const answer = btn.nextElementSibling;

      // Close all other open items
      document.querySelectorAll('.faq-question').forEach(otherBtn => {
        if (otherBtn !== btn) {
          otherBtn.setAttribute('aria-expanded', 'false');
          const otherAnswer = otherBtn.nextElementSibling;
          if (otherAnswer) otherAnswer.classList.remove('open');
        }
      });

      // Toggle current
      btn.setAttribute('aria-expanded', String(!isOpen));
      if (answer) answer.classList.toggle('open', !isOpen);
    });
  });

  // ==========================================
  // Partners Page Functionality
  // ==========================================

  // Mobile Filter Drawer / Popup Controls
  const openMobileFilterBtn = document.getElementById('openMobileFilterBtn');
  const closeMobileFilterBtn = document.getElementById('closeMobileFilterBtn');
  const mobileFilterOverlay = document.getElementById('mobileFilterOverlay');
  const mobileFilterModal = document.getElementById('mobileFilterModal');
  const mobileApplyFilterBtn = document.getElementById('mobileApplyFilterBtn');
  const mobileResetFilterBtn = document.getElementById('mobileResetFilterBtn');

  function openMobileFilter() {
    if (!mobileFilterModal) return;
    mobileFilterModal.classList.add('active');
    if (mobileFilterOverlay) mobileFilterOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileFilter() {
    if (!mobileFilterModal) return;
    mobileFilterModal.classList.remove('active');
    if (mobileFilterOverlay) mobileFilterOverlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (openMobileFilterBtn) openMobileFilterBtn.addEventListener('click', openMobileFilter);
  if (closeMobileFilterBtn) closeMobileFilterBtn.addEventListener('click', closeMobileFilter);
  if (mobileFilterOverlay) mobileFilterOverlay.addEventListener('click', closeMobileFilter);

  if (mobileApplyFilterBtn) {
    mobileApplyFilterBtn.addEventListener('click', () => {
      closeMobileFilter();
    });
  }

  // Price Range Sliders Live Update
  const priceRange = document.getElementById('priceRange');
  const priceCurrentLabel = document.getElementById('priceCurrentLabel');
  const mobilePriceRange = document.getElementById('mobilePriceRange');
  const mobilePriceCurrentLabel = document.getElementById('mobilePriceCurrentLabel');

  if (priceRange && priceCurrentLabel) {
    priceRange.addEventListener('input', (e) => {
      priceCurrentLabel.textContent = `₹${Number(e.target.value).toLocaleString('en-IN')}`;
    });
  }
  if (mobilePriceRange && mobilePriceCurrentLabel) {
    mobilePriceRange.addEventListener('input', (e) => {
      mobilePriceCurrentLabel.textContent = `₹${Number(e.target.value).toLocaleString('en-IN')}`;
    });
  }

  // Favorite Heart Toggle
  document.querySelectorAll('.btn-fav').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      btn.classList.toggle('active');
    });
  });

  // Age Range Chips Toggle
  document.querySelectorAll('.age-chip').forEach(chip => {
    chip.addEventListener('click', () => {
      const container = chip.closest('.age-range-buttons');
      if (container) {
        container.querySelectorAll('.age-chip').forEach(c => c.classList.remove('active'));
      }
      chip.classList.add('active');
    });
  });

  // Clear Filters Handler
  const clearAllFilters = document.getElementById('clearAllFilters');
  const mobileClearAllFilters = document.getElementById('mobileClearAllFilters');

  function resetFilters() {
    document.querySelectorAll('.filter-checkbox-item input').forEach(input => {
      input.checked = false;
    });
    document.querySelectorAll('.filter-select').forEach(select => {
      select.value = '';
    });
    if (priceRange && priceCurrentLabel) {
      priceRange.value = 5000;
      priceCurrentLabel.textContent = '₹5,000+';
    }
    if (mobilePriceRange && mobilePriceCurrentLabel) {
      mobilePriceRange.value = 5000;
      mobilePriceCurrentLabel.textContent = '₹5,000+';
    }
  }

  if (clearAllFilters) clearAllFilters.addEventListener('click', resetFilters);
  if (mobileClearAllFilters) mobileClearAllFilters.addEventListener('click', resetFilters);
  if (mobileResetFilterBtn) mobileResetFilterBtn.addEventListener('click', resetFilters);

  // Global Escape key handler for both modals
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (mobileFilterModal && mobileFilterModal.classList.contains('active')) {
        closeMobileFilter();
      }
    }
  });

  // ==========================================
  // Partner Profile Page Functionality
  // ==========================================

  // Interactive Image Gallery
  const mainGalleryImage = document.getElementById('mainGalleryImage');
  const galleryThumbs = document.querySelectorAll('.thumb-btn');
  const galleryCounter = document.getElementById('galleryCounter');
  const galleryPrevBtn = document.getElementById('galleryPrevBtn');
  const galleryNextBtn = document.getElementById('galleryNextBtn');
  let currentGalleryIndex = 0;

  function updateGallery(index) {
    if (!galleryThumbs.length || !mainGalleryImage) return;
    currentGalleryIndex = (index + galleryThumbs.length) % galleryThumbs.length;
    const targetThumb = galleryThumbs[currentGalleryIndex];
    const newSrc = targetThumb.getAttribute('data-img');

    mainGalleryImage.style.opacity = '0.4';
    setTimeout(() => {
      mainGalleryImage.src = newSrc;
      mainGalleryImage.style.opacity = '1';
    }, 150);

    galleryThumbs.forEach((btn, i) => {
      btn.classList.toggle('active', i === currentGalleryIndex);
    });

    if (galleryCounter) {
      galleryCounter.textContent = `${currentGalleryIndex + 1}/${galleryThumbs.length}`;
    }
  }

  galleryThumbs.forEach((thumb, i) => {
    thumb.addEventListener('click', () => updateGallery(i));
  });

  if (galleryPrevBtn) {
    galleryPrevBtn.addEventListener('click', () => updateGallery(currentGalleryIndex - 1));
  }

  if (galleryNextBtn) {
    galleryNextBtn.addEventListener('click', () => updateGallery(currentGalleryIndex + 1));
  }

  // Profile Favorite Button Toggle
  const profileFavBtn = document.getElementById('profileFavBtn');
  if (profileFavBtn) {
    profileFavBtn.addEventListener('click', () => {
      profileFavBtn.classList.toggle('active');
      const span = profileFavBtn.querySelector('span');
      if (span) {
        span.textContent = profileFavBtn.classList.contains('active') ? 'Favorited ♥' : 'Add to Favorites';
      }
    });
  }

  // Toast Helper
  const bookingToast = document.getElementById('bookingToast');
  const toastTitle = document.getElementById('toastTitle');
  const toastMessage = document.getElementById('toastMessage');
  let toastTimer = null;

  function showToast(title, message) {
    if (!bookingToast) return;
    if (toastTitle) toastTitle.textContent = title;
    if (toastMessage) toastMessage.textContent = message;
    bookingToast.classList.add('active');
    if (toastTimer) clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      bookingToast.classList.remove('active');
    }, 4000);
  }

  // Share Profile Button
  const profileShareBtn = document.getElementById('profileShareBtn');
  if (profileShareBtn) {
    profileShareBtn.addEventListener('click', () => {
      if (navigator.clipboard) {
        navigator.clipboard.writeText(window.location.href);
      }
      showToast('Profile Link Copied!', 'The link to Priya Sharma\'s profile has been copied to your clipboard.');
    });
  }

  // Booking Actions
  const bookNowBtn = document.getElementById('bookNowBtn');
  const chatNowBtn = document.getElementById('chatNowBtn');
  const bookingDate = document.getElementById('bookingDate');
  const bookingTime = document.getElementById('bookingTime');

  if (bookNowBtn) {
    bookNowBtn.addEventListener('click', () => {
      const dateVal = bookingDate ? bookingDate.value : 'selected date';
      const timeVal = bookingTime ? bookingTime.value : 'selected time';
      showToast('Booking Request Sent!', `Your request for ${dateVal} (${timeVal}) has been sent. Priya will confirm shortly.`);
    });
  }

  if (chatNowBtn) {
    chatNowBtn.addEventListener('click', () => {
      showToast('Chat Initiated', 'Connecting you securely with Priya Sharma on Soulmate chat...');
    });
  }

  // Profile Tab Links Smooth Scroll
  document.querySelectorAll('.profile-tabs-nav .tab-link').forEach(link => {
    link.addEventListener('click', (e) => {
      const targetId = link.getAttribute('href');
      if (targetId && targetId.startsWith('#')) {
        const targetEl = document.querySelector(targetId);
        if (targetEl) {
          e.preventDefault();
          targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
          document.querySelectorAll('.profile-tabs-nav .tab-link').forEach(l => l.classList.remove('active'));
          link.classList.add('active');
        }
      }
    });
  });
});

