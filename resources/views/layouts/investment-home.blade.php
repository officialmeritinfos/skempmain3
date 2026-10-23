@php
    $brandName = $siteName ?? $web?->name ?? config('app.name');
    $brandLogo = asset('home/images/' . ($web?->logo ?: 'logo.png'));
    $brandIcon = asset('home/images/' . ($web?->favicon ?: ($web?->logo ?: 'logo.png')));
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#151923">
    <title>{{ $brandName }} | Investment & Asset Management</title>
    <meta name="description" content="Investment and asset management with your future in focus. Explore {{ $brandName }}'s services, investment areas and approach to building long-term wealth.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $brandName }} | Investment & Asset Management">
    <meta property="og:description" content="A wider perspective on your wealth. Explore investment and asset management with {{ $brandName }}.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('home/redesign/images/financial-district.webp') }}">
    <link rel="icon" href="{{ $brandIcon }}">
    <link rel="preload" href="{{ asset('home/redesign/fonts/libre-caslon-display.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('home/redesign/fonts/dm-sans-regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('home/redesign/images/financial-district.webp') }}" as="image">
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
    <link rel="stylesheet" href="{{ asset('home/redesign/homepage.css') . '?v=2' }}">
    <script src="{{ asset('home/redesign/homepage.js') }}" defer></script>
</head>
<body class="ih-home">
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
                <a href="{{ url('/') }}" aria-current="page">Home</a>
                <a href="{{ url('/about') }}">Who we are</a>
                <a href="#expertise">Our expertise</a>
                <a href="#investment-areas">Investment areas</a>
                <a href="{{ url('/contact') }}">Contact</a>
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
            <a href="{{ url('/') }}" aria-current="page">Home</a>
            <a href="{{ url('/about') }}">Who we are</a>
            <a href="#expertise">Our expertise</a>
            <a href="#investment-areas">Investment areas</a>
            <a href="#approach">Our approach</a>
            <a href="{{ url('/contact') }}">Contact</a>
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
                <div><h2>Discover</h2><a href="{{ url('/about') }}">Our company</a><a href="{{ url('/services') }}">Our services</a><a href="#approach">Our approach</a><a href="{{ url('/career') }}">Careers</a><a href="{{ url('/contact') }}">Contact us</a></div>
                <div><h2>Invest with us</h2><a href="{{ url('/realestate') }}">Real estate</a><a href="{{ url('/stocks') }}">Stocks & ETFs</a><a href="{{ url('/gold') }}">Gold</a><a href="{{ url('/agriculture') }}">Agriculture</a><a href="{{ url('/plans') }}">Investment plans</a></div>
                <div><h2>Client resources</h2><a href="{{ url('/login') }}">Client portal</a><a href="{{ url('/register') }}">Open an account</a><a href="{{ url('/faqs') }}">Help & FAQs</a><a href="{{ url('/security') }}">Security</a><a href="{{ url('/legal') }}">Legal information</a></div>
            </div>
            <div class="ih-risk-note"><span>Investment involves risk.</span> The value of investments can go down as well as up. Past performance is not a reliable indicator of future results. Consider your objectives, time horizon and ability to bear loss before investing.</div>
            <div class="ih-footer-bottom"><p>&copy; {{ now()->year }} {{ $brandName }}. All rights reserved.</p><div><a href="{{ url('/privacy') }}">Privacy policy</a><a href="{{ url('/terms') }}">Terms & conditions</a><a href="#site-header">Back to top <span aria-hidden="true">↑</span></a></div></div>
        </div>
    </footer>
    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>
    {!! $web->livechat_code !!}
</body>
</html>
