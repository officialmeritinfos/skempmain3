@extends('layouts.app', ['title' => $pageName ?? 'About'])

@section('content')
    {{-- =========================
        PAGE HEADER — Premium Violet Header
    ========================= --}}
    <section class="relative isolate overflow-hidden bg-[var(--bg)]">
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="pageGlow" x1="0" x2="1" y1="0" y2="0">
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
            <div class="absolute right-8 top-8 h-40 w-40 rounded-full bg-fuchsia-400/15 blur-3xl"></div>
            <div class="absolute -left-12 top-16 h-56 w-56 rounded-full bg-violet-400/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.16),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent)); color: #fff;">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                {{ $siteName }}
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl md:text-5xl"
                style="color: var(--ink);">
                {{ $pageName }}
            </h1>

            <nav class="mt-4 text-xs sm:text-sm" style="color: var(--muted);">
                <a href="{{ url('/') }}" class="transition hover:opacity-100 hover:underline" style="color: var(--ink-soft);">Home</a>
                <span class="mx-2 opacity-75">/</span>
                <span style="color: var(--ink);">{{ $pageName }}</span>
            </nav>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- =========================
        ABOUT — Premium glass + collage + lightbox
    ========================= --}}
    <section x-data="{ open:false, src:'' }"
             @keydown.escape.window="open=false; src=''"
             class="relative overflow-hidden py-16 lg:py-24"
             style="background: var(--bg);">

        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[30rem] w-[30rem] rounded-full blur-3xl bg-violet-500/10"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[32rem] w-[32rem] rounded-full blur-3xl bg-fuchsia-400/10"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">

                {{-- LEFT: Image collage --}}
                <div class="relative">
                    <div class="relative grid gap-5">
                        <div class="relative w-full max-w-lg rounded-[28px] p-[3px] shadow-[0_25px_70px_-40px_rgba(0,0,0,.45)]"
                             style="background:
                                conic-gradient(from 210deg,
                                rgba(139,92,246,.55),
                                rgba(232,121,249,.24),
                                rgba(243,211,138,.18),
                                rgba(255,255,255,0),
                                rgba(139,92,246,.55));">
                            <div class="relative overflow-hidden rounded-[25px] backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">
                                <img src="{{ asset('home/images/resource/about-4.jpg') }}" alt=""
                                     class="block h-[360px] w-full object-cover opacity-95">
                                <span class="pointer-events-none absolute inset-0"
                                      style="background: linear-gradient(180deg, rgba(20,10,35,.16), rgba(20,10,35,0) 42%);"></span>
                            </div>
                        </div>

                        <div class="relative -mt-10 ml-auto w-[70%] max-w-sm rounded-[28px] p-[3px] shadow-[0_20px_65px_-35px_rgba(0,0,0,.38)]"
                             style="background:
                                conic-gradient(from 25deg,
                                rgba(243,211,138,.45),
                                rgba(232,121,249,.20),
                                rgba(255,255,255,0),
                                rgba(243,211,138,.45));">
                            <div class="relative overflow-hidden rounded-[25px] backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">
                                <img src="{{ asset('home/images/resource/about-1.jpg') }}" alt=""
                                     class="block h-60 w-full object-cover opacity-95">

                                <button
                                    @click="open=true; src='https://www.youtube.com/embed/nfP5N9Yc72A?autoplay=1&rel=0&modestbranding=1&start=28'"
                                    class="group absolute left-1/2 top-1/2 grid h-16 w-16 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full focus:outline-none"
                                    aria-label="Play about video">
                                    <span class="absolute inset-0 rounded-full bg-fuchsia-400/25 blur-xl opacity-80"></span>
                                    <span class="absolute inset-0 animate-ping rounded-full ring-2 ring-violet-300/30"></span>
                                    <span class="relative z-10 grid h-full w-full place-items-center rounded-full shadow-xl ring-1 ring-white/20 transition-transform group-hover:scale-105 group-active:scale-95"
                                          style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                        <svg class="h-6 w-6 translate-x-[1px]" viewBox="0 0 24 24" fill="white">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Copy --}}
                <div>
                    <span class="inline-block rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                          style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                        About {{ $siteName }}
                    </span>

                    <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl"
                        style="color: var(--ink);">
                        Building wealth with clarity, <br class="hidden sm:block"/> discipline, and smart risk control
                    </h2>

                    <div class="mt-5 space-y-4 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                        <p>
                            {{ $siteName }} helps individuals and businesses turn income into structured wealth.
                            We combine market intelligence, portfolio discipline, and risk controls to keep your strategy
                            clear — even when markets get noisy.
                        </p>
                        <p>
                            Since 2014, we’ve supported thousands of investors with a simple promise:
                            transparency, consistent communication, and a plan you can actually follow.
                        </p>
                        <p>
                            Our team focuses on multi-asset allocation (FX, equities, commodities, and alternatives)
                            with position sizing, downside protection, and regular reviews built into the process.
                        </p>
                        <p>
                            Whether you’re starting small or managing larger capital, we tailor the approach to your goals,
                            timeframe, and risk profile — and we track progress with clear milestones, not hype.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="group relative rounded-2xl p-[2px]"
                             style="background: linear-gradient(135deg, rgba(139,92,246,.55), rgba(232,121,249,.20), transparent);">
                            <div class="rounded-2xl p-5 backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">
                                <div class="mb-3 inline-flex h-11 w-11 items-center justify-center rounded-xl"
                                     style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                    <svg class="h-5 w-5 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </div>
                                <h3 class="text-base font-bold" style="color: var(--ink);">Strategy-first</h3>
                                <p class="mt-1.5 text-sm" style="color: var(--ink-soft);">
                                    Clear allocations, entry rules, and review cadence — built around your risk.
                                </p>
                            </div>
                        </div>

                        <div class="group relative rounded-2xl p-[2px]"
                             style="background: linear-gradient(135deg, rgba(243,211,138,.50), rgba(232,121,249,.18), transparent);">
                            <div class="rounded-2xl p-5 backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">
                                <div class="mb-3 inline-flex h-11 w-11 items-center justify-center rounded-xl"
                                     style="background: rgba(243,211,138,.10); border: 1px solid var(--line);">
                                    <svg class="h-5 w-5 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z"></path>
                                        <path d="M9.5 12.5l2 2 3-3"></path>
                                    </svg>
                                </div>
                                <h3 class="text-base font-bold" style="color: var(--ink);">Risk & transparency</h3>
                                <p class="mt-1.5 text-sm" style="color: var(--ink-soft);">
                                    No guesswork — you see the plan, the rationale, and the next steps.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lightbox --}}
        <div x-cloak x-show="open" x-transition.opacity @click.self="open=false; src=''"
             class="fixed inset-0 z-[70] bg-black/70 backdrop-blur-sm">
            <div class="absolute inset-0 grid place-items-center p-4">
                <div x-show="open" x-transition
                     class="relative w-full max-w-5xl overflow-hidden rounded-2xl bg-black/55 shadow-2xl"
                     style="border: 1px solid rgba(255,255,255,.12);"
                     role="dialog" aria-modal="true">
                    <div class="aspect-[16/9] w-full">
                        <iframe :src="open ? src : ''"
                                allow="autoplay; encrypted-media"
                                allowfullscreen
                                class="h-full w-full"></iframe>
                    </div>
                    <button @click="open=false; src=''"
                            class="absolute -top-12 right-0 text-sm font-semibold text-white/90 hover:text-white">
                        Close ✕
                    </button>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- =========================
        FULL-WIDTH IMAGE
    ========================= --}}
    <section class="relative overflow-hidden py-10" style="background: var(--bg);">
        <div class="pointer-events-none absolute -top-20 -left-24 h-[26rem] w-[26rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[30px] p-[3px] shadow-[0_30px_90px_-45px_rgba(0,0,0,.40)]"
                 style="background:
                    conic-gradient(from 210deg,
                    rgba(139,92,246,.55),
                    rgba(232,121,249,.24),
                    rgba(243,211,138,.16),
                    rgba(255,255,255,0),
                    rgba(139,92,246,.55));">
                <div class="relative overflow-hidden rounded-[27px] backdrop-blur"
                     style="background: var(--surface); border: 1px solid var(--line);">
                    <img src="{{ asset('certificate.jpg') }}" alt="" class="block w-full h-auto">
                    <span class="pointer-events-none absolute inset-0"
                          style="background: linear-gradient(180deg, rgba(20,10,35,.08), rgba(20,10,35,0) 38%, rgba(20,10,35,.24) 100%);"></span>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================
        SERVICES
    ========================= --}}
    <section class="relative overflow-hidden py-16 lg:py-24" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[28rem] w-[28rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-block rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    What We Offer
                </span>

                <h2 class="mt-4 text-2xl font-extrabold sm:text-3xl md:text-4xl"
                    style="color: var(--ink);">
                    Smart strategies, clear guidance <br class="hidden sm:block"/> and long-term planning
                </h2>

                <p class="mx-auto mt-2 max-w-2xl text-sm" style="color: var(--ink-soft);">
                    Premium consulting built on structure, risk control, and measurable progress.
                </p>
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3">
                @foreach($services as $service)
                    <article class="group relative rounded-[28px] p-[2px] transition-shadow duration-300 hover:shadow-[0_40px_110px_-50px_rgba(0,0,0,.30)]"
                             style="background:
                                conic-gradient(from 210deg,
                                rgba(139,92,246,.55),
                                rgba(232,121,249,.20),
                                rgba(243,211,138,.16),
                                rgba(255,255,255,0),
                                rgba(139,92,246,.55));
                                box-shadow: 0 30px 90px -45px rgba(0,0,0,.22);">
                        <div class="relative h-full overflow-hidden rounded-[26px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">

                            <div class="relative aspect-[16/10] w-full overflow-hidden">
                                <img src="{{ asset('home/serv/'.$service->photo) }}" alt=""
                                     class="h-full w-full scale-[1.02] object-cover opacity-95 transition duration-300 group-hover:scale-105">
                                <span class="pointer-events-none absolute inset-0"
                                      style="background:
                                        radial-gradient(800px 360px at 20% -10%, rgba(139,92,246,.18), transparent 60%),
                                        radial-gradient(900px 380px at 120% 10%, rgba(243,211,138,.14), transparent 62%),
                                        linear-gradient(180deg, rgba(20,10,35,0) 45%, rgba(20,10,35,.48) 100%);"></span>
                            </div>

                            <div class="p-6 sm:p-8">
                                <div class="flex items-start gap-4">
                                    <span class="grid h-12 w-12 place-items-center rounded-xl"
                                          style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                        <svg class="h-5 w-5 text-violet-400" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.6">
                                            <path d="M3 3v18h18"></path>
                                            <path d="M7 15l4-4 3 3 5-6"></path>
                                        </svg>
                                    </span>

                                    <div class="min-w-0">
                                        <h3 class="truncate text-lg font-bold sm:text-xl" style="color: var(--ink);">
                                            <a href="{{ route('service.details',['id'=>$service->id]) }}" class="hover:opacity-90">
                                                {{ $service->title }}
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm leading-relaxed" style="color: var(--ink-soft);">
                                            {{ $service->short }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-between">
                                    <a href="{{ route('service.details',['id'=>$service->id]) }}"
                                       class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-extrabold text-white shadow transition hover:brightness-105 focus:outline-none"
                                       style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                        Explore
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                        </svg>
                                    </a>

                                    <span class="h-2 w-2 rounded-full bg-fuchsia-300/80 transition-shadow group-hover:shadow-[0_0_26px_8px_rgba(232,121,249,.35)]"></span>
                                </div>
                            </div>
                        </div>

                        <div class="pointer-events-none absolute inset-0 rounded-[28px] transition-transform duration-300 group-hover:-translate-y-1"></div>
                    </article>
                @endforeach
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>
@endsection
