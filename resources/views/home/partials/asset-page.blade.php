<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">{{ $assetPage['eyebrow'] }}</p>
            </div>

            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">{{ $assetPage['title'] }}</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">{{ $assetPage['intro'] }}</p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ url('/contact') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#0b1b2b] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Discuss this opportunity</a>
                <a href="{{ url('/plans') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#132131]/14 bg-[#fbfaf7] px-6 py-3.5 text-sm font-bold text-[#132131] transition hover:border-[#9a7445]/40 hover:bg-white dark:border-white/12 dark:bg-white/6 dark:text-white dark:hover:border-[#e4c38f]/30">View investment plans</a>
            </div>
        </div>

        <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale">
            <div class="rounded-[2rem] bg-[#0b1b2b] p-7 text-white shadow-[0_28px_70px_rgba(15,23,42,.14)] sm:p-9 dark:bg-[#101e2c]">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Our investment lens</p>
                <p class="mt-4 max-w-md font-display text-3xl font-bold leading-tight tracking-[-0.03em] sm:text-4xl">{{ $assetPage['lens'] }}</p>
                <p class="mt-5 max-w-lg text-sm leading-7 text-white/58">We consider this opportunity within the wider {{ config('app.name') }} framework rather than treating it as an isolated trade.</p>

                <div class="mt-8 grid gap-px overflow-hidden rounded-2xl bg-white/10 sm:grid-cols-2">
                    @foreach([
                        ['Role', 'What should this exposure do?'],
                        ['Risk', 'What can materially go wrong?'],
                        ['Liquidity', 'How easily can capital move?'],
                        ['Horizon', 'How long should the thesis have?'],
                    ] as $item)
                        <div class="bg-[#102437] p-5">
                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#e4c38f]">{{ $item[0] }}</p>
                            <p class="mt-2 text-sm font-semibold leading-6 text-white/76">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.76fr_1.24fr] lg:gap-16">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Why it matters</p>
                </div>
                <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">{{ $assetPage['section_title'] }}</h2>
                <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">{{ $assetPage['section_copy'] }}</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach($assetPage['principles'] as $principle)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#f8f6f1] p-6 transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_45px_rgba(15,23,42,.08)] sm:p-7 dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ $loop->index * 60 }}ms">
                        <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">0{{ $loop->iteration }}</span>
                        <h3 class="mt-8 font-display text-2xl font-bold tracking-[-0.025em]">{{ $principle[0] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-[#66717c] dark:text-white/54">{{ $principle[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#f0ede5] py-24 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:gap-20 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">How we think about it</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Opportunity needs a framework, not excitement.</h2>
            <p class="mt-5 max-w-xl text-base leading-8 text-[#64707b] dark:text-white/56">Every asset class has a different return profile, risk profile, liquidity profile and role in a wider portfolio. The starting point is understanding those differences before deciding whether the opportunity belongs in the strategy.</p>
        </div>

        <div class="border-y border-[#132131]/10 dark:border-white/10">
            @foreach($assetPage['questions'] as $question)
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up grid gap-4 border-b border-[#132131]/10 py-7 last:border-b-0 sm:grid-cols-[58px_1fr] sm:py-8 dark:border-white/10" style="--reveal-delay: {{ $loop->index * 55 }}ms">
                    <span class="text-[10px] font-bold tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">0{{ $loop->iteration }}</span>
                    <div>
                        <h3 class="text-lg font-bold">{{ $question[0] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-[#66717c] dark:text-white/52">{{ $question[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-scale grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">A considered next step</p>
                <h2 class="mt-5 max-w-4xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">An asset is useful only when its role in the portfolio is clear.</h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-white/58">Talk to us about the objective, time horizon and constraints first. From there, we can discuss whether this area deserves a place in the wider strategy.</p>
            </div>
            <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Talk to our team</a>
        </div>
    </div>
</section>