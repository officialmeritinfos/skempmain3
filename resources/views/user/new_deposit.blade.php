@extends('layouts.dashboard')

@section('title', $pageName ?? 'New Deposit')

@section('content')
    <div
        x-data="{ submitting: false, selectedAsset: '{{ old('asset') }}' }"
        class="space-y-6"
    >
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Deposit</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Fund your account.</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-ink-600 dark:text-white/50">Enter the amount you want to fund, choose a supported asset, and we’ll generate the payment instructions for the deposit.</p>
            </div>

            <a href="{{ route('deposit.index') }}" class="inline-flex items-center gap-2 self-start rounded-xl border border-ink-950/10 bg-white px-4 py-2.5 text-sm font-semibold text-ink-800 transition hover:border-bronze-300 dark:border-white/10 dark:bg-white/5 dark:text-white/70 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M11.5 5.5 7 10l4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Deposit history
            </a>
        </div>

        <form method="POST" action="{{ route('deposit.new') }}" @submit="submitting = true" class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_320px]">
            @csrf

            <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">01 · Amount</p>
                    <label for="amount" class="mt-3 block text-sm font-semibold text-ink-900 dark:text-white/80">Deposit amount</label>
                    <div class="relative mt-2">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-ink-400 dark:text-white/35">$</span>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            step="any"
                            min="0"
                            value="{{ old('amount') }}"
                            placeholder="0.00"
                            required
                            class="w-full rounded-2xl border border-ink-950/10 bg-paper-50 py-3.5 pl-8 pr-4 text-base font-semibold text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                        >
                    </div>
                    <p class="mt-2 text-xs leading-5 text-ink-500 dark:text-white/35">Minimum deposit: <span class="font-semibold text-ink-700 dark:text-white/60">${{ number_format($web->minDeposit, 2) }}</span></p>
                </div>

                <div class="mt-8 border-t border-ink-950/8 pt-6 dark:border-white/10">
                    <div class="flex items-end justify-between gap-4">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">02 · Payment asset</p>
                            <h2 class="mt-2 text-lg font-semibold text-ink-950 dark:text-white">Choose a supported asset</h2>
                        </div>
                        <span class="text-xs font-semibold text-ink-400 dark:text-white/30">{{ $coins->count() }} available</span>
                    </div>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach($coins as $coin)
                            <label
                                class="relative cursor-pointer rounded-2xl border p-4 transition duration-300"
                                :class="selectedAsset === '{{ $coin->asset }}'
                                    ? 'border-bronze-400 bg-bronze-50 ring-1 ring-bronze-300 dark:bg-bronze-300/10'
                                    : 'border-ink-950/10 bg-paper-50 hover:-translate-y-0.5 hover:border-bronze-300 dark:border-white/10 dark:bg-white/[0.025]'"
                            >
                                <input
                                    type="radio"
                                    name="asset"
                                    value="{{ $coin->asset }}"
                                    class="sr-only"
                                    @change="selectedAsset = '{{ $coin->asset }}'"
                                    {{ (string) old('asset') === (string) $coin->asset ? 'checked' : '' }}
                                    required
                                >
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
            </section>

            <aside class="lg:sticky lg:top-24 lg:self-start">
                <section class="rounded-[1.7rem] bg-ink-950 p-5 text-white shadow-xl shadow-ink-950/10 sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">What happens next</p>
                    <h2 class="mt-2 font-display text-2xl font-semibold">Payment instructions are created after this step.</h2>
                    <div class="mt-5 space-y-4 border-t border-white/10 pt-5 text-sm leading-6 text-white/52">
                        <div class="flex gap-3">
                            <span class="mt-0.5 text-xs font-bold text-bronze-300">01</span>
                            <p>Submit the amount and asset you want to use.</p>
                        </div>
                        <div class="flex gap-3">
                            <span class="mt-0.5 text-xs font-bold text-bronze-300">02</span>
                            <p>You’ll receive the wallet address and exact payment instructions.</p>
                        </div>
                        <div class="flex gap-3">
                            <span class="mt-0.5 text-xs font-bold text-bronze-300">03</span>
                            <p>After payment, mark the deposit as paid so it can be verified.</p>
                        </div>
                    </div>

                    <button
                        type="submit"
                        :disabled="submitting"
                        class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-bronze-300 px-5 py-3.5 text-sm font-bold text-ink-950 transition hover:-translate-y-0.5 hover:bg-bronze-200 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <svg x-show="submitting" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-75" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                        <span x-text="submitting ? 'Creating deposit…' : 'Continue to payment'"></span>
                    </button>
                </section>
            </aside>
        </form>
    </div>
@endsection
