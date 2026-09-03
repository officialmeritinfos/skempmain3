@extends('layouts.marketing')

@section('title', config('app.name') . ' | Contact')
@section('meta_description', 'Contact our team to discuss investment, wealth and asset management objectives.')

@section('content')
<section class="relative overflow-hidden bg-ink-950 text-white">
    <div class="absolute inset-0 opacity-60" aria-hidden="true"><div class="absolute -right-20 top-10 h-96 w-96 rounded-full border border-bronze-300/10"></div><div class="absolute right-24 top-36 h-56 w-56 rounded-full border border-white/5"></div></div>
    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1fr_.78fr] lg:items-end lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up"><p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Contact</p><h1 class="mt-5 max-w-4xl font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Start with the objective. We can discuss the route from there.</h1></div>
        <p class="text-base leading-8 text-white/58 lg:pb-2">Whether you are evaluating an investment, restructuring a portfolio or simply need clarity on an existing account, use the official contact details below.</p>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 md:grid-cols-3">
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[1.7rem] border border-ink-950/8 bg-white p-6 sm:p-7"><span class="flex h-11 w-11 items-center justify-center rounded-full bg-bronze-100 text-bronze-700"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="11" r="2.5" stroke="currentColor" stroke-width="1.5"/></svg></span><p class="mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600">Visit</p><h2 class="mt-2 font-display text-2xl font-semibold text-ink-950">Office address</h2><div class="mt-3 text-sm leading-7 text-ink-700">{!! $web->address ?: 'Contact us for the current office address.' !!}</div></article>
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[1.7rem] border border-ink-950/8 bg-white p-6 sm:p-7" style="--reveal-delay: 70ms"><span class="flex h-11 w-11 items-center justify-center rounded-full bg-bronze-100 text-bronze-700"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4V5Z" stroke="currentColor" stroke-width="1.5"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.5"/></svg></span><p class="mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600">Write</p><h2 class="mt-2 font-display text-2xl font-semibold text-ink-950">Email</h2>@if($web->email)<a href="mailto:{{ $web->email }}" class="mt-3 block break-all text-sm font-semibold leading-7 text-ink-950 transition hover:text-bronze-700">{{ $web->email }}</a>@else<p class="mt-3 text-sm text-ink-700">Email contact is not currently published.</p>@endif</article>
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[1.7rem] border border-ink-950/8 bg-white p-6 sm:p-7" style="--reveal-delay: 140ms"><span class="flex h-11 w-11 items-center justify-center rounded-full bg-bronze-100 text-bronze-700"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M6 3h4l2 5-2.5 1.5a15 15 0 0 0 5 5L16 12l5 2v4c0 1.1-.9 2-2 2C10.7 20 4 13.3 4 5c0-1.1.9-2 2-2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span><p class="mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600">Call</p><h2 class="mt-2 font-display text-2xl font-semibold text-ink-950">Phone</h2>@if($web->phone)<a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="mt-3 block text-sm font-semibold leading-7 text-ink-950 transition hover:text-bronze-700">{{ $web->phone }}</a>@else<p class="mt-3 text-sm text-ink-700">Phone contact is not currently published.</p>@endif</article>
        </div>

        <div class="mt-14 grid overflow-hidden rounded-[2rem] border border-ink-950/8 bg-white lg:grid-cols-[1.05fr_.95fr]">
            <div class="p-7 sm:p-10 lg:p-12"><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Before you contact us</p><h2 class="mt-4 max-w-xl font-display text-4xl font-semibold leading-tight text-ink-950 sm:text-5xl">A useful first conversation starts with context.</h2><p class="mt-5 max-w-xl text-base leading-8 text-ink-700">You do not need to arrive with a product in mind. Tell us what the capital is for, when it may be needed, what you already own and what is making the decision difficult.</p></div>
            <div class="border-t border-ink-950/8 bg-paper-100 p-7 sm:p-10 lg:border-l lg:border-t-0 lg:p-12">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Helpful context</p>
                <div class="mt-7 space-y-5">@foreach([['Objective','What are you trying to grow, preserve, fund or simplify?'],['Time horizon','When might this capital need to become available?'],['Liquidity','What money must remain accessible outside the investment?'],['Existing exposure','What assets, businesses or currencies already dominate your financial position?']] as $item)<div class="border-t border-ink-950/10 pt-5 first:border-t-0 first:pt-0"><h3 class="text-sm font-bold text-ink-950">{{ $item[0] }}</h3><p class="mt-1 text-sm leading-7 text-ink-700">{{ $item[1] }}</p></div>@endforeach</div>
            </div>
        </div>
    </div>
</section>

<section class="bg-ink-900 py-20 text-white sm:py-24"><div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8"><div><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Existing client?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">For account-specific matters, use your authenticated account where possible.</h2></div><a href="{{ url('/login') }}" class="inline-flex min-w-48 items-center justify-center rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-bronze-200">Client login</a></div></section>
@endsection
