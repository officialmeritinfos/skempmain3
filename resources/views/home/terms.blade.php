@extends('layouts.marketing')

@section('title', config('app.name') . ' | Terms of Use')
@section('meta_description', 'Terms governing use of the website, client accounts and services provided by ' . config('app.name') . '.')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div><div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <span class="inline-flex rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl">Legal</span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Terms of <span class="aurora-text">Use.</span></h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/64">These terms govern access to the website, account use and the relationship between users, clients and {{ config('app.name') }}.</p>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:gap-16 lg:px-8">
        <aside class="lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">On this page</p>
            <nav class="mt-5 grid gap-2 text-sm text-white/55">
                <a href="#terms-introduction" class="transition hover:text-white">01 · Introduction</a>
                <a href="#terms-obligations" class="transition hover:text-white">02 · Obligations</a>
                <a href="#terms-disclaimer" class="transition hover:text-white">03 · Disclaimer & liability</a>
                <a href="#terms-termination" class="transition hover:text-white">04 · Termination</a>
                <a href="#terms-general" class="transition hover:text-white">05 · General terms</a>
            </nav>
        </aside>

        <article class="glass-panel rounded-[2rem] p-6 sm:p-9 lg:p-12">
            <div class="space-y-10 text-sm leading-8 text-white/66 sm:text-base">
                <section><h2 id="terms-introduction" class="scroll-mt-28 font-display text-3xl font-bold text-white">1. Introduction</h2><div class="mt-4 space-y-4"><p>{{ config('app.name') }} provides investment-related services through its website and associated applications. By using the website, you agree to these Terms of Use and to the Privacy Policy.</p><p>For these terms, a User is an individual who uses the website to evaluate the service or access general information. A Client is an individual who creates an account and uses services made available through {{ config('app.name') }}. Clients may also be subject to additional terms presented when an account is created or an investment is funded.</p></div></section>
                <section><h2 id="terms-obligations" class="scroll-mt-28 font-display text-3xl font-bold text-white">2. Obligations</h2><div class="mt-4 space-y-4"><p>You must be 18 or older to access services intended for account holders. Access or use by anyone below the applicable age requirement is not authorised.</p><p>To access certain features you may be required to create a user account and choose a password. You are responsible for safeguarding your password and account information and for notifying {{ config('app.name') }} if you believe your credentials have been compromised.</p><p>Information supplied during registration or account use should be true, accurate, current and complete.</p></div></section>
                <section><h2 id="terms-disclaimer" class="scroll-mt-28 font-display text-3xl font-bold text-white">3. Disclaimer and limitation of liability</h2><div class="mt-4 space-y-4"><p>Investment outcomes cannot be guaranteed. All investments involve risk, including the possibility of loss. Information made available to a User who is not receiving a specific client service is provided for general or educational purposes and should not be treated as personal legal, tax or financial-planning advice.</p><p>You remain responsible for considering your own objectives, financial circumstances and risk tolerance before acting on general information.</p></div></section>
                <section><h2 id="terms-termination" class="scroll-mt-28 font-display text-3xl font-bold text-white">4. Termination</h2><div class="mt-4 space-y-4"><p>Either party may end the relationship subject to outstanding obligations and the terms applicable to active investments. {{ config('app.name') }} may suspend or terminate access where fraud, unlawful activity, misuse of the service or a material breach of applicable terms is reasonably suspected.</p><p>Where required by law, regulation or valid legal process, {{ config('app.name') }} may cooperate with relevant authorities.</p></div></section>
                <section><h2 id="terms-general" class="scroll-mt-28 font-display text-3xl font-bold text-white">5. General terms</h2><div class="mt-4 space-y-4"><p>If any provision of these Terms of Use is held invalid or unenforceable, the remaining provisions continue in effect. A failure to enforce a right or provision does not automatically waive that right or provision.</p><p>These terms may be updated from time to time by publishing a revised version. If you do not agree with revised terms, you should stop using the relevant service and contact {{ config('app.name') }} regarding any existing client obligations.</p></div></section>
            </div>
        </article>
    </div>
</section>
@endsection
