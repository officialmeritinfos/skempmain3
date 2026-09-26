@extends('layouts.marketing')

@section('title', config('app.name') . ' | About Us')
@section('meta_description', 'Learn how ' . config('app.name') . ' approaches wealth, asset and investment management with discipline, clarity and long-term thinking.')

@php
    $aboutCopy = trim(strip_tags((string) ($web?->description ?? '')));
@endphp

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">About {{ config('app.name') }}</p>
            </div>
            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Clarity, discipline and stewardship should shape every capital decision.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">{{ config('app.name') }} helps clients think deliberately about wealth, assets and investment opportunities with a framework that respects both ambition and risk.</p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/services') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Explore our services</a>
                <a href="{{ url('/contact') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#132131]/14 bg-[#fbfaf7] px-6 py-3.5 text-sm font-bold text-[#132131] transition hover:border-[#9a7445]/40 dark:border-white/12 dark:bg-white/6 dark:text-white">Talk to our team</a>
            </div>
        </div>

        <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="overflow-hidden rounded-[2rem] border border-[#132131]/10 bg-white shadow-[0_28px_70px_rgba(15,23,42,.12)] dark:border-white/10 dark:bg-[#101e2c]">
                <img src="{{ asset('home/images/banner/banner-6.jpg') }}" alt="{{ config('app.name') }} perspective" class="aspect-[16/11] w-full object-cover">
                <div class="p-6 sm:p-7">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Our perspective</p>
                    <p class="mt-3 font-display text-2xl font-bold leading-snug tracking-[-0.025em] text-[#0b1b2b] dark:text-white">Capital works better when every decision has a reason behind it.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-14 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:gap-16 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="overflow-hidden rounded-[2rem] border border-[#132131]/10 bg-[#dedbd2] dark:border-white/10 dark:bg-[#111c27]">
                <img src="{{ asset('home/images/banner/building1.jpg') }}" alt="{{ config('app.name') }}" class="aspect-[4/3] h-full w-full object-cover">
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Who we are</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">A more deliberate way of thinking about capital.</h2>
            <div class="mt-7 max-w-2xl space-y-5 text-base leading-8 text-[#64707b] dark:text-white/56">
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

<section class="bg-[#f0ede5] py-24 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">What guides the work</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Principles strong enough to survive changing markets.</h2>
        </div>

        <div class="mt-12 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @foreach([
                ['01', 'Clarity first', 'Understand the objective before choosing the strategy.'],
                ['02', 'Risk in context', 'Growth matters, but so does understanding what can go wrong.'],
                ['03', 'Long-term thinking', 'Good decisions should remain defensible beyond the next headline.'],
                ['04', 'Active stewardship', 'Capital should be reviewed, monitored and kept aligned with its purpose.'],
            ] as $principle)
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_45px_rgba(15,23,42,.07)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->iteration - 1) * 60 }}ms">
                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">{{ $principle[0] }}</span>
                    <h3 class="mt-8 font-display text-2xl font-bold tracking-[-0.025em]">{{ $principle[1] }}</h3>
                    <p class="mt-3 text-sm leading-7 text-[#66717c] dark:text-white/54">{{ $principle[2] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Work with us</p>
            <h2 class="mt-5 max-w-4xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Start with what you want your capital to achieve.</h2>
            <p class="mt-5 max-w-2xl text-base leading-8 text-white/58">From there, we can discuss which available services or investment structures deserve a closer look.</p>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
            <a href="{{ url('/contact') }}" class="inline-flex min-w-52 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Start a conversation</a>
            <a href="{{ url('/plans') }}" class="inline-flex min-w-52 items-center justify-center rounded-xl border border-white/16 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-white/7">View investment plans</a>
        </div>
    </div>
</section>
@endsection