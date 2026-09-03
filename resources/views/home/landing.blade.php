@extends('layouts.marketing')

@section('title', config('app.name') . ' | Investment, Wealth & Asset Management')
@section('meta_description', 'Build, preserve and manage wealth with a disciplined investment approach, thoughtful asset allocation and long-term stewardship.')

@php
    $coreServices = collect($services ?? [])
        ->reject(fn ($service) => (int) ($service->isSector ?? 2) === 1)
        ->take(4);

    $featuredSectors = collect($sectors ?? [])->take(4);

    $heroSlides = [
        [
            'image' => asset('home/images/banner/banner-1.jpg'),
            'number' => '01',
            'label' => 'Investment management',
            'caption' => 'Capital allocated with purpose, patience and a clear view of risk.',
        ],
        [
            'image' => asset('home/images/banner/building1.jpg'),
            'number' => '02',
            'label' => 'Wealth strategy',
            'caption' => 'A wider financial view for the wealth you are building and preserving.',
        ],
        [
            'image' => asset('home/images/banner/banner-6.jpg'),
            'number' => '03',
            'label' => 'Asset stewardship',
            'caption' => 'Long-term thinking for assets that need to keep working through change.',
        ],
    ];

    $serviceFallbackImages = [
        asset('home/images/banner/banner-2.jpg'),
        asset('home/images/banner/banner-4.jpg'),
        asset('home/images/banner/banner-5.jpg'),
        asset('home/images/banner/banner-7.jpg'),
    ];

    $aboutCopy = trim(strip_tags((string) ($web?->description ?? '')));

    $companyVideoUrl = config('app.company_video_url');
    $videoEmbedUrl = null;

    if (!empty($companyVideoUrl)) {
        $videoHost = strtolower((string) parse_url($companyVideoUrl, PHP_URL_HOST));

        if (str_contains($videoHost, 'youtu.be')) {
            $videoId = trim((string) parse_url($companyVideoUrl, PHP_URL_PATH), '/');
            $videoEmbedUrl = $videoId ? 'https://www.youtube.com/embed/' . $videoId . '?rel=0' : null;
        } elseif (str_contains($videoHost, 'youtube.com')) {
            parse_str((string) parse_url($companyVideoUrl, PHP_URL_QUERY), $videoQuery);
            $videoPath = (string) parse_url($companyVideoUrl, PHP_URL_PATH);

            if (!empty($videoQuery['v'])) {
                $videoEmbedUrl = 'https://www.youtube.com/embed/' . $videoQuery['v'] . '?rel=0';
            } elseif (str_contains($videoPath, '/embed/')) {
                $videoEmbedUrl = $companyVideoUrl;
            }
        } elseif (str_contains($videoHost, 'vimeo.com')) {
            $videoId = trim((string) parse_url($companyVideoUrl, PHP_URL_PATH), '/');
            $videoEmbedUrl = $videoId ? 'https://player.vimeo.com/video/' . $videoId : null;
        } else {
            $videoEmbedUrl = $companyVideoUrl;
        }
    }
@endphp

@section('content')
    <section
        x-data="heroSlider({{ count($heroSlides) }}, 6800)"
        @mouseenter="stop()"
        @mouseleave="if (!reducedMotion) start()"
        class="relative isolate min-h-[760px] overflow-hidden bg-ink-950 text-white sm:min-h-[800px] lg:min-h-[calc(100vh-5rem)]"
    >
        <div class="absolute inset-0 -z-30">
            @foreach($heroSlides as $slide)
                <div
                    x-show="active === {{ $loop->index }}"
                    x-transition.opacity.duration.1200ms
                    class="absolute inset-0"
                >
                    <img
                        src="{{ $slide['image'] }}"
                        alt=""
                        class="hero-slide-image h-full w-full object-cover"
                        :class="{ 'is-active': active === {{ $loop->index }} }"
                        {{ $loop->first ? 'fetchpriority=high' : 'loading=lazy' }}
                    >
                </div>
            @endforeach
        </div>

        <div class="hero-vignette absolute inset-0 -z-20"></div>
        <div class="hero-film-grain pointer-events-none absolute inset-0 -z-10"></div>

        <div class="pointer-events-none absolute inset-y-0 left-[8%] hidden w-px bg-white/10 xl:block"></div>
        <div class="pointer-events-none absolute inset-y-0 right-[8%] hidden w-px bg-white/10 xl:block"></div>

        <div class="relative mx-auto flex min-h-[760px] max-w-7xl flex-col justify-between px-4 pb-8 pt-16 sm:min-h-[800px] sm:px-6 sm:pb-10 sm:pt-20 lg:min-h-[calc(100vh-5rem)] lg:px-8 lg:pb-12 lg:pt-24">
            <div class="grid flex-1 items-center lg:grid-cols-[1fr_.52fr] lg:gap-16">
                <div
                    x-data="revealOnScroll(.05)"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up max-w-4xl"
                >
                    <div class="inline-flex items-center gap-2.5 rounded-full border border-white/15 bg-black/15 px-3.5 py-2 text-[11px] font-bold uppercase tracking-[0.2em] text-bronze-300 backdrop-blur-md">
                        <span class="h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                        Investment · Wealth · Asset Management
                    </div>

                    <h1 class="mt-8 max-w-4xl font-display text-5xl font-semibold leading-[.98] tracking-[-0.04em] text-white sm:text-6xl lg:text-7xl xl:text-[5.4rem]">
                        Build wealth with a plan that can
                        <span class="text-bronze-300">outlast the noise.</span>
                    </h1>

                    <p class="mt-7 max-w-2xl text-base leading-8 text-white/70 sm:text-lg sm:leading-8">
                        {{ config('app.name') }} brings investment thinking, wealth planning and asset stewardship into one deliberate approach—built around what your capital needs to achieve, protect and become.
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="{{ url('/contact') }}" class="group inline-flex items-center justify-center gap-2 rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-bronze-200 focus:ring-offset-2 focus:ring-offset-ink-950">
                            Start a conversation
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="{{ url('/services') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-md transition duration-300 hover:-translate-y-0.5 hover:border-white/35 hover:bg-white/10">
                            Explore our services
                        </a>
                    </div>
                </div>

                <div class="mt-14 self-end lg:mt-0 lg:self-center lg:justify-self-end">
                    @foreach($heroSlides as $slide)
                        <div
                            x-show="active === {{ $loop->index }}"
                            x-transition:enter="transition duration-700 ease-out"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition duration-300 ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="max-w-sm rounded-[1.6rem] border border-white/15 bg-black/20 p-5 backdrop-blur-xl sm:p-6"
                        >
                            <div class="flex items-center justify-between gap-5">
                                <span class="font-display text-3xl text-bronze-300">{{ $slide['number'] }}</span>
                                <span class="h-px flex-1 bg-white/15"></span>
                            </div>
                            <p class="mt-7 text-[11px] font-bold uppercase tracking-[0.2em] text-white/45">{{ $slide['label'] }}</p>
                            <p class="mt-3 font-display text-2xl leading-snug text-white">{{ $slide['caption'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-12 border-t border-white/15 pt-6">
                <div class="grid gap-7 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div class="grid gap-4 sm:grid-cols-3">
                        @foreach($heroSlides as $slide)
                            <button
                                type="button"
                                @click="goTo({{ $loop->index }})"
                                class="group text-left"
                                :aria-current="active === {{ $loop->index }} ? 'true' : 'false'"
                            >
                                <span class="relative block h-px overflow-hidden bg-white/18">
                                    <span
                                        x-show="active === {{ $loop->index }}"
                                        class="hero-progress-fill absolute inset-y-0 left-0 w-full bg-bronze-300"
                                    ></span>
                                </span>
                                <span class="mt-3 flex items-center gap-3">
                                    <span class="text-[10px] font-bold tracking-[0.18em] text-bronze-300">{{ $slide['number'] }}</span>
                                    <span class="text-xs font-semibold transition" :class="active === {{ $loop->index }} ? 'text-white' : 'text-white/45 group-hover:text-white/75'">{{ $slide['label'] }}</span>
                                </span>
                            </button>
                        @endforeach
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="button" @click="previous()" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white transition hover:border-white/30 hover:bg-white/10" aria-label="Previous slide">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="m12.5 5-5 5 5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button type="button" @click="next()" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white transition hover:border-white/30 hover:bg-white/10" aria-label="Next slide">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="m7.5 5 5 5-5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-b border-ink-950/8 bg-white py-4">
        <div class="marquee-shell">
            <div class="marquee-track gap-3 pr-3 text-[11px] font-bold uppercase tracking-[0.2em] text-ink-700">
                @foreach([1, 2] as $copy)
                    <div class="flex shrink-0 items-center gap-3">
                        @foreach(['Investment management', 'Wealth strategy', 'Asset allocation', 'Portfolio discipline', 'Long-term stewardship', 'Risk awareness'] as $item)
                            <span class="inline-flex items-center gap-3 whitespace-nowrap px-5 py-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-bronze-400"></span>
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about" class="overflow-hidden bg-paper-50 py-20 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-14 lg:grid-cols-[.96fr_1.04fr] lg:items-center lg:gap-20">
                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-scale relative min-h-[500px] sm:min-h-[620px]"
                >
                    <div class="story-image-wrap absolute left-0 top-0 h-[72%] w-[78%] overflow-hidden rounded-[2rem] bg-ink-900 shadow-2xl shadow-ink-950/10">
                        <img src="{{ asset('home/images/banner/building1.jpg') }}" alt="{{ config('app.name') }} investment perspective" class="story-image h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-ink-950/45 via-transparent to-transparent"></div>
                    </div>

                    <div class="story-image-wrap absolute bottom-0 right-0 h-[48%] w-[58%] overflow-hidden rounded-[1.7rem] border-[7px] border-paper-50 bg-ink-900 shadow-2xl shadow-ink-950/12">
                        <img src="{{ asset('home/images/banner/banner-2.jpg') }}" alt="Wealth and asset management" class="story-image h-full w-full object-cover">
                        <div class="absolute inset-0 bg-ink-950/10"></div>
                    </div>

                    <div class="float-slow absolute right-[5%] top-[8%] rounded-2xl border border-white/20 bg-ink-950/88 px-5 py-4 text-white shadow-xl backdrop-blur-xl sm:right-[2%] sm:top-[10%]">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Our perspective</p>
                        <p class="mt-2 max-w-44 font-display text-lg leading-snug">Clarity before complexity.</p>
                    </div>
                </div>

                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up"
                    style="--reveal-delay: 120ms"
                >
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-600">About {{ config('app.name') }}</p>
                    <h2 class="mt-5 max-w-2xl font-display text-4xl font-semibold leading-[1.08] tracking-[-0.035em] text-ink-950 sm:text-5xl lg:text-6xl">
                        Wealth is personal. The way it is managed should be deliberate.
                    </h2>

                    <p class="mt-7 max-w-2xl text-base leading-8 text-ink-700 sm:text-lg">
                        @if($aboutCopy !== '')
                            {{ \Illuminate\Support\Str::limit($aboutCopy, 390) }}
                        @else
                            {{ config('app.name') }} is an investment, wealth and asset management company focused on helping clients make more thoughtful decisions about capital—how it is allocated, how risk is understood, how opportunities are assessed and how wealth is stewarded over time.
                        @endif
                    </p>

                    <p class="mt-5 max-w-2xl text-base leading-8 text-ink-700">
                        We believe strong financial decisions begin with context. Before products, markets or projections, there should be a clear understanding of the objective, the time horizon, the constraints and the role each asset needs to play.
                    </p>

                    <div class="mt-9 grid gap-4 sm:grid-cols-3">
                        @foreach([
                            ['Investment', 'Research-led decisions'],
                            ['Wealth', 'Long-term perspective'],
                            ['Assets', 'Purposeful stewardship'],
                        ] as $pillar)
                            <div class="rounded-2xl border border-ink-950/8 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-ink-950/5">
                                <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600">{{ $pillar[0] }}</span>
                                <p class="mt-2 text-sm font-semibold leading-6 text-ink-950">{{ $pillar[1] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ url('/about') }}" class="group mt-9 inline-flex items-center gap-2 text-sm font-bold text-ink-950 transition hover:text-bronze-700">
                        Discover our company
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section
        x-data="{ videoOpen: false }"
        @keydown.escape.window="videoOpen = false"
        class="bg-white py-20 sm:py-24 lg:py-28"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                x-data="revealOnScroll()"
                :class="{ 'is-visible': shown }"
                class="reveal-scale overflow-hidden rounded-[2.2rem] bg-ink-950"
            >
                <div class="grid lg:grid-cols-[1.18fr_.82fr]">
                    <div class="video-poster group relative min-h-[420px] overflow-hidden sm:min-h-[520px] lg:min-h-[610px]">
                        <img src="{{ asset('home/images/banner/banner-6.jpg') }}" alt="About {{ config('app.name') }}" class="video-poster-image absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-ink-950/80 via-ink-950/20 to-ink-950/15"></div>

                        <div class="absolute inset-x-0 bottom-0 p-7 text-white sm:p-10 lg:p-12">
                            <div class="flex items-end justify-between gap-6">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">Company film</p>
                                    <p class="mt-3 max-w-lg font-display text-3xl leading-tight sm:text-4xl">See the thinking behind the way we manage capital.</p>
                                </div>

                                @if($videoEmbedUrl)
                                    <button
                                        type="button"
                                        @click="videoOpen = true"
                                        class="video-play-ring flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-bronze-300 text-ink-950 transition duration-300 hover:scale-105 hover:bg-bronze-200 sm:h-20 sm:w-20"
                                        aria-label="Play company film"
                                    >
                                        <svg class="ml-1 h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M8 5v14l11-7L8 5Z"/>
                                        </svg>
                                    </button>
                                @else
                                    <a href="{{ url('/about') }}" class="video-play-ring flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-bronze-300 text-ink-950 transition duration-300 hover:scale-105 hover:bg-bronze-200 sm:h-20 sm:w-20" aria-label="Discover our story">
                                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between p-7 text-white sm:p-10 lg:p-12">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Inside {{ config('app.name') }}</p>
                            <h2 class="mt-5 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] sm:text-5xl">
                                More than investment products. A way of thinking about wealth.
                            </h2>
                            <p class="mt-6 text-base leading-8 text-white/58">
                                Our company story is about discipline, perspective and stewardship: understanding what matters first, choosing where capital should work second, and keeping every decision connected to the longer-term objective.
                            </p>
                        </div>

                        <div class="mt-12 space-y-5 border-t border-white/10 pt-7">
                            @foreach([
                                ['01', 'Purpose before allocation'],
                                ['02', 'Risk before excitement'],
                                ['03', 'Stewardship beyond the transaction'],
                            ] as $idea)
                                <div class="flex items-center gap-4">
                                    <span class="text-[10px] font-bold tracking-[0.18em] text-bronze-300">{{ $idea[0] }}</span>
                                    <span class="h-px w-8 bg-white/15"></span>
                                    <p class="text-sm font-semibold text-white/80">{{ $idea[1] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($videoEmbedUrl)
            <div
                x-show="videoOpen"
                x-cloak
                x-transition.opacity.duration.300ms
                class="fixed inset-0 z-[100] flex items-center justify-center bg-ink-950/95 p-4 backdrop-blur-md sm:p-8"
                role="dialog"
                aria-modal="true"
                aria-label="Company film"
                @click.self="videoOpen = false"
            >
                <div class="w-full max-w-5xl">
                    <div class="mb-4 flex justify-end">
                        <button type="button" @click="videoOpen = false" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white transition hover:bg-white/10" aria-label="Close video">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="aspect-video overflow-hidden rounded-2xl bg-black shadow-2xl">
                        <iframe
                            x-show="videoOpen"
                            src="{{ $videoEmbedUrl }}"
                            class="h-full w-full"
                            title="{{ config('app.name') }} company film"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.72fr_1.28fr] lg:gap-20">
                <div
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up lg:sticky lg:top-28 lg:self-start"
                >
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">What we do</p>
                    <h2 class="mt-4 max-w-md font-display text-4xl font-semibold leading-tight tracking-[-0.025em] text-ink-950 sm:text-5xl">
                        A joined-up view of your capital.
                    </h2>
                    <p class="mt-5 max-w-md text-base leading-8 text-ink-700">
                        Investment decisions rarely exist in isolation. We bring strategy, allocation and stewardship together so each decision can support the wider financial picture.
                    </p>
                    <a href="{{ url('/services') }}" class="group mt-7 inline-flex items-center gap-2 text-sm font-bold text-ink-950 transition hover:text-bronze-700">
                        View all services
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    @forelse($coreServices as $service)
                        @php
                            $serviceImage = $serviceFallbackImages[$loop->index % count($serviceFallbackImages)];
                        @endphp
                        <a
                            href="{{ route('service.details', ['id' => $service->id]) }}"
                            x-data="revealOnScroll()"
                            :class="{ 'is-visible': shown }"
                            class="reveal-up group overflow-hidden rounded-[1.7rem] border border-ink-950/8 bg-white transition duration-500 hover:-translate-y-1.5 hover:border-bronze-500/30 hover:shadow-2xl hover:shadow-ink-950/8"
                            style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms"
                        >
                            <div class="relative h-48 overflow-hidden bg-ink-900 sm:h-56">
                                <img src="{{ $serviceImage }}" alt="" class="card-image h-full w-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-ink-950/70 via-ink-950/10 to-transparent"></div>
                                <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 p-5 text-white">
                                    <span class="text-[10px] font-bold tracking-[0.18em] text-bronze-300">0{{ $loop->iteration }}</span>
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-black/15 backdrop-blur-md transition duration-300 group-hover:bg-bronze-300 group-hover:text-ink-950">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                            <path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 sm:p-7">
                                <h3 class="font-display text-2xl font-semibold leading-tight text-ink-950">{{ $service->title }}</h3>
                                <p class="mt-3 text-sm leading-7 text-ink-700">
                                    {{ \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 150) }}
                                </p>
                            </div>
                        </a>
                    @empty
                        @foreach([
                            ['Investment Management', 'A disciplined framework for allocating capital across opportunities while keeping risk, liquidity and time horizon in view.'],
                            ['Wealth Management', 'Bring investment decisions into the wider context of preservation, growth, succession and long-term financial priorities.'],
                            ['Asset Strategy', 'Evaluate how different assets can work together to create a portfolio that is resilient, understandable and purposeful.'],
                            ['Advisory', 'Make consequential financial decisions with a clearer process, better questions and a documented investment rationale.'],
                        ] as $fallback)
                            <div
                                x-data="revealOnScroll()"
                                :class="{ 'is-visible': shown }"
                                class="reveal-up overflow-hidden rounded-[1.7rem] border border-ink-950/8 bg-white"
                                style="--reveal-delay: {{ ($loop->iteration - 1) * 80 }}ms"
                            >
                                <div class="relative h-48 overflow-hidden sm:h-56">
                                    <img src="{{ $serviceFallbackImages[$loop->index] }}" alt="" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950/60 to-transparent"></div>
                                    <span class="absolute bottom-5 left-5 text-[10px] font-bold tracking-[0.18em] text-bronze-300">0{{ $loop->iteration }}</span>
                                </div>
                                <div class="p-6 sm:p-7">
                                    <h3 class="font-display text-2xl font-semibold text-ink-950">{{ $fallback[0] }}</h3>
                                    <p class="mt-3 text-sm leading-7 text-ink-700">{{ $fallback[1] }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section id="approach" class="overflow-hidden bg-ink-900 py-20 text-white sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[.86fr_1.14fr] lg:items-end lg:gap-20">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Our investment discipline</p>
                    <h2 class="mt-4 max-w-xl font-display text-4xl font-semibold leading-tight tracking-[-0.025em] sm:text-5xl lg:text-6xl">
                        A process built to remain useful when markets stop being comfortable.
                    </h2>
                </div>
                <p x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-xl text-base leading-8 text-white/58 lg:justify-self-end" style="--reveal-delay: 120ms">
                    Good investing is not about predicting every turn. It is about having a framework strong enough to make sensible decisions through different conditions, and flexible enough to adapt when the underlying facts change.
                </p>
            </div>

            <div class="mt-16 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['01', 'Understand first', 'We begin with objectives, constraints, liquidity and the role the capital needs to play.'],
                    ['02', 'Research deeply', 'Decisions are grounded in evidence, scenario thinking and a clear view of the risks being taken.'],
                    ['03', 'Diversify with purpose', 'Diversification is used to manage dependency—not to collect assets without a reason.'],
                    ['04', 'Review continuously', 'Portfolios are revisited as circumstances, valuations and opportunities evolve.'],
                ] as $principle)
                    <div
                        x-data="revealOnScroll()"
                        :class="{ 'is-visible': shown }"
                        class="reveal-up group rounded-[1.6rem] border border-white/10 bg-white/[0.035] p-6 transition duration-500 hover:-translate-y-1 hover:border-bronze-300/25 hover:bg-white/[0.06] sm:p-7"
                        style="--reveal-delay: {{ ($loop->iteration - 1) * 85 }}ms"
                    >
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-xs font-bold tracking-[0.18em] text-bronze-300">{{ $principle[0] }}</span>
                            <span class="h-px w-9 bg-white/12 transition-all duration-500 group-hover:w-14 group-hover:bg-bronze-300/40"></span>
                        </div>
                        <h3 class="mt-16 font-display text-2xl font-semibold">{{ $principle[1] }}</h3>
                        <p class="mt-4 text-sm leading-7 text-white/50">{{ $principle[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($featuredSectors->isNotEmpty())
        <section class="bg-white py-20 sm:py-24 lg:py-28">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up flex flex-col gap-6 border-b border-ink-950/10 pb-9 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Where we look</p>
                        <h2 class="mt-4 max-w-2xl font-display text-4xl font-semibold tracking-[-0.025em] text-ink-950 sm:text-5xl">Investment sectors, viewed through a portfolio lens.</h2>
                    </div>
                    <a href="{{ url('/services') }}" class="group inline-flex items-center gap-2 text-sm font-bold text-ink-950 hover:text-bronze-700">
                        Explore opportunities
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="divide-y divide-ink-950/10">
                    @foreach($featuredSectors as $sector)
                        <a
                            href="{{ route('service.details', ['id' => $sector->id]) }}"
                            x-data="revealOnScroll()"
                            :class="{ 'is-visible': shown }"
                            class="reveal-up group grid gap-5 py-7 sm:grid-cols-[88px_60px_1fr_auto] sm:items-center sm:py-8"
                            style="--reveal-delay: {{ ($loop->iteration - 1) * 70 }}ms"
                        >
                            <div class="hidden h-16 w-20 overflow-hidden rounded-xl bg-ink-900 sm:block">
                                <img src="{{ $serviceFallbackImages[$loop->index % count($serviceFallbackImages)] }}" alt="" class="card-image h-full w-full object-cover">
                            </div>
                            <span class="text-xs font-bold tracking-[0.16em] text-bronze-600">0{{ $loop->iteration }}</span>
                            <div>
                                <h3 class="font-display text-2xl font-semibold text-ink-950 sm:text-3xl">{{ $sector->title }}</h3>
                                @if(!empty($sector->short))
                                    <p class="mt-2 max-w-3xl text-sm leading-7 text-ink-700">{{ \Illuminate\Support\Str::limit(trim(strip_tags($sector->short)), 170) }}</p>
                                @endif
                            </div>
                            <span class="flex h-10 w-10 items-center justify-center rounded-full border border-ink-950/10 text-ink-950 transition duration-300 group-hover:border-bronze-500/40 group-hover:bg-bronze-100">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="bg-paper-100 py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                x-data="revealOnScroll()"
                :class="{ 'is-visible': shown }"
                class="reveal-scale grid overflow-hidden rounded-[2rem] border border-ink-950/8 bg-white lg:grid-cols-[.9fr_1.1fr]"
            >
                <div class="border-b border-ink-950/8 p-7 sm:p-10 lg:border-b-0 lg:border-r lg:p-12">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Who we work with</p>
                    <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.025em] text-ink-950 sm:text-5xl">
                        Different circumstances. One standard of care.
                    </h2>
                    <p class="mt-5 text-base leading-8 text-ink-700">
                        The right strategy depends on what the capital is for. Our approach is designed to begin with that context rather than force every investor into the same answer.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2">
                    @foreach([
                        ['Individuals & families', 'Build and preserve wealth around life goals, future obligations and generational priorities.'],
                        ['Business owners', 'Think through personal and business capital with liquidity, concentration and transition in view.'],
                        ['Professionals & executives', 'Create a more deliberate framework for savings, investments and long-term financial independence.'],
                        ['Institutions & partners', 'Access a structured investment conversation centred on mandate, risk and accountability.'],
                    ] as $audience)
                        <div class="group border-b border-ink-950/8 p-7 transition duration-300 hover:bg-paper-50 sm:p-8 sm:nth-[odd]:border-r sm:nth-[3]:border-b-0 sm:nth-[4]:border-b-0">
                            <span class="mb-8 flex h-10 w-10 items-center justify-center rounded-full bg-paper-100 text-bronze-700 transition duration-300 group-hover:bg-bronze-200 group-hover:text-ink-950">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <h3 class="text-base font-bold text-ink-950">{{ $audience[0] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-700">{{ $audience[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-paper-50 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                x-data="revealOnScroll()"
                :class="{ 'is-visible': shown }"
                class="reveal-scale relative overflow-hidden rounded-[2rem] bg-bronze-300 p-7 text-ink-950 sm:p-10 lg:p-14"
            >
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full border border-ink-950/10" aria-hidden="true"></div>
                <div class="absolute -right-2 top-8 h-40 w-40 rounded-full border border-ink-950/10" aria-hidden="true"></div>
                <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-ink-950/55">The next step</p>
                        <h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight tracking-[-0.025em] sm:text-5xl lg:text-6xl">
                            Your capital should have a strategy you can explain.
                        </h2>
                        <p class="mt-5 max-w-2xl text-base leading-8 text-ink-950/65">
                            Tell us what you are trying to achieve. We will start with the objectives, the constraints and the questions that matter before discussing an investment route.
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ url('/contact') }}" class="group inline-flex min-w-48 items-center justify-center gap-2 rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-ink-900">
                            Talk to our team
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="{{ url('/plans') }}" class="inline-flex min-w-48 items-center justify-center rounded-full border border-ink-950/20 px-6 py-3.5 text-sm font-bold text-ink-950 transition duration-300 hover:bg-ink-950/5">
                            View investment plans
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
