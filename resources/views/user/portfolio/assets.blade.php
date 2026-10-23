<fieldset class="pd-asset-fieldset" @if($disabled ?? false) disabled hidden @endif @if($forDeposit ?? false) data-deposit-assets @endif aria-describedby="asset-error">
<legend class="pd-form-label">{{ $legend ?? 'Choose an asset' }}</legend>
@if($coins->isNotEmpty())
<div class="pd-choice-grid pd-asset-grid">@foreach($coins as $coin)<label class="pd-choice pd-asset-choice"><input type="radio" name="asset" value="{{ $coin->asset }}" required @if((string)old('asset') === (string)$coin->asset) checked @endif><span class="pd-choice-title">{{ $coin->name }}</span><span class="pd-choice-description">{{ $coin->asset }}</span></label>@endforeach</div>
@else
<p class="pd-caption">No payment assets are available at the moment. Please contact support for help.</p>
@endif
@include('user.portfolio.field-error',['field'=>'asset'])
</fieldset>
