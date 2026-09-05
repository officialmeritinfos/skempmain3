@extends('layouts.marketing')

@section('title', config('app.name') . ' | ' . $service->title)
@section('meta_description', \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 155))

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div>
    <div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
            <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-cyan-200 transition hover:text-white">← All services</a>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">{{ $service->title }}</h1>
            @if(!empty($service->short))
                <p class="mt-7 max-w-2xl text-base leading-8 text-white/68 sm:text-lg">{{ trim(strip_tags($service->short)) }}</p>
            @endif
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/contact') }}" class="glow-button-primary inline-flex items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Discuss your objective</a>
                <a href="{{ url('/plans') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">View investment plans</a>
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="glass-panel glow-border relative overflow-hidden rounded-[2rem]">
                @if(!empty($service->photo))
                    <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="aspect-[4/3] w-full object-cover" loading="eager">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#040813]/85 via-[#040813]/10 to-transparent"></div>
                @else
                    <div class="aspect-[4/3] bg-[radial-gradient(circle_at_70%_30%,rgba(168,85,247,.22),transparent_32%),radial-gradient(circle_at_30%_70%,rgba(34,211,238,.18),transparent_30%),linear-gradient(145deg,#07111e,#030712)]"></div>
                @endif
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8"><p class="text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200">{{ config('app.name') }}</p><p class="mt-2 max-w-md font-display text-2xl font-semibold leading-snug">Strategy starts with understanding what this service needs to do for you.</p></div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.72fr_1.28fr] lg:gap-16 lg:px-8">
        <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Service overview</p>
            <h2 class="mt-4 font-display text-4xl font-bold leading-tight">Context before implementation.</h2>
            <p class="mt-5 text-sm leading-7 text-white/62">The right structure depends on objectives, time horizon, liquidity needs and risk tolerance. This page explains the service in general terms.</p>
            <a href="{{ url('/contact') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-cyan-200 transition hover:text-white">Talk to our team →</a>
        </aside>

        <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[2rem] p-7 sm:p-10 lg:p-12" style="--reveal-delay: 100ms">
            <div class="rich-content">
                {!! str_replace('MYSITE', config('app.name'), $service->content) !!}
            </div>
        </article>
    </div>
</section>

<section class="bg-[#030712] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-200/80">The next step</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight sm:text-5xl">Understand the objective before choosing the structure.</h2></div>
            <a href="{{ url('/contact') }}" class="glow-button-primary mt-7 inline-flex shrink-0 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Start a conversation</a>
        </div>
    </div>
</section>
@endsection
