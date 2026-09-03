@extends('layouts.dashboard')

@section('title', $pageName ?? 'Account Settings')

@section('content')
    <div
        x-data="{ section: 'profile' }"
        class="mx-auto max-w-6xl space-y-6"
    >
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] bg-ink-950 text-white shadow-xl shadow-ink-950/10">
            <div class="grid gap-6 px-5 py-6 sm:px-7 sm:py-8 lg:grid-cols-[1fr_auto] lg:items-center lg:px-9">
                <div class="flex min-w-0 items-center gap-4 sm:gap-5">
                    <img
                        src="{{ empty($user->photo) ? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) : asset('dashboard/user/images/' . $user->photo) }}"
                        alt="{{ $user->name }}"
                        class="h-16 w-16 shrink-0 rounded-2xl border border-white/10 object-cover sm:h-20 sm:w-20"
                    >
                    <div class="min-w-0">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">Account settings</p>
                        <h1 class="mt-2 truncate font-display text-2xl font-semibold tracking-[-0.03em] sm:text-3xl">{{ $user->name }}</h1>
                        <p class="mt-1 truncate text-sm text-white/50">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:min-w-72">
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-white/40">Username</p>
                        <p class="mt-1 truncate text-sm font-bold">{{ $user->username }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-white/40">2FA</p>
                        <p class="mt-1 text-sm font-bold">{{ (int) $user->twoWay === 1 ? 'Enabled' : 'Disabled' }}</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 lg:grid-cols-[220px_1fr] xl:grid-cols-[240px_1fr]">
            <aside class="h-fit rounded-[24px] border border-paper-200 bg-white p-2 shadow-sm dark:border-white/10 dark:bg-ink-900 lg:sticky lg:top-24">
                @foreach([
                    ['profile', 'Profile', 'Personal information'],
                    ['photo', 'Photo', 'Profile image'],
                    ['security', 'Security', 'Password & 2FA'],
                ] as $tab)
                    <button
                        type="button"
                        @click="section = '{{ $tab[0] }}'"
                        class="flex w-full items-center justify-between rounded-2xl px-4 py-3 text-left transition"
                        :class="section === '{{ $tab[0] }}' ? 'bg-ink-950 text-white dark:bg-bronze-300 dark:text-ink-950' : 'text-ink-700 hover:bg-paper-50 dark:text-white/60 dark:hover:bg-white/5'"
                    >
                        <span>
                            <span class="block text-sm font-bold">{{ $tab[1] }}</span>
                            <span class="mt-0.5 block text-[10px]" :class="section === '{{ $tab[0] }}' ? 'opacity-55' : 'text-ink-600 dark:text-white/35'">{{ $tab[2] }}</span>
                        </span>
                        <svg class="h-4 w-4 opacity-50" viewBox="0 0 20 20" fill="none"><path d="m7 4 6 6-6 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                @endforeach
            </aside>

            <div class="min-w-0">
                <section x-show="section === 'profile'" x-cloak>
                    <div class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Profile</p>
                            <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Personal information</h2>
                            <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Update the editable details attached to your client account.</p>
                        </div>

                        <form
                            method="POST"
                            action="{{ route('settings.update') }}"
                            x-data="{ loading: false, twoWay: '{{ old('twoWay', $user->twoWay) }}' }"
                            @submit="loading = true"
                            class="mt-6 space-y-6"
                        >
                            @csrf

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="settings-name" class="text-xs font-bold text-ink-700 dark:text-white/60">Name</label>
                                    <input id="settings-name" type="text" name="name" value="{{ old('name', $user->name) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                                </div>
                                <div>
                                    <label for="settings-phone" class="text-xs font-bold text-ink-700 dark:text-white/60">Phone</label>
                                    <input id="settings-phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                                </div>
                                <div>
                                    <label for="settings-dob" class="text-xs font-bold text-ink-700 dark:text-white/60">Date of birth</label>
                                    <input id="settings-dob" type="date" name="dob" value="{{ old('dob', $user->dateOfBirth) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                                </div>
                                <div>
                                    <label for="settings-country" class="text-xs font-bold text-ink-700 dark:text-white/60">Country</label>
                                    <input id="settings-country" type="text" name="country" value="{{ old('country', $user->country) }}" required class="mt-2 w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                                </div>
                            </div>

                            <div class="grid gap-3 sm:grid-cols-3">
                                @foreach([
                                    ['Email', $user->email],
                                    ['Username', $user->username],
                                    ['Account reference', $user->userRef],
                                ] as $locked)
                                    <div class="rounded-2xl border border-paper-200 bg-paper-50 p-4 dark:border-white/10 dark:bg-white/[0.03]">
                                        <div class="flex items-center justify-between gap-2">
                                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-ink-600 dark:text-white/35">{{ $locked[0] }}</p>
                                            <span class="rounded-full bg-paper-200 px-2 py-0.5 text-[9px] font-bold uppercase tracking-[0.1em] text-ink-600 dark:bg-white/8 dark:text-white/35">Locked</span>
                                        </div>
                                        <p class="mt-2 truncate text-sm font-semibold text-ink-950 dark:text-white">{{ $locked[1] ?: '—' }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div>
                                <p class="text-xs font-bold text-ink-700 dark:text-white/60">Two-factor authentication</p>
                                <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/40">Control the existing two-factor authentication setting attached to your account.</p>
                                <div class="mt-3 grid grid-cols-2 gap-3">
                                    <label
                                        class="cursor-pointer rounded-2xl border p-4 transition"
                                        :class="twoWay == '1' ? 'border-bronze-400 bg-bronze-100/70 ring-2 ring-bronze-300/20 dark:border-bronze-300 dark:bg-bronze-300/10' : 'border-paper-200 bg-paper-50 dark:border-white/10 dark:bg-white/[0.03]'"
                                        @click="twoWay = '1'"
                                    >
                                        <input type="radio" name="twoWay" value="1" class="sr-only" x-model="twoWay" required>
                                        <p class="text-sm font-bold text-ink-950 dark:text-white">Enabled</p>
                                        <p class="mt-1 text-xs text-ink-600 dark:text-white/40">Use the current second-step verification flow.</p>
                                    </label>
                                    <label
                                        class="cursor-pointer rounded-2xl border p-4 transition"
                                        :class="twoWay == '2' ? 'border-bronze-400 bg-bronze-100/70 ring-2 ring-bronze-300/20 dark:border-bronze-300 dark:bg-bronze-300/10' : 'border-paper-200 bg-paper-50 dark:border-white/10 dark:bg-white/[0.03]'"
                                        @click="twoWay = '2'"
                                    >
                                        <input type="radio" name="twoWay" value="2" class="sr-only" x-model="twoWay" required>
                                        <p class="text-sm font-bold text-ink-950 dark:text-white">Disabled</p>
                                        <p class="mt-1 text-xs text-ink-600 dark:text-white/40">Sign in without the additional verification step.</p>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end border-t border-paper-200 pt-5 dark:border-white/8">
                                <button type="submit" :disabled="loading" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-2xl bg-ink-950 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-ink-900 disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                                    <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                                    <span x-text="loading ? 'Saving...' : 'Save profile'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <section x-show="section === 'photo'" x-cloak>
                    <div class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Profile photo</p>
                            <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Update your account image</h2>
                            <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">This image is used around the authenticated account interface.</p>
                        </div>

                        <form method="POST" action="{{ route('photo.update') }}" enctype="multipart/form-data" x-data="{ loading: false, preview: null }" @submit="loading = true" class="mt-6 space-y-6">
                            @csrf

                            <div class="flex flex-col gap-5 rounded-2xl border border-paper-200 bg-paper-50 p-5 dark:border-white/10 dark:bg-white/[0.03] sm:flex-row sm:items-center">
                                <div class="h-24 w-24 shrink-0 overflow-hidden rounded-3xl bg-white ring-1 ring-paper-200 dark:bg-white/5 dark:ring-white/10">
                                    <img x-show="!preview" src="{{ empty($user->photo) ? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) : asset('dashboard/user/images/' . $user->photo) }}" alt="Current profile photo" class="h-full w-full object-cover">
                                    <img x-show="preview" x-cloak :src="preview" alt="Selected profile photo" class="h-full w-full object-cover">
                                </div>
                                <label class="flex-1 cursor-pointer rounded-2xl border border-dashed border-paper-200 bg-white px-4 py-5 text-center transition hover:border-bronze-300 dark:border-white/10 dark:bg-ink-950/20">
                                    <p class="text-sm font-bold text-ink-950 dark:text-white">Choose a new image</p>
                                    <p class="mt-1 text-xs text-ink-600 dark:text-white/40">Select an image file from your device.</p>
                                    <input type="file" name="photo" accept="image/*" required class="sr-only" @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                                </label>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" :disabled="loading" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-2xl bg-ink-950 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-ink-900 disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                                    <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                                    <span x-text="loading ? 'Uploading...' : 'Update photo'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <section x-show="section === 'security'" x-cloak>
                    <div class="rounded-[28px] border border-paper-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-ink-900 sm:p-6">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Security</p>
                            <h2 class="mt-1 text-xl font-bold text-ink-950 dark:text-white">Change your password</h2>
                            <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Your current password is required before a replacement can be saved.</p>
                        </div>

                        <form method="POST" action="{{ route('password.update') }}" x-data="{ loading: false, oldVisible: false, newVisible: false, confirmVisible: false }" @submit="loading = true" class="mt-6 space-y-5">
                            @csrf

                            @foreach([
                                ['old_password', 'Current password', 'oldVisible'],
                                ['new_password', 'New password', 'newVisible'],
                                ['new_password_confirmation', 'Confirm new password', 'confirmVisible'],
                            ] as $field)
                                <div>
                                    <label for="{{ $field[0] }}" class="text-xs font-bold text-ink-700 dark:text-white/60">{{ $field[1] }}</label>
                                    <div class="relative mt-2">
                                        <input id="{{ $field[0] }}" :type="{{ $field[2] }} ? 'text' : 'password'" name="{{ $field[0] }}" required class="w-full rounded-2xl border border-paper-200 bg-paper-50 px-4 py-3.5 pr-12 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:bg-white focus:ring-4 focus:ring-bronze-300/10 dark:border-white/10 dark:bg-white/[0.04] dark:text-white">
                                        <button type="button" @click="{{ $field[2] }} = !{{ $field[2] }}" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-ink-600 dark:text-white/40" aria-label="Show or hide password">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="2.8" stroke="currentColor" stroke-width="1.7"/></svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4 text-xs leading-6 text-amber-800 dark:border-amber-500/20 dark:bg-amber-500/10 dark:text-amber-200">
                                After changing your password, use the new password the next time you authenticate or confirm a protected account action.
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" :disabled="loading" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-2xl bg-ink-950 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-ink-900 disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200">
                                    <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                                    <span x-text="loading ? 'Updating...' : 'Update password'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
