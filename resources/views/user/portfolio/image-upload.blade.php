<div class="pa-upload-field" data-image-upload>
<label class="pd-form-label" for="{{ $id }}">{{ $label }}@if($optional ?? false) <span>Optional</span>@endif</label>
<div class="pa-upload"><span class="pa-upload-icon">@include('user.portfolio.icon',['name'=>$icon ?? 'download'])</span><p class="pa-upload-title">{{ $prompt ?? 'Choose a clear image' }}</p><p class="pd-field-hint">{{ $hint }}</p><input type="file" id="{{ $id }}" name="{{ $name }}" accept="image/*" @if(!($optional ?? false)) required @endif data-image-file aria-describedby="{{ $name }}-error {{ $id }}-filename" @if($errors->has($name)) aria-invalid="true" @endif><p class="pa-file-name" id="{{ $id }}-filename" data-image-name aria-live="polite">No image selected</p><img hidden data-image-preview alt="Preview of the selected {{ strtolower($label) }}" class="pa-image-preview"></div>
@include('user.portfolio.field-error',['field'=>$name])
</div>
