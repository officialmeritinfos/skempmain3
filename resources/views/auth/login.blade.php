@extends('layouts.guest')

@section('title', 'Sign in')

@section('content')
    <main class="grid min-h-screen lg:grid-cols-[.92fr_1.08fr]">
        @include('auth.partials.brand-panel', [
            'authEyebrow' => 'Client portal',
            'authHeadline' => 'Welcome back to your financial journey.',
            'authCopy' => 'Sign in to access your account, review your activity and continue from where you left off.',
        ])

        <section class="relative flex min-h-[620px] items-center bg-paper-50 px-4 pb-12 pt-16 sm:px-6 sm:pb-16 sm:pt-20 lg:min-h-screen lg:px-10 lg:pb-14 lg:pt-28 xl:px-16">
            <div class="mx-auto w-full max-w-lg" x-data="{ loading: false, showPassword: false }">
                <div class="mb-8">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">Secure sign in</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold tracking-[-0.03em] text-ink-950 sm:text-5xl">Access your account.</h2>
                    <p class="mt-4 max-w-md text-sm leading-7 text-ink-700">
                        Enter your account credentials to continue to {{ config('app.name') }}.
                    </p>
                </div>

                @include('templates.notification')

                <form method="POST" action="{{ route('auth.login') }}" class="space-y-6" @submit="loading = true">
                    @csrf

                    <div>
                        <label for="login-email" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Username</label>
                        <input
                            id="login-email"
                            type="text"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your username"
                            autocomplete="username"
                            class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15"
                        >
                    </div>

                    <div>
                        <div class="flex items-center justify-between gap-4">
                            <label for="login-password" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Password</label>
                            <a href="{{ route('forgotPassword') }}" class="text-xs font-semibold text-bronze-700 transition hover:text-ink-950">
                                Forgot password?
                            </a>
                        </div>
                        <div class="relative mt-2.5">
                            <input
                                id="login-password"
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                class="w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 pr-12 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15"
                            >
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-ink-600 transition hover:text-ink-950"
                                :aria-label="showPassword ? 'Hide password' : 'Show password'"
                            >
                                <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M2.8 12s3.4-5.2 9.2-5.2S21.2 12 21.2 12 17.8 17.2 12 17.2 2.8 12 2.8 12Z" stroke="currentColor" stroke-width="1.5"/>
                                    <circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                <svg x-show="showPassword" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="m4 4 16 16M9.3 7.2A8.8 8.8 0 0 1 12 6.8c5.8 0 9.2 5.2 9.2 5.2a16.3 16.3 0 0 1-2.7 3.2M14.8 16.7c-.9.3-1.8.5-2.8.5-5.8 0-9.2-5.2-9.2-5.2a16 16 0 0 1 3-3.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button
                        type="submit"
                        :disabled="loading"
                        class="group inline-flex w-full items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-ink-950/10 transition duration-300 hover:-translate-y-0.5 hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle>
                            <path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                        <span x-text="loading ? 'Signing in...' : 'Sign in'"></span>
                        <svg x-show="!loading" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div class="flex items-center gap-4 py-1">
                        <span class="h-px flex-1 bg-ink-950/10"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-ink-600/60">New here?</span>
                        <span class="h-px flex-1 bg-ink-950/10"></span>
                    </div>

                    <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center rounded-full border border-ink-950/12 bg-white px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:border-bronze-500/40 hover:bg-bronze-100/40">
                        Create an account
                    </a>
                </form>

                <p class="mt-8 text-center text-xs leading-6 text-ink-600/70">
                    For your security, only sign in from a device and network you trust.
                </p>
            </div>
        </section>
    </main>
@endsection
