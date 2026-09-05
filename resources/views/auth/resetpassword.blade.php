@extends('layouts.guest')

@section('title', $pageName ?? 'Reset password')

@section('content')
    <main class="grid min-h-screen lg:grid-cols-[.94fr_1.06fr]">
        @include('auth.partials.brand-panel', [
            'authEyebrow' => 'Reset credentials',
            'authHeadline' => 'Choose a new password and continue securely.',
            'authCopy' => 'Your current reset token and backend flow remain unchanged. This page only improves the client experience around it.',
        ])

        <section class="relative flex min-h-[680px] items-center bg-[#f5f7fb] px-4 pb-12 pt-24 transition-colors sm:px-6 sm:pb-16 sm:pt-28 lg:min-h-screen lg:px-10 lg:pb-14 lg:pt-28 xl:px-16 dark:bg-[#07111e]">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_78%_18%,rgba(34,211,238,.08),transparent_26%),radial-gradient(circle_at_20%_80%,rgba(168,85,247,.07),transparent_30%)]"></div>

            <div class="relative mx-auto w-full max-w-lg" x-data="{ loading: false, showPassword: false, showPasswordConfirm: false }">
                <div class="auth-card rounded-[2rem] p-6 sm:p-8 lg:p-9">
                    <div class="mb-8">
                        <p class="auth-kicker text-[10px] font-bold uppercase tracking-[0.22em]">New password</p>
                        <h2 class="mt-3 font-display text-4xl font-bold tracking-[-0.04em] text-slate-950 sm:text-5xl dark:text-white">Reset your password.</h2>
                        <p class="mt-4 max-w-md text-sm leading-7 text-slate-600 dark:text-white/55">Create and confirm the new password you want to use for this account.</p>
                    </div>

                    @include('templates.notification')

                    <form method="POST" action="{{ route('resetPassword') }}" class="space-y-6" @submit="loading = true">
                        @csrf

                        <div>
                            <label for="reset-username" class="block text-xs font-bold uppercase tracking-[0.12em] text-slate-600 dark:text-white/55">Account username</label>
                            <div class="relative mt-2.5">
                                <input id="reset-username" type="text" name="email" value="{{ $email }}" readonly class="auth-field cursor-not-allowed pr-11 opacity-75">
                                <span class="pointer-events-none absolute inset-y-0 right-0 flex w-11 items-center justify-center text-slate-400 dark:text-white/35">
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><rect x="5" y="9" width="10" height="7" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M7.5 9V7.5a2.5 2.5 0 0 1 5 0V9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                </span>
                            </div>
                        </div>

                        <input type="hidden" name="code" value="{{ $code }}">

                        <div>
                            <label for="reset-password" class="block text-xs font-bold uppercase tracking-[0.12em] text-slate-600 dark:text-white/55">New password</label>
                            <div class="relative mt-2.5">
                                <input id="reset-password" :type="showPassword ? 'text' : 'password'" name="password" placeholder="Enter new password" autocomplete="new-password" class="auth-field pr-12">
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-slate-400 transition hover:text-slate-950 dark:text-white/35 dark:hover:text-white" :aria-label="showPassword ? 'Hide password' : 'Show password'">
                                    <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.8 12s3.4-5.2 9.2-5.2S21.2 12 21.2 12 17.8 17.2 12 17.2 2.8 12 2.8 12Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.5"/></svg>
                                    <svg x-show="showPassword" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 4 16 16M9.3 7.2A8.8 8.8 0 0 1 12 6.8c5.8 0 9.2 5.2 9.2 5.2a16.3 16.3 0 0 1-2.7 3.2M14.8 16.7c-.9.3-1.8.5-2.8.5-5.8 0-9.2-5.2-9.2-5.2a16 16 0 0 1 3-3.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="reset-password-confirm" class="block text-xs font-bold uppercase tracking-[0.12em] text-slate-600 dark:text-white/55">Repeat password</label>
                            <div class="relative mt-2.5">
                                <input id="reset-password-confirm" :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" placeholder="Repeat new password" autocomplete="new-password" class="auth-field pr-12">
                                <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-slate-400 transition hover:text-slate-950 dark:text-white/35 dark:hover:text-white" :aria-label="showPasswordConfirm ? 'Hide repeated password' : 'Show repeated password'">
                                    <svg x-show="!showPasswordConfirm" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.8 12s3.4-5.2 9.2-5.2S21.2 12 21.2 12 17.8 17.2 12 17.2 2.8 12 2.8 12Z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.5"/></svg>
                                    <svg x-show="showPasswordConfirm" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 4 16 16M9.3 7.2A8.8 8.8 0 0 1 12 6.8c5.8 0 9.2 5.2 9.2 5.2a16.3 16.3 0 0 1-2.7 3.2M14.8 16.7c-.9.3-1.8.5-2.8.5-5.8 0-9.2-5.2-9.2-5.2a16 16 0 0 1 3-3.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit" :disabled="loading" class="glow-button-primary group inline-flex w-full items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5 disabled:cursor-not-allowed disabled:opacity-60">
                            <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                            <span x-text="loading ? 'Updating password...' : 'Reset password'"></span>
                        </button>

                        <a href="{{ route('login') }}" class="inline-flex w-full items-center justify-center rounded-full border border-slate-900/10 bg-white/70 px-6 py-3.5 text-sm font-bold text-slate-900 transition duration-300 hover:-translate-y-0.5 hover:border-cyan-400/30 hover:bg-white dark:border-white/10 dark:bg-white/6 dark:text-white dark:hover:border-cyan-300/30 dark:hover:bg-white/10">Back to sign in</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
