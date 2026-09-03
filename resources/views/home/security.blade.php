@extends('layouts.marketing')

@section('title', config('app.name') . ' | Security')
@section('meta_description', 'Security guidance for protecting your account, verifying communications and handling investment instructions safely.')

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
<section class="relative overflow-hidden bg-ink-950 text-white">
    <div class="absolute inset-0 opacity-60" aria-hidden="true"><div class="absolute -right-24 top-12 h-96 w-96 rounded-full border border-bronze-300/10"></div><div class="absolute right-20 top-36 h-56 w-56 rounded-full border border-white/5"></div></div>
    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Security</p>
            <h1 class="mt-5 max-w-4xl font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Trust is strengthened by careful habits.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg">Security is shared between the platform, the processes around it and the person using the account. A few deliberate checks can prevent many of the most common forms of financial fraud.</p>
        </div>
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale rounded-[2rem] border border-white/10 bg-white/[0.04] p-7 sm:p-9">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Golden rule</p>
            <p class="mt-4 font-display text-3xl leading-tight">Never allow urgency to replace verification.</p>
            <div class="mt-7 border-t border-white/10 pt-6 text-sm leading-7 text-white/55">If a request involves money, credentials, personal documents or a change to payment details, confirm it through a separate trusted channel before acting.</div>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl"><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Protecting your access</p><h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">Practical security before technical jargon.</h2><p class="mt-5 text-base leading-8 text-ink-700">The most useful guidance is guidance you can act on. These practices are designed to help protect your account and reduce exposure to impersonation, phishing and payment fraud.</p></div>
        <div class="mt-12 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($securityPractices as $practice)
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[1.6rem] border border-ink-950/8 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-bronze-500/30 hover:shadow-xl hover:shadow-ink-950/5" style="--reveal-delay: {{ ($loop->index % 3) * 70 }}ms"><span class="text-xs font-bold tracking-[0.18em] text-bronze-600">0{{ $loop->iteration }}</span><h3 class="mt-8 font-display text-2xl font-semibold text-ink-950">{{ $practice[0] }}</h3><p class="mt-3 text-sm leading-7 text-ink-700">{{ $practice[1] }}</p></article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-ink-900 py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.82fr_1.18fr] lg:gap-20 lg:px-8">
        <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Possible impersonation?</p><h2 class="mt-4 font-display text-4xl font-semibold leading-tight sm:text-5xl">Stop the transaction. Verify the sender.</h2><p class="mt-5 text-base leading-8 text-white/55">Do not continue a transfer simply because someone claims to represent {{ config('app.name') }}. Use the contact information on this website to verify the request independently.</p></div>
        <div class="divide-y divide-white/10 border-y border-white/10">
            @foreach([
                ['Unexpected payment change', 'A new wallet, bank detail or payment destination arrives outside the normal authenticated workflow.'],
                ['Credential request', 'Someone asks for your password, authentication code, recovery information or remote access to your device.'],
                ['Guaranteed return claim', 'A message promises certain profits or claims a risk-free opportunity that requires immediate action.'],
                ['Pressure and secrecy', 'You are told to act quickly, avoid discussing the request or ignore normal verification steps.'],
            ] as $signal)
                <div class="grid gap-3 py-6 sm:grid-cols-[48px_1fr]"><span class="text-xs font-bold text-bronze-300">0{{ $loop->iteration }}</span><div><h3 class="font-semibold">{{ $signal[0] }}</h3><p class="mt-2 text-sm leading-7 text-white/48">{{ $signal[1] }}</p></div></div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-paper-100 py-20 sm:py-24"><div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="rounded-[2rem] bg-bronze-300 p-7 text-ink-950 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12"><div><p class="text-xs font-bold uppercase tracking-[0.2em] text-ink-950/55">Need to verify something?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">Use a known company channel before you act.</h2></div><a href="{{ url('/contact') }}" class="mt-7 inline-flex shrink-0 items-center justify-center rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900 lg:mt-0">Contact us securely</a></div></div></section>
@endsection
