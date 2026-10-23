<a class="pd-brand" href="{{ route('user.dashboard') }}">
    <span class="pd-brand-mark">{{ mb_strtoupper(mb_substr($siteName ?? $web->name, 0, 1)) }}<i></i></span>
    <span><strong>{{ $siteName ?? $web->name }}</strong><small>Investor portal</small></span>
</a>
<div class="pd-sidebar-scroll">
    <p class="pd-nav-label">Your portfolio</p>
    <nav class="pd-navigation" aria-label="Portfolio">
        @foreach($portfolioNav as $item)
            @php $active = collect($item[2])->contains(fn($pattern) => request()->routeIs($pattern)); @endphp
            <a href="{{ route($item[1]) }}" class="{{ $active ? 'is-active' : '' }}" @if($active) aria-current="page" @endif>
                @include('layouts.partials.user-nav-icon', ['icon'=>$item[3]])<span>{{ $item[0] }}</span>@if($active)<i class="pd-nav-dot" aria-hidden="true"></i>@endif
            </a>
        @endforeach
    </nav>
    <p class="pd-nav-label">Account & services</p>
    <nav class="pd-navigation pd-secondary-navigation" aria-label="Account and services">
        @foreach($accountNav as $item)
            <a href="{{ route($item[1]) }}" class="{{ request()->routeIs($item[1]) ? 'is-active' : '' }}" @if(request()->routeIs($item[1])) aria-current="page" @endif>@include('layouts.partials.user-nav-icon', ['icon'=>$item[2]])<span>{{ $item[0] }}</span></a>
        @endforeach
    </nav>
    <div class="pd-support-card"><span class="pd-support-icon">@include('user.portfolio.icon', ['name'=>'support'])</span><h2>A little help?</h2><p>Our team is here for your account questions.</p><a href="{{ url('contact') }}">Get in touch <span aria-hidden="true">↗</span></a></div>
</div>
<a class="pd-sidebar-user" href="{{ route('setting.index') }}"><span class="pd-avatar">{{ $initials ?: 'U' }}</span><span><strong>{{ $displayName }}</strong><small>&#64;{{ $user->username }}</small></span>@include('user.portfolio.icon', ['name'=>'chevron'])</a>
