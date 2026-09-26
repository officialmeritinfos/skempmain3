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
    <section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
            <div x-data="revealOnScroll(.02)" :class="{ 'is-visible': shown }" class="reveal-up">
                <div class="flex items-center gap-3">
                    <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Wealth & asset management</p>
                </div>

                <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-[4.8rem] dark:text-white">
                    Build wealth with a strategy designed to outlast market noise.
                </h1>

                <p class="mt-7 max-w-2xl text-base leading-8 text-[#5a6672] sm:text-lg dark:text-white/62">
                    {{ config('app.name') }} brings investment thinking, asset stewardship and long-term planning into one disciplined framework—so each financial decision has a clear purpose.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ url('/register') }}" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">
                        Create an account
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ url('/services') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#132131]/14 bg-[#fbfaf7] px-6 py-3.5 text-sm font-bold text-[#132131] transition hover:border-[#9a7445]/45 hover:bg-white dark:border-white/12 dark:bg-white/6 dark:text-white dark:hover:border-[#e4c38f]/35 dark:hover:bg-white/10">
                        Explore services
                    </a>
                </div>

                <div class="mt-11 grid gap-5 border-t border-[#132131]/10 pt-7 sm:grid-cols-3 dark:border-white/10">
                    @foreach([
                        ['Long-term', 'Objectives before products'],
                        ['Disciplined', 'Risk considered with opportunity'],
                        ['Connected', 'Assets viewed as one strategy'],
                    ] as $signal)
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">{{ $signal[0] }}</p>
                            <p class="mt-2 text-sm font-semibold leading-6 text-[#344251] dark:text-white/72">{{ $signal[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale">
                <div class="relative mx-auto max-w-[37rem]">
                    <div class="overflow-hidden rounded-[2rem] border border-[#132131]/10 bg-[#d8d8d2] shadow-[0_28px_70px_rgba(15,23,42,.14)] dark:border-white/10 dark:bg-[#111c27] dark:shadow-[0_28px_70px_rgba(0,0,0,.28)]">
                        <img
                            src="{{ asset('home/images/banner/building1.jpg') }}"
                            alt="Modern financial district"
                            class="h-[31rem] w-full object-cover sm:h-[38rem]"
                        >
                    </div>

                    <div class="absolute left-4 top-4 rounded-xl bg-[#0b1b2b] px-4 py-3 text-white sm:left-6 sm:top-6">
                        <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-white/52">Our focus</p>
                        <p class="mt-1 text-sm font-semibold">Clarity before allocation.</p>
                    </div>

                    <div class="absolute inset-x-4 bottom-4 rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-5 shadow-[0_18px_45px_rgba(15,23,42,.16)] sm:inset-x-6 sm:bottom-6 sm:p-6 dark:border-white/10 dark:bg-[#0f1b27] dark:shadow-[0_18px_45px_rgba(0,0,0,.28)]">
                        <div class="flex items-start justify-between gap-5">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">A connected view of capital</p>
                                <p class="mt-2 max-w-md font-display text-xl font-bold tracking-[-0.025em] text-[#0b1b2b] sm:text-2xl dark:text-white">Growth, protection and liquidity should work together.</p>
                            </div>
                            <span class="hidden h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#ece5d7] text-[#7b5a32] sm:flex dark:bg-[#e4c38f]/10 dark:text-[#e4c38f]">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 18V9m5 9V5m5 13v-6m4 6V7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                            </span>
                        </div>

                        <div class="mt-5 grid grid-cols-3 gap-3 border-t border-[#132131]/8 pt-4 text-center dark:border-white/8">
                            @foreach([
                                ['Strategy', '01'],
                                ['Allocation', '02'],
                                ['Review', '03'],
                            ] as $item)
                                <div class="rounded-xl bg-[#f0ede5] px-2 py-3 dark:bg-white/5">
                                    <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-[#6e7782] dark:text-white/42">{{ $item[0] }}</p>
                                    <p class="mt-1 text-sm font-bold text-[#0b1b2b] dark:text-white">{{ $item[1] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#0b1b2b] text-white">
        <div class="mx-auto grid max-w-7xl grid-cols-2 gap-px bg-white/12 px-px sm:grid-cols-3 lg:grid-cols-5">
            @foreach([
                'Investment management',
                'Wealth strategy',
                'Asset stewardship',
                'Risk awareness',
                'Long-term planning',
            ] as $item)
                <div class="flex min-h-20 items-center justify-center bg-[#0b1b2b] px-4 text-center text-[10px] font-bold uppercase tracking-[0.16em] text-white/62">
                    {{ $item }}
                </div>
            @endforeach
        </div>
    </section>

    <section id="approach" class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.78fr_1.22fr] lg:items-end lg:gap-16">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                    <div class="flex items-center gap-3">
                        <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Our approach</p>
                    </div>
                    <h2 class="mt-5 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">A better process makes financial decisions easier to defend.</h2>
                </div>
                <p x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-2xl text-base leading-8 text-[#64707c] lg:justify-self-end dark:text-white/58">
                    We begin with what the capital is expected to do, then assess structure, risk, timing and fit. The product comes after the objective—not before it.
                </p>
            </div>

            <div class="mt-14 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                @foreach([
                    ['01', 'Understand', 'Define the objective, time horizon, liquidity needs and existing exposure.'],
                    ['02', 'Structure', 'Decide the role each part of the capital needs to play.'],
                    ['03', 'Allocate', 'Evaluate opportunities against the strategy rather than market noise.'],
                    ['04', 'Review', 'Reassess the strategy as markets, circumstances and priorities change.'],
                ] as $step)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#f7f5ef] p-6 transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_45px_rgba(15,23,42,.08)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->iteration - 1) * 65 }}ms">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-bold tracking-[0.16em] text-[#8a6538] dark:text-[#e4c38f]">{{ $step[0] }}</span>
                            <span class="h-2 w-2 rounded-full bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                        </div>
                        <h3 class="mt-10 font-display text-2xl font-bold tracking-[-0.025em]">{{ $step[1] }}</h3>
                        <p class="mt-4 text-sm leading-7 text-[#66717c] dark:text-white/54">{{ $step[2] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#f0ede5] py-24 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-28">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:gap-16 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <div class="overflow-hidden rounded-[2rem] border border-[#132131]/10 bg-[#d8d8d2] dark:border-white/10 dark:bg-[#111c27]">
                    <img src="{{ asset('home/images/resource/about-2.jpg') }}" alt="Investment advisory discussion" class="aspect-[4/3] h-full w-full object-cover">
                </div>
            </div>

            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Why the wider picture matters</p>
                </div>
                <h2 class="mt-5 max-w-2xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Capital works better when every decision has a reason behind it.</h2>
                <div class="mt-6 max-w-2xl space-y-4 text-base leading-8 text-[#626e79] dark:text-white/58">
                    @if($aboutCopy !== '')
                        <p>{{ $aboutCopy }}</p>
                    @else
                        <p>{{ config('app.name') }} connects wealth strategy, investment thinking and asset stewardship so clients can make decisions with more structure and less noise.</p>
                    @endif
                    <p>We look beyond a single return figure or market opportunity to the role that capital plays across growth, preservation, liquidity and future flexibility.</p>
                </div>

                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    @foreach([
                        ['Purpose first', 'Know what the capital is for before deciding where it should go.'],
                        ['Risk in context', 'Consider downside, concentration and liquidity alongside upside.'],
                        ['Clear structure', 'Give every allocation a role within the wider strategy.'],
                        ['Ongoing review', 'Keep the plan relevant as priorities and markets evolve.'],
                    ] as $item)
                        <div class="rounded-xl border border-[#132131]/10 bg-[#fbfaf7] p-4 dark:border-white/10 dark:bg-white/5">
                            <p class="text-sm font-bold text-[#172737] dark:text-white">{{ $item[0] }}</p>
                            <p class="mt-1.5 text-xs leading-5 text-[#6b7680] dark:text-white/48">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>

                <a href="{{ url('/about') }}" class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">
                    Learn more about us <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-7 lg:flex-row lg:items-end lg:justify-between">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
                    <div class="flex items-center gap-3">
                        <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Capabilities</p>
                    </div>
                    <h2 class="mt-5 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">Services designed to work as one system.</h2>
                </div>
                <a href="{{ url('/services') }}" class="inline-flex w-fit items-center gap-2 text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">
                    View all services <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                @forelse($coreServices as $service)
                    <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group overflow-hidden rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_50px_rgba(15,23,42,.09)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->index % 6) * 60 }}ms">
                        @if(!empty($service->photo))
                            <div class="aspect-[16/9] overflow-hidden bg-[#d8d8d2] dark:bg-[#111c27]">
                                <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.025]" loading="lazy">
                            </div>
                        @endif
                        <div class="p-6 sm:p-7">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Service {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="text-lg text-[#8b949c] transition group-hover:text-[#7b5a32] dark:text-white/35 dark:group-hover:text-[#e4c38f]">↗</span>
                            </div>
                            <h3 class="mt-7 font-display text-2xl font-bold tracking-[-0.025em]">{{ $service->title }}</h3>
                            <p class="mt-4 text-sm leading-7 text-[#65717d] dark:text-white/54">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) ($service->short ?: $service->content))), 150) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-dashed border-[#132131]/15 bg-[#fbfaf7] p-10 text-center text-[#6c7782] dark:border-white/15 dark:bg-white/3 dark:text-white/45">
                        Services will appear here once they are published.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @if($featuredSectors->isNotEmpty())
        <section class="bg-[#0b1b2b] py-24 text-white sm:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[.9fr_1.1fr] lg:items-end">
                    <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                        <div class="flex items-center gap-3">
                            <span class="h-px w-8 bg-[#e4c38f]"></span>
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Investment areas</p>
                        </div>
                        <h2 class="mt-5 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl">Different markets. One disciplined lens.</h2>
                    </div>
                    <p class="max-w-2xl text-base leading-8 text-white/58 lg:justify-self-end">Every asset class behaves differently. The role, risk, time horizon and liquidity profile should be understood before capital is committed.</p>
                </div>

                <div class="mt-12 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    @foreach($featuredSectors as $sector)
                        <a href="{{ route('service.details', ['id' => $sector->id]) }}" class="group rounded-2xl border border-white/12 bg-white/5 p-6 transition hover:-translate-y-1 hover:border-[#e4c38f]/35 hover:bg-white/8">
                            <div class="flex items-center justify-between gap-3">
                                <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#e4c38f]">0{{ $loop->iteration }}</span>
                                <span class="text-white/34 transition group-hover:text-[#e4c38f]">↗</span>
                            </div>
                            <h3 class="mt-9 font-display text-2xl font-bold">{{ $sector->title }}</h3>
                            <p class="mt-4 text-sm leading-7 text-white/52">{{ \Illuminate\Support\Str::limit(trim(strip_tags((string) ($sector->short ?: $sector->content))), 120) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @auth
        <section class="bg-[#f5f3ed] py-24 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[.72fr_1.28fr] lg:gap-16">
                    <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                        <div class="flex items-center gap-3">
                            <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Investment plans</p>
                        </div>
                        <h2 class="mt-5 font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl">See the terms. Then judge the fit.</h2>
                        <p class="mt-5 text-base leading-8 text-[#64707c] dark:text-white/56">A return rate is only one part of the decision. Duration, liquidity, risk and the wider objective matter too.</p>
                        <a href="{{ url('/plans') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">View all plans →</a>
                    </div>

                    <div class="grid gap-5 lg:grid-cols-3">
                        @forelse($featuredPlans as $package)
                            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up flex flex-col rounded-2xl border border-[#132131]/10 bg-white p-6 transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_50px_rgba(15,23,42,.09)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->iteration - 1) * 70 }}ms">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Plan {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                    <h3 class="mt-3 font-display text-2xl font-bold">{{ $package->name }}</h3>
                                </div>

                                <div class="mt-7 border-y border-[#132131]/8 py-5 dark:border-white/8">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#79828b] dark:text-white/38">Published return</p>
                                    <p class="mt-2 font-display text-4xl font-bold tracking-[-0.04em]">{{ rtrim(rtrim(number_format((float) $package->roi, 2), '0'), '.') }}%</p>
                                </div>

                                <div class="mt-6 space-y-4 text-sm">
                                    <div class="flex items-center justify-between gap-4"><span class="text-[#7a848d] dark:text-white/42">Duration</span><span class="font-semibold">{{ $package->Duration }}</span></div>
                                    <div class="flex items-center justify-between gap-4"><span class="text-[#7a848d] dark:text-white/42">Return type</span><span class="text-right font-semibold">{{ $option->getReturnType($package->returnType) }}</span></div>
                                    <div class="flex items-center justify-between gap-4"><span class="text-[#7a848d] dark:text-white/42">Minimum</span><span class="font-semibold">&#36;{{ number_format((float) $package->minAmount, 2) }}</span></div>
                                </div>

                                <div class="mt-auto pt-7">
                                    <a href="{{ url('/plans') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-[#0b1b2b] px-5 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Review plan</a>
                                </div>
                            </article>
                        @empty
                            <div class="lg:col-span-3 rounded-2xl border border-dashed border-[#132131]/15 bg-white p-10 text-center text-[#6c7782] dark:border-white/15 dark:bg-white/3 dark:text-white/45">No investment plans are currently published.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @endauth

    <section class="bg-[#e9e3d7] py-20 text-[#132131] dark:bg-[#101c27] dark:text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale rounded-[2rem] border border-[#132131]/10 bg-[#fbfaf7] p-7 shadow-[0_22px_60px_rgba(15,23,42,.08)] sm:p-10 lg:p-12 dark:border-white/10 dark:bg-[#0b1b2b] dark:shadow-[0_22px_60px_rgba(0,0,0,.2)]">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Your next step</p>
                        <h2 class="mt-5 max-w-4xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl lg:text-6xl">Good wealth decisions start with a clear objective.</h2>
                        <p class="mt-5 max-w-2xl text-base leading-8 text-[#64707c] dark:text-white/56">Create an account to explore the client experience, or speak with the team if you would rather start with context before choosing a service or plan.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ url('/register') }}" class="inline-flex min-w-52 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Create account</a>
                        <a href="{{ url('/contact') }}" class="inline-flex min-w-52 items-center justify-center rounded-xl border border-[#132131]/12 bg-white px-6 py-3.5 text-sm font-bold text-[#132131] transition hover:border-[#9a7445]/35 dark:border-white/12 dark:bg-white/6 dark:text-white dark:hover:border-[#e4c38f]/30">Talk to us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
