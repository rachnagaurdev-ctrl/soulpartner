@extends('layouts.dashboard')
@section('title', 'Settings')
@section('content')
<div class="dash-content" style="padding: 30px;">
    <h2 style="font-size: 24px; font-weight: 700; color: #0F172A; margin-bottom: 20px;">Settings</h2>
    
    <div style="background:#fff; border:1px solid #E2E8F0; border-radius:12px; padding:30px;">
        <h3 style="margin:0 0 16px; color:#1E293B; font-size:16px;">Notifications</h3>
        
        <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:16px; border-bottom:1px solid #F1F5F9; margin-bottom:16px;">
            <div>
                <div style="font-weight:500; color:#1E293B;">Email Notifications</div>
                <div style="font-size:13px; color:#64748B;">Receive emails for new messages and bookings.</div>
            </div>
            <label style="position:relative; display:inline-block; width:44px; height:24px;">
                <input type="checkbox" checked style="opacity:0; width:0; height:0;">
                <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:#10B981; border-radius:24px; transition:.4s;"></span>
                <span style="position:absolute; content:''; height:18px; width:18px; left:23px; bottom:3px; background-color:white; border-radius:50%; transition:.4s;"></span>
            </label>
        </div>
        
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
                <div style="font-weight:500; color:#1E293B;">SMS Alerts</div>
                <div style="font-size:13px; color:#64748B;">Receive text messages for booking updates.</div>
            </div>
            <label style="position:relative; display:inline-block; width:44px; height:24px;">
                <input type="checkbox" style="opacity:0; width:0; height:0;">
                <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:#CBD5E1; border-radius:24px; transition:.4s;"></span>
                <span style="position:absolute; content:''; height:18px; width:18px; left:3px; bottom:3px; background-color:white; border-radius:50%; transition:.4s;"></span>
            </label>
        </div>
    </div>
</div>
@endsection
