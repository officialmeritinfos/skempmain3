@if($errors->any())
<div class="pd-alert pd-alert-error" role="alert"><strong>Please check the following</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
@foreach(['success','error','warning','info','status'] as $messageType)
@if(session($messageType))<div class="pd-alert pd-alert-{{ $messageType }}" role="{{ $messageType === 'error' ? 'alert' : 'status' }}">{{ session($messageType) }}</div>@endif
@endforeach
