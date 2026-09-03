@extends('layouts.marketing')

@section('title', config('app.name') . ' | Terms of Use')
@section('meta_description', 'Terms governing use of the website, client accounts and investment services.')

@section('content')
<section class="bg-ink-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Legal</p>
            <h1 class="mt-5 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Terms of Use</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/60">These terms govern access to the website, account use and the relationship between users, clients and {{ config('app.name') }}.</p>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-16 sm:py-20 lg:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:gap-16 lg:px-8">
        <aside class="lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">On this page</p>
            <nav class="mt-5 grid gap-2 text-sm text-ink-700">
                <a href="#terms-introduction" class="hover:text-ink-950">01 · Introduction</a>
                <a href="#terms-obligations" class="hover:text-ink-950">02 · Obligations</a>
                <a href="#terms-disclaimer" class="hover:text-ink-950">03 · Disclaimer & liability</a>
                <a href="#terms-termination" class="hover:text-ink-950">04 · Termination</a>
                <a href="#terms-general" class="hover:text-ink-950">05 · General terms</a>
            </nav>
        </aside>

        <article class="rounded-[2rem] border border-ink-950/8 bg-white p-6 shadow-sm sm:p-9 lg:p-12">
            <div class="prose prose-slate max-w-none prose-headings:scroll-mt-28 prose-headings:font-display prose-headings:font-semibold prose-headings:tracking-[-0.02em] prose-p:leading-8 prose-li:leading-7 prose-a:text-bronze-700">
                <h2 id="terms-introduction">1. Introduction</h2>
                <p>{{ config('app.name') }} provides investment-related services through its website and associated applications. By using the website, you agree to these Terms of Use and to the Privacy Policy, which explains how personal information is collected, used and protected.</p>
                <p>For these terms, a User is an individual who uses the website to evaluate the service or access general information. A Client is an individual who creates an account and uses investment services made available through {{ config('app.name') }}. Clients may also be subject to additional terms presented when an account is created or an investment is funded.</p>

                <h2 id="terms-obligations">2. Obligations</h2>
                <p>You must be 18 or older to access services intended for account holders. Access or use by anyone below the applicable age requirement is not authorised.</p>
                <p>To access certain features you may be required to create a user account and choose a password. You are responsible for safeguarding your password and account information, for activities conducted through your account, and for notifying {{ config('app.name') }} if you believe your credentials have been lost, stolen or used without authorisation.</p>
                <p>Information supplied during registration or account use should be true, accurate, current and complete.</p>

                <h2 id="terms-disclaimer">3. Disclaimer and limitation of liability</h2>
                <p>Investment outcomes cannot be guaranteed. All investments involve risk, including the possibility of loss. Information made available to a User who is not receiving a specific client service is provided for general or educational purposes and should not be treated as personal legal, tax or financial-planning advice.</p>
                <p>You remain responsible for considering your own objectives, financial circumstances and risk tolerance before acting on general information. Where investment management or another client service is offered, the applicable relationship is subject to explicit enrolment and any additional terms presented for that service.</p>

                <h2 id="terms-termination">4. Termination</h2>
                <p>Either party may end the relationship subject to outstanding obligations and the terms applicable to active investments. {{ config('app.name') }} may suspend or terminate access where fraud, unlawful activity, misuse of the service or a material breach of applicable terms is reasonably suspected.</p>
                <p>Where required by law, regulation or valid legal process, {{ config('app.name') }} may cooperate with relevant authorities. Provisions that by their nature should survive termination—including ownership, limitation of liability and outstanding obligations—remain effective where applicable.</p>

                <h2 id="terms-general">5. General terms</h2>
                <p>If any provision of these Terms of Use is held invalid or unenforceable, the remaining provisions continue in effect. A failure to enforce a right or provision does not automatically waive that right or provision.</p>
                <p>These terms may be updated from time to time by publishing a revised version. Continued use after an update may constitute acceptance where permitted by applicable law. If you do not agree with revised terms, you should stop using the relevant service and contact {{ config('app.name') }} regarding any existing client obligations.</p>
            </div>
        </article>
    </div>
</section>
@endsection
