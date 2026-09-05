@php
    $authEyebrow = $authEyebrow ?? 'Private client access';
    $authHeadline = $authHeadline ?? 'A clearer way to access your wealth journey.';
    $authCopy = $authCopy ?? 'Continue securely into the same modern wealth experience that shapes the public site.';
@endphp

<section class="relative isolate min-h-[390px] overflow-hidden bg-[#eef4fb] text-slate-950 transition-colors duration-300 lg:sticky lg:top-0 lg:h-screen lg:min-h-screen dark:bg-[#030712] dark:text-white">
    <div class="spark-field pointer-events-none absolute inset-0 -z-30 opacity-70"></div>
    <div class="auth-visual-grid pointer-events-none absolute inset-0 -z-20 opacity-70"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>
    <div class="glow-orb glow-orb-bottom"></div>

    <div class="relative flex h-full min-h-[390px] flex-col justify-between px-4 pb-8 pt-28 sm:px-6 sm:pb-10 lg:min-h-screen lg:px-10 lg:pb-12 lg:pt-32 xl:px-14">
        <div class="max-w-xl">
            <p class="inline-flex items-center gap-2 rounded-full border border-cyan-500/20 bg-white/72 px-3.5 py-2 text-[10px] font-bold uppercase tracking-[0.22em] text-cyan-800 shadow-sm backdrop-blur-xl dark:border-cyan-300/20 dark:bg-white/7 dark:text-cyan-200">
                <span class="h-1.5 w-1.5 rounded-full bg-cyan-500 shadow-[0_0_12px_rgba(6,182,212,.65)] dark:bg-cyan-300"></span>
                {{ $authEyebrow }}
            </p>

            <h1 class="mt-6 max-w-lg font-display text-4xl font-bold leading-[1.02] tracking-[-0.045em] sm:text-5xl lg:text-6xl">
                {{ $authHeadline }}
            </h1>

            <p class="mt-5 max-w-lg text-sm leading-7 text-slate-600 sm:text-base sm:leading-8 dark:text-white/58">
                {{ $authCopy }}
            </p>
        </div>

        <div class="mt-8 max-w-xl lg:mt-0">
            <div class="glass-panel glow-border rounded-[1.8rem] p-4 sm:p-5">
                <div class="rounded-[1.45rem] border border-slate-900/8 bg-slate-950 p-5 text-white shadow-2xl dark:border-white/8 dark:bg-[#050816] sm:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-cyan-200/75">Client workspace</p>
                            <p class="mt-2 font-display text-xl font-bold">Private access. Connected decisions.</p>
                        </div>
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-white/10 bg-white/7 text-cyan-200">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 18V9m5 9V5m5 13v-6m4 6V7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </span>
                    </div>

                    <div class="mt-6 grid gap-3 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                        @foreach([
                            ['Strategy', 'Goal-led'],
                            ['Security', 'Private'],
                            ['Access', 'Direct'],
                        ] as $signal)
                            <div class="rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3">
                                <p class="text-[9px] font-bold uppercase tracking-[0.16em] text-white/38">{{ $signal[0] }}</p>
                                <p class="mt-1 text-xs font-semibold text-white/76">{{ $signal[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
