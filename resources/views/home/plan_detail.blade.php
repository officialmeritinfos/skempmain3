@extends('layouts.marketing')

@section('title', config('app.name') . ' | ' . ($pageName ?? 'Investment Plans'))
@section('meta_description', 'Review published investment plan terms, durations, funding ranges and configured return structures from ' . config('app.name') . '.')

@inject('option','App\Defaults\Custom')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <a href="{{ url('/plans') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-cyan-200 transition hover:text-white">← Investment plans</a>
            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">{{ $pageName ?? 'Investment Plans' }}</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/68 sm:text-lg">Review the available plan terms as a complete structure—not only the headline rate. Funding range, duration and liquidity all matter.</p>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#07111e] py-24 text-white sm:py-28">
    <div class="glow-orb glow-orb-plans"></div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @forelse($packages as $package)
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card flex flex-col rounded-[1.8rem] border border-white/10 bg-white/[0.05] shadow-[0_20px_50px_rgba(0,0,0,.24)] backdrop-blur-xl" style="--reveal-delay: {{ ($loop->index % 6) * 65 }}ms">
                    <div class="border-b border-white/10 bg-slate-950/35 p-6 sm:p-7">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">Plan {{ str_pad((string)$loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                <h2 class="mt-2 font-display text-3xl font-semibold text-white">{{ $package->name }}</h2>
                            </div>
                            <span class="rounded-full border border-amber-300/20 bg-amber-300/10 px-3 py-1 text-[11px] font-bold text-amber-200">{{ rtrim(rtrim(number_format((float)$package->roi, 2), '0'), '.') }}%</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold uppercase tracking-[0.14em] text-white/42">{{ $option->getReturnType($package->returnType) }}</p>
                        @if(!empty($package->note))<p class="mt-4 text-sm leading-6 text-white/58">{{ $package->note }}</p>@endif
                    </div>

                    <div class="flex flex-1 flex-col p-6 sm:p-7">
                        <dl class="divide-y divide-white/8 text-sm">
                            <div class="flex items-start justify-between gap-4 py-4 first:pt-0"><dt class="text-white/50">Funding range</dt><dd class="text-right font-semibold text-white">${{ number_format($package->minAmount,2) }} – @if($package->isUnlimited != 1) ${{ number_format($package->maxAmount,2) }} @else Open-ended @endif</dd></div>
                            <div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Profit return</dt><dd class="text-right font-semibold text-white">{{ rtrim(rtrim(number_format((float)$package->roi, 2), '0'), '.') }}% {{ $option->getReturnType($package->returnType) }}</dd></div>
                            <div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Contract duration</dt><dd class="text-right font-semibold text-white">{{ $package->Duration }}</dd></div>
                            @if((float)$package->referral > 0)<div class="flex items-start justify-between gap-4 py-4"><dt class="text-white/50">Referral bonus</dt><dd class="text-right font-semibold text-white">{{ $package->referral }}%</dd></div>@endif
                        </dl>
                        <div class="mt-auto pt-7"><a href="{{ route('register') }}" class="glow-button-primary inline-flex w-full items-center justify-center rounded-full px-5 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Get started</a></div>
                    </div>
                </article>
            @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-[1.8rem] border border-dashed border-white/15 bg-white/[0.03] p-10 text-center text-white/60">No plans are currently available.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-[#030712] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Need help choosing?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight sm:text-5xl">Talk through the objective before committing capital.</h2></div>
            <a href="{{ url('/contact') }}" class="glow-button-primary mt-7 inline-flex min-w-48 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Contact our team</a>
        </div>
    </div>
</section>
@endsection
