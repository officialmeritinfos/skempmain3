@php
    $mobileItems = [
        ['label' => 'Home', 'href' => route('user.dashboard'), 'active' => request()->routeIs('user.dashboard'), 'icon' => 'home'],
        ['label' => 'Deposit', 'href' => route('new_deposit'), 'active' => request()->routeIs('new_deposit') || request()->routeIs('deposit.*') || request()->routeIs('deposits.*'), 'icon' => 'deposit'],
        ['label' => 'Withdraw', 'href' => route('new_withdrawal'), 'active' => request()->routeIs('new_withdrawal') || request()->routeIs('withdrawal.*') || request()->routeIs('withdraw.*'), 'icon' => 'withdraw'],
        ['label' => 'Account', 'href' => route('setting.index'), 'active' => request()->routeIs('setting.*') || request()->routeIs('settings.*') || request()->routeIs('password.*') || request()->routeIs('kyc.*'), 'icon' => 'settings'],
    ];
@endphp

<nav class="fixed inset-x-0 bottom-0 z-50 border-t border-ink-950/8 bg-white/94 px-2 pb-[max(.5rem,env(safe-area-inset-bottom))] pt-1.5 shadow-[0_-10px_30px_rgba(8,23,29,.08)] backdrop-blur-xl lg:hidden dark:border-white/8 dark:bg-[#0b181d]/94" aria-label="Mobile account navigation">
    <div class="relative mx-auto grid h-[64px] max-w-xl grid-cols-5 items-end">
        @foreach(array_slice($mobileItems, 0, 2) as $item)
            <a href="{{ $item['href'] }}" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold transition {{ $item['active'] ? 'text-ink-950 dark:text-bronze-300' : 'text-ink-600 dark:text-white/45' }}">
                <span class="flex h-7 w-7 items-center justify-center rounded-lg transition {{ $item['active'] ? 'bg-bronze-100 text-bronze-700 dark:bg-bronze-300/12 dark:text-bronze-300' : 'group-active:bg-paper-100 dark:group-active:bg-white/5' }}">
                    @include('layouts.partials.user-nav-icon', ['icon' => $item['icon']])
                </span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach

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

        @foreach(array_slice($mobileItems, 2) as $item)
            <a href="{{ $item['href'] }}" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold transition {{ $item['active'] ? 'text-ink-950 dark:text-bronze-300' : 'text-ink-600 dark:text-white/45' }}">
                <span class="flex h-7 w-7 items-center justify-center rounded-lg transition {{ $item['active'] ? 'bg-bronze-100 text-bronze-700 dark:bg-bronze-300/12 dark:text-bronze-300' : 'group-active:bg-paper-100 dark:group-active:bg-white/5' }}">
                    @include('layouts.partials.user-nav-icon', ['icon' => $item['icon']])
                </span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach

        <button type="button" @click="mobileMenuOpen = true" class="group flex h-[58px] flex-col items-center justify-center gap-1 rounded-xl text-[10px] font-semibold text-ink-600 transition dark:text-white/45" aria-label="Open full menu">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg group-active:bg-paper-100 dark:group-active:bg-white/5">
                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 7h14M5 12h14M5 17h14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
            </span>
            <span>Menu</span>
        </button>
    </div>
</nav>
