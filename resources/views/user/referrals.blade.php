@extends('layouts.dashboard')

@section('title', $pageName ?? 'Referrals')

@section('content')
    @php
        $referralLink = route('home.index', ['referral' => $user->username]);
        $activeReferrals = $referrals->where('status', 1)->count();
    @endphp

    <div class="mx-auto max-w-6xl space-y-6">
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] bg-ink-950 text-white shadow-xl shadow-ink-950/10">
            <div class="grid gap-7 px-5 py-6 sm:px-7 sm:py-8 lg:grid-cols-[1fr_auto] lg:items-end lg:px-9">
                <div class="max-w-3xl">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">Referrals</p>
                    <h1 class="mt-3 font-display text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">Invite people through your personal referral link.</h1>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-white/60">
                        Share your account referral link and track the people who registered through it. Referral rewards that have already been credited remain visible in your referral balance.
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-3 lg:min-w-[390px]">
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-3.5 py-3">
                        <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-white/40">Balance</p>
                        <p class="mt-1 truncate text-base font-bold sm:text-lg">${{ number_format($user->refBal, 2) }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-3.5 py-3">
                        <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-white/40">Referrals</p>
                        <p class="mt-1 text-base font-bold sm:text-lg">{{ $referrals->count() }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-3.5 py-3">
                        <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-white/40">Active</p>
                        <p class="mt-1 text-base font-bold sm:text-lg">{{ $activeReferrals }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section
            x-data="{ copied: false, async copyLink() { await navigator.clipboard.writeText('{{ $referralLink }}'); this.copied = true; setTimeout(() => this.copied = false, 1800); }, async shareLink() { if (navigator.share) { await navigator.share({ title: '{{ config('app.name') }}', url: '{{ $referralLink }}' }); } else { await this.copyLink(); } } }"
            class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6"
        >
            <div class="grid gap-5 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Your referral link</p>
                    <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Share one link</h2>
                    <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Anyone who registers through this URL is associated with your referral account by the existing referral flow.</p>

                    <div class="mt-4 flex min-w-0 items-center gap-2 rounded-2xl border border-paper-200 bg-paper-50 p-2 dark:border-white/10 dark:bg-white/[0.03]">
                        <div class="min-w-0 flex-1 px-2">
                            <p class="truncate text-xs font-semibold text-ink-700 dark:text-white/65">{{ $referralLink }}</p>
                        </div>
                        <button type="button" @click="copyLink()" class="inline-flex h-10 shrink-0 items-center justify-center rounded-xl bg-ink-950 px-4 text-xs font-bold text-white transition hover:bg-ink-900 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                            <span x-show="!copied">Copy</span>
                            <span x-show="copied" x-cloak>Copied</span>
                        </button>
                    </div>
                </div>

                <button type="button" @click="shareLink()" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-2xl border border-paper-200 px-5 py-2.5 text-sm font-bold text-ink-950 transition hover:bg-paper-50 dark:border-white/10 dark:text-white dark:hover:bg-white/5">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M8.5 12.5 15.5 8M8.5 11.5l7 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="6" cy="12" r="2.5" stroke="currentColor" stroke-width="1.7"/><circle cx="18" cy="6.5" r="2.5" stroke="currentColor" stroke-width="1.7"/><circle cx="18" cy="17.5" r="2.5" stroke="currentColor" stroke-width="1.7"/></svg>
                    Share link
                </button>
            </div>
        </section>

        <section class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Network</p>
                    <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">People you referred</h2>
                </div>
                <p class="text-xs text-ink-600 dark:text-white/40">{{ $referrals->count() }} total</p>
            </div>

            @forelse ($referrals as $referral)
                <article class="mt-4 rounded-2xl border border-paper-200 bg-paper-50 p-4 dark:border-white/10 dark:bg-white/[0.03] sm:p-5">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex min-w-0 items-center gap-3.5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-ink-950 text-sm font-bold text-white dark:bg-bronze-300 dark:text-ink-950">
                                {{ strtoupper(substr($referral->name ?: $referral->username, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="truncate text-sm font-bold text-ink-950 dark:text-white">{{ $referral->name }}</p>
                                <p class="mt-1 truncate text-xs text-ink-600 dark:text-white/40">{{ $referral->email }}</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-2 sm:justify-end">
                            <span class="rounded-full border border-paper-200 bg-white px-2.5 py-1 text-[10px] font-bold text-ink-600 dark:border-white/10 dark:bg-ink-950/30 dark:text-white/45">Ref {{ $referral->userRef }}</span>
                            @if((int) $referral->status === 1)
                                <span class="rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.1em] text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">Active</span>
                            @else
                                <span class="rounded-full border border-paper-200 bg-paper-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.1em] text-ink-600 dark:border-white/10 dark:bg-white/5 dark:text-white/40">Inactive</span>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="mt-6 rounded-2xl border border-dashed border-paper-200 px-5 py-12 text-center dark:border-white/10">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-bronze-100 text-bronze-700 dark:bg-bronze-300/10 dark:text-bronze-200">
                        @include('layouts.partials.user-nav-icon', ['icon' => 'referrals', 'class' => 'h-6 w-6'])
                    </div>
                    <h3 class="mt-4 text-base font-bold text-ink-950 dark:text-white">No referrals yet</h3>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-ink-600 dark:text-white/45">Share your referral link. New accounts associated with your referral will appear here.</p>
                </div>
            @endforelse
        </section>
    </div>
@endsection
