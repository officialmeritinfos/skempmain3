@extends('layouts.dashboard')

@section('title', 'Deposit Details')

@section('content')
    @php
        $statusMeta = match ((int) $deposit->status) {
            1 => ['Completed', 'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300'],
            2 => ['Awaiting payment', 'bg-sky-50 text-sky-700 dark:bg-sky-400/10 dark:text-sky-300'],
            3 => ['Cancelled', 'bg-red-50 text-red-700 dark:bg-red-400/10 dark:text-red-300'],
            4 => ['Verification pending', 'bg-amber-50 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300'],
            default => ['Partial', 'bg-slate-100 text-slate-700 dark:bg-white/10 dark:text-white/60'],
        };

        $isBankDeposit = ($deposit->deposit_type ?? 'crypto') === 'bank';
    @endphp

    <div x-data="{ copied: false }" class="space-y-6">
        @include('templates.notification')

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Deposit details</p>
                <div class="mt-2 flex flex-wrap items-center gap-3">
                    <h1 class="font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">#{{ $deposit->reference }}</h1>
                    <span class="rounded-full px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] {{ $statusMeta[1] }}">{{ $statusMeta[0] }}</span>
                    <span class="rounded-full bg-ink-950/5 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] text-ink-600 dark:bg-white/10 dark:text-white/55">
                        {{ $isBankDeposit ? 'Bank deposit' : 'Crypto deposit' }}
                    </span>
                </div>
                <p class="mt-2 text-sm text-ink-500 dark:text-white/40">Created {{ $deposit->created_at->format('d M Y, h:i a') }}</p>
            </div>

            <a href="{{ route('deposit.index') }}" class="inline-flex items-center gap-2 self-start rounded-xl border border-ink-950/10 bg-white px-4 py-2.5 text-sm font-semibold text-ink-800 transition hover:border-bronze-300 dark:border-white/10 dark:bg-white/5 dark:text-white/70 sm:self-auto">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M11.5 5.5 7 10l4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Deposit history
            </a>
        </div>

        <section class="relative overflow-hidden rounded-[2rem] bg-ink-950 p-6 text-white shadow-xl shadow-ink-950/10 sm:p-8">
            <div class="pointer-events-none absolute right-[-5rem] top-[-6rem] h-64 w-64 rounded-full border border-bronze-300/15"></div>
            <div class="relative grid gap-6 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Deposit amount</p>
                    <p class="mt-3 font-display text-4xl font-semibold tracking-[-0.035em] sm:text-5xl">${{ number_format($deposit->amount, 2) }}</p>
                    <p class="mt-3 text-sm leading-6 text-white/50">
                        @if($isBankDeposit)
                            Deposit method: <span class="font-semibold text-white/75">Bank transfer</span>
                        @else
                            Payment asset: <span class="font-semibold text-white/75">{{ $deposit->asset }}</span>
                        @endif
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:min-w-[360px]">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-white/35">Payment ref</p>
                        <p class="mt-2 truncate text-sm font-semibold">{{ $deposit->paymentRef ?: '—' }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-white/35">Status</p>
                        <p class="mt-2 text-sm font-semibold">{{ $statusMeta[0] }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_320px]">
            <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Payment instructions</p>

                @if($isBankDeposit)
                    <h2 class="mt-2 text-xl font-semibold text-ink-950 dark:text-white">Contact support for your unique bank details.</h2>

                    <div class="mt-5 rounded-2xl border border-bronze-200 bg-bronze-50 p-5 dark:border-bronze-300/20 dark:bg-bronze-300/10">
                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-bronze-700 shadow-sm dark:bg-white/10 dark:text-bronze-300">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 9h16M5.5 9V19M9.75 9V19M14.25 9V19M18.5 9V19M3 19h18M12 3l9 4H3l9-4Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div>
                                <p class="font-semibold text-ink-950 dark:text-white">Do not send funds to a generic bank account.</p>
                                <p class="mt-1 text-sm leading-6 text-ink-600 dark:text-white/50">Bank details are issued uniquely for your account. Contact support and provide deposit reference <span class="font-semibold text-ink-900 dark:text-white/80">#{{ $deposit->reference }}</span> to receive the correct bank details for this ${{ number_format($deposit->amount, 2) }} deposit.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/contact') }}" class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-ink-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-ink-900 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                        Contact support
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                @else
                    <h2 class="mt-2 text-xl font-semibold text-ink-950 dark:text-white">Send the payment to this address.</h2>

                    <div class="mt-4 rounded-2xl bg-paper-50 p-4 dark:bg-white/[0.03]">
                        @if($deposit->paymentMethod == 1)
                            <p class="text-sm leading-6 text-ink-600 dark:text-white/50">Send exactly <span class="font-semibold text-ink-900 dark:text-white/80">{{ number_format($deposit->cryptoAmount, 5) }} {{ $deposit->asset }}</span> to the address below.</p>
                        @else
                            <p class="text-sm leading-6 text-ink-600 dark:text-white/50">Send <span class="font-semibold text-ink-900 dark:text-white/80">${{ number_format($deposit->amount, 2) }} worth of {{ $deposit->asset }}</span> to the address below.</p>
                        @endif
                    </div>

                    <div class="mt-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Wallet address</p>
                        <div class="mt-2 flex flex-col gap-3 sm:flex-row sm:items-center">
                            <div class="min-w-0 flex-1 break-all rounded-2xl border border-ink-950/8 bg-paper-50 px-4 py-3 font-mono text-sm leading-6 text-ink-800 dark:border-white/10 dark:bg-white/[0.03] dark:text-white/70">{{ $deposit->details }}</div>
                            <button
                                type="button"
                                @click="navigator.clipboard.writeText('{{ $deposit->details }}').then(() => { copied = true; setTimeout(() => copied = false, 1800) })"
                                class="inline-flex h-12 shrink-0 items-center justify-center gap-2 rounded-xl bg-ink-950 px-4 text-sm font-bold text-white transition hover:bg-ink-900 dark:bg-bronze-300 dark:text-ink-950"
                            >
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><rect x="6" y="6" width="9" height="9" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M12 6V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                <span x-text="copied ? 'Copied' : 'Copy address'"></span>
                            </button>
                        </div>
                    </div>

                    @if($deposit->transactionHash)
                        <div class="mt-5 border-t border-ink-950/8 pt-5 dark:border-white/10">
                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-400 dark:text-white/30">Transaction hash</p>
                            <p class="mt-2 break-all font-mono text-sm leading-6 text-ink-700 dark:text-white/60">{{ $deposit->transactionHash }}</p>
                        </div>
                    @endif
                @endif

                <div class="mt-6 flex flex-wrap gap-3 border-t border-ink-950/8 pt-5 dark:border-white/10">
                    @if(in_array($deposit->status, [2, 4]))
                        <a href="{{ route('deposit.havePaid', $deposit->id) }}" class="inline-flex items-center justify-center rounded-xl bg-bronze-300 px-5 py-3 text-sm font-bold text-ink-950 transition hover:bg-bronze-200">
                            {{ $isBankDeposit ? 'I’ve made the bank transfer' : 'I’ve deposited' }}
                        </a>
                    @endif

                    @if($deposit->status == 4 && $deposit->paymentProof)
                        <a href="{{ url($deposit->paymentProof) }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-xl border border-ink-950/10 px-5 py-3 text-sm font-semibold text-ink-800 transition hover:border-bronze-300 dark:border-white/10 dark:text-white/70">
                            View submitted proof
                        </a>
                    @endif
                </div>
            </section>

            <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">
                @unless($isBankDeposit)
                    <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035]">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Scan to pay</p>
                        <div class="mt-4 flex items-center justify-center rounded-2xl bg-white p-4 ring-1 ring-ink-950/5">
                            <img
                                class="h-44 w-44 rounded-xl bg-white p-1"
                                alt="Deposit wallet address QR code"
                                src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($deposit->details) }}"
                                loading="lazy"
                            >
                        </div>
                        <p class="mt-3 text-center text-xs leading-5 text-ink-500 dark:text-white/35">If your wallet cannot scan the code, copy the address manually.</p>
                    </section>
                @endunless

                <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035]">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Deposit summary</p>
                    <div class="mt-4 divide-y divide-ink-950/8 text-sm dark:divide-white/10">
                        <div class="flex justify-between gap-4 py-3 first:pt-0">
                            <span class="text-ink-500 dark:text-white/40">Type</span>
                            <span class="font-semibold text-ink-900 dark:text-white/80">{{ $isBankDeposit ? 'Bank deposit' : 'Crypto deposit' }}</span>
                        </div>
                        @unless($isBankDeposit)
                            <div class="flex justify-between gap-4 py-3"><span class="text-ink-500 dark:text-white/40">Asset</span><span class="font-semibold text-ink-900 dark:text-white/80">{{ $deposit->asset }}</span></div>
                        @endunless
                        <div class="flex justify-between gap-4 py-3"><span class="text-ink-500 dark:text-white/40">Created</span><span class="text-right font-semibold text-ink-900 dark:text-white/80">{{ $deposit->created_at->format('d M Y') }}</span></div>
                        <div class="flex justify-between gap-4 py-3"><span class="text-ink-500 dark:text-white/40">Reference</span><span class="text-right font-semibold text-ink-900 dark:text-white/80">#{{ $deposit->reference }}</span></div>
                        <div class="flex justify-between gap-4 py-3 last:pb-0"><span class="text-ink-500 dark:text-white/40">Status</span><span class="text-right font-semibold text-ink-900 dark:text-white/80">{{ $statusMeta[0] }}</span></div>
                    </div>
                </section>
            </aside>
        </div>
    </div>
@endsection
