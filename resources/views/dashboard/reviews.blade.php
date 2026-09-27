@extends('layouts.dashboard')
@section('title', 'My Reviews')
@section('content')
<div class="dash-content" style="padding: 30px;">
    <h2 style="font-size: 24px; font-weight: 700; color: #0F172A; margin-bottom: 20px;">My Reviews</h2>
    
    @if($reviews->isEmpty())
        <div style="background:#fff; border:1px solid #E2E8F0; border-radius:12px; padding:40px; text-align:center;">
            <div style="width:64px; height:64px; background:#F1F5F9; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; color:#94A3B8;">
                <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
            </div>
            <h3 style="margin:0 0 8px; color:#1E293B;">No Reviews Yet</h3>
            <p style="margin:0; color:#64748B;">You haven't received any reviews from your bookings yet.</p>
        </div>
    @else
        <div style="display:flex; flex-direction:column; gap:16px;">
            @foreach($reviews as $review)
                <div style="background:#fff; border:1px solid #E2E8F0; border-radius:12px; padding:20px; display:flex; gap:16px;">
                    <img src="{{ $review->reviewer->profile_image ? asset('storage/' . $review->reviewer->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode($review->reviewer->name).'&background=FCE7F3&color=E91E63' }}" style="width:50px; height:50px; border-radius:50%; object-fit:cover;">
                    <div>
                        <div style="display:flex; align-items:center; gap:10px; margin-bottom:4px;">
                            <strong style="color:#1E293B; font-size:16px;">{{ $review->reviewer->name }}</strong>
                            <span style="color:#64748B; font-size:12px;">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <div style="color:#F59E0B; font-size:12px; margin-bottom:8px;">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </div>
                        <p style="margin:0; color:#475569; font-size:14px; line-height:1.5;">{{ $review->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
