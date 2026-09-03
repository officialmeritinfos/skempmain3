@extends('layouts.dashboard')

@section('title', 'Investment Details')

@section('content')
    @php
        $statusMeta = match ((int) $investment->status) {
            1 => ['Completed', 'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300'],
            2 => ['Pending', 'bg-sky-50 text-sky-700 dark:bg-sky-400/10 dark:text-sky-300'],
            3 => ['Cancelled', 'bg-red-50 text-red-700 dark:bg-red-400/10 dark:text-red-300'],
            default => ['Ongoing', 'bg-amber-50 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300'],
        };
        $expectedProfit = $investment->profitPerReturn * $investment->numberOfReturns;
        $returnProgress = $investment->numberOfReturns > 0
            ? min(100, ($investment->currentReturn / $investment->numberOfReturns) * 100)
            : 0;
    @endphp

    <div class="space-y-6">
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Investment details</p>
                <div class="mt-2 flex flex-wrap items-center gap-3">
                    <h1 class="font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">#{{ $investment->reference }}</h1>
                    <span class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] {{ $statusMeta[1] }}">{{ $statusMeta[0] }}</span>
                </div>
                <p class="mt-2 text-sm text-ink-500 dark:text-white/40">Started {{ $investment->created_at->format('d M Y') }}</p>
            </div>

            <a href="{{ route('investment.index') }}" class="inline-flex items-center gap-2 self-start rounded-xl border border-ink-950/10 bg-white px-4 py-2.5 text-sm font-semibold text-ink-800 transition hover:border-bronze-300 dark:border-white/10 dark:bg-white/5 dark:text-white/70 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M11.5 5.5 7 10l4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Back to investments
            </a>
        </div>

        <section class="relative overflow-hidden rounded-[2rem] bg-ink-950 p-6 text-white shadow-xl shadow-ink-950/10 sm:p-8">
            <div class="pointer-events-none absolute right-[-5rem] top-[-6rem] h-64 w-64 rounded-full border border-bronze-300/15"></div>
            <div class="pointer-events-none absolute right-[-1rem] top-[-2rem] h-44 w-44 rounded-full border border-white/8"></div>

            <div class="relative grid gap-7 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Capital allocated</p>
                    <p class="mt-3 font-display text-4xl font-semibold tracking-[-0.035em] sm:text-5xl">${{ number_format($investment->amount, 2) }}</p>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-white/50">Funded from your <span class="font-semibold capitalize text-white/75">{{ $investment->source ?: 'account' }}</span> balance with a configured return rate of {{ $investment->roi }}%.</p>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:min-w-[420px]">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-white/35">Current profit</p>
                        <p class="mt-2 text-lg font-semibold">${{ number_format($investment->currentProfit, 2) }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-white/35">Per return</p>
                        <p class="mt-2 text-lg font-semibold">${{ number_format($investment->profitPerReturn, 2) }}</p>
                    </div>
                    <div class="col-span-2 rounded-2xl border border-white/10 bg-white/[0.04] p-4 sm:col-span-1">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-white/35">Configured total</p>
                        <p class="mt-2 text-lg font-semibold">${{ number_format($expectedProfit, 2) }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 lg:grid-cols-[1.05fr_.95fr]">
            <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Return progress</p>
                        <h2 class="mt-2 text-lg font-semibold text-ink-950 dark:text-white">{{ $investment->currentReturn }} of {{ $investment->numberOfReturns }} returns completed</h2>
                    </div>
                    <span class="text-sm font-semibold text-ink-500 dark:text-white/40">{{ number_format($returnProgress, 0) }}%</span>
                </div>

                <div class="mt-5 h-2 overflow-hidden rounded-full bg-ink-950/5 dark:bg-white/10">
                    <div class="h-full rounded-full bg-bronze-400" style="width: {{ $returnProgress }}%"></div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl bg-paper-50 p-4 dark:bg-white/[0.03]">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Duration</p>
                        <p class="mt-1.5 font-semibold text-ink-900 dark:text-white/80">{{ $investment->duration }}</p>
                    </div>
                    <div class="rounded-2xl bg-paper-50 p-4 dark:bg-white/[0.03]">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Return rate</p>
                        <p class="mt-1.5 font-semibold text-ink-900 dark:text-white/80">{{ $investment->roi }}%</p>
                    </div>
                    <div class="rounded-2xl bg-paper-50 p-4 dark:bg-white/[0.03] sm:col-span-2">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Next return date</p>
                        <p class="mt-1.5 font-semibold text-ink-900 dark:text-white/80">{{ date('d M Y, h:i a', $investment->nextReturn) }}</p>
                    </div>
                </div>
            </section>

            <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Investment summary</p>
                <div class="mt-4 divide-y divide-ink-950/8 text-sm dark:divide-white/10">
                    <div class="flex items-center justify-between gap-4 py-3 first:pt-0">
                        <span class="text-ink-500 dark:text-white/40">Reference</span>
                        <span class="font-semibold text-ink-900 dark:text-white/80">#{{ $investment->reference }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-4 py-3">
                        <span class="text-ink-500 dark:text-white/40">Started</span>
                        <span class="font-semibold text-ink-900 dark:text-white/80">{{ $investment->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-4 py-3">
                        <span class="text-ink-500 dark:text-white/40">Funding source</span>
                        <span class="font-semibold capitalize text-ink-900 dark:text-white/80">{{ $investment->source ?: '—' }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-4 py-3">
                        <span class="text-ink-500 dark:text-white/40">Status</span>
                        <span class="font-semibold text-ink-900 dark:text-white/80">{{ $statusMeta[0] }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-4 py-3 last:pb-0">
                        <span class="text-ink-500 dark:text-white/40">Total returns</span>
                        <span class="font-semibold text-ink-900 dark:text-white/80">{{ $investment->numberOfReturns }}</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
