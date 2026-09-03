@extends('layouts.dashboard')

@section('title', $pageName)

@section('content')
    @inject('option', 'App\Defaults\Custom')

    <div
        x-data="{
            loading: false,
            selectedPackage: '{{ old('package') }}',
            selectedAccount: '{{ old('account') }}'
        }"
        class="space-y-6"
    >
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Investment</p>
                <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Choose how your capital works.</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-ink-600 dark:text-white/55">Select an available investment plan, enter the amount you want to allocate, then choose the balance the investment should be funded from.</p>
            </div>

            <a href="{{ route('investment.index') }}" class="inline-flex items-center gap-2 self-start rounded-xl border border-ink-950/10 bg-white px-4 py-2.5 text-sm font-semibold text-ink-800 shadow-sm transition hover:-translate-y-0.5 hover:border-bronze-300 dark:border-white/10 dark:bg-white/5 dark:text-white/75 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M11.5 5.5 7 10l4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Investment history
            </a>
        </div>

        <form method="POST" action="{{ route('investment.new') }}" @submit="loading = true" class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_360px]">
            @csrf

            <div class="space-y-6">
                <section class="overflow-hidden rounded-[1.7rem] border border-ink-950/8 bg-white shadow-sm dark:border-white/10 dark:bg-white/[0.035]">
                    <div class="border-b border-ink-950/8 px-5 py-5 dark:border-white/10 sm:px-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">01 · Select a plan</p>
                                <h2 class="mt-2 text-lg font-semibold text-ink-950 dark:text-white">Available investment plans</h2>
                                <p class="mt-1 text-sm leading-6 text-ink-500 dark:text-white/45">Compare the funding range, configured return cadence and duration before making a selection.</p>
                            </div>
                            <span class="hidden rounded-full bg-paper-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] text-ink-500 dark:bg-white/5 dark:text-white/40 sm:inline-flex">{{ $packages->count() }} available</span>
                        </div>
                    </div>

                    <div class="grid gap-4 p-4 sm:grid-cols-2 sm:p-6">
                        @foreach($packages as $package)
                            <label
                                class="group relative cursor-pointer overflow-hidden rounded-2xl border p-5 transition duration-300"
                                :class="selectedPackage === '{{ $package->id }}'
                                    ? 'border-bronze-400 bg-bronze-50 shadow-lg shadow-bronze-950/5 ring-1 ring-bronze-300 dark:bg-bronze-300/10'
                                    : 'border-ink-950/10 bg-paper-50 hover:-translate-y-0.5 hover:border-bronze-300 hover:shadow-md dark:border-white/10 dark:bg-white/[0.025]'"
                            >
                                <input
                                    type="radio"
                                    name="package"
                                    value="{{ $package->id }}"
                                    class="sr-only"
                                    @change="selectedPackage = '{{ $package->id }}'"
                                    {{ (string) old('package') === (string) $package->id ? 'checked' : '' }}
                                >

                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <p class="text-[10px] font-bold uppercase tracking-[0.17em] text-bronze-600 dark:text-bronze-300">Investment plan</p>
                                        <h3 class="mt-2 truncate font-display text-2xl font-semibold text-ink-950 dark:text-white">{{ $package->name }}</h3>
                                    </div>

                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full border transition"
                                          :class="selectedPackage === '{{ $package->id }}' ? 'border-bronze-500 bg-bronze-400 text-ink-950' : 'border-ink-950/15 text-transparent dark:border-white/20'">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                            <path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>

                                @if(!empty($package->note))
                                    <p class="mt-3 text-sm leading-6 text-ink-600 dark:text-white/50">{{ $package->note }}</p>
                                @endif

                                <div class="mt-5 grid grid-cols-2 gap-x-4 gap-y-4 border-t border-ink-950/8 pt-4 text-sm dark:border-white/10">
                                    <div>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Funding range</p>
                                        <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">
                                            ${{ number_format($package->minAmount, 2) }} –
                                            @if($package->isUnlimited == 1)
                                                No cap
                                            @else
                                                ${{ number_format($package->maxAmount, 2) }}
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Duration</p>
                                        <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ $package->Duration }}</p>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Return rate</p>
                                        <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ $package->roi }}% {{ $option->getReturnType($package->returnType) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Return count</p>
                                        <p class="mt-1 font-semibold text-ink-900 dark:text-white/80">{{ number_format($package->numberOfReturns) }}</p>
                                    </div>
                                </div>

                                @if($package->reinvest == 1)
                                    <div class="mt-4 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.13em] text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Profit reinvestment supported
                                    </div>
                                @endif
                            </label>
                        @endforeach
                    </div>
                </section>

                <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">02 · Investment amount</p>
                    <div class="mt-4">
                        <label for="amount" class="text-sm font-semibold text-ink-900 dark:text-white/80">Amount to invest</label>
                        <div class="relative mt-2">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-ink-400 dark:text-white/35">$</span>
                            <input
                                type="number"
                                step="any"
                                min="0"
                                name="amount"
                                id="amount"
                                value="{{ old('amount') }}"
                                placeholder="0.00"
                                class="w-full rounded-2xl border border-ink-950/10 bg-paper-50 py-3.5 pl-8 pr-4 text-base font-semibold text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                            >
                        </div>
                        <p class="mt-2 text-xs leading-5 text-ink-450 dark:text-white/35">The selected plan’s funding range is enforced when you submit the investment.</p>
                    </div>
                </section>
            </div>

            <aside class="space-y-6 xl:sticky xl:top-24 xl:self-start">
                <section class="rounded-[1.7rem] bg-ink-950 p-5 text-white shadow-xl shadow-ink-950/10 sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">03 · Funding source</p>
                    <h2 class="mt-2 font-display text-2xl font-semibold">Choose the balance to use.</h2>
                    <p class="mt-2 text-sm leading-6 text-white/50">The investment amount will be deducted from the selected balance after validation succeeds.</p>

                    <div class="mt-5 space-y-3">
                        <label
                            class="cursor-pointer rounded-2xl border p-4 transition"
                            :class="selectedAccount === '1' ? 'border-bronze-300 bg-white/10 ring-1 ring-bronze-300/50' : 'border-white/10 bg-white/[0.035] hover:border-white/20'"
                        >
                            <input type="radio" name="account" value="1" class="sr-only" @change="selectedAccount = '1'" {{ (string) old('account') === '1' ? 'checked' : '' }}>
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold text-white/55">Account balance</p>
                                    <p class="mt-1 text-lg font-semibold">${{ number_format($user->balance, 2) }}</p>
                                </div>
                                <span class="flex h-6 w-6 items-center justify-center rounded-full border" :class="selectedAccount === '1' ? 'border-bronze-300 bg-bronze-300 text-ink-950' : 'border-white/20 text-transparent'">
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none"><path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            </div>
                        </label>

                        @if($user->canCompound == 1)
                            <label
                                class="cursor-pointer rounded-2xl border p-4 transition"
                                :class="selectedAccount === '2' ? 'border-bronze-300 bg-white/10 ring-1 ring-bronze-300/50' : 'border-white/10 bg-white/[0.035] hover:border-white/20'"
                            >
                                <input type="radio" name="account" value="2" class="sr-only" @change="selectedAccount = '2'" {{ (string) old('account') === '2' ? 'checked' : '' }}>
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-xs font-semibold text-white/55">Profit balance</p>
                                        <p class="mt-1 text-lg font-semibold">${{ number_format($user->profit, 2) }}</p>
                                    </div>
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full border" :class="selectedAccount === '2' ? 'border-bronze-300 bg-bronze-300 text-ink-950' : 'border-white/20 text-transparent'">
                                        <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none"><path d="m5.5 10 3 3 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>
                            </label>
                        @endif
                    </div>

                    <div class="mt-6 border-t border-white/10 pt-5">
                        <p class="text-xs leading-5 text-white/40">Investment values and returns can vary. Review the plan details and ensure the allocation fits your objectives before proceeding.</p>
                    </div>

                    <button
                        type="submit"
                        :disabled="loading"
                        class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-bronze-300 px-5 py-3.5 text-sm font-bold text-ink-950 transition hover:-translate-y-0.5 hover:bg-bronze-200 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle>
                            <path class="opacity-75" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                        <span x-text="loading ? 'Processing investment…' : 'Confirm investment'"></span>
                    </button>
                </section>
            </aside>
        </form>
    </div>
@endsection
