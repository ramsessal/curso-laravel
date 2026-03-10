@extends('layouts.auth')

@section('content')
    <h2 style="text-align:center; margin-bottom:12px">{{ __('Verify Your Email Address') }}</h2>

    @if (session('resent'))
        <div style="background:#e6fffa; padding:8px; border-radius:6px; margin-bottom:10px; color:#065f46">{{ __('A fresh verification link has been sent to your email address.') }}</div>
    @endif

    <p style="color:#6b7280; text-align:center;">{{ __('Before proceeding, please check your email for a verification link.') }} {{ __('If you did not receive the email') }},</p>

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" style="text-align:center; margin-top:8px;">
        @csrf
        <button type="submit" style="background:none; border:none; color:#1f4b8f; text-decoration:underline; cursor:pointer;">{{ __('click here to request another') }}</button>.
    </form>

@endsection
