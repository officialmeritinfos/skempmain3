@extends('layouts.marketing')

@section('title', config('app.name') . ' | Investment Plans')
@section('meta_description', 'Explore published investment plans, funding ranges, durations and configured return terms from ' . config('app.name') . '.')

@inject('option','App\Defaults\Custom')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl"><span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>Investment plans</span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Choose structure with the same care you choose <span class="aurora-text">opportunity.</span></h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/68 sm:text-lg">Each published plan has its own funding range, duration and configured return terms. Compare them alongside your liquidity needs, time horizon and tolerance for risk.</p>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#07111e] py-24 text-white sm:py-28">
    <div class="glow-orb glow-orb-plans"></div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.7fr_1.3fr] lg:gap-16">
            <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Published options</p>
                <h2 class="mt-4 font-display text-4xl font-bold leading-tight tracking-[-0.03em] sm:text-5xl">Compare the terms. Then consider the fit.</h2>
                <p class="mt-5 text-base leading-8 text-white/65">A higher configured rate is not automatically a better fit. Duration, minimum commitment, liquidity and the underlying strategy should be considered together.</p>
                <div class="mt-7 rounded-[1.5rem] border border-cyan-300/20 bg-cyan-300/8 p-5 text-sm leading-7 text-cyan-50/85 backdrop-blur-xl"><strong class="text-white">Important:</strong> displayed plan rates are configured terms, not a statement that investment outcomes are risk-free.</div>
            </aside>

            <div class="grid gap-5 md:grid-cols-2">
                @forelse($packages as $package)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card flex flex-col overflow-hidden rounded-[1.8rem] border border-white/10 bg-white/[0.05] shadow-[0_20px_50px_rgba(0,0,0,.24)] backdrop-blur-xl transition duration-400 hover:-translate-y-1 hover:border-cyan-300/25" style="--reveal-delay: {{ ($loop->index % 4) * 70 }}ms">
                        <div class="border-b border-white/10 bg-slate-950/35 p-6 sm:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <div><p class="text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200/75">Plan {{ str_pad((string)$loop->iteration, 2, '0', STR_PAD_LEFT) }}</p><h3 class="mt-2 font-display text-3xl font-semibold text-white">{{ $package->name }}</h3></div>
                                <span class="rounded-full border border-amber-300/20 bg-amber-300/10 px-3 py-1 text-[11px] font-bold text-amber-200">{{ rtrim(rtrim(number_format((float)$package->roi, 2), '0'), '.') }}%</span>
                            </div>
                            <p class="mt-3 text-xs font-semibold uppercase tracking-[0.14em] text-white/42">{{ $option->getReturnType($package->returnType) }}</p>
                            @if($package->note)<p class="mt-4 text-sm leading-6 text-white/58">{{ $package->note }}</p>@endif
                        </div>

                        <div class="flex flex-1 flex-col p-6 sm:p-7">
                            <dl class="divide-y divide-white/8 text-sm">
                                <div class="flex items-start justify-between gap-4 py-4 first:pt-0"><dt class="text-white/50">Funding range</dt><dd class="text-right font-semibold text-white">${{ number_format($package->minAmount, 2) }} – @if($package->isUnlimited != 1) ${{ number_format($package->maxAmount, 2) }} @else Open-ended @endif</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Duration</dt><dd class="text-right font-semibold text-white">{{ $package->Duration }}</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Number of returns</dt><dd class="text-right font-semibold text-white">{{ $package->numberOfReturns }}</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Configured total rate</dt><dd class="text-right font-semibold text-white">{{ rtrim(rtrim(number_format((float)($package->roi * $package->numberOfReturns), 2), '0'), '.') }}%</dd></div>
                                @if((float)$package->referral > 0)<div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Referral rate</dt><dd class="text-right font-semibold text-white">{{ $package->referral }}%</dd></div>@endif
                            </dl>
                            <div class="mt-auto pt-7"><a href="{{ url('/register') }}" class="glow-button-primary inline-flex w-full items-center justify-center rounded-full px-5 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Continue with this plan</a></div>
                        </div>
                    </article>
                @empty
                    <div class="md:col-span-2 rounded-[1.8rem] border border-dashed border-white/15 bg-white/[0.03] p-10 text-center text-white/60">No investment plans are currently published.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@if(isset($cannabis_packages) && $cannabis_packages->isNotEmpty())
<section class="bg-[#030712] py-20 text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-white/10 pb-8"><p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-200/80">Specialised strategies</p><h2 class="mt-4 font-display text-4xl font-bold sm:text-5xl">Additional published opportunities.</h2></div>
        <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach($cannabis_packages as $package)
                <article class="glass-panel rounded-[1.6rem] p-6"><h3 class="font-display text-2xl font-semibold">{{ $package->name }}</h3><p class="mt-3 text-sm leading-7 text-white/62">Funding from ${{ number_format($package->minAmount, 2) }} with a configured duration of {{ $package->Duration }}.</p><a href="{{ url('/register') }}" class="mt-6 inline-flex text-sm font-semibold text-cyan-200 hover:text-white">View account options →</a></article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="bg-[#030712] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Need context before choosing?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight sm:text-5xl">The plan should fit the objective—not the other way around.</h2></div>
            <a href="{{ url('/contact') }}" class="glow-button-primary mt-7 inline-flex min-w-48 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Talk to our team</a>
        </div>
    </div>
</section>
@endsection
