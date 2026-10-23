@extends('layouts.investment-home')

@section('title', ($siteName ?? config('app.name')) . ' | Retirement & Long-Term Planning')
@section('meta_description', 'A disciplined approach to retirement planning, long-term capital, liquidity and income needs.')

@php
$assetPage = [
    'hero_heading' => 'Your next chapter.',
    'hero_accent' => 'A plan to get there.',
    'image' => 'family-future',
    'image_alt' => 'People enjoying time together outdoors',
    'related' => [['Stocks & ETFs', '/stocks'], ['Real estate', '/realestate'], ['Gold', '/gold']],

    'eyebrow' => 'Retirement & long-term planning',
    'title' => 'Retirement is not a date. It is a funding problem to solve deliberately.',
    'intro' => 'Long-term planning is about converting today’s capital into future flexibility—balancing growth, income, liquidity, inflation and the risk of needing money at the wrong time.',
    'lens' => 'Future income with present discipline.',
    'section_title' => 'A retirement portfolio must survive more than one market cycle.',
    'section_copy' => 'The important questions go beyond how much a portfolio might grow. We consider spending needs, time horizon, inflation, sequence-of-returns risk, emergency liquidity and how the allocation should evolve as the objective gets closer.',
    'principles' => [
        ['Time horizon', 'Longer horizons can support growth exposure, but the allocation should change as future obligations become nearer and more certain.'],
        ['Income planning', 'Future withdrawals should be considered when structuring assets so the portfolio is not forced to sell risk assets at the wrong time.'],
        ['Inflation awareness', 'Preserving nominal capital is not enough if purchasing power erodes over decades.'],
        ['Flexibility', 'Life rarely follows a spreadsheet exactly, so the plan should leave room for changing needs, family responsibilities and unexpected events.'],
    ],
    'questions' => [
        ['What future lifestyle is being funded?', 'We start with expected spending and obligations rather than a generic target number.'],
        ['When will the money be needed?', 'Different time horizons call for different levels of liquidity and risk.'],
        ['What happens in a poor market early in retirement?', 'Sequence risk can make the timing of withdrawals as important as long-term average returns.'],
        ['How often should the plan be reviewed?', 'Contributions, spending, markets and personal circumstances change, so the retirement strategy should be revisited periodically.'],
    ],
];
@endphp

@section('content')
    @include('home.partials.asset-page', ['assetPage' => $assetPage])
@endsection

