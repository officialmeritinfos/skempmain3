<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $appName = config('app.name');
        $guestFavicon = setting('favicon');
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#050816">

    <title>@yield('title', 'Client access') | {{ $appName }}</title>
    <meta name="description" content="Secure client access to {{ $appName }}.">

    @if(!empty($guestFavicon))
        <link rel="icon" type="image/png" href="{{ asset($guestFavicon) }}">
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

    <script src="https://www.google.com/recaptcha/api.js" defer></script>
</head>
<body class="min-h-screen bg-[#f5f7fb] font-sans text-slate-950 antialiased transition-colors duration-300 dark:bg-[#030712] dark:text-white">
    <div class="relative min-h-screen overflow-x-hidden">
        <header class="absolute inset-x-0 top-0 z-50">
            <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-3 px-4 py-4 sm:px-6 lg:px-8 lg:py-5">
                <a href="{{ url('/') }}" class="group inline-flex min-w-0 items-center gap-3" aria-label="Return to {{ $appName }} home">
                    @if(!empty($web?->logo))
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-slate-900/10 bg-white p-2 shadow-sm transition group-hover:-translate-y-0.5 dark:border-white/10 dark:bg-white/10">
                            <img src="{{ asset('home/images/' . $web->logo) }}" alt="{{ $appName }}" class="h-full w-full object-contain">
                        </span>
                    @else
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-cyan-400/25 bg-cyan-400/10 font-display text-base font-bold text-cyan-700 dark:border-cyan-300/20 dark:bg-cyan-300/10 dark:text-cyan-200">{{ strtoupper(substr($appName, 0, 1)) }}</span>
                    @endif
                    <span class="min-w-0">
                        <span class="block truncate text-sm font-bold text-slate-950 sm:text-base dark:text-white">{{ $appName }}</span>
                        <span class="hidden text-[9px] font-semibold uppercase tracking-[0.2em] text-slate-400 sm:block dark:text-white/40">Private client access</span>
                    </span>
                </a>

                <div class="flex shrink-0 items-center gap-2">
                    @include('layouts.partials.theme-switch')
                    <a href="{{ url('/') }}" class="inline-flex h-10 items-center gap-2 rounded-full border border-slate-900/10 bg-white/70 px-3 text-xs font-semibold text-slate-700 shadow-sm backdrop-blur-xl transition hover:-translate-y-0.5 hover:border-cyan-400/30 hover:text-slate-950 sm:px-4 dark:border-white/10 dark:bg-white/7 dark:text-white/70 dark:hover:border-cyan-300/30 dark:hover:bg-white/10 dark:hover:text-white">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m11.5 5-5 5 5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span class="hidden sm:inline">Back to website</span>
                        <span class="sm:hidden">Back</span>
                    </a>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    <div id="google_translate_element" class="hidden" aria-hidden="true"></div>
    @stack('scripts')

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'a14b3f32631caf0fe57de147f9e4cce3cb5a867f';
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
