@extends('layouts.portfolio')
@section('title','New investment')
@section('content')
@php
    $investmentType = in_array(old('investment_type'),['crypto','gold']) ? old('investment_type') : '';
@endphp
@include('user.portfolio.heading',['eyebrow'=>'Build your portfolio','heading'=>'Make a new investment','description'=>'Explore the available plans, choose your amount and select a balance to invest from.','action'=>route('investment.index'),'actionLabel'=>'Investment history','secondary'=>true])
<form method="POST" action="{{ route('investment.new') }}" data-portfolio-form data-investment-form data-loading="Creating investment…" class="pd-form-layout">
@csrf
<div class="pd-form-stack">
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">01</span><div><h2>Choose an investment category</h2><p>See the plans available for your preferred asset class.</p></div></div>
<fieldset aria-describedby="investment_type-error"><legend class="pd-sr-only">Investment category</legend><div class="pd-choice-grid">@foreach([['crypto','Cryptocurrency','crypto'],['gold','Gold','gold']] as $type)<label class="pd-choice"><input type="radio" name="investment_type" value="{{ $type[0] }}" required @if($investmentType === $type[0]) checked @endif><span class="pd-choice-icon">@include('user.portfolio.icon',['name'=>$type[2]])</span><span class="pd-choice-title">{{ $type[1] }}</span><span class="pd-choice-description">{{ $packages->where('plan_type',$type[0])->count() }} {{ $packages->where('plan_type',$type[0])->count() === 1 ? 'plan' : 'plans' }} available</span></label>@endforeach</div>@include('user.portfolio.field-error',['field'=>'investment_type'])</fieldset>
</section>
<section class="pd-card pd-form-section" data-plan-section @if($investmentType === '') hidden @endif><div class="pd-step-heading"><span class="pd-step-number">02</span><div><h2>Select your plan</h2><p>Compare the funding range and duration.</p></div></div>
@foreach(['crypto','gold'] as $category)
<fieldset data-plan-group="{{ $category }}" @if($investmentType !== $category) disabled hidden @endif aria-describedby="package-error"><legend class="pd-sr-only">{{ ucfirst($category) }} plans</legend>
<div class="pd-choice-grid pd-plan-grid">
@forelse($packages->where('plan_type',$category) as $package)
<label class="pd-choice pd-plan"><input type="radio" name="package" value="{{ $package->id }}" required data-name="{{ $package->name }}" data-min="{{ $package->minAmount }}" data-max="{{ $package->isUnlimited == 1 ? '' : $package->maxAmount }}" data-duration="{{ $package->Duration }}" data-reinvest="{{ $package->reinvest }}" @if((string)old('package') === (string)$package->id && $investmentType === $category) checked @endif><span class="pd-plan-type">{{ ucfirst($category) }} plan</span><span class="pd-choice-title">{{ $package->name }}</span>@if(!empty($package->note))<span class="pd-choice-description">{{ $package->note }}</span>@endif<span class="pd-plan-meta"><span><small>Funding range</small><strong>${{ number_format($package->minAmount,2) }}{{ $package->isUnlimited == 1 ? ' and above' : ' – $'.number_format($package->maxAmount,2) }}</strong></span><span><small>Duration</small><strong>{{ $package->Duration }}</strong></span><span><small>Number of returns</small><strong>{{ $package->numberOfReturns }}</strong></span><span><small>Profit reinvestment</small><strong>{{ $package->reinvest == 1 ? 'Available' : 'Not available' }}</strong></span></span></label>
@empty
<div style="grid-column:1/-1">@include('user.portfolio.empty',['icon'=>'chart','heading'=>'No '. $category .' plans available','description'=>'Check back for available plans or contact our team for help.','action'=>url('contact'),'actionLabel'=>'Contact support'])</div>
@endforelse
</div>
</fieldset>
@endforeach
@include('user.portfolio.field-error',['field'=>'package'])
</section>
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">03</span><div><h2>Set your investment amount</h2><p>Choose how much to allocate and the balance to use.</p></div></div>
<div class="pd-form-field"><label class="pd-form-label" for="investment-amount">Amount to invest <span>USD</span></label><div class="pd-money-input"><span aria-hidden="true">$</span><input class="pd-input" id="investment-amount" type="number" name="amount" required min="0.01" step="any" inputmode="decimal" value="{{ old('amount') }}" placeholder="0.00" aria-describedby="investment-limits amount-error" @if($errors->has('amount')) aria-invalid="true" @endif></div><p class="pd-field-hint" id="investment-limits" data-plan-limits>Choose a plan to see its funding limits.</p>@include('user.portfolio.field-error',['field'=>'amount'])</div>
<hr class="pd-form-divider">
<fieldset aria-describedby="account-error"><legend class="pd-form-label">Funding balance</legend><div class="pd-choice-grid pd-balance-choices"><label class="pd-choice"><input type="radio" name="account" value="1" required data-label="Account balance" data-balance="{{ $user->balance }}" @if((string)old('account') === '1') checked @endif><span class="pd-choice-title">Account balance</span><span class="pd-choice-value">${{ number_format($user->balance,2) }}</span></label>
@if($user->canCompound == 1)<label class="pd-choice"><input type="radio" name="account" value="2" required data-label="Profit balance" data-balance="{{ $user->profit }}" @if((string)old('account') === '2') checked @endif><span class="pd-choice-title">Profit balance</span><span class="pd-choice-value">${{ number_format($user->profit,2) }}</span></label>@endif
</div>@include('user.portfolio.field-error',['field'=>'account'])</fieldset>
<p class="pd-field-hint" data-reinvestment-note hidden>This plan uses your account balance. Profit reinvestment is unavailable for this plan.</p>
</section>
</div>
<aside class="pd-review"><section class="pd-card"><h2>Investment summary</h2><p>Review your allocation before confirming.</p><dl class="pd-summary"><div><dt>Category</dt><dd data-review-type>{{ $investmentType ? ucfirst($investmentType) : 'Choose a category' }}</dd></div><div><dt>Plan</dt><dd data-review-plan>Choose a plan</dd></div><div><dt>Duration</dt><dd data-review-duration>—</dd></div><div><dt>From</dt><dd data-review-source>Select a balance</dd></div><div class="pd-summary-total"><dt>Investment</dt><dd class="pd-money" data-review-amount>${{ number_format((float)old('amount',0),2) }}</dd></div></dl>
@include('user.portfolio.submit',['label'=>'Confirm investment','disabled'=>true])
<p class="pd-review-caption">Your investment amount is deducted from the selected balance when the investment is created.</p><a class="pd-link" style="margin-top:15px;font-size:11px" href="{{ route('new_deposit') }}">Need to add funds? @include('user.portfolio.icon',['name'=>'arrow'])</a></section><p class="pd-review-help">@include('user.portfolio.icon',['name'=>'support'])Questions? <a href="{{ url('contact') }}">Contact support</a></p></aside>
</form>
@endsection
