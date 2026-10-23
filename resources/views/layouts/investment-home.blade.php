@php
    $brandName = $siteName ?? $web?->name ?? config('app.name');
    $brandLogo = asset('home/images/' . ($web?->logo ?: 'logo.png'));
    $brandIcon = asset('home/images/' . ($web?->favicon ?: ($web?->logo ?: 'logo.png')));
    $isHome = request()->is('/') || request()->is('index');
    $companyLinks = [
        ['label' => 'About us', 'path' => '/about', 'active' => request()->is('about')],
        ['label' => 'Our approach', 'path' => '/#approach', 'active' => false],
        ['label' => 'Careers', 'path' => '/career', 'active' => request()->is('career')],
    ];
    $investmentLinks = [
        ['label' => 'Real estate', 'path' => '/realestate', 'active' => request()->is('realestate') || request()->is('estate')],
        ['label' => 'Stocks & ETFs', 'path' => '/stocks', 'active' => request()->is('stocks')],
        ['label' => 'Gold', 'path' => '/gold', 'active' => request()->is('gold')],
        ['label' => 'Agriculture', 'path' => '/agriculture', 'active' => request()->is('agriculture')],
        ['label' => 'Foreign exchange', 'path' => '/forex', 'active' => request()->is('forex')],
        ['label' => 'Retirement planning', 'path' => '/retirement-and-iras', 'active' => request()->is('retirement-and-iras')],
        ['label' => 'Digital assets', 'path' => '/buy-btc', 'active' => request()->is('buy-btc')],
        ['label' => 'NFTs & collectibles', 'path' => '/nft', 'active' => request()->is('nft')],
    ];
    $resourceLinks = [
        ['label' => 'Help & FAQs', 'path' => '/faqs', 'active' => request()->is('faq') || request()->is('faqs')],
        ['label' => 'Account security', 'path' => '/security', 'active' => request()->is('security')],
        ['label' => 'Financing', 'path' => '/loan', 'active' => request()->is('loan')],
        ['label' => 'Company documents', 'path' => '/legal', 'active' => request()->is('legal')],
        ['label' => 'Privacy policy', 'path' => '/privacy', 'active' => request()->is('privacy')],
        ['label' => 'Terms of use', 'path' => '/terms', 'active' => request()->is('terms')],
    ];
    $navGroups = [
        ['label' => 'Company', 'links' => $companyLinks],
        ['label' => 'Investment areas', 'links' => $investmentLinks, 'wide' => true],
        ['label' => 'Resources', 'links' => $resourceLinks],
    ];

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#151923">
    <title>@yield('title', $brandName . ' | Investment & Asset Management')</title>
    <meta name="description" content="@yield('meta_description', 'Investment and asset management with your future in focus. Explore our services, investment areas and approach to building long-term wealth.')">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', $brandName . ' | Investment & Asset Management')">
    <meta property="og:description" content="@yield('meta_description', 'A wider perspective on your wealth. Explore investment and asset management with us.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('home/redesign/images/financial-district.webp') }}">
    <link rel="icon" href="{{ $brandIcon }}">
    <link rel="preload" href="{{ asset('home/redesign/fonts/libre-caslon-display.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('home/redesign/fonts/dm-sans-regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    @if($isHome)<link rel="preload" href="{{ asset('home/redesign/images/financial-district.webp') }}" as="image">@endif
    <script>
        (() => {
            try {
                const saved = localStorage.getItem('site-theme');
                const dark = saved ? saved === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.classList.toggle('dark', dark);
                document.documentElement.dataset.theme = dark ? 'dark' : 'light';
                document.documentElement.style.colorScheme = dark ? 'dark' : 'light';
            } catch (_) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('home/redesign/homepage.css') . '?v=3' }}">
    <link rel="stylesheet" href="{{ asset('home/redesign/pages.css') . '?v=1' }}">
    <script src="{{ asset('home/redesign/homepage.js') . '?v=3' }}" defer></script>
    @stack('head')
</head>
<body class="ih-home {{ $isHome ? '' : 'ih-inner' }}">
    <a class="ih-skip" href="#main-content">Skip to content</a>
    <svg class="ih-symbols" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <symbol id="ih-arrow" viewBox="0 0 24 24"><path d="M4 12h15m-6-6 6 6-6 6"/></symbol>
        <symbol id="ih-diagonal" viewBox="0 0 24 24"><path d="M6 18 18 6M6 6h12v12"/></symbol>
        <symbol id="ih-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/></symbol>
        <symbol id="ih-moon" viewBox="0 0 24 24"><path d="M20.7 14.3A9 9 0 0 1 9.7 3.3a9 9 0 1 0 11 11Z"/></symbol>
    </svg>

    <div class="ih-utility">
        <div class="ih-container ih-utility-inner">
            <p>Investment & asset management</p>
            <div><a href="{{ url('/contact') }}">Let’s talk about your future <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a><span class="ih-utility-separator"></span><a href="{{ url('/security') }}">Security & trust</a></div>
        </div>
    </div>

    <header class="ih-header" id="site-header">
        <div class="ih-container ih-header-inner">
            <a href="{{ url('/') }}" class="ih-brand" aria-label="{{ $brandName }} home"><img src="{{ $brandLogo }}" alt="{{ $brandName }}" width="138" height="68"></a>
            <nav class="ih-desktop-nav" aria-label="Main navigation">
                <a href="{{ url('/') }}" @if($isHome) aria-current="page" @endif>Home</a>
                @foreach($navGroups as $group)
                    @if($loop->iteration === 2)
                        <a href="{{ url('/services') }}" @if(request()->is('services') || request()->is('service/*')) aria-current="page" @endif>Our expertise</a>
                    @endif
                    <details class="ih-nav-group {{ collect($group['links'])->contains('active', true) || (!empty($group['wide']) && (request()->is('plans') || request()->is('plan'))) ? 'is-active' : '' }}" data-nav-group>
                        <summary>{{ $group['label'] }} <svg class="ih-nav-chevron" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4"/></svg></summary>
                        <div class="ih-nav-panel {{ !empty($group['wide']) ? 'ih-nav-panel-wide' : '' }}">
                            <div class="ih-nav-panel-links">
                                @foreach($group['links'] as $link)<a href="{{ url($link['path']) }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }} <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a>@endforeach
                            </div>
                            @if(!empty($group['wide']))<a class="ih-nav-plan-link" href="{{ url('/plans') }}" @if(request()->is('plans') || request()->is('plan')) aria-current="page" @endif>Explore investment plans <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>@endif
                        </div>
                    </details>
                @endforeach
                <a href="{{ url('/contact') }}" @if(request()->is('contact')) aria-current="page" @endif>Contact</a>
            </nav>
            <div class="ih-header-actions">
                <div class="ih-translate">@include('layouts.partials.google-translate', ['tone' => 'adaptive'])</div>
                <button type="button" class="ih-theme-button" data-theme-toggle aria-label="Switch to dark theme" title="Switch to dark theme"><svg class="ih-icon ih-moon" aria-hidden="true"><use href="#ih-moon"/></svg><svg class="ih-icon ih-sun" aria-hidden="true"><use href="#ih-sun"/></svg></button>
                @auth
                    <a class="ih-button ih-button-small ih-portal" href="{{ route('user.dashboard') }}">My dashboard <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a>
                @else
                    <a class="ih-button ih-button-small ih-portal" href="{{ url('/login') }}">Client login <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a>
                @endauth
                <button type="button" class="ih-menu-button" data-menu-toggle aria-expanded="false" aria-controls="mobile-navigation" aria-label="Open navigation"><span></span><span></span></button>
            </div>
        </div>
        <nav class="ih-mobile-nav" id="mobile-navigation" aria-label="Mobile navigation" hidden>
            <a href="{{ url('/') }}" @if($isHome) aria-current="page" @endif>Home</a>
            <a href="{{ url('/services') }}" @if(request()->is('services') || request()->is('service/*')) aria-current="page" @endif>Our expertise</a>
            @foreach($navGroups as $group)
                <details class="ih-mobile-group" data-mobile-group>
                    <summary>{{ $group['label'] }} <svg class="ih-nav-chevron" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4"/></svg></summary>
                    <div>@foreach($group['links'] as $link)<a href="{{ url($link['path']) }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>@endforeach
                    @if(!empty($group['wide']))<a href="{{ url('/plans') }}">Investment plans</a>@endif</div>
                </details>
            @endforeach
            <a href="{{ url('/contact') }}" @if(request()->is('contact')) aria-current="page" @endif>Contact</a>
            <div class="ih-mobile-translate">@include('layouts.partials.google-translate', ['tone' => 'adaptive', 'fullWidth' => true, 'align' => 'left'])</div>
            <div class="ih-mobile-account">
                @auth
                    <a class="ih-button" href="{{ route('user.dashboard') }}">My dashboard <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>
                @else
                    <a class="ih-button" href="{{ url('/register') }}">Open an account <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>
                    <a class="ih-text-link" href="{{ url('/login') }}">Client login</a>
                @endauth
            </div>
        </nav>
    </header>

    @if(session('success') || session('status') || session('error'))
        <div class="ih-container"><p class="ih-notice {{ session('error') ? 'ih-notice-error' : '' }}" role="status">{{ session('error') ?? session('success') ?? session('status') }}</p></div>
    @endif

    <main id="main-content">@yield('content')</main>

    <footer class="ih-footer">
        <div class="ih-container">
            <div class="ih-footer-grid">
                <div class="ih-footer-about">
                    <a href="{{ url('/') }}" class="ih-brand ih-footer-brand" aria-label="{{ $brandName }} home"><img src="{{ $brandLogo }}" alt="{{ $brandName }}" width="138" height="68" loading="lazy"></a>
                    <p>A wider perspective on your wealth.<br>A lasting focus on your future.</p>
                    @if(!empty($web?->email))<a class="ih-footer-email" href="mailto:{{ $web->email }}">{{ $web->email }} <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a>@endif
                    @if(!empty($web?->phone))<a class="ih-footer-phone" href="tel:{{ preg_replace('/[^+0-9]/', '', $web->phone) }}">{{ $web->phone }}</a>@endif
                </div>
                <div><h2>Discover</h2><a href="{{ url('/about') }}">Our company</a><a href="{{ url('/services') }}">Our services</a><a href="{{ url('/#approach') }}">Our approach</a><a href="{{ url('/career') }}">Careers</a><a href="{{ url('/contact') }}">Contact us</a></div>
                <div><h2>Invest with us</h2><a href="{{ url('/realestate') }}">Real estate</a><a href="{{ url('/stocks') }}">Stocks & ETFs</a><a href="{{ url('/gold') }}">Gold</a><a href="{{ url('/agriculture') }}">Agriculture</a><a href="{{ url('/plans') }}">Investment plans</a></div>
                <div><h2>Client resources</h2><a href="{{ url('/login') }}">Client portal</a><a href="{{ url('/register') }}">Open an account</a><a href="{{ url('/faqs') }}">Help & FAQs</a><a href="{{ url('/security') }}">Security</a><a href="{{ url('/legal') }}">Legal information</a></div>
            </div>
            <div class="ih-footer-bottom"><p>&copy; {{ now()->year }} {{ $brandName }}. All rights reserved.</p><div><a href="{{ url('/privacy') }}">Privacy policy</a><a href="{{ url('/terms') }}">Terms & conditions</a><a href="#site-header">Back to top <span aria-hidden="true">↑</span></a></div></div>
        </div>
    </footer>
    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>
    @stack('scripts')
    {!! $web->livechat_code !!}
</body>
</html>

