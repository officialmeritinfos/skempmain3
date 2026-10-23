<div class="pd-form-field">
<label class="pd-form-label" for="{{ $id }}">{{ $label }}@if($optional ?? false) <span>Optional</span>@endif</label>
<input class="pd-input" type="{{ $type ?? 'text' }}" id="{{ $id }}" name="{{ $name }}" value="{{ old($name,$value ?? '') }}" @if(!($optional ?? false)) required @endif @isset($maxlength) maxlength="{{ $maxlength }}" @endisset @isset($autocomplete) autocomplete="{{ $autocomplete }}" @endisset @isset($placeholder) placeholder="{{ $placeholder }}" @endisset aria-describedby="{{ $name }}-error" @if($errors->has($name)) aria-invalid="true" @endif>
@include('user.portfolio.field-error',['field'=>$name])
</div>
