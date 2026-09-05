@extends('layouts.marketing')

@section('title', config('app.name') . ' | Financing')
@section('meta_description', 'Thoughtful financing decisions aligned with liquidity, cash flow and long-term financial objectives.')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div><div class="glow-orb glow-orb-top"></div><div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto grid min-h-[600px] max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up">
            <span class="inline-flex rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl">Financing</span>
            <h1 class="mt-8 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Borrowing should improve flexibility—<span class="aurora-text">not quietly weaken it.</span></h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/66 sm:text-lg">Financing can preserve liquidity, support an opportunity or bridge timing. It can also create fixed obligations that reduce resilience. The structure matters as much as the amount.</p>
            <a href="{{ url('/contact') }}" class="glow-button-primary mt-9 inline-flex items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Discuss financing needs</a>
        </div>
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale glass-panel glow-border rounded-[2rem] p-7 sm:p-9">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Before borrowing</p>
            <div class="mt-7 space-y-6">
                @foreach([['01','Purpose','What does the financing enable, and is debt the most appropriate way to fund it?'],['02','Cash flow','Can repayment obligations remain comfortable if income or market conditions change?'],['03','Structure','Rate, tenor, collateral, currency and covenants can matter as much as the headline amount.'],['04','Exit','There should be a realistic plan for repayment, refinancing or release of collateral.']] as $item)
                    <div class="grid grid-cols-[42px_1fr] gap-4 border-t border-white/10 pt-5 first:border-t-0 first:pt-0"><span class="text-xs font-bold text-cyan-200">{{ $item[0] }}</span><div><h2 class="font-semibold">{{ $item[1] }}</h2><p class="mt-1 text-sm leading-7 text-white/52">{{ $item[2] }}</p></div></div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.78fr_1.22fr] lg:gap-16">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Our approach</p><h2 class="mt-4 font-display text-4xl font-bold leading-tight sm:text-5xl">Debt belongs inside the financial plan, not beside it.</h2></div>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach([['Liquidity','Consider what borrowing preserves today and what repayment consumes tomorrow.'],['Affordability','Stress-test obligations against weaker income, higher costs or changing rates.'],['Collateral','Understand what assets are exposed and what conditions could trigger additional requirements.'],['Opportunity cost','Compare borrowing cost with the value of retaining or deploying existing capital elsewhere.']] as $item)
                    <div class="premium-card rounded-[1.5rem] border border-white/10 bg-white/[0.05] p-6 backdrop-blur-xl"><h3 class="font-display text-2xl font-semibold">{{ $item[0] }}</h3><p class="mt-3 text-sm leading-7 text-white/62">{{ $item[1] }}</p></div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
