<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-portfolio-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#2b193b">
    <title>@yield('title', 'Dashboard') · {{ $siteName ?? $web->name }}</title>
    @if(!empty($web->favicon))<link rel="icon" href="{{ asset($web->favicon) }}">@endif
    <link rel="preload" href="{{ asset('home/redesign/fonts/dm-sans-regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('user.portfolio.styles')
    <script>
        try {
            const preference = localStorage.getItem('portfolio-theme') || 'light';
            document.documentElement.dataset.portfolioTheme = preference;
            document.documentElement.classList.toggle('dark', preference === 'dark');
            document.documentElement.style.colorScheme = preference;
        } catch (error) {}
    </script>
    @stack('head')
</head>
<body class="pd-body">
    @php
        $displayName = trim((string) ($user->name ?: $user->username));
        $initials = collect(preg_split('/\s+/', $displayName))->filter()->take(2)->map(fn($part) => mb_strtoupper(mb_substr($part, 0, 1)))->implode('');
        $portfolioNav = [
            ['Overview','user.dashboard',['user.dashboard'],'home'],
            ['Investments','investment.index',['investment.*','invest.*','invest_detail','new_investment'],'chart'],
            ['Deposits','deposit.index',['deposit.*','deposits.*','deposit_detail','new_deposit'],'deposit'],
            ['Withdrawals','withdrawal.index',['withdrawal.*','withdraw.*','new_withdrawal'],'withdraw'],
            ['Transfers','transfer.index',['transfer.*'],'transfer'],
        ];
        $accountNav = [
            ['Managed accounts','subtrade.index','briefcase'],['Cards','cards.index','card'],
            ['Financing','loans.index','finance'],['Referrals','referral.index','users'],
            ['Identity verification','setting.kyc','shield'],['Settings','setting.index','settings'],
        ];
    @endphp
    <a class="pd-skip" href="#portfolio-main">Skip to content</a>
    <aside class="pd-sidebar" aria-label="Main navigation">
        @include('user.portfolio.navigation')
    </aside>
    <div class="pd-workspace">
        <header class="pd-topbar">
            <div class="pd-topbar-context">
                <button type="button" class="pd-icon-button pd-menu-toggle" data-open-menu aria-label="Open navigation" aria-controls="portfolio-menu">@include('user.portfolio.icon', ['name'=>'menu'])</button>
                <a href="{{ route('user.dashboard') }}" class="pd-workspace-label">Client workspace</a>
                <span class="pd-topbar-divider" aria-hidden="true">/</span>
                <span class="pd-context-name">@yield('title', 'Overview')</span>
            </div>
            <div class="pd-topbar-actions">
                <div class="pd-translate">@include('layouts.partials.google-translate')</div>
                <button class="pd-icon-button" type="button" data-portfolio-theme-toggle aria-label="Switch to dark theme">@include('user.portfolio.icon', ['name'=>'theme'])</button>
                <details class="pd-profile">
                    <summary aria-label="Account menu"><span class="pd-avatar">{{ $initials ?: 'U' }}</span><span class="pd-profile-name">{{ $user->username }}</span>@include('user.portfolio.icon', ['name'=>'chevron'])</summary>
                    <div class="pd-profile-panel">
                        <strong>{{ $displayName }}</strong><span class="pd-muted">{{ $user->email }}</span>
                        <a href="{{ route('setting.index') }}">Account settings</a>
                        @if($user->is_admin == 1)<a href="{{ route('admin.admin.dashboard') }}">Admin dashboard</a>@endif
                        <a href="{{ url('account/logout') }}">Sign out</a>
                    </div>
                </details>
            </div>
        </header>
        <main id="portfolio-main" class="pd-main" tabindex="-1">
            @include('user.portfolio.notifications')
            @yield('content')
        </main>
        <footer class="pd-footer"><span>© {{ date('Y') }} {{ $siteName ?? $web->name }}</span><a href="{{ url('contact') }}">Contact support @include('user.portfolio.icon', ['name'=>'external'])</a></footer>
    </div>
    <nav class="pd-bottom-nav" aria-label="Quick navigation">
        @foreach([['Overview','user.dashboard','home'],['Deposit','new_deposit','deposit'],['Invest','new_investment','chart'],['Withdraw','new_withdrawal','withdraw']] as $shortcut)
            <a href="{{ route($shortcut[1]) }}" @if(request()->routeIs($shortcut[1])) aria-current="page" @endif>@include('layouts.partials.user-nav-icon', ['icon'=>$shortcut[2]])<span>{{ $shortcut[0] }}</span></a>
        @endforeach
        <button type="button" data-open-menu aria-controls="portfolio-menu">@include('user.portfolio.icon', ['name'=>'menu'])<span>More</span></button>
    </nav>
    <dialog id="portfolio-menu" class="pd-menu-dialog" aria-label="Account navigation">
        <button type="button" class="pd-icon-button pd-close-menu" data-close-menu aria-label="Close navigation">@include('user.portfolio.icon', ['name'=>'close'])</button>
        @include('user.portfolio.navigation')
    </dialog>
    <div id="google_translate_element" hidden aria-hidden="true"></div>
    <div class="pd-sr-only" role="status" aria-live="polite" data-copy-status></div>
    @include('user.portfolio.scripts')
    @stack('scripts')
    {!! $web->livechat_code !!}
</body>
</html>
