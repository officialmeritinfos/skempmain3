@extends('layouts.guest')

@section('title', 'Sign in')

@section('content')
    <main class="grid min-h-screen lg:grid-cols-[.94fr_1.06fr]">
        @include('auth.partials.brand-panel', [
            'authEyebrow' => 'Client portal',
            'authHeadline' => 'Welcome back to your wealth journey.',
            'authCopy' => 'Sign in to access your account, review activity and continue from where you left off.',
        ])

        <section class="relative flex min-h-[660px] items-center bg-[#f5f7fb] px-4 pb-12 pt-24 transition-colors sm:px-6 sm:pb-16 sm:pt-28 lg:min-h-screen lg:px-10 lg:pb-14 lg:pt-28 xl:px-16 dark:bg-[#07111e]">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_78%_18%,rgba(34,211,238,.08),transparent_26%),radial-gradient(circle_at_20%_80%,rgba(168,85,247,.07),transparent_30%)]"></div>

            <div class="relative mx-auto w-full max-w-lg" x-data="{ loading: false, showPassword: false }">
                <div class="auth-card rounded-[2rem] p-6 sm:p-8 lg:p-9">
                    <div class="mb-8">
                        <p class="auth-kicker text-[10px] font-bold uppercase tracking-[0.22em]">Secure sign in</p>
                        <h2 class="mt-3 font-display text-4xl font-bold tracking-[-0.04em] text-slate-950 sm:text-5xl dark:text-white">Access your account.</h2>
                        <p class="mt-4 max-w-md text-sm leading-7 text-slate-600 dark:text-white/55">
                            Enter your username and password to continue to {{ config('app.name') }}.
                        </p>
                    </div>

                    @include('templates.notification')

                    <form method="POST" action="{{ route('auth.login') }}" class="space-y-6" @submit="loading = true">
                        @csrf

                        <div>
                            <label for="login-email" class="block text-xs font-bold uppercase tracking-[0.12em] text-slate-600 dark:text-white/55">Username</label>
                            <input id="login-email" type="text" name="email" value="{{ old('email') }}" placeholder="Enter your username" autocomplete="username" class="auth-field mt-2.5">
                        </div>

                        <div>
                            <div class="flex items-center justify-between gap-4">
                                <label for="login-password" class="block text-xs font-bold uppercase tracking-[0.12em] text-slate-600 dark:text-white/55">Password</label>
                                <a href="{{ route('forgotPassword') }}" class="text-xs font-bold text-cyan-700 transition hover:text-slate-950 dark:text-cyan-200 dark:hover:text-white">Forgot password?</a>
                            </div>
                            <div class="relative mt-2.5">
                                <input id="login-password" :type="showPassword ? 'text' : 'password'" name="password" placeholder="Enter your password" autocomplete="current-password" class="auth-field pr-12">
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-slate-400 transition hover:text-slate-950 dark:text-white/35 dark:hover:text-white" :aria-label="showPassword ? 'Hide password' : 'Show password'">
                                    <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.8 12s3.4-5.2 9.2-5.2S21.2 12 21.2 12 17.8 17.2 12 17.2 2.8 12 2.8 12Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.5"/></svg>
                                    <svg x-show="showPassword" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 4 16 16M9.3 7.2A8.8 8.8 0 0 1 12 6.8c5.8 0 9.2 5.2 9.2 5.2a16.3 16.3 0 0 1-2.7 3.2M14.8 16.7c-.9.3-1.8.5-2.8.5-5.8 0-9.2-5.2-9.2-5.2a16 16 0 0 1 3-3.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit" :disabled="loading" class="glow-button-primary group inline-flex w-full items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5 disabled:cursor-not-allowed disabled:opacity-60">
                            <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                            <span x-text="loading ? 'Signing in...' : 'Sign in'"></span>
                            <svg x-show="!loading" class="h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>

                        <div class="flex items-center gap-4 py-1">
                            <span class="h-px flex-1 bg-slate-900/10 dark:bg-white/10"></span>
                            <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400 dark:text-white/35">New to {{ config('app.name') }}?</span>
                            <span class="h-px flex-1 bg-slate-900/10 dark:bg-white/10"></span>
                        </div>

                        <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center rounded-full border border-slate-900/10 bg-white/70 px-6 py-3.5 text-sm font-bold text-slate-900 transition duration-300 hover:-translate-y-0.5 hover:border-cyan-400/30 hover:bg-white dark:border-white/10 dark:bg-white/6 dark:text-white dark:hover:border-cyan-300/30 dark:hover:bg-white/10">Create an account</a>
                    </form>
                </div>

                <div class="mt-5 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-xs text-slate-500 dark:text-white/40">
                    <a href="{{ url('/security') }}" class="transition hover:text-slate-950 dark:hover:text-white">Security</a>
                    <span class="h-1 w-1 rounded-full bg-slate-300 dark:bg-white/20"></span>
                    <a href="{{ url('/contact') }}" class="transition hover:text-slate-950 dark:hover:text-white">Need help?</a>
                </div>
            </div>
        </section>
    </main>
@endsection
