@extends('layouts.authentication')
@section('title', 'Create an account')
@section('auth_variant', 'ac-auth-register')
@section('story_eyebrow', 'Your next chapter')
@section('story_title')A wider perspective.<br><em>A new beginning.</em>@endsection
@section('story_copy', 'Take the first step towards the future you have in mind. Your client account brings your investment journey together.')

@section('content')
<div class="ac-form-wrap ac-form-wrap-wide">
    <div class="ac-heading">
        <p class="ac-kicker">Open your account</p>
        <h1>Your next chapter starts here.</h1>
        <p>Create your account to explore investment options and manage your activity in one place.</p>
    </div>

    @include('auth.partials.notifications')

    <form class="ac-form ac-form-register" method="POST" action="{{ route('auth.register') }}" data-auth-form>
        @csrf
        <div class="ac-fields">
            <div class="ac-field-grid">
                <div class="ac-field">
                    <label for="register-name">Full name</label>
                    <input id="register-name" type="text" name="name" value="{{ old('name') }}" placeholder="Your full name" autocomplete="name" maxlength="255" required @if($errors->has('name')) aria-invalid="true" aria-describedby="register-name-error" @endif>
                    @include('auth.partials.field-error', ['field' => 'name', 'id' => 'register-name'])
                </div>
                <div class="ac-field">
                    <label for="register-username">Username</label>
                    <input id="register-username" type="text" name="username" value="{{ old('username') }}" placeholder="Choose a username" autocomplete="username" maxlength="100" autocapitalize="none" spellcheck="false" required @if($errors->has('username')) aria-invalid="true" aria-describedby="register-username-error" @endif>
                    @include('auth.partials.field-error', ['field' => 'username', 'id' => 'register-username'])
                </div>
            </div>
            <div class="ac-field-grid">
                <div class="ac-field">
                    <label for="register-email">Email address</label>
                    <input id="register-email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" autocapitalize="none" spellcheck="false" required @if($errors->has('email')) aria-invalid="true" aria-describedby="register-email-error" @endif>
                    @include('auth.partials.field-error', ['field' => 'email', 'id' => 'register-email'])
                </div>
                <div class="ac-field">
                    <div class="ac-label-row"><label for="register-phone">Phone number</label><span>Optional</span></div>
                    <input id="register-phone" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Your phone number" autocomplete="tel" @if($errors->has('phone')) aria-invalid="true" aria-describedby="register-phone-error" @endif>
                    @include('auth.partials.field-error', ['field' => 'phone', 'id' => 'register-phone'])
                </div>
            </div>
            <div class="ac-field-grid">
                @include('auth.partials.password-field', ['field' => 'password', 'id' => 'register-password', 'label' => 'Password', 'placeholder' => 'Create a password'])
                @include('auth.partials.password-field', ['field' => 'password_confirmation', 'id' => 'register-password-confirm', 'label' => 'Confirm password', 'placeholder' => 'Enter it again'])
            </div>
            <details class="ac-referral" @if(old('referral', $referral ?? null) || $errors->has('referral')) open @endif>
                <summary><span>Have a referral username?</span><span aria-hidden="true">+</span></summary>
                <div class="ac-field">
                    <div class="ac-label-row"><label for="register-referral">Referral username</label><span>Optional</span></div>
                    <input id="register-referral" type="text" name="referral" value="{{ old('referral', $referral ?? null) }}" placeholder="Enter their username" autocomplete="off" autocapitalize="none" spellcheck="false" @if($errors->has('referral')) aria-invalid="true" aria-describedby="register-referral-error" @endif>
                    @include('auth.partials.field-error', ['field' => 'referral', 'id' => 'register-referral'])
                </div>
            </details>
            <div class="ac-captcha-block">
                <div class="ac-label-row"><span class="ac-captcha-label">Security check</span><span>Complete to continue</span></div>
                <div class="ac-captcha-viewport"><div id="register-captcha" class="g-recaptcha" data-sitekey="{{ config('app.recaptcha.site_key') }}" @if($errors->has('g-recaptcha-response')) aria-describedby="register-captcha-error" @endif></div></div>
                @include('auth.partials.field-error', ['field' => 'g-recaptcha-response', 'id' => 'register-captcha'])
            </div>
        </div>
        <button class="ac-submit" type="submit" data-auth-submit data-default-label="Create account" data-loading-label="Creating your account…">
            <svg class="ac-loading-spinner" viewBox="0 0 20 20" aria-hidden="true"><circle cx="10" cy="10" r="7" opacity=".3"/><path d="M17 10a7 7 0 0 0-7-7" stroke-linecap="round"/></svg>
            <span data-submit-label>Create account</span>
            <svg class="ac-icon ac-submit-arrow" aria-hidden="true"><use href="#ac-arrow"/></svg>
        </button>
        <p class="ac-registration-note">Read our <a href="{{ url('/terms') }}">Terms of use</a> and <a href="{{ url('/privacy') }}">Privacy policy</a> for information about your account and our services.</p>
    </form>
    <p class="ac-form-switch">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
</div>
@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" defer></script>
@endpush
