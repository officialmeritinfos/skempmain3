@extends('layouts.portfolio')
@section('title','New deposit')
@section('content')
@php $depositType = old('deposit_type', $coins->isEmpty() ? 'bank' : 'crypto') === 'bank' ? 'bank' : 'crypto'; @endphp
@include('user.portfolio.heading',['eyebrow'=>'Account funding','heading'=>'Add funds to your account','description'=>'Choose your payment method. You’ll receive the payment instructions on the next page.','action'=>route('deposit.index'),'actionLabel'=>'Deposit history','secondary'=>true])
<form method="POST" action="{{ route('deposit.new') }}" data-portfolio-form data-deposit-form data-loading="Creating deposit…" data-crypto-min="{{ $cryptoMinimum }}" data-bank-min="{{ $bankMinimum }}" class="pd-form-layout">
@csrf
<div class="pd-form-stack">
    <section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">01</span><div><h2>Choose a payment method</h2><p>Fund your account with cryptocurrency or a bank transfer.</p></div></div>
        <fieldset aria-describedby="deposit_type-error"><legend class="pd-sr-only">Deposit method</legend><div class="pd-choice-grid">
            <label class="pd-choice"><input type="radio" name="deposit_type" value="crypto" required @if($depositType === 'crypto') checked @endif><span class="pd-choice-icon">@include('user.portfolio.icon',['name'=>'crypto'])</span><span class="pd-choice-title">Cryptocurrency</span><span class="pd-choice-description">Pay with a supported crypto asset.</span><span class="pd-choice-foot">From ${{ number_format($cryptoMinimum,2) }}</span></label>
            <label class="pd-choice"><input type="radio" name="deposit_type" value="bank" required @if($depositType === 'bank') checked @endif><span class="pd-choice-icon">@include('user.portfolio.icon',['name'=>'bank'])</span><span class="pd-choice-title">Bank transfer</span><span class="pd-choice-description">Get your unique bank details from support.</span><span class="pd-choice-foot">From ${{ number_format($bankMinimum,2) }}</span></label>
        </div>@include('user.portfolio.field-error',['field'=>'deposit_type'])</fieldset>
    </section>
    <section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">02</span><div><h2>Enter your deposit details</h2><p>Enter the value of your deposit in US dollars.</p></div></div>
        <div class="pd-form-field"><label class="pd-form-label" for="deposit-amount">Deposit amount <span>USD</span></label><div class="pd-money-input"><span aria-hidden="true">$</span><input class="pd-input" type="number" name="amount" id="deposit-amount" required step="any" inputmode="decimal" min="{{ $depositType === 'bank' ? $bankMinimum : $cryptoMinimum }}" value="{{ old('amount') }}" placeholder="0.00" aria-describedby="deposit-minimum amount-error" @if($errors->has('amount')) aria-invalid="true" @endif></div><p class="pd-field-hint" id="deposit-minimum">Minimum deposit: <strong data-deposit-minimum>${{ number_format($depositType === 'bank' ? $bankMinimum : $cryptoMinimum,2) }}</strong></p>@include('user.portfolio.field-error',['field'=>'amount'])</div>
        <hr class="pd-form-divider">
        @include('user.portfolio.assets',['legend'=>'Payment asset','forDeposit'=>true,'disabled'=>$depositType === 'bank'])
        <div class="pd-info" data-bank-info @if($depositType !== 'bank') hidden @endif>@include('user.portfolio.icon',['name'=>'info'])<div><strong>Bank details are unique to your account.</strong>Create your deposit request, then contact support with the reference to receive the correct payment details.</div></div>
    </section>
</div>
<aside class="pd-review"><section class="pd-card"><h2>Deposit summary</h2><p>Review your request before continuing.</p><dl class="pd-summary"><div><dt>Payment method</dt><dd data-review-method>{{ $depositType === 'bank' ? 'Bank transfer' : 'Cryptocurrency' }}</dd></div><div><dt>Payment asset</dt><dd data-review-asset>{{ $depositType === 'bank' ? 'USD' : (old('asset') ?: 'Select an asset') }}</dd></div><div class="pd-summary-total"><dt>Deposit amount</dt><dd class="pd-money" data-review-amount>${{ number_format((float)old('amount',0),2) }}</dd></div></dl>
@include('user.portfolio.submit',['label'=>'Continue to payment','disabled'=>$depositType === 'crypto' && $coins->isEmpty()])
<p class="pd-review-caption">This creates your deposit request. Your balance is updated after payment is verified.</p><ol class="pd-steps"><li>Create the deposit request.</li><li>Follow the payment instructions.</li><li>Mark the deposit as paid for verification.</li></ol></section><p class="pd-review-help">@include('user.portfolio.icon',['name'=>'support'])Need help? <a href="{{ url('contact') }}">Contact support</a></p></aside>
</form>
@endsection
