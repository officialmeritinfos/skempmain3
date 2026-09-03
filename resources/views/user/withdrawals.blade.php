@extends('layouts.dashboard')

@section('title', $pageName ?? 'Withdrawals')

@section('content')
    <div class="space-y-6">
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Payout activity</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Withdrawal history.</h1>
                <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/50">Track each payout request, its funding source, destination asset and processing status.</p>
            </div>

            <a href="{{ route('new_withdrawal') }}" class="inline-flex items-center justify-center gap-2 self-start rounded-xl bg-ink-950 px-4 py-2.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-ink-900 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                New withdrawal
            </a>
        </div>

        @forelse($withdrawals as $withdrawal)
            @php
                $statusMeta = match ((int) $withdrawal->status) {
                    1 => ['Completed', 'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300'],
                    2 => ['Pending', 'bg-sky-50 text-sky-700 dark:bg-sky-400/10 dark:text-sky-300'],
                    3 => ['Cancelled', 'bg-red-50 text-red-700 dark:bg-red-400/10 dark:text-red-300'],
                    default => ['Processing', 'bg-amber-50 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300'],
                };
            @endphp

            <article class="overflow-hidden rounded-[1.6rem] border border-ink-950/8 bg-white shadow-sm dark:border-white/10 dark:bg-white/[0.035]">
                <div class="grid gap-5 p-5 sm:p-6 lg:grid-cols-[1fr_.9fr] lg:items-center">
                    <div>
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] {{ $statusMeta[1] }}">{{ $statusMeta[0] }}</span>
                            <span class="text-xs font-semibold text-ink-400 dark:text-white/30">#{{ $withdrawal->reference }}</span>
                        </div>
                        <p class="mt-4 font-display text-3xl font-semibold tracking-[-0.025em] text-ink-950 dark:text-white">${{ number_format($withdrawal->amount, 2) }}</p>
                        <p class="mt-1 text-xs text-ink-500 dark:text-white/35">Requested {{ $withdrawal->created_at->format('d M Y, h:i a') }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t border-ink-950/8 pt-5 dark:border-white/10 lg:border-l lg:border-t-0 lg:pl-6 lg:pt-0">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Payout asset</p>
                            <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ $withdrawal->asset }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Funding source</p>
                            <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ $withdrawal->source ?? '—' }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Destination wallet</p>
                            <p class="mt-1 break-all font-mono text-xs leading-5 text-ink-700 dark:text-white/55">{{ $withdrawal->details }}</p>
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-[1.8rem] border border-dashed border-ink-950/15 bg-white px-6 py-16 text-center dark:border-white/15 dark:bg-white/[0.025]">
                <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-bronze-50 text-bronze-700 dark:bg-bronze-300/10 dark:text-bronze-300">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none"><path d="M12 20V8m0 0-4 4m4-4 4 4M5 4h14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <h2 class="mt-5 font-display text-2xl font-semibold text-ink-950 dark:text-white">No withdrawals yet</h2>
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-ink-500 dark:text-white/45">Your payout requests will appear here after you submit your first withdrawal.</p>
                <a href="{{ route('new_withdrawal') }}" class="mt-6 inline-flex items-center justify-center rounded-xl bg-ink-950 px-5 py-3 text-sm font-bold text-white dark:bg-bronze-300 dark:text-ink-950">Request withdrawal</a>
            </div>
        @endforelse

        @if($withdrawals->hasPages())
            <div class="pt-2">{{ $withdrawals->links() }}</div>
        @endif
    </div>
@endsection
