@extends('layouts.dashboard')

@section('title', $pageName ?? 'Transfer Funds')

@section('content')
    @inject('injected', 'App\Defaults\Custom')

    <div x-data="{ submitting: false, showPassword: false }" class="space-y-6">
        @include('templates.notification')

        <div>
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Internal transfer</p>
            <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] text-ink-950 dark:text-white sm:text-4xl">Move funds between accounts.</h1>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-ink-600 dark:text-white/50">Send funds from your profit balance to another {{ config('app.name') }} user using their username.</p>
        </div>

        <div class="grid gap-6 lg:grid-cols-[340px_minmax(0,1fr)]">
            <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">
                <section class="relative overflow-hidden rounded-[1.7rem] bg-ink-950 p-6 text-white shadow-xl shadow-ink-950/10">
                    <div class="pointer-events-none absolute -right-12 -top-16 h-44 w-44 rounded-full border border-bronze-300/15"></div>
                    <div class="relative">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">Available to transfer</p>
                        <p class="mt-3 font-display text-4xl font-semibold tracking-[-0.035em]">${{ number_format($user->profit, 2) }}</p>
                        <p class="mt-2 text-sm leading-6 text-white/45">Transfers are funded from your profit balance.</p>
                    </div>
                </section>

                <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035]">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Before you send</p>
                    <div class="mt-4 space-y-3 text-sm leading-6 text-ink-600 dark:text-white/50">
                        <p>Confirm the recipient username carefully. Transfers are credited to the matching account.</p>
                        <p>Your account password is required to authorise the request.</p>
                    </div>
                </section>
            </aside>

            <section class="rounded-[1.7rem] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-white/[0.035] sm:p-6">
                @if($user->canLoan == 1)
                    <form method="POST" action="{{ route('transfer.new') }}" @submit="submitting = true" class="space-y-5">
                        @csrf

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Transfer details</p>
                            <h2 class="mt-2 text-xl font-semibold text-ink-950 dark:text-white">Who are you sending to?</h2>
                        </div>

                        <div>
                            <label for="username" class="text-sm font-semibold text-ink-900 dark:text-white/80">Recipient username</label>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                value="{{ old('username') }}"
                                placeholder="Enter username"
                                class="mt-2 w-full rounded-2xl border border-ink-950/10 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                            >
                        </div>

                        <div>
                            <label for="amount" class="text-sm font-semibold text-ink-900 dark:text-white/80">Amount</label>
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
                        </div>

                        <div>
                            <label for="password" class="text-sm font-semibold text-ink-900 dark:text-white/80">Account password</label>
                            <div class="relative mt-2">
                                <input
                                    :type="showPassword ? 'text' : 'password'"
                                    name="password"
                                    id="password"
                                    placeholder="Confirm with your password"
                                    class="w-full rounded-2xl border border-ink-950/10 bg-paper-50 px-4 py-3.5 pr-12 text-sm text-ink-950 outline-none transition placeholder:text-ink-300 focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/15 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/20"
                                >
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-ink-400 transition hover:text-ink-700 dark:text-white/35 dark:hover:text-white" aria-label="Toggle password visibility">
                                    <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6S2.5 12 2.5 12Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg>
                                    <svg x-show="showPassword" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="m4 4 16 16M10.6 6.1A10.6 10.6 0 0 1 12 6c6 0 9.5 6 9.5 6a15 15 0 0 1-2.3 3M6.2 7.2C3.8 9 2.5 12 2.5 12s3.5 6 9.5 6c1 0 1.9-.16 2.7-.42M9.9 9.9a3 3 0 0 0 4.2 4.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>

                        <button
                            type="submit"
                            :disabled="submitting"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-bronze-300 px-5 py-3.5 text-sm font-bold text-ink-950 transition hover:-translate-y-0.5 hover:bg-bronze-200 disabled:cursor-not-allowed disabled:opacity-60"
                        >
                            <svg x-show="submitting" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-75" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                            <span x-text="submitting ? 'Sending transfer…' : 'Send transfer'"></span>
                        </button>
                    </form>
                @else
                    <div class="py-10 text-center">
                        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-red-600 dark:bg-red-400/10 dark:text-red-300">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none"><path d="M12 8v4m0 4h.01M10.3 4.7 3.5 17a2 2 0 0 0 1.75 3h13.5a2 2 0 0 0 1.75-3L13.7 4.7a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                        <h2 class="mt-5 font-display text-2xl font-semibold text-ink-950 dark:text-white">Transfers are currently unavailable</h2>
                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-ink-500 dark:text-white/45">Contact support if you believe transfers should be enabled for your account.</p>
                    </div>
                @endif
            </section>
        </div>

        <section class="overflow-hidden rounded-[1.7rem] border border-ink-950/8 bg-white shadow-sm dark:border-white/10 dark:bg-white/[0.035]">
            <div class="border-b border-ink-950/8 px-5 py-5 dark:border-white/10 sm:px-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Transfer activity</p>
                <h2 class="mt-2 text-lg font-semibold text-ink-950 dark:text-white">Recent transfers</h2>
            </div>

            @forelse($transfers as $account)
                @php
                    $outgoing = (int) $account->sender === (int) $user->id;
                    $counterparty = $outgoing ? $account->recipientHolder : $injected->getInvestorUsername($account->sender);
                    $statusMeta = match ((int) $account->status) {
                        1 => ['Completed', 'text-emerald-700 dark:text-emerald-300'],
                        2 => ['Pending', 'text-sky-700 dark:text-sky-300'],
                        4 => ['Ongoing', 'text-amber-700 dark:text-amber-300'],
                        default => ['Cancelled', 'text-red-700 dark:text-red-300'],
                    };
                @endphp

                <div class="grid gap-4 border-b border-ink-950/8 px-5 py-4 last:border-b-0 dark:border-white/10 sm:grid-cols-[1fr_auto_auto] sm:items-center sm:px-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl {{ $outgoing ? 'bg-red-50 text-red-600 dark:bg-red-400/10 dark:text-red-300' : 'bg-emerald-50 text-emerald-600 dark:bg-emerald-400/10 dark:text-emerald-300' }}">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none"><path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="{{ $outgoing ? '' : 'origin-center rotate-180' }}"/></svg>
                        </span>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-ink-900 dark:text-white/80">{{ $outgoing ? 'Sent to' : 'Received from' }} {{ $counterparty }}</p>
                            <p class="mt-1 text-xs text-ink-400 dark:text-white/30">{{ $account->created_at->format('d M Y, h:i a') }} · #{{ $account->reference }}</p>
                        </div>
                    </div>
                    <p class="font-display text-lg font-semibold {{ $outgoing ? 'text-ink-950 dark:text-white' : 'text-emerald-700 dark:text-emerald-300' }}">{{ $outgoing ? '−' : '+' }}${{ number_format($account->amount ?? 0, 2) }}</p>
                    <p class="text-xs font-bold uppercase tracking-[0.12em] {{ $statusMeta[1] }}">{{ $statusMeta[0] }}</p>
                </div>
            @empty
                <div class="px-6 py-12 text-center">
                    <p class="font-semibold text-ink-800 dark:text-white/70">No transfers yet</p>
                    <p class="mt-1 text-sm text-ink-500 dark:text-white/40">Your sent and received transfers will appear here.</p>
                </div>
            @endforelse
        </section>
    </div>
@endsection
