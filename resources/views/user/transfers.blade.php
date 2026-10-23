@extends('layouts.portfolio')
@section('title','Transfers')
@section('content')
@inject('injected','App\Defaults\Custom')
@include('user.portfolio.heading',['eyebrow'=>'Between accounts','heading'=>'Transfer funds','description'=>'Send funds from your profit balance to another investor using their username.'])
@if($user->canLoan == 1)
<form method="POST" action="{{ route('transfer.new') }}" data-portfolio-form data-transfer-form data-loading="Sending transfer…" class="pd-form-layout">
@csrf
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">01</span><div><h2>Transfer details</h2><p>Enter the recipient, amount and your account password.</p></div></div>
<div class="pd-form-field"><label class="pd-form-label" for="transfer-username">Recipient username</label><input class="pd-input" type="text" name="username" id="transfer-username" value="{{ old('username') }}" required placeholder="Enter recipient username" autocomplete="off" autocapitalize="none" spellcheck="false" aria-describedby="username-help username-error" @if($errors->has('username')) aria-invalid="true" @endif><p class="pd-field-hint" id="username-help">Use the recipient’s exact account username.</p>@include('user.portfolio.field-error',['field'=>'username'])</div>
<div class="pd-form-field"><label class="pd-form-label" for="transfer-amount">Transfer amount <span>USD</span></label><div class="pd-money-input"><span aria-hidden="true">$</span><input class="pd-input" type="number" name="amount" id="transfer-amount" required step="any" inputmode="decimal" min="0.01" max="{{ $user->profit }}" value="{{ old('amount') }}" placeholder="0.00" aria-describedby="transfer-balance amount-error" @if($errors->has('amount')) aria-invalid="true" @endif></div><p class="pd-field-hint" id="transfer-balance">Available in profit balance: ${{ number_format($user->profit,2) }}</p>@include('user.portfolio.field-error',['field'=>'amount'])</div>
<div class="pd-form-field"><label class="pd-form-label" for="transfer-password">Account password</label><div class="pd-password"><input class="pd-input" type="password" name="password" id="transfer-password" required autocomplete="current-password" placeholder="Enter your account password" aria-describedby="password-error" @if($errors->has('password')) aria-invalid="true" @endif><button type="button" data-password-toggle="transfer-password" aria-label="Show password" aria-pressed="false">Show</button></div>@include('user.portfolio.field-error',['field'=>'password'])</div>
</section>
<aside class="pd-review"><section class="pd-card"><h2>Transfer summary</h2><p>Check who you’re sending to before continuing.</p><dl class="pd-summary"><div><dt>From</dt><dd>Profit balance</dd></div><div><dt>Available</dt><dd>${{ number_format($user->profit,2) }}</dd></div><div><dt>To</dt><dd data-review-recipient>Recipient username</dd></div><div class="pd-summary-total"><dt>Transfer amount</dt><dd class="pd-money" data-review-amount>${{ number_format((float)old('amount',0),2) }}</dd></div></dl>
@include('user.portfolio.submit',['label'=>'Send transfer'])<p class="pd-review-caption">Funds are credited to the account matching the username you enter.</p></section><p class="pd-review-help">@include('user.portfolio.icon',['name'=>'shield'])Authorise with your account password</p></aside>
</form>
@else
<div class="pd-card">@include('user.portfolio.empty',['icon'=>'transfer','heading'=>'Transfers are currently unavailable','description'=>'Contact our team if you need help with transfers on your account.','action'=>url('contact'),'actionLabel'=>'Contact support'])</div>
@endif
<section class="pd-card pd-table-card" data-activity="all"><div class="pd-card-heading"><div><h2>Transfer history <span class="pd-count">{{ $transfers->count() }} records</span></h2><p>Sent and received transfers</p></div><span class="pd-caption">Amounts in USD</span></div>
@if($transfers->isNotEmpty())
@include('user.portfolio.filters',['label'=>'transfers','isPage'=>false,'statuses'=>[1=>'Completed',2=>'Pending',4=>'Processing',3=>'Cancelled']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Transfer</th><th scope="col">Amount</th><th scope="col">Direction</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($transfers as $transfer)
@php $outgoing = (int)$transfer->sender === (int)$user->id; $counterparty = $outgoing ? $transfer->recipientHolder : $injected->getInvestorUsername($transfer->sender); @endphp
<tr data-activity-row data-status="{{ in_array((int)$transfer->status,[1,2,4]) ? $transfer->status : 3 }}"><td data-label="Transfer"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>$outgoing ? 'withdraw' : 'deposit'])</span><span><strong class="pd-table-title">{{ $outgoing ? 'To' : 'From' }} {{ $counterparty }}</strong><span class="pd-table-subtitle">{{ $transfer->created_at->format('d M Y, h:i a') }} · #{{ $transfer->reference }}</span></span></div></td><td data-label="Amount">@if($transfer->amount !== null)<span class="pd-money {{ $outgoing ? '' : 'pd-text-success' }}">{{ $outgoing ? '−' : '+' }}${{ number_format($transfer->amount,2) }}</span>@else<span class="pd-amount-unavailable">Not recorded</span>@endif</td><td data-label="Direction">{{ $outgoing ? 'Sent' : 'Received' }}</td><td data-label="Status">@include('user.portfolio.status',['status'=>in_array((int)$transfer->status,[1,2,4]) ? $transfer->status : 3])</td><td class="pd-cell-action"><details class="pd-inline-details"><summary>View details</summary><dl><div><dt>Reference</dt><dd>{{ $transfer->reference }}</dd></div><div><dt>{{ $outgoing ? 'Recipient' : 'Sender' }}</dt><dd>{{ $counterparty }}</dd></div><div><dt>Date</dt><dd>{{ $transfer->created_at->format('d M Y, h:i a') }}</dd></div></dl></details></td></tr>
@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No transfers match your search.</p>
@else
@include('user.portfolio.empty',['icon'=>'transfer','heading'=>'No transfers yet','description'=>'Your sent and received transfers will appear here.'])
@endif
</section>
@endsection
