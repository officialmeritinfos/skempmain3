@extends('layouts.dashboard')

@section('title', 'Financing')

@section('content')
    @php
        $loanTypes = [
            ['value' => 'Short Term', 'title' => 'Short term', 'copy' => 'For a shorter funding requirement and review period.'],
            ['value' => 'Mid-Term', 'title' => 'Mid-term', 'copy' => 'For needs that require a more balanced financing horizon.'],
            ['value' => 'Long Term', 'title' => 'Long term', 'copy' => 'For longer-duration funding requirements subject to review.'],
        ];
        $loanStatus = fn ($status) => match ((int) $status) {
            1 => ['Active', 'border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300'],
            2 => ['Pending review', 'border-sky-200 bg-sky-50 text-sky-700 dark:border-sky-500/20 dark:bg-sky-500/10 dark:text-sky-300'],
            3 => ['Cancelled', 'border-red-200 bg-red-50 text-red-700 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-300'],
            default => ['Unknown', 'border-paper-200 bg-paper-100 text-ink-700 dark:border-white/10 dark:bg-white/5 dark:text-white/60'],
        };
    @endphp

    <div class="mx-auto max-w-6xl space-y-6">
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] border border-paper-200 bg-white shadow-sm dark:border-white/10 dark:bg-ink-900">
            <div class="grid gap-6 p-5 sm:p-7 lg:grid-cols-[1.15fr_.85fr] lg:items-center">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600 dark:text-bronze-300">Financing</p>
                    <h1 class="mt-3 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Request financing for a defined need.</h1>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-ink-600 dark:text-white/50">
                        Submit the amount and financing horizon you need. An application records your request for review; submission does not by itself mean financing has been approved.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="rounded-2xl bg-ink-950 p-4 text-white">
                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-white/40">Outstanding financing</p>
                        <p class="mt-2 text-xl font-bold">${{ number_format($user->loan ?? 0, 2) }}</p>
                    </div>
                    <div class="rounded-2xl border border-paper-200 bg-paper-50 p-4 dark:border-white/10 dark:bg-white/[0.03]">
                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-ink-600 dark:text-white/35">Applications</p>
                        <p class="mt-2 text-xl font-bold text-ink-950 dark:text-white">{{ $loans->total() }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 xl:grid-cols-[.92fr_1.08fr]">
            <section
                x-data="{ loading: false, loanType: '{{ old('loanType') }}' }"
                class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6"
            >
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">New request</p>
                    <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Financing application</h2>
                    <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Tell us the amount and the horizon that best describes your request.</p>
                </div>

                <form method="POST" action="{{ route('loans.new') }}" @submit="loading = true" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <label for="financing-amount" class="text-xs font-bold text-ink-700 dark:text-white/60">Amount requested</label>
                        <div class="relative mt-2">
                            <span class="absolute inset-y-0 left-4 flex items-center text-sm font-bold text-ink-600 dark:text-white/40">$</span>
                            <input
                                id="financing-amount"
                                type="number"
                                step="0.01"
                                name="amount"
                                value="{{ old('amount') }}"
                                placeholder="0.00"
                                required
                                class="w-full rounded-2xl border border-paper-200 bg-paper-50 py-3.5 pl-8 pr-4 text-base font-semibold text-ink-950 outline-none transition placeholder:text-ink-600/35 focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white dark:placeholder:text-white/25"
                            >
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold text-ink-700 dark:text-white/60">Financing horizon</p>
                        <div class="mt-3 grid gap-3">
                            @foreach($loanTypes as $type)
                                <label
                                    class="cursor-pointer rounded-2xl border p-4 transition"
                                    :class="loanType === '{{ $type['value'] }}' ? 'border-bronze-400 bg-bronze-100/70 ring-2 ring-bronze-300/20 dark:border-bronze-300 dark:bg-bronze-300/10' : 'border-paper-200 bg-paper-50 hover:border-bronze-200 dark:border-white/10 dark:bg-white/[0.03]'"
                                    @click="loanType = '{{ $type['value'] }}'"
                                >
                                    <input type="radio" name="loanType" value="{{ $type['value'] }}" class="sr-only" x-model="loanType" required>
                                    <p class="text-sm font-bold text-ink-950 dark:text-white">{{ $type['title'] }}</p>
                                    <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/45">{{ $type['copy'] }}</p>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-2xl border border-sky-200 bg-sky-50 p-4 text-xs leading-6 text-sky-800 dark:border-sky-500/20 dark:bg-sky-500/10 dark:text-sky-200">
                        Applications are reviewed separately. Terms, eligibility and any further requirements are communicated after review.
                    </div>

                    <button type="submit" :disabled="loading" class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-2xl bg-ink-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                        <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                        <span x-text="loading ? 'Submitting...' : 'Submit application'"></span>
                    </button>
                </form>
            </section>

            <section class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
                <div class="flex items-end justify-between gap-4">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">History</p>
                        <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Your applications</h2>
                    </div>
                </div>

                <div class="mt-5 space-y-3">
                    @forelse($loans as $loan)
                        @php($meta = $loanStatus($loan->status))
                        <article class="rounded-2xl border border-paper-200 bg-paper-50 p-4 dark:border-white/10 dark:bg-white/[0.03]">
                            <div class="flex items-start justify-between gap-4">
                                <div class="min-w-0">
                                    <p class="text-xs font-semibold text-ink-600 dark:text-white/40">#{{ $loan->reference }}</p>
                                    <p class="mt-1 text-xl font-bold text-ink-950 dark:text-white">${{ number_format($loan->amount, 2) }}</p>
                                </div>
                                <span class="inline-flex shrink-0 rounded-full border px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] {{ $meta[1] }}">{{ $meta[0] }}</span>
                            </div>
                            <div class="mt-4 grid grid-cols-2 gap-3 border-t border-paper-200 pt-4 text-xs dark:border-white/8">
                                <div>
                                    <p class="text-ink-600 dark:text-white/35">Type</p>
                                    <p class="mt-1 font-semibold text-ink-950 dark:text-white">{{ $loan->loanType }}</p>
                                </div>
                                <div>
                                    <p class="text-ink-600 dark:text-white/35">Submitted</p>
                                    <p class="mt-1 font-semibold text-ink-950 dark:text-white">{{ optional($loan->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-2xl border border-dashed border-paper-200 px-5 py-12 text-center dark:border-white/10">
                            <h3 class="text-base font-bold text-ink-950 dark:text-white">No financing applications</h3>
                            <p class="mt-2 text-sm text-ink-600 dark:text-white/45">Submitted applications will appear here with their current status.</p>
                        </div>
                    @endforelse
                </div>

                @if($loans->hasPages())
                    <div class="mt-5">{{ $loans->links() }}</div>
                @endif
            </section>
        </div>
    </div>
@endsection
