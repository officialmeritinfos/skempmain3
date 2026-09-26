{{-- resources/views/layouts/app.blade.php --}}
@inject('injected', 'App\Defaults\Custom')
    <!DOCTYPE html>
<html lang="en"
      x-data="siteShell()"
      x-init="init()"
      :class="{ 'dark': dark }"
      class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Home' }} - {{ $siteName ?? 'InvestCo' }}</title>
    <meta name="description" content="Comprehensive financial advice and investment services tailored to your needs." />
    <meta property="og:title" content="{{ $siteName ?? 'InvestCo' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og.png') }}" />
    <meta property="og:description" content="Grow, protect, and manage wealth with confidence." />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root{
            /* ===== Premium luminous palette ===== */
            --bg: #fcf8ff;
            --bg-soft: #f6edff;
            --surface: rgba(255,255,255,.78);
            --surface-solid: #fffaff;

            --ink: #1d1726;
            --ink-soft: rgba(29,23,38,.74);
            --muted: rgba(29,23,38,.58);

            --line: rgba(63,34,86,.10);
            --line-strong: rgba(63,34,86,.18);

            --brand: #6d28d9;      /* royal violet */
            --brand-2: #c026d3;    /* luminous fuchsia */
            --brand-3: #a21caf;    /* orchid plum */
            --accent: #e7c98b;     /* champagne */

            --accent-soft: rgba(231,201,139,.18);
            --brand-soft: rgba(109,40,217,.14);
            --brand-soft-2: rgba(192,38,211,.12);

            --shadow-sm: 0 8px 20px rgba(76, 29, 149, .10);
            --shadow-md: 0 18px 40px rgba(76, 29, 149, .16);
            --shadow-lg: 0 28px 70px rgba(76, 29, 149, .22);

            --header-bg: rgba(252,248,255,.72);
            --glass: linear-gradient(180deg, rgba(255,255,255,.80), rgba(255,255,255,.58));

            --hero-a: rgba(109,40,217,.20);
            --hero-b: rgba(192,38,211,.16);
            --hero-c: rgba(231,201,139,.14);
        }

        .dark{
            --bg: #0f0718;
            --bg-soft: #160b24;
            --surface: rgba(24,12,36,.70);
            --surface-solid: #1a1028;

            --ink: #faf5ff;
            --ink-soft: rgba(250,245,255,.78);
            --muted: rgba(250,245,255,.58);

            --line: rgba(255,255,255,.10);
            --line-strong: rgba(255,255,255,.16);

            --brand: #8b5cf6;
            --brand-2: #e879f9;
            --brand-3: #c026d3;
            --accent: #f3d38a;

            --accent-soft: rgba(243,211,138,.16);
            --brand-soft: rgba(139,92,246,.18);
            --brand-soft-2: rgba(232,121,249,.16);

            --shadow-sm: 0 8px 20px rgba(0,0,0,.26);
            --shadow-md: 0 18px 40px rgba(0,0,0,.38);
            --shadow-lg: 0 28px 70px rgba(0,0,0,.52);

            --header-bg: rgba(15,7,24,.72);
            --glass: linear-gradient(180deg, rgba(31,18,48,.82), rgba(31,18,48,.58));

            --hero-a: rgba(139,92,246,.18);
            --hero-b: rgba(232,121,249,.14);
            --hero-c: rgba(243,211,138,.10);
        }

        [x-cloak]{ display: none !important; }

        html, body{
            background: var(--bg);
            color: var(--ink);
        }

        body{
            min-height: 100vh;
            font-feature-settings: "cv02","cv03","cv04","cv11";
        }

        .site-bg{
            background:
                radial-gradient(720px 420px at 8% -8%, var(--hero-a), transparent 60%),
                radial-gradient(700px 420px at 92% 0%, var(--hero-b), transparent 58%),
                radial-gradient(580px 420px at 50% 110%, var(--hero-c), transparent 62%),
                linear-gradient(180deg, var(--bg), var(--bg-soft) 52%, var(--bg));
        }

        .site-stars::before{
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .14;
            background-image:
                radial-gradient(1px 1px at 20% 30%, rgba(109,40,217,.11) 60%, transparent 62%),
                radial-gradient(1px 1px at 70% 40%, rgba(192,38,211,.10) 60%, transparent 62%),
                radial-gradient(1px 1px at 40% 80%, rgba(109,40,217,.08) 60%, transparent 62%),
                radial-gradient(1px 1px at 85% 65%, rgba(231,201,139,.10) 60%, transparent 62%);
            background-size: 560px 560px, 760px 760px, 680px 680px, 860px 860px;
            background-repeat: repeat;
        }

        .dark .site-stars::before{
            opacity: .09;
            background-image:
                radial-gradient(1px 1px at 20% 30%, rgba(250,245,255,.20) 60%, transparent 62%),
                radial-gradient(1px 1px at 70% 40%, rgba(232,121,249,.18) 60%, transparent 62%),
                radial-gradient(1px 1px at 40% 80%, rgba(139,92,246,.16) 60%, transparent 62%),
                radial-gradient(1px 1px at 85% 65%, rgba(243,211,138,.14) 60%, transparent 62%);
            mix-blend-mode: screen;
        }

        .site-header{
            position: sticky;
            top: 0;
            z-index: 50;
            background: var(--header-bg);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--line);
            box-shadow: var(--shadow-sm);
        }

        .glass-card{
            background: var(--glass);
            backdrop-filter: blur(16px);
            border: 1px solid var(--line);
            box-shadow:
                0 12px 30px rgba(76,29,149,.12),
                0 0 0 1px rgba(255,255,255,.04),
                inset 0 1px 0 rgba(255,255,255,.08);
        }

        .nav-pill{
            background: var(--glass);
            border: 1px solid var(--line);
            backdrop-filter: blur(16px);
            box-shadow:
                0 12px 30px rgba(76,29,149,.12),
                0 0 0 1px rgba(255,255,255,.04),
                inset 0 1px 0 rgba(255,255,255,.08);
        }

        .dropdown-panel{
            background: var(--surface-solid);
            border: 1px solid var(--line);
            backdrop-filter: blur(18px);
            box-shadow:
                0 24px 60px rgba(76,29,149,.20),
                0 0 0 1px rgba(255,255,255,.05),
                inset 0 1px 0 rgba(255,255,255,.08);
        }

        .mobile-panel{
            background: rgba(255,255,255,.66);
            backdrop-filter: blur(18px);
            border-top: 1px solid var(--line);
            box-shadow: var(--shadow-md);
        }

        .dark .mobile-panel{
            background: rgba(26,16,40,.82);
        }

        .nav-link{
            color: var(--ink-soft);
            transition: .2s ease;
        }

        .nav-link:hover{
            color: var(--ink);
            background: var(--brand-soft);
        }

        .menu-button,
        .theme-toggle{
            border: 1px solid var(--line);
            background: var(--surface);
            color: var(--ink);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(14px);
        }

        .menu-button:hover,
        .theme-toggle:hover{
            background: var(--surface-solid);
        }

        .btn-primary{
            color: #fff;
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-2) 55%, var(--brand-3) 100%);
            box-shadow:
                0 10px 24px rgba(109,40,217,.28),
                0 0 0 1px rgba(255,255,255,.06),
                0 0 30px rgba(192,38,211,.18);
        }

        .btn-primary:hover{
            filter: brightness(1.06);
            box-shadow:
                0 16px 34px rgba(109,40,217,.34),
                0 0 0 1px rgba(255,255,255,.08),
                0 0 40px rgba(192,38,211,.24);
        }

        .btn-secondary{
            color: var(--ink);
            background: var(--surface);
            border: 1px solid var(--line);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(14px);
        }

        .btn-secondary:hover{
            background: var(--surface-solid);
        }

        .brand-text{
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-2) 58%, var(--accent) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .premium-ring{
            box-shadow:
                0 0 0 1px rgba(255,255,255,.05),
                0 0 20px rgba(192,38,211,.12);
        }

        .section-link{
            color: var(--ink-soft);
            transition: .2s ease;
        }

        .section-link:hover{
            color: var(--ink);
            transform: translateX(2px);
        }

        .mobile-link{
            border: 1px solid var(--line);
            background: transparent;
            color: var(--ink);
        }

        .mobile-link:hover{
            background: var(--brand-soft);
        }

        .footer-wrap{
            border-top: 1px solid var(--line);
            background: linear-gradient(180deg, transparent, rgba(255,255,255,.02));
        }

        .footer-topline{
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, var(--brand) 20%, var(--brand-2) 50%, var(--accent) 80%, transparent 100%);
            opacity: .9;
        }

        .telegram-float-widget{
            position: fixed;
            left: 14px;
            bottom: 90px;
            z-index: 9999;
        }

        @media (max-width: 767px){
            .telegram-float-widget{
                bottom: 84px;
            }
        }
    </style>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('home/images/'.$web->logo) }}" />
    @stack('css')
</head>
<body class="antialiased">
<div class="relative min-h-screen flex flex-col">
    <div class="absolute inset-0 -z-10 site-bg site-stars"></div>

    {{-- HEADER --}}
    <header class="site-header">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex min-h-[74px] items-center justify-between gap-4">
                <div class="flex min-w-0 items-center gap-3">
                    <a href="{{ url('/') }}" class="inline-flex min-w-0 items-center gap-3">
                        <img src="{{ asset('home/images/'.$web->logo) }}"
                             alt="{{ $siteName ?? 'InvestCo' }}"
                             class="h-12 w-auto rounded-xl premium-ring"
                             loading="eager">
                        <div class="min-w-0">
                            <div class="hidden sm:block text-xs" style="color: var(--muted);">
                                Wealth, advisory and premium client solutions
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Desktop right --}}
                <div class="hidden md:flex items-center gap-2">
                    <button type="button"
                            @click="toggleTheme()"
                            class="theme-toggle inline-flex h-10 w-10 items-center justify-center rounded-full"
                            :aria-label="dark ? 'Switch to light mode' : 'Switch to dark mode'">
                        <svg x-show="!dark" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2.2M12 19.8V22M4.93 4.93l1.56 1.56M17.51 17.51l1.56 1.56M2 12h2.2M19.8 12H22M4.93 19.07l1.56-1.56M17.51 6.49l1.56-1.56"></path>
                        </svg>
                        <svg x-show="dark" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3c0 .34-.02.67-.02 1a7 7 0 0 0 8.81 6.79Z"></path>
                        </svg>
                    </button>

                    <a href="{{ route('login') }}"
                       class="btn-secondary inline-flex items-center rounded-full px-4 py-2 text-sm font-medium">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="btn-primary inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold">
                        Create Account
                    </a>
                </div>

                {{-- Mobile right --}}
                <div class="md:hidden flex items-center gap-2">
                    <button type="button"
                            @click="toggleTheme()"
                            class="theme-toggle inline-flex h-10 w-10 items-center justify-center rounded-full"
                            :aria-label="dark ? 'Switch to light mode' : 'Switch to dark mode'">
                        <svg x-show="!dark" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2.2M12 19.8V22M4.93 4.93l1.56 1.56M17.51 17.51l1.56 1.56M2 12h2.2M19.8 12H22M4.93 19.07l1.56-1.56M17.51 6.49l1.56-1.56"></path>
                        </svg>
                        <svg x-show="dark" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3c0 .34-.02.67-.02 1a7 7 0 0 0 8.81 6.79Z"></path>
                        </svg>
                    </button>

                    <button type="button"
                            class="menu-button inline-flex h-10 w-10 items-center justify-center rounded-full"
                            @click="mobileMenu = !mobileMenu"
                            :aria-expanded="mobileMenu.toString()"
                            aria-label="Toggle menu">
                        <svg x-show="!mobileMenu" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M4 7h16M4 12h16M4 17h16"></path>
                        </svg>
                        <svg x-show="mobileMenu" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M6 6l12 12M18 6l-12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Desktop navigation --}}
        <div class="hidden md:flex justify-center pb-4">
            <div class="nav-pill rounded-full px-2 py-2">
                <nav class="flex items-center gap-1">
                    <a href="{{ url('/') }}" class="nav-link rounded-full px-4 py-2 text-sm font-medium">Home</a>
                    <a href="{{ url('about') }}" class="nav-link rounded-full px-4 py-2 text-sm font-medium">About</a>

                    <div x-data="navDrop()" class="relative">
                        <button @click.prevent="toggle()"
                                class="nav-link inline-flex items-center gap-1 rounded-full px-4 py-2 text-sm font-medium">
                            Services
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.1 1.02l-4.25 4.5a.75.75 0 0 1-1.1 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"/>
                            </svg>
                        </button>

                        <div x-cloak
                             x-show="open"
                             x-transition.origin.top
                             @click.outside="open = false"
                             class="dropdown-panel absolute left-1/2 top-full z-50 mt-3 w-[760px] -translate-x-1/2 rounded-3xl p-3">
                            <div class="grid grid-cols-3 gap-3">
                                @foreach($injected->getServices() as $service)
                                    <a href="{{ route('service.details', ['id' => $service->id]) }}"
                                       class="rounded-2xl px-4 py-4 transition hover:bg-[var(--brand-soft)]">
                                        <div class="flex items-start justify-between gap-3">
                                            <div>
                                                <div class="text-sm font-semibold" style="color: var(--ink);">
                                                    {{ $service->title }}
                                                </div>
                                                <div class="mt-1 text-xs" style="color: var(--muted);">
                                                    Explore this solution
                                                </div>
                                            </div>
                                            <svg class="mt-0.5 h-4 w-4 shrink-0" style="color: var(--muted);" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M7.22 4.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L10.94 9 7.22 5.28a.75.75 0 0 1 0-1.06Z"/>
                                            </svg>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div x-data="navDrop()" class="relative">
                        <button @click.prevent="toggle()"
                                class="nav-link inline-flex items-center gap-1 rounded-full px-4 py-2 text-sm font-medium">
                            Pages
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.1 1.02l-4.25 4.5a.75.75 0 0 1-1.1 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"/>
                            </svg>
                        </button>

                        <div x-cloak
                             x-show="open"
                             x-transition.origin.top
                             @click.outside="open = false"
                             class="dropdown-panel absolute left-1/2 top-full z-50 mt-3 w-[460px] -translate-x-1/2 rounded-3xl p-3">
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ url('plans') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">Plans</a>
                                <a href="{{ url('faqs') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">FAQs</a>
                                <a href="{{ url('terms') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">Terms</a>
                                <a href="{{ url('privacy') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">Privacy</a>
                            </div>
                        </div>
                    </div>

                    <div x-data="navDrop()" class="relative">
                        <button @click.prevent="toggle()"
                                class="nav-link inline-flex items-center gap-1 rounded-full px-4 py-2 text-sm font-medium">
                            Panel
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.1 1.02l-4.25 4.5a.75.75 0 0 1-1.1 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"/>
                            </svg>
                        </button>

                        <div x-cloak
                             x-show="open"
                             x-transition.origin.top
                             @click.outside="open = false"
                             class="dropdown-panel absolute left-1/2 top-full z-50 mt-3 w-[320px] -translate-x-1/2 rounded-3xl p-3">
                            <div class="grid grid-cols-1 gap-2">
                                @guest
                                    <a href="{{ route('login') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">Login</a>
                                    <a href="{{ route('register') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">Register</a>
                                @endguest
                                @auth
                                    <a href="{{ route('user.dashboard') }}" class="rounded-2xl px-4 py-3 hover:bg-[var(--brand-soft)]">Dashboard</a>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('contact') }}" class="nav-link rounded-full px-4 py-2 text-sm font-medium">Contact</a>
                </nav>
            </div>
        </div>

        {{-- Mobile normal menu --}}
        <div x-cloak x-show="mobileMenu" x-collapse class="md:hidden mobile-panel">
            <div class="mx-auto max-w-7xl px-4 py-4">
                <nav class="space-y-3">
                    <a href="{{ url('/') }}" class="mobile-link block rounded-2xl px-4 py-3 text-sm font-medium">Home</a>
                    <a href="{{ url('about') }}" class="mobile-link block rounded-2xl px-4 py-3 text-sm font-medium">About</a>

                    <div class="glass-card rounded-2xl overflow-hidden">
                        <button @click="mobileSections.services = !mobileSections.services"
                                class="flex w-full items-center justify-between px-4 py-3 text-left text-sm font-medium">
                            <span>Services</span>
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': mobileSections.services }" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.1 1.02l-4.25 4.5a.75.75 0 0 1-1.1 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"/>
                            </svg>
                        </button>
                        <div x-show="mobileSections.services" x-collapse class="px-3 pb-3">
                            <div class="grid grid-cols-1 gap-2">
                                @foreach($injected->getServices() as $service)
                                    <a href="{{ route('service.details', ['id' => $service->id]) }}"
                                       class="mobile-link rounded-xl px-4 py-3 text-sm">
                                        {{ $service->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="glass-card rounded-2xl overflow-hidden">
                        <button @click="mobileSections.pages = !mobileSections.pages"
                                class="flex w-full items-center justify-between px-4 py-3 text-left text-sm font-medium">
                            <span>Pages</span>
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': mobileSections.pages }" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.1 1.02l-4.25 4.5a.75.75 0 0 1-1.1 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"/>
                            </svg>
                        </button>
                        <div x-show="mobileSections.pages" x-collapse class="px-3 pb-3">
                            <div class="grid grid-cols-1 gap-2">
                                <a href="{{ url('plans') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">Plans</a>
                                <a href="{{ url('faqs') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">FAQs</a>
                                <a href="{{ url('terms') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">Terms</a>
                                <a href="{{ url('privacy') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">Privacy</a>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card rounded-2xl overflow-hidden">
                        <button @click="mobileSections.panel = !mobileSections.panel"
                                class="flex w-full items-center justify-between px-4 py-3 text-left text-sm font-medium">
                            <span>Panel</span>
                            <svg class="h-4 w-4 transition" :class="{ 'rotate-180': mobileSections.panel }" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.1 1.02l-4.25 4.5a.75.75 0 0 1-1.1 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"/>
                            </svg>
                        </button>
                        <div x-show="mobileSections.panel" x-collapse class="px-3 pb-3">
                            <div class="grid grid-cols-1 gap-2">
                                @guest
                                    <a href="{{ route('login') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">Login</a>
                                    <a href="{{ route('register') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">Register</a>
                                @endguest
                                @auth
                                    <a href="{{ route('user.dashboard') }}" class="mobile-link rounded-xl px-4 py-3 text-sm">Dashboard</a>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('contact') }}" class="mobile-link block rounded-2xl px-4 py-3 text-sm font-medium">Contact</a>

                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <a href="{{ route('login') }}" class="btn-secondary rounded-2xl px-4 py-3 text-center text-sm font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-primary rounded-2xl px-4 py-3 text-center text-sm font-semibold">
                            Create Account
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    {{-- BODY --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer-wrap mt-20">
        <div class="footer-topline"></div>

        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <div>
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                        <img src="{{ asset('home/images/'.$web->logo) }}"
                             alt="{{ $siteName ?? 'InvestCo' }}"
                             class="h-10 w-auto rounded-xl premium-ring">
                        <span class="text-sm font-semibold brand-text">
                            {{ $siteName ?? 'InvestCo' }}
                        </span>
                    </a>

                    <p class="mt-4 text-sm leading-6" style="color: var(--muted);">
                        {{ $siteName ?? 'InvestCo' }} helps you grow, protect, and manage wealth with a modern, trusted, and data-driven approach.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.18em]" style="color: var(--ink);">
                        Quick Links
                    </h3>
                    <ul class="mt-4 space-y-3 text-sm">
                        <li><a class="section-link inline-block" href="{{ url('/') }}">Home</a></li>
                        <li><a class="section-link inline-block" href="{{ url('about') }}">About</a></li>
                        <li><a class="section-link inline-block" href="{{ url('contact') }}">Contact</a></li>
                        @guest
                            <li><a class="section-link inline-block" href="{{ route('login') }}">Login</a></li>
                            <li><a class="section-link inline-block" href="{{ route('register') }}">Create Account</a></li>
                        @endguest
                        @auth
                            <li><a class="section-link inline-block" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        @endauth
                        <li><a class="section-link inline-block" href="{{ asset('certificate.pdf') }}" target="_blank">Company Profile</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.18em]" style="color: var(--ink);">
                        Pages
                    </h3>
                    <ul class="mt-4 space-y-3 text-sm">
                        <li><a class="section-link inline-block" href="{{ url('plans') }}">Plans</a></li>
                        <li><a class="section-link inline-block" href="{{ url('faqs') }}">FAQs</a></li>
                        <li><a class="section-link inline-block" href="{{ url('terms') }}">Terms &amp; Conditions</a></li>
                        <li><a class="section-link inline-block" href="{{ url('privacy') }}">Privacy Policy</a></li>
                    </ul>

                    @php($services = $injected->getServices())
                    @if($services && count($services))
                        <h4 class="mt-6 text-xs font-semibold uppercase tracking-[0.18em]" style="color: var(--muted);">
                            Top Services
                        </h4>
                        <ul class="mt-3 space-y-3 text-sm">
                            @foreach($services->take(5) as $service)
                                <li>
                                    <a class="section-link inline-block"
                                       href="{{ route('service.details', ['id' => $service->id]) }}">
                                        {{ $service->title }}
                                    </a>
                                </li>
                            @endforeach

                            @if($services->count() > 5)
                                <li>
                                    <a class="section-link inline-flex items-center gap-1"
                                       href="{{ url('services') }}">
                                        View all services
                                        <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M7.22 4.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L10.94 9 7.22 5.28a.75.75 0 0 1 0-1.06Z"/>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.18em]" style="color: var(--ink);">
                        Contact
                    </h3>
                    <ul class="mt-4 space-y-4 text-sm">
                        @if(!empty($web->phone))
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.18 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.72c.12.9.34 1.77.66 2.6a2 2 0 0 1-.45 2.11L8.1 9.9a16 16 0 0 0 6 6l1.47-1.2a2 2 0 0 1 2.11-.45c.83.32 1.7.54 2.6.66A2 2 0 0 1 22 16.92z"/>
                                </svg>
                                <a href="https://wa.me/{{ $web->phone }}" target="_blank" class="section-link break-all">
                                    {{ $web->phone }}
                                </a>
                            </li>
                        @endif



                        @isset($web->email)
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M4 4h16v16H4z"/><path d="M22 6 12 13 2 6"/>
                                </svg>
                                <a href="mailto:{{ $web->email }}" class="section-link break-all">
                                    {{ $web->email }}
                                </a>
                            </li>
                        @endisset

                        @isset($web->address)
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 21s-7-6.3-7-11a7 7 0 0 1 14 0c0 4.7-7 11-7 11z"/><circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span style="color: var(--ink-soft);">{{ $web->address }}</span>
                            </li>
                        @endisset

                            <li class="flex items-start gap-3">
                                <a href="{{ asset('certificates.jpeg') }}" target="_blank">
                                    <img src="{{ asset('certificates.jpeg') }}" style="width:150px;"/>
                                </a>
                            </li>

                    </ul>
                </div>
            </div>

            <div class="mt-10 border-t pt-6" style="border-color: var(--line);">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <p class="text-xs" style="color: var(--muted);">
                        © {{ '2014 - ' . date('Y') }} {{ $siteName ?? 'InvestCo' }}. All rights reserved.
                    </p>

                    <div class="flex items-center gap-5 text-xs">
                        <a href="{{ url('terms') }}" class="section-link">Terms</a>
                        <a href="{{ url('privacy') }}" class="section-link">Privacy</a>
                        <a href="{{ url('contact') }}" class="section-link">Support</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="{{ route('register') }}"
       class="btn-primary md:hidden fixed bottom-5 right-5 z-40 inline-flex h-14 w-14 items-center justify-center rounded-full"
       aria-label="Create account">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 5v14M5 12h14"/>
        </svg>
    </a>
</div>

@if($web->phone)
    <div class="telegram-float-widget">
        <a href="https://wa.me/{{ $web->phone }}" target="_blank">
            <img src="https://cdn2.iconfinder.com/data/icons/social-media-applications/64/social_media_applications_23-whatsapp-256.png"
                 alt="WhatsApp"
                 width="50">
        </a>
    </div>
@endif

<div class="gtranslate_wrapper"></div>
<script>
    window.gtranslateSettings = {
        default_language: "en",
        wrapper_selector: ".gtranslate_wrapper"
    };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

<script>
    function siteShell(){
        return {
            dark: false,
            mobileMenu: false,
            mobileSections: {
                services: false,
                pages: false,
                panel: false,
            },

            init(){
                const saved = localStorage.getItem('theme');

                if(saved === 'dark'){
                    this.dark = true;
                }else if(saved === 'light'){
                    this.dark = false;
                }else{
                    this.dark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                }

                this.syncTheme();

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                    if(!localStorage.getItem('theme')){
                        this.dark = e.matches;
                        this.syncTheme();
                    }
                });
            },

            toggleTheme(){
                this.dark = !this.dark;
                localStorage.setItem('theme', this.dark ? 'dark' : 'light');
                this.syncTheme();
            },

            syncTheme(){
                document.documentElement.classList.toggle('dark', this.dark);
            }
        }
    }

    function navDrop(){
        return {
            open: false,
            toggle(){
                this.open = !this.open;
            }
        }
    }
</script>

@stack('js')

{!! $web->livechat_code !!}

</body>
</html>
