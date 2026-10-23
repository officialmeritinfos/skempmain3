<div class="ac-field">
    <div class="ac-label-row"><label for="{{ $id }}">{{ $label }}</label>@if(!empty($forgot))<a href="{{ route('forgotPassword') }}">Forgot password?</a>@endif</div>
    <div class="ac-password-input">
        <input id="{{ $id }}" type="password" name="{{ $field }}" autocomplete="{{ $autocomplete ?? 'new-password' }}" placeholder="{{ $placeholder }}" required @if($errors->has($field)) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif data-auth-password>
        <button type="button" class="ac-password-toggle" data-password-toggle="{{ $id }}" aria-controls="{{ $id }}" aria-pressed="false" aria-label="Show {{ strtolower($label) }}"><svg class="ac-icon ac-password-eye" aria-hidden="true"><use href="#ac-eye"/></svg><svg class="ac-icon ac-password-eye-off" aria-hidden="true"><use href="#ac-eye-off"/></svg></button>
    </div>
    <p class="ac-caps-warning" data-caps-warning hidden aria-live="polite">Caps Lock is on.</p>
    @include('auth.partials.field-error', ['field' => $field, 'id' => $id])
</div>
