@extends('layouts.guest')

@section('title', 'Create an account')

@section('content')
    <main class="grid min-h-screen lg:grid-cols-[.82fr_1.18fr]">
        @include('auth.partials.brand-panel', [
            'authEyebrow' => 'Begin your journey',
            'authHeadline' => 'A strong financial journey starts with the right footing.',
            'authCopy' => 'Create your account to access the client experience and begin building a clearer view of your financial objectives.',
        ])

        <section class="relative bg-paper-50 px-4 pb-14 pt-16 sm:px-6 sm:pb-16 sm:pt-20 lg:px-10 lg:pb-16 lg:pt-28 xl:px-16">
            <div class="mx-auto w-full max-w-2xl" x-data="{ loading: false, showPassword: false, showPasswordConfirm: false }">
                <div class="mb-8">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">Create client account</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold tracking-[-0.03em] text-ink-950 sm:text-5xl">Set up your access.</h2>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-ink-700">
                        Provide your account details below. You can review investment options and complete the rest of your journey after sign-up.
                    </p>
                </div>

                @include('templates.notification')

                <form method="POST" action="{{ route('auth.register') }}" class="space-y-7" @submit="loading = true">
                    @csrf

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="register-name" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Full name</label>
                            <input id="register-name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name" autocomplete="name" class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                        </div>

                        <div>
                            <label for="register-username" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Username</label>
                            <input id="register-username" type="text" name="username" value="{{ old('username') }}" placeholder="Choose a username" autocomplete="username" class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="register-email" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Email address</label>
                            <input id="register-email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                        </div>

                        <div>
                            <label for="register-phone" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Phone number</label>
                            <input id="register-phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone" autocomplete="tel" class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="register-password" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Password</label>
                            <div class="relative mt-2.5">
                                <input id="register-password" :type="showPassword ? 'text' : 'password'" name="password" placeholder="Create a password" autocomplete="new-password" class="w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 pr-12 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-ink-600 transition hover:text-ink-950" :aria-label="showPassword ? 'Hide password' : 'Show password'">
                                    <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.8 12s3.4-5.2 9.2-5.2S21.2 12 21.2 12 17.8 17.2 12 17.2 2.8 12 2.8 12Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.5"/></svg>
                                    <svg x-show="showPassword" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 4 16 16M9.3 7.2A8.8 8.8 0 0 1 12 6.8c5.8 0 9.2 5.2 9.2 5.2a16.3 16.3 0 0 1-2.7 3.2M14.8 16.7c-.9.3-1.8.5-2.8.5-5.8 0-9.2-5.2-9.2-5.2a16 16 0 0 1 3-3.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="register-password-confirm" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Repeat password</label>
                            <div class="relative mt-2.5">
                                <input id="register-password-confirm" :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" placeholder="Repeat your password" autocomplete="new-password" class="w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 pr-12 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                                <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-ink-600 transition hover:text-ink-950" :aria-label="showPasswordConfirm ? 'Hide repeated password' : 'Show repeated password'">
                                    <svg x-show="!showPasswordConfirm" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.8 12s3.4-5.2 9.2-5.2S21.2 12 21.2 12 17.8 17.2 12 17.2 2.8 12 2.8 12Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.5"/></svg>
                                    <svg x-show="showPasswordConfirm" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 4 16 16M9.3 7.2A8.8 8.8 0 0 1 12 6.8c5.8 0 9.2 5.2 9.2 5.2a16.3 16.3 0 0 1-2.7 3.2M14.8 16.7c-.9.3-1.8.5-2.8.5-5.8 0-9.2-5.2-9.2-5.2a16 16 0 0 1 3-3.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between gap-4">
                            <label for="register-referral" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Referral</label>
                            <span class="text-[10px] font-semibold uppercase tracking-[0.12em] text-ink-600/55">Optional</span>
                        </div>
                        <input id="register-referral" type="text" name="referral" value="{{ old('referral') }} {{ $referral }}" placeholder="Referral code (optional)" class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15">
                    </div>

                    <div class="rounded-2xl border border-ink-950/10 bg-white p-4 sm:p-5">
                        <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Security check</p>
                        <div class="mt-3 overflow-x-auto">
                            <div class="g-recaptcha" data-sitekey="{{ config('app.recaptcha.site_key') }}"></div>
                        </div>
                        @if ($errors->has('g-recaptcha-response'))
                            <p class="mt-2 text-sm text-red-700">{{ $errors->first('g-recaptcha-response') }}</p>
                        @endif
                    </div>

                    <button type="submit" :disabled="loading" class="group inline-flex w-full items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-ink-950/10 transition duration-300 hover:-translate-y-0.5 hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60">
                        <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                        <span x-text="loading ? 'Creating account...' : 'Create account'"></span>
                        <svg x-show="!loading" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>

                    <p class="text-center text-sm text-ink-700">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-bold text-bronze-700 transition hover:text-ink-950">Sign in</a>
                    </p>
                </form>

                <p class="mt-8 text-center text-xs leading-6 text-ink-600/70">
                    By creating an account, you confirm that the information you submit is accurate and yours to provide.
                </p>
            </div>
        </section>
    </main>
@endsection
