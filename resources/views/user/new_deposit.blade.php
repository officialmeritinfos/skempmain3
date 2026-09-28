@extends('layouts.dashboard')

@section('title', $pageName ?? 'New Deposit')

@section('content')
    <div
        x-data="{
            submitting: false,
            depositType: '{{ old('deposit_type') === 'bank' ? 'bank' : 'crypto' }}',
            selectedAsset: '{{ old('asset') }}'
        }"
        class="space-y-6"
    >
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Deposit</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Fund your account.</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-ink-600 dark:text-white/50">Choose how you want to fund your account, enter the amount, and continue to the instructions for that deposit type.</p>
            </div>

            <a href="{{ route('deposit.index') }}" class="inline-flex items-center gap-2 self-start rounded-xl border border-ink-950/10 bg-white px-4 py-2.5 text-sm font-semibold text-ink-800 transition hover:border-bronze-300 dark:border-white/10 dark:bg-white/5 dark:text-white/70 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M11.5 5.5 7 10l4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Deposit history
            </a>
        </div>

        <form method="POST" action="{{ route('deposit.new') }}" @submit="submitting = true" class="space-y-6">
            @csrf
            <input type="hidden" name="deposit_type" :value="depositType">

            <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-4 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-5">
                <div class="mb-4">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">01 · Deposit type</p>
                    <h2 class="mt-2 text-lg font-semibold text-ink-950 dark:text-white">How would you like to deposit?</h2>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    <button
                        type="button"
                        @click="depositType = 'crypto'"
                        class="group rounded-2xl border p-4 text-left transition"
                        :class="depositType === 'crypto'
                            ? 'border-bronze-400 bg-bronze-50 ring-1 ring-bronze-300 dark:bg-bronze-300/10'
                            : 'border-ink-950/10 bg-paper-50 hover:border-bronze-300 dark:border-white/10 dark:bg-white/[0.025]'"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-ink-950 text-white dark:bg-bronze-300 dark:text-ink-950">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 3v18M16.5 6.5h-6.75a3.25 3.25 0 0 0 0 6.5h4.5a3.25 3.25 0 0 1 0 6.5H7.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                            </span>
                            <span class="flex h-6 w-6 items-center justify-center rounded-full border" :class="depositType === 'crypto' ? 'border-bronze-500 bg-bronze-400 text-ink-950' : 'border-ink-950/15 text-transparent dark:border-white/20'">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none"><path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        <p class="mt-4 font-semibold text-ink-950 dark:text-white">Crypto Deposit</p>
                        <p class="mt-1 text-xs leading-5 text-ink-500 dark:text-white/40">Choose a supported crypto asset and receive a wallet address.</p>
                        <p class="mt-3 text-[10px] font-bold uppercase tracking-[0.14em] text-bronze-700 dark:text-bronze-300">Minimum ${{ number_format($cryptoMinimum, 2) }}</p>
                    </button>

                    <button
                        type="button"
                        @click="depositType = 'bank'"
                        class="group rounded-2xl border p-4 text-left transition"
                        :class="depositType === 'bank'
                            ? 'border-bronze-400 bg-bronze-50 ring-1 ring-bronze-300 dark:bg-bronze-300/10'
                            : 'border-ink-950/10 bg-paper-50 hover:border-bronze-300 dark:border-white/10 dark:bg-white/[0.025]'"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-ink-950 text-white dark:bg-bronze-300 dark:text-ink-950">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 9h16M5.5 9V19M9.75 9V19M14.25 9V19M18.5 9V19M3 19h18M12 3l9 4H3l9-4Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <span class="flex h-6 w-6 items-center justify-center rounded-full border" :class="depositType === 'bank' ? 'border-bronze-500 bg-bronze-400 text-ink-950' : 'border-ink-950/15 text-transparent dark:border-white/20'">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none"><path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        <p class="mt-4 font-semibold text-ink-950 dark:text-white">Bank Deposit</p>
                        <p class="mt-1 text-xs leading-5 text-ink-500 dark:text-white/40">Enter the amount only. Your unique bank details are provided by support.</p>
                        <p class="mt-3 text-[10px] font-bold uppercase tracking-[0.14em] text-bronze-700 dark:text-bronze-300">Minimum ${{ number_format($bankMinimum, 2) }}</p>
                    </button>
                </div>
            </section>

            <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_320px]">
                <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                    <div x-show="depositType === 'crypto'">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">02 · Amount</p>
                            <label for="crypto_amount" class="mt-3 block text-sm font-semibold text-ink-900 dark:text-white/80">Crypto deposit amount</label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-ink-400 dark:text-white/35">$</span>
                                <input
                                    type="number"
                                    name="amount"
                                    id="crypto_amount"
                                    step="any"
                                    min="{{ $cryptoMinimum }}"
                                    value="{{ old('amount') }}"
                                    placeholder="{{ number_format($cryptoMinimum, 2, '.', '') }}"
                                    :disabled="depositType !== 'crypto'"
                                    required
                                    class="w-full rounded-2xl border border-ink-950/10 bg-paper-50 py-3.5 pl-8 pr-4 text-base font-semibold text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                                >
                            </div>
                            <p class="mt-2 text-xs leading-5 text-ink-500 dark:text-white/35">Minimum crypto deposit: <span class="font-semibold text-ink-700 dark:text-white/60">${{ number_format($cryptoMinimum, 2) }}</span></p>
                        </div>

                        <div class="mt-8 border-t border-ink-950/8 pt-6 dark:border-white/10">
                            <div class="flex items-end justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">03 · Payment asset</p>
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
                                            :disabled="depositType !== 'crypto'"
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
                    </div>

                    <div x-show="depositType === 'bank'" x-cloak>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">02 · Amount</p>
                            <label for="bank_amount" class="mt-3 block text-sm font-semibold text-ink-900 dark:text-white/80">Bank deposit amount</label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-ink-400 dark:text-white/35">$</span>
                                <input
                                    type="number"
                                    name="amount"
                                    id="bank_amount"
                                    step="any"
                                    min="{{ $bankMinimum }}"
                                    value="{{ old('amount') }}"
                                    placeholder="{{ number_format($bankMinimum, 2, '.', '') }}"
                                    :disabled="depositType !== 'bank'"
                                    required
                                    class="w-full rounded-2xl border border-ink-950/10 bg-paper-50 py-3.5 pl-8 pr-4 text-base font-semibold text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                                >
                            </div>
                            <p class="mt-2 text-xs leading-5 text-ink-500 dark:text-white/35">Minimum bank deposit: <span class="font-semibold text-ink-700 dark:text-white/60">${{ number_format($bankMinimum, 2) }}</span></p>
                        </div>

                        <div class="mt-8 rounded-2xl border border-bronze-200 bg-bronze-50 p-5 dark:border-bronze-300/20 dark:bg-bronze-300/10">
                            <div class="flex gap-3">
                                <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-bronze-700 shadow-sm dark:bg-white/10 dark:text-bronze-300">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none"><path d="M10 6.75v3.75m0 2.75h.01M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </span>
                                <div>
                                    <p class="font-semibold text-ink-950 dark:text-white">No bank details are required on this form.</p>
                                    <p class="mt-1 text-sm leading-6 text-ink-600 dark:text-white/50">After you proceed, your deposit request will be created and the details page will direct you to contact support for the unique bank account details assigned to you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <aside class="lg:sticky lg:top-24 lg:self-start">
                    <section class="rounded-[1.7rem] bg-ink-950 p-5 text-white shadow-xl shadow-ink-950/10 sm:p-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">What happens next</p>

                        <div x-show="depositType === 'crypto'">
                            <h2 class="mt-2 font-display text-2xl font-semibold">Your crypto payment instructions are created next.</h2>
                            <div class="mt-5 space-y-4 border-t border-white/10 pt-5 text-sm leading-6 text-white/52">
                                <div class="flex gap-3"><span class="mt-0.5 text-xs font-bold text-bronze-300">01</span><p>Submit the amount and asset you want to use.</p></div>
                                <div class="flex gap-3"><span class="mt-0.5 text-xs font-bold text-bronze-300">02</span><p>You’ll receive the wallet address and exact payment instructions.</p></div>
                                <div class="flex gap-3"><span class="mt-0.5 text-xs font-bold text-bronze-300">03</span><p>After payment, mark the deposit as paid so it can be verified.</p></div>
                            </div>
                        </div>

                        <div x-show="depositType === 'bank'" x-cloak>
                            <h2 class="mt-2 font-display text-2xl font-semibold">Your bank deposit request will be created next.</h2>
                            <div class="mt-5 space-y-4 border-t border-white/10 pt-5 text-sm leading-6 text-white/52">
                                <div class="flex gap-3"><span class="mt-0.5 text-xs font-bold text-bronze-300">01</span><p>Enter an amount of at least ${{ number_format($bankMinimum, 2) }}.</p></div>
                                <div class="flex gap-3"><span class="mt-0.5 text-xs font-bold text-bronze-300">02</span><p>Open the deposit details and contact support for your unique bank details.</p></div>
                                <div class="flex gap-3"><span class="mt-0.5 text-xs font-bold text-bronze-300">03</span><p>After transfer, mark the deposit as paid for verification.</p></div>
                            </div>
                        </div>

                        <button
                            type="submit"
                            :disabled="submitting"
                            class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-bronze-300 px-5 py-3.5 text-sm font-bold text-ink-950 transition hover:-translate-y-0.5 hover:bg-bronze-200 disabled:cursor-not-allowed disabled:opacity-60"
                        >
                            <svg x-show="submitting" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-75" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                            <span x-text="submitting ? 'Creating deposit…' : (depositType === 'bank' ? 'Proceed with bank deposit' : 'Continue to payment')"></span>
                        </button>
                    </section>
                </aside>
            </div>
        </form>
    </div>
@endsection
