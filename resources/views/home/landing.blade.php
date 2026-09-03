@extends('layouts.marketing')

@section('title', config('app.name') . ' | Investment, Wealth & Asset Management')
@section('meta_description', 'Build, preserve and manage wealth with a disciplined investment approach, thoughtful asset allocation and long-term stewardship.')

@php
    $coreServices = collect($services ?? [])
        ->reject(fn ($service) => (int) ($service->isSector ?? 2) === 1)
        ->take(4);

    $featuredSectors = collect($sectors ?? [])->take(4);
@endphp

@section('content')
    <section class="relative overflow-hidden bg-ink-950 text-white">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute -right-24 top-14 h-80 w-80 rounded-full border border-white/5"></div>
            <div class="absolute -right-8 top-32 h-52 w-52 rounded-full border border-bronze-300/15"></div>
            <div class="absolute left-[52%] top-0 h-full w-px bg-white/5"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl gap-14 px-4 pb-16 pt-14 sm:px-6 sm:pb-20 sm:pt-20 lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:gap-20 lg:px-8 lg:pb-24 lg:pt-24">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-bronze-300/25 bg-bronze-300/5 px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-bronze-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                    Long-term capital. Thoughtfully managed.
                </div>

                <h1 class="mt-7 max-w-4xl font-display text-5xl font-semibold leading-[1.02] tracking-[-0.035em] text-white sm:text-6xl lg:text-7xl">
                    Wealth deserves more than a place to sit.
                    <span class="text-bronze-300">It needs direction.</span>
                </h1>

                <p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg">
                    {{ config('app.name') }} brings investment thinking, wealth planning and asset management into one considered approach—so your capital is structured around what you are building, protecting and preparing for next.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-bronze-200 focus:outline-none focus:ring-2 focus:ring-bronze-200 focus:ring-offset-2 focus:ring-offset-ink-950">
                        Start a conversation
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="{{ url('/services') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 px-6 py-3.5 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/5">
                        Explore our services
                    </a>
                </div>

                <div class="mt-12 grid max-w-2xl grid-cols-1 gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/10 sm:grid-cols-3">
                    <div class="bg-ink-950 px-5 py-5">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-white/35">Perspective</p>
                        <p class="mt-2 text-sm font-semibold text-white/85">Long-term by design</p>
                    </div>
                    <div class="bg-ink-950 px-5 py-5">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-white/35">Discipline</p>
                        <p class="mt-2 text-sm font-semibold text-white/85">Risk before noise</p>
                    </div>
                    <div class="bg-ink-950 px-5 py-5">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-white/35">Stewardship</p>
                        <p class="mt-2 text-sm font-semibold text-white/85">Clarity at every step</p>
                    </div>
                </div>
            </div>

            <div class="relative lg:pl-4">
                <div class="rounded-[2rem] border border-white/10 bg-white/[0.045] p-5 shadow-2xl shadow-black/20 sm:p-7">
                    <div class="flex items-start justify-between gap-4 border-b border-white/10 pb-6">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-bronze-300">Capital framework</p>
                            <h2 class="mt-2 font-display text-2xl font-semibold">Every portfolio starts with purpose.</h2>
                        </div>
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-white/10 text-bronze-300">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 3v18M3 12h18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                        </span>
                    </div>

                    <div class="space-y-3 py-6">
                        <div class="grid grid-cols-[44px_1fr] gap-4 rounded-2xl border border-white/8 bg-black/10 p-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/5 text-xs font-bold text-bronze-300">01</span>
                            <div>
                                <p class="font-semibold">Define the objective</p>
                                <p class="mt-1 text-sm leading-6 text-white/50">Time horizon, liquidity needs, priorities and tolerance for uncertainty.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-[44px_1fr] gap-4 rounded-2xl border border-white/8 bg-black/10 p-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/5 text-xs font-bold text-bronze-300">02</span>
                            <div>
                                <p class="font-semibold">Structure the capital</p>
                                <p class="mt-1 text-sm leading-6 text-white/50">Build an allocation that balances resilience, opportunity and flexibility.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-[44px_1fr] gap-4 rounded-2xl border border-white/8 bg-black/10 p-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/5 text-xs font-bold text-bronze-300">03</span>
                            <div>
                                <p class="font-semibold">Review with discipline</p>
                                <p class="mt-1 text-sm leading-6 text-white/50">Monitor the plan, reassess risk and adjust when the facts—not the noise—change.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-4 border-t border-white/10 pt-5 text-xs text-white/40">
                        <span>Purpose-led allocation</span>
                        <span class="text-bronze-300">{{ config('app.name') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-b border-ink-950/8 bg-white">
        <div class="mx-auto grid max-w-7xl gap-0 px-4 sm:px-6 md:grid-cols-3 lg:px-8">
            <div class="border-b border-ink-950/8 py-7 md:border-b-0 md:border-r md:pr-8">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-bronze-600">Think clearly</p>
                <p class="mt-2 text-sm leading-6 text-ink-700">Separate investment decisions from short-term market noise.</p>
            </div>
            <div class="border-b border-ink-950/8 py-7 md:border-b-0 md:border-r md:px-8">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-bronze-600">Allocate deliberately</p>
                <p class="mt-2 text-sm leading-6 text-ink-700">Put capital to work according to objectives, liquidity and risk.</p>
            </div>
            <div class="py-7 md:pl-8">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-bronze-600">Stay accountable</p>
                <p class="mt-2 text-sm leading-6 text-ink-700">Keep the strategy understandable, reviewable and connected to the plan.</p>
            </div>
        </div>
    </section>

    <section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.72fr_1.28fr] lg:gap-20">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">What we do</p>
                    <h2 class="mt-4 max-w-md font-display text-4xl font-semibold leading-tight tracking-[-0.025em] text-ink-950 sm:text-5xl">
                        A joined-up view of your capital.
                    </h2>
                    <p class="mt-5 max-w-md text-base leading-8 text-ink-700">
                        Investment decisions rarely exist in isolation. We bring strategy, allocation and stewardship together so each decision can support the wider financial picture.
                    </p>
                    <a href="{{ url('/services') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-ink-950 transition hover:text-bronze-700">
                        View all services
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    @forelse($coreServices as $service)
                        <a href="{{ route('service.details', ['id' => $service->id]) }}" class="group flex min-h-64 flex-col rounded-[1.6rem] border border-ink-950/8 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-bronze-500/35 hover:shadow-xl hover:shadow-ink-950/5 sm:p-7">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-xs font-bold tracking-[0.18em] text-bronze-600">0{{ $loop->iteration }}</span>
                                <span class="flex h-9 w-9 items-center justify-center rounded-full border border-ink-950/10 text-ink-950 transition group-hover:border-bronze-500/40 group-hover:bg-bronze-100">
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                        <path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-auto pt-12">
                                <h3 class="font-display text-2xl font-semibold leading-tight text-ink-950">{{ $service->title }}</h3>
                                <p class="mt-3 text-sm leading-7 text-ink-700">
                                    {{ \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 150) }}
                                </p>
                            </div>
                        </a>
                    @empty
                        @foreach([
                            ['Investment Management', 'A disciplined framework for allocating capital across opportunities while keeping risk, liquidity and time horizon in view.'],
                            ['Wealth Management', 'Bring investment decisions into the wider context of preservation, growth, succession and long-term financial priorities.'],
                            ['Asset Strategy', 'Evaluate how different assets can work together to create a portfolio that is resilient, understandable and purposeful.'],
                            ['Advisory', 'Make consequential financial decisions with a clearer process, better questions and a documented investment rationale.'],
                        ] as $fallback)
                            <div class="flex min-h-64 flex-col rounded-[1.6rem] border border-ink-950/8 bg-white p-6 sm:p-7">
                                <span class="text-xs font-bold tracking-[0.18em] text-bronze-600">0{{ $loop->iteration }}</span>
                                <div class="mt-auto pt-12">
                                    <h3 class="font-display text-2xl font-semibold text-ink-950">{{ $fallback[0] }}</h3>
                                    <p class="mt-3 text-sm leading-7 text-ink-700">{{ $fallback[1] }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section id="approach" class="bg-ink-900 py-20 text-white sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[.86fr_1.14fr] lg:items-end lg:gap-20">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Our investment discipline</p>
                    <h2 class="mt-4 max-w-xl font-display text-4xl font-semibold leading-tight tracking-[-0.025em] sm:text-5xl">
                        A process built to remain useful when markets stop being comfortable.
                    </h2>
                </div>
                <p class="max-w-xl text-base leading-8 text-white/58 lg:justify-self-end">
                    Good investing is not about predicting every turn. It is about having a framework strong enough to make sensible decisions through different conditions, and flexible enough to adapt when the underlying facts change.
                </p>
            </div>

            <div class="mt-14 grid border-y border-white/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['01', 'Understand first', 'We begin with objectives, constraints, liquidity and the role the capital needs to play.'],
                    ['02', 'Research deeply', 'Decisions are grounded in evidence, scenario thinking and a clear view of the risks being taken.'],
                    ['03', 'Diversify with purpose', 'Diversification is used to manage dependency—not to collect assets without a reason.'],
                    ['04', 'Review continuously', 'Portfolios are revisited as circumstances, valuations and opportunities evolve.'],
                ] as $principle)
                    <div class="border-b border-white/10 py-8 md:nth-[odd]:border-r md:nth-[3]:border-b-0 md:nth-[4]:border-b-0 lg:border-b-0 lg:border-r lg:last:border-r-0 lg:px-7 lg:first:pl-0 lg:last:pr-0">
                        <span class="text-xs font-bold tracking-[0.18em] text-bronze-300">{{ $principle[0] }}</span>
                        <h3 class="mt-8 text-lg font-semibold">{{ $principle[1] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-white/48">{{ $principle[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($featuredSectors->isNotEmpty())
        <section class="bg-white py-20 sm:py-24 lg:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 border-b border-ink-950/10 pb-9 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Where we look</p>
                        <h2 class="mt-4 max-w-2xl font-display text-4xl font-semibold tracking-[-0.025em] text-ink-950 sm:text-5xl">Investment sectors, viewed through a portfolio lens.</h2>
                    </div>
                    <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 text-sm font-bold text-ink-950 hover:text-bronze-700">
                        Explore opportunities
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="divide-y divide-ink-950/10">
                    @foreach($featuredSectors as $sector)
                        <a href="{{ route('service.details', ['id' => $sector->id]) }}" class="group grid gap-5 py-7 sm:grid-cols-[60px_1fr_auto] sm:items-center sm:py-8">
                            <span class="text-xs font-bold tracking-[0.16em] text-bronze-600">0{{ $loop->iteration }}</span>
                            <div>
                                <h3 class="font-display text-2xl font-semibold text-ink-950 sm:text-3xl">{{ $sector->title }}</h3>
                                @if(!empty($sector->short))
                                    <p class="mt-2 max-w-3xl text-sm leading-7 text-ink-700">{{ \Illuminate\Support\Str::limit(trim(strip_tags($sector->short)), 170) }}</p>
                                @endif
                            </div>
                            <span class="flex h-10 w-10 items-center justify-center rounded-full border border-ink-950/10 text-ink-950 transition group-hover:border-bronze-500/40 group-hover:bg-bronze-100">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="bg-paper-100 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid overflow-hidden rounded-[2rem] border border-ink-950/8 bg-white lg:grid-cols-[.9fr_1.1fr]">
                <div class="border-b border-ink-950/8 p-7 sm:p-10 lg:border-b-0 lg:border-r lg:p-12">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Who we work with</p>
                    <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.025em] text-ink-950 sm:text-5xl">
                        Different circumstances. One standard of care.
                    </h2>
                    <p class="mt-5 text-base leading-8 text-ink-700">
                        The right strategy depends on what the capital is for. Our approach is designed to begin with that context rather than force every investor into the same answer.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2">
                    @foreach([
                        ['Individuals & families', 'Build and preserve wealth around life goals, future obligations and generational priorities.'],
                        ['Business owners', 'Think through personal and business capital with liquidity, concentration and transition in view.'],
                        ['Professionals & executives', 'Create a more deliberate framework for savings, investments and long-term financial independence.'],
                        ['Institutions & partners', 'Access a structured investment conversation centred on mandate, risk and accountability.'],
                    ] as $audience)
                        <div class="border-b border-ink-950/8 p-7 sm:p-8 sm:nth-[odd]:border-r sm:nth-[3]:border-b-0 sm:nth-[4]:border-b-0">
                            <span class="mb-8 flex h-10 w-10 items-center justify-center rounded-full bg-paper-100 text-bronze-700">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <h3 class="text-base font-bold text-ink-950">{{ $audience[0] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-700">{{ $audience[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-paper-50 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-[2rem] bg-bronze-300 p-7 text-ink-950 sm:p-10 lg:p-14">
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full border border-ink-950/10" aria-hidden="true"></div>
                <div class="absolute -right-2 top-8 h-40 w-40 rounded-full border border-ink-950/10" aria-hidden="true"></div>
                <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-ink-950/55">The next step</p>
                        <h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight tracking-[-0.025em] sm:text-5xl lg:text-6xl">
                            Your capital should have a strategy you can explain.
                        </h2>
                        <p class="mt-5 max-w-2xl text-base leading-8 text-ink-950/65">
                            Tell us what you are trying to achieve. We will start with the objectives, the constraints and the questions that matter before discussing an investment route.
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900">
                            Talk to our team
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="{{ url('/plans') }}" class="inline-flex min-w-48 items-center justify-center rounded-full border border-ink-950/20 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-ink-950/5">
                            View investment plans
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
