@extends('layouts.marketing')

@section('title', config('app.name') . ' | About Us')
@section('meta_description', 'Learn how ' . config('app.name') . ' approaches wealth, asset and investment management with discipline, clarity and long-term thinking.')

@php
    $aboutCopy = trim(strip_tags((string) ($web?->description ?? '')));
@endphp

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="absolute inset-0 -z-30">
        <img src="{{ asset('home/images/banner/banner-6.jpg') }}" alt="" class="h-full w-full object-cover opacity-45" fetchpriority="high">
    </div>
    <div class="absolute inset-0 -z-20 bg-[linear-gradient(90deg,rgba(2,6,23,.95),rgba(2,6,23,.78)_46%,rgba(2,6,23,.7))]"></div>
    <div class="mesh-grid absolute inset-0 -z-10 opacity-45"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>

    <div class="mx-auto grid min-h-[650px] max-w-7xl items-center gap-14 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1.05fr_.95fr] lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl">
                <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>
                About {{ config('app.name') }}
            </span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.96] tracking-[-0.05em] sm:text-6xl lg:text-7xl xl:text-[5.2rem]">
                Built around <span class="aurora-text">clarity, discipline and stewardship.</span>
            </h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/70 sm:text-lg">
                {{ config('app.name') }} is focused on helping clients make better-informed decisions about wealth, assets and investment opportunities with a framework that respects both growth and risk.
            </p>
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/services') }}" class="glow-button-primary inline-flex items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">Explore our services</a>
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-xl transition hover:bg-white/10">Talk to our team</a>
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="glass-panel glow-border rounded-[2rem] p-6 sm:p-7">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200/80">What guides the work</p>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach([
                        ['01', 'Clarity first', 'Understand the objective before choosing the strategy.'],
                        ['02', 'Risk in context', 'Growth matters, but so does understanding what can go wrong.'],
                        ['03', 'Long-term thinking', 'Good decisions should remain defensible beyond the next headline.'],
                        ['04', 'Active stewardship', 'Capital should be reviewed, monitored and kept aligned with its purpose.'],
                    ] as $principle)
                        <div class="rounded-[1.4rem] border border-white/10 bg-slate-950/35 p-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-fuchsia-200/75">{{ $principle[0] }}</p>
                            <h2 class="mt-3 text-lg font-semibold text-white">{{ $principle[1] }}</h2>
                            <p class="mt-2 text-sm leading-6 text-white/60">{{ $principle[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-14 px-4 sm:px-6 lg:grid-cols-[.92fr_1.08fr] lg:items-center lg:px-8 lg:gap-16">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale relative min-h-[500px]">
            <div class="absolute left-0 top-0 h-[78%] w-[76%] overflow-hidden rounded-[2rem] border border-white/10 shadow-[0_24px_70px_rgba(0,0,0,.35)]">
                <img src="{{ asset('home/images/banner/building1.jpg') }}" alt="{{ config('app.name') }}" class="story-image h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050816]/70 via-transparent to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 w-[58%] rounded-[1.6rem] border border-cyan-300/20 bg-cyan-300/8 p-5 shadow-[0_0_30px_rgba(34,211,238,.12)] backdrop-blur-2xl">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/80">Our perspective</p>
                <p class="mt-3 font-display text-2xl font-semibold leading-snug text-white">Capital works better when every decision has a reason behind it.</p>
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
            <p class="text-xs font-bold uppercase tracking-[0.24em] text-cyan-200/80">Who we are</p>
            <h2 class="mt-4 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">A modern wealth and investment company with a more deliberate way of thinking about capital.</h2>
            <div class="mt-7 max-w-2xl space-y-5 text-base leading-8 text-white/68">
                @if($aboutCopy !== '')
                    <p>{{ $aboutCopy }}</p>
                @else
                    <p>{{ config('app.name') }} brings wealth management, investment thinking and asset stewardship into one connected framework so clients can make decisions with greater clarity and structure.</p>
                @endif
                <p>Rather than treating every product or opportunity as a standalone decision, we look at the wider picture: the role of the capital, the intended time horizon, liquidity needs, risk tolerance and the outcome the client is trying to achieve.</p>
                <p>That mindset shapes how we present opportunities, how we communicate risk and how we think about long-term value creation.</p>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#030712] py-24 text-white sm:py-28">
    <div class="mesh-grid absolute inset-0 opacity-35"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <p class="text-xs font-bold uppercase tracking-[0.24em] text-fuchsia-200/80">How we think</p>
            <h2 class="mt-4 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl lg:text-6xl">A stronger process creates better financial conversations.</h2>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            @foreach([
                ['01', 'Understand', 'Start with the objective, current position and constraints.'],
                ['02', 'Structure', 'Define the role the capital needs to play and the risk it can reasonably carry.'],
                ['03', 'Allocate', 'Select plans, assets or services that fit the intended strategy.'],
                ['04', 'Review', 'Reassess the strategy as circumstances, markets and priorities change.'],
            ] as $step)
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card rounded-[1.7rem] border border-white/10 bg-white/[0.05] p-6 backdrop-blur-xl" style="--reveal-delay: {{ ($loop->iteration - 1) * 75 }}ms">
                    <span class="inline-flex rounded-full border border-cyan-300/20 bg-cyan-300/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200">{{ $step[0] }}</span>
                    <h3 class="mt-8 font-display text-2xl font-semibold text-white">{{ $step[1] }}</h3>
                    <p class="mt-4 text-sm leading-7 text-white/62">{{ $step[2] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-end">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-cyan-200/80">Work with us</p>
                <h2 class="mt-4 max-w-4xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl lg:text-6xl">Start with what you want your capital to achieve.</h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-white/68">We can then help you understand which available services or investment structures may deserve a closer look.</p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="{{ url('/contact') }}" class="glow-button-primary inline-flex min-w-52 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Start a conversation</a>
                <a href="{{ url('/plans') }}" class="inline-flex min-w-52 items-center justify-center rounded-full border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">View investment plans</a>
            </div>
        </div>
    </div>
</section>
@endsection
