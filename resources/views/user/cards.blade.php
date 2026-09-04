@extends('layouts.dashboard')

@section('title', $pageName ?? 'Cards')
@section('page_heading', 'Cards')

@section('content')
    @php
        $activeCards = $cards->getCollection()->where('status', 1)->count();
        $pendingCards = $cards->getCollection()->where('status', 2)->count();
    @endphp

    <div class="mx-auto max-w-6xl space-y-6">
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] border border-ink-950/8 bg-ink-950 text-white shadow-sm dark:border-white/8">
            <div class="grid gap-8 px-5 py-7 sm:px-7 lg:grid-cols-[1.15fr_.85fr] lg:px-9 lg:py-9">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                        Card services
                    </div>
                    <h1 class="mt-4 font-display text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">Apply for a client card.</h1>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-white/58">
                        Submit the name you want on the card, your delivery address and your preferred card network. Applications are reviewed before fulfilment.
                    </p>
                </div>

                <div class="relative min-h-[178px] overflow-hidden rounded-[24px] border border-white/10 bg-white/[0.045] p-5">
                    <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full border border-bronze-300/15"></div>
                    <div class="absolute -bottom-14 -left-8 h-40 w-40 rounded-full border border-white/8"></div>
                    <div class="relative flex h-full flex-col justify-between">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-white/35">Application card</p>
                                <p class="mt-2 text-sm font-semibold text-white/85">{{ config('app.name') }}</p>
                            </div>
                            <span class="flex h-9 w-12 items-center justify-center rounded-lg border border-bronze-300/25 bg-bronze-300/10">
                                <svg class="h-5 w-7 text-bronze-300" viewBox="0 0 28 20" fill="none" aria-hidden="true"><rect x="1" y="1" width="26" height="18" rx="3" stroke="currentColor" stroke-width="1.2"/><path d="M5 7h18M5 13h7" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>
                            </span>
                        </div>
                        <div class="mt-8 flex items-end justify-between gap-4">
                            <div>
                                <p class="text-[9px] uppercase tracking-[0.16em] text-white/28">Name on card</p>
                                <p class="mt-1 text-sm font-semibold tracking-[0.08em] text-white/80">{{ strtoupper($user->name ?? 'CLIENT NAME') }}</p>
                            </div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">Preview</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_330px]">
            <section
                x-data="{
                    submitting: false,
                    cardType: @js(old('cardType', ''))
                }"
                class="rounded-[26px] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035] sm:p-7"
            >
                <div class="border-b border-ink-950/8 pb-5 dark:border-white/8">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">New application</p>
                    <h2 class="mt-2 text-xl font-bold text-ink-950 dark:text-white">Card details</h2>
                    <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Choose the network you prefer and provide the delivery information for the application.</p>
                </div>

                <form method="POST" action="{{ route('card.apply') }}" class="mt-6 space-y-6" @submit="submitting = true">
                    @csrf

                    <div>
                        <label for="card-name" class="mb-2 block text-xs font-bold text-ink-800 dark:text-white/70">Name on card</label>
                        <input
                            id="card-name"
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            maxlength="150"
                            required
                            placeholder="Enter name as it should appear"
                            class="w-full rounded-xl border border-ink-950/10 bg-paper-50 px-4 py-3 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-2 focus:ring-bronze-300/20 dark:border-white/10 dark:bg-white/5 dark:text-white"
                        >
                    </div>

                    <div>
                        <label class="mb-3 block text-xs font-bold text-ink-800 dark:text-white/70">Preferred network</label>
                        <div class="grid gap-3 sm:grid-cols-3">
                            @foreach(['Mastercard', 'Visa', 'Discover'] as $type)
                                <label
                                    class="relative cursor-pointer rounded-2xl border p-4 transition"
                                    :class="cardType === @js($type)
                                        ? 'border-bronze-400 bg-bronze-100/45 ring-2 ring-bronze-300/20 dark:border-bronze-300/45 dark:bg-bronze-300/[0.07]'
                                        : 'border-ink-950/10 bg-paper-50 hover:border-bronze-400/60 dark:border-white/10 dark:bg-white/[0.025]'"
                                >
                                    <input type="radio" name="cardType" value="{{ $type }}" x-model="cardType" required class="sr-only">
                                    <div class="flex items-center justify-between gap-3">
                                        <span class="flex h-9 w-11 items-center justify-center rounded-lg bg-ink-950 text-bronze-300 dark:bg-white/8">
                                            <svg class="h-4 w-6" viewBox="0 0 24 16" fill="none" aria-hidden="true"><rect x="1" y="1" width="22" height="14" rx="2.5" stroke="currentColor" stroke-width="1.2"/><path d="M4 6h16" stroke="currentColor" stroke-width="1.2"/></svg>
                                        </span>
                                        <span x-show="cardType === @js($type)" x-cloak class="flex h-5 w-5 items-center justify-center rounded-full bg-ink-950 text-white dark:bg-bronze-300 dark:text-ink-950">
                                            <svg class="h-3 w-3" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m5 10 3 3 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </span>
                                    </div>
                                    <p class="mt-4 text-sm font-bold text-ink-950 dark:text-white">{{ $type }}</p>
                                    <p class="mt-1 text-[11px] text-ink-600 dark:text-white/38">Select {{ $type }}</p>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label for="card-address" class="mb-2 block text-xs font-bold text-ink-800 dark:text-white/70">Delivery address</label>
                        <textarea
                            id="card-address"
                            name="address"
                            rows="4"
                            maxlength="150"
                            required
                            placeholder="Enter the complete delivery address"
                            class="w-full resize-none rounded-xl border border-ink-950/10 bg-paper-50 px-4 py-3 text-sm leading-6 text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-2 focus:ring-bronze-300/20 dark:border-white/10 dark:bg-white/5 dark:text-white"
                        >{{ old('address') }}</textarea>
                        <p class="mt-2 text-[11px] leading-5 text-ink-600 dark:text-white/35">Use an address where you can receive the card if the application is approved.</p>
                    </div>

                    <div class="flex flex-col gap-3 border-t border-ink-950/8 pt-6 dark:border-white/8 sm:flex-row sm:items-center sm:justify-between">
                        <p class="max-w-md text-xs leading-5 text-ink-600 dark:text-white/40">Submitting creates a card application. Approval and fulfilment are handled after review.</p>
                        <button
                            type="submit"
                            :disabled="submitting"
                            class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-ink-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200"
                        >
                            <svg x-show="submitting" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                            <span x-text="submitting ? 'Submitting...' : 'Submit application'">Submit application</span>
                        </button>
                    </div>
                </form>
            </section>

            <aside class="space-y-4 lg:sticky lg:top-[106px] lg:self-start">
                <div class="grid grid-cols-2 gap-3">
                    <div class="rounded-[22px] border border-ink-950/8 bg-white p-4 shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                        <p class="text-[9px] font-bold uppercase tracking-[0.17em] text-ink-600 dark:text-white/35">Active</p>
                        <p class="mt-2 text-2xl font-bold text-ink-950 dark:text-white">{{ $activeCards }}</p>
                    </div>
                    <div class="rounded-[22px] border border-ink-950/8 bg-white p-4 shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                        <p class="text-[9px] font-bold uppercase tracking-[0.17em] text-ink-600 dark:text-white/35">Pending</p>
                        <p class="mt-2 text-2xl font-bold text-ink-950 dark:text-white">{{ $pendingCards }}</p>
                    </div>
                </div>

                <div class="rounded-[24px] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Application flow</p>
                    <div class="mt-4 space-y-4">
                        @foreach([
                            ['01', 'Submit', 'Choose the card network and provide delivery details.'],
                            ['02', 'Review', 'The application is reviewed before approval.'],
                            ['03', 'Follow-up', 'Further payment or fulfilment instructions are provided through support.'],
                        ] as $step)
                            <div class="flex gap-3">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-paper-100 text-[9px] font-bold text-ink-700 dark:bg-white/7 dark:text-white/55">{{ $step[0] }}</span>
                                <div>
                                    <p class="text-xs font-bold text-ink-950 dark:text-white">{{ $step[1] }}</p>
                                    <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/40">{{ $step[2] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>

        <section class="rounded-[26px] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035] sm:p-7">
            <div class="flex flex-col gap-2 border-b border-ink-950/8 pb-5 dark:border-white/8 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Applications</p>
                    <h2 class="mt-2 text-xl font-bold text-ink-950 dark:text-white">Card application history</h2>
                </div>
                <p class="text-xs text-ink-600 dark:text-white/38">{{ $cards->total() }} total</p>
            </div>

            <div class="mt-5 space-y-3">
                @forelse($cards as $card)
                    @php
                        $status = match((int) $card->status) {
                            1 => ['Active', 'bg-emerald-100 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300'],
                            2 => ['Pending', 'bg-amber-100 text-amber-700 dark:bg-amber-300/10 dark:text-amber-300'],
                            3 => ['Cancelled', 'bg-red-100 text-red-700 dark:bg-red-400/10 dark:text-red-300'],
                            default => ['Unknown', 'bg-paper-100 text-ink-700 dark:bg-white/7 dark:text-white/55'],
                        };
                    @endphp
                    <article class="rounded-2xl border border-ink-950/8 bg-paper-50 p-4 dark:border-white/8 dark:bg-white/[0.025] sm:p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex min-w-0 items-center gap-4">
                                <span class="flex h-11 w-14 shrink-0 items-center justify-center rounded-xl bg-ink-950 text-bronze-300 dark:bg-white/8">
                                    <svg class="h-5 w-8" viewBox="0 0 28 18" fill="none" aria-hidden="true"><rect x="1" y="1" width="26" height="16" rx="3" stroke="currentColor" stroke-width="1.2"/><path d="M4 7h20" stroke="currentColor" stroke-width="1.2"/></svg>
                                </span>
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <p class="truncate text-sm font-bold text-ink-950 dark:text-white">{{ $card->cardType }}</p>
                                        <span class="rounded-full px-2.5 py-1 text-[10px] font-bold {{ $status[1] }}">{{ $status[0] }}</span>
                                    </div>
                                    <p class="mt-1 truncate text-xs text-ink-600 dark:text-white/40">{{ $card->name }} · Ref {{ $card->reference }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3 sm:min-w-[250px]">
                                <div>
                                    <p class="text-[9px] font-bold uppercase tracking-[0.15em] text-ink-600 dark:text-white/30">Submitted</p>
                                    <p class="mt-1 text-xs font-semibold text-ink-800 dark:text-white/65">{{ $card->created_at->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-[9px] font-bold uppercase tracking-[0.15em] text-ink-600 dark:text-white/30">Delivery</p>
                                    <p class="mt-1 line-clamp-2 text-xs font-semibold text-ink-800 dark:text-white/65">{{ $card->address }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-2xl border border-dashed border-ink-950/15 px-5 py-12 text-center dark:border-white/12">
                        <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-paper-100 text-ink-600 dark:bg-white/7 dark:text-white/45">
                            @include('layouts.partials.user-nav-icon', ['icon' => 'card'])
                        </span>
                        <h3 class="mt-4 text-sm font-bold text-ink-950 dark:text-white">No card applications yet</h3>
                        <p class="mx-auto mt-2 max-w-sm text-xs leading-5 text-ink-600 dark:text-white/38">Your submitted applications and their statuses will appear here.</p>
                    </div>
                @endforelse
            </div>

            @if($cards->hasPages())
                <div class="mt-6 border-t border-ink-950/8 pt-5 dark:border-white/8">
                    {{ $cards->links() }}
                </div>
            @endif
        </section>
    </div>
@endsection
