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
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Security</p>
            </div>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Trust is strengthened by careful habits.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">Security is shared between the platform, the processes around it and the person using the account. A few deliberate checks can prevent many common forms of financial fraud.</p>
        </div>

        <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale rounded-[2rem] bg-[#0b1b2b] p-7 text-white sm:p-9 dark:bg-[#101e2c]">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Golden rule</p>
            <p class="mt-4 font-display text-3xl font-bold leading-tight tracking-[-0.03em]">Never allow urgency to replace verification.</p>
            <div class="mt-7 border-t border-white/12 pt-6 text-sm leading-7 text-white/58">If a request involves money, credentials, personal documents or a change to payment details, confirm it through a separate trusted channel before acting.</div>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Protecting your access</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Practical security before technical jargon.</h2>
            <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">The most useful guidance is guidance you can act on. These practices help reduce exposure to impersonation, phishing and payment fraud.</p>
        </div>

        <div class="mt-12 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($securityPractices as $practice)
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_45px_rgba(15,23,42,.07)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->index % 3) * 60 }}ms">
                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">0{{ $loop->iteration }}</span>
                    <h3 class="mt-8 font-display text-2xl font-bold tracking-[-0.025em]">{{ $practice[0] }}</h3>
                    <p class="mt-3 text-sm leading-7 text-[#66717c] dark:text-white/54">{{ $practice[1] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#f0ede5] py-24 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.82fr_1.18fr] lg:gap-20 lg:px-8">
        <div>
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Possible impersonation?</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Stop the transaction. Verify the sender.</h2>
            <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">Do not continue a transfer simply because someone claims to represent {{ config('app.name') }}. Use the contact information on this website to verify the request independently.</p>
        </div>

        <div class="border-y border-[#132131]/10 dark:border-white/10">
            @foreach([
                ['Unexpected payment change','A new wallet, bank detail or payment destination arrives outside the normal authenticated workflow.'],
                ['Credential request','Someone asks for your password, authentication code, recovery information or remote access to your device.'],
                ['Guaranteed return claim','A message promises certain profits or claims a risk-free opportunity that requires immediate action.'],
                ['Pressure and secrecy','You are told to act quickly, avoid discussing the request or ignore normal verification steps.'],
            ] as $signal)
                <div class="grid gap-3 border-b border-[#132131]/10 py-6 last:border-b-0 sm:grid-cols-[48px_1fr] dark:border-white/10">
                    <span class="text-[10px] font-bold text-[#8a6538] dark:text-[#e4c38f]">0{{ $loop->iteration }}</span>
                    <div>
                        <h3 class="font-bold">{{ $signal[0] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-[#66717c] dark:text-white/52">{{ $signal[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Need to verify something?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Use a known company channel before you act.</h2>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Contact us securely</a>
    </div>
</section>
@endsection