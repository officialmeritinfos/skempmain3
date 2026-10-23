@extends('layouts.portfolio')
@section('title','New withdrawal')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Account payouts','heading'=>'Withdraw your funds','description'=>'Choose a balance and enter the wallet where you would like to receive your payout.','action'=>route('withdrawal.index'),'actionLabel'=>'Withdrawal history','secondary'=>true])
@if($user->loan > 0)<div class="pd-alert pd-alert-warning" role="status">Withdrawals are unavailable while your outstanding loan balance of <strong>${{ number_format($user->loan,2) }}</strong> remains unpaid. <a class="pd-link" href="{{ url('contact') }}">Contact support</a> for assistance.</div>@endif
<form method="POST" action="{{ route('withdraw.new') }}" data-portfolio-form data-withdrawal-form data-loading="Submitting withdrawal…" class="pd-form-layout">
@csrf
<div class="pd-form-stack">
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">01</span><div><h2>Choose a balance</h2><p>Select the balance that will fund this withdrawal.</p></div></div>
<fieldset aria-describedby="account-error"><legend class="pd-sr-only">Withdrawal funding balance</legend><div class="pd-choice-grid pd-balance-choices">@foreach([['1','Profit balance',$user->profit],['2','Referral balance',$user->refBal],['3','Bonus balance',$user->bonus],['34','Account balance',$user->balance]] as $source)<label class="pd-choice"><input type="radio" name="account" value="{{ $source[0] }}" required data-label="{{ $source[1] }}" data-balance="{{ $source[2] }}" @if((string)old('account') === $source[0]) checked @endif><span class="pd-choice-title">{{ $source[1] }}</span><span class="pd-choice-value">${{ number_format($source[2],2) }}</span></label>@endforeach</div>@include('user.portfolio.field-error',['field'=>'account'])</fieldset>
</section>
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">02</span><div><h2>Enter payout details</h2><p>Confirm the asset and destination carefully.</p></div></div>
<div class="pd-form-field"><label class="pd-form-label" for="withdrawal-amount">Withdrawal amount <span>USD</span></label><div class="pd-money-input"><span aria-hidden="true">$</span><input class="pd-input" type="number" name="amount" id="withdrawal-amount" required step="any" inputmode="decimal" min="{{ max(.01,(float)$web->minWithdrawal) }}" value="{{ old('amount') }}" placeholder="0.00" aria-describedby="withdrawal-minimum amount-error" @if($errors->has('amount')) aria-invalid="true" @endif></div><p class="pd-field-hint" id="withdrawal-minimum">Minimum withdrawal: ${{ number_format($web->minWithdrawal,2) }}</p>@include('user.portfolio.field-error',['field'=>'amount'])</div>
<hr class="pd-form-divider">
@include('user.portfolio.assets',['legend'=>'Payout asset'])
<hr class="pd-form-divider">
<div class="pd-form-field"><label class="pd-form-label" for="withdrawal-wallet">Destination wallet address</label><textarea class="pd-input" name="wallet" id="withdrawal-wallet" required rows="3" placeholder="Paste the destination wallet address" spellcheck="false" autocomplete="off" aria-describedby="wallet-help wallet-error" @if($errors->has('wallet')) aria-invalid="true" @endif>{{ old('wallet') }}</textarea><p class="pd-field-hint" id="wallet-help">Make sure the wallet address and network match the selected payout asset.</p>@include('user.portfolio.field-error',['field'=>'wallet'])</div>
</section>
</div>
<aside class="pd-review"><section class="pd-card"><h2>Withdrawal summary</h2><p>Review the balance and asset for your payout.</p><dl class="pd-summary"><div><dt>From</dt><dd data-review-source>Select a balance</dd></div><div><dt>Available</dt><dd data-review-balance>—</dd></div><div><dt>Payout asset</dt><dd data-review-asset>Select an asset</dd></div><div class="pd-summary-total"><dt>Request amount</dt><dd class="pd-money" data-review-amount>${{ number_format((float)old('amount',0),2) }}</dd></div></dl>
@include('user.portfolio.submit',['label'=>'Request withdrawal','disabled'=>$user->loan > 0 || $coins->isEmpty()])
<p class="pd-review-caption">The requested amount is deducted from the selected balance when your request is accepted.</p><div class="pd-info">@include('user.portfolio.icon',['name'=>'info'])<div>Check the full wallet address before submitting. You can follow your request in withdrawal history.</div></div></section><p class="pd-review-help">@include('user.portfolio.icon',['name'=>'support'])Need help? <a href="{{ url('contact') }}">Contact support</a></p></aside>
</form>
@endsection
