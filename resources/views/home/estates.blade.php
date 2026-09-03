@extends('layouts.marketing')

@section('title', config('app.name') . ' | Real Estate')
@section('meta_description', 'A disciplined view of real estate, income, liquidity, concentration and long-term portfolio relevance.')

@php
$assetPage = [
    'eyebrow' => 'Real estate',
    'title' => 'Real assets need real underwriting.',
    'intro' => 'Property can provide income, long-duration exposure and tangible collateral, but location, financing, tenant quality, operating costs and liquidity can matter more than the headline appreciation story.',
    'lens' => 'Income, resilience and tangible value.',
    'section_title' => 'Real estate is not one asset class with one risk profile.',
    'section_copy' => 'Residential, commercial, hospitality, development and income-producing properties behave differently. We focus on the specific economics of the opportunity rather than assuming that property ownership is automatically defensive.',
    'principles' => [
        ['Cash-flow quality', 'Rent, occupancy, lease structure and operating expenses determine whether the asset can support itself through different conditions.'],
        ['Location and demand', 'Local supply, infrastructure, employment and demographic patterns can materially change long-term outcomes.'],
        ['Financing discipline', 'Debt can improve capital efficiency while also making a property more fragile when rates, occupancy or valuations change.'],
        ['Liquidity reality', 'Property takes time and transaction cost to sell, so the holding period must fit the investor’s wider liquidity needs.'],
    ],
    'questions' => [
        ['What actually drives the income?', 'We examine occupancy, tenant quality, lease terms and operating assumptions rather than relying only on projected appreciation.'],
        ['How sensitive is the asset to financing?', 'Interest cost, refinancing risk and debt maturity can materially change the investment case.'],
        ['What is the concentration risk?', 'A large property position can tie significant wealth to one location, tenant base or economic theme.'],
        ['What is the realistic exit path?', 'We consider saleability, market depth, transaction costs and the expected holding period from the beginning.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection
