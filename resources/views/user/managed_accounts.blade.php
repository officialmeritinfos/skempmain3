@extends('layouts.dashboard')

@section('title', $pageName ?? 'Managed Accounts')

@section('content')
    @php
        $statusMeta = fn ($status) => match ((int) $status) {
            1 => ['Completed', 'border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300'],
            2 => ['Pending', 'border-sky-200 bg-sky-50 text-sky-700 dark:border-sky-500/20 dark:bg-sky-500/10 dark:text-sky-300'],
            4 => ['Ongoing', 'border-bronze-200 bg-bronze-100/70 text-bronze-700 dark:border-bronze-300/20 dark:bg-bronze-300/10 dark:text-bronze-200'],
            default => ['Cancelled', 'border-red-200 bg-red-50 text-red-700 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-300'],
        };
    @endphp

    <div
        x-data="{ subscribeOpen: false, loading: false, selectedDuration: '{{ old('subDuration') }}', selectedAmount: '' }"
        @keydown.escape.window="subscribeOpen = false"
        class="mx-auto max-w-6xl space-y-6"
    >
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] bg-ink-950 text-white shadow-xl shadow-ink-950/10">
            <div class="grid gap-8 px-5 py-6 sm:px-7 sm:py-8 lg:grid-cols-[1fr_auto] lg:items-end lg:px-9">
                <div class="max-w-3xl">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">Managed account service</p>
                    <h1 class="mt-3 font-display text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">Professional oversight for an external trading account.</h1>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-white/60">
                        Submit an eligible trading account and choose a management duration. The subscription fee is deducted from your account balance when the request is created.
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col lg:items-end">
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-left lg:min-w-48">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-white/40">Account balance</p>
                        <p class="mt-1 text-xl font-bold">${{ number_format($user->balance, 2) }}</p>
                    </div>
                    <button
                        type="button"
                        @click="subscribeOpen = true"
                        class="inline-flex min-h-12 items-center justify-center rounded-2xl bg-bronze-300 px-5 py-3 text-sm font-bold text-ink-950 transition hover:bg-bronze-200"
                    >
                        Add managed account
                    </button>
                </div>
            </div>
        </section>

        <section class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Your accounts</p>
                    <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Managed-account subscriptions</h2>
                </div>
                <p class="text-xs text-ink-600 dark:text-white/45">{{ $accounts->count() }} {{ \Illuminate\Support\Str::plural('account', $accounts->count()) }}</p>
            </div>

            @forelse ($accounts as $account)
                @php($meta = $statusMeta($account->status))
                <article class="mt-5 rounded-2xl border border-paper-200 bg-paper-50 p-4 dark:border-white/10 dark:bg-white/[0.03] sm:p-5">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div class="min-w-0">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="text-sm font-bold text-ink-950 dark:text-white">Account {{ $account->accountId }}</p>
                                <span class="inline-flex rounded-full border px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] {{ $meta[1] }}">{{ $meta[0] }}</span>
                            </div>
                            <p class="mt-1 break-all text-xs text-ink-600 dark:text-white/45">Ref #{{ $account->reference }}</p>
                        </div>

                        <a
                            href="{{ route('subtrade.delete', ['id' => $account->reference]) }}"
                            class="inline-flex self-start rounded-xl border border-red-200 px-3 py-2 text-xs font-bold text-red-700 transition hover:bg-red-50 dark:border-red-500/20 dark:text-red-300 dark:hover:bg-red-500/10"
                        >
                            Remove
                        </a>
                    </div>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach([
                            ['Account type', $account->accountType],
                            ['Currency', $account->currency],
                            ['Leverage', $account->leverage],
                            ['Server', $account->server],
                            ['Duration', $account->duration],
                            ['Submitted', optional($account->created_at)->format('d M Y')],
                            ['Expires', $account->expires_at ? date('d M Y', $account->expires_at) : '—'],
                            ['Trading password', '••••••••'],
                        ] as $item)
                            <div class="rounded-xl border border-paper-200 bg-white px-3.5 py-3 dark:border-white/8 dark:bg-ink-950/30">
                                <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-600 dark:text-white/35">{{ $item[0] }}</p>
                                <p class="mt-1 truncate text-sm font-semibold text-ink-950 dark:text-white">{{ $item[1] ?: '—' }}</p>
                            </div>
                        @endforeach
                    </div>

                    @if(in_array((int) $account->status, [1, 4]) && !empty($account->started_at))
                        <p class="mt-4 text-xs text-ink-600 dark:text-white/45">Started {{ date('d M Y, h:i a', $account->started_at) }}</p>
                    @endif
                </article>
            @empty
                <div class="mt-6 rounded-2xl border border-dashed border-paper-200 px-5 py-10 text-center dark:border-white/10">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-bronze-100 text-bronze-700 dark:bg-bronze-300/10 dark:text-bronze-200">
                        @include('layouts.partials.user-nav-icon', ['icon' => 'managed', 'class' => 'h-6 w-6'])
                    </div>
                    <h3 class="mt-4 text-base font-bold text-ink-950 dark:text-white">No managed accounts yet</h3>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-ink-600 dark:text-white/45">When you submit a trading account for management, its subscription and status will appear here.</p>
                </div>
            @endforelse
        </section>

        <div
            x-show="subscribeOpen"
            x-cloak
            class="fixed inset-0 z-[80]"
            role="dialog"
            aria-modal="true"
        >
            <div class="absolute inset-0 bg-ink-950/70 backdrop-blur-sm" @click="subscribeOpen = false"></div>

            <div class="absolute inset-x-0 bottom-0 max-h-[92vh] overflow-y-auto rounded-t-[28px] bg-paper-50 shadow-2xl dark:bg-ink-950 lg:inset-y-0 lg:left-auto lg:right-0 lg:w-full lg:max-w-2xl lg:rounded-none">
                <div class="sticky top-0 z-10 flex items-center justify-between border-b border-paper-200 bg-paper-50/95 px-5 py-4 backdrop-blur dark:border-white/10 dark:bg-ink-950/95 sm:px-6">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">New subscription</p>
                        <h2 class="mt-1 text-lg font-bold text-ink-950 dark:text-white">Submit a trading account</h2>
                    </div>
                    <button type="button" @click="subscribeOpen = false" class="flex h-10 w-10 items-center justify-center rounded-xl border border-paper-200 text-ink-700 dark:border-white/10 dark:text-white/65" aria-label="Close">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('subtrade.new') }}" @submit="loading = true" class="space-y-7 px-5 py-6 sm:px-6 sm:py-7">
                    @csrf

                    <div>
                        <div class="flex items-end justify-between gap-4">
                            <div>
                                <p class="text-sm font-bold text-ink-950 dark:text-white">Choose management duration</p>
                                <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/45">The selected subscription fee is charged from your account balance.</p>
                            </div>
                        </div>

                        <div class="mt-4 grid gap-3 sm:grid-cols-2">
                            @foreach($durations as $duration)
                                <label
                                    class="relative cursor-pointer rounded-2xl border p-4 transition"
                                    :class="selectedDuration == '{{ $duration->id }}' ? 'border-bronze-400 bg-bronze-100/70 ring-2 ring-bronze-300/20 dark:border-bronze-300 dark:bg-bronze-300/10' : 'border-paper-200 bg-white hover:border-bronze-200 dark:border-white/10 dark:bg-white/[0.03]'"
                                    @click="selectedDuration = '{{ $duration->id }}'; selectedAmount = '{{ $duration->amount }}'"
                                >
                                    <input type="radio" name="subDuration" value="{{ $duration->id }}" class="sr-only" x-model="selectedDuration" required>
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-bold text-ink-950 dark:text-white">{{ $duration->title }}</p>
                                            <p class="mt-1 text-xs text-ink-600 dark:text-white/45">{{ $duration->duration }}</p>
                                        </div>
                                        <p class="text-lg font-bold text-ink-950 dark:text-white">${{ number_format($duration->amount, 2) }}</p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <input type="hidden" name="amount" :value="selectedAmount">

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="managed-account-id" class="text-xs font-bold text-ink-700 dark:text-white/60">Account ID</label>
                            <input id="managed-account-id" type="text" name="accountId" value="{{ old('accountId') }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div x-data="{ visible: false }">
                            <label for="managed-account-password" class="text-xs font-bold text-ink-700 dark:text-white/60">Trading password</label>
                            <div class="relative mt-2">
                                <input id="managed-account-password" :type="visible ? 'text' : 'password'" name="accountPassword" required class="w-full rounded-2xl border border-paper-200 bg-white px-4 py-3.5 pr-12 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                                <button type="button" @click="visible = !visible" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-ink-600 dark:text-white/45" aria-label="Show or hide password">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="2.8" stroke="currentColor" stroke-width="1.7"/></svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-ink-700 dark:text-white/60">Account type</label>
                            <input type="text" name="accountType" value="{{ old('accountType') }}" placeholder="e.g. Standard" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-ink-700 dark:text-white/60">Currency</label>
                            <input type="text" name="currency" value="{{ old('currency') }}" placeholder="e.g. USD" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-ink-700 dark:text-white/60">Leverage</label>
                            <input type="text" name="leverage" value="{{ old('leverage') }}" placeholder="e.g. 1:500" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-ink-700 dark:text-white/60">Server</label>
                            <input type="text" name="server" value="{{ old('server') }}" placeholder="Trading server" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                    </div>

                    <div class="rounded-2xl border border-bronze-200 bg-bronze-100/60 p-4 text-xs leading-6 text-bronze-700 dark:border-bronze-300/20 dark:bg-bronze-300/10 dark:text-bronze-200">
                        Confirm the account details carefully before submitting. The selected subscription amount will be deducted from your account balance when the request is accepted by the current workflow.
                    </div>

                    <button type="submit" :disabled="loading" class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-2xl bg-ink-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                        <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                        <span x-text="loading ? 'Submitting...' : 'Subscribe account'"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
