@extends('layouts.marketing')

@section('title', config('app.name') . ' | Wealth, Asset & Investment Management')
@section('meta_description', 'A modern wealth, asset and investment management experience built around disciplined strategy, thoughtful allocation and long-term stewardship.')

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
    <section class="relative isolate overflow-hidden bg-[#f7f9fc] text-slate-950 transition-colors duration-300 dark:bg-[#030712] dark:text-white">
        <div class="spark-field pointer-events-none absolute inset-0 -z-30 opacity-70"></div>
        <div class="mesh-grid pointer-events-none absolute inset-0 -z-20 opacity-70"></div>
        <div class="glow-orb glow-orb-top"></div>
        <div class="glow-orb glow-orb-right"></div>
        <div class="glow-orb glow-orb-bottom"></div>

        <div class="mx-auto max-w-7xl px-4 pb-20 pt-16 sm:px-6 sm:pb-24 sm:pt-20 lg:px-8 lg:pb-28 lg:pt-24">
            <div class="grid items-center gap-14 lg:grid-cols-[1fr_.96fr] xl:gap-18">
                <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-cyan-500/20 bg-white/78 px-4 py-2 text-[10px] font-bold uppercase tracking-[0.24em] text-cyan-800 shadow-sm backdrop-blur-xl dark:border-cyan-300/20 dark:bg-white/7 dark:text-cyan-200">
                        <span class="h-2 w-2 rounded-full bg-cyan-500 shadow-[0_0_14px_rgba(6,182,212,.65)] dark:bg-cyan-300 dark:shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>
                        Private wealth intelligence
                    </div>

                    <h1 class="mt-8 max-w-5xl font-display text-5xl font-bold leading-[.94] tracking-[-0.055em] sm:text-6xl lg:text-7xl xl:text-[5.5rem]">
                        Wealth deserves a <span class="aurora-text">clearer system</span> for growth, protection and direction.
                    </h1>

                    <p class="mt-7 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg dark:text-white/66">
                        {{ config('app.name') }} brings investment strategy, asset stewardship and long-term wealth thinking into one connected experience—designed to help capital move with purpose instead of noise.
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ url('/register') }}" class="glow-button-primary group inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">
                            Create an account
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <a href="{{ url('/login') }}" class="inline-flex items-center justify-center rounded-full border border-slate-900/10 bg-white/78 px-6 py-3.5 text-sm font-semibold text-slate-800 shadow-sm backdrop-blur-xl transition duration-300 hover:-translate-y-0.5 hover:border-cyan-400/30 dark:border-white/12 dark:bg-white/6 dark:text-white dark:hover:border-cyan-300/30 dark:hover:bg-white/10">
                            Sign in
                        </a>
                    </div>

                    <div class="mt-10 grid gap-3 sm:grid-cols-3">
                        @foreach([
                            ['Strategy', 'Objective before product'],
                            ['Allocation', 'Risk and opportunity together'],
                            ['Stewardship', 'Review as priorities evolve'],
                        ] as $signal)
                            <div class="glass-panel rounded-2xl px-4 py-4">
                                <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-cyan-700 dark:text-cyan-200/80">{{ $signal[0] }}</p>
                                <p class="mt-2 text-sm font-semibold leading-6 text-slate-800 dark:text-white/74">{{ $signal[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-scale relative">
                    <div class="relative mx-auto max-w-[36rem]">
                        <div class="absolute -inset-5 rounded-[2.5rem] bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.18),transparent_28%),radial-gradient(circle_at_80%_18%,rgba(168,85,247,.18),transparent_28%),radial-gradient(circle_at_60%_90%,rgba(234,179,8,.12),transparent_30%)] blur-xl"></div>

                        <div class="glass-panel glow-border relative rounded-[2rem] p-4 sm:p-5">
                            <div class="rounded-[1.55rem] border border-slate-900/8 bg-slate-950 p-5 text-white shadow-2xl dark:border-white/8 dark:bg-[#050816] sm:p-6">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-cyan-200/75">Capital command centre</p>
                                        <h2 class="mt-2 font-display text-2xl font-bold">One view of your wealth strategy.</h2>
                                    </div>
                                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/7 text-cyan-200">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 18V9m5 9V5m5 13v-6m4 6V7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                </div>

                                <div class="mt-7 grid gap-4 sm:grid-cols-[1.08fr_.92fr]">
                                    <div class="rounded-[1.35rem] border border-white/10 bg-white/[0.045] p-5">
                                        <div class="flex items-center justify-between gap-3">
                                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-white/45">Strategy map</p>
                                            <span class="rounded-full border border-emerald-300/20 bg-emerald-300/10 px-2.5 py-1 text-[9px] font-bold uppercase tracking-[0.16em] text-emerald-200">Connected</span>
                                        </div>

                                        <div class="mt-6 space-y-5">
                                            @foreach([
                                                ['Growth', 'Opportunities aligned to long-term objectives'],
                                                ['Protection', 'Concentration, downside and resilience in view'],
                                                ['Liquidity', 'Capital access considered alongside ambition'],
                                            ] as $item)
                                                <div class="flex items-start gap-3">
                                                    <span class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-[linear-gradient(135deg,#67e8f9,#a855f7)] shadow-[0_0_12px_rgba(103,232,249,.55)]"></span>
                                                    <div>
                                                        <p class="text-sm font-semibold text-white">{{ $item[0] }}</p>
                                                        <p class="mt-1 text-xs leading-5 text-white/45">{{ $item[1] }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        <div class="rounded-[1.35rem] border border-white/10 bg-white/[0.045] p-5">
                                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-cyan-200/70">Published plans</p>
                                            <p class="mt-2 font-display text-4xl font-bold">{{ str_pad((string) collect($packages ?? [])->count(), 2, '0', STR_PAD_LEFT) }}</p>
                                            <p class="mt-2 text-xs leading-5 text-white/45">Configured opportunities available for review.</p>
                                        </div>
                                        <div class="rounded-[1.35rem] border border-white/10 bg-white/[0.045] p-5">
                                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-fuchsia-200/70">Service coverage</p>
                                            <p class="mt-2 font-display text-4xl font-bold">{{ str_pad((string) collect($services ?? [])->count(), 2, '0', STR_PAD_LEFT) }}</p>
                                            <p class="mt-2 text-xs leading-5 text-white/45">Advice, management and investment-led capabilities.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 grid gap-3 sm:grid-cols-3">
                                    @foreach([
                                        ['Understand', '01'],
                                        ['Structure', '02'],
                                        ['Review', '03'],
                                    ] as $step)
                                        <div class="rounded-2xl border border-white/10 bg-white/[0.035] px-4 py-3">
                                            <div class="flex items-center justify-between gap-3"><span class="text-[9px] font-bold uppercase tracking-[0.16em] text-white/42">{{ $step[0] }}</span><span class="text-[9px] font-bold text-cyan-200">{{ $step[1] }}</span></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="floating-card absolute -left-5 top-16 hidden rounded-2xl border border-cyan-400/20 bg-white/85 px-4 py-3 text-slate-800 shadow-[0_18px_45px_rgba(15,23,42,.12)] backdrop-blur-xl lg:block dark:border-cyan-300/20 dark:bg-cyan-300/10 dark:text-cyan-50 dark:shadow-[0_0_30px_rgba(34,211,238,.18)]">
                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-cyan-700 dark:text-cyan-200/80">Wealth view</p>
                            <p class="mt-1 text-sm font-semibold">Built around the objective.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-slate-900/8 bg-white/82 py-4 backdrop-blur-xl dark:border-white/8 dark:bg-white/[0.025]">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-8 gap-y-3 px-4 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500 sm:px-6 dark:text-white/40 lg:px-8">
            @foreach(['Investment management', 'Wealth strategy', 'Asset stewardship', 'Risk awareness', 'Long-term planning'] as $item)
                <span class="inline-flex items-center gap-2"><span class="h-1.5 w-1.5 rotate-45 bg-cyan-500 dark:bg-cyan-300"></span>{{ $item }}</span>
            @endforeach
        </div>
    </section>

    <section class="bg-[#f7f9fc] py-24 text-slate-950 transition-colors dark:bg-[#07111e] dark:text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[.72fr_1.28fr] lg:items-end lg:gap-16">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-cyan-700 dark:text-cyan-200/80">A modern wealth operating system</p>
                    <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">Clarity across the decisions that shape capital.</h2>
                </div>
                <p x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-2xl text-base leading-8 text-slate-600 lg:justify-self-end dark:text-white/58">Rather than treating investment products as isolated choices, we look at the role each decision plays in the wider picture: growth, liquidity, risk, timing and long-term flexibility.</p>
            </div>

            <div class="mt-12 grid gap-5 lg:grid-cols-12">
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.9rem] p-7 lg:col-span-7 lg:p-9">
                    <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-fuchsia-700 dark:text-fuchsia-200/75">01 · Understand</span>
                    <h3 class="mt-5 max-w-xl font-display text-3xl font-bold tracking-[-0.03em] sm:text-4xl">Start with what the money is meant to achieve.</h3>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 dark:text-white/58">The first questions are about objectives, time horizon, liquidity and existing exposure—not which product happens to be available today.</p>
                    <div class="mt-8 grid gap-3 sm:grid-cols-3">
                        @foreach(['Objective', 'Time horizon', 'Liquidity'] as $item)
                            <div class="rounded-2xl border border-slate-900/8 bg-white/65 px-4 py-4 text-sm font-semibold text-slate-700 dark:border-white/8 dark:bg-white/5 dark:text-white/70">{{ $item }}</div>
                        @endforeach
                    </div>
                </article>

                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.9rem] p-7 lg:col-span-5 lg:p-9" style="--reveal-delay: 80ms">
                    <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-cyan-700 dark:text-cyan-200/75">02 · Structure</span>
                    <h3 class="mt-5 font-display text-3xl font-bold tracking-[-0.03em]">Build a portfolio around roles, not hype.</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-white/58">Every allocation should have a reason for being there and a clear relationship to the rest of the capital.</p>
                </article>

                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.9rem] p-7 lg:col-span-5 lg:p-9">
                    <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-amber-700 dark:text-amber-200/75">03 · Deploy</span>
                    <h3 class="mt-5 font-display text-3xl font-bold tracking-[-0.03em]">Move with intention.</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-white/58">Capital is committed only when the opportunity, structure and risk fit the objective.</p>
                </article>

                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.9rem] p-7 lg:col-span-7 lg:p-9" style="--reveal-delay: 80ms">
                    <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-emerald-700 dark:text-emerald-200/75">04 · Review</span>
                    <h3 class="mt-5 font-display text-3xl font-bold tracking-[-0.03em]">Keep the strategy alive as circumstances change.</h3>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 dark:text-white/58">Markets move. Priorities evolve. A disciplined wealth process makes room for review without turning every headline into a portfolio decision.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-white py-24 text-slate-950 transition-colors dark:bg-[#030712] dark:text-white sm:py-28">
        <div class="glow-orb glow-orb-service"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl" x-data="revealOnScroll()" :class="{ 'is-visible': shown }">
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-fuchsia-700 dark:text-fuchsia-200/80">Capabilities</p>
                <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">Services designed to work together.</h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600 dark:text-white/58">Each service is more useful when understood as part of a wider capital strategy rather than a standalone transaction.</p>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                @forelse($coreServices as $service)
                    <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card group rounded-[1.8rem] border border-slate-900/8 bg-[#f8fafc] p-6 shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-cyan-400/25 hover:shadow-2xl hover:shadow-slate-900/8 dark:border-white/10 dark:bg-white/[0.045] dark:hover:border-cyan-300/25" style="--reveal-delay: {{ ($loop->index % 6) * 70 }}ms">
                        <div class="flex items-start justify-between gap-4">
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-900/8 bg-white text-cyan-700 shadow-sm dark:border-white/10 dark:bg-white/7 dark:text-cyan-200">0{{ $loop->iteration }}</span>
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-900/8 text-slate-500 transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:border-cyan-400/30 group-hover:text-cyan-700 dark:border-white/10 dark:text-white/50 dark:group-hover:text-cyan-200">↗</span>
                        </div>
                        <h3 class="mt-8 font-display text-2xl font-bold tracking-[-0.025em]">{{ $service->title }}</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-white/55">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) ($service->short ?: $service->content))), 145) }}</p>
                    </a>
                @empty
                    <div class="md:col-span-2 xl:col-span-3 rounded-[1.8rem] border border-dashed border-slate-900/15 bg-[#f8fafc] p-10 text-center text-slate-500 dark:border-white/15 dark:bg-white/[0.03] dark:text-white/50">Services will appear here once published.</div>
                @endforelse
            </div>
        </div>
    </section>

    @if($featuredSectors->isNotEmpty())
        <section class="bg-[#f7f9fc] py-24 text-slate-950 transition-colors dark:bg-[#07111e] dark:text-white sm:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[.78fr_1.22fr] lg:items-end">
                    <div><p class="text-xs font-bold uppercase tracking-[0.22em] text-cyan-700 dark:text-cyan-200/80">Investment areas</p><h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl">Different markets. One disciplined lens.</h2></div>
                    <p class="max-w-2xl text-base leading-8 text-slate-600 lg:justify-self-end dark:text-white/58">Every asset class behaves differently. The role, risk and liquidity profile should be understood before capital is committed.</p>
                </div>

                <div class="mt-10 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    @foreach($featuredSectors as $sector)
                        <a href="{{ route('service.details', ['id' => $sector->id]) }}" class="glass-panel group rounded-[1.65rem] p-5 transition duration-300 hover:-translate-y-1">
                            <div class="flex items-center justify-between gap-3"><span class="text-[10px] font-bold tracking-[0.18em] text-fuchsia-700 dark:text-fuchsia-200/80">0{{ $loop->iteration }}</span><span class="text-slate-400 transition group-hover:text-cyan-700 dark:text-white/35 dark:group-hover:text-cyan-200">↗</span></div>
                            <h3 class="mt-8 font-display text-2xl font-bold">{{ $sector->title }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-white/55">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) ($sector->short ?: $sector->content))), 120) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @auth
    <section id="approach" class="relative overflow-hidden bg-white py-24 text-slate-950 transition-colors dark:bg-[#030712] dark:text-white sm:py-28">
        <div class="spark-field pointer-events-none absolute inset-0 opacity-35"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[.72fr_1.28fr] lg:gap-16">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-cyan-700 dark:text-cyan-200/80">Investment plans</p>
                    <h2 class="mt-4 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">See the terms. Then judge the fit.</h2>
                    <p class="mt-5 text-base leading-8 text-slate-600 dark:text-white/58">Published plan terms are shown clearly, but a return rate is only one part of the decision. Duration, liquidity and the wider objective matter too.</p>
                    <a href="{{ url('/plans') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-cyan-700 transition hover:text-slate-950 dark:text-cyan-200 dark:hover:text-white">View all plans →</a>
                </div>

                <div class="grid gap-5 lg:grid-cols-3">
                    @forelse($featuredPlans as $package)
                        <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card flex flex-col rounded-[1.8rem] border border-slate-900/8 bg-[#f8fafc] p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-cyan-400/25 hover:shadow-2xl hover:shadow-slate-900/8 dark:border-white/10 dark:bg-white/[0.045] dark:hover:border-cyan-300/25" style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms">
                            <div class="flex items-start justify-between gap-4">
                                <div><p class="text-[9px] font-bold uppercase tracking-[0.18em] text-cyan-700 dark:text-cyan-200/75">Plan {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p><h3 class="mt-2 font-display text-2xl font-bold">{{ $package->name }}</h3></div>
                                <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-[11px] font-bold text-amber-700 dark:text-amber-200">{{ rtrim(rtrim(number_format((float) $package->roi, 2), '0'), '.') }}%</span>
                            </div>
                            <div class="mt-7 space-y-3 text-sm">
                                <div class="flex items-center justify-between rounded-2xl border border-slate-900/7 bg-white px-4 py-3 dark:border-white/8 dark:bg-white/[0.035]"><span class="text-slate-500 dark:text-white/45">Duration</span><span class="font-semibold">{{ $package->Duration }}</span></div>
                                <div class="flex items-center justify-between rounded-2xl border border-slate-900/7 bg-white px-4 py-3 dark:border-white/8 dark:bg-white/[0.035]"><span class="text-slate-500 dark:text-white/45">Return type</span><span class="font-semibold">{{ $option->getReturnType($package->returnType) }}</span></div>
                                <div class="flex items-center justify-between rounded-2xl border border-slate-900/7 bg-white px-4 py-3 dark:border-white/8 dark:bg-white/[0.035]"><span class="text-slate-500 dark:text-white/45">Minimum</span><span class="font-semibold">${{ number_format((float) $package->minAmount, 2) }}</span></div>
                            </div>
                            <div class="mt-auto pt-7"><a href="{{ url('/register') }}" class="glow-button-primary inline-flex w-full items-center justify-center rounded-full px-5 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Continue</a></div>
                        </article>
                    @empty
                        <div class="lg:col-span-3 rounded-[1.8rem] border border-dashed border-slate-900/15 bg-[#f8fafc] p-10 text-center text-slate-500 dark:border-white/15 dark:bg-white/[0.03] dark:text-white/50">No investment plans are currently published.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @endauth

    <section class="bg-[#f7f9fc] py-24 text-slate-950 transition-colors dark:bg-[linear-gradient(180deg,#07111e_0%,#09051a_100%)] dark:text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:p-14">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.22em] text-fuchsia-700 dark:text-fuchsia-200/80">Your next step</p>
                        <h2 class="mt-4 max-w-4xl font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">A premium experience should make the next decision clearer.</h2>
                        <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600 dark:text-white/58">Create an account to explore the client experience, or speak with the team if you want to start with context before choosing a plan.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ url('/register') }}" class="glow-button-primary inline-flex min-w-52 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Create account</a>
                        <a href="{{ url('/contact') }}" class="inline-flex min-w-52 items-center justify-center rounded-full border border-slate-900/10 bg-white/70 px-6 py-3.5 text-sm font-semibold text-slate-800 transition hover:-translate-y-0.5 dark:border-white/12 dark:bg-white/6 dark:text-white">Talk to us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
