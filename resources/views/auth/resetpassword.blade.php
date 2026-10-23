@extends('layouts.authentication')
@section('title', 'Reset password')
@section('story_eyebrow', 'Your account, your next step')
@section('story_title')A fresh start.<br><em>A clearer way forward.</em>@endsection
@section('story_copy', 'Choose a new password, then return to the plans and priorities that matter to you.')

@section('content')
<div class="ac-form-wrap">
    <div class="ac-heading">
        <div class="ac-heading-icon"><svg class="ac-icon" aria-hidden="true"><use href="#ac-lock"/></svg></div>
        <p class="ac-kicker">Reset your access</p>
        <h1>A new password.<br>Back to you.</h1>
        <p>Choose and confirm the password you’ll use the next time you sign in.</p>
    </div>

    @include('auth.partials.notifications')

    <form class="ac-form" method="POST" action="{{ route('resetPassword') }}" data-auth-form>
        @csrf
        <input type="hidden" name="code" value="{{ $code }}">
        <div class="ac-fields">
            <div class="ac-field">
                <label for="reset-username">Account username</label>
                <div class="ac-account-note"><input id="reset-username" type="text" name="email" value="{{ $email }}" autocomplete="username" readonly @if($errors->has('email')) aria-invalid="true" aria-describedby="reset-username-error" @endif><svg class="ac-icon" aria-hidden="true"><use href="#ac-lock"/></svg></div>
                @include('auth.partials.field-error', ['field' => 'email', 'id' => 'reset-username'])
            </div>
            @include('auth.partials.password-field', ['field' => 'password', 'id' => 'reset-password', 'label' => 'New password', 'placeholder' => 'Create a new password'])
            @include('auth.partials.password-field', ['field' => 'password_confirmation', 'id' => 'reset-password-confirm', 'label' => 'Confirm password', 'placeholder' => 'Enter it again'])
        </div>
        <button class="ac-submit" type="submit" data-auth-submit data-default-label="Reset password" data-loading-label="Updating your password…">
            <svg class="ac-loading-spinner" viewBox="0 0 20 20" aria-hidden="true"><circle cx="10" cy="10" r="7" opacity=".3"/><path d="M17 10a7 7 0 0 0-7-7" stroke-linecap="round"/></svg>
            <span data-submit-label>Reset password</span>
            <svg class="ac-icon ac-submit-arrow" aria-hidden="true"><use href="#ac-arrow"/></svg>
        </button>
    </form>
    <a class="ac-recovery-back" href="{{ route('login') }}"><svg class="ac-icon" aria-hidden="true"><use href="#ac-back"/></svg>Back to sign in</a>
    <p class="ac-recovery-help">Need a new reset link? <a href="{{ route('forgotPassword') }}">Request password reset instructions</a>.</p>
</div>
@endsection
