@extends('layouts.guest')

@section('title', $pageName ?? 'Recover account')

@section('content')
    <main class="grid min-h-screen lg:grid-cols-[.92fr_1.08fr]">
        @include('auth.partials.brand-panel', [
            'authEyebrow' => 'Account recovery',
            'authHeadline' => 'Regain access without losing your footing.',
            'authCopy' => 'Start the recovery process with the email associated with your account. We will use the existing account-recovery flow to help you continue securely.',
        ])

        <section class="relative flex min-h-[600px] items-center bg-paper-50 px-4 pb-12 pt-16 sm:px-6 sm:pb-16 sm:pt-20 lg:min-h-screen lg:px-10 lg:pb-14 lg:pt-28 xl:px-16">
            <div class="mx-auto w-full max-w-lg" x-data="{ loading: false }">
                <div class="mb-8">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-600">Recover access</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold tracking-[-0.03em] text-ink-950 sm:text-5xl">{{ $pageName ?? 'Forgot your password?' }}</h2>
                    <p class="mt-4 max-w-md text-sm leading-7 text-ink-700">
                        Enter the email connected to your account to begin the recovery process.
                    </p>
                </div>

                @include('templates.notification')

                <form method="POST" action="{{ route('recoverPassword') }}" class="space-y-6" @submit="loading = true">
                    @csrf

                    <div>
                        <label for="recover-email" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink-700">Email address</label>
                        <input
                            id="recover-email"
                            type="text"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            autocomplete="email"
                            class="mt-2.5 w-full rounded-2xl border border-ink-950/12 bg-white px-4 py-3.5 text-sm text-ink-950 outline-none transition placeholder:text-ink-600/45 focus:border-bronze-500/60 focus:ring-4 focus:ring-bronze-300/15"
                        >
                    </div>

                    <button type="submit" :disabled="loading" class="group inline-flex w-full items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-ink-950/10 transition duration-300 hover:-translate-y-0.5 hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60">
                        <svg x-show="loading" class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"></circle>
                            <path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                        <span x-text="loading ? 'Processing...' : 'Continue recovery'"></span>
                        <svg x-show="!loading" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <a href="{{ route('login') }}" class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-ink-950/12 bg-white px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:border-bronze-500/40 hover:bg-bronze-100/40">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m12.5 5-5 5 5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Back to sign in
                    </a>
                </form>

                <div class="mt-8 rounded-2xl border border-ink-950/8 bg-white/70 p-4">
                    <p class="text-xs leading-6 text-ink-600">
                        If you did not request account recovery, do not share any recovery link or code you receive with another person.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
