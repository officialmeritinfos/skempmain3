@extends('layouts.marketing')

@section('title', config('app.name') . ' | Contact')
@section('meta_description', 'Contact ' . config('app.name') . ' to discuss investment, wealth and asset management objectives.')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1fr_.78fr] lg:items-end lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl"><span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>Contact</span>
            <h1 class="mt-8 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Start with the objective. <span class="aurora-text">We can discuss the route from there.</span></h1>
        </div>
        <p class="text-base leading-8 text-white/62 lg:pb-2">Whether you are evaluating an investment, restructuring a portfolio or simply need clarity on an existing account, use the official contact details below.</p>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 md:grid-cols-3">
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.7rem] p-6 sm:p-7">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-300/10 text-cyan-200"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="11" r="2.5" stroke="currentColor" stroke-width="1.5"/></svg></span>
                <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200/75">Visit</p><h2 class="mt-2 font-display text-2xl font-semibold">Office address</h2><div class="mt-3 text-sm leading-7 text-white/64">{!! $web->address ?: 'Contact us for the current office address.' !!}</div>
            </article>
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.7rem] p-6 sm:p-7" style="--reveal-delay: 70ms">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-fuchsia-300/20 bg-fuchsia-300/10 text-fuchsia-200"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4V5Z" stroke="currentColor" stroke-width="1.5"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.5"/></svg></span>
                <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-fuchsia-200/75">Write</p><h2 class="mt-2 font-display text-2xl font-semibold">Email</h2>@if($web->email)<a href="mailto:{{ $web->email }}" class="mt-3 block break-all text-sm font-semibold leading-7 text-white transition hover:text-cyan-200">{{ $web->email }}</a>@else<p class="mt-3 text-sm text-white/60">Email contact is not currently published.</p>@endif
            </article>
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up glass-panel rounded-[1.7rem] p-6 sm:p-7" style="--reveal-delay: 140ms">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl border border-amber-300/20 bg-amber-300/10 text-amber-200"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M6 3h4l2 5-2.5 1.5a15 15 0 0 0 5 5L16 12l5 2v4c0 1.1-.9 2-2 2C10.7 20 4 13.3 4 5c0-1.1.9-2 2-2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-amber-200/75">Call</p><h2 class="mt-2 font-display text-2xl font-semibold">Phone</h2>@if($web->phone)<a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="mt-3 block text-sm font-semibold leading-7 text-white transition hover:text-cyan-200">{{ $web->phone }}</a>@else<p class="mt-3 text-sm text-white/60">Phone contact is not currently published.</p>@endif
            </article>
        </div>

        <div class="mt-14 grid overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.045] backdrop-blur-xl lg:grid-cols-[1.05fr_.95fr]">
            <div class="p-7 sm:p-10 lg:p-12"><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Before you contact us</p><h2 class="mt-4 max-w-xl font-display text-4xl font-bold leading-tight sm:text-5xl">A useful first conversation starts with context.</h2><p class="mt-5 max-w-xl text-base leading-8 text-white/64">You do not need to arrive with a product in mind. Tell us what the capital is for, when it may be needed, what you already own and what is making the decision difficult.</p></div>
            <div class="border-t border-white/10 bg-slate-950/28 p-7 sm:p-10 lg:border-l lg:border-t-0 lg:p-12">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-200/80">Helpful context</p>
                <div class="mt-7 space-y-5">@foreach([['Objective','What are you trying to grow, preserve, fund or simplify?'],['Time horizon','When might this capital need to become available?'],['Liquidity','What money must remain accessible outside the investment?'],['Existing exposure','What assets, businesses or currencies already dominate your financial position?']] as $item)<div class="border-t border-white/10 pt-5 first:border-t-0 first:pt-0"><h3 class="text-sm font-bold text-white">{{ $item[0] }}</h3><p class="mt-1 text-sm leading-7 text-white/60">{{ $item[1] }}</p></div>@endforeach</div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#030712] py-24 text-white sm:py-28"><div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-10 lg:p-12"><div><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Existing client?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight sm:text-5xl">For account-specific matters, use your authenticated account where possible.</h2></div><a href="{{ url('/login') }}" class="glow-button-primary mt-7 inline-flex min-w-48 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Client login</a></div></div></section>
@endsection
