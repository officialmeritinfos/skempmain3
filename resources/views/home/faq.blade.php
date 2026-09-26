@extends('layouts.marketing')

@section('title', config('app.name') . ' | Frequently Asked Questions')
@section('meta_description', 'Answers to common questions about ' . config('app.name') . ', investment plans, accounts, risk and the client experience.')

@php
$faqs = [
    ['What is ' . config('app.name') . '?', config('app.name') . ' is focused on investment, wealth and asset management. We help clients think more deliberately about capital allocation, portfolio risk, long-term planning and selected investment opportunities.'],
    ['How do I know which investment plan is appropriate for me?', 'Start with the objective, time horizon, liquidity needs and risk tolerance rather than the headline return rate. Published plans show their configured terms, but suitability depends on your wider financial circumstances.'],
    ['How do I create an account?', 'Use the registration link, provide the requested information and complete any verification steps shown in the application. Once your account is available, you can review the options presented in the client area.'],
    ['What should I consider before committing capital?', 'Consider how long the money can remain invested, whether you may need it unexpectedly, what loss or volatility you can tolerate, and how the investment changes the concentration of your wider portfolio.'],
    ['How are deposits and account activity handled?', 'Funding and account activity are completed through the client application using the instructions presented for the selected investment. Always verify payment instructions inside your authenticated account and avoid relying on instructions received through unverified third parties.'],
    ['How do withdrawals work?', 'Withdrawal timing and availability can depend on the investment or plan terms, account status and applicable processing requirements. Review the terms attached to your account or contact the team when you need clarification about a specific position.'],
    ['Does ' . config('app.name') . ' only invest in cryptocurrency?', 'No. The company positioning covers investment, wealth and asset management across multiple areas. The public site discusses listed markets, real estate, agriculture, gold, foreign exchange, retirement planning and selected digital-asset exposures.'],
    ['How does the company think about risk?', 'Risk is considered before return. We look at concentration, liquidity, time horizon, downside scenarios, implementation structure and the role an investment is expected to play in the portfolio.'],
    ['How can I speak with someone before investing?', 'Use the Contact page to reach the team using the official email, phone or address details configured for the company. Starting with a conversation is appropriate when the objective or product fit is not clear.'],
];
@endphp

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1fr_.72fr] lg:items-end lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Questions, answered clearly</p>
            </div>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Understanding should come before commitment.</h1>
        </div>
        <p class="text-base leading-8 text-[#64707b] lg:pb-1 dark:text-white/56">These answers explain the public experience in general terms. For a question about a specific account, investment or transaction, use the official contact channels.</p>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.7fr_1.3fr] lg:gap-16 lg:px-8">
        <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">FAQ</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Straight answers without the sales language.</h2>
            <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">If an answer depends on your specific plan or account, the safest source is the term shown in your client area or a direct response from the company.</p>
            <a href="{{ url('/contact') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">Still need help? Contact us →</a>
        </aside>

        <div class="space-y-3">
            @foreach($faqs as $faq)
                <article x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="overflow-hidden rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] transition hover:border-[#9a7445]/35 dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25">
                    <button type="button" @click="open = !open" class="flex w-full items-start justify-between gap-5 p-5 text-left sm:p-6" :aria-expanded="open">
                        <span class="flex gap-4">
                            <span class="pt-1 text-[10px] font-bold tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="text-base font-bold leading-7">{{ $faq[0] }}</span>
                        </span>
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl border border-[#132131]/10 bg-white text-[#6d7780] transition dark:border-white/10 dark:bg-white/6 dark:text-white/60" :class="open ? 'rotate-45 border-[#9a7445]/40 text-[#7b5a32] dark:border-[#e4c38f]/30 dark:text-[#e4c38f]' : ''">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </span>
                    </button>
                    <div x-show="open" x-collapse x-cloak>
                        <div class="border-t border-[#132131]/8 px-5 py-5 sm:px-6 dark:border-white/8">
                            <p class="max-w-3xl text-sm leading-7 text-[#64707b] dark:text-white/54">{{ $faq[1] }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Specific question?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Talk to a person before making assumptions about your account.</h2>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Contact the team</a>
    </div>
</section>
@endsection