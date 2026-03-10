@extends('layouts.auth')

@section('content')
    <h2 style="text-align:center; margin-bottom:12px">{{ __('Reset Password') }}</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div style="margin-bottom:10px;">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <div style="margin-bottom:10px;">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <div style="margin-bottom:14px;">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <button type="submit" style="width:100%; background:#1f4b8f; color:white; padding:10px; border-radius:8px; border:none;">{{ __('Reset Password') }}</button>
    </form>

@endsection
