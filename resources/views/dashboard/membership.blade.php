@extends('layouts.dashboard')
@section('title', 'Membership')
@section('content')

<style>
    /* Home Membership Card Design */
    .plans-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      align-items: stretch;
      width: 100%;
    }
    
    @media (max-width: 1200px) {
      .plans-row {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (max-width: 768px) {
      .plans-row {
        grid-template-columns: 1fr;
      }
    }
    
    .plan-card {
      background: #ffffff;
      border-radius: 18px;
      padding: 20px 16px 18px;
      border: 1.5px solid #ede8f5;
      display: flex;
      flex-direction: column;
      gap: 12px;
      position: relative;
      transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.28s cubic-bezier(0.16, 1, 0.3, 1);
      box-shadow: 0 4px 18px rgba(30, 17, 60, 0.05);
    }
    .plan-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 32px rgba(30, 17, 60, 0.1);
    }
    
    .plan-card-header {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .plan-icon {
      width: 40px;
      height: 40px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
      background: #f0eaf8; /* default */
    }
    .plan-icon-silver { background: #f0eaf8; }
    .plan-icon-gold { background: #fff4e0; }
    .plan-icon-premium { background: #f0ecf8; }
    .plan-icon-yearly { background: #fce8f4; }
    
    .plan-name {
      font-size: 16px;
      font-weight: 800;
      color: #1a1535;
      line-height: 1.1;
    }
    .plan-name-yearly { font-size: 15px; }
    
    .plan-price {
      font-size: 14px;
      font-weight: 700;
      color: #1a1535;
      margin-top: 2px;
    }
    .plan-price-yearly { font-size: 13px; }
    
    .plan-period {
      font-size: 11.5px;
      font-weight: 500;
      color: #94A3B8;
    }
    
    .plan-match-pill {
      display: inline-block;
      text-align: center;
      border-radius: 30px;
      padding: 5px 14px;
      font-size: 13px;
      font-weight: 700;
      width: 100%;
      box-sizing: border-box;
      background: rgba(85, 49, 168, 0.08); /* default */
      color: #5531a8;
      border: 1.5px solid rgba(85, 49, 168, 0.18);
    }
    .plan-match-silver {
      background: rgba(216, 11, 118, 0.08);
      color: #d80b76;
      border: 1.5px solid rgba(216, 11, 118, 0.18);
    }
    .plan-match-gold {
      background: rgba(234, 152, 0, 0.1);
      color: #b87200;
      border: 1.5px solid rgba(234, 152, 0, 0.22);
    }
    .plan-match-premium {
      background: rgba(85, 49, 168, 0.08);
      color: #5531a8;
      border: 1.5px solid rgba(85, 49, 168, 0.18);
    }
    .plan-match-yearly {
      background: linear-gradient(135deg, rgba(216, 11, 118, 0.12), rgba(85, 49, 168, 0.12));
      color: #d80b76;
      border: 1.5px solid rgba(216, 11, 118, 0.22);
    }
    
    .plan-features {
      list-style: none;
      padding: 0;
      margin: 0;
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .plan-features li {
      font-size: 12.5px;
      color: #4b455b;
      line-height: 1.4;
      display: flex;
      align-items: flex-start;
      gap: 7px;
    }
    .plan-features li::before {
      content: "";
      display: inline-block;
      width: 15px;
      height: 15px;
      min-width: 15px;
      border-radius: 50%;
      background: rgba(216, 11, 118, 0.12) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23d80b76' stroke-width='3.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E") no-repeat center / 9px;
      margin-top: 1px;
    }
    
    .plan-btn {
      width: 100%;
      padding: 10px 14px;
      font-size: 13px;
      font-weight: 700;
      border-radius: 10px;
      cursor: pointer;
      border: none;
      transition: all 0.22s ease;
      background: linear-gradient(135deg, #5531a8 0%, #7c3aed 100%); /* default */
      color: #fff;
      box-shadow: 0 4px 14px rgba(85, 49, 168, 0.28);
    }
    .plan-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(85, 49, 168, 0.4);
    }
    
    .plan-btn-silver { background: #5531a8; box-shadow: 0 4px 14px rgba(85, 49, 168, 0.22); }
    .plan-btn-silver:hover { background: #431d90; }
    
    .plan-btn-gold { background: linear-gradient(135deg, #f5a623 0%, #f07d00 100%); box-shadow: 0 4px 14px rgba(240, 125, 0, 0.28); }
    .plan-btn-gold:hover { background: linear-gradient(135deg, #e09615 0%, #d96d00 100%); }
    
    .plan-btn-premium { background: linear-gradient(135deg, #5531a8 0%, #7c3aed 100%); box-shadow: 0 4px 14px rgba(85, 49, 168, 0.28); }
    .plan-btn-premium:hover { background: linear-gradient(135deg, #4320a0 0%, #6b2adb 100%); }
    
    .plan-btn-yearly { background: linear-gradient(135deg, #d80b76 0%, #ef2c8c 100%); box-shadow: 0 4px 14px rgba(216, 11, 118, 0.32); padding: 12px 14px; }
    .plan-btn-yearly:hover { background: linear-gradient(135deg, #be0967 0%, #df1979 100%); }
    
    .plan-yearly {
      border: 2px solid #d80b76;
      background: linear-gradient(180deg, #fff5fa 0%, #ffffff 40%);
      box-shadow: 0 8px 28px rgba(216, 11, 118, 0.14);
    }
    .plan-yearly:hover { box-shadow: 0 16px 42px rgba(216, 11, 118, 0.24); }
    
    .plan-best-value-badge {
      position: absolute;
      top: -1px;
      left: -1px;
      background: #d80b76;
      color: #fff;
      font-size: 9.5px;
      font-weight: 800;
      letter-spacing: 0.08em;
      padding: 4px 12px;
      border-radius: 16px 0 12px 0;
    }
    .plan-refund-badge {
      position: absolute;
      top: -14px;
      right: 10px;
      width: 50px;
      height: 50px;
      background: radial-gradient(circle, #ff3c5f, #d80b76);
      color: #fff;
      border-radius: 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 900;
      line-height: 1;
      text-align: center;
      box-shadow: 0 4px 14px rgba(216, 11, 118, 0.4);
      border: 2px solid #fff;
    }
    .plan-refund-badge span { font-size: 8px; font-weight: 600; }
    .switch {
      position: relative;
      display: inline-block;
      width: 36px;
      height: 20px;
    }
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #EF4444;
      transition: .4s;
      border-radius: 20px;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 14px;
      width: 14px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    input:checked + .slider {
      background-color: #10B981;
    }
    input:checked + .slider:before {
      transform: translateX(16px);
    }
</style>

<div class="dash-content" style="padding: 30px;">
    <div style="text-align: center; margin-bottom: 30px;">
        <h2 style="font-size: 24px; font-weight: 800; color: #0F172A; margin-bottom: 8px;">Membership Plans</h2>
        <p style="color: #64748B; font-size: 14px; max-width: 500px; margin: 0 auto;">Upgrade your account to unlock premium features and get more visibility.</p>
    </div>
    
    <div style="background: linear-gradient(90deg, #0F172A, #1E293B); color: #fff; border-radius: 12px; padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; box-shadow: 0 8px 20px rgba(15,23,42,0.15); flex-wrap: wrap; gap: 20px;">
        <div style="flex: 1; min-width: 200px;">
            <div style="display:inline-block; padding:3px 10px; background: rgba(255,255,255,0.1); color:#FCE7F3; border-radius:16px; font-size:11px; font-weight:600; margin-bottom:6px; letter-spacing: 1px;">CURRENT PLAN</div>
            <h3 style="margin:0 0 4px; font-size:20px; font-weight: 700;">{{ $currentPlanName ?? 'Basic Tier' }}</h3>
            <p style="margin:0; color:#94A3B8; font-size:13px;">You are currently on the {{ strtolower($currentPlanName ?? 'Basic Tier') }}.</p>
        </div>
        
        @if(isset($order) && $order)
        <div style="display:flex; gap:24px; flex-wrap:wrap; align-items: center;">
            <div>
                <div style="font-size:11px; color:#94A3B8; margin-bottom:2px; text-transform:uppercase; letter-spacing:1px;">Purchased On</div>
                <div style="font-size:14px; font-weight:600;">{{ $purchaseDate }}</div>
            </div>
            <div>
                <div style="font-size:11px; color:#94A3B8; margin-bottom:2px; text-transform:uppercase; letter-spacing:1px;">Expiry Date</div>
                <div style="font-size:14px; font-weight:600; color:#F59E0B;">{{ $expiryDate ?? 'Lifetime' }}</div>
            </div>
            <div style="display:flex; flex-direction:column; align-items:flex-start;">
                <div style="font-size:11px; color:#94A3B8; margin-bottom:2px; text-transform:uppercase; letter-spacing:1px;">Auto Renew</div>
                <div style="display:flex; align-items:center; gap:8px;">
                    <span style="font-size:14px; font-weight:600; color:{{ $order->auto_renew ? '#10B981' : '#EF4444' }};" id="arStatusText">{{ $order->auto_renew ? 'Active' : 'Off' }}</span>
                    <label class="switch">
                        <input type="checkbox" id="arToggleCheck" {{ $order->auto_renew ? 'checked' : '' }} onchange="toggleAutoRenew({{ $order->id }}, this.checked)">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
        @else
        <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            <svg width="20" height="20" fill="none" stroke="#Fce7F3" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        </div>
        @endif
    </div>

    <div class="plans-row">
        @foreach($plans as $plan)
        <article class="plan-card plan-{{ $plan->slug }}{{ $plan->slug === 'yearly' ? ' plan-yearly' : '' }}">
            @if(!empty($plan->badge))
            <div class="plan-best-value-badge">{{ $plan->badge }}</div>
            @endif
            
            @if($plan->slug === 'yearly')
            <div class="plan-refund-badge">50%<br><span>Refund</span></div>
            @endif
            
            <div class="plan-card-header">
                <div class="plan-icon plan-icon-{{ $plan->slug }}">{{ $plan->icon ?? '🛡️' }}</div>
                <div>
                    <div class="plan-name {{ $plan->slug === 'yearly' ? 'plan-name-yearly' : '' }}">{{ $plan->name }}</div>
                    <div class="plan-price {{ $plan->slug === 'yearly' ? 'plan-price-yearly' : '' }}">₹{{ number_format($plan->price, 0) }} <span class="plan-period">/ {{ $plan->period ?? 'month' }}</span></div>
                </div>
            </div>
            
            <div class="plan-match-pill plan-match-{{ $plan->slug }}">{{ $plan->matches }}{{ is_numeric($plan->matches) ? ' Matches' : (str_contains(strtolower($plan->matches), 'match') ? '' : ' Matches') }}</div>
            
            <ul class="plan-features {{ $plan->slug === 'yearly' ? 'plan-features-yearly' : '' }}">
                @if(is_array($plan->features) || is_object($plan->features))
                    @foreach($plan->features as $feature)
                    <li>{{ is_array($feature) ? ($feature['name'] ?? 'Feature') : $feature }}</li>
                    @endforeach
                @else
                    <li>Premium Features</li>
                @endif
            </ul>
            
            <button class="plan-btn plan-btn-{{ $plan->slug }}" onclick="window.location='{{ route('checkout.index', ['plan' => $plan->slug]) }}'">Upgrade to {{ $plan->name }}</button>
        </article>
        @endforeach
    </div>
</div>

<script>
function toggleAutoRenew(orderId, status) {
    if(!confirm('Are you sure you want to turn ' + (status ? 'on' : 'off') + ' auto-renew?')) {
        document.getElementById('arToggleCheck').checked = !status;
        return;
    }
    
    document.getElementById('arToggleCheck').disabled = true;
    
    fetch('/dashboard/membership/toggle-autorenew', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ order_id: orderId, status: status })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            const statusText = document.getElementById('arStatusText');
            statusText.textContent = status ? 'Active' : 'Off';
            statusText.style.color = status ? '#10B981' : '#EF4444';
            document.getElementById('arToggleCheck').disabled = false;
            if(window.showToast) showToast('Success', 'Auto-renew has been turned ' + (status ? 'on' : 'off') + '.');
        } else {
            alert('Error updating status.');
            document.getElementById('arToggleCheck').checked = !status;
            document.getElementById('arToggleCheck').disabled = false;
        }
    })
    .catch(err => {
        alert('Server error.');
        document.getElementById('arToggleCheck').checked = !status;
        document.getElementById('arToggleCheck').disabled = false;
    });
}
</script>
@endsection
