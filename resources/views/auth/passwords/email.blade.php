@extends('layouts.auth')

@section('content')
    <h2 style="text-align:center; margin-bottom:12px">{{ __('Reset Password') }}</h2>

    @if (session('status'))
        <div style="background:#e6fffa; padding:8px; border-radius:6px; margin-bottom:10px; color:#065f46">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div style="margin-bottom:10px;">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <button type="submit" style="width:100%; background:#1f4b8f; color:white; padding:10px; border-radius:8px; border:none;">{{ __('Send Password Reset Link') }}</button>
    </form>

@endsection
