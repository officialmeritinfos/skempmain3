@extends('layouts.portfolio')
@section('title','Settings')
@include('user.portfolio.account-assets')
@section('content')
@php
    $passwordErrors = $errors->hasAny(['old_password','new_password','new_password_confirmation']);
    $photoErrors = $errors->has('photo');
    $settingsSection = $passwordErrors || stripos((string)(session('error') ?: session('success')),'password') !== false ? 'security' : ($photoErrors || stripos((string)session('success'),'image') !== false ? 'photo' : 'profile');
    $settingsInitials = collect(preg_split('/\s+/',trim((string)($user->name ?: $user->username))))->filter()->take(2)->map(fn($part)=>mb_strtoupper(mb_substr($part,0,1)))->implode('');
@endphp
@include('user.portfolio.heading',['eyebrow'=>'Your account','heading'=>'Account settings','description'=>'Manage your personal information, profile photo and sign-in preferences.'])
<section class="pd-card pa-settings-header"><div class="pa-settings-person">@if($user->photo)<img class="pa-settings-avatar" src="{{ asset('dashboard/user/images/'.$user->photo) }}" alt="Current profile photo">@else<span class="pa-settings-avatar">{{ $settingsInitials }}</span>@endif<div><h2>{{ $user->name }}</h2><p>{{ $user->email }}</p></div></div><div class="pa-settings-meta"><div><p>Username</p><strong>{{ $user->username }}</strong></div><div><p>Email sign-in verification</p><strong>{{ (int)$user->twoWay === 1 ? 'Enabled' : 'Disabled' }}</strong></div></div></section>
<div class="pa-settings-layout" data-settings @if($errors->any() || $settingsSection !== 'profile') data-force-tab="true" @endif>
<aside><div class="pd-card pa-settings-tabs" role="tablist" aria-label="Account settings sections">
@foreach([['profile','Profile & sign-in','Personal information','users'],['photo','Profile photo','Your account image','card'],['security','Password','Change your password','shield']] as $tab)
<button type="button" role="tab" id="tab-settings-{{ $tab[0] }}" aria-controls="settings-{{ $tab[0] }}" aria-selected="{{ $settingsSection === $tab[0] ? 'true' : 'false' }}" tabindex="{{ $settingsSection === $tab[0] ? '0' : '-1' }}">@include('layouts.partials.user-nav-icon',['icon'=>$tab[3]])<span><strong>{{ $tab[1] }}</strong><small>{{ $tab[2] }}</small></span></button>
@endforeach
</div><p class="pa-settings-help">Need help changing your email or username? <a href="{{ url('contact') }}">Contact our team.</a></p></aside>
<div>
<section class="pd-card pd-form-section pa-settings-panel" id="settings-profile" role="tabpanel" aria-labelledby="tab-settings-profile" tabindex="0" @if($settingsSection !== 'profile') hidden @endif><div class="pa-form-intro"><h2>Personal information</h2><p class="pd-caption">Keep your account details current.</p></div>
<form method="POST" action="{{ route('settings.update') }}" data-portfolio-form data-loading="Saving profile…">
@csrf
<div class="pa-form-grid">
@include('user.portfolio.account-input',['id'=>'settings-name','name'=>'name','label'=>'Full name','value'=>$user->name,'maxlength'=>150,'autocomplete'=>'name'])
@include('user.portfolio.account-input',['id'=>'settings-phone','name'=>'phone','label'=>'Phone number','value'=>$user->phone,'type'=>'tel','maxlength'=>100,'autocomplete'=>'tel'])
@include('user.portfolio.account-input',['id'=>'settings-dob','name'=>'dob','label'=>'Date of birth','value'=>substr((string)$user->dateOfBirth,0,10),'type'=>'date','autocomplete'=>'bday'])
@include('user.portfolio.account-input',['id'=>'settings-country','name'=>'country','label'=>'Country','value'=>$user->country,'autocomplete'=>'country-name'])
</div>
<dl class="pa-profile-locked">@foreach([['Email address',$user->email],['Username',$user->username],['Account reference',$user->userRef]] as $locked)<div><dt>{{ $locked[0] }} · Read only</dt><dd>{{ $locked[1] ?: '—' }}</dd></div>@endforeach</dl>
<div class="pa-twofactor"><fieldset aria-describedby="twoWay-help twoWay-error"><legend class="pd-form-label">Email sign-in verification</legend><p class="pd-caption" id="twoWay-help" style="margin-bottom:15px">When enabled, confirm new sign-ins using the verification link sent to your email.</p><div class="pd-choice-grid">
@foreach([['1','Enabled','Verify sign-ins with the link sent to your email.'],['2','Disabled','Sign in without the additional email verification step.']] as $option)<label class="pd-choice"><input type="radio" name="twoWay" value="{{ $option[0] }}" required @if((string)old('twoWay',(int)$user->twoWay === 1 ? '1' : '2') === $option[0]) checked @endif><span class="pd-choice-title">{{ $option[1] }}</span><span class="pd-choice-description">{{ $option[2] }}</span></label>@endforeach
</div>@include('user.portfolio.field-error',['field'=>'twoWay'])</fieldset></div>
<div class="pa-form-footer"><p class="pd-caption">Email, username and account reference can’t be changed on this form.</p>@include('user.portfolio.submit',['label'=>'Save profile'])</div>
</form></section>
<section class="pd-card pd-form-section pa-settings-panel" id="settings-photo" role="tabpanel" aria-labelledby="tab-settings-photo" tabindex="0" @if($settingsSection !== 'photo') hidden @endif><div class="pa-form-intro"><h2>Profile photo</h2><p class="pd-caption">Choose a photo for your account profile.</p></div>
<form method="POST" action="{{ route('photo.update') }}" enctype="multipart/form-data" data-portfolio-form data-loading="Updating photo…">
@csrf
<div class="pa-photo-layout"><div>@if($user->photo)<img class="pa-photo-current" src="{{ asset('dashboard/user/images/'.$user->photo) }}" alt="Current profile photo">@else<span class="pa-photo-current">{{ $settingsInitials }}</span>@endif<p class="pa-photo-caption">Current photo</p></div>
@include('user.portfolio.image-upload',['id'=>'settings-photo-upload','name'=>'photo','label'=>'New profile photo','prompt'=>'Choose your new profile photo','hint'=>'Select an image from your device.'])
</div><div class="pa-form-footer"><p class="pd-caption">Preview your selected image before saving it to your profile.</p>@include('user.portfolio.submit',['label'=>'Update photo'])</div>
</form></section>
<section class="pd-card pd-form-section pa-settings-panel" id="settings-security" role="tabpanel" aria-labelledby="tab-settings-security" tabindex="0" @if($settingsSection !== 'security') hidden @endif><div class="pa-form-intro"><h2>Change your password</h2><p class="pd-caption">Confirm your current password and choose a new one.</p></div>
<form method="POST" action="{{ route('password.update') }}" data-portfolio-form data-change-password data-loading="Updating password…">
@csrf
<div class="pa-password-grid">
@include('user.portfolio.account-password',['id'=>'settings-current-password','name'=>'old_password','label'=>'Current password','autocomplete'=>'current-password'])
@include('user.portfolio.account-password',['id'=>'settings-new-password','name'=>'new_password','label'=>'New password','autocomplete'=>'new-password'])
@include('user.portfolio.account-password',['id'=>'settings-confirm-password','name'=>'new_password_confirmation','label'=>'Confirm new password','autocomplete'=>'new-password'])
</div><div class="pa-form-footer"><p class="pd-caption">Use your new password the next time you sign in or confirm an account action.</p>@include('user.portfolio.submit',['label'=>'Update password'])</div>
</form></section>
</div></div>
@endsection
