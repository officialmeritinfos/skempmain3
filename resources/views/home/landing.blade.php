@extends('layouts.marketing')

@section('title', config('app.name') . ' | Investment, Wealth & Asset Management')
@section('meta_description', 'Build, preserve and manage wealth with a disciplined investment approach, thoughtful asset allocation and long-term stewardship.')

@inject('option', 'App\Defaults\Custom')

@php
    $coreServices = collect($services ?? [])
        ->reject(fn ($service) => (int) data_get($service, 'isSector', 2) === 1)
        ->take(4);

    $featuredSectors = collect($sectors ?? [])->take(4);

    $featuredPackages = collect($packages ?? [])
        ->reject(fn ($package) => (bool) data_get($package, 'isCannabis', false))
        ->take(3);

    $serviceFallbackImages = [
        asset('home/images/banner/banner-2.jpg'),
        asset('home/images/banner/banner-4.jpg'),
        asset('home/images/banner/banner-5.jpg'),
        asset('home/images/banner/banner-7.jpg'),
    ];

    $processImages = [
        asset('home/images/banner/banner-3.jpg'),
        asset('home/images/banner/banner-6.jpg'),
        asset('home/images/banner/building1.jpg'),
        asset('home/images/banner/banner-1.jpg'),
    ];

    $aboutCopy = trim(strip_tags((string) ($web?->description ?? '')));
@endphp

@section('content')
    <section class="relative isolate overflow-hidden bg-ink-950 text-white">
        <div class="hero-grid pointer-events-none absolute inset-0 -z-20 opacity-55"></div>
        <div class="pointer-events-none absolute inset-y-0 left-[8%] -z-10 hidden w-px bg-white/[0.06] xl:block"></div>
        <div class="pointer-events-none absolute inset-y-0 right-[8%] -z-10 hidden w-px bg-white/[0.06] xl:block"></div>

        <div class="mx-auto grid min-h-[720px] max-w-[90rem] items-stretch lg:grid-cols-[1.08fr_.92fr] xl:min-h-[780px]">
            <div class="flex items-center px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24 xl:px-10">
                <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
                    <div class="inline-flex items-center gap-3 border-l border-bronze-300 pl-3 text-[10px] font-bold uppercase tracking-[0.24em] text-bronze-300">
                        Investment · Wealth · Asset Management
                    </div>

                    <h1 class="mt-7 max-w-4xl font-display text-5xl font-semibold leading-[.95] tracking-[-0.045em] text-white sm:text-6xl lg:text-7xl xl:text-[5.8rem]">
                        Capital deserves more than a place to sit.
                        <span class="text-bronze-300">It needs direction.</span>
                    </h1>

                    <p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg sm:leading-8">
                        {{ config('app.name') }} brings investment strategy, wealth planning and asset stewardship into one deliberate framework—so every allocation has a reason, every risk has context and every decision stays connected to the longer-term objective.
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="{{ url('/contact') }}" class="group inline-flex items-center justify-center gap-2 rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 shadow-xl shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200 focus:outline-none focus:ring-2 focus:ring-bronze-200 focus:ring-offset-2 focus:ring-offset-ink-950">
                            Start a conversation
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <a href="{{ url('/services') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/[0.035] px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:border-white/25 hover:bg-white/[0.065]">
                            Explore our services
                        </a>
                    </div>

                    <div class="mt-12 grid max-w-2xl grid-cols-2 border-y border-white/10 sm:grid-cols-4">
                        @foreach([
                            ['01', 'Research'],
                            ['02', 'Allocate'],
                            ['03', 'Monitor'],
                            ['04', 'Steward'],
                        ] as $discipline)
                            <div class="border-white/10 px-0 py-4 sm:border-r sm:px-4 sm:first:pl-0 sm:last:border-r-0">
                                <p class="text-[9px] font-bold tracking-[0.2em] text-bronze-300">{{ $discipline[0] }}</p>
                                <p class="mt-1.5 text-xs font-semibold text-white/60">{{ $discipline[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="relative min-h-[520px] overflow-hidden border-t border-white/10 lg:min-h-0 lg:border-l lg:border-t-0">
                <img src="{{ asset('home/images/banner/building1.jpg') }}" alt="Investment and asset management" class="hero-portrait absolute inset-0 h-full w-full object-cover" fetchpriority="high">
                <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(7,24,27,.08),rgba(7,24,27,.28)_45%,rgba(7,24,27,.92))]"></div>
                <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(7,24,27,.34),transparent_55%)] lg:bg-[linear-gradient(90deg,rgba(7,24,27,.22),transparent_50%)]"></div>

                <div class="absolute left-5 top-5 border border-white/15 bg-ink-950/55 px-4 py-3 backdrop-blur-md sm:left-8 sm:top-8">
                    <p class="text-[9px] font-bold uppercase tracking-[0.22em] text-bronze-300">Our mandate</p>
                    <p class="mt-1 text-sm font-semibold text-white">Build · Preserve · Steward</p>
                </div>

                <div class="absolute inset-x-0 bottom-0 p-6 sm:p-9 lg:p-10">
                    <div class="max-w-lg border-l border-bronze-300 pl-5">
                        <p class="font-display text-3xl leading-tight text-white sm:text-4xl">“Clarity before complexity.”</p>
                        <p class="mt-3 max-w-md text-sm leading-7 text-white/55">A portfolio should be understandable enough to defend in calm markets and disciplined enough to review when conditions change.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-b border-ink-950/[0.08] bg-white py-3.5">
        <div class="marquee-shell">
            <div class="marquee-track gap-3 pr-3 text-[10px] font-bold uppercase tracking-[0.22em] text-ink-700">
                @foreach([1, 2] as $copy)
                    <div class="flex shrink-0 items-center gap-3">
                        @foreach(['Investment management', 'Wealth strategy', 'Asset allocation', 'Portfolio discipline', 'Long-term stewardship', 'Risk awareness'] as $item)
                            <span class="inline-flex items-center gap-3 whitespace-nowrap px-5 py-2">
                                <span class="h-1 w-1 rotate-45 bg-bronze-500"></span>
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about" class="overflow-hidden bg-paper-50 py-20 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-14 lg:grid-cols-[.94fr_1.06fr] lg:items-center lg:gap-20">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale relative min-h-[510px] sm:min-h-[620px]">
                    <div class="story-image-wrap absolute left-0 top-0 h-[78%] w-[78%] overflow-hidden bg-ink-900 shadow-2xl shadow-ink-950/10">
                        <img src="{{ asset('home/images/banner/banner-6.jpg') }}" alt="Long-term investment perspective" class="story-image h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-ink-950/45 via-transparent to-transparent"></div>
                    </div>

                    <div class="story-image-wrap absolute bottom-0 right-0 h-[45%] w-[58%] overflow-hidden border-[7px] border-paper-50 bg-ink-900 shadow-2xl shadow-ink-950/12">
                        <img src="{{ asset('home/images/banner/banner-2.jpg') }}" alt="Wealth and asset management" class="story-image h-full w-full object-cover">
                    </div>

                    <div class="float-slow absolute right-[3%] top-[8%] max-w-[12rem] border border-white/15 bg-ink-950/92 px-5 py-4 text-white shadow-xl backdrop-blur-xl">
                        <p class="text-[9px] font-bold uppercase tracking-[0.22em] text-bronze-300">Perspective</p>
                        <p class="mt-2 font-display text-xl leading-snug">Strategy should make capital more intentional.</p>
                    </div>
                </div>

                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up" style="--reveal-delay: 100ms">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">About {{ config('app.name') }}</p>
                    <h2 class="mt-5 max-w-2xl font-display text-4xl font-semibold leading-[1.04] tracking-[-0.035em] text-ink-950 sm:text-5xl lg:text-6xl">
                        Wealth is personal. Its management should be deliberate.
                    </h2>

                    <p class="mt-7 max-w-2xl text-base leading-8 text-ink-700 sm:text-lg">
                        @if($aboutCopy !== '')
                            {{ \Illuminate\Support\Str::limit($aboutCopy, 390) }}
                        @else
                            {{ config('app.name') }} is an investment, wealth and asset management company focused on helping clients make thoughtful decisions about capital—how it is allocated, how risk is understood and how wealth is stewarded over time.
                        @endif
                    </p>

                    <p class="mt-5 max-w-2xl text-base leading-8 text-ink-700">
                        We start with context before products: what the capital is for, how long it can stay invested, what risks are acceptable, where liquidity matters and how each decision fits the wider financial picture.
                    </p>

                    <div class="mt-9 grid gap-3 sm:grid-cols-3">
                        @foreach([
                            ['Investment', 'Research-led decisions'],
                            ['Wealth', 'Long-term perspective'],
                            ['Assets', 'Purposeful stewardship'],
                        ] as $pillar)
                            <div class="border border-ink-950/[0.08] bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-bronze-500/25 hover:shadow-lg hover:shadow-ink-950/5">
                                <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-600">{{ $pillar[0] }}</span>
                                <p class="mt-2 text-sm font-semibold leading-6 text-ink-950">{{ $pillar[1] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ url('/about') }}" class="group mt-9 inline-flex items-center gap-2 text-sm font-bold text-ink-950 transition hover:text-bronze-700">
                        Discover our company
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.66fr_1.34fr] lg:gap-16">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">What we do</p>
                    <h2 class="mt-4 max-w-md font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">
                        One view of the capital. Not disconnected decisions.
                    </h2>
                    <p class="mt-5 max-w-md text-base leading-8 text-ink-700">
                        Investment decisions rarely exist in isolation. We bring strategy, allocation and stewardship together so each decision can support the wider financial objective.
                    </p>
                    <a href="{{ url('/services') }}" class="group mt-7 inline-flex items-center gap-2 text-sm font-bold text-ink-950 transition hover:text-bronze-700">
                        View all services
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    @forelse($coreServices as $service)
                        @php
                            $serviceImage = $serviceFallbackImages[$loop->index % count($serviceFallbackImages)];
                            $serviceSummary = trim(strip_tags((string) (data_get($service, 'short') ?: data_get($service, 'content', ''))));
                        @endphp
                        <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group overflow-hidden border border-ink-950/[0.08] bg-paper-50 transition duration-500 hover:-translate-y-1.5 hover:border-bronze-500/30 hover:shadow-2xl hover:shadow-ink-950/[0.07]" style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms">
                            <div class="relative h-52 overflow-hidden bg-ink-900 sm:h-60">
                                <img src="{{ $serviceImage }}" alt="" class="card-image h-full w-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-ink-950/70 via-ink-950/5 to-transparent"></div>
                                <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 p-5 text-white">
                                    <span class="text-[10px] font-bold tracking-[0.18em] text-bronze-300">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-black/10 backdrop-blur-md transition duration-300 group-hover:bg-bronze-300 group-hover:text-ink-950">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 sm:p-7">
                                <h3 class="font-display text-2xl font-semibold leading-tight text-ink-950">{{ $service->title }}</h3>
                                @if($serviceSummary !== '')
                                    <p class="mt-3 text-sm leading-7 text-ink-700">{{ \Illuminate\Support\Str::limit($serviceSummary, 150) }}</p>
                                @endif
                            </div>
                        </a>
                    @empty
                        @foreach([
                            ['Investment Management', 'A disciplined framework for allocating capital across opportunities while keeping risk, liquidity and time horizon in view.'],
                            ['Wealth Management', 'Bring investment decisions into the wider context of preservation, growth and long-term financial priorities.'],
                            ['Asset Strategy', 'Evaluate how different assets can work together to create a portfolio that is resilient and purposeful.'],
                            ['Advisory', 'Make consequential financial decisions with a clearer process, better questions and a documented rationale.'],
                        ] as $fallback)
                            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up overflow-hidden border border-ink-950/[0.08] bg-paper-50" style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms">
                                <div class="relative h-52 overflow-hidden sm:h-60">
                                    <img src="{{ $serviceFallbackImages[$loop->index] }}" alt="" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950/60 to-transparent"></div>
                                    <span class="absolute bottom-5 left-5 text-[10px] font-bold tracking-[0.18em] text-bronze-300">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="p-6 sm:p-7">
                                    <h3 class="font-display text-2xl font-semibold text-ink-950">{{ $fallback[0] }}</h3>
                                    <p class="mt-3 text-sm leading-7 text-ink-700">{{ $fallback[1] }}</p>
                                </div>
                            </article>
                        @endforeach
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section id="approach" class="overflow-hidden bg-ink-900 py-20 text-white sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.86fr_1.14fr] lg:items-end lg:gap-20">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">Our investment discipline</p>
                    <h2 class="mt-4 max-w-xl font-display text-4xl font-semibold leading-tight tracking-[-0.03em] sm:text-5xl lg:text-6xl">
                        A process that remains useful when markets stop being comfortable.
                    </h2>
                </div>
                <p x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-xl text-base leading-8 text-white/55 lg:justify-self-end" style="--reveal-delay: 100ms">
                    Good investing is not about predicting every turn. It is about having a framework strong enough to make sensible decisions through different conditions—and flexible enough to adapt when the underlying facts change.
                </p>
            </div>

            <div x-data="{ active: 0 }" class="mt-14 grid overflow-hidden border border-white/10 lg:grid-cols-[.92fr_1.08fr]">
                <div class="divide-y divide-white/10">
                    @foreach([
                        ['Understand first', 'Objectives, constraints, liquidity needs and the role the capital needs to play come before allocation.'],
                        ['Research deeply', 'We examine the opportunity, the assumptions behind it and the risks that could change the outcome.'],
                        ['Allocate with purpose', 'Diversification is used to manage dependency and improve portfolio balance—not simply to collect more assets.'],
                        ['Review continuously', 'The portfolio is revisited as circumstances, valuations and opportunities evolve over time.'],
                    ] as $principle)
                        <button type="button" @mouseenter="active = {{ $loop->index }}" @focus="active = {{ $loop->index }}" @click="active = {{ $loop->index }}" class="group w-full p-6 text-left transition sm:p-7 lg:p-8" :class="active === {{ $loop->index }} ? 'bg-white/[0.07]' : 'hover:bg-white/[0.035]'">
                            <div class="grid grid-cols-[42px_1fr_auto] gap-4">
                                <span class="pt-1 text-[10px] font-bold tracking-[0.18em] text-bronze-300">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <div>
                                    <h3 class="font-display text-2xl font-semibold text-white sm:text-3xl">{{ $principle[0] }}</h3>
                                    <p class="mt-2 max-w-xl text-sm leading-7 text-white/48">{{ $principle[1] }}</p>
                                </div>
                                <span class="mt-1 flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-white/45 transition group-hover:border-bronze-300/30 group-hover:text-bronze-300">
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m7 5 5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            </div>
                        </button>
                    @endforeach
                </div>

                <div class="relative min-h-[430px] overflow-hidden border-t border-white/10 lg:min-h-0 lg:border-l lg:border-t-0">
                    @foreach($processImages as $processImage)
                        <div x-show="active === {{ $loop->index }}" x-transition.opacity.duration.500ms class="absolute inset-0">
                            <img src="{{ $processImage }}" alt="" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-ink-950/75 via-ink-950/8 to-transparent"></div>
                        </div>
                    @endforeach
                    <div class="absolute inset-x-0 bottom-0 p-7 sm:p-9">
                        <p class="max-w-md font-display text-3xl leading-tight text-white">Discipline is the advantage that can still matter when certainty is unavailable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($featuredPackages->isNotEmpty())
        <section class="bg-paper-100 py-20 sm:py-24 lg:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up grid gap-7 border-b border-ink-950/10 pb-9 lg:grid-cols-[1fr_.7fr] lg:items-end">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">Published investment plans</p>
                        <h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">Compare the structure. Then consider whether it fits the objective.</h2>
                    </div>
                    <p class="max-w-lg text-sm leading-7 text-ink-700 lg:justify-self-end">
                        Displayed rates are configured plan terms. Duration, funding range, liquidity and risk should be considered together rather than judging an option by return rate alone.
                    </p>
                </div>

                <div class="mt-8 grid gap-5 lg:grid-cols-3">
                    @foreach($featuredPackages as $package)
                        @php
                            $roi = (float) data_get($package, 'roi', 0);
                            $minAmount = (float) data_get($package, 'minAmount', 0);
                            $maxAmount = (float) data_get($package, 'maxAmount', 0);
                            $isUnlimited = (int) data_get($package, 'isUnlimited', 0) === 1;
                            $duration = data_get($package, 'Duration', '—');
                            $returnType = $option->getReturnType(data_get($package, 'returnType'));
                        @endphp
                        <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group flex flex-col border border-ink-950/[0.08] bg-white transition duration-500 hover:-translate-y-1 hover:border-bronze-500/30 hover:shadow-2xl hover:shadow-ink-950/[0.06]" style="--reveal-delay: {{ $loop->index * 75 }}ms">
                            <div class="border-b border-ink-950/[0.08] p-6 sm:p-7">
                                <div class="flex items-start justify-between gap-5">
                                    <div>
                                        <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-bronze-600">Plan {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                        <h3 class="mt-2 font-display text-3xl font-semibold leading-tight text-ink-950">{{ data_get($package, 'name') }}</h3>
                                    </div>
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-paper-100 text-bronze-700 transition group-hover:bg-bronze-200 group-hover:text-ink-950">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 14.5 8 10l3 2.5L16 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>

                                <div class="mt-8 flex items-end gap-2">
                                    <span class="font-display text-5xl font-semibold leading-none text-ink-950">{{ rtrim(rtrim(number_format($roi, 2), '0'), '.') }}%</span>
                                    <span class="pb-1 text-[10px] font-bold uppercase tracking-[0.14em] text-ink-600">{{ $returnType }}</span>
                                </div>
                                <p class="mt-3 text-xs leading-6 text-ink-600">Configured plan rate. Investment outcomes are not risk-free.</p>
                            </div>

                            <div class="flex flex-1 flex-col p-6 sm:p-7">
                                <dl class="divide-y divide-ink-950/[0.08] text-sm">
                                    <div class="flex items-start justify-between gap-4 py-3.5 first:pt-0">
                                        <dt class="text-ink-600">Minimum funding</dt>
                                        <dd class="font-semibold text-ink-950">${{ number_format($minAmount, 2) }}</dd>
                                    </div>
                                    <div class="flex items-start justify-between gap-4 py-3.5">
                                        <dt class="text-ink-600">Maximum funding</dt>
                                        <dd class="text-right font-semibold text-ink-950">{{ $isUnlimited ? 'Open-ended' : '$' . number_format($maxAmount, 2) }}</dd>
                                    </div>
                                    <div class="flex items-start justify-between gap-4 py-3.5">
                                        <dt class="text-ink-600">Duration</dt>
                                        <dd class="text-right font-semibold text-ink-950">{{ $duration }}</dd>
                                    </div>
                                </dl>
                                <a href="{{ url('/plans') }}" class="group/link mt-auto inline-flex items-center justify-between border-t border-ink-950/[0.08] pt-5 text-sm font-bold text-ink-950 transition hover:text-bronze-700">
                                    Review plan details
                                    <svg class="h-4 w-4 transition-transform group-hover/link:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-7 flex flex-col gap-4 border border-bronze-500/20 bg-bronze-100/55 p-5 text-sm leading-7 text-ink-700 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                    <p><strong class="text-ink-950">Investment context matters.</strong> Review your time horizon, liquidity needs and tolerance for loss before committing capital.</p>
                    <a href="{{ url('/plans') }}" class="shrink-0 font-bold text-ink-950 transition hover:text-bronze-700">View all plans →</a>
                </div>
            </div>
        </section>
    @endif

    @if($featuredSectors->isNotEmpty())
        <section class="bg-white py-20 sm:py-24 lg:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up flex flex-col gap-6 border-b border-ink-950/10 pb-9 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">Where we look</p>
                        <h2 class="mt-4 max-w-2xl font-display text-4xl font-semibold tracking-[-0.03em] text-ink-950 sm:text-5xl">Investment sectors, viewed through a portfolio lens.</h2>
                    </div>
                    <a href="{{ url('/services') }}" class="group inline-flex items-center gap-2 text-sm font-bold text-ink-950 hover:text-bronze-700">
                        Explore opportunities
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>

                <div class="divide-y divide-ink-950/10">
                    @foreach($featuredSectors as $sector)
                        @php($sectorSummary = trim(strip_tags((string) data_get($sector, 'short', ''))))
                        <a href="{{ route('service.details', ['id' => $sector->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group grid gap-5 py-7 sm:grid-cols-[88px_60px_1fr_auto] sm:items-center sm:py-8" style="--reveal-delay: {{ ($loop->iteration - 1) * 70 }}ms">
                            <div class="hidden h-16 w-20 overflow-hidden bg-ink-900 sm:block">
                                <img src="{{ $serviceFallbackImages[$loop->index % count($serviceFallbackImages)] }}" alt="" class="card-image h-full w-full object-cover">
                            </div>
                            <span class="text-xs font-bold tracking-[0.16em] text-bronze-600">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3 class="font-display text-2xl font-semibold text-ink-950 sm:text-3xl">{{ $sector->title }}</h3>
                                @if($sectorSummary !== '')
                                    <p class="mt-2 max-w-3xl text-sm leading-7 text-ink-700">{{ \Illuminate\Support\Str::limit($sectorSummary, 170) }}</p>
                                @endif
                            </div>
                            <span class="flex h-10 w-10 items-center justify-center rounded-full border border-ink-950/10 text-ink-950 transition duration-300 group-hover:border-bronze-500/40 group-hover:bg-bronze-100">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale grid overflow-hidden border border-ink-950/[0.08] bg-white lg:grid-cols-[.88fr_1.12fr]">
                <div class="border-b border-ink-950/[0.08] p-7 sm:p-10 lg:border-b-0 lg:border-r lg:p-12">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">Who we work with</p>
                    <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">
                        Different circumstances. One standard of care.
                    </h2>
                    <p class="mt-5 text-base leading-8 text-ink-700">
                        The right strategy depends on what the capital is for. Our process begins with that context rather than forcing every investor into the same answer.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2">
                    @foreach([
                        ['Individuals & families', 'Build and preserve wealth around life goals, future obligations and generational priorities.'],
                        ['Business owners', 'Think through personal and business capital with liquidity, concentration and transition in view.'],
                        ['Professionals & executives', 'Create a deliberate framework for savings, investments and long-term financial independence.'],
                        ['Institutions & partners', 'Approach capital with a structured conversation centred on mandate, risk and accountability.'],
                    ] as $audience)
                        <div class="group border-b border-ink-950/[0.08] p-7 transition duration-300 hover:bg-paper-50 sm:p-8 sm:border-r even:border-r-0 last:border-b-0 sm:[&:nth-last-child(2)]:border-b-0">
                            <span class="mb-8 flex h-10 w-10 items-center justify-center rounded-full bg-paper-100 text-bronze-700 transition duration-300 group-hover:bg-bronze-200 group-hover:text-ink-950">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                            </span>
                            <h3 class="text-base font-bold text-ink-950">{{ $audience[0] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-700">{{ $audience[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-paper-100 px-4 py-20 sm:px-6 sm:py-24 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale relative mx-auto max-w-7xl overflow-hidden bg-bronze-300 p-7 text-ink-950 sm:p-10 lg:p-14">
            <div class="cta-lines pointer-events-none absolute inset-0 opacity-45" aria-hidden="true"></div>
            <div class="relative grid gap-9 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-ink-950/55">The next step</p>
                    <h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight tracking-[-0.03em] sm:text-5xl lg:text-6xl">
                        Your capital should have a strategy you can explain.
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-ink-950/62">
                        Tell us what you are trying to achieve. We will start with the objectives, constraints and questions that matter before discussing an investment route.
                    </p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                    <a href="{{ url('/contact') }}" class="group inline-flex min-w-48 items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-ink-900">
                        Talk to our team
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ url('/register') }}" class="inline-flex min-w-48 items-center justify-center rounded-full border border-ink-950/20 px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:bg-ink-950/[0.05]">Open an account</a>
                </div>
            </div>
        </div>
    </section>
@endsection
