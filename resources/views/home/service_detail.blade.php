@extends('layouts.marketing')

@section('title', config('app.name') . ' | ' . $service->title)
@section('meta_description', \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 155))

@section('content')
<section class="bg-ink-950 text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.02fr_.98fr] lg:items-center lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
            <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-bronze-300 transition hover:text-bronze-200"><svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="m12.5 5-5 5 5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg> All services</a>
            <h1 class="mt-6 max-w-4xl font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">{{ $service->title }}</h1>
            @if(!empty($service->short))
                <p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg">{{ trim(strip_tags($service->short)) }}</p>
            @endif
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-bronze-200">Discuss your objective</a>
                <a href="{{ url('/plans') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">View investment plans</a>
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.04] shadow-2xl shadow-black/20">
                @if(!empty($service->photo))
                    <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="aspect-[4/3] w-full object-cover" loading="eager">
                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950/55 via-transparent to-transparent"></div>
                @else
                    <div class="aspect-[4/3] bg-[radial-gradient(circle_at_70%_30%,rgba(213,182,125,.22),transparent_32%),linear-gradient(145deg,#10232a,#08171d)]"></div>
                @endif
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8"><p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">{{ config('app.name') }}</p><p class="mt-2 max-w-md font-display text-2xl leading-snug">Strategy starts with understanding what this service needs to do for you.</p></div>
            </div>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.72fr_1.28fr] lg:gap-20 lg:px-8">
        <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Service overview</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-ink-950">Context before implementation.</h2>
            <p class="mt-5 text-sm leading-7 text-ink-700">The information here explains the service in general terms. The right structure depends on objectives, time horizon, liquidity needs and risk tolerance.</p>
            <div class="mt-7 border-t border-ink-950/10 pt-6"><a href="{{ url('/contact') }}" class="group inline-flex items-center gap-2 text-sm font-bold text-ink-950 hover:text-bronze-700">Talk to our team <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="none"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div>
        </aside>

        <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[2rem] border border-ink-950/8 bg-white p-7 shadow-sm sm:p-10 lg:p-12" style="--reveal-delay: 100ms">
            <div class="prose prose-slate max-w-none prose-headings:font-display prose-headings:font-semibold prose-headings:tracking-[-0.02em] prose-p:leading-8 prose-li:leading-7 prose-a:text-bronze-700 prose-strong:text-ink-950">
                {!! str_replace('MYSITE', config('app.name'), $service->content) !!}
            </div>
        </article>
    </div>
</section>

<section class="bg-paper-100 py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] bg-bronze-300 p-7 text-ink-950 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-ink-950/55">The next step</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">Understand the objective before choosing the structure.</h2></div>
            <a href="{{ url('/contact') }}" class="mt-7 inline-flex shrink-0 items-center justify-center rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900 lg:mt-0">Start a conversation</a>
        </div>
    </div>
</section>
@endsection
