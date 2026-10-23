@extends('layouts.portfolio')
@section('title','Identity verification')
@include('user.portfolio.account-assets')
@section('content')
@php $verificationStatus = (int)$user->isVerified; $canSubmit = in_array($verificationStatus,[2,3],true); @endphp
@include('user.portfolio.heading',['eyebrow'=>'Account verification','heading'=>'Verify your identity','description'=>'Confirm your personal details and provide clear images of your identity documents.'])
<section class="pd-card pa-member-status"><div><span class="pa-member-status-icon">@include('user.portfolio.icon',['name'=>'shield'])</span><div><h2>{{ $verificationStatus === 1 ? 'Identity verified' : ($verificationStatus === 4 ? 'Your documents are being reviewed' : ($verificationStatus === 3 ? 'Your verification needs an update' : ($verificationStatus === 2 ? 'Complete your account verification' : 'Verification status unavailable'))) }}</h2><p>Account {{ $user->username }} · Reference {{ $user->userRef ?: '—' }}</p></div></div>@include('user.portfolio.account-status',['kind'=>'kyc','status'=>$verificationStatus])</section>
@if($canSubmit)
@if($verificationStatus === 3)<div class="pd-alert pd-alert-warning" role="status">Check your personal details and upload clear images to submit your identity information for another review. Contact support if you need guidance.</div>@endif
<form method="POST" action="{{ route('kyc.update') }}" enctype="multipart/form-data" data-portfolio-form data-kyc-form data-loading="Submitting verification…" class="pd-form-layout">
@csrf
<div class="pd-form-stack">
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">01</span><div><h2>Your identity details</h2><p>Use the same information shown on your identity document.</p></div></div>
<div class="pa-form-grid">
@include('user.portfolio.account-input',['id'=>'kyc-dob','name'=>'dob','label'=>'Date of birth','type'=>'date','value'=>substr((string)$user->dateOfBirth,0,10),'autocomplete'=>'bday'])
@include('user.portfolio.account-input',['id'=>'kyc-country','name'=>'country','label'=>'Country','value'=>$user->country,'autocomplete'=>'country-name'])
<div class="pa-full"><fieldset aria-describedby="idType-error"><legend class="pd-form-label">Identity document</legend><div class="pa-choice-row pa-loan-types">
@foreach([['Drivers License','Driver’s licence'],['National ID Card','National ID card'],['International Passport','International passport']] as $document)<label class="pd-choice"><input type="radio" name="idType" value="{{ $document[0] }}" required @if(old('idType',$user->docType) === $document[0]) checked @endif><span class="pd-choice-title">{{ $document[1] }}</span></label>@endforeach
</div>@include('user.portfolio.field-error',['field'=>'idType'])</fieldset></div>
<div class="pa-full">@include('user.portfolio.account-input',['id'=>'kyc-id-number','name'=>'idNumber','label'=>'Document number','value'=>$user->docNumber,'autocomplete'=>'off','placeholder'=>'Number on your identity document'])</div>
</div></section>
<section class="pd-card pd-form-section"><div class="pd-step-heading"><span class="pd-step-number">02</span><div><h2>Upload your documents</h2><p>Keep all corners visible and make sure the details are readable.</p></div></div>
<div class="pa-upload-grid">
@include('user.portfolio.image-upload',['id'=>'kyc-front','name'=>'frontImage','label'=>'Front of ID','prompt'=>'Front of your identity document','hint'=>'A clear, uncropped image of the front.'])
@include('user.portfolio.image-upload',['id'=>'kyc-back','name'=>'backImage','label'=>'Back of ID','prompt'=>'Back of your identity document','hint'=>'Include it if your document has reverse-side information.','optional'=>true])
@include('user.portfolio.image-upload',['id'=>'kyc-selfie','name'=>'selfie','label'=>'Recent selfie','prompt'=>'A recent photo of you','hint'=>'Keep your face clearly visible and unobstructed.','icon'=>'eye'])
@include('user.portfolio.image-upload',['id'=>'kyc-membership','name'=>'membership','label'=>'Membership ID','prompt'=>'Your membership identification','hint'=>'Upload this if a membership ID has been issued to you.','optional'=>true])
</div></section>
</div>
<aside class="pd-review"><section class="pd-card"><h2>Ready for review?</h2><p>Check your information and images before submitting.</p><ul class="pa-checklist"><li>@include('user.portfolio.icon',['name'=>'check'])<div><strong>Matching details</strong><p>Your birth date, country and document number match your ID.</p></div></li><li>@include('user.portfolio.icon',['name'=>'check'])<div><strong>Readable document</strong><p>The front image is clear, with all corners visible.</p></div></li><li>@include('user.portfolio.icon',['name'=>'check'])<div><strong>A clear selfie</strong><p>Your face is visible in a recent photograph.</p></div></li></ul>
<div class="pa-upload-count"><i aria-hidden="true"><span data-kyc-upload-progress></span></i><span data-kyc-upload-count>0 of 2 required images selected</span></div><div style="margin-top:24px">@include('user.portfolio.submit',['label'=>'Submit for review'])</div><p class="pd-review-caption">Your verification moves into review once your submission is received.</p></section><p class="pd-review-help">@include('user.portfolio.icon',['name'=>'support'])Need guidance? <a href="{{ url('contact') }}">Contact support</a></p></aside>
</form>
@else
<section class="pd-card pa-kyc-complete"><div><span class="pa-kyc-complete-icon">@include('user.portfolio.icon',['name'=>$verificationStatus === 1 ? 'check' : ($verificationStatus === 4 ? 'clock' : 'info')])</span><h2>{{ $verificationStatus === 1 ? 'Your identity is verified.' : ($verificationStatus === 4 ? 'Your submission is under review.' : 'Let’s check your verification status.') }}</h2><p>{{ $verificationStatus === 1 ? 'Your account has completed identity verification. You can review your account details in settings.' : ($verificationStatus === 4 ? 'We’ve received your identity information. No further action is needed here while the review is in progress.' : 'Contact our team for help with the verification status on your account.') }}</p><a class="pd-button pd-button-secondary" href="{{ $verificationStatus === 1 ? route('setting.index') : url('contact') }}">{{ $verificationStatus === 1 ? 'Account settings' : 'Contact support' }} @include('user.portfolio.icon',['name'=>'arrow'])</a></div><aside class="pa-verification-summary"><h3>Identity record</h3><dl><div><dt>Account holder</dt><dd>{{ $user->name }}</dd></div><div><dt>Country</dt><dd>{{ $user->country ?: '—' }}</dd></div><div><dt>Document type</dt><dd>{{ $user->docType ?: '—' }}</dd></div><div><dt>Document number</dt><dd>{{ $user->docNumber ? '•••• '.mb_substr((string)$user->docNumber,-4) : '—' }}</dd></div><div><dt>Status</dt><dd>@include('user.portfolio.account-status',['kind'=>'kyc','status'=>$verificationStatus])</dd></div></dl></aside></section>
@endif
@endsection
