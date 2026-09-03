@extends('layouts.marketing')

@section('title', config('app.name') . ' | Privacy Policy')
@section('meta_description', 'How personal information is collected, used, protected and retained when you use our website and services.')

@section('content')
<section class="bg-ink-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Privacy</p>
            <h1 class="mt-5 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Privacy Policy</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/60">This policy explains how {{ config('app.name') }} collects, uses, protects and retains personal information when you use the website or related services.</p>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-16 sm:py-20 lg:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:gap-16 lg:px-8">
        <aside class="lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">On this page</p>
            <nav class="mt-5 grid gap-2 text-sm text-ink-700">
                <a href="#privacy-introduction" class="hover:text-ink-950">01 · Introduction</a>
                <a href="#privacy-collection" class="hover:text-ink-950">02 · Information collection</a>
                <a href="#privacy-cookies" class="hover:text-ink-950">03 · Cookies</a>
                <a href="#privacy-security" class="hover:text-ink-950">04 · Security</a>
                <a href="#privacy-storage" class="hover:text-ink-950">05 · Storage & transfers</a>
                <a href="#privacy-retention" class="hover:text-ink-950">06 · Retention</a>
            </nav>
        </aside>

        <article class="rounded-[2rem] border border-ink-950/8 bg-white p-6 shadow-sm sm:p-9 lg:p-12">
            <div class="prose prose-slate max-w-none prose-headings:scroll-mt-28 prose-headings:font-display prose-headings:font-semibold prose-headings:tracking-[-0.02em] prose-p:leading-8 prose-li:leading-7 prose-a:text-bronze-700">
                <h2 id="privacy-introduction">1. Introduction</h2>
                <p>This policy explains how personal information is collected, used, disclosed and protected when you use our website, applications or related services, or otherwise interact with {{ config('app.name') }}.</p>
                <p>We may update this policy from time to time. Where appropriate, changes may be communicated through the website, account experience or other reasonable channels. We encourage users to review the policy periodically.</p>

                <h2 id="privacy-collection">2. Collection of information</h2>
                <p>When you create an account or use certain services, information may be collected to identify you, administer the service, prevent fraud, comply with applicable requirements and communicate with you.</p>
                <p>Information you provide may include your name, email address, contact details, account information and other information you choose or are required to provide in connection with the service. Where necessary, information may also be obtained from service providers used for identity verification, fraud prevention or related operational purposes.</p>

                <h2 id="privacy-cookies">3. Cookies</h2>
                <p>Cookies and similar technologies may be used to support authentication, preferences, security and website functionality. Most browsers allow you to remove or reject cookies, although doing so may affect the availability or functionality of parts of the service.</p>

                <h2 id="privacy-security">4. Security</h2>
                <p>{{ config('app.name') }} takes reasonable measures intended to protect personal information against loss, theft, misuse and unauthorised access, disclosure, alteration or destruction. Access to non-public personal information should be limited to persons or service providers who require it for legitimate operational purposes.</p>
                <p>Where you choose a password or other credential to access an account, you are responsible for keeping that credential confidential. No transmission over the internet can be guaranteed to be completely secure, so users should also follow the security guidance provided on this website.</p>
                <p>Where notification of a personal-data breach is required by applicable law, affected individuals and/or relevant authorities will be notified as required.</p>

                <h2 id="privacy-storage">5. Storage and data transfers</h2>
                <p>Personal information may be stored or processed using cloud infrastructure and service providers located in different jurisdictions. Where information is transferred, reasonable steps should be taken to handle it in accordance with this policy and applicable data-protection requirements.</p>

                <h2 id="privacy-retention">6. How long personal information is kept</h2>
                <p>Personal information is retained for as long as reasonably necessary for the purpose for which it was collected, to provide the relevant service, to comply with legal or regulatory requirements, to resolve disputes or to satisfy legitimate internal record-keeping needs.</p>
                <p>Questions about privacy can be directed to the official contact details published on the <a href="{{ url('/contact') }}">Contact page</a>.</p>
            </div>
        </article>
    </div>
</section>
@endsection
