<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-paper-50">
<head>
    @php
        $appName = config('app.name');
        $guestFavicon = setting('favicon');
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#08171d">

    <title>@yield('title', 'Client access') | {{ $appName }}</title>
    <meta name="description" content="Secure client access to {{ $appName }}.">

    @if(!empty($guestFavicon))
        <link rel="icon" type="image/png" href="{{ asset($guestFavicon) }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')

    <script src="https://www.google.com/recaptcha/api.js" defer></script>
</head>
<body class="min-h-screen bg-paper-50 font-sans text-ink-950 antialiased">
    <div class="min-h-screen overflow-x-hidden">
        <header class="absolute inset-x-0 top-0 z-40">
            <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-3 px-4 py-5 sm:px-6 lg:px-8">
                <a href="{{ url('/') }}" class="group inline-flex min-w-0 items-center gap-3 text-white" aria-label="Return to {{ $appName }} home">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/15 bg-white/10 backdrop-blur-md">
                        <svg class="h-5 w-5 text-bronze-300" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 16.5 9 9l3 4 3.5-6L20 16.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 19h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="min-w-0">
                        <span class="block truncate text-sm font-semibold sm:text-base">{{ $appName }}</span>
                        <span class="hidden text-[9px] font-bold uppercase tracking-[0.22em] text-white/45 sm:block">Investment · Wealth · Assets</span>
                    </span>
                </a>

                <div class="flex shrink-0 items-center gap-2">
                    @include('layouts.partials.google-translate', ['tone' => 'dark'])

                    <a href="{{ url('/') }}" class="inline-flex h-10 items-center gap-2 rounded-xl border border-white/15 bg-black/10 px-3 text-xs font-semibold text-white/75 backdrop-blur-md transition hover:border-white/30 hover:bg-white/10 hover:text-white sm:rounded-full sm:px-4">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="m11.5 5-5 5 5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="hidden sm:inline">Back to website</span>
                        <span class="sm:hidden">Back</span>
                    </a>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    {{-- Google Translate's native control stays hidden; the branded selector above drives it. --}}
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