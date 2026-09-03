@extends('layouts.marketing')

@section('title', config('app.name') . ' | Careers')
@section('meta_description', 'Careers at our investment, wealth and asset management company.')

@section('content')
<section class="relative overflow-hidden bg-ink-950 text-white">
    <div class="absolute inset-0 opacity-60" aria-hidden="true"><div class="absolute -right-24 top-12 h-96 w-96 rounded-full border border-bronze-300/10"></div><div class="absolute right-16 top-40 h-52 w-52 rounded-full border border-white/5"></div></div>
    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl"><p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Careers</p><h1 class="mt-5 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Do careful work on decisions that matter.</h1><p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg">We are building a company around disciplined thinking, client trust and long-term stewardship. That requires people who can combine judgement with execution and who are comfortable doing the unglamorous work behind good outcomes.</p></div>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.7fr_1.3fr] lg:gap-20">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up"><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">How we work</p><h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-ink-950 sm:text-5xl">The Alpine ibex principle applies to the team too.</h2><p class="mt-5 text-base leading-8 text-ink-700">Sure footing, patience, resilience and steady progress are not only brand metaphors. They describe the kind of operating culture we want to build.</p></div>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach([
                    ['Think before moving', 'Understand the problem, the client and the downside before rushing toward an answer.'],
                    ['Own the outcome', 'Good work is not just completing a task. It is noticing what could fail and closing the loop.'],
                    ['Communicate clearly', 'Complex financial work becomes more trustworthy when reasoning, assumptions and decisions are understandable.'],
                    ['Keep learning', 'Markets, technology and client expectations change. Curiosity is part of staying useful.'],
                    ['Protect trust', 'Handle information, money and client relationships with the care their sensitivity demands.'],
                    ['Stay durable', 'We value people who can work steadily through difficult problems without creating unnecessary drama around them.'],
                ] as $value)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-[1.6rem] border border-ink-950/8 bg-white p-6 sm:p-7" style="--reveal-delay: {{ ($loop->index % 4) * 60 }}ms"><span class="text-xs font-bold tracking-[0.18em] text-bronze-600">0{{ $loop->iteration }}</span><h3 class="mt-8 font-display text-2xl font-semibold text-ink-950">{{ $value[0] }}</h3><p class="mt-3 text-sm leading-7 text-ink-700">{{ $value[1] }}</p></article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-ink-900 py-20 text-white sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.82fr_1.18fr] lg:gap-20">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Who fits here</p><h2 class="mt-4 font-display text-4xl font-semibold leading-tight sm:text-5xl">People who respect both detail and responsibility.</h2></div>
            <div class="divide-y divide-white/10 border-y border-white/10">@foreach([['Analytical','You can break a broad problem into assumptions, evidence, trade-offs and a decision.'],['Client-minded','You understand that clarity, responsiveness and reliability shape trust as much as technical skill.'],['Practical','You prefer useful solutions over complicated work that exists only to look impressive.'],['Accountable','You raise risks early, document what matters and follow through when the task stops being interesting.']] as $trait)<div class="grid gap-4 py-7 sm:grid-cols-[54px_1fr]"><span class="text-xs font-bold text-bronze-300">0{{ $loop->iteration }}</span><div><h3 class="text-lg font-semibold">{{ $trait[0] }}</h3><p class="mt-2 text-sm leading-7 text-white/48">{{ $trait[1] }}</p></div></div>@endforeach</div>
        </div>
    </div>
</section>

<section class="bg-paper-100 py-20 sm:py-24"><div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="rounded-[2rem] bg-bronze-300 p-7 text-ink-950 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12"><div><p class="text-xs font-bold uppercase tracking-[0.2em] text-ink-950/55">Interested in joining?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">Send us the work you are proud of and the problems you want to solve.</h2><p class="mt-5 max-w-2xl text-base leading-8 text-ink-950/65">If there is no role published right now, a thoughtful introduction is still more useful than a generic application.</p></div>@if($web->email)<a href="mailto:{{ $web->email }}?subject=Career%20at%20{{ rawurlencode(config('app.name')) }}" class="mt-7 inline-flex shrink-0 items-center justify-center rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900 lg:mt-0">Introduce yourself</a>@else<a href="{{ url('/contact') }}" class="mt-7 inline-flex shrink-0 items-center justify-center rounded-full bg-ink-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900 lg:mt-0">Contact the team</a>@endif</div></div></section>
@endsection
