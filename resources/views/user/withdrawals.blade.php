@extends('layouts.portfolio')
@section('title','Withdrawals')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Account payouts','heading'=>'Your withdrawals','description'=>'Follow each payout request and review the destination and funding balance.','action'=>route('new_withdrawal'),'actionLabel'=>'New withdrawal'])
<section class="pd-card pd-table-card" data-activity="page"><div class="pd-card-heading"><div><h2>Withdrawal history <span class="pd-count">{{ $withdrawals->total() }} records</span></h2><p>Your payout requests and current status</p></div><span class="pd-caption">Amounts in USD</span></div>
@if($withdrawals->count())
@include('user.portfolio.filters',['label'=>'withdrawals','statuses'=>[1=>'Completed',2=>'Pending',3=>'Cancelled',4=>'Processing']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Withdrawal</th><th scope="col">Amount</th><th scope="col">Source / asset</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($withdrawals as $withdrawal)
<tr data-activity-row data-status="{{ in_array((int)$withdrawal->status,[1,2,3]) ? $withdrawal->status : 4 }}"><td data-label="Withdrawal"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>'withdraw'])</span><span><strong class="pd-table-title">#{{ $withdrawal->reference }}</strong><span class="pd-table-subtitle">{{ $withdrawal->created_at->format('d M Y, h:i a') }}</span></span></div></td><td data-label="Amount"><span class="pd-money">${{ number_format($withdrawal->amount,2) }}</span></td><td data-label="Source / asset"><strong>{{ $withdrawal->source ?: 'Account' }}</strong><small>{{ $withdrawal->asset }}</small></td><td data-label="Status">@include('user.portfolio.status',['status'=>$withdrawal->status])</td><td class="pd-cell-action"><details class="pd-inline-details"><summary>View details</summary><dl><div><dt>Destination wallet</dt><dd>{{ $withdrawal->details }}</dd></div><div><dt>Reference</dt><dd>{{ $withdrawal->reference }}</dd></div><div><dt>Requested</dt><dd>{{ $withdrawal->created_at->format('d M Y, h:i a') }}</dd></div></dl></details></td></tr>
@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No withdrawals match your search on this page.</p>
@else
@include('user.portfolio.empty',['icon'=>'withdraw','heading'=>'No withdrawals yet','description'=>'Your payout requests will be listed here with their status and destination details.','action'=>route('new_withdrawal'),'actionLabel'=>'Request a withdrawal'])
@endif
@include('user.portfolio.pagination',['records'=>$withdrawals,'label'=>'withdrawals'])
</section>
@endsection
