@extends('layouts.auth')

@section('content')
    <h2 style="text-align:center; margin-bottom:14px">{{ __('Login') }}</h2>

    @if($errors->any())
        <div style="color:#b91c1c; margin-bottom:8px; font-size:0.95rem;">
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom:10px;">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <div style="margin-bottom:10px;">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required style="width:100%; padding:8px; border-radius:6px; border:1px solid #d1d5db;">
        </div>

        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
            <label style="display:flex; align-items:center; gap:8px;"><input type="checkbox" name="remember"> {{ __('Remember Me') }}</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color:#1f4b8f;">{{ __('Forgot?') }}</a>
            @endif
        </div>

        <button type="submit" style="width:100%; background:#1f4b8f; color:white; padding:10px; border-radius:8px; border:none;">{{ __('Login') }}</button>
    </form>

@endsection
