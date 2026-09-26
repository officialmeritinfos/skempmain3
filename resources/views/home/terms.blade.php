@extends('layouts.marketing')

@section('title', config('app.name') . ' | Terms of Use')
@section('meta_description', 'Terms governing use of the website, client accounts and services provided by ' . config('app.name') . '.')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Legal</p>
            </div>
            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Terms of Use.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">These terms govern access to the website, account use and the relationship between users, clients and {{ config('app.name') }}.</p>
        </div>
    </div>
</section>

<section class="bg-white py-20 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:gap-16 lg:px-8">
        <aside class="lg:sticky lg:top-28 lg:self-start">
            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#7b5a32] dark:text-[#e4c38f]">On this page</p>
            <nav class="mt-5 grid gap-2 text-sm text-[#66717c] dark:text-white/52">
                <a href="#terms-introduction" class="transition hover:text-[#0b1b2b] dark:hover:text-white">01 · Introduction</a>
                <a href="#terms-obligations" class="transition hover:text-[#0b1b2b] dark:hover:text-white">02 · Obligations</a>
                <a href="#terms-disclaimer" class="transition hover:text-[#0b1b2b] dark:hover:text-white">03 · Disclaimer & liability</a>
                <a href="#terms-termination" class="transition hover:text-[#0b1b2b] dark:hover:text-white">04 · Termination</a>
                <a href="#terms-general" class="transition hover:text-[#0b1b2b] dark:hover:text-white">05 · General terms</a>
            </nav>
        </aside>

        <article class="rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 sm:p-9 lg:p-12 dark:border-white/10 dark:bg-white/4">
            <div class="space-y-10 text-sm leading-8 text-[#5f6a75] sm:text-base dark:text-white/58">
                <section>
                    <h2 id="terms-introduction" class="scroll-mt-28 font-display text-3xl font-bold text-[#132131] dark:text-white">1. Introduction</h2>
                    <div class="mt-4 space-y-4">
                        <p>{{ config('app.name') }} provides investment-related services through its website and associated applications. By using the website, you agree to these Terms of Use and to the Privacy Policy.</p>
                        <p>For these terms, a User is an individual who uses the website to evaluate the service or access general information. A Client is an individual who creates an account and uses services made available through {{ config('app.name') }}. Clients may also be subject to additional terms presented when an account is created or an investment is funded.</p>
                    </div>
                </section>
                <section>
                    <h2 id="terms-obligations" class="scroll-mt-28 font-display text-3xl font-bold text-[#132131] dark:text-white">2. Obligations</h2>
                    <div class="mt-4 space-y-4">
                        <p>You must be 18 or older to access services intended for account holders. Access or use by anyone below the applicable age requirement is not authorised.</p>
                        <p>To access certain features you may be required to create a user account and choose a password. You are responsible for safeguarding your password and account information and for notifying {{ config('app.name') }} if you believe your credentials have been compromised.</p>
                        <p>Information supplied during registration or account use should be true, accurate, current and complete.</p>
                    </div>
                </section>
                <section>
                    <h2 id="terms-disclaimer" class="scroll-mt-28 font-display text-3xl font-bold text-[#132131] dark:text-white">3. Disclaimer and limitation of liability</h2>
                    <div class="mt-4 space-y-4">
                        <p>Investment outcomes cannot be guaranteed. All investments involve risk, including the possibility of loss. Information made available to a User who is not receiving a specific client service is provided for general or educational purposes and should not be treated as personal legal, tax or financial-planning advice.</p>
                        <p>You remain responsible for considering your own objectives, financial circumstances and risk tolerance before acting on general information.</p>
                    </div>
                </section>
                <section>
                    <h2 id="terms-termination" class="scroll-mt-28 font-display text-3xl font-bold text-[#132131] dark:text-white">4. Termination</h2>
                    <div class="mt-4 space-y-4">
                        <p>Either party may end the relationship subject to outstanding obligations and the terms applicable to active investments. {{ config('app.name') }} may suspend or terminate access where fraud, unlawful activity, misuse of the service or a material breach of applicable terms is reasonably suspected.</p>
                        <p>Where required by law, regulation or valid legal process, {{ config('app.name') }} may cooperate with relevant authorities.</p>
                    </div>
                </section>
                <section>
                    <h2 id="terms-general" class="scroll-mt-28 font-display text-3xl font-bold text-[#132131] dark:text-white">5. General terms</h2>
                    <div class="mt-4 space-y-4">
                        <p>If any provision of these Terms of Use is held invalid or unenforceable, the remaining provisions continue in effect. A failure to enforce a right or provision does not automatically waive that right or provision.</p>
                        <p>These terms may be updated from time to time by publishing a revised version. If you do not agree with revised terms, you should stop using the relevant service and contact {{ config('app.name') }} regarding any existing client obligations.</p>
                    </div>
                </section>
            </div>
        </article>
    </div>
</section>
@endsection