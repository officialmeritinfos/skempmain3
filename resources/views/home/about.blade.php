@extends('layouts.marketing')

@section('title', config('app.name') . ' | About Us')
@section('meta_description', 'Discover the Alpine ibex behind our name and the principles of sure-footedness, resilience, strength and long-term perspective that shape how we think about capital.')

@php
    $aboutCopy = trim(strip_tags((string) ($web?->description ?? '')));

    $ibexTraits = [
        [
            'number' => '01',
            'name' => 'Sure-footed',
            'animal' => 'The Alpine ibex is at home on steep, broken rock where every foothold matters.',
            'company' => 'We start with footing: objectives, liquidity and risk before deciding where capital should move.',
            'icon' => 'footing',
        ],
        [
            'number' => '02',
            'name' => 'Built for altitude',
            'animal' => 'It lives high in the Alps, moving through an environment that is exposed, demanding and constantly changing.',
            'company' => 'We keep a wider view. Short-term market noise matters less when every decision remains connected to the long-term objective.',
            'icon' => 'altitude',
        ],
        [
            'number' => '03',
            'name' => 'Strong, not reckless',
            'animal' => 'The ibex is a powerful mountain animal, yet its advantage comes from controlled movement rather than speed alone.',
            'company' => 'Strength in a portfolio is not about taking the biggest position. It is about structure, diversification and knowing what each risk is for.',
            'icon' => 'strength',
        ],
        [
            'number' => '04',
            'name' => 'Adaptive',
            'animal' => 'Alpine ibex move between elevations as seasons and conditions change.',
            'company' => 'A sound investment framework should be disciplined without becoming rigid. We reassess when facts, circumstances or opportunities genuinely change.',
            'icon' => 'adaptive',
        ],
        [
            'number' => '05',
            'name' => 'Resilient',
            'animal' => 'After severe historical decline, Alpine ibex populations were rebuilt through protection and successful reintroduction.',
            'company' => 'Resilience means building for difficult periods before they arrive: preserving optionality, managing concentration and planning for recovery.',
            'icon' => 'resilient',
        ],
        [
            'number' => '06',
            'name' => 'Enduring',
            'animal' => 'Its life is shaped by repeat seasons, difficult terrain and patient movement across the mountain.',
            'company' => 'We prefer durable decisions over exciting ones: capital should be managed for the journey, not merely the next headline.',
            'icon' => 'enduring',
        ],
    ];
@endphp

@section('content')
    <section class="relative isolate min-h-[690px] overflow-hidden bg-ink-950 text-white sm:min-h-[760px] lg:min-h-[820px]">
        <div class="absolute inset-0 -z-30">
            <img
                src="{{ asset('home/images/brand/alpine-ibex-hero.svg') }}"
                alt="Illustration of an Alpine ibex overlooking a high mountain range"
                class="hero-slide-image h-full w-full object-cover object-center"
                fetchpriority="high"
            >
        </div>
        <div class="absolute inset-0 -z-20 bg-gradient-to-r from-ink-950 via-ink-950/82 to-ink-950/10"></div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-ink-950 via-transparent to-ink-950/15"></div>
        <div class="hero-film-grain pointer-events-none absolute inset-0 -z-10 opacity-25"></div>

        <div class="pointer-events-none absolute left-[8%] top-0 hidden h-full w-px bg-white/8 xl:block"></div>

        <div class="mx-auto flex min-h-[690px] max-w-7xl items-center px-4 py-20 sm:min-h-[760px] sm:px-6 lg:min-h-[820px] lg:px-8">
            <div
                x-data="revealOnScroll(.05)"
                :class="{ 'is-visible': shown }"
                class="reveal-up max-w-3xl"
            >
                <p class="inline-flex items-center gap-2.5 rounded-full border border-bronze-300/30 bg-black/20 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.22em] text-bronze-300 backdrop-blur-md">
                    <span class="h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                    The name behind the philosophy
                </p>

                <h1 class="mt-8 font-display text-5xl font-semibold leading-[.98] tracking-[-0.045em] sm:text-6xl lg:text-7xl xl:text-[5.5rem]">
                    Built to climb.
                    <span class="block text-bronze-300">Built to endure.</span>
                </h1>

                <p class="mt-7 max-w-2xl text-base leading-8 text-white/70 sm:text-lg">
                    {{ config('app.name') }} takes its identity from one of the Alps' most remarkable mountain animals: the Alpine ibex. It thrives where the terrain is difficult, the margin for careless movement is small and progress depends on strength, balance and the quality of every step.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="#the-ibex" class="group inline-flex items-center justify-center gap-2 rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200">
                        Meet the Alpine ibex
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-y-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M10 4v12m0 0 4-4m-4 4-4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-md transition duration-300 hover:border-white/35 hover:bg-white/10">
                        Start a conversation
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 border-t border-white/10 bg-ink-950/45 backdrop-blur-xl">
            <div class="mx-auto grid max-w-7xl divide-y divide-white/10 px-4 sm:grid-cols-3 sm:divide-x sm:divide-y-0 sm:px-6 lg:px-8">
                @foreach([
                    ['Species', 'Capra ibex'],
                    ['Home', 'The European Alps'],
                    ['Terrain', 'High, steep & rocky'],
                ] as $fact)
                    <div class="py-5 sm:px-6 sm:first:pl-0">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">{{ $fact[0] }}</p>
                        <p class="mt-1 text-sm font-semibold text-white/82 {{ $fact[0] === 'Species' ? 'italic' : '' }}">{{ $fact[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="the-ibex" class="overflow-hidden bg-paper-50 py-20 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-14 lg:grid-cols-[.84fr_1.16fr] lg:items-center lg:gap-20">
                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-scale relative"
                >
                    <div class="relative overflow-hidden rounded-[2rem] bg-ink-950 shadow-2xl shadow-ink-950/10">
                        <img src="{{ asset('home/images/brand/alpine-ibex-footing.svg') }}" alt="Bespoke illustration describing the sure-footed stance of an Alpine ibex" class="w-full">
                    </div>

                    <div class="float-slow absolute -bottom-6 right-5 max-w-[250px] rounded-2xl border border-ink-950/10 bg-white p-5 shadow-xl sm:right-8">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600">The principle</p>
                        <p class="mt-2 font-display text-xl leading-snug text-ink-950">The next step matters more than the noise around it.</p>
                    </div>
                </div>

                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up pt-6 lg:pt-0"
                    style="--reveal-delay: 100ms"
                >
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-600">The Alpine ibex · <span class="italic">Capra ibex</span></p>
                    <h2 class="mt-5 max-w-2xl font-display text-4xl font-semibold leading-[1.06] tracking-[-0.035em] text-ink-950 sm:text-5xl lg:text-6xl">
                        A mountain animal designed for difficult ground.
                    </h2>

                    <div class="mt-7 max-w-2xl space-y-5 text-base leading-8 text-ink-700">
                        <p>
                            The Alpine ibex is a wild goat of the European Alps. It lives in high, rocky country and is especially associated with steep cliffs, scree and open mountain slopes. Mature males are instantly recognisable by their large, ridged horns, which continue growing through life.
                        </p>
                        <p>
                            What makes the animal extraordinary is not simply that it lives high up. It is how confidently it moves there. Its cloven hooves combine hard edges with softer gripping surfaces, helping it work across tiny ledges and irregular rock where an uncertain step can carry real consequences.
                        </p>
                        <p>
                            The species also carries a remarkable recovery story. Alpine ibex numbers were reduced severely by hunting and human pressure, but protection and reintroduction programmes rebuilt populations across the Alps. Strength, in this story, includes the capacity to recover.
                        </p>
                    </div>

                    <div class="mt-9 grid gap-3 sm:grid-cols-3">
                        @foreach([
                            ['Up to ~3,200 m', 'Recorded high-altitude habitat'],
                            ['Cloven hooves', 'Built for difficult footing'],
                            ['Reintroduced', 'A conservation recovery story'],
                        ] as $animalFact)
                            <div class="rounded-2xl border border-ink-950/8 bg-white p-5">
                                <p class="font-display text-xl font-semibold text-ink-950">{{ $animalFact[0] }}</p>
                                <p class="mt-2 text-xs leading-5 text-ink-600">{{ $animalFact[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden bg-ink-950 py-20 text-white sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.82fr_1.18fr] lg:items-end lg:gap-20">
                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up"
                >
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">The ibex. The inspiration.</p>
                    <h2 class="mt-5 max-w-xl font-display text-4xl font-semibold leading-[1.06] tracking-[-0.035em] sm:text-5xl lg:text-6xl">
                        Characteristics that define the way we think.
                    </h2>
                </div>
                <p
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up max-w-xl text-base leading-8 text-white/58 lg:justify-self-end"
                    style="--reveal-delay: 120ms"
                >
                    We do not pretend an investment company is a mountain goat. The value of the name is the discipline it reminds us to keep: respect the terrain, protect the footing, do not confuse speed with progress and stay capable of moving when conditions change.
                </p>
            </div>

            <div class="mt-14 grid overflow-hidden rounded-[2rem] border border-white/10 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($ibexTraits as $trait)
                    <article
                        x-data="revealOnScroll()"
                        :class="{ 'is-visible': shown }"
                        class="reveal-up group relative min-h-[330px] border-b border-white/10 p-7 transition duration-500 hover:bg-white/[0.04] sm:p-8 {{ !$loop->last ? 'lg:border-r' : '' }}"
                        style="--reveal-delay: {{ ($loop->iteration - 1) * 70 }}ms"
                    >
                        <div class="flex items-center justify-between gap-4">
                            <span class="font-display text-3xl text-bronze-300">{{ $trait['number'] }}</span>
                            <span class="h-px w-12 bg-white/15 transition-all duration-500 group-hover:w-20 group-hover:bg-bronze-300/50"></span>
                        </div>

                        <h3 class="mt-10 font-display text-3xl font-semibold">{{ $trait['name'] }}</h3>
                        <p class="mt-4 text-sm leading-7 text-white/48">{{ $trait['animal'] }}</p>

                        <div class="mt-7 border-t border-white/10 pt-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-300">What it means for us</p>
                            <p class="mt-2 text-sm leading-7 text-white/75">{{ $trait['company'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-14 lg:grid-cols-[.82fr_1.18fr] lg:gap-20">
                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up lg:sticky lg:top-32 lg:self-start"
                >
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-600">From mountain to mandate</p>
                    <h2 class="mt-5 font-display text-4xl font-semibold leading-[1.06] tracking-[-0.035em] text-ink-950 sm:text-5xl">
                        We translate the symbolism into practical decisions.
                    </h2>
                    <p class="mt-6 max-w-xl text-base leading-8 text-ink-700">
                        A name only matters if the principles behind it show up in the work. For {{ config('app.name') }}, the Alpine ibex becomes a simple operating reminder for how capital should be approached.
                    </p>
                </div>

                <div class="divide-y divide-ink-950/10 border-y border-ink-950/10">
                    @foreach([
                        ['Footing', 'Risk before return', 'Before asking how far an investment might go, understand what can go wrong, how liquid the position is and whether the risk belongs in the portfolio.'],
                        ['Route', 'Strategy before activity', 'The presence of many opportunities is not a reason to pursue all of them. Capital needs a route tied to an objective.'],
                        ['Ascent', 'Measured growth', 'We favour progress that can be explained and sustained rather than growth built on unnecessary concentration or excitement.'],
                        ['Altitude', 'Long-term perspective', 'Markets move quickly. Wealth objectives usually do not. The portfolio should keep sight of the destination even when the weather changes.'],
                        ['Recovery', 'Resilience by design', 'Good planning assumes difficult periods will occur. Diversification, liquidity and optionality help keep a setback from becoming the end of the journey.'],
                    ] as $principle)
                        <div
                            x-data="revealOnScroll()"
                            :class="{ 'is-visible': shown }"
                            class="reveal-up grid gap-5 py-8 sm:grid-cols-[110px_1fr] sm:gap-8 sm:py-10"
                            style="--reveal-delay: {{ ($loop->iteration - 1) * 60 }}ms"
                        >
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-bronze-600">{{ $principle[0] }}</p>
                            <div>
                                <h3 class="font-display text-2xl font-semibold text-ink-950 sm:text-3xl">{{ $principle[1] }}</h3>
                                <p class="mt-3 max-w-2xl text-sm leading-7 text-ink-700 sm:text-base">{{ $principle[2] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden bg-paper-100 py-20 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[1.04fr_.96fr] lg:items-center lg:gap-20">
                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up"
                >
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-600">About {{ config('app.name') }}</p>
                    <h2 class="mt-5 max-w-2xl font-display text-4xl font-semibold leading-[1.06] tracking-[-0.035em] text-ink-950 sm:text-5xl lg:text-6xl">
                        Robust does not mean immovable. It means prepared.
                    </h2>

                    <div class="mt-7 max-w-2xl space-y-5 text-base leading-8 text-ink-700">
                        @if($aboutCopy !== '')
                            <p>{{ \Illuminate\Support\Str::limit($aboutCopy, 520) }}</p>
                        @else
                            <p>
                                {{ config('app.name') }} is an investment, wealth and asset management company built around thoughtful capital allocation, disciplined risk management and long-term stewardship. We help clients organise financial decisions around what their capital is actually meant to achieve.
                            </p>
                        @endif
                        <p>
                            Our work begins with context: the objective, the timeframe, liquidity requirements, existing exposures and tolerance for uncertainty. From there, investment decisions can be evaluated as part of a whole rather than as isolated opportunities.
                        </p>
                    </div>
                </div>

                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-scale grid gap-4 sm:grid-cols-2"
                    style="--reveal-delay: 100ms"
                >
                    @foreach([
                        ['01', 'Clarity', 'Know why the capital is invested and what role each position is expected to play.'],
                        ['02', 'Discipline', 'Make decisions from a repeatable framework rather than from pressure, fear or excitement.'],
                        ['03', 'Stewardship', 'Treat capital as something entrusted with a purpose, not simply money waiting for the next trade.'],
                        ['04', 'Perspective', 'Keep short-term events in proportion to the longer-term objective and the client’s wider financial life.'],
                    ] as $value)
                        <div class="group min-h-56 rounded-[1.6rem] border border-ink-950/8 bg-white p-6 transition duration-400 hover:-translate-y-1 hover:shadow-xl hover:shadow-ink-950/5">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-xs font-bold tracking-[0.18em] text-bronze-600">{{ $value[0] }}</span>
                                <span class="h-8 w-8 rounded-full border border-ink-950/10 transition group-hover:border-bronze-500/40 group-hover:bg-bronze-100"></span>
                            </div>
                            <h3 class="mt-10 font-display text-2xl font-semibold text-ink-950">{{ $value[1] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-ink-700">{{ $value[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-ink-900 py-20 text-white sm:py-24 lg:py-28">
        <div class="absolute -right-24 -top-24 h-96 w-96 rounded-full border border-bronze-300/10"></div>
        <div class="absolute -right-4 top-12 h-64 w-64 rounded-full border border-bronze-300/10"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                x-data="revealOnScroll()"
                :class="{ 'is-visible': shown }"
                class="reveal-up grid gap-10 lg:grid-cols-[1fr_auto] lg:items-end"
            >
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Our standard</p>
                    <h2 class="mt-5 max-w-4xl font-display text-4xl font-semibold leading-[1.04] tracking-[-0.035em] sm:text-5xl lg:text-6xl">
                        Climb deliberately. Protect the footing. Keep the destination in view.
                    </h2>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/58">
                        That is the idea behind the name. And it is the standard we want every strategy, allocation and client conversation to live up to.
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                    <a href="{{ url('/contact') }}" class="group inline-flex min-w-48 items-center justify-center gap-2 rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200">
                        Talk to our team
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="{{ url('/services') }}" class="inline-flex min-w-48 items-center justify-center rounded-full border border-white/15 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:border-white/30 hover:bg-white/5">
                        Explore our services
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection