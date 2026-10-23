@php
    $authName = $siteName ?? $web?->name ?? config('app.name');
    $authLogo = asset('home/images/' . ($web?->logo ?: 'logo.png'));
    $authFavicon = asset('home/images/' . ($web?->favicon ?: ($web?->logo ?: 'logo.png')));
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', config('app.locale', 'en')) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#151923">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Client access') | {{ $authName }}</title>
    <meta name="description" content="Access your {{ $authName }} client account.">
    <link rel="icon" href="{{ $authFavicon }}">
    <link rel="preload" href="{{ asset('home/redesign/fonts/dm-sans-regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('home/redesign/fonts/libre-caslon-display.woff2') }}" as="font" type="font/woff2" crossorigin>
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
    @include('auth.partials.styles')
    @stack('head')
</head>
<body class="ac-auth @yield('auth_variant')">
    <a class="ac-skip" href="#auth-content">Skip to form</a>
    <svg class="ac-symbols" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <symbol id="ac-arrow" viewBox="0 0 24 24"><path d="M4 12h15m-6-6 6 6-6 6"/></symbol>
        <symbol id="ac-back" viewBox="0 0 24 24"><path d="M20 12H5m6-6-6 6 6 6"/></symbol>
        <symbol id="ac-eye" viewBox="0 0 24 24"><path d="M2.5 12s3.4-5.5 9.5-5.5 9.5 5.5 9.5 5.5-3.4 5.5-9.5 5.5S2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="2.5"/></symbol>
        <symbol id="ac-eye-off" viewBox="0 0 24 24"><path d="m4 4 16 16M9.3 6.9a10 10 0 0 1 2.7-.4c6.1 0 9.5 5.5 9.5 5.5a18 18 0 0 1-2.8 3.3M14.8 17.1a10 10 0 0 1-2.8.4C5.9 17.5 2.5 12 2.5 12a18 18 0 0 1 3.1-3.6"/></symbol>
        <symbol id="ac-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/></symbol>
        <symbol id="ac-moon" viewBox="0 0 24 24"><path d="M20.7 14.3A9 9 0 0 1 9.7 3.3a9 9 0 1 0 11 11Z"/></symbol>
        <symbol id="ac-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"/></symbol>
        <symbol id="ac-key" viewBox="0 0 24 24"><circle cx="8" cy="9" r="5"/><path d="m11.5 12.5 8 8m-3-3 2-2m-5 0 2-2"/></symbol>
        <symbol id="ac-check" viewBox="0 0 24 24"><path d="m5 12 4.5 4.5L19 7"/></symbol>
        <symbol id="ac-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 11v6m0-10v.1"/></symbol>
    </svg>

    <div class="ac-shell">
        @include('auth.partials.brand-panel')
        <div class="ac-workspace">
            <header class="ac-topbar">
                <a class="ac-mobile-brand" href="{{ url('/') }}" aria-label="{{ $authName }} home"><img src="{{ $authLogo }}" alt="{{ $authName }}" width="123" height="66"></a>
                <a class="ac-back-link" href="{{ url('/') }}"><svg class="ac-icon" aria-hidden="true"><use href="#ac-back"/></svg><span class="ac-back-full">Back to website</span><span class="ac-back-short">Back</span></a>
                <div class="ac-utilities">
                    <div class="ac-translate">@include('layouts.partials.google-translate', ['tone' => 'adaptive'])</div>
                    <button class="ac-theme-toggle" type="button" data-auth-theme aria-label="Switch to dark theme" title="Switch to dark theme"><svg class="ac-icon ac-theme-moon" aria-hidden="true"><use href="#ac-moon"/></svg><svg class="ac-icon ac-theme-sun" aria-hidden="true"><use href="#ac-sun"/></svg></button>
                </div>
            </header>

            <main class="ac-main" id="auth-content" tabindex="-1">
                @yield('content')
            </main>

            <footer class="ac-footer">
                <p>&copy; {{ now()->year }} {{ $authName }}</p>
                <nav aria-label="Account resources"><a href="{{ url('/privacy') }}">Privacy</a><a href="{{ url('/terms') }}">Terms</a><a href="{{ url('/contact') }}">Need help?</a></nav>
            </footer>
        </div>
    </div>
    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>
    @include('auth.partials.scripts')
    @stack('scripts')
    {!! $web->livechat_code !!}
</body>
</html>
