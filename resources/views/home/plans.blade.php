@extends('layouts.app', ['title' => $pageName ?? 'Plans'])

@section('content')
    {{-- =========================
        PAGE HEADER — Premium Violet
    ========================= --}}
    <section class="relative isolate overflow-hidden" style="background: var(--bg);">
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="plansGlow" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0" stop-color="#8b5cf6"/>
                    <stop offset=".55" stop-color="#e879f9"/>
                    <stop offset="1" stop-color="#f3d38a"/>
                </linearGradient>
            </defs>
        </svg>

        <div class="absolute inset-0 -z-10"
             style="background:
                radial-gradient(900px 420px at 10% -10%, rgba(139,92,246,.20), transparent 60%),
                radial-gradient(720px 420px at 90% 0%, rgba(232,121,249,.16), transparent 58%),
                radial-gradient(680px 380px at 50% 115%, rgba(243,211,138,.12), transparent 62%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));"></div>

        <div class="pointer-events-none absolute inset-0 -z-10 opacity-60">
            <div class="absolute right-8 top-8 h-36 w-36 rounded-full bg-fuchsia-400/15 blur-2xl"></div>
            <div class="absolute -left-16 top-16 h-48 w-48 rounded-full bg-violet-400/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.12),transparent_60%)]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                Investment Plans
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl md:text-5xl"
                style="color: var(--ink);">
                {{ $pageName ?? 'Plans' }}
            </h1>

            <p class="mt-3" style="color: var(--ink-soft);">
                Choose a plan that matches your goals. Transparent fees, disciplined growth.
            </p>

            <nav class="mt-4 text-xs sm:text-sm" style="color: var(--muted);">
                <a href="{{ url('/') }}" class="hover:underline" style="color: var(--ink-soft);">Home</a>
                <span class="mx-2 opacity-60">/</span>
                <span style="color: var(--ink);">{{ $pageName ?? 'Plans' }}</span>
            </nav>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- =========================
        PRICING GRID — Premium Glass Cards
    ========================= --}}
    <section class="relative py-16 lg:py-24" style="background: var(--bg);">
        <div class="pointer-events-none absolute -top-20 -left-24 h-[26rem] w-[26rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 -z-10 opacity-35">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.14),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-block rounded-full px-4 py-1.5 text-[11px] font-bold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    Investment Plans
                </span>

                <h2 class="mt-4 text-2xl font-extrabold sm:text-3xl md:text-4xl"
                    style="color: var(--ink);">
                    Find the right plan for your strategy
                </h2>
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3">
                @foreach($packages as $package)
                    @inject('option','App\Defaults\Custom')

                    <article
                        class="group relative rounded-[28px] p-[2px] transition-transform duration-300 hover:-translate-y-1"
                        style="
                            background:
                                conic-gradient(
                                    from 210deg,
                                    rgba(139,92,246,.55),
                                    rgba(232,121,249,.18),
                                    rgba(243,211,138,.14),
                                    rgba(255,255,255,0),
                                    rgba(139,92,246,.55)
                                );
                            box-shadow: 0 30px 80px -50px rgba(0,0,0,.18);
                        ">
                        <div class="relative h-full overflow-hidden rounded-[26px] backdrop-blur"
                             style="background: var(--surface); border: 1px solid var(--line);">

                            {{-- Top band --}}
                            <div class="relative border-b px-6 pb-8 pt-10 sm:px-8"
                                 style="
                                    background:
                                        linear-gradient(135deg,
                                            rgba(139,92,246,.12),
                                            rgba(232,121,249,.08),
                                            rgba(243,211,138,.05)
                                        );
                                    border-color: var(--line);
                                 ">
                                <h3 class="text-xl font-extrabold tracking-tight sm:text-2xl"
                                    style="color: var(--ink);">
                                    {{ $package->name }}
                                </h3>

                                <p class="mt-2 text-base font-semibold sm:text-lg"
                                   style="color: var(--brand-2);">
                                    {{ number_format($package->roi * $package->numberOfReturns) }}%
                                    <span style="color: var(--ink-soft);">
                                        after {{ $package->Duration }}
                                    </span>
                                </p>

                                @if($package->note)
                                    <p class="mt-2 text-xs sm:text-sm" style="color: var(--muted);">
                                        {{ $package->note }}
                                    </p>
                                @endif

                                <span class="pointer-events-none absolute inset-0 opacity-25"
                                      style="background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,0) 42%);"></span>
                            </div>

                            {{-- Body --}}
                            <div class="px-6 py-8 sm:px-8">
                                <ul class="space-y-4 text-[15px] leading-relaxed" style="color: var(--ink-soft);">
                                    <li class="flex items-start gap-3 border-t pt-4" style="border-color: var(--line);">
                                        <svg class="mt-0.5 h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                                        </svg>
                                        <span class="min-w-0">
                                            Price:
                                            <span style="color: var(--ink);">${{ number_format($package->minAmount,2) }}</span>
                                            –
                                            @if($package->isUnlimited != 1)
                                                <span style="color: var(--ink);">${{ number_format($package->maxAmount,2) }}</span>
                                            @else
                                                <span style="color: var(--ink);">Unlimited</span>
                                            @endif
                                        </span>
                                    </li>

                                    <li class="flex items-start gap-3 border-t pt-4" style="border-color: var(--line);">
                                        <svg class="mt-0.5 h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                                        </svg>
                                        <span>
                                            Profit return:
                                            <span style="color: var(--ink);">{{ $package->roi }}%</span>
                                            <span style="color: var(--muted);">{{ $option->getReturnType($package->returnType) }}</span>
                                        </span>
                                    </li>

                                    <li class="flex items-start gap-3 border-t pt-4" style="border-color: var(--line);">
                                        <svg class="mt-0.5 h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                                        </svg>
                                        <span>
                                            Contract Duration:
                                            <span style="color: var(--ink);">{{ $package->Duration }}</span>
                                        </span>
                                    </li>

                                    <li class="flex items-start gap-3 border-t pt-4" style="border-color: var(--line);">
                                        <svg class="mt-0.5 h-4 w-4" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
                                        </svg>
                                        <span>
                                            Referral Bonus:
                                            <span style="color: var(--ink);">{{ $package->referral }}%</span>
                                        </span>
                                    </li>
                                </ul>

                                <div class="mt-8">
                                    <a href="{{ route('register') }}"
                                       class="inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-semibold text-white shadow hover:opacity-95 focus:outline-none"
                                       style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                        Get Started
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="pointer-events-none absolute inset-0 rounded-[28px] ring-1 ring-transparent transition-transform duration-300 group-hover:-translate-y-1"></div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ url('contact') }}"
                   class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold backdrop-blur"
                   style="color: var(--ink); background: var(--surface); border: 1px solid var(--line);">
                    Need a custom plan? Contact us
                </a>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>
@endsection
