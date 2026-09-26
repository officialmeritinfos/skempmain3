@extends('layouts.marketing')

@section('title', config('app.name') . ' | Contact')
@section('meta_description', 'Contact ' . config('app.name') . ' to discuss investment, wealth and asset management objectives.')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1fr_.72fr] lg:items-end lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Contact</p>
            </div>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Start with the objective. We can discuss the route from there.</h1>
        </div>
        <p class="text-base leading-8 text-[#64707b] lg:pb-1 dark:text-white/56">Whether you are evaluating an investment, restructuring a portfolio or need clarity on an existing account, use the official contact details below.</p>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-3">
            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 sm:p-7 dark:border-white/10 dark:bg-white/4">
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ece5d7] text-[#7b5a32] dark:bg-[#e4c38f]/10 dark:text-[#e4c38f]"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="11" r="2.5" stroke="currentColor" stroke-width="1.5"/></svg></span>
                <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Visit</p>
                <h2 class="mt-2 font-display text-2xl font-bold">Office address</h2>
                <div class="mt-3 text-sm leading-7 text-[#65717d] dark:text-white/54">{!! $web->address ?: 'Contact us for the current office address.' !!}</div>
            </article>

            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 sm:p-7 dark:border-white/10 dark:bg-white/4" style="--reveal-delay: 60ms">
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ece5d7] text-[#7b5a32] dark:bg-[#e4c38f]/10 dark:text-[#e4c38f]"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4V5Z" stroke="currentColor" stroke-width="1.5"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.5"/></svg></span>
                <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Write</p>
                <h2 class="mt-2 font-display text-2xl font-bold">Email</h2>
                @if($web->email)
                    <a href="mailto:{{ $web->email }}" class="mt-3 block break-all text-sm font-semibold leading-7 text-[#334251] transition hover:text-[#7b5a32] dark:text-white/70 dark:hover:text-[#e4c38f]">{{ $web->email }}</a>
                @else
                    <p class="mt-3 text-sm text-[#65717d] dark:text-white/54">Email contact is not currently published.</p>
                @endif
            </article>

            <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 sm:p-7 dark:border-white/10 dark:bg-white/4" style="--reveal-delay: 120ms">
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ece5d7] text-[#7b5a32] dark:bg-[#e4c38f]/10 dark:text-[#e4c38f]"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M6 3h4l2 5-2.5 1.5a15 15 0 0 0 5 5L16 12l5 2v4c0 1.1-.9 2-2 2C10.7 20 4 13.3 4 5c0-1.1.9-2 2-2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                <p class="mt-8 text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Call</p>
                <h2 class="mt-2 font-display text-2xl font-bold">Phone</h2>
                @if($web->phone)
                    <a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="mt-3 block text-sm font-semibold leading-7 text-[#334251] transition hover:text-[#7b5a32] dark:text-white/70 dark:hover:text-[#e4c38f]">{{ $web->phone }}</a>
                @else
                    <p class="mt-3 text-sm text-[#65717d] dark:text-white/54">Phone contact is not currently published.</p>
                @endif
            </article>
        </div>

        <div class="mt-14 grid overflow-hidden rounded-[2rem] border border-[#132131]/10 lg:grid-cols-[1.05fr_.95fr] dark:border-white/10">
            <div class="bg-[#f0ede5] p-7 sm:p-10 lg:p-12 dark:bg-[#101c27]">
                <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#7b5a32] dark:text-[#e4c38f]">Before you contact us</p>
                <h2 class="mt-5 max-w-xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">A useful first conversation starts with context.</h2>
                <p class="mt-5 max-w-xl text-base leading-8 text-[#64707b] dark:text-white/56">You do not need to arrive with a product in mind. Tell us what the capital is for, when it may be needed, what you already own and what is making the decision difficult.</p>
            </div>

            <div class="bg-[#0b1b2b] p-7 text-white sm:p-10 lg:p-12">
                <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#e4c38f]">Helpful context</p>
                <div class="mt-7 divide-y divide-white/12 border-y border-white/12">
                    @foreach([
                        ['Objective','What are you trying to grow, preserve, fund or simplify?'],
                        ['Time horizon','When might this capital need to become available?'],
                        ['Liquidity','What money must remain accessible outside the investment?'],
                        ['Existing exposure','What assets, businesses or currencies already dominate your financial position?'],
                    ] as $item)
                        <div class="py-5">
                            <h3 class="text-sm font-bold text-white">{{ $item[0] }}</h3>
                            <p class="mt-1 text-sm leading-7 text-white/54">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#e9e3d7] py-20 text-[#132131] dark:bg-[#101c27] dark:text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#7b5a32] dark:text-[#e4c38f]">Existing client?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">For account-specific matters, use your authenticated account where possible.</h2>
        </div>
        <a href="{{ url('/login') }}" class="inline-flex min-w-48 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Client login</a>
    </div>
</section>
@endsection