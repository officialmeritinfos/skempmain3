@extends('layouts.marketing')

@section('title', config('app.name') . ' | Wealth, Asset & Investment Management')
@section('meta_description', 'Build, preserve and manage wealth through disciplined investment strategy, asset stewardship and long-term capital planning.')

@php
    $coreServices = collect($services ?? [])
        ->reject(fn ($service) => (int) data_get($service, 'isSector', 2) === 1)
        ->take(6)
        ->values();

    $featuredSectors = collect($sectors ?? [])->take(4)->values();

    $featuredPlans = collect($packages ?? [])
        ->reject(fn ($package) => (bool) data_get($package, 'isCannabis', false))
        ->take(3)
        ->values();

    $aboutCopy = trim(strip_tags((string) ($web?->description ?? '')));
@endphp

@inject('option', 'App\\Defaults\\Custom')

@section('content')
    <section class="relative isolate overflow-hidden bg-[#040813] text-white">
        <div class="absolute inset-0 -z-40">
            <img src="{{ asset('home/images/banner/building1.jpg') }}" alt="" class="hero-slide-image is-active h-full w-full object-cover" fetchpriority="high">
        </div>
        <div class="hero-vignette absolute inset-0 -z-30"></div>
        <div class="hero-noise absolute inset-0 -z-20 opacity-40"></div>
        <div class="mesh-grid absolute inset-0 -z-10 opacity-55"></div>
        <div class="glow-orb glow-orb-top"></div>
        <div class="glow-orb glow-orb-right"></div>
        <div class="glow-orb glow-orb-bottom"></div>

        <div class="relative mx-auto max-w-7xl px-4 pb-24 pt-20 sm:px-6 sm:pb-28 sm:pt-24 lg:px-8 lg:pb-32 lg:pt-28">
            <div class="grid items-center gap-14 lg:grid-cols-[1.06fr_.94fr] xl:gap-16">
                <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
                    <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 shadow-[0_0_25px_rgba(34,211,238,.15)] backdrop-blur-xl">
                        <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>
                        Wealth · Assets · Investment Management
                    </span>

                    <h1 class="mt-8 max-w-4xl font-display text-5xl font-bold leading-[0.94] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl xl:text-[5.25rem]">
                        Build wealth with <span class="aurora-text">intention.</span> Manage capital with intelligence.
                    </h1>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/70 sm:text-lg">
                        {{ config('app.name') }} brings investment strategy, wealth planning and asset stewardship into one connected approach—so your capital can pursue growth without losing sight of risk, liquidity and long-term purpose.
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ url('/contact') }}" class="glow-button-primary group inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">
                            Start a conversation
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <a href="{{ url('/plans') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-xl transition duration-300 hover:-translate-y-0.5 hover:border-cyan-300/30 hover:bg-white/10">
                            Explore investment plans
                        </a>
                    </div>

                    <div class="mt-10 grid gap-4 sm:grid-cols-3">
                        @foreach([
                            ['Strategy first', 'Every allocation starts with the wider objective.'],
                            ['Risk in context', 'Growth is considered alongside preservation and liquidity.'],
                            ['Long-term view', 'Decisions stay connected to what your capital is meant to achieve.'],
                        ] as $signal)
                            <div class="glass-panel rounded-2xl px-4 py-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">{{ $signal[0] }}</p>
                                <p class="mt-2 text-sm leading-6 text-white/70">{{ $signal[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-scale relative">
                    <div class="glass-panel glow-border rounded-[2rem] p-5 sm:p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200/80">A connected wealth view</p>
                                <h2 class="mt-3 font-display text-2xl font-semibold text-white sm:text-3xl">One strategy. Four disciplines working together.</h2>
                            </div>
                            <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/8 text-cyan-200 shadow-[0_0_18px_rgba(34,211,238,.15)]">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 18h16M7 15l3-4 3 2 4-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>

                        <div class="mt-7 grid gap-4 sm:grid-cols-2">
                            @foreach([
                                ['01', 'Growth', 'Identify opportunities that fit the objective and time horizon.'],
                                ['02', 'Preservation', 'Keep downside, concentration and capital resilience in view.'],
                                ['03', 'Liquidity', 'Balance investment ambition with access to capital when needed.'],
                                ['04', 'Stewardship', 'Review decisions as markets, needs and priorities evolve.'],
                            ] as $pillar)
                                <div class="rounded-[1.4rem] border border-white/10 bg-slate-950/35 p-5 transition duration-300 hover:border-cyan-300/25 hover:bg-white/7">
                                    <div class="flex items-center justify-between gap-4">
                                        <span class="text-[10px] font-bold tracking-[0.18em] text-fuchsia-200/80">{{ $pillar[0] }}</span>
                                        <span class="h-1.5 w-1.5 rounded-full bg-cyan-300 shadow-[0_0_10px_rgba(103,232,249,.8)]"></span>
                                    </div>
                                    <h3 class="mt-5 text-base font-semibold text-white">{{ $pillar[1] }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-white/58">{{ $pillar[2] }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5 flex flex-wrap items-center justify-between gap-4 rounded-[1.4rem] border border-white/10 bg-white/6 px-5 py-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">Available to explore</p>
                                <p class="mt-1 text-sm font-semibold text-white">{{ collect($packages ?? [])->count() }} investment plans · {{ collect($services ?? [])->count() }} services</p>
                            </div>
                            <a href="{{ url('/services') }}" class="text-sm font-semibold text-cyan-200 transition hover:text-white">View services →</a>
                        </div>
                    </div>

                    <div class="floating-card absolute -left-6 bottom-10 hidden rounded-2xl border border-cyan-300/20 bg-cyan-300/10 px-4 py-3 text-sm text-cyan-100 shadow-[0_0_26px_rgba(34,211,238,.22)] backdrop-blur-xl lg:block">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">Designed around you</p>
                        <p class="mt-1 font-semibold">Objective before product.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative z-10 -mt-12 px-4 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-4 lg:grid-cols-4">
            @foreach([
                ['Investment plans', str_pad((string) $featuredPlans->count(), 2, '0', STR_PAD_LEFT), 'Featured opportunities on this page'],
                ['Service capabilities', str_pad((string) $coreServices->count(), 2, '0', STR_PAD_LEFT), 'Core areas presented on this page'],
                ['Sector opportunities', str_pad((string) $featuredSectors->count(), 2, '0', STR_PAD_LEFT), 'Featured sectors where available'],
                ['Our approach', 'ONE', 'One connected view of capital'],
            ] as $stat)
                <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.6rem] p-5 shadow-[0_24px_60px_rgba(4,12,24,.25)]">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">{{ $stat[0] }}</p>
                    <p class="mt-3 font-display text-4xl font-bold text-white">{{ $stat[1] }}</p>
                    <p class="mt-2 text-xs leading-5 text-white/48">{{ $stat[2] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section id="about" class="relative overflow-hidden bg-[#07111e] py-24 text-white sm:py-28">
        <div class="glow-orb glow-orb-left-middle"></div>
        <div class="mx-auto grid max-w-7xl gap-14 px-4 sm:px-6 lg:grid-cols-[.95fr_1.05fr] lg:items-center lg:gap-16 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale relative min-h-[500px]">
                <div class="absolute left-0 top-0 h-[78%] w-[76%] overflow-hidden rounded-[2rem] border border-white/10 bg-slate-950/35 shadow-[0_24px_60px_rgba(0,0,0,.32)]">
                    <img src="{{ asset('home/images/banner/banner-6.jpg') }}" alt="Long-term wealth management" class="story-image h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#050816]/75 via-[#050816]/15 to-transparent"></div>
                </div>
                <div class="absolute bottom-0 right-0 w-[58%] rounded-[1.6rem] border border-white/10 bg-white/8 p-5 shadow-2xl backdrop-blur-2xl">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">Our perspective</p>
                    <p class="mt-3 font-display text-xl font-semibold leading-snug text-white">Good wealth management connects today’s decisions to tomorrow’s choices.</p>
                </div>
            </div>

            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-cyan-200/80">About {{ config('app.name') }}</p>
                <h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-[1.02] tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">
                    More than returns. A strategy for what your wealth should do.
                </h2>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/70 sm:text-lg">
                    @if($aboutCopy !== '')
                        {{ \Illuminate\Support\Str::limit($aboutCopy, 330) }}
                    @else
                        {{ config('app.name') }} is a wealth, asset and investment management company focused on helping clients make thoughtful decisions about capital—how it is allocated, how risk is understood and how wealth is stewarded over time.
                    @endif
                </p>
                <p class="mt-5 max-w-2xl text-base leading-8 text-white/60">
                    We begin with the purpose behind the capital, then bring investment options, asset allocation and ongoing review into a clearer framework around the client’s wider financial picture.
                </p>
                <a href="{{ url('/about') }}" class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-cyan-200 transition hover:text-white">Learn more about us →</a>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-[#030712] py-24 text-white sm:py-28">
        <div class="mesh-grid absolute inset-0 opacity-40"></div>
        <div class="glow-orb glow-orb-service"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[.75fr_1.25fr] lg:items-end">
                <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-fuchsia-200/80">What we do</p>
                    <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">One view of your capital. Not disconnected decisions.</h2>
                </div>
                <p x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-2xl text-base leading-8 text-white/65 lg:justify-self-end">
                    Investment choices work better when they are connected to the broader objective. Our services bring strategy, opportunity and stewardship into one relationship.
                </p>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                @forelse($coreServices as $service)
                    <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card group rounded-[1.8rem] border border-white/10 bg-white/[0.05] p-6 shadow-[0_20px_50px_rgba(0,0,0,.24)] backdrop-blur-xl transition duration-300 hover:-translate-y-1.5 hover:border-cyan-300/25" style="--reveal-delay: {{ ($loop->index % 6) * 70 }}ms">
                        <div class="flex items-start justify-between gap-4">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/8 text-cyan-200">0{{ $loop->iteration }}</span>
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/12 bg-white/8 text-cyan-200 transition group-hover:translate-x-0.5 group-hover:-translate-y-0.5">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        <h3 class="mt-8 font-display text-2xl font-semibold text-white">{{ $service->title }}</h3>
                        <p class="mt-4 text-sm leading-7 text-white/62">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) (data_get($service, 'short') ?: data_get($service, 'content', '')))), 135) }}</p>
                    </a>
                @empty
                    @foreach([
                        ['Investment management', 'A structured approach to opportunity selection, capital allocation and review.'],
                        ['Wealth strategy', 'Connect investment decisions to longer-term financial goals and priorities.'],
                        ['Asset stewardship', 'Keep preservation, concentration, liquidity and growth in one view.'],
                    ] as $fallback)
                        <div class="premium-card rounded-[1.8rem] border border-white/10 bg-white/[0.05] p-6 backdrop-blur-xl">
                            <span class="text-[10px] font-bold tracking-[0.18em] text-cyan-200/75">0{{ $loop->iteration }}</span>
                            <h3 class="mt-8 font-display text-2xl font-semibold text-white">{{ $fallback[0] }}</h3>
                            <p class="mt-4 text-sm leading-7 text-white/62">{{ $fallback[1] }}</p>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    <section id="approach" class="bg-[#07111e] py-24 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-cyan-200/80">Our approach</p>
                <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">Clarity first. Then strategy. Then execution.</h2>
            </div>

            <div class="mt-12 grid gap-5 lg:grid-cols-4">
                @foreach([
                    ['01', 'Understand', 'Define the objective, time horizon, liquidity needs and what risk means in your situation.'],
                    ['02', 'Structure', 'Shape the strategy around the role each part of the capital needs to play.'],
                    ['03', 'Allocate', 'Select the plan, service or opportunity that best fits the agreed framework.'],
                    ['04', 'Review', 'Revisit the strategy as markets, priorities and circumstances change.'],
                ] as $step)
                    <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up step-card relative rounded-[1.75rem] border border-white/10 bg-white/[0.045] p-6 backdrop-blur-xl" style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms">
                        <span class="inline-flex rounded-full border border-cyan-300/20 bg-cyan-300/10 px-3 py-1 text-[10px] font-bold tracking-[0.18em] text-cyan-200">{{ $step[0] }}</span>
                        <h3 class="mt-10 font-display text-2xl font-semibold text-white">{{ $step[1] }}</h3>
                        <p class="mt-4 text-sm leading-7 text-white/62">{{ $step[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($featuredSectors->isNotEmpty())
        <section class="bg-[#040914] py-24 text-white sm:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                    <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
                        <p class="text-xs font-bold uppercase tracking-[0.24em] text-fuchsia-200/80">Sector opportunities</p>
                        <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.04em] text-white sm:text-5xl">Explore opportunities through the sectors we cover.</h2>
                    </div>
                    <a href="{{ url('/services') }}" class="text-sm font-semibold text-cyan-200 transition hover:text-white">View all services →</a>
                </div>

                <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    @foreach($featuredSectors as $sector)
                        <a href="{{ route('service.details', ['id' => $sector->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel group rounded-[1.65rem] p-5 transition duration-300 hover:-translate-y-1 hover:border-fuchsia-300/25" style="--reveal-delay: {{ ($loop->iteration - 1) * 70 }}ms">
                            <div class="flex items-center justify-between gap-3">
                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/8 text-fuchsia-200">0{{ $loop->iteration }}</span>
                                <span class="text-cyan-200 transition group-hover:translate-x-0.5">↗</span>
                            </div>
                            <h3 class="mt-8 font-display text-2xl font-semibold text-white">{{ $sector->title }}</h3>
                            <p class="mt-3 text-sm leading-7 text-white/60">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) (data_get($sector, 'short') ?: data_get($sector, 'content', '')))), 125) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section id="plans-preview" class="relative overflow-hidden bg-[#030712] py-24 text-white sm:py-28">
        <div class="glow-orb glow-orb-plans"></div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr] lg:gap-16">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-cyan-200/80">Investment plans</p>
                    <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">Explore published plans with the key terms in view.</h2>
                    <p class="mt-5 text-base leading-8 text-white/65">Compare the configured plan structure, minimum funding level, duration and return schedule before viewing the full plan details.</p>
                    <a href="{{ url('/plans') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-cyan-200 transition hover:text-white">View all investment plans →</a>
                </div>

                <div class="grid gap-5 lg:grid-cols-3">
                    @forelse($featuredPlans as $package)
                        <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card flex flex-col rounded-[1.8rem] border border-white/10 bg-white/[0.05] p-6 shadow-[0_20px_50px_rgba(0,0,0,.25)] backdrop-blur-xl" style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">Plan {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                    <h3 class="mt-2 font-display text-2xl font-semibold text-white">{{ $package->name }}</h3>
                                </div>
                                <span class="rounded-full border border-amber-300/20 bg-amber-300/10 px-3 py-1 text-[11px] font-bold text-amber-200">{{ rtrim(rtrim(number_format((float) $package->roi, 2), '0'), '.') }}%</span>
                            </div>

                            <div class="mt-7 space-y-3 text-sm">
                                <div class="flex items-center justify-between gap-3 rounded-2xl border border-white/8 bg-slate-950/35 px-4 py-3"><span class="text-white/50">Duration</span><span class="font-semibold text-white">{{ $package->Duration }}</span></div>
                                <div class="flex items-center justify-between gap-3 rounded-2xl border border-white/8 bg-slate-950/35 px-4 py-3"><span class="text-white/50">Return schedule</span><span class="font-semibold text-white">{{ $option->getReturnType($package->returnType) }}</span></div>
                                <div class="flex items-center justify-between gap-3 rounded-2xl border border-white/8 bg-slate-950/35 px-4 py-3"><span class="text-white/50">Minimum</span><span class="font-semibold text-white">${{ number_format((float) $package->minAmount, 2) }}</span></div>
                            </div>

                            @if(!empty($package->note))
                                <p class="mt-5 text-sm leading-7 text-white/55">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) $package->note)), 100) }}</p>
                            @endif

                            <div class="mt-auto pt-7">
                                <a href="{{ url('/register') }}" class="glow-button-primary inline-flex w-full items-center justify-center rounded-full px-5 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">Open an account</a>
                            </div>
                        </article>
                    @empty
                        <div class="lg:col-span-3 rounded-[1.8rem] border border-dashed border-white/15 bg-white/[0.03] p-10 text-center text-white/60">No investment plans are currently published.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[linear-gradient(180deg,#06101b_0%,#09051a_100%)] py-24 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.06] p-7 shadow-[0_30px_80px_rgba(0,0,0,.25)] backdrop-blur-2xl sm:p-10 lg:p-14">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.24em] text-cyan-200/80">Your capital deserves context</p>
                        <h2 class="mt-4 max-w-4xl font-display text-4xl font-bold leading-[1.02] tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">Start with what you want your wealth to achieve.</h2>
                        <p class="mt-5 max-w-2xl text-base leading-8 text-white/65">Tell us what matters, what you are building toward and how you think about risk. We can begin the conversation from there.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ url('/contact') }}" class="glow-button-primary inline-flex min-w-52 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">Talk to us</a>
                        <a href="{{ url('/services') }}" class="inline-flex min-w-52 items-center justify-center rounded-full border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-white/10">Explore services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
