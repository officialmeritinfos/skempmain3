@php
    $directoryAreas = [
        ['Real estate', 'Property, income and long-term value.', '/realestate'],
        ['Stocks & ETFs', 'Businesses, public markets and diversification.', '/stocks'],
        ['Gold', 'A different perspective on portfolio resilience.', '/gold'],
        ['Agriculture', 'Productive assets in the real economy.', '/agriculture'],
        ['Foreign exchange', 'Understanding your currency exposure.', '/forex'],
        ['Retirement planning', 'Connecting today’s choices to future needs.', '/retirement-and-iras'],
        ['Digital assets', 'Bitcoin, custody and portfolio considerations.', '/buy-btc'],
        ['NFTs & collectibles', 'A closer look at a specialised market.', '/nft'],
    ];
@endphp
<section class="ih-section ih-surface" id="investment-areas"><div class="ih-container"><div class="ih-page-section-heading"><div><p class="ih-eyebrow"><span></span>Explore further</p><h2>Different assets.<br><em>A broader view.</em></h2></div><p>Get to know the opportunities and the considerations behind each investment area.</p></div><div class="ih-directory-grid">@foreach($directoryAreas as $directoryArea)<a href="{{ url($directoryArea[2]) }}"><span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><div><h3>{{ $directoryArea[0] }}</h3><p>{{ $directoryArea[1] }}</p></div><svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a>@endforeach</div></div></section>
