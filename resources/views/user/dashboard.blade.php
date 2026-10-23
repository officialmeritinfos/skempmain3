@extends('layouts.portfolio')
@section('title', 'Overview')
@section('content')
@inject('injected','App\Defaults\Custom')
@php
    $firstName = preg_split('/\s+/', trim((string) ($user->name ?: $user->username)))[0];
    $todayEarning = $injected->userDailyEarning($user->id);
    $monthEarning = $injected->userCurrentMonthEarning($user->id);
    $previousEarning = $injected->userPreviousMonthEarning($user->id);
@endphp
<div class="pd-page-heading"><div><p class="pd-eyebrow">Your portfolio, at a glance</p><h1>Welcome back, {{ $firstName }}.</h1><p class="pd-page-description">A clear view of your balances, investments and account activity.</p></div><a class="pd-button" href="{{ route('new_investment') }}">@include('user.portfolio.icon',['name'=>'plus'])New investment</a></div>
<div class="pd-overview-grid">
    <section class="pd-balance-card"><div class="pd-balance-top"><h2 class="pd-section-label">Available balance</h2><button type="button" data-hide-balances aria-label="Hide balances" aria-pressed="false">@include('user.portfolio.icon',['name'=>'eye'])</button></div><p class="pd-balance-amount pd-money" data-sensitive>${{ number_format($user->balance,2) }}</p><p class="pd-balance-caption">Your account balance in USD</p><a href="{{ route('new_deposit') }}" class="pd-link">Add money @include('user.portfolio.icon',['name'=>'arrow'])</a></section>
    @foreach([['Profit balance',$user->profit,'chart','Available earnings'],['Active investments',$ongoingInvestments,'briefcase','Capital in active plans'],['Earned this month',$monthEarning,'deposit','Credited investment returns']] as $stat)
    <section class="pd-card pd-stat"><div class="pd-stat-top"><h2 class="pd-section-label">{{ $stat[0] }}</h2><span class="pd-stat-icon">@include('layouts.partials.user-nav-icon',['icon'=>$stat[2]])</span></div><div><p class="pd-stat-value pd-money" data-sensitive>${{ number_format($stat[1],2) }}</p><p class="pd-caption">{{ $stat[3] }}</p></div></section>
    @endforeach
</div>
<nav class="pd-quick-actions" aria-label="Money actions">
@foreach([['Deposit funds','new_deposit','deposit'],['Withdraw','new_withdrawal','withdraw'],['Transfer funds','transfer.index','transfer'],['View investments','investment.index','chart']] as $action)
<a href="{{ route($action[1]) }}"><span class="pd-quick-icon">@include('layouts.partials.user-nav-icon',['icon'=>$action[2]])</span><span>{{ $action[0] }}</span>@include('user.portfolio.icon',['name'=>'external'])</a>
@endforeach
</nav>
@if($promos->isNotEmpty() || $notifications->isNotEmpty())
<div class="pd-notices">
@foreach($notifications as $notification)<details class="pd-notice"><summary>@include('user.portfolio.icon',['name'=>'info'])<span>{{ $notification->title }}</span>@include('user.portfolio.icon',['name'=>'chevron'])</summary><div class="pd-notice-content">{!! $notification->content !!}</div></details>@endforeach
@foreach($promos as $promo)<details class="pd-notice"><summary>@include('user.portfolio.icon',['name'=>'info'])<span>{{ $promo->title }}</span>@include('user.portfolio.icon',['name'=>'chevron'])</summary><div class="pd-notice-content">{!! $promo->content !!}<br><a class="pd-link" href="{{ route('user.enrollPromo',['id'=>$promo->id]) }}">Express interest @include('user.portfolio.icon',['name'=>'arrow'])</a></div></details>@endforeach
</div>
@endif
<div class="pd-dashboard-columns">
    <div class="pd-stack">
        <section class="pd-card" data-chart-root>
            <div class="pd-card-heading"><div><h2>Portfolio activity</h2><p>Daily totals from your account records</p></div><div class="pd-chart-tabs" role="group" aria-label="Activity category"><button type="button" data-chart-url="{{ route('earnings.chart',['userId'=>$user->id]) }}" aria-pressed="true">Earnings</button><button type="button" data-chart-url="{{ route('investments.chart',['userId'=>$user->id]) }}" aria-pressed="false">Investments</button><button type="button" data-chart-url="{{ route('withdrawals.chart',['userId'=>$user->id]) }}" aria-pressed="false">Withdrawals</button></div></div>
            <div class="pd-chart"><div class="pd-chart-top"><div><p class="pd-chart-total pd-money" data-sensitive data-chart-total>—</p><p><span data-chart-series>Earnings</span> · all available records</p></div><p class="pd-caption" data-chart-period>All available records</p></div><div data-financial-chart><div class="pd-chart-canvas" data-chart-canvas><p class="pd-chart-message">Loading account activity…</p></div></div><p class="pd-chart-message" data-chart-hidden hidden>Balances are hidden.</p><noscript><p class="pd-caption">Enable JavaScript to view account activity. Your balances and investment records are available on this page.</p></noscript><details class="pd-chart-details"><summary>View activity data · daily totals in UTC</summary><div class="pd-chart-data"><table><thead><tr><th scope="col">Date</th><th scope="col">Amount (USD)</th></tr></thead><tbody data-chart-table></tbody></table></div></details></div>
        </section>
        <section class="pd-card pd-table-card"><div class="pd-card-heading"><div><h2>Active investments <span class="pd-count">Up to 5 records</span></h2><p>Your current allocations and credited returns</p></div><a class="pd-link" href="{{ route('investment.index') }}">View all @include('user.portfolio.icon',['name'=>'arrow'])</a></div>
        @if($latests->isNotEmpty())
            <div class="pd-table-scroll"><table class="pd-table"><thead><tr><th scope="col">Investment</th><th scope="col">Capital</th><th scope="col">Profit earned</th><th scope="col"><span class="pd-sr-only">Details</span></th></tr></thead><tbody>
            @foreach($latests as $latest)<tr><td data-label="Investment"><div class="pd-table-reference"><span class="pd-row-icon">@include('layouts.partials.user-nav-icon',['icon'=>'chart'])</span><span><strong class="pd-table-title">#{{ $latest->reference }}</strong><span class="pd-table-subtitle">{{ $latest->created_at->format('d M Y') }}</span></span></div></td><td data-label="Capital"><span class="pd-money" data-sensitive>${{ number_format($latest->amount,2) }}</span></td><td data-label="Profit earned"><span class="pd-money pd-text-success" data-sensitive>${{ number_format($latest->currentProfit,2) }}</span></td><td class="pd-cell-action"><a class="pd-link" href="{{ route('invest_detail',['id'=>$latest->id]) }}" aria-label="View investment {{ $latest->reference }}">Details @include('user.portfolio.icon',['name'=>'arrow'])</a></td></tr>@endforeach
            </tbody></table></div>
        @else
            @include('user.portfolio.empty',['icon'=>'chart','heading'=>'Your portfolio starts here','description'=>'Choose an investment plan to see your allocations and return progress in one place.','action'=>route('new_investment'),'actionLabel'=>'Explore plans'])
        @endif
        </section>
        <section class="pd-card"><div class="pd-card-heading"><h2>Account snapshot</h2><span class="pd-caption">Amounts in USD</span></div><div class="pd-card-body pd-detail-grid">
            @foreach([['Earned today',$todayEarning],['Pending deposits',$pendingDeposit],['Completed withdrawals',$withdrawals],['Completed investments',$completedInvestments],['Last month’s earnings',$previousEarning],['Cancelled investments',$cancelledInvestments]] as $snapshot)<div><p class="pd-caption">{{ $snapshot[0] }}</p><p class="pd-money" style="font-size:19px;margin-top:7px" data-sensitive>${{ number_format($snapshot[1],2) }}</p></div>@endforeach
        </div></section>
    </div>
    <aside class="pd-stack pd-dashboard-rail">
        <section class="pd-card"><div class="pd-card-heading"><h2>Your balances</h2><span class="pd-caption">USD</span></div><div class="pd-card-body"><div class="pd-account-balances">@foreach([['Account',$user->balance],['Profit',$user->profit],['Referral',$user->refBal],['Bonus',$user->bonus]] as $balance)<div class="pd-account-row"><span><i aria-hidden="true"></i>{{ $balance[0] }}</span><strong data-sensitive>${{ number_format($balance[1],2) }}</strong></div>@endforeach</div><div class="pd-account-total"><span>Pending deposits</span><strong data-sensitive>${{ number_format($pendingDeposit,2) }}</strong></div></div></section>
        <section class="pd-note">@include('user.portfolio.icon',['name'=>'shield'])<h2>Keep your account up to date.</h2><p>Review your account details and identity information from your settings.</p><a class="pd-link" href="{{ route('setting.index') }}">Account settings @include('user.portfolio.icon',['name'=>'arrow'])</a></section>
        <section class="pd-card pd-card-body"><h2 class="pd-card-title">Share your referral link</h2><p class="pd-caption" style="margin-top:8px">Invite someone to discover {{ $siteName }}.</p><div class="pd-referral"><label class="pd-sr-only" for="portfolio-referral">Your referral link</label><input type="text" readonly id="portfolio-referral" value="{{ route('home.index',['referral'=>$user->username]) }}"><button type="button" data-copy="portfolio-referral" aria-label="Copy referral link">@include('user.portfolio.icon',['name'=>'copy'])</button></div><a class="pd-link" style="margin-top:14px" href="{{ route('referral.index') }}">View referrals @include('user.portfolio.icon',['name'=>'arrow'])</a></section>
    </aside>
</div>
@endsection
