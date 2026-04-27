@extends('layouts.app', ['title' => $pageName ?? ($service->title ?? 'Service Details')])

@section('content')
    {{-- =========================
        PAGE HEADER — Premium Violet Header
    ========================= --}}
    <section class="relative isolate overflow-hidden" style="background: var(--bg);">
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="serviceGlow" x1="0" x2="1" y1="0" y2="0">
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
            <div class="absolute -left-10 top-16 h-48 w-48 rounded-full bg-violet-400/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                Service Details
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl md:text-5xl"
                style="color: var(--ink);">
                {{ $pageName ?? $service->title }}
            </h1>

            <nav class="mt-4 text-xs sm:text-sm" style="color: var(--muted);">
                <a href="{{ url('/') }}" class="hover:underline" style="color: var(--ink-soft);">Home</a>
                <span class="mx-2 opacity-75">/</span>
                <a href="{{ url('services') }}" class="hover:underline" style="color: var(--ink-soft);">Services</a>
                <span class="mx-2 opacity-75">/</span>
                <span style="color: var(--ink);">{{ $service->title }}</span>
            </nav>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- =========================
        SERVICE DETAILS — Premium glass layout
    ========================= --}}
    <section class="relative overflow-hidden py-16 lg:py-24" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180 pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-16 -left-24 h-[28rem] w-[28rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-20 -right-24 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-start gap-10 lg:grid-cols-12">

                {{-- Image / Poster --}}
                <div class="lg:col-span-5">
                    <div class="relative rounded-[30px] p-[3px] shadow-[0_30px_90px_-50px_rgba(0,0,0,.35)]"
                         style="background:
                            conic-gradient(from 210deg,
                            rgba(139,92,246,.55),
                            rgba(232,121,249,.20),
                            rgba(243,211,138,.14),
                            rgba(255,255,255,0),
                            rgba(139,92,246,.55));">
                        <div class="relative overflow-hidden rounded-[27px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <img
                                src="{{ asset('home/serv/'.$service->photo) }}"
                                alt="{{ $service->title }}"
                                class="block h-[360px] w-full object-cover sm:h-[460px]"
                                loading="lazy"
                            />
                            <span class="pointer-events-none absolute inset-0"
                                  style="background:
                                        linear-gradient(180deg, rgba(20,10,35,.32) 0%, rgba(20,10,35,0) 38%),
                                        radial-gradient(900px 380px at 15% -10%, rgba(139,92,246,.16), transparent 60%),
                                        radial-gradient(900px 420px at 110% 0%, rgba(243,211,138,.10), transparent 58%);"></span>
                        </div>
                    </div>
                </div>

                {{-- Copy --}}
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                          style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                        Service Details
                    </span>

                    <h2 class="mt-4 text-2xl font-extrabold sm:text-3xl"
                        style="color: var(--ink);">
                        {{ $service->title }}
                    </h2>

                    <div class="prose prose-slate mt-5 max-w-none
                                prose-headings:font-extrabold
                                prose-strong:font-bold
                                prose-a:no-underline
                                prose-ul:my-4
                                prose-ol:my-4
                                prose-li:my-1"
                         style="
                            --tw-prose-body: color-mix(in srgb, var(--ink-soft) 100%, transparent);
                            --tw-prose-headings: var(--ink);
                            --tw-prose-links: var(--brand-2);
                            --tw-prose-bold: var(--ink);
                            --tw-prose-bullets: var(--brand);
                            --tw-prose-counters: var(--brand);
                            --tw-prose-hr: var(--line);
                            --tw-prose-quotes: var(--ink);
                            --tw-prose-quote-borders: var(--line);
                            --tw-prose-captions: var(--muted);
                            --tw-prose-code: var(--brand-2);
                            --tw-prose-pre-code: #fff;
                            --tw-prose-pre-bg: #1a1028;
                            --tw-prose-th-borders: var(--line);
                            --tw-prose-td-borders: var(--line);
                         ">
                        {!! str_replace('MYSITE', $siteName, $service->content) !!}
                    </div>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center rounded-full px-6 py-3 text-sm font-semibold text-white shadow transition hover:brightness-105 focus:outline-none"
                           style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                            Get Started Now
                        </a>

                        <a href="{{ url('services') }}"
                           class="inline-flex items-center justify-center rounded-full px-6 py-3 text-sm font-semibold backdrop-blur transition"
                           style="color: var(--ink); background: var(--surface); border: 1px solid var(--line);">
                            Back to Services
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>
@endsection
