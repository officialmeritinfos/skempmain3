@extends('layouts.investment-home')
@section('title', 'Investment plans | ' . ($siteName ?? config('app.name')))
@section('meta_description', 'Review the currently published investment plans, funding ranges, durations and configured terms.')
@inject('option', 'App\Defaults\Custom')
@section('content')
@include('home.partials.page-hero', ['label' => 'Investment plans', 'heading' => 'Review the details.', 'accent' => 'Consider the fit.', 'intro' => 'Compare the available plans with your objectives, time horizon and need for access to capital. Each plan should be considered as a whole, rather than by a single figure.'])
<section class="ih-section"><div class="ih-container"><div class="ih-plan-note"><p><strong>Before you choose.</strong> The figures below are the configured plan terms. Investment involves risk, including possible loss. Review the requirements and terms shown in your account before committing funds.</p></div><section class="ih-plan-section" aria-label="Investment plans">@include('home.partials.plan-cards', ['planOptions' => $packages ?? []])</section>@if(isset($cannabis_packages) && $cannabis_packages->isNotEmpty())<section class="ih-plan-section"><h2>Specialised strategies.</h2>@include('home.partials.plan-cards', ['planOptions' => $cannabis_packages])</section>@endif</div></section>
<section class="ih-section ih-surface"><div class="ih-container"><div class="ih-page-section-heading"><div><p class="ih-eyebrow"><span></span>Before making a decision</p><h2>Look beyond<br><em>the headline.</em></h2></div><p>Understanding a plan’s requirements is part of deciding whether it belongs in your wider financial position.</p></div><div class="ih-contact-checklist">@foreach([
['Time horizon', 'Consider how the plan duration relates to your goals and when you might need access to the capital.'],
['Funding commitment', 'Review minimum and maximum amounts alongside your other obligations and funds you need to keep accessible.'],
['The full terms', 'Check the return schedule, account requirements and applicable withdrawal terms. Ask about anything that is not clear.'],
] as $item)<div><h3>{{ $item[0] }}</h3><p>{{ $item[1] }}</p></div>@endforeach</div></div></section>
@include('home.partials.page-cta', ['heading' => 'Have a question about a plan?', 'copy' => 'Our team can help you understand the available information before you decide.'])
@endsection
