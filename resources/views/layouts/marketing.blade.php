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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#050816">

    <title>@yield('title', $appName . ' | Wealth & Asset Management')</title>
    <meta name="description" content="@yield('meta_description', 'Wealth, asset and investment management built around disciplined strategy, long-term objectives and thoughtful stewardship.')">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', $appName)">
    <meta property="og:description" content="@yield('og_description', 'A connected approach to wealth, assets and investment management.')">
    <meta property="og:url" content="{{ url()->current() }}">

    @if($favicon)
        <link rel="icon" href="{{ $favicon }}">
    @endif

    <script>
        (() => {
            try {
                const saved = localStorage.getItem('site-theme');
                const dark = saved ? saved === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.classList.toggle('dark', dark);
                document.documentElement.dataset.theme = dark ? 'dark' : 'light';
                document.documentElement.style.colorScheme = dark ? 'dark' : 'light';
            } catch (_) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-[#f5f7fb] font-sans text-slate-950 antialiased transition-colors duration-300 dark:bg-[#030712] dark:text-white">
    <div class="relative min-h-screen overflow-x-clip">
        <div class="relative z-40 border-b border-slate-900/8 bg-white/72 backdrop-blur-xl dark:border-white/8 dark:bg-black/25">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-2.5 text-[11px] text-slate-500 sm:px-6 lg:px-8 dark:text-white/55">
                <div class="flex flex-wrap items-center gap-x-5 gap-y-1">
                    <span class="inline-flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-cyan-400 shadow-[0_0_14px_rgba(34,211,238,.65)] dark:bg-cyan-300 dark:shadow-[0_0_14px_rgba(103,232,249,.85)]"></span>
                        Wealth · Assets · Investment Management
                    </span>
                    @if(!empty($web?->email))
                        <a href="mailto:{{ $web->email }}" class="transition hover:text-slate-950 dark:hover:text-white">{{ $web->email }}</a>
                    @endif
                    @if(!empty($web?->phone))
                        <a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="transition hover:text-slate-950 dark:hover:text-white">{{ $web->phone }}</a>
                    @endif
                </div>
                <a href="{{ url('/security') }}" class="hidden transition hover:text-slate-950 sm:inline dark:hover:text-white">Security</a>
            </div>
        </div>

        <header
            x-data="{ open: false, scrolled: window.scrollY > 14 }"
            x-init="scrolled = window.scrollY > 14"
            @scroll.window="scrolled = window.scrollY > 14"
            @keydown.escape.window="open = false"
            class="sticky top-0 z-50"
        >
            <div
                :class="scrolled ? 'shadow-[0_20px_55px_rgba(15,23,42,.10)] dark:shadow-[0_24px_60px_rgba(2,6,23,.45)]' : ''"
                class="border-b border-slate-900/8 bg-white/84 backdrop-blur-2xl transition duration-500 dark:border-white/8 dark:bg-[#050816]/82"
            >
                <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
                    <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="{{ $appName }} home">
                        @if(!empty($web?->logo))
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-slate-900/10 bg-white p-2 shadow-sm transition duration-300 group-hover:-translate-y-0.5 dark:border-white/10 dark:bg-white/10">
                                <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                            </span>
                        @else
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-cyan-400/25 bg-cyan-400/10 font-display text-xl font-bold text-cyan-700 shadow-[0_0_22px_rgba(34,211,238,.12)] dark:border-cyan-300/20 dark:bg-cyan-300/10 dark:text-cyan-200">
                                {{ strtoupper(substr($appName, 0, 1)) }}
                            </span>
                        @endif
                        <span class="min-w-0">
                            <span class="block truncate font-display text-lg font-bold tracking-[-0.02em] text-slate-950 sm:text-xl dark:text-white">{{ $appName }}</span>
                            <span class="hidden text-[9px] font-semibold uppercase tracking-[0.22em] text-slate-400 sm:block dark:text-white/38">Wealth · Assets · Investments</span>
                        </span>
                    </a>

                    <nav class="hidden items-center gap-6 xl:flex" aria-label="Primary navigation">
                        @foreach($primaryNavigation as $item)
                            <a href="{{ $item['href'] }}" class="group relative py-2 text-[13px] font-semibold transition {{ $item['active'] ? 'text-cyan-700 dark:text-cyan-200' : 'text-slate-600 hover:text-slate-950 dark:text-white/62 dark:hover:text-white' }}">
                                {{ $item['label'] }}
                                <span class="absolute inset-x-0 -bottom-1 h-px origin-left bg-[linear-gradient(90deg,#06b6d4,#a855f7,#eab308)] transition-transform duration-300 {{ $item['active'] ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                            </a>
                        @endforeach
                    </nav>

                    <div class="hidden items-center gap-2 xl:flex">
                        @include('layouts.partials.theme-switch')
                        @include('layouts.partials.google-translate', ['tone' => 'dark'])

                        @auth
                            <a href="{{ route('user.dashboard') }}" class="rounded-full border border-slate-900/10 bg-white px-4 py-2.5 text-sm font-semibold text-slate-900 transition hover:-translate-y-0.5 hover:border-cyan-400/30 dark:border-white/10 dark:bg-white/7 dark:text-white dark:hover:border-cyan-300/30 dark:hover:bg-white/10">Dashboard</a>
                        @else
                            <a href="{{ url('/login') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-900/5 hover:text-slate-950 dark:text-white/72 dark:hover:bg-white/6 dark:hover:text-white">Sign in</a>
                            <a href="{{ url('/register') }}" class="glow-button-primary inline-flex items-center justify-center rounded-full px-5 py-2.5 text-sm font-bold text-slate-950 transition duration-300 hover:-translate-y-0.5">Create account</a>
                        @endauth
                    </div>

                    <div class="flex items-center gap-2 xl:hidden">
                        @include('layouts.partials.theme-switch')
                        <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-900/10 bg-white/70 text-slate-800 backdrop-blur-xl transition hover:bg-white dark:border-white/10 dark:bg-white/7 dark:text-white" @click="open = !open" :aria-expanded="open" aria-controls="mobile-navigation" aria-label="Toggle navigation">
                            <svg x-show="!open" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            <svg x-show="open" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </button>
                    </div>
                </div>

                <div id="mobile-navigation" x-show="open" x-collapse x-cloak class="border-t border-slate-900/8 bg-white/96 xl:hidden dark:border-white/10 dark:bg-[#050816]/96">
                    <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="Mobile navigation">
                        @foreach($primaryNavigation as $item)
                            <a @click="open = false" href="{{ $item['href'] }}" class="rounded-2xl px-4 py-3 text-sm font-semibold transition {{ $item['active'] ? 'bg-cyan-500/10 text-cyan-700 dark:bg-cyan-300/10 dark:text-cyan-200' : 'text-slate-700 hover:bg-slate-900/5 dark:text-white/75 dark:hover:bg-white/6' }}">{{ $item['label'] }}</a>
                        @endforeach

                        <div class="mt-3 grid gap-2 border-t border-slate-900/8 pt-4 sm:grid-cols-2 dark:border-white/10">
                            @auth
                                <a @click="open = false" href="{{ route('user.dashboard') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-950 px-4 py-3 text-sm font-bold text-white dark:bg-white dark:text-slate-950">Dashboard</a>
                            @else
                                <a @click="open = false" href="{{ url('/login') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-900/10 bg-white px-4 py-3 text-sm font-bold text-slate-950 dark:border-white/10 dark:bg-white/6 dark:text-white">Sign in</a>
                                <a @click="open = false" href="{{ url('/register') }}" class="glow-button-primary inline-flex items-center justify-center rounded-2xl px-4 py-3 text-sm font-bold text-slate-950">Create account</a>
                            @endauth
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        @if(session('success') || session('status') || session('error'))
            <div class="relative z-30 mx-auto max-w-7xl px-4 pt-5 sm:px-6 lg:px-8">
                <div class="rounded-2xl border px-4 py-3 text-sm backdrop-blur-xl {{ session('error') ? 'border-red-300/30 bg-red-500/10 text-red-700 dark:text-red-100' : 'border-emerald-300/30 bg-emerald-500/10 text-emerald-700 dark:text-emerald-100' }}">
                    {{ session('error') ?? session('success') ?? session('status') }}
                </div>
            </div>
        @endif

        <main class="relative z-10">
            @yield('content')
        </main>

        <footer class="relative overflow-hidden border-t border-slate-900/8 bg-white text-slate-950 dark:border-white/8 dark:bg-[#02050d] dark:text-white">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_20%_0%,rgba(56,189,248,.10),transparent_32%),radial-gradient(circle_at_80%_12%,rgba(217,70,239,.08),transparent_28%)] dark:bg-[radial-gradient(circle_at_20%_0%,rgba(56,189,248,.14),transparent_32%),radial-gradient(circle_at_80%_12%,rgba(217,70,239,.12),transparent_28%)]"></div>
            <div class="relative mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
                <div class="grid gap-10 border-b border-slate-900/8 pb-12 lg:grid-cols-[1.2fr_.8fr_.8fr] lg:gap-16 dark:border-white/8">
                    <div>
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                            @if(!empty($web?->logo))
                                <span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-2xl border border-slate-900/10 bg-white p-2 dark:border-white/10 dark:bg-white/10">
                                    <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                                </span>
                            @endif
                            <span>
                                <span class="block font-display text-2xl font-bold">{{ $appName }}</span>
                                <span class="block text-[9px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-white/40">Wealth · Assets · Investments</span>
                            </span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-7 text-slate-600 dark:text-white/58">Investment, wealth and asset-management solutions built around long-term objectives, disciplined risk management and thoughtful stewardship.</p>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-700 dark:text-cyan-200">Company</p>
                        <div class="mt-5 grid gap-3 text-sm text-slate-600 dark:text-white/62">
                            <a href="{{ url('/about') }}" class="transition hover:text-slate-950 dark:hover:text-white">About us</a>
                            <a href="{{ url('/services') }}" class="transition hover:text-slate-950 dark:hover:text-white">Services</a>
                            <a href="{{ url('/plans') }}" class="transition hover:text-slate-950 dark:hover:text-white">Investment plans</a>
                            <a href="{{ url('/career') }}" class="transition hover:text-slate-950 dark:hover:text-white">Careers</a>
                            <a href="{{ url('/contact') }}" class="transition hover:text-slate-950 dark:hover:text-white">Contact</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-700 dark:text-fuchsia-200">Information</p>
                        <div class="mt-5 grid gap-3 text-sm text-slate-600 dark:text-white/62">
                            <a href="{{ url('/security') }}" class="transition hover:text-slate-950 dark:hover:text-white">Security</a>
                            <a href="{{ url('/faqs') }}" class="transition hover:text-slate-950 dark:hover:text-white">FAQs</a>
                            <a href="{{ url('/privacy') }}" class="transition hover:text-slate-950 dark:hover:text-white">Privacy</a>
                            <a href="{{ url('/terms') }}" class="transition hover:text-slate-950 dark:hover:text-white">Terms</a>
                            <a href="{{ url('/login') }}" class="transition hover:text-slate-950 dark:hover:text-white">Client portal</a>
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 pt-8 text-xs leading-6 text-slate-400 lg:grid-cols-[1fr_auto] lg:items-end dark:text-white/40">
                    <p class="max-w-4xl">Investments may rise or fall in value. Information on this website is for general information only and should not be treated as personalised investment, legal or tax advice.</p>
                    <p class="whitespace-nowrap">&copy; {{ now()->year }} {{ $appName }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>
    @stack('scripts')

{!! $web->livechat_code !!}

</body>
</html>
