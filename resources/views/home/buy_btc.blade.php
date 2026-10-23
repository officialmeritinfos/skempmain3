@extends('layouts.investment-home')

@section('title', ($siteName ?? config('app.name')) . ' | Bitcoin & Digital Assets')
@section('meta_description', 'A risk-aware introduction to Bitcoin exposure, custody, liquidity and portfolio sizing.')

@php
$assetPage = [
    'hero_heading' => 'New possibilities.',
    'hero_accent' => 'The same need for care.',
    'image' => 'digital-assets',
    'image_alt' => 'Bitcoin coins representing digital assets',
    'related' => [['NFTs & collectibles', '/nft'], ['Stocks & ETFs', '/stocks'], ['Foreign exchange', '/forex']],

    'eyebrow' => 'Bitcoin & digital assets',
    'title' => 'Access is easy. Understanding the risk is the harder part.',
    'intro' => 'Bitcoin is globally traded, highly liquid in major markets and historically volatile. For investors considering exposure, the important questions are not only where to buy, but why to own it, how to hold it and how much risk the wider portfolio can absorb.',
    'lens' => 'Conviction without concentration.',
    'section_title' => 'Digital-asset exposure needs the same discipline as any other investment—plus additional operational care.',
    'section_copy' => 'Bitcoin can offer a distinct return profile, but price volatility, custody, platform risk, regulation and investor behaviour can produce large swings. We treat it as a specialised allocation whose role and size should be explicit.',
    'principles' => [
        ['Volatility first', 'Large price moves are normal in digital-asset markets, so position sizing matters before any return thesis.'],
        ['Custody matters', 'Self-custody, exchanges and custodians introduce different security, access and counterparty risks.'],
        ['Liquidity is not stability', 'Deep trading markets can make an asset easy to transact without making its price predictable.'],
        ['Portfolio role', 'Exposure should be considered in the context of existing risk, liquidity needs and the ability to tolerate drawdowns.'],
    ],
    'questions' => [
        ['Why own Bitcoin?', 'We define the thesis—diversification, scarcity, adoption, tactical exposure or another objective—before implementation.'],
        ['How will it be held?', 'Custody choice affects security, recovery options, counterparty exposure and operational responsibility.'],
        ['What drawdown can be tolerated?', 'Sizing should reflect the possibility of severe volatility rather than assuming recent market conditions will continue.'],
        ['How does it interact with the rest of the portfolio?', 'The decision should account for existing growth, technology and speculative exposure elsewhere.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection

