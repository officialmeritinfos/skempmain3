@extends('layouts.portfolio')
@section('title','Deposit details')
@section('content')
@php $isBank = ($deposit->deposit_type ?? 'crypto') === 'bank'; $awaiting = in_array((int)$deposit->status,[2,4]); @endphp
@include('user.portfolio.heading',['eyebrow'=>'Account funding','heading'=>'Deposit details','description'=>'Reference #'.$deposit->reference,'action'=>route('deposit.index'),'actionLabel'=>'All deposits','secondary'=>true])
<div class="pd-form-layout">
<div class="pd-form-stack">
<section class="pd-card"><div class="pd-detail-top"><div><p class="pd-section-label">Deposit amount</p><p class="pd-detail-amount pd-money">${{ number_format($deposit->amount,2) }}</p><p class="pd-detail-meta">{{ $isBank ? 'Bank transfer' : $deposit->asset.' deposit' }} · {{ $deposit->created_at->format('d M Y, h:i a') }}</p></div>@include('user.portfolio.status',['kind'=>'deposit','status'=>$deposit->status])</div>
<div class="pd-detail-body">
@if((int)$deposit->status === 1)
<h2>Deposit completed</h2><p class="pd-caption">Your payment has been verified. Keep this reference for your records.</p>
@elseif((int)$deposit->status === 3)
<h2>This deposit was cancelled</h2><p class="pd-caption">Contact our team if you already sent a payment for this deposit.</p><div class="pd-detail-actions"><a class="pd-button pd-button-secondary" href="{{ url('contact') }}">Contact support</a><a class="pd-link" href="{{ route('new_deposit') }}">Create a new deposit</a></div>
@else
@if($isBank)
<h2>Your bank payment instructions</h2><p class="pd-caption">Contact support with reference <strong>#{{ $deposit->reference }}</strong> for the bank details assigned to your account.</p><div class="pd-info">@include('user.portfolio.icon',['name'=>'bank'])<div><strong>Use your unique bank details.</strong>Do not send funds to a generic bank account. Our team will provide the correct details for this ${{ number_format($deposit->amount,2) }} deposit.</div></div><div class="pd-detail-actions"><a class="pd-button pd-button-secondary" href="{{ url('contact') }}">Contact support @include('user.portfolio.icon',['name'=>'external'])</a></div>
@else
<h2>Send your payment</h2><p class="pd-caption">@if($deposit->paymentMethod == 1)Send exactly <strong>{{ $deposit->cryptoAmount }} {{ $deposit->asset }}</strong> to the address below.@else Send <strong>${{ number_format($deposit->amount,2) }} worth of {{ $deposit->asset }}</strong> to the address below.@endif</p><p class="pd-form-label" style="margin-top:20px">Payment address</p><div class="pd-address"><code id="deposit-address">{{ $deposit->details }}</code><button type="button" class="pd-button pd-button-secondary pd-button-small" data-copy="deposit-address" aria-label="Copy deposit address">@include('user.portfolio.icon',['name'=>'copy'])<span data-copy-label>Copy address</span></button></div><p class="pd-field-hint">Use the correct asset and network for this payment address.</p>
@endif
@if((int)$deposit->status === 4)<div class="pd-alert" style="margin-top:22px" role="status">Your deposit is under review. We’ll update its status after the payment is verified.</div>@endif
@if($awaiting)<div class="pd-detail-actions"><a class="pd-button" href="{{ route('deposit.havePaid',$deposit->id) }}" data-confirm-action="Have you sent the payment for this deposit? Only continue after completing your payment.">@include('user.portfolio.icon',['name'=>'check'])I’ve made the payment</a></div>@endif
@endif
@if($deposit->transactionHash)<hr class="pd-form-divider"><p class="pd-form-label">Submitted transaction hash</p><p class="pd-caption pd-break">{{ $deposit->transactionHash }}</p>@endif
@if($deposit->paymentProof)<div class="pd-detail-actions"><a class="pd-link" href="{{ url($deposit->paymentProof) }}" target="_blank" rel="noopener">View submitted proof @include('user.portfolio.icon',['name'=>'external'])</a></div>@endif
</div></section>
@if($awaiting)
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">@include('user.portfolio.icon',['name'=>'download'])</span><div><h2>Submit payment proof</h2><p>Share a receipt or transaction hash to help verify your payment.</p></div></div>
<form method="POST" action="{{ route('deposits.proof',$deposit->id) }}" enctype="multipart/form-data" data-portfolio-form data-loading="Submitting proof…">
@csrf
<div class="pd-form-field"><label class="pd-form-label" for="deposit-tx-hash">Transaction hash <span>Optional</span></label><input class="pd-input" type="text" name="tx_hash" id="deposit-tx-hash" maxlength="255" value="{{ old('tx_hash') }}" placeholder="Paste transaction hash" spellcheck="false" aria-describedby="tx_hash-error" @if($errors->has('tx_hash')) aria-invalid="true" @endif>@include('user.portfolio.field-error',['field'=>'tx_hash'])</div>
<div class="pd-form-field"><label class="pd-form-label" for="deposit-proof">Payment receipt <span>Optional</span></label><div class="pd-proof-upload"><input type="file" name="proof" id="deposit-proof" accept=".jpg,.jpeg,.png,.webp,.pdf" data-proof-input aria-describedby="proof-help proof-error" @if($errors->has('proof')) aria-invalid="true" @endif></div><p class="pd-field-hint" id="proof-help">JPG, PNG, WebP or PDF, up to 5 MB.</p>@include('user.portfolio.field-error',['field'=>'proof'])</div><div style="margin-top:22px">@include('user.portfolio.submit',['label'=>'Submit proof'])</div>
</form>
</section>
@endif
</div>
<aside class="pd-review pd-stack"><section class="pd-card"><h2>Deposit record</h2><dl class="pd-summary" style="margin-bottom:0;border-bottom:0;padding-bottom:0"><div><dt>Reference</dt><dd>#{{ $deposit->reference }}</dd></div><div><dt>Method</dt><dd>{{ $isBank ? 'Bank transfer' : 'Cryptocurrency' }}</dd></div><div><dt>Asset</dt><dd>{{ $isBank ? 'USD' : $deposit->asset }}</dd></div><div><dt>Payment reference</dt><dd>{{ $deposit->paymentRef ?: '—' }}</dd></div><div><dt>Created</dt><dd>{{ $deposit->created_at->format('d M Y, h:i a') }}</dd></div></dl></section>
@if(!$isBank && $awaiting)<section class="pd-card"><h2>Scan the payment address</h2><div class="pd-qr"><img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($deposit->details) }}" alt="QR code for the deposit wallet address" width="150" height="150" loading="lazy"></div><p class="pd-review-caption">You can also copy the full address from the payment instructions.</p></section>@endif
</aside>
</div>
@endsection
