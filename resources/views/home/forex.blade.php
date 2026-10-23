@extends('layouts.investment-home')

@section('title', ($siteName ?? config('app.name')) . ' | Foreign Exchange')
@section('meta_description', 'A disciplined view of foreign exchange exposure, currency risk and portfolio relevance.')

@php
$assetPage = [
    'hero_heading' => 'A world of currencies.',
    'hero_accent' => 'A clear purpose.',
    'image' => 'currency-notes',
    'image_alt' => 'US dollar banknotes',
    'related' => [['Stocks & ETFs', '/stocks'], ['Gold', '/gold'], ['Digital assets', '/buy-btc']],

    'eyebrow' => 'Foreign exchange',
    'title' => 'Currency exposure should serve a purpose, not become a prediction contest.',
    'intro' => 'Foreign exchange markets are deep, liquid and highly responsive to policy, inflation, growth and global capital flows. That makes currency exposure useful in some strategies—and unforgiving when approached without discipline.',
    'lens' => 'Currency as exposure, hedge and risk.',
    'section_title' => 'FX can protect, diversify or amplify risk depending on how it is used.',
    'section_copy' => 'We separate genuine portfolio currency needs from speculative trading. The important questions are what exposure already exists, what currency future obligations are in, how volatile the position can be and what role any FX allocation is meant to play.',
    'principles' => [
        ['Portfolio context', 'Currency exposure should be understood alongside the currencies of your income, liabilities, assets and future obligations.'],
        ['Macro sensitivity', 'Interest rates, inflation, policy decisions and capital flows can reprice currencies quickly.'],
        ['Liquidity with volatility', 'FX markets can be liquid, but leverage and rapid moves can turn liquidity into false comfort.'],
        ['Purpose first', 'A hedge, a diversification position and a directional trade are fundamentally different decisions.'],
    ],
    'questions' => [
        ['Why hold the currency exposure?', 'We define whether the objective is hedging, diversification, liquidity management or a tactical view.'],
        ['What happens if the currency moves sharply?', 'Position sizing and downside scenarios matter more than confidence in a forecast.'],
        ['Is leverage involved?', 'Leverage can magnify both gains and losses and materially changes the risk profile.'],
        ['What is the exit discipline?', 'The strategy should define when the reason for holding the exposure is no longer valid.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection

