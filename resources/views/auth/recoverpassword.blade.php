@extends('layouts.guest')

@section('title', $pageName ?? 'Recover account')

@section('content')
    <main class="grid min-h-screen lg:grid-cols-[.94fr_1.06fr]">
        @include('auth.partials.brand-panel', [
            'authEyebrow' => 'Account recovery',
            'authHeadline' => 'Recover access without losing momentum.',
            'authCopy' => 'Enter the username connected to your account and continue through the existing recovery flow securely.',
        ])

        <section class="relative flex min-h-[640px] items-center bg-[#f5f7fb] px-4 pb-12 pt-24 transition-colors sm:px-6 sm:pb-16 sm:pt-28 lg:min-h-screen lg:px-10 lg:pb-14 lg:pt-28 xl:px-16 dark:bg-[#07111e]">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_78%_18%,rgba(34,211,238,.08),transparent_26%),radial-gradient(circle_at_20%_80%,rgba(168,85,247,.07),transparent_30%)]"></div>

            <div class="relative mx-auto w-full max-w-lg" x-data="{ loading: false }">
                <div class="auth-card rounded-[2rem] p-6 sm:p-8 lg:p-9">
                    <div class="mb-8">
                        <p class="auth-kicker text-[10px] font-bold uppercase tracking-[0.22em]">Recover access</p>
                        <h2 class="mt-3 font-display text-4xl font-bold tracking-[-0.04em] text-slate-950 sm:text-5xl dark:text-white">Forgot your password?</h2>
                        <p class="mt-4 max-w-md text-sm leading-7 text-slate-600 dark:text-white/55">Enter your account username. If it matches an existing account, the current password-reset flow will continue from there.</p>
                    </div>

                    @include('templates.notification')

                    <form method="POST" action="{{ route('recoverPassword') }}" class="space-y-6" @submit="loading = true">
                        @csrf

                        <div>
                            <label for="recover-username" class="block text-xs font-bold uppercase tracking-[0.12em] text-slate-600 dark:text-white/55">Username</label>
                            <input id="recover-username" type="text" name="email" value="{{ old('email') }}" placeholder="Enter your username" autocomplete="username" class="auth-field mt-2.5">
                        </div>

                        <button type="submit" :disabled="loading" class="glow-button-primary group inline-flex w-full items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5 disabled:cursor-not-allowed disabled:opacity-60">
                            <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle><path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
                            <span x-text="loading ? 'Processing...' : 'Continue recovery'"></span>
                        </button>

                        <a href="{{ route('login') }}" class="inline-flex w-full items-center justify-center rounded-full border border-slate-900/10 bg-white/70 px-6 py-3.5 text-sm font-bold text-slate-900 transition duration-300 hover:-translate-y-0.5 hover:border-cyan-400/30 hover:bg-white dark:border-white/10 dark:bg-white/6 dark:text-white dark:hover:border-cyan-300/30 dark:hover:bg-white/10">Back to sign in</a>

                        <div class="flex items-center gap-4 py-1">
                            <span class="h-px flex-1 bg-slate-900/10 dark:bg-white/10"></span>
                            <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400 dark:text-white/35">No account yet?</span>
                            <span class="h-px flex-1 bg-slate-900/10 dark:bg-white/10"></span>
                        </div>

                        <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center rounded-full border border-cyan-500/20 bg-cyan-500/8 px-6 py-3.5 text-sm font-bold text-cyan-800 transition duration-300 hover:-translate-y-0.5 hover:border-cyan-500/35 hover:bg-cyan-500/12 dark:border-cyan-300/20 dark:bg-cyan-300/8 dark:text-cyan-100 dark:hover:border-cyan-300/35 dark:hover:bg-cyan-300/12">Create an account</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
