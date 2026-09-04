<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @php
        $appName = config('app.name');
        $favicon = !empty($web?->favicon) ? asset('home/images/' . $web->favicon) : null;
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#08171d">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $appName . ' | Wealth & Asset Management')</title>
    <meta name="description" content="@yield('meta_description', 'Research-led investment, wealth management and asset management solutions built around long-term objectives.')">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', $appName)">
    <meta property="og:description" content="@yield('og_description', 'A disciplined approach to building, preserving and managing wealth.')">
    <meta property="og:url" content="{{ url()->current() }}">

    @if($favicon)
        <link rel="icon" href="{{ $favicon }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-paper-50 font-sans text-ink-950 antialiased">
    <div class="min-h-screen overflow-x-clip">
        <header
            x-data="{ open: false, scrolled: window.scrollY > 18 }"
            x-init="scrolled = window.scrollY > 18"
            @scroll.window="scrolled = window.scrollY > 18"
            @keydown.escape.window="open = false"
            :class="scrolled ? 'border-white/8 bg-ink-950/95 shadow-xl shadow-black/10' : 'border-white/10 bg-ink-950/82'"
            class="sticky top-0 z-50 border-b text-white backdrop-blur-xl transition-all duration-500"
        >
            <div
                :class="scrolled ? 'h-[70px]' : 'h-20'"
                class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 transition-all duration-500 sm:px-6 lg:gap-6 lg:px-8"
            >
                <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="{{ $appName }} home">
                    @if(!empty($web?->logo))
                        <span
                            :class="scrolled ? 'h-10 w-10' : 'h-11 w-11'"
                            class="flex shrink-0 items-center justify-center overflow-hidden rounded-xl border border-white/10 bg-white/95 p-1.5 transition-all duration-500"
                        >
                            <img
                                src="{{ asset('home/images/' . $web->logo) }}"
                                alt="{{ $appName }}"
                                class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105"
                            >
                        </span>
                    @else
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-bronze-400/40 bg-bronze-400/10 font-display text-lg font-semibold text-bronze-300">
                            {{ strtoupper(substr($appName, 0, 1)) }}
                        </span>
                    @endif

                    <span class="min-w-0">
                        <span class="block truncate text-sm font-semibold tracking-[0.01em] sm:text-base">{{ $appName }}</span>
                        <span
                            :class="scrolled ? 'opacity-0 -translate-y-1 h-0' : 'opacity-100 translate-y-0 h-auto'"
                            class="hidden overflow-hidden text-[10px] font-semibold uppercase tracking-[0.22em] text-white/45 transition-all duration-500 sm:block"
                        >Investment · Wealth · Assets</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-7 lg:flex" aria-label="Primary navigation">
                    @php
                        $navItems = [
                            ['Home', url('/'), request()->routeIs('home.index')],
                            ['About', url('/about'), request()->is('about')],
                            ['Services', url('/services'), request()->is('services') || request()->is('service/*')],
                            ['Investment Plans', url('/plans'), request()->is('plans') || request()->is('plan')],
                            ['Our Approach', url('/#approach'), false],
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        <a href="{{ $item[1] }}" class="group relative py-2 text-sm font-medium transition duration-300 {{ $item[2] ? 'text-bronze-300' : 'text-white/70 hover:text-white' }}">
                            {{ $item[0] }}
                            <span class="absolute inset-x-0 -bottom-1 h-px origin-left scale-x-0 bg-bronze-300 transition-transform duration-300 group-hover:scale-x-100 {{ $item[2] ? 'scale-x-100' : '' }}"></span>
                        </a>
                    @endforeach
                </nav>

                <div class="hidden items-center gap-2 lg:flex">
                    @include('layouts.partials.google-translate', ['tone' => 'dark'])
                    <a href="{{ url('/login') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-white/75 transition duration-300 hover:bg-white/5 hover:text-white">
                        Client login
                    </a>
                    <a href="{{ url('/contact') }}" class="group inline-flex items-center gap-2 rounded-full bg-bronze-300 px-5 py-2.5 text-sm font-bold text-ink-950 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200 focus:outline-none focus:ring-2 focus:ring-bronze-200 focus:ring-offset-2 focus:ring-offset-ink-950">
                        Talk to us
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="flex shrink-0 items-center gap-2 lg:hidden">
                    @include('layouts.partials.google-translate', ['tone' => 'dark'])
                    <button
                        type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition duration-300 hover:bg-white/10 sm:h-11 sm:w-11"
                        @click="open = !open"
                        :aria-expanded="open"
                        aria-controls="mobile-navigation"
                        aria-label="Toggle navigation"
                    >
                        <svg x-show="!open" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-navigation" x-show="open" x-collapse x-cloak class="border-t border-white/10 bg-ink-950/98 lg:hidden">
                <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="Mobile navigation">
                    <a @click="open = false" href="{{ url('/') }}" class="rounded-xl px-3 py-3 text-sm font-semibold {{ request()->routeIs('home.index') ? 'bg-white/10 text-bronze-300' : 'text-white/75 hover:bg-white/5 hover:text-white' }}">Home</a>
                    <a @click="open = false" href="{{ url('/about') }}" class="rounded-xl px-3 py-3 text-sm font-semibold text-white/75 transition hover:bg-white/5 hover:text-white">About</a>
                    <a @click="open = false" href="{{ url('/services') }}" class="rounded-xl px-3 py-3 text-sm font-semibold text-white/75 transition hover:bg-white/5 hover:text-white">Services</a>
                    <a @click="open = false" href="{{ url('/plans') }}" class="rounded-xl px-3 py-3 text-sm font-semibold text-white/75 transition hover:bg-white/5 hover:text-white">Investment Plans</a>
                    <a @click="open = false" href="{{ url('/#approach') }}" class="rounded-xl px-3 py-3 text-sm font-semibold text-white/75 transition hover:bg-white/5 hover:text-white">Our Approach</a>
                    <a @click="open = false" href="{{ url('/contact') }}" class="mt-2 inline-flex items-center justify-center rounded-xl bg-bronze-300 px-4 py-3 text-sm font-bold text-ink-950">Talk to us</a>
                    <a @click="open = false" href="{{ url('/login') }}" class="inline-flex items-center justify-center rounded-xl border border-white/10 px-4 py-3 text-sm font-semibold text-white">Client login</a>
                </nav>
            </div>
        </header>

        @if(session('success') || session('status') || session('error'))
            <div class="mx-auto max-w-7xl px-4 pt-5 sm:px-6 lg:px-8">
                <div class="rounded-2xl border px-4 py-3 text-sm {{ session('error') ? 'border-red-200 bg-red-50 text-red-800' : 'border-emerald-200 bg-emerald-50 text-emerald-800' }}">
                    {{ session('error') ?? session('success') ?? session('status') }}
                </div>
            </div>
        @endif

        <main>
            @yield('content')
        </main>

        <footer class="bg-ink-950 text-white">
            <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
                <div class="grid gap-10 border-b border-white/10 pb-12 lg:grid-cols-[1.25fr_.75fr_.75fr] lg:gap-16">
                    <div>
                        <a href="{{ url('/') }}" class="group inline-flex items-center gap-3">
                            @if(!empty($web?->logo))
                                <span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-xl bg-white p-1.5">
                                    <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105">
                                </span>
                            @endif
                            <span class="font-display text-xl font-semibold">{{ $appName }}</span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-7 text-white/55">
                            Thoughtful investment, wealth and asset-management solutions designed around long-term objectives, disciplined risk management and clear stewardship.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm text-white/65">
                            @if(!empty($web?->email))
                                <a class="transition hover:text-white" href="mailto:{{ $web->email }}">{{ $web->email }}</a>
                            @endif
                            @if(!empty($web?->phone))
                                <a class="transition hover:text-white" href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}">{{ $web->phone }}</a>
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Company</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/60">
                            <a href="{{ url('/about') }}" class="transition hover:translate-x-0.5 hover:text-white">About us</a>
                            <a href="{{ url('/services') }}" class="transition hover:translate-x-0.5 hover:text-white">Services</a>
                            <a href="{{ url('/plans') }}" class="transition hover:translate-x-0.5 hover:text-white">Investment plans</a>
                            <a href="{{ url('/career') }}" class="transition hover:translate-x-0.5 hover:text-white">Careers</a>
                            <a href="{{ url('/contact') }}" class="transition hover:translate-x-0.5 hover:text-white">Contact</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Resources</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/60">
                            <a href="{{ url('/security') }}" class="transition hover:translate-x-0.5 hover:text-white">Security</a>
                            <a href="{{ url('/faqs') }}" class="transition hover:translate-x-0.5 hover:text-white">FAQs</a>
                            <a href="{{ url('/privacy') }}" class="transition hover:translate-x-0.5 hover:text-white">Privacy</a>
                            <a href="{{ url('/terms') }}" class="transition hover:translate-x-0.5 hover:text-white">Terms</a>
                            <a href="{{ url('/login') }}" class="transition hover:translate-x-0.5 hover:text-white">Client portal</a>
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 pt-8 text-xs leading-6 text-white/40 lg:grid-cols-[1fr_auto] lg:items-end">
                    <p class="max-w-4xl">
                        Investment values can rise or fall. Information on this website is provided for general purposes and should not be treated as personalised investment, legal or tax advice. Consider your objectives and risk tolerance before making an investment decision.
                    </p>
                    <p class="whitespace-nowrap">&copy; {{ now()->year }} {{ $appName }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    {{-- Google Translate's native control stays hidden; branded selectors above drive it. --}}
    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>

    @stack('scripts')

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'b05fd6fbb67c62a798c0f07a6b2236705a4ff31f';
        _smartsupp.offsetX = 0;
        _smartsupp.offsetY = 300;
        window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>
    <noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>
</body>
</html>
