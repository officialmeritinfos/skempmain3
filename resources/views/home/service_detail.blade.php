@extends('layouts.marketing')

@section('title', config('app.name') . ' | ' . $service->title)
@section('meta_description', \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 155))

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">← All services</a>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">{{ $service->title }}</h1>
            @if(!empty($service->short))
                <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">{{ trim(strip_tags($service->short)) }}</p>
            @endif

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/contact') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Discuss your objective</a>
                <a href="{{ url('/plans') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#132131]/14 bg-[#fbfaf7] px-6 py-3.5 text-sm font-bold text-[#132131] transition hover:border-[#9a7445]/40 dark:border-white/12 dark:bg-white/6 dark:text-white">View investment plans</a>
            </div>
        </div>

        <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="overflow-hidden rounded-[2rem] border border-[#132131]/10 bg-white shadow-[0_28px_70px_rgba(15,23,42,.12)] dark:border-white/10 dark:bg-[#101e2c]">
                @if(!empty($service->photo))
                    <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="aspect-[4/3] w-full object-cover" loading="eager">
                @else
                    <div class="flex aspect-[4/3] items-center justify-center bg-[#0b1b2b] p-10 text-center text-white">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#e4c38f]">{{ config('app.name') }}</p>
                            <p class="mt-3 font-display text-3xl font-bold">Strategy before implementation.</p>
                        </div>
                    </div>
                @endif
                <div class="p-6 sm:p-7">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">How we approach it</p>
                    <p class="mt-3 font-display text-2xl font-bold leading-snug tracking-[-0.025em] text-[#0b1b2b] dark:text-white">Understand what this service needs to do before deciding how it should be structured.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.72fr_1.28fr] lg:gap-16 lg:px-8">
        <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Service overview</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em]">Context before implementation.</h2>
            <p class="mt-5 text-sm leading-7 text-[#64707b] dark:text-white/56">The right structure depends on objectives, time horizon, liquidity needs and risk tolerance. This page explains the service in general terms.</p>
            <a href="{{ url('/contact') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">Talk to our team →</a>
        </aside>

        <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-7 sm:p-10 lg:p-12 dark:border-white/10 dark:bg-white/4" style="--reveal-delay: 80ms">
            <div class="rich-content">
                {!! str_replace('MYSITE', config('app.name'), $service->content) !!}
            </div>
        </article>
    </div>
</section>

<section class="bg-[#e9e3d7] py-20 text-[#132131] dark:bg-[#101c27] dark:text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">The next step</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Understand the objective before choosing the structure.</h2>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Start a conversation</a>
    </div>
</section>
@endsection