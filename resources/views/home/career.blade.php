@extends('layouts.marketing')

@section('title', config('app.name') . ' | Careers')
@section('meta_description', 'Careers at ' . config('app.name') . ', a wealth, asset and investment management company.')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Careers</p>
            </div>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Do careful work on decisions that matter.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">We are building {{ config('app.name') }} around disciplined thinking, client trust and long-term stewardship. That requires people who combine judgement with execution and take responsibility for the quality of the work.</p>
        </div>

        <div x-data="revealOnScroll(.04)" :class="{ 'is-visible': shown }" class="reveal-scale overflow-hidden rounded-[2rem] border border-[#132131]/10 bg-white dark:border-white/10 dark:bg-[#101e2c]">
            <img src="{{ asset('home/images/resource/about-3.jpg') }}" alt="Professional team environment" class="aspect-[4/3] w-full object-cover">
            <div class="p-6 sm:p-7">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">The standard</p>
                <p class="mt-3 font-display text-2xl font-bold leading-snug tracking-[-0.025em]">Think carefully. Communicate clearly. Own the outcome.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.7fr_1.3fr] lg:gap-16">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up">
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">How we work</p>
                </div>
                <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Thoughtful, accountable and built for trust.</h2>
                <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">The culture we want is simple: think before moving, communicate clearly, protect trust and own the outcome.</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach([
                    ['Think before moving','Understand the problem, the client and the downside before rushing toward an answer.'],
                    ['Own the outcome','Good work is not just completing a task. It is noticing what could fail and closing the loop.'],
                    ['Communicate clearly','Complex financial work becomes more trustworthy when reasoning, assumptions and decisions are understandable.'],
                    ['Keep learning','Markets, technology and client expectations change. Curiosity is part of staying useful.'],
                    ['Protect trust','Handle information, money and client relationships with the care their sensitivity demands.'],
                    ['Stay durable','We value people who can work steadily through difficult problems without creating unnecessary drama around them.'],
                ] as $value)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 transition hover:-translate-y-1 hover:border-[#9a7445]/35 dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->index % 4) * 55 }}ms">
                        <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">0{{ $loop->iteration }}</span>
                        <h3 class="mt-8 font-display text-2xl font-bold tracking-[-0.025em]">{{ $value[0] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-[#66717c] dark:text-white/54">{{ $value[1] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#f0ede5] py-24 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.82fr_1.18fr] lg:gap-20 lg:px-8">
        <div>
            <div class="flex items-center gap-3">
                <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Who fits here</p>
            </div>
            <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">People who respect both detail and responsibility.</h2>
        </div>

        <div class="border-y border-[#132131]/10 dark:border-white/10">
            @foreach([
                ['Analytical','You can break a broad problem into assumptions, evidence, trade-offs and a decision.'],
                ['Client-minded','You understand that clarity, responsiveness and reliability shape trust as much as technical skill.'],
                ['Practical','You prefer useful solutions over complicated work that exists only to look impressive.'],
                ['Accountable','You raise risks early, document what matters and follow through when the task stops being interesting.'],
            ] as $trait)
                <div class="grid gap-4 border-b border-[#132131]/10 py-7 last:border-b-0 sm:grid-cols-[54px_1fr] dark:border-white/10">
                    <span class="text-[10px] font-bold text-[#8a6538] dark:text-[#e4c38f]">0{{ $loop->iteration }}</span>
                    <div>
                        <h3 class="text-lg font-bold">{{ $trait[0] }}</h3>
                        <p class="mt-2 text-sm leading-7 text-[#66717c] dark:text-white/52">{{ $trait[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Interested in joining?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Send us the work you are proud of and the problems you want to solve.</h2>
            <p class="mt-5 max-w-2xl text-base leading-8 text-white/58">If there is no role published right now, a thoughtful introduction is still more useful than a generic application.</p>
        </div>

        @if($web->email)
            <a href="mailto:{{ $web->email }}?subject=Career%20at%20{{ rawurlencode(config('app.name')) }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Introduce yourself</a>
        @else
            <a href="{{ url('/contact') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Contact the team</a>
        @endif
    </div>
</section>
@endsection