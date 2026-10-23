@extends('layouts.investment-home')

@section('title', ($siteName ?? config('app.name')) . ' | Gold')
@section('meta_description', 'A disciplined view of gold, defensive allocation, liquidity and portfolio role.')

@php
$assetPage = [
    'hero_heading' => 'A different asset.',
    'hero_accent' => 'A considered role.',
    'image' => 'gold-bars',
    'image_alt' => 'Gold bars arranged on a dark surface',
    'related' => [['Stocks & ETFs', '/stocks'], ['Foreign exchange', '/forex'], ['Real estate', '/realestate']],

    'eyebrow' => 'Gold',
    'title' => 'A defensive asset still needs an investment thesis.',
    'intro' => 'Gold has played different roles across market cycles—as a store of value, a diversification asset and a response to uncertainty. Its usefulness depends on why it is held and how much of the portfolio depends on that thesis.',
    'lens' => 'Resilience without blind faith.',
    'section_title' => 'Gold can reduce dependence on some risks while introducing others.',
    'section_copy' => 'Unlike an operating business, gold does not generate earnings or cash flow. Its value is shaped by supply and demand, real interest rates, currency conditions, investor behaviour and the form in which exposure is held.',
    'principles' => [
        ['Diversification', 'Gold may behave differently from equities or credit in some environments, which can make it useful as a portfolio diversifier.'],
        ['No cash flow', 'Because gold does not generate operating income, valuation depends on market demand and opportunity cost.'],
        ['Implementation matters', 'Physical holdings, funds and other structures introduce different custody, liquidity, fee and counterparty considerations.'],
        ['Sizing matters', 'A defensive allocation can become a concentration risk if the position grows beyond the purpose it was meant to serve.'],
    ],
    'questions' => [
        ['What portfolio risk is gold meant to offset?', 'We define the intended defensive role before choosing an allocation.'],
        ['How will the exposure be held?', 'Custody, liquidity, costs and counterparty risk differ by structure.'],
        ['What is the opportunity cost?', 'Capital allocated to gold is capital not allocated to cash-generating assets.'],
        ['When would the allocation change?', 'A durable strategy still needs review rules as markets and portfolio needs evolve.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection

