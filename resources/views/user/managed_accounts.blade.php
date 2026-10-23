@extends('layouts.portfolio')
@section('title','Managed accounts')
@include('user.portfolio.account-assets')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Trading account management','heading'=>'Your managed accounts','description'=>'Submit an external trading account and follow its management subscription.'])
<div class="pa-metrics">
<section class="pd-card pa-metric pa-metric-primary"><div><h2 class="pd-section-label">Available account balance</h2><p class="pd-money">${{ number_format($user->balance,2) }}</p></div><span class="pd-stat-icon">@include('layouts.partials.user-nav-icon',['icon'=>'wallet'])</span></section>
<section class="pd-card pa-metric"><div><h2 class="pd-section-label">Managed accounts</h2><p class="pa-metric-value">{{ $accounts->count() }}</p></div><span class="pd-stat-icon">@include('layouts.partials.user-nav-icon',['icon'=>'briefcase'])</span></section>
<section class="pd-card pa-metric"><div><h2 class="pd-section-label">Ongoing subscriptions</h2><p class="pa-metric-value">{{ $accounts->where('status',4)->count() }}</p></div><span class="pd-stat-icon">@include('user.portfolio.icon',['name'=>'clock'])</span></section>
</div>
<details class="pd-card pa-create" id="managed-application" @if($accounts->isEmpty() || $errors->any()) open @endif><summary><span class="pd-row-icon">@include('user.portfolio.icon',['name'=>'plus'])</span><span><strong>Add a managed account</strong><small>Choose a subscription and enter your trading account details.</small></span>@include('user.portfolio.icon',['name'=>'chevron'])</summary>
<div class="pa-create-content">
<form method="POST" action="{{ route('subtrade.new') }}" data-portfolio-form data-managed-form data-balance="{{ $user->balance }}" data-loading="Submitting account…" class="pd-form-layout">
@csrf<input type="hidden" name="amount" value="">
<div>
<section class="pa-section-block"><div class="pd-step-heading"><span class="pd-step-number">01</span><div><h2>Choose a management duration</h2><p>The subscription fee is paid from your account balance.</p></div></div>
<fieldset aria-describedby="subDuration-error"><legend class="pd-sr-only">Management subscription</legend><div class="pa-duration-grid">
@forelse($durations as $duration)<label class="pd-choice"><input type="radio" name="subDuration" value="{{ $duration->id }}" data-title="{{ $duration->title }}" data-duration="{{ $duration->duration }}" data-amount="{{ $duration->amount }}" required @if((string)old('subDuration') === (string)$duration->id) checked @endif><span class="pd-choice-title">{{ $duration->title }}</span><span class="pd-choice-description">{{ $duration->duration }}</span><span class="pd-choice-value">${{ number_format($duration->amount,2) }}</span></label>
@empty<p class="pd-caption pa-full">No management subscriptions are available right now. Please contact our team for assistance.</p>@endforelse
</div>@include('user.portfolio.field-error',['field'=>'subDuration'])</fieldset></section>
<section class="pa-section-block"><div class="pd-step-heading"><span class="pd-step-number">02</span><div><h2>Trading account details</h2><p>Use the details supplied by your trading account provider.</p></div></div>
<div class="pa-form-grid">
@include('user.portfolio.account-input',['id'=>'managed-account-id','name'=>'accountId','label'=>'Account ID','maxlength'=>150,'autocomplete'=>'off'])
@include('user.portfolio.account-password',['id'=>'managed-account-password','name'=>'accountPassword','label'=>'Trading password','maxlength'=>150,'autocomplete'=>'off'])
@include('user.portfolio.account-input',['id'=>'managed-type','name'=>'accountType','label'=>'Account type','maxlength'=>150,'placeholder'=>'e.g. Standard'])
@include('user.portfolio.account-input',['id'=>'managed-currency','name'=>'currency','label'=>'Currency','maxlength'=>150,'placeholder'=>'e.g. USD'])
@include('user.portfolio.account-input',['id'=>'managed-leverage','name'=>'leverage','label'=>'Leverage','maxlength'=>150,'placeholder'=>'e.g. 1:500'])
@include('user.portfolio.account-input',['id'=>'managed-server','name'=>'server','label'=>'Trading server','maxlength'=>150,'placeholder'=>'Server name'])
</div></section>
<div class="pa-form-footer"><p class="pd-caption">Check your account details carefully. The subscription fee is deducted when your request is accepted.</p>@include('user.portfolio.submit',['label'=>'Submit account','disabled'=>$durations->isEmpty()])</div>
</div>
<aside class="pa-plain-review"><h3>Subscription summary</h3><p>Your trading account will be submitted for management.</p><dl class="pd-summary"><div><dt>Subscription</dt><dd data-managed-title>Choose a duration</dd></div><div><dt>Duration</dt><dd data-managed-length>—</dd></div><div><dt>Available balance</dt><dd>${{ number_format($user->balance,2) }}</dd></div><div><dt>Subscription fee</dt><dd data-managed-fee>—</dd></div><div><dt>Balance after fee</dt><dd data-managed-remaining>—</dd></div></dl><p class="pd-field-error" data-managed-insufficient hidden>Your account balance is too low for this subscription. <a class="pd-link" href="{{ route('new_deposit') }}">Add funds</a> to continue.</p></aside>
</form></div></details>
<section class="pd-card pd-table-card" data-activity="all"><div class="pd-card-heading"><div><h2>Subscription history <span class="pd-count">{{ $accounts->count() }} records</span></h2><p>Your trading accounts and management status</p></div></div>
@if($accounts->isNotEmpty())
@include('user.portfolio.filters',['label'=>'managed accounts','isPage'=>false,'statuses'=>[4=>'Ongoing',2=>'Pending',1=>'Completed',3=>'Cancelled']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Trading account</th><th scope="col">Subscription</th><th scope="col">Expires</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($accounts as $account)<tr data-activity-row data-status="{{ in_array((int)$account->status,[1,2,4]) ? $account->status : 3 }}"><td data-label="Account"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>'briefcase'])</span><span><strong class="pd-table-title">{{ $account->accountId }}</strong><small>{{ $account->accountType }} · {{ $account->server }}</small></span></div></td><td data-label="Subscription"><span class="pd-money">${{ number_format($account->amount,2) }}</span><small>{{ $account->duration }}</small></td><td data-label="Expires">{{ $account->expires_at ? date('d M Y',(int)$account->expires_at) : '—' }}</td><td data-label="Status">@include('user.portfolio.account-status',['kind'=>'managed','status'=>$account->status])</td><td class="pd-cell-action pa-table-actions"><details class="pd-inline-details pa-history-details"><summary>View details</summary><dl><div><dt>Reference</dt><dd>{{ $account->reference }}</dd></div><div><dt>Currency / leverage</dt><dd>{{ $account->currency }} / {{ $account->leverage }}</dd></div><div><dt>Submitted</dt><dd>{{ $account->created_at?->format('d M Y, h:i a') ?: '—' }}</dd></div>@if(in_array((int)$account->status,[1,4]) && $account->started_at)<div><dt>Started</dt><dd>{{ date('d M Y, h:i a',(int)$account->started_at) }}</dd></div>@endif</dl><a class="pa-detail-action" href="{{ route('subtrade.delete',['id'=>$account->reference]) }}" data-confirm-action="Remove this managed-account record? This removes the record from your account.">Remove account</a></details></td></tr>@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No managed accounts match your search.</p>
@else
@include('user.portfolio.empty',['icon'=>'briefcase','heading'=>'Your managed accounts will appear here','description'=>'Add a trading account above to start a management subscription.'])
@endif
</section>
@endsection
