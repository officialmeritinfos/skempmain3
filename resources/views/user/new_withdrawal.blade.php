@extends('layouts.dashboard')

@section('title', $pageName ?? 'New Withdrawal')

@section('content')
    <div
        x-data="{
            submitting: false,
            selectedSource: '{{ old('account') }}',
            selectedAsset: '{{ old('asset') }}'
        }"
        class="space-y-6"
    >
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Withdrawal</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Request a payout.</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-ink-600 dark:text-white/50">Choose the balance to withdraw from, select the payout asset and enter the destination wallet carefully.</p>
            </div>

            <a href="{{ route('withdrawal.index') }}" class="inline-flex items-center gap-2 self-start rounded-xl border border-ink-950/10 bg-white px-4 py-2.5 text-sm font-semibold text-ink-800 transition hover:border-bronze-300 dark:border-white/10 dark:bg-white/5 dark:text-white/70 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M11.5 5.5 7 10l4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Withdrawal history
            </a>
        </div>

        @if($user->loan > 0)
            <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-sm leading-6 text-red-800 dark:border-red-400/20 dark:bg-red-400/10 dark:text-red-200">
                Withdrawals are unavailable while your outstanding loan balance of <strong>${{ number_format($user->loan, 2) }}</strong> remains unpaid. Contact support if you need assistance.
            </div>
        @endif

        <form method="POST" action="{{ route('withdraw.new') }}" @submit="submitting = true" class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_340px]">
            @csrf

            <div class="space-y-6">
                <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">01 · Funding source</p>
                    <h2 class="mt-2 text-lg font-semibold text-ink-950 dark:text-white">Which balance should fund this withdrawal?</h2>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach([
                            ['1', 'Profit balance', $user->profit],
                            ['2', 'Referral balance', $user->refBal],
                            ['3', 'Bonus balance', $user->bonus],
                            ['34', 'Account balance', $user->balance],
                        ] as $source)
                            <label
                                class="cursor-pointer rounded-2xl border p-4 transition duration-300"
                                :class="selectedSource === '{{ $source[0] }}'
                                    ? 'border-bronze-400 bg-bronze-50 ring-1 ring-bronze-300 dark:bg-bronze-300/10'
                                    : 'border-ink-950/10 bg-paper-50 hover:-translate-y-0.5 hover:border-bronze-300 dark:border-white/10 dark:bg-white/[0.025]'"
                            >
                                <input type="radio" name="account" value="{{ $source[0] }}" class="sr-only" @change="selectedSource = '{{ $source[0] }}'" {{ (string) old('account') === (string) $source[0] ? 'checked' : '' }} required>
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="text-xs font-semibold text-ink-500 dark:text-white/40">{{ $source[1] }}</p>
                                        <p class="mt-1 font-display text-2xl font-semibold text-ink-950 dark:text-white">${{ number_format($source[2], 2) }}</p>
                                    </div>
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full border" :class="selectedSource === '{{ $source[0] }}' ? 'border-bronze-500 bg-bronze-400 text-ink-950' : 'border-ink-950/15 text-transparent dark:border-white/20'">
                                        <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none"><path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </section>

                <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">02 · Payout details</p>

                    <div class="mt-4">
                        <label for="amount" class="text-sm font-semibold text-ink-900 dark:text-white/80">Withdrawal amount</label>
                        <div class="relative mt-2">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-ink-400 dark:text-white/35">$</span>
                            <input
                                type="number"
                                name="amount"
                                id="amount"
                                step="any"
                                min="0"
                                value="{{ old('amount') }}"
                                required
                                placeholder="0.00"
                                class="w-full rounded-2xl border border-ink-950/10 bg-paper-50 py-3.5 pl-8 pr-4 text-base font-semibold text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                            >
                        </div>
                        <p class="mt-2 text-xs text-ink-500 dark:text-white/35">Minimum withdrawal: <span class="font-semibold text-ink-700 dark:text-white/60">${{ number_format($web->minWithdrawal, 2) }}</span></p>
                    </div>

                    <div class="mt-6">
                        <p class="text-sm font-semibold text-ink-900 dark:text-white/80">Payout asset</p>
                        <div class="mt-3 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($coins as $coin)
                                <label
                                    class="cursor-pointer rounded-2xl border p-4 transition duration-300"
                                    :class="selectedAsset === '{{ $coin->asset }}'
                                        ? 'border-bronze-400 bg-bronze-50 ring-1 ring-bronze-300 dark:bg-bronze-300/10'
                                        : 'border-ink-950/10 bg-paper-50 hover:-translate-y-0.5 hover:border-bronze-300 dark:border-white/10 dark:bg-white/[0.025]'"
                                >
                                    <input type="radio" name="asset" value="{{ $coin->asset }}" class="sr-only" @change="selectedAsset = '{{ $coin->asset }}'" {{ (string) old('asset') === (string) $coin->asset ? 'checked' : '' }} required>
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-ink-950 dark:text-white">{{ $coin->name }}</p>
                                            <p class="mt-1 text-xs font-bold uppercase tracking-[0.12em] text-ink-400 dark:text-white/30">{{ $coin->asset }}</p>
                                        </div>
                                        <span class="flex h-6 w-6 items-center justify-center rounded-full border" :class="selectedAsset === '{{ $coin->asset }}' ? 'border-bronze-500 bg-bronze-400 text-ink-950' : 'border-ink-950/15 text-transparent dark:border-white/20'">
                                            <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none"><path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="wallet" class="text-sm font-semibold text-ink-900 dark:text-white/80">Destination wallet address</label>
                        <textarea
                            name="wallet"
                            id="wallet"
                            rows="3"
                            required
                            placeholder="Paste the destination wallet address"
                            class="mt-2 w-full resize-none rounded-2xl border border-ink-950/10 bg-paper-50 px-4 py-3.5 text-sm leading-6 text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                        >{{ old('wallet') }}</textarea>
                    </div>
                </section>
            </div>

            <aside class="xl:sticky xl:top-24 xl:self-start">
                <section class="rounded-[1.7rem] bg-ink-950 p-5 text-white shadow-xl shadow-ink-950/10 sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">Review before submitting</p>
                    <h2 class="mt-2 font-display text-2xl font-semibold">Wallet payouts require careful verification.</h2>
                    <div class="mt-5 space-y-4 border-t border-white/10 pt-5 text-sm leading-6 text-white/50">
                        <p>Confirm the payout asset matches the destination wallet network you intend to use.</p>
                        <p>Check the wallet address carefully before submitting the request.</p>
                        <p>The requested amount must be available in the selected balance.</p>
                    </div>

                    <button
                        type="submit"
                        :disabled="submitting || {{ $user->loan > 0 ? 'true' : 'false' }}"
                        class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-bronze-300 px-5 py-3.5 text-sm font-bold text-ink-950 transition hover:-translate-y-0.5 hover:bg-bronze-200 disabled:cursor-not-allowed disabled:opacity-50"
                    >
                        <svg x-show="submitting" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-75" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                        <span x-text="submitting ? 'Submitting request…' : 'Request withdrawal'"></span>
                    </button>
                </section>
            </aside>
        </form>
    </div>
@endsection
