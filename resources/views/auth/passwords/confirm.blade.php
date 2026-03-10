@extends('layouts.auth')

@section('content')
    <h2 style="text-align:center; margin-bottom:12px">{{ __('Confirm Password') }}</h2>

    <p style="color:#6b7280; font-size:0.95rem; text-align:center;">{{ __('Please confirm your password before continuing.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div style="margin-bottom:12px;">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <button type="submit" style="width:100%; background:#1f4b8f; color:white; padding:10px; border-radius:8px; border:none;">{{ __('Confirm Password') }}</button>

        @if (Route::has('password.request'))
            <div style="text-align:center; margin-top:8px;"><a href="{{ route('password.request') }}" style="color:#1f4b8f">{{ __('Forgot Your Password?') }}</a></div>
        @endif
    </form>

@endsection
