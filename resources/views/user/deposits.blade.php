@extends('layouts.portfolio')
@section('title','Deposits')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Account funding','heading'=>'Your deposits','description'=>'Track your funding requests, payment instructions and verification status.','action'=>route('new_deposit'),'actionLabel'=>'New deposit'])
<section class="pd-card pd-table-card" data-activity="page"><div class="pd-card-heading"><div><h2>Deposit history <span class="pd-count">{{ $deposits->total() }} records</span></h2><p>Crypto and bank transfer deposits</p></div><span class="pd-caption">Amounts in USD</span></div>
@if($deposits->count())
@include('user.portfolio.filters',['label'=>'deposits','statuses'=>[1=>'Completed',2=>'Awaiting payment',3=>'Cancelled',4=>'Under review',5=>'Partial']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Deposit</th><th scope="col">Amount</th><th scope="col">Method</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($deposits as $deposit)
<tr data-activity-row data-status="{{ in_array((int)$deposit->status,[1,2,3,4]) ? $deposit->status : 5 }}"><td data-label="Deposit"><div class="pd-table-reference"><span class="pd-row-icon">@include('user.portfolio.icon',['name'=>($deposit->deposit_type ?? 'crypto') === 'bank' ? 'bank' : 'crypto'])</span><span><strong class="pd-table-title">#{{ $deposit->reference }}</strong><span class="pd-table-subtitle">{{ $deposit->created_at->format('d M Y, h:i a') }}</span></span></div></td><td data-label="Amount"><span class="pd-money">${{ number_format($deposit->amount,2) }}</span></td><td data-label="Method"><strong>{{ ($deposit->deposit_type ?? 'crypto') === 'bank' ? 'Bank transfer' : $deposit->asset }}</strong><small>{{ ($deposit->deposit_type ?? 'crypto') === 'bank' ? 'USD' : 'Cryptocurrency' }}</small></td><td data-label="Status">@include('user.portfolio.status',['kind'=>'deposit','status'=>$deposit->status])</td><td class="pd-cell-action"><a class="pd-link" href="{{ route('deposit_detail',['id'=>$deposit->id]) }}" aria-label="View deposit {{ $deposit->reference }}">Details @include('user.portfolio.icon',['name'=>'arrow'])</a></td></tr>
@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No deposits match your search on this page.</p>
@else
@include('user.portfolio.empty',['icon'=>'deposit','heading'=>'Make your first deposit','description'=>'Create a funding request to receive payment instructions. Your deposit history will appear here.','action'=>route('new_deposit'),'actionLabel'=>'Add funds'])
@endif
@include('user.portfolio.pagination',['records'=>$deposits,'label'=>'deposits'])
</section>
@endsection
