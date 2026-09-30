<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $appName = config('app.name');
        $user = auth()->user();
        $userInitials = collect(preg_split('/\s+/', trim((string) ($user?->name ?? $user?->username ?? 'U'))))
            ->filter()
            ->take(2)
            ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
            ->implode('');

        $primaryNav = [
            ['label' => 'Dashboard', 'route' => 'user.dashboard', 'active' => ['user.dashboard'], 'icon' => 'home'],
            ['label' => 'Investments', 'route' => 'investment.index', 'active' => ['investment.*', 'invest_detail', 'new_investment'], 'icon' => 'chart'],
            ['label' => 'Deposits', 'route' => 'deposit.index', 'active' => ['deposit.*', 'deposits.*', 'deposit_detail', 'new_deposit'], 'icon' => 'deposit'],
            ['label' => 'Withdrawals', 'route' => 'withdrawal.index', 'active' => ['withdrawal.*', 'withdraw.*', 'new_withdrawal'], 'icon' => 'withdraw'],
            ['label' => 'Transfers', 'route' => 'transfer.index', 'active' => ['transfer.*'], 'icon' => 'transfer'],
        ];

        $serviceNav = [
            ['label' => 'Managed Accounts', 'route' => 'subtrade.index', 'active' => ['subtrade.*'], 'icon' => 'briefcase'],
            ['label' => 'Cards', 'route' => 'cards.index', 'active' => ['cards.*', 'card.*'], 'icon' => 'card'],
            ['label' => 'Financing', 'route' => 'loans.index', 'active' => ['loans.*'], 'icon' => 'finance'],
//            ['label' => 'Membership', 'route' => 'membership.index', 'active' => ['membership.*'], 'icon' => 'badge'],
//            ['label' => 'Wallet Connect', 'route' => 'wallet.connect.index', 'active' => ['wallet.connect.*'], 'icon' => 'wallet'],
            ['label' => 'Referrals', 'route' => 'referral.index', 'active' => ['referral.*'], 'icon' => 'users'],
            ['label' => 'KYC', 'route' => 'setting.kyc', 'active' => ['setting.kyc', 'kyc.*'], 'icon' => 'shield'],
        ];
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#08171d">

    <title>@yield('title', 'Dashboard') — {{ $appName }}</title>

    @if(setting('favicon'))
        <link rel="icon" type="image/png" href="{{ asset(setting('favicon')) }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('head')
</head>

<body
    x-data="dashboardShell()"
    x-init="init()"
    class="min-h-screen bg-paper-100 font-sans text-ink-950 antialiased transition-colors duration-300 dark:bg-[#071217] dark:text-white"
>
    <div class="min-h-screen lg:pl-[284px]">
        {{-- Desktop sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-40 hidden w-[284px] flex-col overflow-hidden border-r border-white/8 bg-ink-950 text-white lg:flex">
            <div class="flex h-[82px] shrink-0 items-center border-b border-white/8 px-6">
                <a href="{{ route('user.dashboard') }}" class="group flex min-w-0 items-center gap-3">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-bronze-300/25 bg-bronze-300/10 font-display text-xl font-semibold text-bronze-300 transition duration-300 group-hover:bg-bronze-300/15">
                        {{ strtoupper(substr($appName, 0, 1)) }}
                    </span>
                    <span class="min-w-0">
                        <span class="block truncate text-[15px] font-semibold tracking-[-0.01em]">{{ $appName }}</span>
                        <span class="mt-0.5 block text-[9px] font-bold uppercase tracking-[0.22em] text-white/35">Client portfolio</span>
                    </span>
                </a>
            </div>

            <div class="no-scrollbar flex-1 overflow-y-auto px-4 py-6">
                <p class="px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-white/28">Portfolio</p>
                <nav class="mt-3 space-y-1" aria-label="Portfolio navigation">
                    @foreach($primaryNav as $item)
                        @php $isActive = collect($item['active'])->contains(fn ($pattern) => request()->routeIs($pattern)); @endphp
                        <a
                            href="{{ route($item['route']) }}"
                            class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold transition duration-200 {{ $isActive ? 'bg-white/10 text-white shadow-sm' : 'text-white/55 hover:bg-white/5 hover:text-white' }}"
                        >
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl {{ $isActive ? 'bg-bronze-300 text-ink-950' : 'bg-white/5 text-white/60 group-hover:bg-white/8 group-hover:text-white' }} transition">
                                @include('layouts.partials.user-nav-icon', ['icon' => $item['icon']])
                            </span>
                            <span>{{ $item['label'] }}</span>
                            @if($isActive)
                                <span class="ml-auto h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                            @endif
                        </a>
                    @endforeach
                </nav>

                <p class="mt-8 px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-white/28">Services & access</p>
                <nav class="mt-3 space-y-1" aria-label="Services navigation">
                    @foreach($serviceNav as $item)
                        @php $isActive = collect($item['active'])->contains(fn ($pattern) => request()->routeIs($pattern)); @endphp
                        <a
                            href="{{ route($item['route']) }}"
                            class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition duration-200 {{ $isActive ? 'bg-white/10 text-white' : 'text-white/48 hover:bg-white/5 hover:text-white' }}"
                        >
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/5 text-white/55 transition group-hover:bg-white/8 group-hover:text-white">
                                @include('layouts.partials.user-nav-icon', ['icon' => $item['icon']])
                            </span>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>

            <div class="shrink-0 border-t border-white/8 p-4">
                <a href="{{ route('setting.index') }}" class="flex items-center gap-3 rounded-2xl border border-white/8 bg-white/[0.035] p-3 transition hover:bg-white/[0.065]">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-bronze-300/12 text-xs font-bold text-bronze-300">{{ $userInitials ?: 'U' }}</span>
                    <span class="min-w-0 flex-1">
                        <span class="block truncate text-xs font-semibold text-white/85">{{ $user?->name ?? $user?->username }}</span>
                        <span class="mt-0.5 block truncate text-[10px] text-white/35">{{ $user?->email }}</span>
                    </span>
                    <svg class="h-4 w-4 shrink-0 text-white/25" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="m7.5 5 5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </aside>

        {{-- Topbar --}}
        <header class="sticky top-0 z-30 border-b border-ink-950/8 bg-paper-100/88 backdrop-blur-xl dark:border-white/8 dark:bg-[#071217]/88">
            <div class="mx-auto flex h-[72px] max-w-[1540px] items-center justify-between gap-4 px-4 sm:px-6 lg:h-[82px] lg:px-8">
                <div class="flex min-w-0 items-center gap-3">
                    <button
                        type="button"
                        @click="mobileMenuOpen = true"
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-ink-950/10 bg-white text-ink-950 shadow-sm lg:hidden dark:border-white/10 dark:bg-white/5 dark:text-white"
                        aria-label="Open navigation"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 7h14M5 12h14M5 17h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>

                    <div class="min-w-0">
                        <p class="truncate text-sm font-bold text-ink-950 dark:text-white sm:text-base">@yield('page_heading', $pageName ?? 'Dashboard')</p>
                        <p class="mt-0.5 hidden text-[10px] font-medium text-ink-600 dark:text-white/38 sm:block">Secure client workspace</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-3">
                    @include('layouts.partials.google-translate')

                    <button
                        type="button"
                        @click="toggleTheme()"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-ink-950/10 bg-white text-ink-700 shadow-sm transition hover:border-ink-950/15 dark:border-white/10 dark:bg-white/5 dark:text-white/65"
                        :aria-label="theme === 'dark' ? 'Switch to light theme' : 'Switch to dark theme'"
                    >
                        <svg x-show="theme !== 'dark'" class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M20.5 15.2A8.5 8.5 0 0 1 8.8 3.5 8.5 8.5 0 1 0 20.5 15.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                        </svg>
                        <svg x-show="theme === 'dark'" x-cloak class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </button>

                    <div x-data="{ open: false }" class="relative">
                        <button type="button" @click="open = !open" class="flex items-center gap-2 rounded-xl border border-ink-950/10 bg-white p-1.5 pr-2.5 shadow-sm transition hover:border-ink-950/15 dark:border-white/10 dark:bg-white/5">
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-ink-950 text-[10px] font-bold text-bronze-300 dark:bg-bronze-300 dark:text-ink-950">{{ $userInitials ?: 'U' }}</span>
                            <span class="hidden max-w-28 truncate text-xs font-semibold text-ink-950 dark:text-white sm:block">{{ $user?->username ?? $user?->name }}</span>
                            <svg class="hidden h-3.5 w-3.5 text-ink-600 sm:block dark:text-white/40" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m6 8 4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>

                        <div x-show="open" x-cloak @click.outside="open=false" x-transition.opacity class="absolute right-0 mt-2 w-56 overflow-hidden rounded-2xl border border-ink-950/10 bg-white p-2 shadow-2xl dark:border-white/10 dark:bg-ink-900">
                            <div class="border-b border-ink-950/8 px-3 py-2.5 dark:border-white/8">
                                <p class="truncate text-xs font-bold text-ink-950 dark:text-white">{{ $user?->name ?? $user?->username }}</p>
                                <p class="mt-0.5 truncate text-[10px] text-ink-600 dark:text-white/40">{{ $user?->email }}</p>
                            </div>
                            <a href="{{ route('setting.index') }}" class="mt-1 flex items-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-ink-700 transition hover:bg-paper-100 dark:text-white/65 dark:hover:bg-white/5">Account settings</a>
                            @if($user?->is_admin == 1)
                                <a href="{{ route('admin.admin.dashboard') }}" class="flex items-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-ink-700 transition hover:bg-paper-100 dark:text-white/65 dark:hover:bg-white/5">Admin dashboard</a>
                            @endif
                            <a href="{{ url('account/logout') }}" class="flex items-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-red-600 transition hover:bg-red-50 dark:text-red-300 dark:hover:bg-red-500/10">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Main content --}}
        <main class="min-w-0 pb-24 lg:pb-10">
            <div class="mx-auto w-full max-w-[1540px] px-4 py-5 sm:px-6 sm:py-7 lg:px-8 lg:py-8">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Mobile navigation / menu --}}
    @include('layouts.user-bottom-nav')

    {{-- Mobile full menu drawer --}}
    <div x-show="mobileMenuOpen" x-cloak class="fixed inset-0 z-[80] lg:hidden" @keydown.escape.window="mobileMenuOpen = false">
        <div x-show="mobileMenuOpen" x-transition.opacity class="absolute inset-0 bg-ink-950/65 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>
        <aside
            x-show="mobileMenuOpen"
            x-transition:enter="transition duration-300 ease-out"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-250 ease-in"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="absolute inset-y-0 left-0 flex w-[88%] max-w-sm flex-col bg-ink-950 text-white shadow-2xl"
        >
            <div class="flex h-[72px] items-center justify-between border-b border-white/8 px-5">
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-bronze-300/25 bg-bronze-300/10 font-display text-lg text-bronze-300">{{ strtoupper(substr($appName, 0, 1)) }}</span>
                    <div>
                        <p class="text-sm font-semibold">{{ $appName }}</p>
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-white/32">Client portfolio</p>
                    </div>
                </a>
                <button type="button" @click="mobileMenuOpen = false" class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/5 text-white/65" aria-label="Close navigation">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                </button>
            </div>

            <div class="no-scrollbar flex-1 overflow-y-auto px-4 py-5">
                <p class="px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-white/28">Portfolio</p>
                <nav class="mt-2 space-y-1">
                    @foreach($primaryNav as $item)
                        @php $isActive = collect($item['active'])->contains(fn ($pattern) => request()->routeIs($pattern)); @endphp
                        <a @click="mobileMenuOpen = false" href="{{ route($item['route']) }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold {{ $isActive ? 'bg-white/10 text-white' : 'text-white/58' }}">
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ $isActive ? 'bg-bronze-300 text-ink-950' : 'bg-white/5' }}">@include('layouts.partials.user-nav-icon', ['icon' => $item['icon']])</span>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <p class="mt-7 px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-white/28">Services & access</p>
                <nav class="mt-2 space-y-1">
                    @foreach($serviceNav as $item)
                        @php $isActive = collect($item['active'])->contains(fn ($pattern) => request()->routeIs($pattern)); @endphp
                        <a @click="mobileMenuOpen = false" href="{{ route($item['route']) }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium {{ $isActive ? 'bg-white/10 text-white' : 'text-white/50' }}">
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">@include('layouts.partials.user-nav-icon', ['icon' => $item['icon']])</span>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="mt-7 border-t border-white/8 pt-4">
                    <a href="{{ route('setting.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-white/55">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">@include('layouts.partials.user-nav-icon', ['icon' => 'settings'])</span>
                        Settings
                    </a>
                    @if($user?->is_admin == 1)
                        <a href="{{ route('admin.admin.dashboard') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-white/55">
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">@include('layouts.partials.user-nav-icon', ['icon' => 'shield'])</span>
                            Admin
                        </a>
                    @endif
                    <a href="{{ url('account/logout') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold text-red-300">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-500/10">@include('layouts.partials.user-nav-icon', ['icon' => 'logout'])</span>
                        Sign out
                    </a>
                </div>
            </div>
        </aside>
    </div>

    {{-- Google Translate's native control stays hidden; branded selector in the topbar drives it. --}}
    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
        function dashboardShell() {
            return {
                mobileMenuOpen: false,
                theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
                init() {
                    document.documentElement.classList.toggle('dark', this.theme === 'dark');
                },
                toggleTheme() {
                    this.theme = this.theme === 'dark' ? 'light' : 'dark';
                    document.documentElement.classList.toggle('dark', this.theme === 'dark');
                    localStorage.setItem('theme', this.theme);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (window.toastr) {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 3000,
                    positionClass: 'toast-top-right',
                    preventDuplicates: true,
                    showDuration: 300,
                    hideDuration: 1000,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut'
                };
            }
        });
    </script>

    @stack('scripts')

    {!! $web->livechat_code !!}


</body>
</html>
