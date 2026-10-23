@if($errors->any())
    <div class="ac-notice ac-notice-error" role="alert" tabindex="-1">
        <svg class="ac-icon" aria-hidden="true"><use href="#ac-info"/></svg>
        <div><strong>Please check your details.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    </div>
@endif
@foreach(['success', 'error', 'warning', 'info', 'status'] as $authFlashType)
    @if(session($authFlashType))
        <div class="ac-notice ac-notice-{{ $authFlashType }}" role="{{ in_array($authFlashType, ['error', 'warning']) ? 'alert' : 'status' }}">
            <svg class="ac-icon" aria-hidden="true"><use href="{{ $authFlashType === 'success' ? '#ac-check' : '#ac-info' }}"/></svg>
            <p>{{ session($authFlashType) }}</p>
        </div>
    @endif
@endforeach
