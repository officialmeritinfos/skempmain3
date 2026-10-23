@extends('layouts.portfolio')
@section('title','Financing')
@include('user.portfolio.account-assets')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Financing','heading'=>'Financing for your next step','description'=>'Tell us how much you need and your preferred financing horizon. Our team will review your application.'])
<div class="pa-metrics">
<section class="pd-card pa-metric pa-metric-primary"><div><h2 class="pd-section-label">Outstanding financing</h2><p class="pd-money">${{ number_format($user->loan ?? 0,2) }}</p></div><span class="pd-stat-icon">@include('layouts.partials.user-nav-icon',['icon'=>'finance'])</span></section>
<section class="pd-card pa-metric"><div><h2 class="pd-section-label">Applications submitted</h2><p class="pa-metric-value">{{ $loans->total() }}</p></div><span class="pd-stat-icon">@include('layouts.partials.user-nav-icon',['icon'=>'briefcase'])</span></section>
<section class="pd-card pa-metric"><div><h2 class="pd-section-label">Questions about financing?</h2><a class="pd-link" style="margin-top:10px" href="{{ url('contact') }}">Talk to our team @include('user.portfolio.icon',['name'=>'arrow'])</a></div></section>
</div>
<form method="POST" action="{{ route('loans.new') }}" data-portfolio-form data-loan-form data-loading="Submitting application…" class="pd-form-layout">
@csrf
<section class="pd-card pd-form-section"><div class="pa-form-intro"><h2>New financing application</h2><p class="pd-caption">Enter the amount and choose the horizon that suits your request.</p></div>
<div class="pd-form-field"><label class="pd-form-label" for="loan-amount">Amount requested <span>USD</span></label><div class="pd-money-input"><span aria-hidden="true">$</span><input class="pd-input" id="loan-amount" name="amount" type="number" required min="0.01" step="0.01" inputmode="decimal" value="{{ old('amount') }}" placeholder="0.00" aria-describedby="amount-error" @if($errors->has('amount')) aria-invalid="true" @endif></div>@include('user.portfolio.field-error',['field'=>'amount'])</div>
<fieldset style="margin-top:25px" aria-describedby="loanType-error"><legend class="pd-form-label">Financing horizon</legend><div class="pa-choice-row pa-loan-types">
@foreach([['Short Term','Short term','A shorter financing horizon.'],['Mid-Term','Mid-term','An intermediate financing horizon.'],['Long Term','Long term','A longer financing horizon.']] as $type)<label class="pd-choice"><input type="radio" name="loanType" value="{{ $type[0] }}" required @if(old('loanType') === $type[0]) checked @endif><span class="pd-choice-title">{{ $type[1] }}</span><span class="pd-choice-description">{{ $type[2] }}</span></label>@endforeach
</div>@include('user.portfolio.field-error',['field'=>'loanType'])</fieldset>
<div class="pd-info">@include('user.portfolio.icon',['name'=>'info'])<div>Submitting an application does not mean financing is approved. Terms and any further requirements are provided after review.</div></div>
</section>
<aside class="pd-review"><section class="pd-card"><h2>Application summary</h2><p>Review your request before submitting.</p><dl class="pd-summary"><div><dt>Financing horizon</dt><dd data-loan-type>Select a horizon</dd></div><div><dt>Outstanding balance</dt><dd>${{ number_format($user->loan ?? 0,2) }}</dd></div><div class="pd-summary-total"><dt>Amount requested</dt><dd class="pd-money" data-loan-amount>${{ number_format((float)old('amount',0),2) }}</dd></div></dl>@include('user.portfolio.submit',['label'=>'Submit application'])<p class="pd-review-caption">Our team will be in touch about your request. You can track its status below.</p></section></aside>
</form>
<section class="pd-card pd-table-card" data-activity="page"><div class="pd-card-heading"><div><h2>Financing applications <span class="pd-count">{{ $loans->total() }} records</span></h2><p>Your requests and their review status</p></div><span class="pd-caption">Amounts in USD</span></div>
@if($loans->count())
@include('user.portfolio.filters',['label'=>'financing applications','statuses'=>[1=>'Active',2=>'Pending review',3=>'Cancelled',0=>'Unknown']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Application</th><th scope="col">Amount</th><th scope="col">Horizon</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($loans as $loan)<tr data-activity-row data-status="{{ in_array((int)$loan->status,[1,2,3]) ? $loan->status : 0 }}"><td data-label="Application"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>'finance'])</span><span><strong class="pd-table-title">#{{ $loan->reference }}</strong><small>{{ $loan->created_at?->format('d M Y') ?: '—' }}</small></span></div></td><td data-label="Amount"><span class="pd-money">${{ number_format((float)$loan->amount,2) }}</span></td><td data-label="Horizon">{{ $loan->loanType }}</td><td data-label="Status">@include('user.portfolio.account-status',['kind'=>'loan','status'=>$loan->status])</td><td class="pd-cell-action pa-table-actions"><details class="pd-inline-details pa-history-details"><summary>View details</summary><dl><div><dt>Reference</dt><dd>{{ $loan->reference }}</dd></div><div><dt>Submitted</dt><dd>{{ $loan->created_at?->format('d M Y, h:i a') ?: '—' }}</dd></div><div><dt>Financing horizon</dt><dd>{{ $loan->loanType }}</dd></div></dl></details></td></tr>@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No financing applications match your search on this page.</p>
@else
@include('user.portfolio.empty',['icon'=>'finance','heading'=>'No financing applications yet','description'=>'Your submitted requests will appear here with their current status.'])
@endif
@include('user.portfolio.pagination',['records'=>$loans,'label'=>'applications'])
</section>
@endsection
