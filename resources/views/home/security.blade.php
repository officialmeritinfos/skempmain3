@extends('layouts.investment-home')
@section('title', 'Account security | ' . ($siteName ?? config('app.name')))
@section('meta_description', 'Practical guidance to help protect your account, verify payment instructions and recognise suspicious communications.')
@php
$securityPractices = [
    ['Use the official site', 'Sign in through the official website or a link you have independently verified. Avoid logging in through links sent by unfamiliar accounts.'],
    ['Protect your credentials', 'Use a strong, unique password and never share your password, recovery codes or authentication secrets with another person.'],
    ['Verify payment instructions', 'Before sending funds, confirm the destination and instructions inside your authenticated account or through a verified company contact.'],
    ['Treat urgency as a warning sign', 'Unexpected pressure to transfer money, reveal credentials or bypass normal account procedures should be treated with suspicion.'],
    ['Keep devices secure', 'Use current software, device locks and reputable security tools, especially on devices used to access financial accounts.'],
    ['Report anything unusual', 'If an email, phone call, login notification or payment instruction looks unfamiliar, stop and contact the company using a known channel.'],
];
@endphp
@section('content')
@include('home.partials.page-hero', ['label' => 'Account security', 'heading' => 'Protect your access.', 'accent' => 'Protect your peace of mind.', 'intro' => 'A few careful checks can make a real difference. Use this guidance when signing in, reviewing a payment request or checking whether a message is genuine.'])
<section class="ih-section"><div class="ih-container ih-question-layout"><div><p class="ih-eyebrow"><span></span>Start with verification</p><h2>Pause before<br><em>you act.</em></h2><div class="ih-prose" style="margin-top:24px"><p>If a request involves money, credentials, personal documents or a change to payment details, confirm it through a separate, trusted channel.</p><p>Use contact details you have looked up on this website. Do not rely only on a phone number or link included in the message you are checking.</p></div><div class="ih-security-callout"><h3>Your credentials are private.</h3><p>Never share a password, authentication code, recovery code or wallet recovery phrase in an email or chat.</p></div></div><div class="ih-asset-principles">@foreach($securityPractices as $practice)<article class="ih-number-card"><span>0{{ $loop->iteration }}</span><h3>{{ $practice[0] }}</h3><p>{{ $practice[1] }}</p></article>@endforeach</div></div></section>
<section class="ih-section ih-surface"><div class="ih-container ih-question-layout"><div><p class="ih-eyebrow"><span></span>Know the warning signs</p><h2>Something<br><em>doesn’t feel right?</em></h2><div class="ih-prose" style="margin-top:24px"><p>Stop the conversation or transaction and check independently. A familiar logo or confident message is not enough to verify the sender.</p></div><a class="ih-text-link" style="margin-top:23px" href="{{ url('/contact') }}">Use our official contact details <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div><div class="ih-question-list">@foreach([
['Unexpected payment changes', 'A new wallet, bank detail or payment destination arrives outside your normal account workflow.'],
['A request for credentials', 'Someone asks for your password, authentication code, recovery information or remote access to your device.'],
['A guaranteed return', 'A message promises certain profits or claims a risk-free investment that requires an immediate decision.'],
['Pressure or secrecy', 'You are told to act quickly, keep the request private or bypass the checks you would normally make.'],
] as $signal)<div class="ih-question-row"><span>0{{ $loop->iteration }}</span><div><h3>{{ $signal[0] }}</h3><p>{{ $signal[1] }}</p></div></div>@endforeach</div></div></section>
@include('home.partials.page-cta', ['heading' => 'Verify the request before you continue.', 'button' => 'Contact our team'])
@endsection
