@php
    $dashboardActive = request()->routeIs('user.dashboard');
    $depositActive = request()->routeIs('new_deposit') || request()->routeIs('deposit.*') || request()->routeIs('deposits.*') || request()->routeIs('deposit_detail');
    $withdrawActive = request()->routeIs('new_withdrawal') || request()->routeIs('withdrawal.*') || request()->routeIs('withdraw.*');
@endphp

<nav class="fixed inset-x-0 bottom-0 z-50 border-t border-ink-950/8 bg-white/94 px-2 pb-[max(.5rem,env(safe-area-inset-bottom))] pt-1.5 shadow-[0_-10px_30px_rgba(8,23,29,.08)] backdrop-blur-xl lg:hidden dark:border-white/8 dark:bg-[#0b181d]/94" aria-label="Mobile account navigation">
    <div class="relative mx-auto grid h-[64px] max-w-xl grid-cols-5 items-end">
        <a href="{{ route('user.dashboard') }}" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold transition {{ $dashboardActive ? 'text-ink-950 dark:text-bronze-300' : 'text-ink-600 dark:text-white/45' }}">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg transition {{ $dashboardActive ? 'bg-bronze-100 text-bronze-700 dark:bg-bronze-300/12 dark:text-bronze-300' : 'group-active:bg-paper-100 dark:group-active:bg-white/5' }}">
                @include('layouts.partials.user-nav-icon', ['icon' => 'home'])
            </span>
            <span>Home</span>
        </a>

        <a href="{{ route('new_deposit') }}" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold transition {{ $depositActive ? 'text-ink-950 dark:text-bronze-300' : 'text-ink-600 dark:text-white/45' }}">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg transition {{ $depositActive ? 'bg-bronze-100 text-bronze-700 dark:bg-bronze-300/12 dark:text-bronze-300' : 'group-active:bg-paper-100 dark:group-active:bg-white/5' }}">
                @include('layouts.partials.user-nav-icon', ['icon' => 'deposit'])
            </span>
            <span>Deposit</span>
        </a>

        <div class="relative flex h-[58px] items-end justify-center">
            <a
                href="{{ route('new_investment') }}"
                class="absolute -top-5 flex h-14 w-14 items-center justify-center rounded-2xl border-[4px] border-white bg-ink-950 text-bronze-300 shadow-xl shadow-ink-950/20 transition active:scale-95 dark:border-[#0b181d] dark:bg-bronze-300 dark:text-ink-950"
                aria-label="New investment"
            >
                @include('layouts.partials.user-nav-icon', ['icon' => 'chart'])
            </a>
            <span class="pb-1 text-[10px] font-bold text-ink-950 dark:text-bronze-300">Invest</span>
        </div>

        <a href="{{ route('new_withdrawal') }}" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold transition {{ $withdrawActive ? 'text-ink-950 dark:text-bronze-300' : 'text-ink-600 dark:text-white/45' }}">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg transition {{ $withdrawActive ? 'bg-bronze-100 text-bronze-700 dark:bg-bronze-300/12 dark:text-bronze-300' : 'group-active:bg-paper-100 dark:group-active:bg-white/5' }}">
                @include('layouts.partials.user-nav-icon', ['icon' => 'withdraw'])
            </span>
            <span>Withdraw</span>
        </a>

        <button type="button" @click="mobileMenuOpen = true" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold text-ink-600 transition dark:text-white/45" aria-label="Open full menu">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg group-active:bg-paper-100 dark:group-active:bg-white/5">
                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 7h14M5 12h14M5 17h14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
            </span>
            <span>Menu</span>
        </button>
    </div>
</nav>
