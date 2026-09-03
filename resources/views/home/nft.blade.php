@extends('layouts.marketing')

@section('title', config('app.name') . ' | Digital Collectibles & NFTs')
@section('meta_description', 'A risk-aware view of NFTs, digital collectibles, liquidity, custody and speculative exposure.')

@php
$assetPage = [
    'eyebrow' => 'Digital collectibles & NFTs',
    'title' => 'Innovation does not remove the need for underwriting.',
    'intro' => 'NFTs and digital collectibles can represent ownership, access, culture or speculation. Their markets are young, fragmented and highly dependent on liquidity, community, platform quality and changing investor behaviour.',
    'lens' => 'High uncertainty. Small assumptions.',
    'section_title' => 'Digital scarcity can be real while investment value remains uncertain.',
    'section_copy' => 'We treat NFT exposure as a high-risk, specialised allocation rather than a substitute for a diversified core portfolio. Utility, provenance and technology matter, but so do market depth, custody, rights, counterparty risk and the possibility that demand disappears.',
    'principles' => [
        ['Speculative sizing', 'High uncertainty should be reflected in position size so one theme cannot define the portfolio’s outcome.'],
        ['Rights and utility', 'Owning a token does not automatically mean owning copyright, cash flow or legal rights to the underlying work.'],
        ['Liquidity risk', 'A quoted floor price is not the same as the ability to exit a meaningful position when market interest weakens.'],
        ['Custody and platform risk', 'Wallet security, smart contracts, marketplaces and counterparties introduce risks beyond the asset’s market price.'],
    ],
    'questions' => [
        ['What exactly does the token confer?', 'We separate ownership of the token from intellectual property, access rights, revenue rights or other claims.'],
        ['Where does demand come from?', 'Community enthusiasm can be powerful and temporary, so the durability of demand matters.'],
        ['How could the position be exited?', 'Thin markets can make valuations theoretical when buyers disappear.'],
        ['What loss can the portfolio tolerate?', 'Specialised speculative exposure should be sized with the possibility of severe or total loss in mind.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection
