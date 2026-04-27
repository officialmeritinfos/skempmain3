@extends('layouts.app', ['title' => $pageName ?? 'Contact'])

@section('content')
    {{-- =========================
        PAGE HEADER — Emerald Executive + Wave
    ========================= --}}
    <section class="relative isolate overflow-hidden bg-[#03160F]">
        {{-- gradient defs for waves --}}
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="fLinear" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0" stop-color="#22c55e"/>
                    <stop offset=".55" stop-color="#84cc16"/>
                    <stop offset="1" stop-color="#f59e0b"/>
                </linearGradient>
            </defs>
        </svg>

        {{-- header background --}}
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#03160F] via-[#052014] to-[#0B2E1F]"></div>

        {{-- subtle glows --}}
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-45">
            <div class="absolute right-8 top-8 h-36 w-36 rounded-full bg-emerald-400/12 blur-2xl"></div>
            <div class="absolute -left-16 top-16 h-48 w-48 rounded-full bg-amber-300/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(34,197,94,.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(245,158,11,.12),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center relative z-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-emerald-50">
                {{ $pageName }}
            </h1>
            {{-- breadcrumbs --}}
            <nav class="mt-4 text-xs sm:text-sm text-emerald-100/70">
                <a href="{{ url('/') }}" class="hover:underline hover:text-emerald-50">Home</a>
                <span class="mx-2 opacity-75">/</span>
                <span class="text-emerald-100/85">{{ $pageName }}</span>
            </nav>
        </div>

        {{-- bottom wave into content --}}
        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="#03160F"></path>
        </svg>
    </section>

    {{-- =========================
        CONTACT CARDS — Emerald Glass / Gradient Edge
    ========================= --}}
    <section class="relative overflow-hidden bg-[#03160F] py-16 lg:py-24">
        {{-- top wave if this follows header --}}
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180 pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="#03160F"></path>
        </svg>

        {{-- ambient glows --}}
        <div class="pointer-events-none absolute -top-20 -left-24 h-[24rem] w-[24rem] rounded-full bg-emerald-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[26rem] w-[26rem] rounded-full bg-amber-300/10 blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">

                {{-- Address --}}
                <article
                    class="group rounded-[28px] p-[2px]
                           bg-[conic-gradient(from_210deg,rgba(34,197,94,.60),rgba(132,204,22,.22),rgba(245,158,11,.18),rgba(3,22,15,0),rgba(34,197,94,.60))]
                           shadow-[0_30px_90px_-45px_rgba(0,0,0,.70)]
                           transition-transform duration-300 hover:-translate-y-1">
                    <div class="h-full rounded-[26px] bg-[#052014]/55 backdrop-blur
                                ring-1 ring-inset ring-emerald-200/10 p-6">
                        <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl
                                    bg-[#03160F]/35 ring-1 ring-inset ring-emerald-200/15">
                            <svg class="h-6 w-6 text-lime-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M12 21s-7-4.35-7-10a7 7 0 1114 0c0 5.65-7 10-7 10z"></path>
                                <circle cx="12" cy="11" r="2.5"></circle>
                            </svg>
                        </div>
                        <h5 class="text-lg font-bold text-emerald-50">Address</h5>
                        <div class="mt-2 text-sm leading-relaxed text-emerald-100/80">
                            {!! $web->address !!}
                        </div>
                    </div>
                </article>

                {{-- Phone (only if present) --}}
                @if($web->phone)
                    <article
                        class="group rounded-[28px] p-[2px]
                               bg-[conic-gradient(from_200deg,rgba(245,158,11,.45),rgba(132,204,22,.18),rgba(34,197,94,.22),rgba(3,22,15,0),rgba(245,158,11,.45))]
                               shadow-[0_30px_90px_-45px_rgba(0,0,0,.70)]
                               transition-transform duration-300 hover:-translate-y-1">
                        <div class="h-full rounded-[26px] bg-[#052014]/55 backdrop-blur
                                    ring-1 ring-inset ring-emerald-200/10 p-6">
                            <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl
                                        bg-[#03160F]/35 ring-1 ring-inset ring-amber-200/15">
                                <svg class="h-6 w-6 text-amber-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.86.33 1.7.62 2.5a2 2 0 0 1-.45 2.11L8.1 9.9a16 16 0 0 0 6 6l1.57-1.13a2 2 0 0 1 2.11-.45c.8.29 1.64.5 2.5.62A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>
                            <h5 class="text-lg font-bold text-emerald-50">Phone</h5>
                            <p class="mt-2 text-sm leading-relaxed">
                                <a href="tel:{{ $web->phone }}"
                                   class="font-semibold text-lime-200 hover:text-emerald-50">
                                    {{ $web->phone }}
                                </a>
                            </p>
                        </div>
                    </article>
                @endif

                {{-- Email --}}
                <article
                    class="group rounded-[28px] p-[2px]
                           bg-[conic-gradient(from_210deg,rgba(34,197,94,.60),rgba(132,204,22,.22),rgba(245,158,11,.18),rgba(3,22,15,0),rgba(34,197,94,.60))]
                           shadow-[0_30px_90px_-45px_rgba(0,0,0,.70)]
                           transition-transform duration-300 hover:-translate-y-1">
                    <div class="h-full rounded-[26px] bg-[#052014]/55 backdrop-blur
                                ring-1 ring-inset ring-emerald-200/10 p-6">
                        <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl
                                    bg-[#03160F]/35 ring-1 ring-inset ring-emerald-200/15">
                            <svg class="h-6 w-6 text-emerald-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M3 5h18v14H3z"></path><path d="M3 7l9 7 9-7"></path>
                            </svg>
                        </div>
                        <h5 class="text-lg font-bold text-emerald-50">Email</h5>
                        <p class="mt-2 text-sm leading-relaxed">
                            <a href="mailto:{{ $web->email }}"
                               class="font-semibold text-lime-200 hover:text-emerald-50">
                                {{ $web->email }}
                            </a>
                        </p>
                    </div>
                </article>

            </div>

            {{-- Optional: “Quick Message” CTA strip (keeps page from feeling empty) --}}
            <div class="mt-10 rounded-[28px] p-[2px]
                        bg-[conic-gradient(from_210deg,rgba(34,197,94,.55),rgba(132,204,22,.18),rgba(245,158,11,.14),rgba(3,22,15,0),rgba(34,197,94,.55))]
                        shadow-[0_26px_80px_-50px_rgba(0,0,0,.75)]">
                <div class="rounded-[26px] bg-[#052014]/55 ring-1 ring-inset ring-emerald-200/10 backdrop-blur p-6 sm:p-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                        <div>
                            <h3 class="text-xl font-extrabold text-emerald-50">Need help fast?</h3>
                            <p class="mt-1 text-sm text-emerald-100/75">
                                Send us an email and we’ll respond as soon as possible.
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="mailto:{{ $web->email }}"
                               class="inline-flex items-center justify-center rounded-full px-5 py-2.5 text-sm font-semibold
                                      text-[#052014] bg-lime-300 hover:bg-amber-200
                                      focus:outline-none focus:ring-2 focus:ring-lime-200/60">
                                Email us
                            </a>
                            @if($web->phone)
                                <a href="tel:{{ $web->phone }}"
                                   class="inline-flex items-center justify-center rounded-full px-5 py-2.5 text-sm font-semibold
                                          text-emerald-50 bg-[#03160F]/40 ring-1 ring-inset ring-emerald-200/15
                                          hover:bg-[#03160F]/60 focus:outline-none focus:ring-2 focus:ring-emerald-300/40">
                                    Call now
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- bottom wave to footer / next section --}}
        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="#03160F"></path>
        </svg>
    </section>
@endsection
