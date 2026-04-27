{{-- resources/views/home.blade.php --}}
@extends('layouts.app', ['title' => $pageName ?? 'Home'])

@section('content')
    <!-- HERO -->
    <section
        x-data="{
        active: 0,
        slides: [
            {
                title1: 'We help investors solve',
                title2: 'complex financial problems.',
                text: 'With our integration of a Robust AI model, we are able to solve complex financial needs of our users in minutes.',
                cta: 'Join us',
                link: '{{ route('register') }}',
                image: '{{ asset('home/images/banner/banner-6.jpg') }}'
            },
            {
                title1: 'Grow your Finance',
                title2: 'and prepare for Retirement',
                text: 'Retire in grand style with our Retirement plans crafted just for you to help you grow your wealth portfolio.',
                cta: 'Get Started',
                link: '{{ route('register') }}',
                image: '{{ asset('home/images/banner/banner-4.jpg') }}'
            },
            {
                title1: 'Becoming a mining',
                title2: 'powerhouse',
                text: '{{ $siteName }} engages in heavy-task mining process and airlifts the challenges for our Clients using our Grade-one AI powered mining house.',
                cta: 'Start Mining',
                link: '{{ route('register') }}',
                image: '{{ asset('home/images/banner/building1.jpg') }}'
            }
        ],
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % this.slides.length;
            }, 6000);
        }
    }"
        class="relative isolate overflow-hidden"
        style="background: var(--bg);"
    >
        <div class="absolute inset-0 -z-10"
             style="background:
            radial-gradient(900px 420px at 10% -10%, rgba(139,92,246,.20), transparent 60%),
            radial-gradient(720px 420px at 90% 0%, rgba(232,121,249,.16), transparent 58%),
            radial-gradient(680px 380px at 50% 115%, rgba(243,211,138,.12), transparent 62%),
            linear-gradient(180deg, var(--bg-soft), var(--bg));"></div>

        <div class="pointer-events-none absolute inset-0 -z-10 opacity-50">
            <div class="absolute right-8 top-8 h-40 w-40 rounded-full bg-fuchsia-400/15 blur-3xl"></div>
            <div class="absolute left-[-80px] top-20 h-56 w-56 rounded-full bg-violet-500/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.15),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">

                <!-- Copy -->
                <div>
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-bold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, rgba(139,92,246,.88), rgba(232,121,249,.88), rgba(243,211,138,.88));">
                    <svg class="h-4 w-4 text-white/90" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l7 4v6c0 6-4 10-7 10S5 18 5 12V6l7-4z"/>
                    </svg>
                    Investment • Financial Growth • Retirement • Mining
                </span>

                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="active === index" x-transition.opacity.duration.500ms class="mt-5">
                            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-6xl leading-[1.05]"
                                style="color: var(--ink);">
                                <span class="block" x-text="slide.title1"></span>
                                <span class="block"
                                      x-text="slide.title2"
                                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent)); -webkit-background-clip: text; background-clip: text; color: transparent;"></span>
                            </h1>

                            <p class="mt-4 max-w-xl text-base sm:text-lg" style="color: var(--ink-soft);" x-text="slide.text"></p>

                            <div class="mt-8 flex flex-wrap items-center gap-3">
                                <a :href="slide.link"
                                   class="inline-flex items-center justify-center rounded-[14px] px-6 py-2.5 text-sm font-semibold text-white shadow transition hover:brightness-105 focus:outline-none"
                                   style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));"
                                   x-text="slide.cta"></a>

                                <a href="{{ url('plans') }}"
                                   class="inline-flex items-center justify-center rounded-[14px] px-6 py-2.5 text-sm font-semibold backdrop-blur"
                                   style="color: var(--ink); background: var(--surface); border: 1px solid var(--line);">
                                    View Plans
                                </a>

                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center justify-center rounded-[14px] px-6 py-2.5 text-sm font-semibold"
                                   style="color: var(--ink-soft);">
                                    Login →
                                </a>
                            </div>
                        </div>
                    </template>

                    <div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm" style="color: var(--ink-soft);">
                    <span class="inline-flex items-center gap-2">
                        <svg class="h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                        </svg>
                        Investment Solutions
                    </span>
                        <span class="inline-flex items-center gap-2">
                        <svg class="h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                        </svg>
                        Retirement Planning
                    </span>
                        <span class="inline-flex items-center gap-2">
                        <svg class="h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                        </svg>
                        Mining Opportunities
                    </span>
                    </div>

                    <div class="mt-6 flex items-center gap-2">
                        <template x-for="(slide, index) in slides" :key="'dot-' + index">
                            <button
                                @click="active = index"
                                class="h-2.5 rounded-full transition-all duration-300"
                                :style="active === index
                                ? 'width: 1.75rem; background: linear-gradient(135deg, var(--brand), var(--brand-2)); opacity: 1;'
                                : 'width: .65rem; background: color-mix(in srgb, var(--ink-soft) 35%, transparent); opacity: .45;'">
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Decorative / card side -->
                <div class="relative">
                <span aria-hidden="true"
                      class="absolute -bottom-8 left-8 h-20 w-20 rounded-full shadow-xl ring-1"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent)); border-color: rgba(255,255,255,.12);"></span>

                    <div class="rounded-3xl p-1 backdrop-blur"
                         style="background: linear-gradient(135deg, rgba(139,92,246,.20), rgba(232,121,249,.12), rgba(243,211,138,.10)); border: 1px solid var(--line);">
                        <div class="rounded-[1.35rem] p-0 ring-1 backdrop-blur overflow-hidden"
                             style="background: color-mix(in srgb, var(--surface-solid) 82%, transparent); border-color: var(--line); color: var(--ink);">

                            <div class="relative h-[340px] sm:h-[420px] lg:h-[500px]">
                                <template x-for="(slide, index) in slides" :key="'image-' + index">
                                    <img
                                        x-show="active === index"
                                        x-transition.opacity.duration.700ms
                                        :src="slide.image"
                                        :alt="slide.title1 + ' ' + slide.title2"
                                        class="absolute inset-0 h-full w-full object-cover">
                                </template>

                                <span class="pointer-events-none absolute inset-0"
                                      style="background:
                                    linear-gradient(180deg, rgba(20,10,35,.18) 0%, rgba(20,10,35,0) 35%),
                                    linear-gradient(0deg, rgba(20,10,35,.58) 0%, rgba(20,10,35,0) 48%),
                                    radial-gradient(900px 420px at 20% -10%, rgba(139,92,246,.20), transparent 60%),
                                    radial-gradient(900px 420px at 110% 0%, rgba(243,211,138,.14), transparent 60%);"></span>

                                <div class="absolute bottom-4 left-4 right-4 sm:bottom-6 sm:left-6 sm:right-6">
                                    <div class="rounded-2xl p-4 shadow-xl backdrop-blur"
                                         style="background: rgba(20,10,35,.58); border: 1px solid rgba(255,255,255,.10);">
                                        <template x-for="(slide, index) in slides" :key="'summary-' + index">
                                            <div x-show="active === index" x-transition.opacity.duration.500ms>
                                                <p class="text-xs font-semibold uppercase tracking-wide text-white/70">
                                                    {{ $siteName }}
                                                </p>
                                                <p class="mt-2 text-sm leading-6 text-white/90" x-text="slide.text"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 -z-10" viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- VIDEO --}}
    <section
        x-data="{ open:false, src:'https://www.youtube.com/embed/q5JWp47z4bY?autoplay=1&rel=0&modestbranding=1' }"
        @keydown.escape.window="open=false"
        class="relative isolate overflow-hidden py-28"
        style="background: var(--bg);">

        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 left-1/2 h-[30rem] w-[85%] -translate-x-1/2 bg-[radial-gradient(closest-side,rgba(139,92,246,.14),transparent_72%)] blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-28 -right-24 h-[32rem] w-[32rem] bg-[radial-gradient(closest-side,rgba(243,211,138,.14),transparent_72%)] blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-5xl">
                <div class="relative rounded-[36px] p-[3px] shadow-[0_40px_110px_-44px_rgba(0,0,0,.22),0_26px_90px_-52px_rgba(0,0,0,.16)]"
                     style="background:
                        conic-gradient(from 220deg,
                        rgba(139,92,246,.55),
                        rgba(232,121,249,.18),
                        rgba(255,255,255,0),
                        rgba(243,211,138,.35),
                        rgba(139,92,246,.55));">

                    <div class="relative overflow-hidden rounded-[33px] backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">

                        <div class="relative aspect-[16/9] w-full bg-cover bg-center"
                             style="background-image:url('{{ asset('home/images/background/video-bg.jpg') }}')">

                            <span class="absolute inset-0 pointer-events-none"
                                  style="background:
                                      linear-gradient(180deg, rgba(20,10,35,.62) 0%, rgba(20,10,35,0) 38%),
                                      radial-gradient(920px 420px at 14% -12%, rgba(139,92,246,.22), transparent 62%),
                                      radial-gradient(980px 460px at 112% 0%, rgba(243,211,138,.18), transparent 60%);
                                  "></span>

                            <span class="pointer-events-none absolute inset-x-0 bottom-0 h-28"
                                  style="background: radial-gradient(60% 80% at 50% 120%, rgba(20,10,35,.72), transparent 62%);"></span>

                            <button @click="open=true"
                                    class="group absolute left-1/2 top-1/2 grid h-24 w-24 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full focus:outline-none sm:h-28 sm:w-28"
                                    aria-label="Play video">

                                <span class="absolute inset-0 rounded-full bg-fuchsia-50/10 blur-xl opacity-70 group-hover:opacity-90 transition"></span>
                                <span class="absolute inset-0 rounded-full ring-2 ring-fuchsia-300/40 animate-ping"></span>

                                <span class="relative z-10 grid h-full w-full place-items-center rounded-full ring-1 ring-white/20 shadow-xl transition-transform duration-200 group-hover:scale-105 group-active:scale-95"
                                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                    <svg class="h-7 w-7 translate-x-[1px] sm:h-8 sm:w-8" viewBox="0 0 24 24" fill="white">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="absolute bottom-4 left-4 right-4 sm:bottom-6 sm:left-6 sm:right-6">
                                <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs font-semibold backdrop-blur sm:text-sm"
                                     style="background: color-mix(in srgb, var(--surface-solid) 68%, transparent); border: 1px solid var(--line); color: var(--ink);">
                                    <span class="h-2 w-2 rounded-full" style="background: var(--brand-2);"></span>
                                    Watch: How we build resilient portfolios (2:18)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -left-6 -top-6 hidden sm:block">
                        <div class="rounded-2xl px-5 py-3 text-sm shadow-2xl backdrop-blur"
                             style="border: 1px solid var(--line); background: color-mix(in srgb, var(--surface-solid) 72%, transparent); color: var(--ink);">
                            <span class="font-extrabold"
                                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent)); -webkit-background-clip: text; background-clip: text; color: transparent;">
                                Investor Stories
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <template x-teleport="body">
            <div x-cloak
                 x-show="open"
                 x-transition.opacity
                 @click="open=false"
                 class="fixed inset-0 z-[90] bg-black/70 backdrop-blur-sm">

                <div class="grid min-h-dvh place-items-center p-4">
                    <div x-show="open" x-transition
                         @click.stop
                         class="relative w-full max-w-5xl overflow-hidden rounded-2xl bg-black/70"
                         style="border: 1px solid rgba(255,255,255,.12);"
                         role="dialog" aria-modal="true">

                        <div class="aspect-[16/9] w-full">
                            <iframe :src="open ? src : ''"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen
                                    class="h-full w-full"></iframe>
                        </div>

                        <button @click="open=false"
                                class="absolute -top-12 right-0 text-sm font-semibold text-white/90 hover:text-white">
                            Close ✕
                        </button>
                    </div>
                </div>
            </div>
        </template>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>


    {{-- =========================
         FEATURE HIGHLIGHTS — Simple Business Value
       ========================= --}}
    <section class="relative overflow-hidden py-20 lg:py-24" style="background: var(--bg);">
        {{-- Top wave --}}
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        {{-- Ambient glows --}}
        <div class="pointer-events-none absolute -top-20 -left-24 h-[24rem] w-[24rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[26rem] w-[26rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Heading --}}
            <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                What We Offer
            </span>

                <h2 class="mt-4 text-3xl font-extrabold sm:text-4xl" style="color: var(--ink);">
                    Built to help you grow with more clarity and confidence
                </h2>

                <p class="mx-auto mt-3 max-w-2xl text-sm sm:text-base" style="color: var(--ink-soft);">
                    We make investing, financial growth, retirement planning, and mining opportunities easier to understand and easier to access.
                </p>
            </div>

            {{-- Cards --}}
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                {{-- Card 1 --}}
                <article class="group relative rounded-[26px] p-[2px]"
                         style="background:
                        conic-gradient(from 210deg,
                        rgba(139,92,246,.45),
                        rgba(232,121,249,.16),
                        rgba(243,211,138,.12),
                        rgba(255,255,255,0),
                        rgba(139,92,246,.45));
                        box-shadow: 0 24px 70px -35px rgba(0,0,0,.16);">
                    <div class="relative h-full rounded-[24px] p-6 backdrop-blur transition-transform duration-300 group-hover:-translate-y-1"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl"
                             style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                            <img src="{{ asset('home/images/icons/feature-5.png') }}" alt="" class="h-7 w-7 object-contain">
                        </div>

                        <h3 class="text-lg font-extrabold" style="color: var(--ink);">
                            Best Financial Analysis
                        </h3>

                        <p class="mt-3 text-sm leading-7" style="color: var(--ink-soft);">
                            We are a business inclined profitable investment company with all the right tools and experts to help you grow your investment.
                        </p>
                    </div>
                </article>

                {{-- Card 2 --}}
                <article class="group relative rounded-[26px] p-[2px]"
                         style="background:
                        conic-gradient(from 210deg,
                        rgba(232,121,249,.40),
                        rgba(139,92,246,.16),
                        rgba(243,211,138,.10),
                        rgba(255,255,255,0),
                        rgba(232,121,249,.40));
                        box-shadow: 0 24px 70px -35px rgba(0,0,0,.16);">
                    <div class="relative h-full rounded-[24px] p-6 backdrop-blur transition-transform duration-300 group-hover:-translate-y-1"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl"
                             style="background: rgba(232,121,249,.10); border: 1px solid var(--line);">
                            <img src="{{ asset('home/images/icons/feature-6.png') }}" alt="" class="h-7 w-7 object-contain">
                        </div>

                        <h3 class="text-lg font-extrabold" style="color: var(--ink);">
                            Creative &amp; Ideal Planning
                        </h3>

                        <p class="mt-3 text-sm leading-7" style="color: var(--ink-soft);">
                            Our team works hand in hand with our Super AI model to bring up innovative solutions for our clients.
                        </p>
                    </div>
                </article>

                {{-- Card 3 --}}
                <article class="group relative rounded-[26px] p-[2px]"
                         style="background:
                        conic-gradient(from 210deg,
                        rgba(243,211,138,.35),
                        rgba(139,92,246,.16),
                        rgba(232,121,249,.10),
                        rgba(255,255,255,0),
                        rgba(243,211,138,.35));
                        box-shadow: 0 24px 70px -35px rgba(0,0,0,.16);">
                    <div class="relative h-full rounded-[24px] p-6 backdrop-blur transition-transform duration-300 group-hover:-translate-y-1"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl"
                             style="background: rgba(243,211,138,.10); border: 1px solid var(--line);">
                            <img src="{{ asset('home/images/icons/feature-7.png') }}" alt="" class="h-7 w-7 object-contain">
                        </div>

                        <h3 class="text-lg font-extrabold" style="color: var(--ink);">
                            Financial Trust
                        </h3>

                        <p class="mt-3 text-sm leading-7" style="color: var(--ink-soft);">
                            We protect our investors' funds with reputable institutions and this is an insurance against the market fluctuations.
                        </p>
                    </div>
                </article>

                {{-- Card 4 --}}
                <article class="group relative rounded-[26px] p-[2px]"
                         style="background:
                        conic-gradient(from 210deg,
                        rgba(139,92,246,.42),
                        rgba(243,211,138,.14),
                        rgba(232,121,249,.10),
                        rgba(255,255,255,0),
                        rgba(139,92,246,.42));
                        box-shadow: 0 24px 70px -35px rgba(0,0,0,.16);">
                    <div class="relative h-full rounded-[24px] p-6 backdrop-blur transition-transform duration-300 group-hover:-translate-y-1"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl"
                             style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                            <img src="{{ asset('home/images/icons/feature-8.png') }}" alt="" class="h-7 w-7 object-contain">
                        </div>

                        <h3 class="text-lg font-extrabold" style="color: var(--ink);">
                            Timely Returns
                        </h3>

                        <p class="mt-3 text-sm leading-7" style="color: var(--ink-soft);">
                            Our GPT-4 model makes it possible for our investors to get credited on time and without delays.
                        </p>
                    </div>
                </article>

            </div>
        </div>

        {{-- Bottom wave --}}
        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- FEATURES --}}
    <section id="features" class="relative overflow-hidden pt-28 pb-28 mt-[-1px]" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[26rem] w-[26rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-3">
                <div class="max-w-xl">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-bold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                    Why Choose Us
                </span>

                    <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                        Clear financial solutions designed to help you grow
                    </h2>

                    <p class="mt-3 text-sm" style="color: var(--ink-soft);">
                        We help our clients grow their money, plan better, protect their funds, and receive returns on time.
                    </p>

                    <div class="mt-6 grid max-w-md grid-cols-3 gap-3">
                        <div class="rounded-2xl p-4 backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                            <p class="text-[11px]" style="color: var(--muted);">Financial planning</p>
                            <p class="mt-1 text-sm font-extrabold" style="color: var(--ink);">Simple</p>
                        </div>
                        <div class="rounded-2xl p-4 backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                            <p class="text-[11px]" style="color: var(--muted);">Fund protection</p>
                            <p class="mt-1 text-sm font-extrabold" style="color: var(--ink);">Strong</p>
                        </div>
                        <div class="rounded-2xl p-4 backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                            <p class="text-[11px]" style="color: var(--muted);">Support</p>
                            <p class="mt-1 text-sm font-extrabold" style="color: var(--ink);">Reliable</p>
                        </div>
                    </div>
                </div>

                <article x-data="{ open:false }"
                         class="group relative rounded-[28px] p-[2px] shadow-[0_26px_80px_-40px_rgba(0,0,0,.20)]"
                         style="background:
                        conic-gradient(from 210deg, rgba(139,92,246,.55), rgba(232,121,249,.18), rgba(255,255,255,0), rgba(243,211,138,.35), rgba(139,92,246,.55));">
                    <div class="relative h-full overflow-hidden rounded-[26px] backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span aria-hidden="true" class="absolute -right-16 -top-16 h-52 w-52 rounded-full bg-violet-500/12 blur-3xl"></span>

                        <div class="relative p-8 sm:p-10">
                            <div class="flex items-start gap-5">
                            <span class="grid h-14 w-14 place-items-center rounded-2xl"
                                  style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                <svg class="h-6 w-6" style="color: var(--brand-2);" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.6">
                                    <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                    <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <path d="M3 12h18"></path>
                                </svg>
                            </span>

                                <div>
                                    <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                        Best Financial Analysis
                                    </h3>
                                    <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                        We are a business inclined profitable investment company with all the right tools and experts to help you grow your investment.
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6 overflow-hidden transition-[max-height] duration-500"
                                 x-ref="ppanel"
                                 x-bind:style="open ? 'max-height:' + $refs.ppanel.scrollHeight + 'px' : 'max-height:0px'">
                                <div class="rounded-xl p-5" style="background: rgba(139,92,246,.06); border: 1px solid var(--line);">
                                    <ul class="space-y-2 text-sm" style="color: var(--ink-soft);">
                                        <li class="flex items-center gap-2">
                                            <span class="h-1.5 w-1.5 rounded-full" style="background: var(--brand-2);"></span>
                                            Built to help your investment grow
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="h-1.5 w-1.5 rounded-full" style="background: var(--brand-2);"></span>
                                            Backed by the right tools and experts
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="h-1.5 w-1.5 rounded-full" style="background: var(--brand-2);"></span>
                                            Focused on profitable opportunities
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center gap-3">
                                <button @click="open=!open" type="button"
                                        class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-semibold text-white shadow hover:brightness-105 focus:outline-none"
                                        style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                    Toggle details
                                    <svg class="h-4 w-4 transition-transform duration-300" :class="open ? 'rotate-90' : ''" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                    </svg>
                                </button>

                                <span class="text-xs" style="color: var(--muted);">Grow with better analysis</span>
                            </div>
                        </div>
                    </div>
                </article>

                <article x-data="{ open:false }"
                         class="group relative rounded-[28px] p-[2px] shadow-[0_26px_80px_-40px_rgba(0,0,0,.20)]"
                         style="background:
                        conic-gradient(from 210deg, rgba(243,211,138,.35), rgba(139,92,246,.35), rgba(255,255,255,0), rgba(232,121,249,.18), rgba(243,211,138,.35));">
                    <div class="relative h-full overflow-hidden rounded-[26px] backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span aria-hidden="true" class="absolute -left-16 -top-16 h-52 w-52 rounded-full bg-amber-300/10 blur-3xl"></span>

                        <div class="relative p-8 sm:p-10">
                            <div class="flex items-start gap-5">
                            <span class="grid h-14 w-14 place-items-center rounded-2xl"
                                  style="background: rgba(243,211,138,.08); border: 1px solid var(--line);">
                                <svg class="h-6 w-6" style="color: var(--accent);" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.6">
                                    <path d="M3 3v18h18"></path>
                                    <path d="M7 15l4-4 3 3 5-6"></path>
                                </svg>
                            </span>

                                <div>
                                    <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                        Creative &amp; Ideal Planning
                                    </h3>
                                    <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                        Our team works hand in hand with our Super AI model to bring up innovative solutions for our clients.
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6 overflow-hidden transition-[max-height] duration-500"
                                 x-ref="ipanel"
                                 x-bind:style="open ? 'max-height:' + $refs.ipanel.scrollHeight + 'px' : 'max-height:0px'">
                                <div class="rounded-xl p-5" style="background: rgba(243,211,138,.05); border: 1px solid var(--line);">
                                    <ul class="space-y-2 text-sm" style="color: var(--ink-soft);">
                                        <li class="flex items-center gap-2">
                                            <span class="h-1.5 w-1.5 rounded-full" style="background: var(--accent);"></span>
                                            Innovative solutions for clients
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="h-1.5 w-1.5 rounded-full" style="background: var(--accent);"></span>
                                            AI-supported planning process
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="h-1.5 w-1.5 rounded-full" style="background: var(--accent);"></span>
                                            Better financial decisions
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center gap-3">
                                <button @click="open=!open" type="button"
                                        class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-semibold text-white shadow hover:brightness-105 focus:outline-none"
                                        style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                    Toggle details
                                    <svg class="h-4 w-4 transition-transform duration-300" :class="open ? 'rotate-90' : ''" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                    </svg>
                                </button>

                                <span class="text-xs" style="color: var(--muted);">Planning made smarter</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- ABOUT --}}
    <section class="relative overflow-hidden pt-28 pb-28 mt-[-1px]" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -z-10 -top-10 -left-24 h-[34rem] w-[34rem] rounded-full blur-3xl bg-violet-500/12"></div>
        <div class="pointer-events-none absolute -z-10 -bottom-16 -right-24 h-[36rem] w-[36rem] rounded-full blur-3xl bg-fuchsia-400/10"></div>
        <div class="pointer-events-none absolute inset-0 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-16 lg:grid-cols-2">

                <div>
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-bold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                    About {{ $siteName }}
                </span>

                    <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                        Helping you grow your money with more confidence
                    </h2>

                    <p class="mt-5 max-w-2xl text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                        {{ $siteName }} is an investment and financial growth company focused on helping people build wealth, plan for retirement, and explore modern income opportunities like mining.
                    </p>

                    <p class="mt-4 max-w-2xl text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                        We make the process easier to understand by giving our clients access to clear plans, simple guidance, and tools designed to support smart financial decisions.
                    </p>

                    <div class="mt-10 grid gap-6 sm:grid-cols-2">
                        <div class="group relative rounded-2xl p-[2px]"
                             style="background: linear-gradient(135deg, rgba(139,92,246,.40), rgba(232,121,249,.18), transparent);">
                            <div class="relative h-full rounded-2xl p-6 transition backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">
                                <div class="mb-3 inline-flex h-12 w-12 items-center justify-center rounded-xl"
                                     style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                    <svg class="h-6 w-6" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-extrabold" style="color: var(--ink);">Simple investment plans</h3>
                                <p class="mt-2 text-sm leading-relaxed" style="color: var(--ink-soft);">
                                    We offer clear plans to help you grow your money step by step.
                                </p>
                            </div>
                        </div>

                        <div class="group relative rounded-2xl p-[2px]"
                             style="background: linear-gradient(135deg, rgba(243,211,138,.25), rgba(139,92,246,.20), transparent);">
                            <div class="relative h-full rounded-2xl p-6 transition backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">
                                <div class="mb-3 inline-flex h-12 w-12 items-center justify-center rounded-xl"
                                     style="background: rgba(243,211,138,.10); border: 1px solid var(--line);">
                                    <svg class="h-6 w-6" style="color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M12 3l7 4v10c0 4-3 7-7 7s-7-3-7-7V7l7-4z"></path>
                                        <path d="M9.5 12.5l2 2 3-3"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-extrabold" style="color: var(--ink);">Secure financial growth</h3>
                                <p class="mt-2 text-sm leading-relaxed" style="color: var(--ink-soft);">
                                    We focus on helping clients grow with better planning and stronger protection.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-wrap items-center gap-3">
                        <div class="rounded-2xl px-5 py-3 backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                            <p class="text-[11px]" style="color: var(--muted);">Investment focus</p>
                            <p class="mt-1 text-sm font-extrabold" style="color: var(--ink);">Growth</p>
                        </div>
                        <div class="rounded-2xl px-5 py-3 backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                            <p class="text-[11px]" style="color: var(--muted);">Retirement support</p>
                            <p class="mt-1 text-sm font-extrabold" style="color: var(--ink);">Planning</p>
                        </div>
                        <div class="rounded-2xl px-5 py-3 backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                            <p class="text-[11px]" style="color: var(--muted);">Client help</p>
                            <p class="mt-1 text-sm font-extrabold" style="color: var(--ink);">24/7</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative mx-auto w-full max-w-xl rounded-[30px] p-[3px] shadow-[0_30px_90px_-40px_rgba(0,0,0,.22),0_20px_60px_-45px_rgba(0,0,0,.18)]"
                         style="background:
                        conic-gradient(from 205deg, rgba(139,92,246,.35), rgba(232,121,249,.14), rgba(243,211,138,.10), rgba(255,255,255,0));">
                        <div class="relative overflow-hidden rounded-[27px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <img
                                src="{{ asset('home/images/resource/about-3.jpg') }}"
                                alt="Advisors at work"
                                class="block h-[440px] w-full object-cover opacity-90"
                                loading="lazy"
                            />

                            <span class="pointer-events-none absolute inset-0"
                                  style="background:
                                linear-gradient(180deg, rgba(20,10,35,.20) 0%, rgba(20,10,35,0) 40%),
                                radial-gradient(900px 420px at 20% -10%, rgba(139,92,246,.18), transparent 60%),
                                radial-gradient(900px 460px at 110% 0%, rgba(243,211,138,.12), transparent 60%),
                                linear-gradient(0deg, rgba(20,10,35,.54) 0%, rgba(20,10,35,0) 55%);"></span>

                            <div class="absolute bottom-5 left-5">
                            <span class="inline-flex items-center gap-2 rounded-full px-[2px] py-[2px]"
                                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                <span class="inline-flex items-center rounded-full px-4 py-2 text-[11px] font-extrabold text-white"
                                      style="background: rgba(20,10,35,.72);">
                                    TRUSTED • SINCE 2014
                                </span>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -right-6 -top-6 hidden sm:block">
                        <div class="rounded-2xl px-5 py-4 text-sm shadow-2xl backdrop-blur"
                             style="border: 1px solid var(--line); background: color-mix(in srgb, var(--surface-solid) 72%, transparent); color: var(--ink);">
                            <div class="text-xl font-extrabold" style="color: var(--ink);">
                                Trusted Support
                            </div>
                            <div class="mt-0.5 text-xs" style="color: var(--muted);">for investors and clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- SERVICES --}}
    <section id="services" class="relative overflow-hidden pt-28 pb-28 mt-[-1px]" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[26rem] w-[26rem] rounded-full bg-violet-500/12 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-14 text-center">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                Services
            </span>

                <h2 class="mt-4 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                    Services made to help you grow financially
                </h2>

                <p class="mx-auto mt-3 max-w-2xl text-sm" style="color: var(--ink-soft);">
                    From investing and retirement plans to mining and financial guidance, we help you choose the right path for your goals.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3">

                <a href="#" class="group relative rounded-[28px] p-[1.5px] transition-transform duration-300 will-change-transform focus:outline-none hover:-translate-y-1"
                   style="background: linear-gradient(135deg, rgba(139,92,246,.45), rgba(232,121,249,.25), rgba(243,211,138,.20)); box-shadow: 0 20px 60px -30px rgba(0,0,0,.18);">
                    <div class="relative h-full overflow-hidden rounded-[26px] p-8 backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span class="pointer-events-none absolute -right-1/3 -top-1/3 h-[22rem] w-[22rem] rounded-full bg-[radial-gradient(closest-side,rgba(139,92,246,.25),transparent_70%)] opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-100"></span>

                        <div class="relative">
                            <div class="mb-5 inline-grid h-14 w-14 place-items-center rounded-2xl"
                                 style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                <svg class="h-7 w-7" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                    <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <path d="M3 12h18"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                Investment Plans
                            </h3>
                            <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                Choose from investment plans designed to help you grow your money over time.
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-semibold"
                                 style="color: var(--brand-2);">
                                Explore
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="group relative rounded-[28px] p-[1.5px] transition-transform duration-300 will-change-transform focus:outline-none hover:-translate-y-1"
                   style="background: linear-gradient(135deg, rgba(139,92,246,.45), rgba(232,121,249,.18), rgba(243,211,138,.18)); box-shadow: 0 20px 60px -30px rgba(0,0,0,.18);">
                    <div class="relative h-full overflow-hidden rounded-[26px] p-8 backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span class="pointer-events-none absolute -left-1/3 -top-1/3 h-[22rem] w-[22rem] rounded-full bg-[radial-gradient(closest-side,rgba(232,121,249,.18),transparent_70%)] opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-100"></span>

                        <div class="relative">
                            <div class="mb-5 inline-grid h-14 w-14 place-items-center rounded-2xl"
                                 style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                <svg class="h-7 w-7" style="color: var(--brand);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M3 3v18h18"></path><path d="M7 15l4-4 3 3 5-6"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                Financial Growth
                            </h3>
                            <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                We help you take practical steps to build wealth and improve your financial future.
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-semibold"
                                 style="color: var(--brand-2);">
                                Explore
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="group relative rounded-[28px] p-[1.5px] transition-transform duration-300 will-change-transform focus:outline-none hover:-translate-y-1"
                   style="background: linear-gradient(135deg, rgba(243,211,138,.30), rgba(139,92,246,.25), rgba(255,255,255,0)); box-shadow: 0 20px 60px -30px rgba(0,0,0,.18);">
                    <div class="relative h-full overflow-hidden rounded-[26px] p-8 backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span class="pointer-events-none absolute -bottom-1/3 -right-1/3 h-[22rem] w-[22rem] rounded-full bg-[radial-gradient(closest-side,rgba(243,211,138,.16),transparent_70%)] opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-100"></span>

                        <div class="relative">
                            <div class="mb-5 inline-grid h-14 w-14 place-items-center rounded-2xl"
                                 style="background: rgba(243,211,138,.08); border: 1px solid var(--line);">
                                <svg class="h-7 w-7" style="color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M4 7h16M4 12h12M4 17h8"></path>
                                    <path d="M16 12h4"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                Retirement Plans
                            </h3>
                            <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                Prepare for retirement with plans created to help you build a stronger future.
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-semibold"
                                 style="color: var(--brand-2);">
                                Explore
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="group relative rounded-[28px] p-[1.5px] transition-transform duration-300 will-change-transform focus:outline-none hover:-translate-y-1"
                   style="background: linear-gradient(135deg, rgba(139,92,246,.40), rgba(243,211,138,.18), rgba(255,255,255,0)); box-shadow: 0 20px 60px -30px rgba(0,0,0,.18);">
                    <div class="relative h-full overflow-hidden rounded-[26px] p-8 backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span class="pointer-events-none absolute -top-1/3 -left-1/4 h-[20rem] w-[20rem] rounded-full bg-[radial-gradient(closest-side,rgba(243,211,138,.14),transparent_70%)] opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-100"></span>

                        <div class="relative">
                            <div class="mb-5 inline-grid h-14 w-14 place-items-center rounded-2xl"
                                 style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                <svg class="h-7 w-7" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M6 4h12l-1 14H7L6 4z"></path>
                                    <path d="M9 9h6M9 13h5"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                Mining Opportunities
                            </h3>
                            <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                Access mining opportunities supported by modern systems and easier processes.
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-semibold"
                                 style="color: var(--brand-2);">
                                Explore
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="group relative rounded-[28px] p-[1.5px] transition-transform duration-300 will-change-transform focus:outline-none hover:-translate-y-1"
                   style="background: linear-gradient(135deg, rgba(139,92,246,.40), rgba(232,121,249,.22), rgba(243,211,138,.18)); box-shadow: 0 20px 60px -30px rgba(0,0,0,.18);">
                    <div class="relative h-full overflow-hidden rounded-[26px] p-8 backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span class="pointer-events-none absolute -bottom-1/3 -right-1/4 h-[20rem] w-[20rem] rounded-full bg-[radial-gradient(closest-side,rgba(139,92,246,.20),transparent_70%)] opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-100"></span>

                        <div class="relative">
                            <div class="mb-5 inline-grid h-14 w-14 place-items-center rounded-2xl"
                                 style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                <svg class="h-7 w-7" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 2a5 5 0 015 5v3h2a2 2 0 012 2v7H3v-7a2 2 0 012-2h2V7a5 5 0 015-5z"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                Financial Guidance
                            </h3>
                            <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                Get support, answers, and direction to help you make better financial decisions.
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-semibold"
                                 style="color: var(--brand-2);">
                                Explore
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="group relative rounded-[28px] p-[1.5px] transition-transform duration-300 will-change-transform focus:outline-none hover:-translate-y-1"
                   style="background: linear-gradient(135deg, rgba(139,92,246,.40), rgba(232,121,249,.18), rgba(243,211,138,.18)); box-shadow: 0 20px 60px -30px rgba(0,0,0,.18);">
                    <div class="relative h-full overflow-hidden rounded-[26px] p-8 backdrop-blur"
                         style="background: var(--surface); border: 1px solid var(--line);">
                        <span class="pointer-events-none absolute -top-1/3 -right-1/4 h-[20rem] w-[20rem] rounded-full bg-[radial-gradient(closest-side,rgba(232,121,249,.16),transparent_70%)] opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-100"></span>

                        <div class="relative">
                            <div class="mb-5 inline-grid h-14 w-14 place-items-center rounded-2xl"
                                 style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                <svg class="h-7 w-7" style="color: var(--brand);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 22s8-4 8-10V7l-8-4-8 4v5c0 6 8 10 8 10z"></path>
                                    <path d="M9.5 12.5l2 2 3-3"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-extrabold sm:text-2xl" style="color: var(--ink);">
                                Fund Protection
                            </h3>
                            <p class="mt-2 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                We focus on safety, structure, and better systems to help protect client funds.
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-semibold"
                                 style="color: var(--brand-2);">
                                Explore
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- SECTORS --}}
    <section id="sectors" class="relative isolate overflow-hidden py-28" style="background: var(--bg);">

        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[28rem] w-[28rem] rounded-full bg-violet-500/12 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                    Where we focus
                </span>

                <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                    Sectors We Invest &amp; Grow In
                </h2>

                <p class="mt-3 text-sm" style="color: var(--ink-soft);">
                    Curated opportunities across resilient industries — built for consistent performance.
                </p>
            </div>

            <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <article class="group relative rounded-[28px] p-[2px] transition-transform duration-300 ease-out hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 220deg, rgba(139,92,246,.32), rgba(232,121,249,.14), rgba(243,211,138,.10), rgba(255,255,255,0), rgba(139,92,246,.32));
                                box-shadow: 0 30px 90px -40px rgba(0,0,0,.18);">

                        <div class="relative h-full overflow-hidden rounded-[26px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">

                            <div class="relative aspect-[16/10] w-full overflow-hidden">
                                <img src="{{ asset('home/serv/'.$service->photo) }}"
                                     alt="{{ $service->title }}"
                                     class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.04]" />

                                <span class="absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                                      style="background:
                                        radial-gradient(800px 320px at 20% -10%, rgba(139,92,246,.22), transparent 60%),
                                        radial-gradient(900px 360px at 120% 10%, rgba(243,211,138,.18), transparent 60%);"></span>

                                <span class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/30 to-transparent sm:hidden"></span>
                            </div>

                            <div class="relative p-7 sm:p-8">
                                <div class="flex items-start gap-4">
                                    <span class="grid h-12 w-12 place-items-center rounded-xl"
                                          style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                            <path d="M3 3v18h18M7 15l4-4 3 3 5-6"/>
                                        </svg>
                                    </span>

                                    <div class="min-w-0">
                                        <h3 class="truncate text-lg font-extrabold sm:text-xl" style="color: var(--ink);">
                                            <a href="{{ route('service.details',['id'=>$service->id]) }}" class="hover:opacity-90">
                                                {{ $service->title }}
                                            </a>
                                        </h3>

                                        <p class="mt-2 line-clamp-3 text-sm leading-relaxed" style="color: var(--ink-soft);">
                                            {{ $service->short }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-between">
                                    <a href="{{ route('service.details',['id'=>$service->id]) }}"
                                       class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-semibold text-white shadow hover:brightness-105 focus:outline-none"
                                       style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                        Read More
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                        </svg>
                                    </a>

                                    <span class="h-2 w-2 rounded-full transition-shadow"
                                          style="background: rgba(232,121,249,.70);"
                                          onmouseover="this.style.boxShadow='0 0 24px 6px rgba(232,121,249,.35)'"
                                          onmouseout="this.style.boxShadow='none'"></span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- PRICING --}}
    <section id="pricing" class="relative isolate overflow-hidden py-20" style="background: var(--bg);">

        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[28rem] w-[28rem] rounded-full bg-violet-500/12 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                    Pricing
                </span>

                <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                    Featured Plans
                </h2>

                <p class="mt-3 text-sm" style="color: var(--ink-soft);">
                    Choose a plan that matches your timeline and target returns.
                </p>
            </div>

            @inject('option','App\Defaults\Custom')
            @php
                $two = ($packages instanceof \Illuminate\Support\Collection) ? $packages->take(4) : collect($packages)->take(4);
            @endphp

            <div class="mt-12 grid gap-8 md:grid-cols-2">
                @foreach($two as $package)
                    <article class="group relative overflow-hidden rounded-[28px] p-[2px] transition-all duration-300 hover:-translate-y-1"
                             style="background:
                                conic-gradient(from 220deg, rgba(139,92,246,.30), rgba(232,121,249,.14), rgba(243,211,138,.10), rgba(255,255,255,0), rgba(139,92,246,.30));
                                box-shadow: 0 28px 80px -36px rgba(0,0,0,.16);">

                        <div class="relative overflow-hidden rounded-[26px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">
                            <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(255,255,255,.02), transparent, rgba(20,10,35,.06));"></div>
                            <span class="pointer-events-none absolute -left-1/2 top-0 h-full w-[60%] rotate-12 opacity-0 blur-xl transition-opacity duration-500 group-hover:opacity-100"
                                  style="background: rgba(255,255,255,.06);"></span>

                            <div class="relative flex min-h-[560px] flex-col p-8 text-[var(--ink)] sm:p-10">
                                <p class="text-center text-sm font-extrabold tracking-wide" style="color: var(--ink-soft);">
                                    {{ $package->name }}
                                </p>

                                <div class="mt-5 text-center">
                                    <div class="text-[36px] font-extrabold tracking-tight sm:text-[44px]" style="color: var(--ink);">
                                        ${{ number_format($package->minAmount, 0) }}
                                        <span class="align-super text-[18px]" style="color: var(--brand-2);">
                                            / {{ number_format($package->roi * $package->numberOfReturns) }}% est.
                                        </span>
                                    </div>

                                    <p class="mt-2 text-xl font-semibold sm:text-2xl" style="color: var(--ink-soft);">
                                        After {{ $package->Duration }}
                                    </p>

                                    @if(!empty($package->note))
                                        <p class="mt-2 text-xs" style="color: var(--muted);">{{ $package->note }}</p>
                                    @endif
                                </div>

                                <ul class="mx-auto mt-8 space-y-4 text-left text-base/relaxed" style="color: var(--ink-soft);">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Minimum: ${{ number_format($package->minAmount, 0) }}
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Maximum:
                                        @if($package->isUnlimited != 1)
                                            ${{ number_format($package->maxAmount, 0) }}
                                        @else
                                            Unlimited
                                        @endif
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Duration: {{ $package->Duration }}
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Referral Bonus: {{ $package->referral . '%' }}
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Priority support & review
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Market updates & insights
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
                                        Fast withdrawals (policy-based)
                                    </li>
                                </ul>

                                <div class="mt-8 flex-1"></div>

                                <div class="pt-4 text-center">
                                    <a href="{{ route('register') }}"
                                       class="inline-flex items-center justify-center rounded-full px-6 py-3 text-sm font-extrabold text-white shadow hover:brightness-105 focus:outline-none"
                                       style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                        Get Started
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">
                <a href="{{ url('plans') }}"
                   class="inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-sm font-extrabold backdrop-blur"
                   style="color: var(--ink); background: var(--surface); border: 1px solid var(--line);">
                    See all plans
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                    </svg>
                </a>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- TESTIMONIALS --}}
    <section id="testimonials"
             x-data="testimonialCarousel()"
             x-init="init()"
             class="relative isolate overflow-hidden py-28"
             style="background: var(--bg);">

        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-16 left-1/2 h-[26rem] w-[70%] -translate-x-1/2 blur-3xl bg-[radial-gradient(closest-side,rgba(139,92,246,.16),transparent_70%)]"></div>
        <div class="pointer-events-none absolute -bottom-20 -right-24 h-[30rem] w-[30rem] blur-3xl bg-[radial-gradient(closest-side,rgba(243,211,138,.12),transparent_70%)]"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                    Testimonials
                </span>

                <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                    What Clients Say <br class="hidden sm:block"/>After Working With Us
                </h2>

                <p class="mt-3 text-sm" style="color: var(--ink-soft);">
                    Real feedback from investors who value clarity, consistency, and accountability.
                </p>
            </div>

            <div class="relative mt-12">
                <div x-ref="viewport"
                     class="no-scrollbar overflow-x-auto snap-x snap-mandatory scroll-smooth">
                    <ul class="grid grid-flow-col auto-cols-[92%] gap-6 sm:auto-cols-[70%] md:auto-cols-[48%] lg:auto-cols-[32%]">

                        <li class="snap-start">
                            <article class="relative rounded-[28px] p-[2px]"
                                     style="background:
                                        conic-gradient(from 210deg, rgba(139,92,246,.30), rgba(232,121,249,.14), rgba(243,211,138,.10), rgba(255,255,255,0), rgba(139,92,246,.30));
                                        box-shadow: 0 24px 70px -30px rgba(0,0,0,.16);">
                                <div class="h-full rounded-[26px] p-6 sm:p-7 backdrop-blur"
                                     style="background: var(--surface); border: 1px solid var(--line);">
                                    <div class="flex items-center gap-4">
                                        <img class="h-14 w-14 rounded-full"
                                             style="border: 2px solid rgba(139,92,246,.18);"
                                             src="https://ui-avatars.com/api/?name=Aisha+Okafor&background=4c1d95&color=ffffff"
                                             alt="Aisha Okafor">
                                        <div>
                                            <h3 class="text-base font-extrabold sm:text-lg" style="color: var(--ink);">Aisha Okafor</h3>
                                            <span class="text-xs sm:text-sm" style="color: var(--ink-soft);">SME Owner</span>
                                        </div>
                                        <div class="ml-auto flex">
                                            @for($i=1;$i<=5;$i++)
                                                <svg class="h-4 w-4" style="color: var(--accent);" viewBox="0 0 20 20" fill="currentColor"><path d="M10 15l-5.878 3.09L5.64 12 1 7.91l6.06-.88L10 1l2.94 6.03 6.06.88L14.36 12l1.518 6.09z"/></svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mt-4 text-[15px] leading-7" style="color: var(--ink-soft);">
                                        “{{ $siteName }} made investing feel simple. Clear updates, disciplined entries, and a plan that actually matches my timeline.”
                                    </p>
                                </div>
                            </article>
                        </li>

                        <li class="snap-start">
                            <article class="relative rounded-[28px] p-[2px]"
                                     style="background:
                                        conic-gradient(from 210deg, rgba(243,211,138,.22), rgba(139,92,246,.16), rgba(232,121,249,.10), rgba(255,255,255,0), rgba(243,211,138,.22));
                                        box-shadow: 0 24px 70px -30px rgba(0,0,0,.16);">
                                <div class="h-full rounded-[26px] p-6 sm:p-7 backdrop-blur"
                                     style="background: var(--surface); border: 1px solid var(--line);">
                                    <div class="flex items-center gap-4">
                                        <img class="h-14 w-14 rounded-full"
                                             style="border: 2px solid rgba(139,92,246,.18);"
                                             src="https://ui-avatars.com/api/?name=Daniel+Mensah&background=4c1d95&color=ffffff"
                                             alt="Daniel Mensah">
                                        <div>
                                            <h3 class="text-base font-extrabold sm:text-lg" style="color: var(--ink);">Daniel Mensah</h3>
                                            <span class="text-xs sm:text-sm" style="color: var(--ink-soft);">Business Consultant</span>
                                        </div>
                                        <div class="ml-auto flex">
                                            @for($i=1;$i<=4;$i++)
                                                <svg class="h-4 w-4" style="color: var(--accent);" viewBox="0 0 20 20" fill="currentColor"><path d="M10 15l-5.878 3.09L5.64 12 1 7.91l6.06-.88L10 1l2.94 6.03 6.06.88L14.36 12l1.518 6.09z"/></svg>
                                            @endfor
                                            <svg class="h-4 w-4 opacity-30" style="color: var(--accent);" viewBox="0 0 20 20" fill="currentColor"><path d="M10 15l-5.878 3.09L5.64 12 1 7.91l6.06-.88L10 1l2.94 6.03 6.06.88L14.36 12l1.518 6.09z"/></svg>
                                        </div>
                                    </div>
                                    <p class="mt-4 text-[15px] leading-7" style="color: var(--ink-soft);">
                                        “Professional, responsive, and transparent. I always know what we’re doing, why we’re doing it, and what success looks like.”
                                    </p>
                                </div>
                            </article>
                        </li>

                        <li class="snap-start">
                            <article class="relative rounded-[28px] p-[2px]"
                                     style="background:
                                        conic-gradient(from 210deg, rgba(232,121,249,.22), rgba(139,92,246,.18), rgba(243,211,138,.10), rgba(255,255,255,0), rgba(232,121,249,.22));
                                        box-shadow: 0 24px 70px -30px rgba(0,0,0,.16);">
                                <div class="h-full rounded-[26px] p-6 sm:p-7 backdrop-blur"
                                     style="background: var(--surface); border: 1px solid var(--line);">
                                    <div class="flex items-center gap-4">
                                        <img class="h-14 w-14 rounded-full"
                                             style="border: 2px solid rgba(139,92,246,.18);"
                                             src="https://ui-avatars.com/api/?name=Grace+Ibrahim&background=4c1d95&color=ffffff"
                                             alt="Grace Ibrahim">
                                        <div>
                                            <h3 class="text-base font-extrabold sm:text-lg" style="color: var(--ink);">Grace Ibrahim</h3>
                                            <span class="text-xs sm:text-sm" style="color: var(--ink-soft);">HR Director</span>
                                        </div>
                                        <div class="ml-auto flex">
                                            @for($i=1;$i<=5;$i++)
                                                <svg class="h-4 w-4" style="color: var(--accent);" viewBox="0 0 20 20" fill="currentColor"><path d="M10 15l-5.878 3.09L5.64 12 1 7.91l6.06-.88L10 1l2.94 6.03 6.06.88L14.36 12l1.518 6.09z"/></svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mt-4 text-[15px] leading-7" style="color: var(--ink-soft);">
                                        “The guidance is disciplined, not hype. My portfolio finally feels structured — and I sleep better at night.”
                                    </p>
                                </div>
                            </article>
                        </li>
                    </ul>
                </div>

                <button @click="prev"
                        type="button"
                        class="absolute -left-3 top-1/2 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full shadow md:flex"
                        style="background: color-mix(in srgb, var(--surface-solid) 72%, transparent); color: var(--ink); border: 1px solid var(--line);">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>

                <button @click="next"
                        type="button"
                        class="absolute -right-3 top-1/2 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full shadow md:flex"
                        style="background: color-mix(in srgb, var(--surface-solid) 72%, transparent); color: var(--ink); border: 1px solid var(--line);">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M9 6l6 6-6 6"/>
                    </svg>
                </button>

                <div class="mt-8 flex justify-center gap-2">
                    <template x-for="(d, i) in dots" :key="i">
                        <button @click="go(i)"
                                type="button"
                                class="h-2 w-2 rounded-full transition-all"
                                :style="index===i ? 'width:1.5rem; opacity:1; background: var(--brand-2);' : 'opacity:.4; background: color-mix(in srgb, var(--ink-soft) 40%, transparent);'"></button>
                    </template>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- WHY CHOOSE US --}}
    <section x-data="chooseUs()" class="relative isolate overflow-hidden" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="absolute inset-0 -z-10">
            <div class="h-full w-full bg-cover bg-center opacity-[.14] md:bg-fixed"
                 style="background-image:url('{{ asset('home/images/background/chooseus-bg-2.jpg') }}')"></div>
            <div class="absolute inset-0" style="background: linear-gradient(to bottom right, var(--bg), color-mix(in srgb, var(--bg) 90%, transparent), var(--bg));"></div>
            <div class="absolute inset-0" style="background: linear-gradient(to top right, rgba(139,92,246,.10), transparent, rgba(243,211,138,.10)); mix-blend-mode: screen;"></div>
        </div>

        <div class="pointer-events-none absolute -left-28 top-10 h-[26rem] w-[26rem] blur-3xl bg-[radial-gradient(closest-side,rgba(139,92,246,.14),transparent_70%)]"></div>
        <div class="pointer-events-none absolute -right-24 bottom-10 h-[28rem] w-[28rem] blur-3xl bg-[radial-gradient(closest-side,rgba(243,211,138,.12),transparent_70%)]"></div>

        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8 lg:py-32">
            <div class="grid lg:grid-cols-12">
                <div class="col-span-12 lg:col-span-6 lg:col-start-7">
                    <div class="relative rounded-[28px] p-[2px] shadow-[0_30px_90px_-45px_rgba(0,0,0,.18)]"
                         style="background:
                            conic-gradient(from 220deg, rgba(139,92,246,.28), rgba(232,121,249,.14), rgba(243,211,138,.10), rgba(255,255,255,0), rgba(139,92,246,.28));">
                        <div class="rounded-[26px] p-6 backdrop-blur sm:p-8"
                             style="background: color-mix(in srgb, var(--surface) 100%, transparent); border: 1px solid var(--line);">
                            <div class="mb-6">
                                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                                    Why Choose {{ $siteName }}
                                </span>

                                <h2 class="mt-4 text-3xl font-extrabold leading-tight sm:text-4xl" style="color: var(--ink);">
                                    Why Investors Stay With Us
                                </h2>

                                <p class="mt-2 text-sm" style="color: var(--ink-soft);">
                                    Clear process, consistent updates, and a disciplined approach to risk.
                                </p>
                            </div>

                            <ul class="space-y-4" role="list">
                                <li class="group">
                                    <div class="rounded-2xl p-[1px]" style="background: linear-gradient(135deg, rgba(139,92,246,.80), rgba(243,211,138,.60));">
                                        <div class="rounded-2xl backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                                            <button
                                                @click="toggle(0)" :aria-expanded="isOpen(0)"
                                                type="button"
                                                class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left">
                                                <div class="flex items-center gap-3">
                                                    <span class="grid h-10 w-10 place-items-center rounded-xl"
                                                          style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                                        <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                            <path d="M3 12h7l3-3 5 5M21 12v7H3v-2"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="text-lg font-extrabold" style="color: var(--ink);">Fast, Clear Communication</h3>
                                                </div>
                                                <svg class="h-5 w-5 transition-transform"
                                                     :class="isOpen(0) ? 'rotate-90' : ''" style="color: var(--ink-soft);" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M7.05 4.55a.75.75 0 0 1 1.06 0l5 5a.75.75 0 1 1-1.06 1.06L8.56 6.62v7.69a.75.75 0 0 1-1.5 0V4.55z"/>
                                                </svg>
                                            </button>

                                            <div class="px-5 pb-5 -mt-1 overflow-hidden transition-[max-height] duration-500"
                                                 x-ref="p0"
                                                 x-bind:style="isOpen(0) ? 'max-height:'+ $refs.p0.scrollHeight + 'px' : 'max-height:0px'">
                                                <p class="text-sm leading-relaxed" style="color: var(--ink-soft);">
                                                    We keep you informed with clear updates, next steps, and timely responses — especially when markets move.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="group">
                                    <div class="rounded-2xl p-[1px]" style="background: linear-gradient(135deg, rgba(232,121,249,.70), rgba(139,92,246,.50));">
                                        <div class="rounded-2xl backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                                            <button
                                                @click="toggle(1)" :aria-expanded="isOpen(1)"
                                                type="button"
                                                class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left">
                                                <div class="flex items-center gap-3">
                                                    <span class="grid h-10 w-10 place-items-center rounded-xl"
                                                          style="background: rgba(243,211,138,.08); border: 1px solid var(--line);">
                                                        <svg class="h-5 w-5" style="color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                            <path d="M12 3l7 4v10c0 4-3 7-7 7s-7-3-7-7V7l7-4z"></path>
                                                            <path d="M9.5 12.5l2 2 3-3"></path>
                                                        </svg>
                                                    </span>
                                                    <h3 class="text-lg font-extrabold" style="color: var(--ink);">Disciplined Risk Controls</h3>
                                                </div>
                                                <svg class="h-5 w-5 transition-transform"
                                                     :class="isOpen(1) ? 'rotate-90' : ''" style="color: var(--ink-soft);" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M7.05 4.55a.75.75 0 0 1 1.06 0l5 5a.75.75 0 1 1-1.06 1.06L8.56 6.62v7.69a.75.75 0 0 1-1.5 0V4.55z"/>
                                                </svg>
                                            </button>

                                            <div class="px-5 pb-5 -mt-1 overflow-hidden transition-[max-height] duration-500"
                                                 x-ref="p1"
                                                 x-bind:style="isOpen(1) ? 'max-height:'+ $refs.p1.scrollHeight + 'px' : 'max-height:0px'">
                                                <p class="text-sm leading-relaxed" style="color: var(--ink-soft);">
                                                    We focus on capital preservation first — with position sizing, diversification, and clear exit rules.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="group">
                                    <div class="rounded-2xl p-[1px]" style="background: linear-gradient(135deg, rgba(243,211,138,.50), rgba(139,92,246,.40));">
                                        <div class="rounded-2xl backdrop-blur" style="background: var(--surface); border: 1px solid var(--line);">
                                            <button
                                                @click="toggle(2)" :aria-expanded="isOpen(2)"
                                                type="button"
                                                class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left">
                                                <div class="flex items-center gap-3">
                                                    <span class="grid h-10 w-10 place-items-center rounded-xl"
                                                          style="background: rgba(139,92,246,.10); border: 1px solid var(--line);">
                                                        <svg class="h-5 w-5" style="color: var(--brand);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                            <path d="M4 6h16M4 12h16M4 18h10"></path>
                                                        </svg>
                                                    </span>
                                                    <h3 class="text-lg font-extrabold" style="color: var(--ink);">Flexible Options by Timeline</h3>
                                                </div>
                                                <svg class="h-5 w-5 transition-transform"
                                                     :class="isOpen(2) ? 'rotate-90' : ''" style="color: var(--ink-soft);" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M7.05 4.55a.75.75 0 0 1 1.06 0l5 5a.75.75 0 1 1-1.06 1.06L8.56 6.62v7.69a.75.75 0 0 1-1.5 0V4.55z"/>
                                                </svg>
                                            </button>

                                            <div class="px-5 pb-5 -mt-1 overflow-hidden transition-[max-height] duration-500"
                                                 x-ref="p2"
                                                 x-bind:style="isOpen(2) ? 'max-height:'+ $refs.p2.scrollHeight + 'px' : 'max-height:0px'">
                                                <p class="text-sm leading-relaxed" style="color: var(--ink-soft);">
                                                    From short-term opportunities to long-term wealth building — we align strategy to your capital, goal, and horizon.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- NEWS --}}
    <section id="news" class="relative isolate overflow-hidden py-20" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-24 -left-24 h-[28rem] w-[28rem] rounded-full blur-3xl bg-violet-500/10"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[30rem] w-[30rem] rounded-full blur-3xl bg-fuchsia-400/10"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    <span class="h-2 w-2 rounded-full bg-white/80"></span>
                    Market Updates
                </span>

                <h2 class="mt-4 text-3xl font-extrabold sm:text-4xl" style="color: var(--ink);">
                    Latest Insights From {{ $siteName }}
                </h2>

                <p class="mt-2 text-sm" style="color: var(--ink-soft);">
                    Daily market pulse — clean, premium, and easy to scan.
                </p>
            </div>

            <div class="mt-10 rounded-[28px] p-[2px]"
                 style="background:
                    conic-gradient(from 220deg, rgba(139,92,246,.30), rgba(232,121,249,.14), rgba(243,211,138,.10), rgba(255,255,255,0), rgba(139,92,246,.30));
                    box-shadow: 0 28px 90px -40px rgba(0,0,0,.18);">
                <div class="rounded-[26px] p-3 backdrop-blur sm:p-4"
                     style="background: var(--surface); border: 1px solid var(--line);">
                    <div id="tv-timeline" class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>

                        <div class="tradingview-widget-copyright mt-2 text-xs" style="color: var(--muted);">
                            <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"
                               class="font-semibold"
                               style="color: var(--brand-2);">
                                Explore markets on TradingView
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z"
                  fill="var(--bg)"></path>
        </svg>
    </section>

@endsection

@push('css')
    <style>
        .no-scrollbar::-webkit-scrollbar{ display:none }
        .no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }
    </style>
@endpush

@push('js')
    <script>
        function testimonialCarousel(){
            return {
                index: 0,
                pages: 1,
                dots: [],
                timer: null,

                init(){
                    const vp = this.$refs.viewport;
                    if(!vp) return;

                    const calcPages = () => {
                        this.pages = Math.max(1, Math.ceil(vp.scrollWidth / vp.clientWidth));
                        this.dots  = Array.from({ length: this.pages });
                        this.index = Math.round(vp.scrollLeft / vp.clientWidth);
                    };

                    calcPages();

                    let rAF;
                    window.addEventListener('resize', () => {
                        cancelAnimationFrame(rAF);
                        rAF = requestAnimationFrame(() => {
                            const prev = this.index;
                            calcPages();
                            this.go(Math.min(prev, this.pages - 1));
                        });
                    });

                    vp.addEventListener('scroll', () => {
                        this.index = Math.round(vp.scrollLeft / vp.clientWidth);
                    });

                    const start = () => this.timer = setInterval(() => this.next(), 5000);
                    const stop  = () => { if (this.timer) clearInterval(this.timer) };

                    start();
                    vp.addEventListener('mouseenter', stop);
                    vp.addEventListener('mouseleave', start);
                },

                next(){
                    const vp = this.$refs.viewport;
                    if(!vp) return;

                    if (this.index >= this.pages - 1) {
                        vp.scrollTo({ left: 0, behavior: 'auto' });
                        this.index = 0;
                    } else {
                        vp.scrollBy({ left: vp.clientWidth, behavior: 'smooth' });
                    }
                },

                prev(){
                    const vp = this.$refs.viewport;
                    if(!vp) return;

                    if (this.index <= 0) {
                        const last = (this.pages - 1) * vp.clientWidth;
                        vp.scrollTo({ left: last, behavior: 'auto' });
                        this.index = this.pages - 1;
                    } else {
                        vp.scrollBy({ left: -vp.clientWidth, behavior: 'smooth' });
                    }
                },

                go(i){
                    const vp = this.$refs.viewport;
                    if(!vp) return;

                    this.index = Math.max(0, Math.min(i, this.pages - 1));
                    vp.scrollTo({ left: this.index * vp.clientWidth, behavior: 'smooth' });
                }
            }
        }

        function chooseUs(){
            return {
                active: 0,
                toggle(i){ this.active = (this.active === i) ? -1 : i },
                isOpen(i){ return this.active === i }
            }
        }

        function renderTV(){
            const mount = document.querySelector('#tv-timeline .tradingview-widget-container__widget');
            if(!mount) return;

            mount.innerHTML = '';

            const scr = document.createElement('script');
            scr.src = 'https://s3.tradingview.com/external-embedding/embed-widget-timeline.js';
            scr.async = true;

            const isDark = document.documentElement.classList.contains('dark');

            scr.innerHTML = JSON.stringify({
                feedMode: "market",
                market: "stock",
                isTransparent: true,
                displayMode: "regular",
                width: "100%",
                height: "420",
                colorTheme: isDark ? "dark" : "light",
                locale: "en"
            });

            mount.appendChild(scr);
        }

        (function initTV(){
            renderTV();

            const mo = new MutationObserver(() => {
                clearTimeout(window.__tv_rerender);
                window.__tv_rerender = setTimeout(() => renderTV(), 150);
            });

            mo.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        })();
    </script>
@endpush
