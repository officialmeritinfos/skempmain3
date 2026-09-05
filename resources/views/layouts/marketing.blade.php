<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @php
        $appName = config('app.name');
        $favicon = !empty($web?->favicon)
            ? asset('home/images/' . $web->favicon)
            : (!empty($web?->logo) ? asset('home/images/' . $web->logo) : null);

        $primaryNavigation = [
            ['label' => 'Home', 'href' => url('/'), 'active' => request()->routeIs('home.index')],
            ['label' => 'About', 'href' => url('/about'), 'active' => request()->is('about')],
            ['label' => 'Services', 'href' => url('/services'), 'active' => request()->is('services') || request()->is('service/*')],
            ['label' => 'Investment Plans', 'href' => url('/plans'), 'active' => request()->is('plans') || request()->is('plan')],
            ['label' => 'Our Approach', 'href' => url('/#approach'), 'active' => false],
        ];
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#07181b">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $appName . ' | Investment, Wealth & Asset Management')</title>
    <meta name="description" content="@yield('meta_description', 'Investment, wealth and asset-management solutions built around long-term objectives, disciplined risk management and thoughtful stewardship.')">
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
            class="sticky top-0 z-50 bg-ink-950 text-white shadow-[0_1px_0_rgba(255,255,255,.06)]"
        >
            <div class="hidden border-b border-white/[0.07] lg:block">
                <div class="mx-auto flex h-9 max-w-[90rem] items-center justify-between px-6 xl:px-10">
                    <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/45">
                        Investment · Wealth · Asset Management
                    </p>

                    <div class="flex items-center gap-6 text-[11px] font-semibold text-white/55">
                        @if(!empty($web?->email))
                            <a href="mailto:{{ $web->email }}" class="transition hover:text-white">{{ $web->email }}</a>
                        @endif
                        @if(!empty($web?->phone))
                            <a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="transition hover:text-white">{{ $web->phone }}</a>
                        @endif
                        <a href="{{ url('/security') }}" class="transition hover:text-white">Security</a>
                    </div>
                </div>
            </div>

            <div
                :class="scrolled ? 'h-[68px]' : 'h-[76px]'"
                class="mx-auto flex max-w-[90rem] items-center justify-between gap-5 px-4 transition-all duration-500 sm:px-6 xl:px-10"
            >
                <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3.5" aria-label="{{ $appName }} home">
                    @if(!empty($web?->logo))
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-[.9rem] border border-white/10 bg-white p-1.5 shadow-sm shadow-black/10">
                            <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105">
                        </span>
                    @else
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-[.9rem] border border-bronze-300/30 bg-bronze-300/10 font-display text-2xl font-semibold text-bronze-300">
                            {{ strtoupper(substr($appName, 0, 1)) }}
                        </span>
                    @endif

                    <span class="min-w-0 leading-none">
                        <span class="block truncate text-[15px] font-bold tracking-[-0.01em] text-white sm:text-base">{{ $appName }}</span>
                        <span class="mt-1.5 hidden truncate text-[9px] font-bold uppercase tracking-[0.2em] text-bronze-300/75 sm:block">Capital with direction</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-7 xl:flex" aria-label="Primary navigation">
                    @foreach($primaryNavigation as $item)
                        <a href="{{ $item['href'] }}" class="group relative py-2 text-[13px] font-semibold transition duration-300 {{ $item['active'] ? 'text-white' : 'text-white/60 hover:text-white' }}">
                            {{ $item['label'] }}
                            <span class="absolute inset-x-0 -bottom-1 h-px origin-left bg-bronze-300 transition-transform duration-300 {{ $item['active'] ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                        </a>
                    @endforeach
                </nav>

                <div class="hidden items-center gap-2 xl:flex">
                    @include('layouts.partials.google-translate', ['tone' => 'dark'])

                    @auth
                        <a href="{{ route('user.dashboard') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-white/70 transition hover:bg-white/[0.06] hover:text-white">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-white/70 transition hover:bg-white/[0.06] hover:text-white">Client login</a>
                    @endauth

                    <a href="{{ url('/contact') }}" class="group inline-flex items-center gap-2 rounded-full bg-bronze-300 px-5 py-2.5 text-sm font-bold text-ink-950 transition duration-300 hover:-translate-y-0.5 hover:bg-bronze-200 focus:outline-none focus:ring-2 focus:ring-bronze-200 focus:ring-offset-2 focus:ring-offset-ink-950">
                        Talk to us
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="flex shrink-0 items-center gap-2 xl:hidden">
                    @include('layouts.partials.google-translate', ['tone' => 'dark'])
                    <button
                        type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.055] text-white transition hover:bg-white/10 sm:h-11 sm:w-11"
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

            <div id="mobile-navigation" x-show="open" x-collapse x-cloak class="border-t border-white/10 bg-ink-950 xl:hidden">
                <div class="mx-auto max-w-[90rem] px-4 py-5 sm:px-6">
                    <nav class="grid gap-1" aria-label="Mobile navigation">
                        @foreach($primaryNavigation as $item)
                            <a @click="open = false" href="{{ $item['href'] }}" class="flex items-center justify-between rounded-xl px-3 py-3 text-sm font-semibold transition {{ $item['active'] ? 'bg-white/[0.07] text-bronze-300' : 'text-white/72 hover:bg-white/[0.05] hover:text-white' }}">
                                <span>{{ $item['label'] }}</span>
                                <svg class="h-4 w-4 opacity-35" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m8 5 5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        @endforeach
                    </nav>

                    <div class="mt-5 grid gap-2 border-t border-white/10 pt-5 sm:grid-cols-2">
                        <a @click="open = false" href="{{ url('/contact') }}" class="inline-flex items-center justify-center rounded-xl bg-bronze-300 px-4 py-3 text-sm font-bold text-ink-950">Talk to us</a>
                        @auth
                            <a @click="open = false" href="{{ route('user.dashboard') }}" class="inline-flex items-center justify-center rounded-xl border border-white/10 px-4 py-3 text-sm font-semibold text-white">Dashboard</a>
                        @else
                            <a @click="open = false" href="{{ url('/login') }}" class="inline-flex items-center justify-center rounded-xl border border-white/10 px-4 py-3 text-sm font-semibold text-white">Client login</a>
                        @endauth
                    </div>

                    @if(!empty($web?->email) || !empty($web?->phone))
                        <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 text-xs text-white/45">
                            @if(!empty($web?->email))<a href="mailto:{{ $web->email }}">{{ $web->email }}</a>@endif
                            @if(!empty($web?->phone))<a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}">{{ $web->phone }}</a>@endif
                        </div>
                    @endif
                </div>
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
            <div class="border-b border-white/[0.07]">
                <div class="mx-auto grid max-w-[90rem] gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-center xl:px-10">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">A clearer next step</p>
                        <p class="mt-2 max-w-2xl font-display text-3xl font-semibold leading-tight sm:text-4xl">Start with the objective. Build the strategy from there.</p>
                    </div>
                    <a href="{{ url('/contact') }}" class="inline-flex w-fit items-center justify-center rounded-full border border-white/15 px-5 py-3 text-sm font-bold text-white transition hover:border-bronze-300/50 hover:bg-white/[0.05]">Start a conversation</a>
                </div>
            </div>

            <div class="mx-auto max-w-[90rem] px-4 py-14 sm:px-6 lg:py-16 xl:px-10">
                <div class="grid gap-11 border-b border-white/10 pb-12 md:grid-cols-2 lg:grid-cols-[1.35fr_.65fr_.65fr_.8fr] lg:gap-12">
                    <div>
                        <a href="{{ url('/') }}" class="group inline-flex items-center gap-3">
                            @if(!empty($web?->logo))
                                <span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-xl bg-white p-1.5">
                                    <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105">
                                </span>
                            @endif
                            <span class="font-display text-2xl font-semibold">{{ $appName }}</span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-7 text-white/52">
                            Investment, wealth and asset-management solutions built around long-term objectives, disciplined risk management and thoughtful stewardship.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm text-white/62">
                            @if(!empty($web?->email))
                                <a class="transition hover:text-white" href="mailto:{{ $web->email }}">{{ $web->email }}</a>
                            @endif
                            @if(!empty($web?->phone))
                                <a class="transition hover:text-white" href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}">{{ $web->phone }}</a>
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Company</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/56">
                            <a href="{{ url('/about') }}" class="transition hover:text-white">About us</a>
                            <a href="{{ url('/career') }}" class="transition hover:text-white">Careers</a>
                            <a href="{{ url('/contact') }}" class="transition hover:text-white">Contact</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Invest</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/56">
                            <a href="{{ url('/services') }}" class="transition hover:text-white">Services</a>
                            <a href="{{ url('/plans') }}" class="transition hover:text-white">Investment plans</a>
                            <a href="{{ url('/#approach') }}" class="transition hover:text-white">Our approach</a>
                            <a href="{{ url('/register') }}" class="transition hover:text-white">Open an account</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Information</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/56">
                            <a href="{{ url('/faqs') }}" class="transition hover:text-white">FAQs</a>
                            <a href="{{ url('/security') }}" class="transition hover:text-white">Security</a>
                            <a href="{{ url('/privacy') }}" class="transition hover:text-white">Privacy</a>
                            <a href="{{ url('/terms') }}" class="transition hover:text-white">Terms</a>
                        </div>
                    </div>
                </div>

                <div class="grid gap-6 pt-8 text-xs leading-6 text-white/38 lg:grid-cols-[1fr_auto] lg:items-end">
                    <p class="max-w-4xl">
                        Investment values can rise or fall. Information on this website is provided for general purposes and should not be treated as personalised investment, legal or tax advice. Consider your objectives, liquidity needs and tolerance for risk before making an investment decision.
                    </p>
                    <p class="whitespace-nowrap">&copy; {{ now()->year }} {{ $appName }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>

    @stack('scripts')
</body>
</html>
