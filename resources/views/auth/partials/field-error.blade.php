@if($errors->has($field))
    <p class="ac-field-error" id="{{ $id }}-error">{{ $errors->first($field) }}</p>
@endif
