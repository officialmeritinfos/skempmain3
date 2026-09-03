@extends('layouts.dashboard')

@section('title', 'My Investments')

@section('content')
    <div class="space-y-6">
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Portfolio activity</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Your investments.</h1>
                <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/50">Track every allocation, its current status and the return activity attached to it.</p>
            </div>

            <a href="{{ route('new_investment') }}" class="inline-flex items-center justify-center gap-2 self-start rounded-xl bg-ink-950 px-4 py-2.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-ink-900 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                New investment
            </a>
        </div>

        @forelse($investments as $investment)
            @php
                $statusMeta = match ((int) $investment->status) {
                    1 => ['Completed', 'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300'],
                    2 => ['Pending payment', 'bg-sky-50 text-sky-700 dark:bg-sky-400/10 dark:text-sky-300'],
                    3 => ['Cancelled', 'bg-red-50 text-red-700 dark:bg-red-400/10 dark:text-red-300'],
                    default => ['Ongoing', 'bg-amber-50 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300'],
                };
            @endphp

            <article class="group overflow-hidden rounded-[1.6rem] border border-ink-950/8 bg-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-ink-950/5 dark:border-white/10 dark:bg-white/[0.035]">
                <div class="grid gap-5 p-5 sm:p-6 lg:grid-cols-[1.15fr_.85fr_auto] lg:items-center">
                    <div class="min-w-0">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] {{ $statusMeta[1] }}">{{ $statusMeta[0] }}</span>
                            <span class="text-xs font-semibold text-ink-400 dark:text-white/30">#{{ $investment->reference }}</span>
                        </div>
                        <p class="mt-4 font-display text-3xl font-semibold tracking-[-0.025em] text-ink-950 dark:text-white">${{ number_format($investment->amount, 2) }}</p>
                        <p class="mt-1 text-xs text-ink-500 dark:text-white/35">Started {{ $investment->created_at->format('d M Y') }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t border-ink-950/8 pt-5 text-sm dark:border-white/10 lg:border-l lg:border-t-0 lg:pl-6 lg:pt-0">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Return rate</p>
                            <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ $investment->roi }}%</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Current profit</p>
                            <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">${{ number_format($investment->currentProfit, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Funding source</p>
                            <p class="mt-1 font-semibold capitalize text-ink-900 dark:text-white/80">{{ $investment->source ?: '—' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Returns</p>
                            <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ $investment->currentReturn }} / {{ $investment->numberOfReturns }}</p>
                        </div>
                    </div>

                    <a href="{{ route('invest_detail', ['id' => $investment->id]) }}" class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-ink-950/10 px-4 text-sm font-semibold text-ink-800 transition group-hover:border-bronze-300 group-hover:text-bronze-700 dark:border-white/10 dark:text-white/65 dark:group-hover:border-bronze-300 dark:group-hover:text-bronze-300">
                        View details
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </article>
        @empty
            <div class="rounded-[1.8rem] border border-dashed border-ink-950/15 bg-white px-6 py-16 text-center dark:border-white/15 dark:bg-white/[0.025]">
                <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-bronze-50 text-bronze-700 dark:bg-bronze-300/10 dark:text-bronze-300">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V8m0 11h16M8 15l3-4 3 2 5-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <h2 class="mt-5 font-display text-2xl font-semibold text-ink-950 dark:text-white">No investments yet</h2>
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-ink-500 dark:text-white/45">When you make your first allocation, its status and return activity will appear here.</p>
                <a href="{{ route('new_investment') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-ink-950 px-5 py-3 text-sm font-bold text-white dark:bg-bronze-300 dark:text-ink-950">Choose a plan</a>
            </div>
        @endforelse

        @if($investments->hasPages())
            <div class="pt-2">{{ $investments->links() }}</div>
        @endif
    </div>
@endsection
