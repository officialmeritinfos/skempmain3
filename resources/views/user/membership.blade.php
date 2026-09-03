@extends('layouts.dashboard')

@section('title', 'Membership')

@section('content')
    @php
        $memberStatus = fn ($status) => match ((int) $status) {
            1 => ['Active', 'border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300'],
            2 => ['Pending review', 'border-sky-200 bg-sky-50 text-sky-700 dark:border-sky-500/20 dark:bg-sky-500/10 dark:text-sky-300'],
            3 => ['Cancelled', 'border-red-200 bg-red-50 text-red-700 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-300'],
            default => ['Unknown', 'border-paper-200 bg-paper-100 text-ink-700 dark:border-white/10 dark:bg-white/5 dark:text-white/60'],
        };
    @endphp

    <div class="mx-auto max-w-6xl space-y-6">
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] bg-ink-950 text-white shadow-xl shadow-ink-950/10">
            <div class="grid gap-6 px-5 py-6 sm:px-7 sm:py-8 lg:grid-cols-[1fr_auto] lg:items-end lg:px-9">
                <div class="max-w-3xl">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">Membership</p>
                    <h1 class="mt-3 font-display text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">Apply for your membership identity.</h1>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-white/60">
                        Submit the personal details and passport-sized photograph required by the current membership application workflow. You can track each application below.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-3 sm:min-w-72">
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-white/40">Applications</p>
                        <p class="mt-1 text-xl font-bold">{{ $members->total() }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-white/40">Active</p>
                        <p class="mt-1 text-xl font-bold">{{ $members->getCollection()->where('status', 1)->count() }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 xl:grid-cols-[.95fr_1.05fr]">
            <section
                x-data="{ loading: false, preview: null }"
                class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6"
            >
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">New application</p>
                    <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Membership details</h2>
                    <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Use information that matches the identity you want associated with the membership record.</p>
                </div>

                <form method="POST" action="{{ route('membership.new') }}" enctype="multipart/form-data" @submit="loading = true" class="mt-6 space-y-5">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="membership-name" class="text-xs font-bold text-ink-700 dark:text-white/60">Full name</label>
                            <input id="membership-name" type="text" name="name" value="{{ old('name', $user->name) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div>
                            <label for="membership-phone" class="text-xs font-bold text-ink-700 dark:text-white/60">Phone</label>
                            <input id="membership-phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div>
                            <label for="membership-country" class="text-xs font-bold text-ink-700 dark:text-white/60">Country</label>
                            <input id="membership-country" type="text" name="country" value="{{ old('country', $user->country) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div>
                            <label for="membership-state" class="text-xs font-bold text-ink-700 dark:text-white/60">State / region</label>
                            <input id="membership-state" type="text" name="state" value="{{ old('state') }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="membership-address" class="text-xs font-bold text-ink-700 dark:text-white/60">Address</label>
                            <textarea id="membership-address" name="address" rows="3" required class="mt-2 w-full resize-none rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-ink-700 dark:text-white/60">Passport-sized photograph</label>
                        <label class="mt-2 flex cursor-pointer items-center gap-4 rounded-2xl border border-dashed border-paper-200 bg-paper-50 p-4 transition hover:border-bronze-300 dark:border-white/10 dark:bg-white/[0.03]">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-white text-ink-600 shadow-sm dark:bg-white/5 dark:text-white/40">
                                <img x-show="preview" :src="preview" alt="Selected membership photograph" class="h-full w-full object-cover" x-cloak>
                                <svg x-show="!preview" class="h-6 w-6" viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-ink-950 dark:text-white">Choose photograph</p>
                                <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/45">Image file, up to the existing 2MB application limit.</p>
                            </div>
                            <input type="file" name="selfie" accept="image/*" required class="sr-only" @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                        </label>
                    </div>

                    <button type="submit" :disabled="loading" class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-2xl bg-ink-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                        <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                        <span x-text="loading ? 'Submitting...' : 'Submit membership application'"></span>
                    </button>
                </form>
            </section>

            <section class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Application history</p>
                    <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Membership records</h2>
                </div>

                <div class="mt-5 space-y-3">
                    @forelse ($members as $member)
                        @php($meta = $memberStatus($member->status))
                        <article class="rounded-2xl border border-paper-200 bg-paper-50 p-4 dark:border-white/10 dark:bg-white/[0.03] sm:p-5">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('dashboard/user/images/' . $member->selfie) }}" alt="Membership photograph" class="h-14 w-14 shrink-0 rounded-2xl object-cover ring-1 ring-paper-200 dark:ring-white/10">
                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                                        <div>
                                            <p class="truncate text-sm font-bold text-ink-950 dark:text-white">{{ $member->name }}</p>
                                            <p class="mt-1 text-xs text-ink-600 dark:text-white/40">Ref #{{ $member->reference }}</p>
                                        </div>
                                        <span class="inline-flex self-start rounded-full border px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] {{ $meta[1] }}">{{ $meta[0] }}</span>
                                    </div>

                                    <div class="mt-4 grid gap-3 text-xs sm:grid-cols-2">
                                        <div>
                                            <p class="text-ink-600 dark:text-white/35">Location</p>
                                            <p class="mt-1 font-semibold text-ink-950 dark:text-white">{{ $member->state }}, {{ $member->country }}</p>
                                        </div>
                                        <div>
                                            <p class="text-ink-600 dark:text-white/35">Phone</p>
                                            <p class="mt-1 font-semibold text-ink-950 dark:text-white">{{ $member->phone }}</p>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <p class="text-ink-600 dark:text-white/35">Address</p>
                                            <p class="mt-1 font-semibold leading-5 text-ink-950 dark:text-white">{{ $member->address }}</p>
                                        </div>
                                    </div>

                                    <p class="mt-4 text-[11px] text-ink-600 dark:text-white/35">Submitted {{ optional($member->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-2xl border border-dashed border-paper-200 px-5 py-12 text-center dark:border-white/10">
                            <h3 class="text-base font-bold text-ink-950 dark:text-white">No membership applications</h3>
                            <p class="mt-2 text-sm text-ink-600 dark:text-white/45">Your submitted membership applications will be shown here.</p>
                        </div>
                    @endforelse
                </div>

                @if($members->hasPages())
                    <div class="mt-5">{{ $members->links() }}</div>
                @endif
            </section>
        </div>
    </div>
@endsection
