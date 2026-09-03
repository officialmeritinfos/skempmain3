@extends('layouts.marketing')

@section('title', config('app.name') . ' | Frequently Asked Questions')
@section('meta_description', 'Answers to common questions about our investment approach, plans, accounts, risk and client experience.')

@php
$faqs = [
    ['What is ' . config('app.name') . '?', config('app.name') . ' is an investment, wealth and asset management company. We help clients think more deliberately about capital allocation, portfolio risk, long-term planning and selected investment opportunities.'],
    ['How do I know which investment plan is appropriate for me?', 'Start with the objective, time horizon, liquidity needs and risk tolerance rather than the headline return rate. The published plans show their configured terms, but suitability depends on your wider financial circumstances.'],
    ['Are investment returns guaranteed?', 'No investment outcome should be treated as risk-free. Published rates and plan terms describe configured product terms; actual investment values and outcomes can be affected by market, operational, liquidity and other risks.'],
    ['How do I create an account?', 'Use the Create Account or registration link, provide the requested information and complete any verification steps shown in the application. Once your account is available, you can review the options presented in the client area.'],
    ['What should I consider before committing capital?', 'Consider how long the money can remain invested, whether you may need it unexpectedly, what loss or volatility you can tolerate, and how the investment changes the concentration of your wider portfolio.'],
    ['How are deposits and account activity handled?', 'Funding and account activity are completed through the client application using the instructions presented for the selected investment. Always verify payment instructions inside your authenticated account and avoid relying on instructions received through unverified third parties.'],
    ['How do withdrawals work?', 'Withdrawal timing and availability can depend on the investment or plan terms, account status and applicable processing requirements. Review the terms attached to your account or contact the team when you need clarification about a specific position.'],
    ['Does ' . config('app.name') . ' only invest in cryptocurrency?', 'No. The company positioning covers investment, wealth and asset management across multiple areas. The public site discusses listed markets, real estate, agriculture, gold, foreign exchange, retirement planning and selected digital-asset exposures.'],
    ['How does the company think about risk?', 'Risk is considered before return. We look at concentration, liquidity, time horizon, downside scenarios, implementation structure and the role an investment is expected to play in the portfolio.'],
    ['How can I speak with someone before investing?', 'Use the Contact page to reach the team using the official email, phone or address details configured for the company. Starting with a conversation is appropriate when the objective or product fit is not clear.'],
];
@endphp

@section('content')
<section class="bg-ink-950 text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1fr_.7fr] lg:items-end lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Questions, answered clearly</p>
            <h1 class="mt-5 max-w-4xl font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Understanding should come before commitment.</h1>
        </div>
        <p class="text-base leading-8 text-white/58 lg:pb-2">These answers explain the public experience in general terms. For a question about a specific account, investment or transaction, use the official contact channels.</p>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.68fr_1.32fr] lg:gap-16 lg:px-8">
        <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">FAQ</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">Straight answers without the sales language.</h2>
            <p class="mt-5 text-base leading-8 text-ink-700">If an answer depends on your specific plan or account, the safest source is the term shown in your client area or a direct response from the company.</p>
            <a href="{{ url('/contact') }}" class="group mt-7 inline-flex items-center gap-2 text-sm font-bold text-ink-950 hover:text-bronze-700">Still need help? Contact us <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="none"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </aside>

        <div class="space-y-3">
            @foreach($faqs as $faq)
                <article x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="overflow-hidden rounded-[1.45rem] border border-ink-950/8 bg-white transition duration-300 hover:border-bronze-500/25">
                    <button type="button" @click="open = !open" class="flex w-full items-start justify-between gap-5 p-5 text-left sm:p-6" :aria-expanded="open">
                        <span class="flex gap-4"><span class="pt-1 text-[10px] font-bold tracking-[0.18em] text-bronze-600">{{ str_pad((string)$loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><span class="text-base font-bold leading-7 text-ink-950">{{ $faq[0] }}</span></span>
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-ink-950/10 text-ink-950 transition" :class="open ? 'rotate-45 bg-bronze-100 border-bronze-500/30' : ''"><svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg></span>
                    </button>
                    <div x-show="open" x-collapse x-cloak><div class="border-t border-ink-950/8 px-5 py-5 sm:px-6"><p class="max-w-3xl text-sm leading-7 text-ink-700">{{ $faq[1] }}</p></div></div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-paper-100 py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="rounded-[2rem] bg-ink-900 p-7 text-white sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-10 lg:p-12"><div><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Specific question?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">Talk to a person before making assumptions about your account.</h2></div><a href="{{ url('/contact') }}" class="mt-7 inline-flex shrink-0 items-center justify-center rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-bronze-200 lg:mt-0">Contact the team</a></div></div>
</section>
@endsection
