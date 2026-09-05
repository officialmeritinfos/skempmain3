<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>

    <div class="mx-auto grid min-h-[620px] max-w-7xl gap-12 px-4 py-20 sm:px-6 sm:py-24 lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl"><span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>{{ $assetPage['eyebrow'] }}</span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">{{ $assetPage['title'] }}</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/66 sm:text-lg">{{ $assetPage['intro'] }}</p>
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/contact') }}" class="glow-button-primary inline-flex items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Discuss this opportunity</a>
                <a href="{{ url('/plans') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">View investment plans</a>
            </div>
        </div>

        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale lg:justify-self-end">
            <div class="glass-panel glow-border relative mx-auto aspect-square w-full max-w-[470px] rounded-[2rem] p-8">
                <div class="mesh-grid absolute inset-0 opacity-30"></div>
                <div class="relative flex h-full items-center justify-center rounded-[1.5rem] border border-white/10 bg-slate-950/35 text-center">
                    <div class="max-w-64 px-6">
                        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-300/10 text-cyan-200 shadow-[0_0_24px_rgba(34,211,238,.14)]">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19 9.5 8l3.2 6L16 9l4 10H4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M8 19h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </span>
                        <p class="mt-5 text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200/70">Our lens</p>
                        <p class="mt-2 font-display text-2xl font-semibold leading-snug text-white">{{ $assetPage['lens'] }}</p>
                        <p class="mt-3 text-xs leading-6 text-white/45">Considered within the wider {{ config('app.name') }} investment framework.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.72fr_1.28fr] lg:gap-16">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Why it matters</p>
                <h2 class="mt-4 font-display text-4xl font-bold leading-tight tracking-[-0.03em] sm:text-5xl">{{ $assetPage['section_title'] }}</h2>
                <p class="mt-5 text-base leading-8 text-white/64">{{ $assetPage['section_copy'] }}</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach($assetPage['principles'] as $principle)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card rounded-[1.6rem] border border-white/10 bg-white/[0.05] p-6 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-cyan-300/25 sm:p-7" style="--reveal-delay: {{ $loop->index * 70 }}ms">
                        <span class="text-xs font-bold tracking-[0.18em] text-cyan-200/75">0{{ $loop->iteration }}</span>
                        <h3 class="mt-9 font-display text-2xl font-semibold text-white">{{ $principle[0] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-white/62">{{ $principle[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#030712] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.9fr_1.1fr] lg:items-start lg:gap-20">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-200/80">How we think about it</p>
                <h2 class="mt-4 font-display text-4xl font-bold leading-tight tracking-[-0.03em] sm:text-5xl">Opportunity needs a framework, not excitement.</h2>
                <p class="mt-5 max-w-xl text-base leading-8 text-white/60">Every asset class has a different return profile, risk profile, liquidity profile and role in a wider portfolio. Our starting point is understanding those differences before deciding whether an opportunity belongs in the strategy.</p>
            </div>

            <div class="divide-y divide-white/10 border-y border-white/10">
                @foreach($assetPage['questions'] as $question)
                    <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up grid gap-4 py-7 sm:grid-cols-[64px_1fr] sm:py-8" style="--reveal-delay: {{ $loop->index * 65 }}ms">
                        <span class="text-xs font-bold tracking-[0.18em] text-cyan-200">0{{ $loop->iteration }}</span>
                        <div><h3 class="text-lg font-semibold text-white">{{ $question[0] }}</h3><p class="mt-2 text-sm leading-7 text-white/52">{{ $question[1] }}</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:grid lg:grid-cols-[1fr_auto] lg:items-end lg:p-12">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">A considered next step</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight tracking-[-0.03em] sm:text-5xl">An asset is useful only when its role in the portfolio is clear.</h2><p class="mt-5 max-w-2xl text-base leading-8 text-white/62">Talk to us about the objective, time horizon and constraints first. From there, we can discuss whether this area deserves a place in the wider strategy.</p></div>
            <div class="mt-7 lg:mt-0 lg:pl-12"><a href="{{ url('/contact') }}" class="glow-button-primary inline-flex min-w-48 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5">Talk to our team</a></div>
        </div>
    </div>
</section>