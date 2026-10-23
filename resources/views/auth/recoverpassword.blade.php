@extends('layouts.authentication')
@section('title', 'Forgot password')
@section('story_eyebrow', 'Here to help')
@section('story_title')Let’s get you<br><em>back on track.</em>@endsection
@section('story_copy', 'A few simple steps to regain access and return to your client account.')

@section('content')
<div class="ac-form-wrap">
    <div class="ac-heading">
        <div class="ac-heading-icon"><svg class="ac-icon" aria-hidden="true"><use href="#ac-key"/></svg></div>
        <p class="ac-kicker">Account recovery</p>
        <h1>Forgot your password?</h1>
        <p>Enter your username. We’ll send password reset instructions to the email address linked to your account.</p>
    </div>

    @include('auth.partials.notifications')

    <form class="ac-form" method="POST" action="{{ route('recoverPassword') }}" data-auth-form>
        @csrf
        <div class="ac-field">
            <label for="recover-username">Username</label>
            <input id="recover-username" type="text" name="email" value="{{ old('email') }}" placeholder="Enter your username" autocomplete="username" autocapitalize="none" spellcheck="false" required @if($errors->has('email')) aria-invalid="true" aria-describedby="recover-username-error" @endif>
            @include('auth.partials.field-error', ['field' => 'email', 'id' => 'recover-username'])
        </div>
        <button class="ac-submit" type="submit" data-auth-submit data-default-label="Send reset instructions" data-loading-label="Sending instructions…">
            <svg class="ac-loading-spinner" viewBox="0 0 20 20" aria-hidden="true"><circle cx="10" cy="10" r="7" opacity=".3"/><path d="M17 10a7 7 0 0 0-7-7" stroke-linecap="round"/></svg>
            <span data-submit-label>Send reset instructions</span>
            <svg class="ac-icon ac-submit-arrow" aria-hidden="true"><use href="#ac-arrow"/></svg>
        </button>
    </form>

    <a class="ac-recovery-back" href="{{ route('login') }}"><svg class="ac-icon" aria-hidden="true"><use href="#ac-back"/></svg>Back to sign in</a>
    <p class="ac-recovery-help">Having trouble accessing your account? <a href="{{ url('/contact') }}">Contact our team</a> for help.</p>
</div>
@endsection
