@extends('layouts.marketing')

@section('title', config('app.name') . ' | Financing')
@section('meta_description', 'Thoughtful financing decisions aligned with liquidity, cash flow and long-term financial objectives.')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Financing</p>
            </div>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Borrowing should improve flexibility—not quietly weaken it.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">Financing can preserve liquidity, support an opportunity or bridge timing. It can also create fixed obligations that reduce resilience. The structure matters as much as the amount.</p>
            <a href="{{ url('/contact') }}" class="mt-9 inline-flex min-h-12 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Discuss financing needs</a>
        </div>

        <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale rounded-[2rem] bg-[#0b1b2b] p-7 text-white sm:p-9 dark:bg-[#101e2c]">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Before borrowing</p>
            <div class="mt-7 divide-y divide-white/12 border-y border-white/12">
                @foreach([
                    ['01','Purpose','What does the financing enable, and is debt the most appropriate way to fund it?'],
                    ['02','Cash flow','Can repayment obligations remain comfortable if income or market conditions change?'],
                    ['03','Structure','Rate, tenor, collateral, currency and covenants can matter as much as the headline amount.'],
                    ['04','Exit','There should be a realistic plan for repayment, refinancing or release of collateral.'],
                ] as $item)
                    <div class="grid grid-cols-[42px_1fr] gap-4 py-5">
                        <span class="text-[10px] font-bold text-[#e4c38f]">{{ $item[0] }}</span>
                        <div>
                            <h2 class="font-bold">{{ $item[1] }}</h2>
                            <p class="mt-1 text-sm leading-7 text-white/52">{{ $item[2] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.78fr_1.22fr] lg:gap-16">
            <div>
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Our approach</p>
                </div>
                <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Debt belongs inside the financial plan, not beside it.</h2>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach([
                    ['Liquidity','Consider what borrowing preserves today and what repayment consumes tomorrow.'],
                    ['Affordability','Stress-test obligations against weaker income, higher costs or changing rates.'],
                    ['Collateral','Understand what assets are exposed and what conditions could trigger additional requirements.'],
                    ['Opportunity cost','Compare borrowing cost with the value of retaining or deploying existing capital elsewhere.'],
                ] as $item)
                    <article class="rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 dark:border-white/10 dark:bg-white/4">
                        <h3 class="font-display text-2xl font-bold tracking-[-0.025em]">{{ $item[0] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-[#66717c] dark:text-white/54">{{ $item[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Financing conversation</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Structure the obligation before it starts shaping your options.</h2>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Talk to our team</a>
    </div>
</section>
@endsection