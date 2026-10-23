@extends('layouts.portfolio')
@section('title','Investments')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Your portfolio','heading'=>'Your investments','description'=>'Keep track of your capital, credited profit and progress through each plan.','action'=>route('new_investment'),'actionLabel'=>'New investment'])
<section class="pd-card pd-table-card" data-activity="page"><div class="pd-card-heading"><div><h2>Investment history <span class="pd-count">{{ $investments->total() }} records</span></h2><p>All of your investment allocations</p></div><span class="pd-caption">Amounts in USD</span></div>
@if($investments->count())
@include('user.portfolio.filters',['label'=>'investments','statuses'=>[4=>'Active',1=>'Completed',2=>'Pending payment',3=>'Cancelled']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Investment</th><th scope="col">Capital / profit</th><th scope="col">Returns</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($investments as $investment)
<tr data-activity-row data-status="{{ in_array((int)$investment->status,[1,2,3]) ? $investment->status : 4 }}"><td data-label="Investment"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>'chart'])</span><span><strong class="pd-table-title">#{{ $investment->reference }}</strong><span class="pd-table-subtitle">{{ $investment->created_at->format('d M Y') }} · {{ ucfirst($investment->source ?: 'account') }}</span></span></div></td><td data-label="Capital / profit"><span class="pd-money">${{ number_format($investment->amount,2) }}</span><small class="pd-text-success">${{ number_format($investment->currentProfit,2) }} profit</small></td><td data-label="Returns"><strong>{{ $investment->currentReturn }} / {{ $investment->numberOfReturns }}</strong><small>{{ $investment->roi }}% per return</small></td><td data-label="Status">@include('user.portfolio.status',['kind'=>'investment','status'=>$investment->status])</td><td class="pd-cell-action"><a class="pd-link" href="{{ route('invest_detail',['id'=>$investment->id]) }}" aria-label="View investment {{ $investment->reference }}">Details @include('user.portfolio.icon',['name'=>'arrow'])</a></td></tr>
@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No investments match your search on this page.</p>
@else
@include('user.portfolio.empty',['icon'=>'chart','heading'=>'Build your portfolio','description'=>'Explore the available plans. Your investment records and return progress will appear here.','action'=>route('new_investment'),'actionLabel'=>'Explore plans'])
@endif
@include('user.portfolio.pagination',['records'=>$investments,'label'=>'investments'])
</section>
@endsection
