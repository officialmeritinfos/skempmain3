@extends('layouts.marketing')

@section('title', config('app.name') . ' | Agriculture')
@section('meta_description', 'A disciplined view of agricultural investment, productive assets, operating risk and long-term portfolio relevance.')

@php
$assetPage = [
    'eyebrow' => 'Agriculture',
    'title' => 'Investing where capital meets the real economy.',
    'intro' => 'Agriculture can connect capital to productive assets, essential demand and long-duration economic activity. The opportunity is tangible—but so are weather, operating, commodity and execution risks.',
    'lens' => 'Productive assets. Real-world discipline.',
    'section_title' => 'Agriculture can diversify a portfolio, but only when the operating reality is understood.',
    'section_copy' => 'We look beyond the simplicity of “people will always need food.” Agricultural returns depend on the crop or activity, location, operator, input costs, logistics, pricing power, insurance, time horizon and exit structure.',
    'principles' => [
        ['Productive demand', 'Agriculture serves fundamental economic needs and can provide exposure to productive assets rather than purely financial instruments.'],
        ['Operational depth', 'The quality of the operator, supply chain, storage, distribution and agronomic execution can matter as much as the underlying commodity.'],
        ['Diversification', 'Selected agricultural exposure may behave differently from listed markets, but correlation benefits should never be assumed without analysis.'],
        ['Long-term relevance', 'Population, consumption and resource efficiency can create durable themes, while individual projects still require careful underwriting.'],
    ],
    'questions' => [
        ['What exactly produces the return?', 'We distinguish operating income, land appreciation, commodity pricing and contractual returns instead of treating “agriculture” as one uniform investment.'],
        ['What can disrupt production?', 'Weather, pests, water, inputs, labour, regulation and logistics can materially alter outcomes.'],
        ['Who controls execution?', 'Governance, operator capability and reporting quality are central to understanding risk.'],
        ['How liquid is the investment?', 'Many agricultural assets are long-duration and cannot be exited as easily as listed securities.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection
