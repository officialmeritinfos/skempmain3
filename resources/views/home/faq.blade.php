@extends('layouts.app', ['title' => $pageName ?? 'FAQs'])

@section('content')
    {{-- =========================
        PAGE HEADER — Premium Violet + Wave
    ========================= --}}
    <section class="relative isolate overflow-hidden" style="background: var(--bg);">
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="faqGlow" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0" stop-color="#8b5cf6"/>
                    <stop offset=".55" stop-color="#e879f9"/>
                    <stop offset="1" stop-color="#f3d38a"/>
                </linearGradient>
            </defs>
        </svg>

        <div class="absolute inset-0 -z-10"
             style="background:
                radial-gradient(900px 420px at 10% -10%, rgba(139,92,246,.20), transparent 60%),
                radial-gradient(720px 420px at 90% 0%, rgba(232,121,249,.16), transparent 58%),
                radial-gradient(680px 380px at 50% 115%, rgba(243,211,138,.12), transparent 62%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));"></div>

        <div class="pointer-events-none absolute inset-0 -z-10 opacity-60">
            <div class="absolute right-8 top-8 h-36 w-36 rounded-full bg-fuchsia-400/15 blur-2xl"></div>
            <div class="absolute -left-16 top-16 h-48 w-48 rounded-full bg-violet-400/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                FAQs
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl md:text-5xl"
                style="color: var(--ink);">
                {{ $pageName }}
            </h1>

            <nav class="mt-4 text-xs sm:text-sm" style="color: var(--muted);">
                <a href="{{ url('/') }}" class="hover:underline" style="color: var(--ink-soft);">Home</a>
                <span class="mx-2 opacity-60">/</span>
                <span style="color: var(--ink);">{{ $pageName }}</span>
            </nav>
        </div>

        <svg class="pointer-events-none absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- =========================
        FAQ — 2 Column Premium Accordion
    ========================= --}}
    <section x-data class="relative overflow-hidden py-16 pb-28 lg:py-24 lg:pb-36"
             style="background: var(--bg);">
        <svg class="pointer-events-none absolute -top-[118px] left-0 right-0 -z-10 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-20 -left-24 -z-10 h-[28rem] w-[28rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 -z-10 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-block rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    FAQs
                </span>

                <h2 class="mt-4 text-3xl font-extrabold sm:text-4xl"
                    style="color: var(--ink);">
                    Frequently Asked Questions
                </h2>

                <p class="mx-auto mt-2 max-w-2xl text-sm" style="color: var(--ink-soft);">
                    Quick answers about deposits, withdrawals, accounts, and how {{ $siteName }} works.
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                {{-- LEFT COLUMN --}}
                <div class="space-y-4">

                    {{-- Q1 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 210deg,
                                rgba(139,92,246,.55),
                                rgba(232,121,249,.18),
                                rgba(243,211,138,.14),
                                rgba(255,255,255,0),
                                rgba(139,92,246,.55));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    What is {{ $siteName }}?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    {{ $siteName }} is an investment platform focused on bitcoin and cryptocurrency markets.
                                    We provide structured plans and a clear dashboard to track your progress end-to-end.
                                </p>
                            </div>
                        </div>
                    </article>

                    {{-- Q2 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 200deg,
                                rgba(243,211,138,.40),
                                rgba(232,121,249,.16),
                                rgba(139,92,246,.12),
                                rgba(255,255,255,0),
                                rgba(243,211,138,.40));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    How do I create my account?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    Click <span class="font-semibold" style="color: var(--brand-2);">Create Account</span>, fill in your details,
                                    verify your email, and your dashboard becomes available immediately.
                                </p>
                            </div>
                        </div>
                    </article>

                    {{-- Q3 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 210deg,
                                rgba(139,92,246,.55),
                                rgba(232,121,249,.18),
                                rgba(243,211,138,.14),
                                rgba(255,255,255,0),
                                rgba(139,92,246,.55));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    How do I make a deposit?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="space-y-3 px-6 pb-5 text-[14.5px] leading-relaxed" x-show="open" x-collapse x-cloak style="color: var(--ink-soft);">
                                <p>From your dashboard:</p>
                                <ul class="list-disc space-y-1 pl-5">
                                    <li>Go to <span class="font-semibold" style="color: var(--brand-2);">New Investment</span>.</li>
                                    <li>Select your plan and enter the amount.</li>
                                    <li>Copy the wallet address and complete payment.</li>
                                    <li>After confirmation, the investment shows as <span class="font-semibold" style="color: var(--brand-2);">Ongoing</span>.</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    {{-- Q4 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 200deg,
                                rgba(243,211,138,.40),
                                rgba(232,121,249,.16),
                                rgba(139,92,246,.12),
                                rgba(255,255,255,0),
                                rgba(243,211,138,.40));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    How long before my deposit reflects on my {{ $siteName }} dashboard?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    Once the blockchain confirms your transaction, your deposit updates automatically on your dashboard.
                                </p>
                            </div>
                        </div>
                    </article>
                </div>

                {{-- RIGHT COLUMN --}}
                <div class="space-y-4">

                    {{-- Q5 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 210deg,
                                rgba(139,92,246,.55),
                                rgba(232,121,249,.18),
                                rgba(243,211,138,.14),
                                rgba(255,255,255,0),
                                rgba(139,92,246,.55));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    How do I make a withdrawal?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    In your dashboard, click <span class="font-semibold" style="color: var(--brand-2);">Withdraw</span>,
                                    enter your wallet address and amount, then submit.
                                </p>
                            </div>
                        </div>
                    </article>

                    {{-- Q6 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 200deg,
                                rgba(243,211,138,.40),
                                rgba(232,121,249,.16),
                                rgba(139,92,246,.12),
                                rgba(255,255,255,0),
                                rgba(243,211,138,.40));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    How long does it take to process my withdrawal?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    Withdrawals are processed as quickly as possible. Once sent, delivery time depends on the blockchain network.
                                </p>
                            </div>
                        </div>
                    </article>

                    {{-- Q7 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 210deg,
                                rgba(139,92,246,.55),
                                rgba(232,121,249,.18),
                                rgba(243,211,138,.14),
                                rgba(255,255,255,0),
                                rgba(139,92,246,.55));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    Can I have more than one account?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    We typically allow one account per user for security and compliance.
                                    If you need a special setup, contact support.
                                </p>
                            </div>
                        </div>
                    </article>

                    {{-- Q8 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 200deg,
                                rgba(243,211,138,.40),
                                rgba(232,121,249,.16),
                                rgba(139,92,246,.12),
                                rgba(255,255,255,0),
                                rgba(243,211,138,.40));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    Is this company properly registered?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    Yes — {{ $siteName }} operates as a registered business. If you need verification details,
                                    contact support for official documentation.
                                </p>
                            </div>
                        </div>
                    </article>

                    {{-- Q9 --}}
                    <article x-data="{open:false}"
                             class="group rounded-[26px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 200deg,
                                rgba(243,211,138,.40),
                                rgba(232,121,249,.16),
                                rgba(139,92,246,.12),
                                rgba(255,255,255,0),
                                rgba(243,211,138,.40));
                                box-shadow: 0 28px 90px -48px rgba(0,0,0,.28);">
                        <div class="rounded-[24px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <button @click="open=!open"
                                    class="flex w-full items-center justify-between gap-3 px-6 py-4 text-left">
                                <h3 class="text-sm font-bold sm:text-base" style="color: var(--ink);">
                                    How many times can I make a deposit?
                                </h3>
                                <svg class="h-5 w-5 transition-transform"
                                     :class="open ? 'rotate-90' : ''"
                                     style="color: var(--ink-soft);"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </button>
                            <div class="px-6 pb-5" x-show="open" x-collapse x-cloak>
                                <p class="text-[14.5px] leading-relaxed" style="color: var(--ink-soft);">
                                    As many as you want — you can fund multiple plans or reinvest whenever it matches your strategy.
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <svg class="pointer-events-none absolute bottom-0 left-0 right-0 -z-10 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>
@endsection
