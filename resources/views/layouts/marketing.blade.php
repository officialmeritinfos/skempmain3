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
            ['label' => 'Plans', 'href' => url('/plans'), 'active' => request()->is('plans') || request()->is('plan')],
            ['label' => 'Our Approach', 'href' => url('/#approach'), 'active' => false],
            ['label' => 'Contact', 'href' => url('/contact'), 'active' => request()->is('contact')],
        ];
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#040813">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $appName . ' | Wealth & Asset Management')</title>
    <meta name="description" content="@yield('meta_description', 'Wealth, asset and investment management built around disciplined strategy, long-term objectives and thoughtful stewardship.')">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', $appName)">
    <meta property="og:description" content="@yield('og_description', 'A connected approach to wealth, assets and investment management.')">
    <meta property="og:url" content="{{ url()->current() }}">

    @if($favicon)
        <link rel="icon" href="{{ $favicon }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-[#030712] font-sans text-white antialiased">
    <div class="relative min-h-screen overflow-x-clip bg-[#030712]">
        <div class="relative z-40 border-b border-white/8 bg-black/25 backdrop-blur-xl">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-2.5 text-[11px] text-white/55 sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-center gap-x-5 gap-y-1">
                    <span class="inline-flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.85)]"></span>
                        Wealth · Assets · Investment Management
                    </span>
                    @if(!empty($web?->email))
                        <a href="mailto:{{ $web->email }}" class="transition hover:text-white">{{ $web->email }}</a>
                    @endif
                    @if(!empty($web?->phone))
                        <a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="transition hover:text-white">{{ $web->phone }}</a>
                    @endif
                </div>
                <a href="{{ url('/security') }}" class="hidden transition hover:text-white sm:inline">Security</a>
            </div>
        </div>

        <header
            x-data="{ open: false, scrolled: window.scrollY > 14 }"
            x-init="scrolled = window.scrollY > 14"
            @scroll.window="scrolled = window.scrollY > 14"
            @keydown.escape.window="open = false"
            class="sticky top-0 z-50"
        >
            <div :class="scrolled ? 'border-white/10 bg-[#040813]/90 shadow-[0_24px_60px_rgba(2,6,23,.45)]' : 'border-white/8 bg-[#050816]/76'" class="border-b backdrop-blur-2xl transition duration-500">
                <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
                    <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="{{ $appName }} home">
                        @if(!empty($web?->logo))
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-white/10 bg-white/10 p-2 shadow-[0_0_24px_rgba(34,211,238,.08)] backdrop-blur-xl transition duration-300 group-hover:scale-105 group-hover:border-cyan-300/25">
                                <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                            </span>
                        @else
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-cyan-300/20 bg-cyan-300/10 font-display text-xl font-bold text-cyan-200 shadow-[0_0_25px_rgba(34,211,238,.15)]">
                                {{ strtoupper(substr($appName, 0, 1)) }}
                            </span>
                        @endif

                        <span class="min-w-0">
                            <span class="block truncate font-display text-xl font-bold tracking-[-0.02em] text-white">{{ $appName }}</span>
                            <span class="hidden text-[10px] font-semibold uppercase tracking-[0.24em] text-white/40 sm:block">Wealth · Assets · Investments</span>
                        </span>
                    </a>

                    <nav class="hidden items-center gap-7 xl:flex" aria-label="Primary navigation">
                        @foreach($primaryNavigation as $item)
                            <a href="{{ $item['href'] }}" class="group relative py-2 text-sm font-medium transition {{ $item['active'] ? 'text-cyan-200' : 'text-white/68 hover:text-white' }}">
                                {{ $item['label'] }}
                                <span class="absolute inset-x-0 -bottom-1 h-px origin-left bg-[linear-gradient(90deg,rgba(34,211,238,1),rgba(168,85,247,1))] transition-transform duration-300 {{ $item['active'] ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                            </a>
                        @endforeach
                    </nav>

                    <div class="hidden items-center gap-2 xl:flex">
                        @include('layouts.partials.google-translate', ['tone' => 'dark'])

                        @auth
                            <a href="{{ route('user.dashboard') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-white/72 transition hover:bg-white/6 hover:text-white">Dashboard</a>
                        @else
                            <a href="{{ url('/login') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-white/72 transition hover:bg-white/6 hover:text-white">Client login</a>
                        @endauth

                        <a href="{{ url('/contact') }}" class="glow-button-primary inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">
                            Talk to us
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>

                    <div class="flex items-center gap-2 xl:hidden">
                        @include('layouts.partials.google-translate', ['tone' => 'dark'])
                        <button
                            type="button"
                            class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/7 text-white transition hover:bg-white/12"
                            @click="open = !open"
                            :aria-expanded="open"
                            aria-controls="mobile-navigation"
                            aria-label="Toggle navigation"
                        >
                            <svg x-show="!open" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            <svg x-show="open" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </button>
                    </div>
                </div>

                <div id="mobile-navigation" x-show="open" x-collapse x-cloak class="border-t border-white/10 bg-[#050816]/96 xl:hidden">
                    <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="Mobile navigation">
                        @foreach($primaryNavigation as $item)
                            <a @click="open = false" href="{{ $item['href'] }}" class="rounded-2xl px-4 py-3 text-sm font-semibold transition {{ $item['active'] ? 'bg-cyan-300/10 text-cyan-200' : 'text-white/75 hover:bg-white/6 hover:text-white' }}">{{ $item['label'] }}</a>
                        @endforeach
                        <a @click="open = false" href="{{ url('/contact') }}" class="mt-2 inline-flex items-center justify-center rounded-2xl bg-[linear-gradient(90deg,#67e8f9,#a855f7,#facc15)] px-4 py-3 text-sm font-bold text-slate-950">Talk to us</a>
                        @auth
                            <a @click="open = false" href="{{ route('user.dashboard') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 px-4 py-3 text-sm font-semibold text-white">Dashboard</a>
                        @else
                            <a @click="open = false" href="{{ url('/login') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 px-4 py-3 text-sm font-semibold text-white">Client login</a>
                        @endauth
                    </nav>
                </div>
            </div>
        </header>

        @if(session('success') || session('status') || session('error'))
            <div class="relative z-30 mx-auto max-w-7xl px-4 pt-5 sm:px-6 lg:px-8">
                <div class="rounded-2xl border px-4 py-3 text-sm backdrop-blur-xl {{ session('error') ? 'border-red-200/25 bg-red-500/10 text-red-100' : 'border-emerald-200/25 bg-emerald-500/10 text-emerald-100' }}">
                    {{ session('error') ?? session('success') ?? session('status') }}
                </div>
            </div>
        @endif

        <main class="relative z-10">
            @yield('content')
        </main>

        <footer class="relative overflow-hidden border-t border-white/8 bg-[#02050d] text-white">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_20%_0%,rgba(56,189,248,.14),transparent_32%),radial-gradient(circle_at_80%_12%,rgba(217,70,239,.12),transparent_28%)]"></div>
            <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                <div class="grid gap-10 border-b border-white/8 pb-12 lg:grid-cols-[1.2fr_.8fr_.8fr] lg:gap-16">
                    <div>
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                            @if(!empty($web?->logo))
                                <span class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-2xl border border-white/10 bg-white/10 p-2 backdrop-blur-xl">
                                    <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                                </span>
                            @endif
                            <span>
                                <span class="block font-display text-2xl font-bold text-white">{{ $appName }}</span>
                                <span class="block text-[10px] font-semibold uppercase tracking-[0.24em] text-white/40">Wealth · Assets · Investments</span>
                            </span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-7 text-white/58">Investment, wealth and asset-management solutions built around long-term objectives, disciplined risk management and thoughtful stewardship.</p>
                        <div class="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-sm text-white/65">
                            @if(!empty($web?->email))<a class="transition hover:text-white" href="mailto:{{ $web->email }}">{{ $web->email }}</a>@endif
                            @if(!empty($web?->phone))<a class="transition hover:text-white" href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}">{{ $web->phone }}</a>@endif
                            @if(!empty($web?->address))<span class="text-white/45">{{ $web->address }}</span>@endif
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200">Company</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/62">
                            <a href="{{ url('/about') }}" class="transition hover:text-white">About us</a>
                            <a href="{{ url('/services') }}" class="transition hover:text-white">Services</a>
                            <a href="{{ url('/plans') }}" class="transition hover:text-white">Investment plans</a>
                            <a href="{{ url('/career') }}" class="transition hover:text-white">Careers</a>
                            <a href="{{ url('/contact') }}" class="transition hover:text-white">Contact</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-200">Information</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/62">
                            <a href="{{ url('/security') }}" class="transition hover:text-white">Security</a>
                            <a href="{{ url('/faqs') }}" class="transition hover:text-white">FAQs</a>
                            <a href="{{ url('/privacy') }}" class="transition hover:text-white">Privacy</a>
                            <a href="{{ url('/terms') }}" class="transition hover:text-white">Terms</a>
                            <a href="{{ url('/login') }}" class="transition hover:text-white">Client portal</a>
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 pt-8 text-xs leading-6 text-white/40 lg:grid-cols-[1fr_auto] lg:items-end">
                    <p class="max-w-4xl">Investments may rise or fall in value. Information on this website is for general information only and should not be treated as personalised investment, legal or tax advice.</p>
                    <p class="whitespace-nowrap">&copy; {{ now()->year }} {{ $appName }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>
    @stack('scripts')
</body>
</html>
