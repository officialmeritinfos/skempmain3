@extends('layouts.authentication')
@section('title', 'Sign in')
@section('story_eyebrow', 'Your client account')
@section('story_title')Your future.<br><em>Always in focus.</em>@endsection
@section('story_copy', 'A wider view of your investments, with your next chapter in mind.')

@section('content')
<div class="ac-form-wrap">
    <div class="ac-heading">
        <p class="ac-kicker">Client portal</p>
        <h1>Welcome back.</h1>
        <p>Sign in with your username to access your account.</p>
    </div>

    @include('auth.partials.notifications')

    <form class="ac-form" method="POST" action="{{ route('auth.login') }}" data-auth-form>
        @csrf
        <div class="ac-fields">
            <div class="ac-field">
                <label for="login-username">Username</label>
                <input id="login-username" type="text" name="email" value="{{ old('email') }}" placeholder="Enter your username" autocomplete="username" autocapitalize="none" spellcheck="false" required @if($errors->has('email')) aria-invalid="true" aria-describedby="login-username-error" @endif>
                @include('auth.partials.field-error', ['field' => 'email', 'id' => 'login-username'])
            </div>
            @include('auth.partials.password-field', ['field' => 'password', 'id' => 'login-password', 'label' => 'Password', 'placeholder' => 'Enter your password', 'autocomplete' => 'current-password', 'forgot' => true])
        </div>
        <button class="ac-submit" type="submit" data-auth-submit data-default-label="Sign in" data-loading-label="Signing in…">
            <svg class="ac-loading-spinner" viewBox="0 0 20 20" aria-hidden="true"><circle cx="10" cy="10" r="7" opacity=".3"/><path d="M17 10a7 7 0 0 0-7-7" stroke-linecap="round"/></svg>
            <span data-submit-label>Sign in</span>
            <svg class="ac-icon ac-submit-arrow" aria-hidden="true"><use href="#ac-arrow"/></svg>
        </button>
    </form>

    <p class="ac-form-switch">New here? <a href="{{ route('register') }}">Create an account</a></p>
    <div class="ac-support-line"><svg class="ac-icon" aria-hidden="true"><use href="#ac-lock"/></svg><a href="{{ url('/security') }}">Keeping your account safe</a></div>
</div>
@endsection
