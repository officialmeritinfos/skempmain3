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
            ['label' => 'Legal', 'href' => url('/legal'), 'active' => request()->is('legal')],
            ['label' => 'Services', 'href' => url('/services'), 'active' => request()->is('services') || request()->is('service/*')],
            ['label' => 'Plans', 'href' => url('/plans'), 'active' => request()->is('plans') || request()->is('plan')],
            ['label' => 'Approach', 'href' => url('/#approach'), 'active' => false],
            ['label' => 'Contact', 'href' => url('/contact'), 'active' => request()->is('contact')],
        ];
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0b1b2b">

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
<body class="min-h-screen bg-[#f5f3ed] font-sans text-[#132131] antialiased transition-colors duration-300 dark:bg-[#08111b] dark:text-[#f8f6f0]">
    <div class="min-h-screen overflow-x-clip">
        <div class="relative z-40 bg-[#0b1b2b] text-white">
            <div class="mx-auto flex min-h-9 max-w-7xl items-center justify-between gap-4 px-4 py-2 text-[11px] sm:px-6 lg:px-8">
                <div class="flex min-w-0 items-center gap-3 sm:gap-5">
                    <span class="hidden font-semibold uppercase tracking-[0.18em] text-white/62 sm:inline">Wealth · Assets · Investment Management</span>
                    @if(!empty($web?->email))
                        <a href="mailto:{{ $web->email }}" class="truncate text-white/72 transition hover:text-white">{{ $web->email }}</a>
                    @endif
                    @if(!empty($web?->phone))
                        <a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="hidden text-white/72 transition hover:text-white md:inline">{{ $web->phone }}</a>
                    @endif
                </div>
                <a href="{{ url('/security') }}" class="shrink-0 font-semibold text-white/65 transition hover:text-white">Security</a>
            </div>
        </div>

        <header
            x-data="{ open: false, scrolled: window.scrollY > 12 }"
            x-init="scrolled = window.scrollY > 12"
            @scroll.window="scrolled = window.scrollY > 12"
            @keydown.escape.window="open = false"
            class="sticky top-0 z-50"
        >
            <div
                :class="scrolled ? 'shadow-[0_16px_45px_rgba(15,23,42,.08)] dark:shadow-[0_16px_45px_rgba(0,0,0,.22)]' : ''"
                class="border-b border-[#132131]/8 bg-[#fbfaf7]/95 transition duration-300 dark:border-white/8 dark:bg-[#0b1520]/95"
            >
                <div class="mx-auto flex h-[74px] max-w-7xl items-center justify-between gap-5 px-4 sm:px-6 lg:px-8">
                    <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="{{ $appName }} home">
                        @if(!empty($web?->logo))
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-[#132131]/10 bg-white p-2 dark:border-white/10 dark:bg-white">
                                <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                            </span>
                        @else
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0b1b2b] font-display text-lg font-bold text-white dark:bg-[#e4c38f] dark:text-[#0b1b2b]">
                                {{ strtoupper(substr($appName, 0, 1)) }}
                            </span>
                        @endif
                        <span class="min-w-0">
                            <span class="block truncate font-display text-[17px] font-bold tracking-[-0.025em] text-[#101e2d] sm:text-lg dark:text-white">{{ $appName }}</span>
                            <span class="hidden text-[9px] font-bold uppercase tracking-[0.2em] text-[#6e7782] sm:block dark:text-white/42">Wealth · Assets · Investments</span>
                        </span>
                    </a>

                    <nav class="hidden items-center gap-7 xl:flex" aria-label="Primary navigation">
                        @foreach($primaryNavigation as $item)
                            <a href="{{ $item['href'] }}" class="relative py-2 text-[13px] font-semibold transition {{ $item['active'] ? 'text-[#8a6538] dark:text-[#e4c38f]' : 'text-[#53606d] hover:text-[#0b1b2b] dark:text-white/64 dark:hover:text-white' }}">
                                {{ $item['label'] }}
                                @if($item['active'])
                                    <span class="absolute inset-x-0 -bottom-[19px] h-[2px] bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                                @endif
                            </a>
                        @endforeach
                    </nav>

                    <div class="hidden items-center gap-2 xl:flex">
                        @include('layouts.partials.theme-switch')
                        @include('layouts.partials.google-translate', ['tone' => 'light'])

                        @auth
                            <a href="{{ route('user.dashboard') }}" class="inline-flex h-10 items-center justify-center rounded-xl bg-[#0b1b2b] px-4 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Dashboard</a>
                        @else
                            <a href="{{ url('/login') }}" class="inline-flex h-10 items-center justify-center rounded-xl px-4 text-sm font-semibold text-[#3f4b57] transition hover:bg-[#132131]/5 hover:text-[#0b1b2b] dark:text-white/72 dark:hover:bg-white/7 dark:hover:text-white">Sign in</a>
                            <a href="{{ url('/register') }}" class="inline-flex h-10 items-center justify-center rounded-xl bg-[#0b1b2b] px-5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Create account</a>
                        @endauth
                    </div>

                    <div class="flex items-center gap-2 xl:hidden">
                        @include('layouts.partials.theme-switch')
                        <button
                            type="button"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-[#132131]/10 bg-white text-[#132131] transition hover:bg-[#f3f0e8] dark:border-white/10 dark:bg-white/6 dark:text-white dark:hover:bg-white/10"
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

                <div id="mobile-navigation" x-show="open" x-collapse x-cloak class="border-t border-[#132131]/8 bg-[#fbfaf7] xl:hidden dark:border-white/8 dark:bg-[#0b1520]">
                    <nav class="mx-auto max-w-7xl px-4 py-4 sm:px-6" aria-label="Mobile navigation">
                        <div class="grid gap-1">
                            @foreach($primaryNavigation as $item)
                                <a
                                    @click="open = false"
                                    href="{{ $item['href'] }}"
                                    class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition {{ $item['active'] ? 'bg-[#ece5d7] text-[#7b5a32] dark:bg-[#e4c38f]/10 dark:text-[#e4c38f]' : 'text-[#475462] hover:bg-[#132131]/5 dark:text-white/72 dark:hover:bg-white/6' }}"
                                >
                                    <span>{{ $item['label'] }}</span>
                                    <span aria-hidden="true" class="text-xs opacity-45">→</span>
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-4 border-t border-[#132131]/8 pt-4 dark:border-white/8">
                            @include('layouts.partials.google-translate', ['tone' => 'light', 'fullWidth' => true, 'align' => 'left'])
                            <div class="mt-3 grid gap-2 sm:grid-cols-2">
                                @auth
                                    <a @click="open = false" href="{{ route('user.dashboard') }}" class="inline-flex items-center justify-center rounded-xl bg-[#0b1b2b] px-4 py-3 text-sm font-bold text-white dark:bg-[#e4c38f] dark:text-[#0b1b2b]">Dashboard</a>
                                @else
                                    <a @click="open = false" href="{{ url('/login') }}" class="inline-flex items-center justify-center rounded-xl border border-[#132131]/10 bg-white px-4 py-3 text-sm font-bold text-[#132131] dark:border-white/10 dark:bg-white/6 dark:text-white">Sign in</a>
                                    <a @click="open = false" href="{{ url('/register') }}" class="inline-flex items-center justify-center rounded-xl bg-[#0b1b2b] px-4 py-3 text-sm font-bold text-white dark:bg-[#e4c38f] dark:text-[#0b1b2b]">Create account</a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        @if(session('success') || session('status') || session('error'))
            <div class="relative z-30 mx-auto max-w-7xl px-4 pt-5 sm:px-6 lg:px-8">
                <div class="rounded-xl border px-4 py-3 text-sm {{ session('error') ? 'border-red-200 bg-red-50 text-red-800 dark:border-red-400/20 dark:bg-red-400/10 dark:text-red-100' : 'border-emerald-200 bg-emerald-50 text-emerald-800 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-100' }}">
                    {{ session('error') ?? session('success') ?? session('status') }}
                </div>
            </div>
        @endif

        <main>
            @yield('content')
        </main>

        <footer class="bg-[#0b1b2b] text-white">
            <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
                <div class="grid gap-10 border-b border-white/12 pb-12 lg:grid-cols-[1.25fr_.75fr_.75fr] lg:gap-16">
                    <div>
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                            @if(!empty($web?->logo))
                                <span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-xl bg-white p-2">
                                    <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                                </span>
                            @endif
                            <span>
                                <span class="block font-display text-xl font-bold tracking-[-0.02em]">{{ $appName }}</span>
                                <span class="block text-[9px] font-bold uppercase tracking-[0.2em] text-white/42">Wealth · Assets · Investments</span>
                            </span>
                        </a>
                        <p class="mt-5 max-w-md text-sm leading-7 text-white/60">Investment, wealth and asset-management solutions built around long-term objectives, disciplined risk management and thoughtful stewardship.</p>

                        <div class="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-xs text-white/58">
                            @if(!empty($web?->email))
                                <a href="mailto:{{ $web->email }}" class="transition hover:text-white">{{ $web->email }}</a>
                            @endif
                            @if(!empty($web?->phone))
                                <a href="tel:{{ preg_replace('/\s+/', '', $web->phone) }}" class="transition hover:text-white">{{ $web->phone }}</a>
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#e4c38f]">Company</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/64">
                            <a href="{{ url('/about') }}" class="transition hover:text-white">About us</a>
                            <a href="{{ url('/services') }}" class="transition hover:text-white">Services</a>
                            <a href="{{ url('/plans') }}" class="transition hover:text-white">Investment plans</a>
                            <a href="{{ url('/career') }}" class="transition hover:text-white">Careers</a>
                            <a href="{{ url('/contact') }}" class="transition hover:text-white">Contact</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#e4c38f]">Information</p>
                        <div class="mt-5 grid gap-3 text-sm text-white/64">
                            <a href="{{ url('/security') }}" class="transition hover:text-white">Security</a>
                            <a href="{{ url('/legal') }}" class="transition hover:text-white">Legal</a>
                            <a href="{{ url('/faqs') }}" class="transition hover:text-white">FAQs</a>
                            <a href="{{ url('/privacy') }}" class="transition hover:text-white">Privacy</a>
                            <a href="{{ url('/terms') }}" class="transition hover:text-white">Terms</a>
                            <a href="{{ url('/login') }}" class="transition hover:text-white">Client portal</a>
                        </div>
                    </div>
                </div>

                <div class="grid gap-5 pt-8 text-xs leading-6 text-white/42 lg:grid-cols-[1fr_auto] lg:items-end">
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
