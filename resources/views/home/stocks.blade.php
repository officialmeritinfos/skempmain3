@extends('layouts.investment-home')

@section('title', ($siteName ?? config('app.name')) . ' | Stocks & ETFs')
@section('meta_description', 'A disciplined view of listed equities, ETFs, diversification and long-term ownership.')

@php
$assetPage = [
    'hero_heading' => 'A stake in business.',
    'hero_accent' => 'A world of opportunity.',
    'image' => 'global-markets',
    'image_alt' => 'Market prices on a financial chart',
    'related' => [['Real estate', '/realestate'], ['Foreign exchange', '/forex'], ['Retirement planning', '/retirement-and-iras']],

    'eyebrow' => 'Stocks & ETFs',
    'title' => 'Own businesses with a reason, not a ticker.',
    'intro' => 'Listed markets make it easy to buy and sell. That convenience should not replace the work of understanding what is owned, what assumptions support the valuation and how each position contributes to the portfolio.',
    'lens' => 'Ownership, diversification and discipline.',
    'section_title' => 'Public markets reward patience, but not every price or portfolio deserves patience.',
    'section_copy' => 'We look at equities as ownership interests and ETFs as implementation tools. The objective is to understand the source of expected return, the risks being concentrated and whether the portfolio is diversified by genuine economic drivers rather than ticker count alone.',
    'principles' => [
        ['Business quality', 'For individual equities, cash generation, competitive position, balance sheet strength and management quality matter.'],
        ['Valuation discipline', 'A good business can still be a poor investment when the price embeds unrealistic expectations.'],
        ['True diversification', 'Owning many securities does not necessarily diversify a portfolio if they depend on the same sector, factor or macro environment.'],
        ['Implementation fit', 'ETFs can offer efficient exposure, but index construction, concentration, fees and liquidity still deserve attention.'],
    ],
    'questions' => [
        ['What economic exposure are we buying?', 'We look through the ticker to understand sector, factor, geography and underlying business drivers.'],
        ['What assumptions are embedded in the price?', 'Expected growth, margins, interest rates and market sentiment can all influence valuation.'],
        ['How much overlap exists?', 'Funds and individual securities can create hidden concentration when they own many of the same assets.'],
        ['What would make us change the position?', 'A clear thesis should include the facts that would invalidate it, not only the facts that support it.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection

