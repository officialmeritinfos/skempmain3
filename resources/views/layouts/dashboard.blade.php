{{-- resources/views/layouts/mobile/dashboard.blade.php --}}

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="theme">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', setting('name')) — {{ setting('name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset(setting('favicon')) }}">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body x-data="themeToggle()" x-init="init()"
      class="font-sans antialiased min-h-screen flex flex-col bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-300">

{{-- Topbar --}}
<header class="w-full sticky top-0 z-30 backdrop-blur-lg dark:bg-gray-900/30">

    <div class="h-14 px-4 flex items-center justify-center">

        {{-- Theme toggle (Left) --}}
        <button @click="toggleTheme"
                class="w-10 h-10 rounded-full flex items-center justify-center bg-white/40 dark:bg-gray-700/50 border border-white/30 dark:border-gray-600 shadow-sm hover:shadow-md transition"
                :title="theme === 'dark' ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
            <template x-if="theme === 'dark'">
                <i class="fas fa-sun text-yellow-400 text-lg"></i>
            </template>
            <template x-if="theme === 'light'">
                <i class="fas fa-moon text-gray-700 text-lg"></i>
            </template>
        </button>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</header>

{{-- Main Content --}}
<main class="flex-1 overflow-y-auto no-scrollbar pb-20 px-4 py-6">
    @php $user = auth()->user(); @endphp

    @yield('content')
</main>

{{-- Bottom Navigation --}}
@include('layouts.user-bottom-nav')

{{-- Scripts --}}
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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
    });

    function themeToggle() {
        return {
            theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
            init() {
                document.documentElement.classList.add(this.theme);
                document.documentElement.classList.remove(this.theme === 'dark' ? 'light' : 'dark');
            },
            toggleTheme() {
                const newTheme = this.theme === 'dark' ? 'light' : 'dark';
                document.documentElement.classList.replace(this.theme, newTheme);
                this.theme = newTheme;
                localStorage.setItem('theme', newTheme);
            }
        };
    }
</script>


@stack('scripts')

<div x-data="gtUi()" x-init="init()" class="fixed left-4 z-[9999999]" style="bottom:300px;">
    <!-- Toggle -->
    <button
        type="button"
        @click="toggle()"
        class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold shadow-lg
               border transition backdrop-blur
               bg-white/80 text-slate-900 border-black/10 hover:bg-white/90
               dark:bg-slate-900/80 dark:text-white dark:border-white/10 dark:hover:bg-slate-900/90">
        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full
                     bg-black/5 dark:bg-white/10">🌐</span>
        <span x-text="label"></span>

        <svg class="h-4 w-4 opacity-80 transition-transform" viewBox="0 0 20 20" fill="currentColor"
             :class="open ? 'rotate-180' : ''">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.24a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08z" clip-rule="evenodd"/>
        </svg>
    </button>

    <!-- Panel -->
    <div
        x-show="open"
        x-cloak
        @click.outside="open=false"
        x-transition.opacity
        class="mt-3 w-72 rounded-2xl shadow-2xl overflow-hidden border backdrop-blur
               bg-white/90 border-black/10
               dark:bg-slate-900/90 dark:border-white/10">

        <!-- Search -->
        <div class="p-3 border-b border-black/10 dark:border-white/10">
            <input
                type="text"
                x-model="q"
                placeholder="Search language..."
                class="w-full rounded-xl px-3 py-2 text-xs outline-none transition
                       bg-white border border-black/10 text-slate-900 placeholder:text-slate-400
                       focus:ring-2 focus:ring-emerald-400/40 focus:border-emerald-300
                       dark:bg-slate-950 dark:border-white/10 dark:text-white dark:placeholder:text-slate-500
                       dark:focus:ring-emerald-400/30 dark:focus:border-emerald-400/40" />
        </div>

        <!-- List -->
        <div class="max-h-64 overflow-y-auto p-2">
            <template x-for="lang in filtered()" :key="lang.code">
                <button
                    type="button"
                    @click="setLang(lang.code, lang.name)"
                    class="block w-full text-left rounded-xl px-3 py-2 text-xs font-semibold transition
                           text-slate-800 hover:bg-emerald-50/70
                           dark:text-slate-100 dark:hover:bg-white/10">
                    <span x-text="lang.name"></span>
                </button>
            </template>

            <div x-show="filtered().length === 0" class="px-3 py-6 text-xs text-slate-500 dark:text-slate-400">
                No languages match your search.
            </div>
        </div>

        <!-- Footer -->
        <div class="p-3 border-t border-black/10 dark:border-white/10 flex items-center justify-between">
            <button
                type="button"
                @click="setLang('en','English')"
                class="text-xs font-semibold text-slate-700 hover:underline
                       dark:text-slate-300">
                Reset
            </button>
            <button
                type="button"
                @click="open=false"
                class="text-xs font-semibold text-slate-700 hover:underline
                       dark:text-slate-300">
                Close
            </button>
        </div>
    </div>
</div>

<!-- Real Google widget stays hidden -->
<div id="google_translate_element" class="hidden"></div>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '9b0178b92e04d66828cce90557e4d657a384c179';
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
