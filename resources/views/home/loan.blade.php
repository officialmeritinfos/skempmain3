@extends('layouts.investment-home')
@section('title', 'Financing | ' . ($siteName ?? config('app.name')))
@section('meta_description', 'Explore financing considerations, from cash flow and affordability to structure, collateral and repayment.')
@section('content')
@include('home.partials.page-hero', ['label' => 'Financing', 'heading' => 'A way forward.', 'accent' => 'A plan behind it.', 'intro' => 'Financing can give you flexibility today. Understanding the commitment it creates is just as important. Start with the purpose, the cost and a realistic plan for repayment.', 'image' => asset('home/redesign/images/real-estate.webp'), 'imageAlt' => 'A contemporary home at dusk', 'imageNote' => 'Consider the opportunity and the obligation.', 'actionLabel' => 'Discuss your financing needs'])
<section class="ih-section"><div class="ih-container"><div class="ih-page-section-heading"><div><p class="ih-eyebrow"><span></span>Before you borrow</p><h2>Understand<br><em>the commitment.</em></h2></div><p>The amount is only the beginning. The repayment schedule, currency, rate and any security attached to the financing can shape your options for years.</p></div><div class="ih-number-grid">@foreach([
['Purpose', 'What would financing make possible, and is borrowing the right way to fund it? Compare it with using existing capital or adjusting the timing.'],
['Cash flow', 'Consider whether repayment obligations remain manageable if income falls, costs rise or circumstances change.'],
['Structure', 'Review the rate, duration, fees, currency, collateral and conditions together. A low headline rate does not tell the whole story.'],
['Repayment', 'Know how the obligation will be met, including any final payment, refinancing requirement or conditions for releasing collateral.'],
] as $item)<article class="ih-number-card"><span>0{{ $loop->iteration }}</span><h3>{{ $item[0] }}</h3><p>{{ $item[1] }}</p></article>@endforeach</div></div></section>
<section class="ih-section ih-surface"><div class="ih-container ih-question-layout"><div><p class="ih-eyebrow"><span></span>The wider picture</p><h2>Keep your future<br><em>options in view.</em></h2><div class="ih-prose" style="margin-top:23px"><p>Borrowing belongs in the same conversation as your other financial commitments. Consider what it preserves today, what repayment will require tomorrow and what could change along the way.</p></div></div><div class="ih-question-list">@foreach([
['Liquidity', 'How much accessible capital remains after the initial transaction, fees and ongoing repayments?'],
['Affordability', 'What happens if income weakens or a variable interest rate increases?'],
['Collateral', 'Which assets are committed, and what could happen to them if an obligation cannot be met?'],
['The full terms', 'Check eligibility, fees, repayment conditions and the consequences of late or missed payments before applying.'],
] as $item)<div class="ih-question-row"><span>0{{ $loop->iteration }}</span><div><h3>{{ $item[0] }}</h3><p>{{ $item[1] }}</p></div></div>@endforeach</div></div></section>
@include('home.partials.page-cta', ['label' => 'Financing enquiries', 'heading' => 'Start with the details that matter.', 'copy' => 'Use the client area to review the financing application process. Availability, eligibility and terms are subject to the information provided for your application.', 'button' => 'Go to client area', 'href' => route('loans.index')])
@endsection
