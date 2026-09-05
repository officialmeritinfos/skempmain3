@extends('layouts.marketing')

@section('title', config('app.name') . ' | Privacy Policy')
@section('meta_description', 'How personal information is collected, used, protected and retained when you use ' . config('app.name') . ' services.')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div><div class="glow-orb glow-orb-top"></div>
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl">Privacy</span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Privacy <span class="aurora-text">Policy.</span></h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/64">This policy explains how {{ config('app.name') }} collects, uses, protects and retains personal information when you use the website or related services.</p>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:gap-16 lg:px-8">
        <aside class="lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">On this page</p>
            <nav class="mt-5 grid gap-2 text-sm text-white/55">
                <a href="#privacy-introduction" class="transition hover:text-white">01 · Introduction</a>
                <a href="#privacy-collection" class="transition hover:text-white">02 · Information collection</a>
                <a href="#privacy-cookies" class="transition hover:text-white">03 · Cookies</a>
                <a href="#privacy-security" class="transition hover:text-white">04 · Security</a>
                <a href="#privacy-storage" class="transition hover:text-white">05 · Storage & transfers</a>
                <a href="#privacy-retention" class="transition hover:text-white">06 · Retention</a>
            </nav>
        </aside>

        <article class="glass-panel rounded-[2rem] p-6 sm:p-9 lg:p-12">
            <div class="space-y-10 text-sm leading-8 text-white/66 sm:text-base">
                <section><h2 id="privacy-introduction" class="scroll-mt-28 font-display text-3xl font-bold text-white">1. Introduction</h2><div class="mt-4 space-y-4"><p>This policy explains how personal information is collected, used, disclosed and protected when you use our website, applications or related services, or otherwise interact with {{ config('app.name') }}.</p><p>We may update this policy from time to time. Where appropriate, changes may be communicated through the website, account experience or other reasonable channels.</p></div></section>
                <section><h2 id="privacy-collection" class="scroll-mt-28 font-display text-3xl font-bold text-white">2. Collection of information</h2><div class="mt-4 space-y-4"><p>When you create an account or use certain services, information may be collected to identify you, administer the service, prevent fraud, comply with applicable requirements and communicate with you.</p><p>Information you provide may include your name, email address, contact details, account information and other information you choose or are required to provide in connection with the service.</p></div></section>
                <section><h2 id="privacy-cookies" class="scroll-mt-28 font-display text-3xl font-bold text-white">3. Cookies</h2><p class="mt-4">Cookies and similar technologies may be used to support authentication, preferences, security and website functionality. Most browsers allow you to remove or reject cookies, although doing so may affect parts of the service.</p></section>
                <section><h2 id="privacy-security" class="scroll-mt-28 font-display text-3xl font-bold text-white">4. Security</h2><div class="mt-4 space-y-4"><p>{{ config('app.name') }} takes reasonable measures intended to protect personal information against loss, theft, misuse and unauthorised access, disclosure, alteration or destruction.</p><p>Where you choose a password or other credential to access an account, you are responsible for keeping that credential confidential. No transmission over the internet can be guaranteed to be completely secure.</p><p>Where notification of a personal-data breach is required by applicable law, affected individuals and/or relevant authorities will be notified as required.</p></div></section>
                <section><h2 id="privacy-storage" class="scroll-mt-28 font-display text-3xl font-bold text-white">5. Storage and data transfers</h2><p class="mt-4">Personal information may be stored or processed using cloud infrastructure and service providers located in different jurisdictions. Where information is transferred, reasonable steps should be taken to handle it in accordance with this policy and applicable data-protection requirements.</p></section>
                <section><h2 id="privacy-retention" class="scroll-mt-28 font-display text-3xl font-bold text-white">6. How long personal information is kept</h2><div class="mt-4 space-y-4"><p>Personal information is retained for as long as reasonably necessary for the purpose for which it was collected, to provide the relevant service, comply with requirements, resolve disputes or satisfy legitimate record-keeping needs.</p><p>Questions about privacy can be directed to the official contact details published on the <a href="{{ url('/contact') }}" class="font-semibold text-cyan-200 hover:text-white">Contact page</a>.</p></div></section>
            </div>
        </article>
    </div>
</section>
@endsection
