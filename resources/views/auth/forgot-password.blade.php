@extends('partial.layout')
@section('content')
<div class="container" style="max-width: 500px; margin: 80px auto; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    <h2 style="text-align: center; color: #d80b76; margin-bottom: 10px;">Forgot Password</h2>
    <p style="text-align: center; color: #666; margin-bottom: 25px;">Enter your email address and we will send you a password reset link.</p>

    @if (session('status'))
        <div style="background: #e6ffed; border: 1px solid #b7ebc5; color: #1e7e34; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #333;">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-size: 15px; outline: none; transition: border 0.2s;">
            @error('email')
                <div style="color: #e3342f; font-size: 13px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 16px; font-weight: 600;">
            Send Password Reset Link
        </button>
    </form>
</div>
@endsection
