<section class="relative overflow-hidden bg-ink-950 text-white">
    <div class="absolute inset-0 opacity-70" aria-hidden="true">
        <div class="absolute -right-24 top-10 h-96 w-96 rounded-full border border-bronze-300/10"></div>
        <div class="absolute right-8 top-36 h-56 w-56 rounded-full border border-white/5"></div>
        <div class="absolute inset-x-0 bottom-0 h-px bg-white/10"></div>
    </div>

    <div class="relative mx-auto grid min-h-[610px] max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">{{ $assetPage['eyebrow'] }}</p>
            <h1 class="mt-5 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">
                {{ $assetPage['title'] }}
            </h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/65 sm:text-lg">
                {{ $assetPage['intro'] }}
            </p>
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/contact') }}" class="group inline-flex items-center justify-center gap-2 rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200">
                    Discuss this opportunity
                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="{{ url('/plans') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/10">View investment plans</a>
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale lg:justify-self-end">
            <div class="relative mx-auto aspect-square w-full max-w-[470px] rounded-full border border-white/10 p-7">
                <div class="absolute inset-8 rounded-full border border-bronze-300/20"></div>
                <div class="absolute inset-16 rounded-full border border-white/10"></div>
                <div class="absolute left-1/2 top-1/2 h-px w-[74%] -translate-x-1/2 -translate-y-1/2 rotate-[28deg] bg-bronze-300/30"></div>
                <div class="absolute left-1/2 top-1/2 h-px w-[74%] -translate-x-1/2 -translate-y-1/2 -rotate-[28deg] bg-white/15"></div>
                <div class="relative flex h-full items-center justify-center rounded-full bg-white/[0.035] text-center backdrop-blur">
                    <div class="max-w-56">
                        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-full border border-bronze-300/30 bg-bronze-300/10 text-bronze-300">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19 9.5 8l3.2 6L16 9l4 10H4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M8 19h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </span>
                        <p class="mt-5 text-[10px] font-bold uppercase tracking-[0.2em] text-white/40">Our lens</p>
                        <p class="mt-2 font-display text-2xl leading-snug">{{ $assetPage['lens'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.72fr_1.28fr] lg:gap-20">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Why it matters</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">{{ $assetPage['section_title'] }}</h2>
                <p class="mt-5 text-base leading-8 text-ink-700">{{ $assetPage['section_copy'] }}</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach($assetPage['principles'] as $principle)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[1.6rem] border border-ink-950/8 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-bronze-500/30 hover:shadow-xl hover:shadow-ink-950/5 sm:p-7" style="--reveal-delay: {{ $loop->index * 70 }}ms">
                        <span class="text-xs font-bold tracking-[0.18em] text-bronze-600">0{{ $loop->iteration }}</span>
                        <h3 class="mt-9 font-display text-2xl font-semibold text-ink-950">{{ $principle[0] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-ink-700">{{ $principle[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-ink-900 py-20 text-white sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.9fr_1.1fr] lg:items-start lg:gap-20">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">How we think about it</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] sm:text-5xl">Opportunity needs a framework, not excitement.</h2>
                <p class="mt-5 max-w-xl text-base leading-8 text-white/55">Every asset class has a different return profile, risk profile, liquidity profile and role in a wider portfolio. Our starting point is understanding those differences before deciding whether an opportunity belongs in the strategy.</p>
            </div>

            <div class="divide-y divide-white/10 border-y border-white/10">
                @foreach($assetPage['questions'] as $question)
                    <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up grid gap-4 py-7 sm:grid-cols-[64px_1fr] sm:py-8" style="--reveal-delay: {{ $loop->index * 65 }}ms">
                        <span class="text-xs font-bold tracking-[0.18em] text-bronze-300">0{{ $loop->iteration }}</span>
                        <div>
                            <h3 class="text-lg font-semibold">{{ $question[0] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-white/50">{{ $question[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-paper-100 py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale overflow-hidden rounded-[2rem] border border-ink-950/8 bg-white lg:grid lg:grid-cols-[1fr_auto] lg:items-end">
            <div class="p-7 sm:p-10 lg:p-12">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">A considered next step</p>
                <h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">An asset is useful only when its role in the portfolio is clear.</h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-ink-700">Talk to us about the objective, time horizon and constraints first. From there, we can discuss whether this area deserves a place in the wider strategy.</p>
            </div>
            <div class="border-t border-ink-950/8 p-7 sm:p-10 lg:border-l lg:border-t-0 lg:p-12">
                <a href="{{ url('/contact') }}" class="group inline-flex min-w-48 items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900">Talk to our team <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="none"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            </div>
        </div>
    </div>
</section>