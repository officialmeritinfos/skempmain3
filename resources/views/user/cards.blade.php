@extends('layouts.portfolio')
@section('title','Cards')
@include('user.portfolio.account-assets')
@section('content')
@include('user.portfolio.heading',['eyebrow'=>'Card services','heading'=>'Your client cards','description'=>'Choose a card network and submit your delivery details. Track each application below.'])
<div class="pd-form-layout">
<section class="pd-card pd-form-section"><div class="pa-form-intro"><h2>Apply for a card</h2><p class="pd-caption">Enter the name and address you would like to use.</p></div>
<form method="POST" action="{{ route('card.apply') }}" data-portfolio-form data-card-form data-loading="Submitting application…">
@include('user.portfolio.account-input',['id'=>'card-name','name'=>'name','label'=>'Name on card','value'=>$user->name,'maxlength'=>150,'autocomplete'=>'cc-name'])
@csrf
<fieldset style="margin-top:24px" aria-describedby="cardType-error"><legend class="pd-form-label">Preferred network</legend><div class="pa-choice-row">
@foreach(['Mastercard','Visa','Discover'] as $network)<label class="pd-choice"><input type="radio" name="cardType" value="{{ $network }}" required @if(old('cardType') === $network) checked @endif><span class="pa-network-logo pa-network-{{ strtolower($network) }}" aria-hidden="true">@if($network === 'Mastercard')<i></i><i></i>@else{{ $network }}@endif</span><span class="pd-choice-title">{{ $network }}</span><span class="pd-choice-description">Select network</span></label>@endforeach
</div>@include('user.portfolio.field-error',['field'=>'cardType'])</fieldset>
<div class="pd-form-field" style="margin-top:24px"><label class="pd-form-label" for="card-address">Delivery address</label><textarea class="pd-input" id="card-address" name="address" rows="3" required maxlength="150" autocomplete="street-address" placeholder="Street, city, state and country" aria-describedby="address-help address-error" @if($errors->has('address')) aria-invalid="true" @endif>{{ old('address') }}</textarea><p class="pd-field-hint" id="address-help">Use a complete address where you can receive your card.</p>@include('user.portfolio.field-error',['field'=>'address'])</div>
<div class="pa-form-footer"><p class="pd-caption">Your application is reviewed before fulfilment. Our team will provide payment instructions through support.</p>@include('user.portfolio.submit',['label'=>'Submit application'])</div>
</form></section>
<aside class="pd-stack"><section><div class="pa-card-preview" aria-label="Card application preview"><div class="pa-card-preview-top"><strong>{{ $siteName }}</strong><small>Card preview</small></div><div class="pa-card-chip" aria-hidden="true"></div><div class="pa-card-preview-bottom"><div><p class="pa-card-preview-label">Name on card</p><p class="pa-card-name" data-card-preview-name>{{ $user->name }}</p></div><p class="pa-card-network" data-card-preview-network>Your network</p></div></div><p class="pa-preview-note">Application preview. Your issued card may look different.</p></section>
<section class="pd-card pa-steps-card"><h2>What happens next</h2><ol class="pd-steps"><li>Submit your preferred network and delivery details.</li><li>Our team reviews your application.</li><li>Contact support for payment and delivery instructions.</li></ol><a class="pd-link" style="margin-top:20px;font-size:11px" href="{{ url('contact') }}">Contact support @include('user.portfolio.icon',['name'=>'arrow'])</a></section></aside>
</div>
<section class="pd-card pd-table-card" data-activity="page"><div class="pd-card-heading"><div><h2>Card applications <span class="pd-count">{{ $cards->total() }} records</span></h2><p>Follow the status of your applications</p></div></div>
@if($cards->count())
@include('user.portfolio.filters',['label'=>'card applications','statuses'=>[1=>'Active',2=>'Pending',3=>'Cancelled',0=>'Unknown']])
<div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Card application</th><th scope="col">Name on card</th><th scope="col">Submitted</th><th scope="col">Status</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
@foreach($cards as $card)<tr data-activity-row data-status="{{ in_array((int)$card->status,[1,2,3]) ? $card->status : 0 }}"><td data-label="Application"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>'card'])</span><span><strong class="pd-table-title">{{ $card->cardType }}</strong><small>#{{ $card->reference }}</small></span></div></td><td data-label="Name on card">{{ $card->name }}</td><td data-label="Submitted">{{ $card->created_at?->format('d M Y') ?: '—' }}</td><td data-label="Status">@include('user.portfolio.account-status',['kind'=>'card','status'=>$card->status])</td><td class="pd-cell-action pa-table-actions"><details class="pd-inline-details pa-history-details"><summary>View details</summary><dl><div><dt>Delivery address</dt><dd>{{ $card->address }}</dd></div><div><dt>Reference</dt><dd>{{ $card->reference }}</dd></div><div><dt>Submitted</dt><dd>{{ $card->created_at?->format('d M Y, h:i a') ?: '—' }}</dd></div></dl></details></td></tr>@endforeach
</tbody></table></div><p class="pd-no-results" data-no-results hidden>No card applications match your search on this page.</p>
@else
@include('user.portfolio.empty',['icon'=>'card','heading'=>'No card applications yet','description'=>'Submit the form above and follow your application’s progress here.'])
@endif
@include('user.portfolio.pagination',['records'=>$cards,'label'=>'applications'])
</section>
@endsection
