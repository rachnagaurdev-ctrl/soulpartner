document.addEventListener('DOMContentLoaded', () => {
  const plans = window.checkoutPlans || {};
  const RZP_KEY = window.razorpayKey || '';
  let currentPlanKey = document.querySelector('input[name="selected_plan"]:checked')?.value || 'gold';
  let couponDiscount = 0;
  let activeCoupon = '';

  // Elements
  const planCards = document.querySelectorAll('.checkout-plan-card');
  const summaryPlanIcon = document.getElementById('summaryPlanIcon');
  const summaryPlanName = document.getElementById('summaryPlanName');
  const summaryPlanPeriod = document.getElementById('summaryPlanPeriod');
  const summaryPlanPriceDisplay = document.getElementById('summaryPlanPriceDisplay');
  const subtotalDisplay = document.getElementById('subtotalDisplay');
  const discountRow = document.getElementById('discountRow');
  const discountDisplay = document.getElementById('discountDisplay');
  const totalDisplay = document.getElementById('totalDisplay');
  const payBtnLabel = document.getElementById('payBtnLabel');
  const payNowBtn = document.getElementById('payNowBtn');

  // Coupon elements
  const couponInput = document.getElementById('couponInput');
  const applyCouponBtn = document.getElementById('applyCouponBtn');
  const couponMsg = document.getElementById('couponMsg');

  // Modals
  const checkoutSuccessModal = document.getElementById('checkoutSuccessModal');
  const mockPaymentModal = document.getElementById('mockPaymentModal');
  const closeMockModal = document.getElementById('closeMockModal');
  const simulateSuccessBtn = document.getElementById('simulateSuccessBtn');
  const rzpCustomKey = document.getElementById('rzpCustomKey');
  const mockPayable = document.getElementById('mockPayable');
  const mockPlanTag = document.getElementById('mockPlanTag');

  // Populate from sessionStorage (if redirected from registration popup)
  try {
    const rawData = sessionStorage.getItem('soulmate_reg_data');
    if (rawData) {
      const regData = JSON.parse(rawData);
      if (regData.full_name) document.getElementById('coFullName').value = regData.full_name;
      if (regData.email) document.getElementById('coEmail').value = regData.email;
      if (regData.phone) document.getElementById('coPhone').value = regData.phone;
      if (regData.city) document.getElementById('coCity').value = regData.city;
      if (regData.pincode) document.getElementById('coPincode').value = regData.pincode;
      if (regData.gender) document.getElementById('coGender').value = regData.gender;
      if (regData.country) document.getElementById('coCountry').value = regData.country;
      if (regData.user_type) document.getElementById('coUserType').value = regData.user_type;
      if (regData.date_of_birth) document.getElementById('coDob').value = regData.date_of_birth;
      if (regData.password) document.getElementById('coPassword').value = regData.password;

      if (regData.preferred_plan && plans[regData.preferred_plan]) {
        currentPlanKey = regData.preferred_plan;
        const targetRadio = document.querySelector(`input[name="selected_plan"][value="${currentPlanKey}"]`);
        if (targetRadio) {
          targetRadio.checked = true;
        }
      }
    }
  } catch (e) {
    console.warn('Could not read session data', e);
  }

  // Update order summary
  function updateSummary() {
    const plan = plans[currentPlanKey];
    if (!plan) return;

    planCards.forEach(card => {
      const isCurrent = card.getAttribute('data-plan-id') === currentPlanKey;
      card.classList.toggle('selected', isCurrent);
      const radio = card.querySelector('input[type="radio"]');
      if (radio) radio.checked = isCurrent;
    });

    if (summaryPlanIcon) summaryPlanIcon.textContent = plan.icon || '💎';
    if (summaryPlanName) summaryPlanName.textContent = plan.name;
    if (summaryPlanPeriod) summaryPlanPeriod.textContent = `${plan.period} • ${plan.matches}`;
    if (summaryPlanPriceDisplay) summaryPlanPriceDisplay.textContent = `₹${Number(plan.price).toLocaleString('en-IN')}`;

    const subtotal = Number(plan.price);
    if (subtotalDisplay) subtotalDisplay.textContent = `₹${subtotal.toLocaleString('en-IN')}`;

    // Compute coupon discount
    let discountAmount = 0;
    if (activeCoupon === 'WELCOME50') {
      discountAmount = Math.round(subtotal * 0.5);
    } else if (activeCoupon === 'LAUNCH10') {
      discountAmount = Math.round(subtotal * 0.1);
    }

    couponDiscount = discountAmount;
    const finalTotal = Math.max(0, subtotal - couponDiscount);

    if (discountRow) {
      if (couponDiscount > 0) {
        discountRow.style.display = 'flex';
        if (discountDisplay) discountDisplay.textContent = `-₹${couponDiscount.toLocaleString('en-IN')}`;
      } else {
        discountRow.style.display = 'none';
      }
    }

    if (totalDisplay) totalDisplay.textContent = `₹${finalTotal.toLocaleString('en-IN')}`;
    if (payBtnLabel) payBtnLabel.textContent = `Pay ₹${finalTotal.toLocaleString('en-IN')} & Activate`;
    if (mockPayable) mockPayable.textContent = `₹${finalTotal.toLocaleString('en-IN')}`;
    if (mockPlanTag) mockPlanTag.textContent = plan.name;
  }

  // Plan Card Selection Click
  planCards.forEach(card => {
    card.addEventListener('click', () => {
      currentPlanKey = card.getAttribute('data-plan-id');
      updateSummary();
    });
  });

  // Apply Coupon
  if (applyCouponBtn && couponInput) {
    applyCouponBtn.addEventListener('click', () => {
      const code = couponInput.value.trim().toUpperCase();
      if (!code) {
        couponMsg.textContent = 'Please enter a coupon code.';
        couponMsg.className = 'coupon-msg error';
        return;
      }

      if (code === 'WELCOME50') {
        activeCoupon = 'WELCOME50';
        couponMsg.textContent = 'Awesome! 50% discount applied.';
        couponMsg.className = 'coupon-msg success';
        updateSummary();
      } else if (code === 'LAUNCH10') {
        activeCoupon = 'LAUNCH10';
        couponMsg.textContent = 'Success! 10% launch discount applied.';
        couponMsg.className = 'coupon-msg success';
        updateSummary();
      } else {
        activeCoupon = '';
        couponMsg.textContent = 'Invalid promo code. Try WELCOME50 or LAUNCH10';
        couponMsg.className = 'coupon-msg error';
        updateSummary();
      }
    });
  }

  // Form Validation
  function validateForm() {
    const fullName = document.getElementById('coFullName')?.value.trim();
    const email = document.getElementById('coEmail')?.value.trim();
    const phone = document.getElementById('coPhone')?.value.trim();

    if (!fullName) {
      alert('Please enter your Full Name.');
      document.getElementById('coFullName')?.focus();
      return false;
    }
    if (!email || !email.includes('@')) {
      alert('Please enter a valid email address.');
      document.getElementById('coEmail')?.focus();
      return false;
    }
    if (!phone || phone.length < 10) {
      alert('Please enter a valid 10-digit mobile number.');
      document.getElementById('coPhone')?.focus();
      return false;
    }
    if (!currentPlanKey || !plans[currentPlanKey]) {
      alert('Please select a membership plan.');
      return false;
    }
    return true;
  }

  // Send Order to Backend
  async function submitOrderToBackend(paymentId, razorpayOrderId = null, signature = null) {
    payNowBtn.disabled = true;
    payNowBtn.classList.add('loading');

    const payload = {
      full_name: document.getElementById('coFullName').value.trim(),
      email: document.getElementById('coEmail').value.trim(),
      phone: document.getElementById('coPhone').value.trim(),
      gender: document.getElementById('coGender').value,
      city: document.getElementById('coCity').value.trim(),
      pincode: document.getElementById('coPincode').value.trim(),
      country: document.getElementById('coCountry').value,
      user_type: document.getElementById('coUserType').value,
      date_of_birth: document.getElementById('coDob').value,
      password: document.getElementById('coPassword').value,
      membership_plan: currentPlanKey,
      coupon_code: activeCoupon || null,
      payment_method: 'razorpay',
      payment_id: paymentId,
      razorpay_order_id: razorpayOrderId,
      razorpay_signature: signature,
      payment_status: 'completed',
      auto_renew: document.getElementById('autoRenewCheckbox')?.checked ? true : false,
      referral_code: document.getElementById('coReferralCode')?.value,
    };

    try {
      const response = await fetch('/checkout/process', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': window.csrfToken || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
        },
        body: JSON.stringify(payload),
      });

      const data = await response.json();

      payNowBtn.disabled = false;
      payNowBtn.classList.remove('loading');
      console.log(data);

      if (data.success) {
        // Clear stored reg data
        sessionStorage.removeItem('soulmate_reg_data');

        // Show Success Modal
        document.getElementById('receiptOrderNum').textContent = data.order_number;
        document.getElementById('receiptName').textContent = payload.full_name;
        document.getElementById('receiptPlan').textContent = data.plan_name;
        document.getElementById('receiptAmount').textContent = `₹${Number(data.total_amount).toLocaleString('en-IN')}`;
        document.getElementById('receiptTx').textContent = data.payment_id;

        // Update the dashboard button to use the URL from backend
        const dashBtn = document.getElementById('successDashboardBtn');
        if (dashBtn && data.dashboard_url) {
          dashBtn.href = data.dashboard_url;
          if (data.logged_in) {
            dashBtn.textContent = 'Go to Dashboard →';
          }
        }

        if (mockPaymentModal) mockPaymentModal.classList.remove('active');
        if (checkoutSuccessModal) checkoutSuccessModal.classList.add('active');
      } else {
        alert(data.message || 'Error processing order. Please check the fields and try again.');
      }
    } catch (err) {
      payNowBtn.disabled = false;
      payNowBtn.classList.remove('loading');
      console.error('Error submitting order', err);
      alert('Network error while processing membership. Please try again.');
    }
  }

  // Pay Now Click
  if (payNowBtn) {
    payNowBtn.addEventListener('click', () => {
      if (!validateForm()) return;

      const plan = plans[currentPlanKey];
      const subtotal = Number(plan.price);
      const totalAmount = Math.max(0, subtotal - couponDiscount);

      // Use the real Razorpay key if available
      const effectiveKey = RZP_KEY || '';

      if (window.Razorpay && effectiveKey.startsWith('rzp_')) {
        const options = {
          key: effectiveKey,
          amount: totalAmount * 100, // amount in paisa
          currency: 'INR',
          name: 'Soulmate India',
          description: `${plan.name} (${plan.period})`,
          image: '/assets/images/logo.jpg',
          prefill: {
            name: document.getElementById('coFullName').value,
            email: document.getElementById('coEmail').value,
            contact: document.getElementById('coPhone').value,
          },
          theme: {
            color: '#d80b76',
          },
          handler: function (response) {
            submitOrderToBackend(response.razorpay_payment_id, response.razorpay_order_id, response.razorpay_signature);
          },
        };
        const rzp = new window.Razorpay(options);
        rzp.on('payment.failed', function (response) {
          alert(`Payment failed: ${response.error.description}`);
        });
        rzp.open();
      } else {
        // Open simulation modal for testing
        if (mockPaymentModal) {
          mockPaymentModal.classList.add('active');
        } else {
          const mockId = 'pay_sim_' + Math.random().toString(36).substring(2, 12);
          submitOrderToBackend(mockId);
        }
      }
    });
  }

  // Mock Modal Controls
  if (closeMockModal && mockPaymentModal) {
    closeMockModal.addEventListener('click', () => {
      mockPaymentModal.classList.remove('active');
    });
  }

  if (simulateSuccessBtn) {
    simulateSuccessBtn.addEventListener('click', () => {
      const mockId = 'pay_test_' + Math.random().toString(36).substring(2, 14);
      submitOrderToBackend(mockId);
    });
  }

  // Auto-Renew Toggle Visual State
  const autoRenewCheckbox = document.getElementById('autoRenewCheckbox');
  const autoRenewCard = document.getElementById('autoRenewCard');
  if (autoRenewCheckbox && autoRenewCard) {
    autoRenewCheckbox.addEventListener('change', () => {
      if (autoRenewCheckbox.checked) {
        autoRenewCard.classList.add('enabled');
      } else {
        autoRenewCard.classList.remove('enabled');
      }
    });
  }

  // Initial Summary Render
  updateSummary();
});
