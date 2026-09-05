@extends('layouts.marketing')

@section('title', config('app.name') . ' | Careers')
@section('meta_description', 'Careers at ' . config('app.name') . ', a wealth, asset and investment management company.')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div><div class="glow-orb glow-orb-top"></div><div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <span class="inline-flex rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl">Careers</span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Do careful work on <span class="aurora-text">decisions that matter.</span></h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/66 sm:text-lg">We are building {{ config('app.name') }} around disciplined thinking, client trust and long-term stewardship. That requires people who combine judgement with execution and take responsibility for the quality of the work.</p>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.7fr_1.3fr] lg:gap-16">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up"><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">How we work</p><h2 class="mt-4 font-display text-4xl font-bold leading-tight sm:text-5xl">Thoughtful, accountable and built for trust.</h2><p class="mt-5 text-base leading-8 text-white/64">The culture we want is simple: think before moving, communicate clearly, protect trust and own the outcome.</p></div>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach([['Think before moving','Understand the problem, the client and the downside before rushing toward an answer.'],['Own the outcome','Good work is not just completing a task. It is noticing what could fail and closing the loop.'],['Communicate clearly','Complex financial work becomes more trustworthy when reasoning, assumptions and decisions are understandable.'],['Keep learning','Markets, technology and client expectations change. Curiosity is part of staying useful.'],['Protect trust','Handle information, money and client relationships with the care their sensitivity demands.'],['Stay durable','We value people who can work steadily through difficult problems without creating unnecessary drama around them.']] as $value)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card rounded-[1.6rem] border border-white/10 bg-white/[0.05] p-6 backdrop-blur-xl sm:p-7" style="--reveal-delay: {{ ($loop->index % 4) * 60 }}ms"><span class="text-xs font-bold tracking-[0.18em] text-cyan-200/75">0{{ $loop->iteration }}</span><h3 class="mt-8 font-display text-2xl font-semibold">{{ $value[0] }}</h3><p class="mt-3 text-sm leading-7 text-white/62">{{ $value[1] }}</p></article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#030712] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.82fr_1.18fr] lg:gap-20">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-fuchsia-200/80">Who fits here</p><h2 class="mt-4 font-display text-4xl font-bold leading-tight sm:text-5xl">People who respect both detail and responsibility.</h2></div>
            <div class="divide-y divide-white/10 border-y border-white/10">@foreach([['Analytical','You can break a broad problem into assumptions, evidence, trade-offs and a decision.'],['Client-minded','You understand that clarity, responsiveness and reliability shape trust as much as technical skill.'],['Practical','You prefer useful solutions over complicated work that exists only to look impressive.'],['Accountable','You raise risks early, document what matters and follow through when the task stops being interesting.']] as $trait)<div class="grid gap-4 py-7 sm:grid-cols-[54px_1fr]"><span class="text-xs font-bold text-cyan-200">0{{ $loop->iteration }}</span><div><h3 class="text-lg font-semibold">{{ $trait[0] }}</h3><p class="mt-2 text-sm leading-7 text-white/52">{{ $trait[1] }}</p></div></div>@endforeach</div>
        </div>
    </div>
</section>

<section class="bg-[#07111e] py-24 text-white sm:py-28"><div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12"><div><p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-200/80">Interested in joining?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight sm:text-5xl">Send us the work you are proud of and the problems you want to solve.</h2><p class="mt-5 max-w-2xl text-base leading-8 text-white/62">If there is no role published right now, a thoughtful introduction is still more useful than a generic application.</p></div>@if($web->email)<a href="mailto:{{ $web->email }}?subject=Career%20at%20{{ rawurlencode(config('app.name')) }}" class="glow-button-primary mt-7 inline-flex shrink-0 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Introduce yourself</a>@else<a href="{{ url('/contact') }}" class="glow-button-primary mt-7 inline-flex shrink-0 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Contact the team</a>@endif</div></div></section>
@endsection
