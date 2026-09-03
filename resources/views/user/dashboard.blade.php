@extends('layouts.dashboard')
@section('title', 'Portfolio Dashboard')
@section('page_heading', 'Portfolio overview')

@section('content')
    @inject('injected','App\Defaults\Custom')

    @php
        $currency = $web?->currencySign ?: '$';
        $displayName = trim((string) ($user->name ?: $user->username));
        $firstName = preg_split('/\s+/', $displayName)[0] ?? $displayName;
        $todayEarning = $injected->userDailyEarning($user->id);
        $currentMonthEarning = $injected->userCurrentMonthEarning($user->id);
        $previousMonthEarning = $injected->userPreviousMonthEarning($user->id);
    @endphp

    <div x-data="{ balancesVisible: true, copied: false }" class="space-y-5 sm:space-y-6">
        {{-- Welcome + portfolio hero --}}
        <section class="relative overflow-hidden rounded-[1.7rem] bg-ink-950 text-white shadow-xl shadow-ink-950/8 sm:rounded-[2rem]">
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full border border-bronze-300/15"></div>
                <div class="absolute -right-3 top-12 h-40 w-40 rounded-full border border-white/8"></div>
                <div class="absolute bottom-0 right-0 h-2/3 w-1/2 bg-[radial-gradient(circle_at_bottom_right,rgba(213,182,125,.11),transparent_65%)]"></div>
                <div class="absolute inset-y-0 left-[66%] hidden w-px bg-white/6 xl:block"></div>
            </div>

            <div class="relative grid gap-8 p-5 sm:p-7 lg:grid-cols-[1.18fr_.82fr] lg:p-9 xl:p-10">
                <div>
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Welcome back</p>
                            <h1 class="mt-2 font-display text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">{{ $firstName }}, here is where your portfolio stands.</h1>
                        </div>
                        <button type="button" @click="balancesVisible = !balancesVisible" class="inline-flex items-center gap-2 rounded-full border border-white/12 bg-white/5 px-3 py-2 text-[10px] font-bold uppercase tracking-[0.14em] text-white/55 transition hover:bg-white/8 hover:text-white">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M2.5 12S6 6.5 12 6.5 21.5 12 21.5 12 18 17.5 12 17.5 2.5 12 2.5 12Z" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span x-text="balancesVisible ? 'Hide values' : 'Show values'"></span>
                        </button>
                    </div>

                    <div class="mt-9">
                        <p class="text-xs font-semibold text-white/40">Account balance</p>
                        <p class="mt-2 font-display text-4xl font-semibold tracking-[-0.035em] text-white sm:text-5xl lg:text-6xl">
                            <span x-show="balancesVisible">{{ $currency }}{{ number_format($user->balance, 2) }}</span>
                            <span x-show="!balancesVisible" x-cloak>••••••</span>
                        </p>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-2.5">
                        <a href="{{ route('new_investment') }}" class="group inline-flex items-center justify-center gap-2 rounded-full bg-bronze-300 px-5 py-3 text-xs font-bold text-ink-950 transition hover:-translate-y-0.5 hover:bg-bronze-200">
                            Invest funds
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <a href="{{ route('new_deposit') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-5 py-3 text-xs font-bold text-white transition hover:bg-white/10">Deposit</a>
                        <a href="{{ route('new_withdrawal') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-5 py-3 text-xs font-bold text-white transition hover:bg-white/10">Withdraw</a>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-3 lg:grid-cols-1">
                    @foreach([
                        ['Profit balance', $user->profit, 'Returns credited to profit'],
                        ['Bonus balance', $user->bonus, 'Available bonus balance'],
                        ['Ongoing investments', $ongoingInvestments, 'Capital currently active'],
                    ] as $summary)
                        <div class="rounded-2xl border border-white/10 bg-white/[0.045] p-4 backdrop-blur-sm sm:p-5">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-white/35">{{ $summary[0] }}</p>
                                    <p class="mt-2 text-xl font-semibold text-white sm:text-2xl">
                                        <span x-show="balancesVisible">{{ $currency }}{{ number_format($summary[1], 2) }}</span>
                                        <span x-show="!balancesVisible" x-cloak>••••••</span>
                                    </p>
                                    <p class="mt-1 text-[10px] text-white/30">{{ $summary[2] }}</p>
                                </div>
                                <span class="h-2 w-2 shrink-0 rounded-full bg-bronze-300"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Promos and account notices --}}
        @if($promos->isNotEmpty() || $notifications->isNotEmpty())
            <section class="grid gap-4 xl:grid-cols-2">
                @foreach($promos as $promo)
                    <article class="relative overflow-hidden rounded-2xl border border-bronze-500/20 bg-bronze-100/60 p-5 dark:border-bronze-300/15 dark:bg-bronze-300/[0.06]">
                        <div class="flex items-start gap-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-bronze-300 text-ink-950">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1-5.4-2.9-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-700 dark:text-bronze-300">Opportunity</p>
                                <h2 class="mt-1 text-base font-bold text-ink-950 dark:text-white">{{ $promo->title }}</h2>
                                <div class="mt-2 text-sm leading-6 text-ink-700 dark:text-white/55">{!! $promo->content !!}</div>
                                <a href="{{ route('user.enrollPromo', ['id' => $promo->id]) }}" class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-ink-950 transition hover:text-bronze-700 dark:text-bronze-300 dark:hover:text-bronze-200">Express interest <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </article>
                @endforeach

                @foreach($notifications as $notification)
                    <article class="rounded-2xl border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                        <div class="flex items-start gap-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-paper-100 text-ink-700 dark:bg-white/5 dark:text-white/60">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M18 9a6 6 0 1 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div>
                                <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-ink-600 dark:text-white/35">Account notice</p>
                                <h2 class="mt-1 text-base font-bold text-ink-950 dark:text-white">{{ $notification->title }}</h2>
                                <div class="mt-2 text-sm leading-6 text-ink-700 dark:text-white/55">{!! $notification->content !!}</div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        @endif

        {{-- Key account signals --}}
        <section>
            <div class="mb-3 flex items-end justify-between gap-4">
                <div>
                    <p class="text-[9px] font-bold uppercase tracking-[0.19em] text-bronze-600 dark:text-bronze-300">Account signals</p>
                    <h2 class="mt-1 text-lg font-bold tracking-[-0.02em] text-ink-950 dark:text-white">What needs your attention</h2>
                </div>
                <a href="{{ route('investment.index') }}" class="hidden text-xs font-bold text-ink-700 transition hover:text-bronze-700 sm:inline-flex dark:text-white/55 dark:hover:text-bronze-300">View investments →</a>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 xl:grid-cols-6">
                @foreach([
                    ['Today’s earning', $todayEarning, 'earn'],
                    ['Completed investments', $completedInvestments, 'complete'],
                    ['Pending deposits', $pendingDeposit, 'pending'],
                    ['Pending withdrawals', $pendingWithdrawal, 'pending'],
                    ['Completed withdrawals', $withdrawals, 'complete'],
                    ['Referral balance', $user->refBal, 'referral'],
                ] as $metric)
                    <div class="min-w-0 rounded-2xl border border-ink-950/8 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md dark:border-white/8 dark:bg-white/[0.035]">
                        <div class="flex items-center justify-between gap-2">
                            <span class="flex h-8 w-8 items-center justify-center rounded-xl {{ $metric[2] === 'pending' ? 'bg-amber-50 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300' : ($metric[2] === 'complete' ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300' : 'bg-bronze-100 text-bronze-700 dark:bg-bronze-300/10 dark:text-bronze-300') }}">
                                @if($metric[2] === 'pending')
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif($metric[2] === 'complete')
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/><path d="m8 12 2.5 2.5L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @else
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 18 10 13l3 3 6-8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @endif
                            </span>
                        </div>
                        <p class="mt-4 truncate text-[10px] font-semibold text-ink-600 dark:text-white/38">{{ $metric[0] }}</p>
                        <p class="mt-1 truncate text-lg font-bold tracking-[-0.02em] text-ink-950 dark:text-white">
                            <span x-show="balancesVisible">{{ $currency }}{{ number_format($metric[1], 2) }}</span>
                            <span x-show="!balancesVisible" x-cloak>••••</span>
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Portfolio charts --}}
        <section class="grid gap-4 xl:grid-cols-2">
            <article class="overflow-hidden rounded-2xl border border-ink-950/8 bg-white shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                <div class="flex flex-col gap-4 border-b border-ink-950/8 p-5 sm:flex-row sm:items-center sm:justify-between dark:border-white/8">
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Cash flow</p>
                        <h2 class="mt-1 text-base font-bold text-ink-950 dark:text-white">Earnings & withdrawals</h2>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-right">
                        <div>
                            <p class="text-[9px] font-semibold uppercase tracking-[0.13em] text-ink-600 dark:text-white/30">This month</p>
                            <p class="mt-1 text-xs font-bold text-ink-950 dark:text-white">{{ $currency }}{{ number_format($currentMonthEarning, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-semibold uppercase tracking-[0.13em] text-ink-600 dark:text-white/30">Last month</p>
                            <p class="mt-1 text-xs font-bold text-ink-950 dark:text-white">{{ $currency }}{{ number_format($previousMonthEarning, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-3 sm:p-5">
                    <div id="ana_dash_1" class="flex h-[300px] items-center justify-center text-xs text-ink-600 dark:text-white/35">Loading chart…</div>
                </div>
            </article>

            <article class="overflow-hidden rounded-2xl border border-ink-950/8 bg-white shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                <div class="border-b border-ink-950/8 p-5 dark:border-white/8">
                    <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Portfolio activity</p>
                    <h2 class="mt-1 text-base font-bold text-ink-950 dark:text-white">Investment activity</h2>
                </div>
                <div class="p-3 sm:p-5">
                    <div id="stacked-column-chart-2" class="flex h-[300px] items-center justify-center text-xs text-ink-600 dark:text-white/35">Loading chart…</div>
                </div>
            </article>
        </section>

        {{-- Recent activity + referral --}}
        <section class="grid gap-4 xl:grid-cols-[1.35fr_.65fr]">
            <article class="overflow-hidden rounded-2xl border border-ink-950/8 bg-white shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                <div class="flex items-center justify-between gap-4 border-b border-ink-950/8 p-5 dark:border-white/8">
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Recent activity</p>
                        <h2 class="mt-1 text-base font-bold text-ink-950 dark:text-white">Latest ongoing investments</h2>
                    </div>
                    <a href="{{ route('investment.index') }}" class="text-xs font-bold text-ink-700 hover:text-bronze-700 dark:text-white/45 dark:hover:text-bronze-300">View all</a>
                </div>

                <div class="divide-y divide-ink-950/8 dark:divide-white/8">
                    @forelse($latests as $latest)
                        <a href="{{ route('invest_detail', ['id' => $latest->id]) }}" class="group grid gap-3 p-4 transition hover:bg-paper-50 sm:grid-cols-[1fr_auto_auto] sm:items-center sm:px-5 dark:hover:bg-white/[0.025]">
                            <div class="min-w-0">
                                <p class="truncate text-xs font-bold text-ink-950 dark:text-white">#{{ $latest->reference }}</p>
                                <p class="mt-1 text-[10px] text-ink-600 dark:text-white/35">{{ strtoupper($latest->created_at->format('d M, Y · h:i a')) }}</p>
                            </div>
                            <p class="text-sm font-bold text-ink-950 dark:text-white">{{ $currency }}{{ number_format($latest->amount, 2) }}</p>
                            <span class="inline-flex w-fit items-center gap-1.5 rounded-full bg-bronze-100 px-2.5 py-1 text-[9px] font-bold uppercase tracking-[0.12em] text-bronze-700 dark:bg-bronze-300/10 dark:text-bronze-300">
                                <span class="h-1.5 w-1.5 rounded-full bg-bronze-500"></span> Ongoing
                            </span>
                        </a>
                    @empty
                        <div class="p-8 text-center">
                            <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl bg-paper-100 text-ink-600 dark:bg-white/5 dark:text-white/40">@include('layouts.partials.user-nav-icon', ['icon' => 'chart'])</div>
                            <p class="mt-3 text-sm font-semibold text-ink-950 dark:text-white">No ongoing investments</p>
                            <p class="mt-1 text-xs text-ink-600 dark:text-white/38">New active investments will appear here.</p>
                        </div>
                    @endforelse
                </div>
            </article>

            <div class="space-y-4">
                <article class="rounded-2xl border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Referral</p>
                            <h2 class="mt-1 text-base font-bold text-ink-950 dark:text-white">Your referral link</h2>
                        </div>
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-paper-100 text-ink-700 dark:bg-white/5 dark:text-white/55">@include('layouts.partials.user-nav-icon', ['icon' => 'users'])</span>
                    </div>
                    <p class="mt-3 text-xs leading-5 text-ink-600 dark:text-white/38">Share your personal link when referring someone to {{ config('app.name') }}.</p>
                    <div class="mt-4 rounded-xl border border-ink-950/8 bg-paper-50 p-2 dark:border-white/8 dark:bg-black/10">
                        <input x-ref="referralLink" type="text" readonly value="{{ route('home.index', ['referral' => $user->username]) }}" class="w-full bg-transparent px-2 py-1 text-[10px] text-ink-700 outline-none dark:text-white/45">
                    </div>
                    <button
                        type="button"
                        @click="navigator.clipboard.writeText($refs.referralLink.value).then(() => { copied = true; setTimeout(() => copied = false, 1800) })"
                        class="mt-3 inline-flex w-full items-center justify-center rounded-xl bg-ink-950 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-ink-900 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200"
                    >
                        <span x-show="!copied">Copy referral link</span>
                        <span x-show="copied" x-cloak>Copied</span>
                    </button>
                </article>

                <article class="rounded-2xl border border-ink-950/8 bg-paper-50 p-5 dark:border-white/8 dark:bg-white/[0.025]">
                    <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-ink-600 dark:text-white/30">Need something else?</p>
                    <div class="mt-3 grid gap-2">
                        <a href="{{ route('transfer.index') }}" class="flex items-center justify-between rounded-xl bg-white px-3.5 py-3 text-xs font-bold text-ink-950 shadow-sm transition hover:-translate-y-0.5 dark:bg-white/5 dark:text-white">Transfer funds <span>→</span></a>
                        <a href="{{ route('setting.index') }}" class="flex items-center justify-between rounded-xl bg-white px-3.5 py-3 text-xs font-bold text-ink-950 shadow-sm transition hover:-translate-y-0.5 dark:bg-white/5 dark:text-white">Account settings <span>→</span></a>
                    </div>
                </article>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const earningsUrl = @json(route('earnings.chart', ['userId' => $user->id]));
                const withdrawalsUrl = @json(route('withdrawals.chart', ['userId' => $user->id]));
                const investmentUrl = @json(route('investments.chart', ['userId' => $user->id]));
                const currencySign = @json($currency);
                const isDark = document.documentElement.classList.contains('dark');
                const foreColor = isDark ? '#91a0a4' : '#657579';
                const gridColor = isDark ? 'rgba(255,255,255,.07)' : 'rgba(8,23,29,.08)';

                const money = value => `${currencySign}${Number(value || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

                Promise.all([fetch(earningsUrl), fetch(withdrawalsUrl)])
                    .then(responses => Promise.all(responses.map(response => response.json())))
                    .then(([earningsData, withdrawalsData]) => {
                        const container = document.querySelector('#ana_dash_1');
                        if (!container || !window.ApexCharts) return;
                        container.innerHTML = '';

                        new ApexCharts(container, {
                            chart: { height: 300, type: 'area', toolbar: { show: false }, zoom: { enabled: false }, background: 'transparent' },
                            series: [
                                { name: 'Earnings', data: earningsData },
                                { name: 'Withdrawals', data: withdrawalsData },
                            ],
                            colors: ['#c29d61', '#657579'],
                            dataLabels: { enabled: false },
                            stroke: { curve: 'smooth', width: [2.2, 1.8], dashArray: [0, 4] },
                            fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: .18, opacityTo: .02, stops: [0, 90, 100] } },
                            grid: { borderColor: gridColor, strokeDashArray: 4, padding: { left: 6, right: 6 } },
                            markers: { size: 0 },
                            xaxis: { type: 'datetime', labels: { style: { colors: foreColor, fontSize: '10px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
                            yaxis: { labels: { formatter: money, style: { colors: foreColor, fontSize: '10px' } } },
                            legend: { position: 'top', horizontalAlign: 'left', fontSize: '11px', labels: { colors: foreColor }, markers: { size: 5 } },
                            tooltip: { x: { format: 'dd MMM yyyy' }, y: { formatter: money } },
                        }).render();
                    })
                    .catch(() => {
                        const container = document.querySelector('#ana_dash_1');
                        if (container) container.textContent = 'Chart unavailable right now.';
                    });

                fetch(investmentUrl)
                    .then(response => response.json())
                    .then(investmentData => {
                        const container = document.querySelector('#stacked-column-chart-2');
                        if (!container || !window.ApexCharts) return;
                        container.innerHTML = '';

                        new ApexCharts(container, {
                            chart: { height: 300, type: 'bar', toolbar: { show: false }, zoom: { enabled: false }, background: 'transparent' },
                            series: [{ name: 'Investments', data: investmentData }],
                            colors: ['#d5b67d'],
                            plotOptions: { bar: { columnWidth: '34%', borderRadius: 5 } },
                            dataLabels: { enabled: false },
                            grid: { borderColor: gridColor, strokeDashArray: 4 },
                            xaxis: { type: 'datetime', labels: { style: { colors: foreColor, fontSize: '10px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
                            yaxis: { labels: { formatter: money, style: { colors: foreColor, fontSize: '10px' } } },
                            legend: { show: false },
                            tooltip: { x: { format: 'dd MMM yyyy' }, y: { formatter: money } },
                        }).render();
                    })
                    .catch(() => {
                        const container = document.querySelector('#stacked-column-chart-2');
                        if (container) container.textContent = 'Chart unavailable right now.';
                    });
            });
        </script>
    @endpush
@endsection
