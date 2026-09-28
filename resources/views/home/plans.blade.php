@extends('layouts.marketing')

@section('title', config('app.name') . ' | Investment Plans')
@section('meta_description', 'Explore published investment plans, funding ranges, durations and configured return terms from ' . config('app.name') . '.')

@inject('option','App\Defaults\Custom')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1fr_.72fr] lg:items-end lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Investment plans</p>
            </div>
            <h1 class="mt-7 max-w-4xl font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Choose structure with the same care you choose opportunity.</h1>
        </div>
        <p class="text-base leading-8 text-[#64707b] lg:pb-1 dark:text-white/56">Each published plan has its own funding range, duration and configured return terms. Compare them alongside your liquidity needs, time horizon and tolerance for risk.</p>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.7fr_1.3fr] lg:gap-16">
            <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Published options</p>
                </div>
                <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Compare the terms. Then consider the fit.</h2>
                <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">A higher configured rate is not automatically a better fit. Duration, minimum commitment, liquidity and the underlying strategy should be considered together.</p>

                <div class="mt-7 rounded-2xl border border-[#9a7445]/25 bg-[#f0ede5] p-5 text-sm leading-7 text-[#4d5965] dark:border-[#e4c38f]/20 dark:bg-[#e4c38f]/8 dark:text-white/62">
                    <strong class="text-[#132131] dark:text-white">Important:</strong> displayed plan rates are configured terms, not a statement that investment outcomes are risk-free.
                </div>
            </aside>

            <div class="grid gap-5 md:grid-cols-2">
                @forelse($packages as $package)
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up flex flex-col overflow-hidden rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_50px_rgba(15,23,42,.09)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->index % 4) * 60 }}ms">
                        <div class="border-b border-[#132131]/8 bg-[#f0ede5] p-6 sm:p-7 dark:border-white/8 dark:bg-[#101c27]">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Plan {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                    <h3 class="mt-2 font-display text-3xl font-bold tracking-[-0.03em]">{{ $package->name }}</h3>
                                </div>
                                <div class="text-right">
{{--                                    <p class="font-display text-3xl font-bold text-[#0b1b2b] dark:text-white">{{ rtrim(rtrim(number_format((float) $package->roi, 2), '0'), '.') }}%</p>--}}
                                    <p class="mt-1 text-[9px] font-bold uppercase tracking-[0.15em] text-[#7a848d] dark:text-white/38">{{ $option->getReturnType($package->returnType) }}</p>
                                </div>
                            </div>
                            @if($package->note)
                                <p class="mt-4 text-sm leading-6 text-[#64707b] dark:text-white/52">{{ $package->note }}</p>
                            @endif
                        </div>

                        <div class="flex flex-1 flex-col p-6 sm:p-7">
                            <dl class="divide-y divide-[#132131]/8 text-sm dark:divide-white/8">
                                <div class="flex items-start justify-between gap-4 py-4 first:pt-0">
                                    <dt class="text-[#7a848d] dark:text-white/42">Funding range</dt>
                                    <dd class="text-right font-bold">
                                        &#36;{{ number_format($package->minAmount, 2) }} –
                                        @if($package->isUnlimited != 1)
                                            &#36;{{ number_format($package->maxAmount, 2) }}
                                        @else
                                            Open-ended
                                        @endif
                                    </dd>
                                </div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Duration</dt><dd class="text-right font-bold">{{ $package->Duration }}</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Number of returns</dt><dd class="text-right font-bold">{{ $package->numberOfReturns }}</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Configured total rate</dt><dd class="text-right font-bold">{{ rtrim(rtrim(number_format((float) ($package->roi * $package->numberOfReturns), 2), '0'), '.') }}%</dd></div>
                                @if((float) $package->referral > 0)
                                    <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Referral rate</dt><dd class="text-right font-bold">{{ $package->referral }}%</dd></div>
                                @endif
                            </dl>

                            <div class="mt-auto pt-7">
                                <a href="{{ url('/register') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-[#0b1b2b] px-5 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Continue with this plan</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="md:col-span-2 rounded-2xl border border-dashed border-[#132131]/15 bg-[#fbfaf7] p-10 text-center text-[#6c7782] dark:border-white/15 dark:bg-white/3 dark:text-white/45">No investment plans are currently published.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@if(isset($cannabis_packages) && $cannabis_packages->isNotEmpty())
<section class="bg-[#f0ede5] py-20 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-[#132131]/10 pb-8 dark:border-white/10">
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Specialised strategies</p>
            <h2 class="mt-5 font-display text-4xl font-bold tracking-[-0.04em] sm:text-5xl">Additional published opportunities.</h2>
        </div>

        <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach($cannabis_packages as $package)
                <article class="rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] p-6 dark:border-white/10 dark:bg-white/4">
                    <h3 class="font-display text-2xl font-bold">{{ $package->name }}</h3>
                    <p class="mt-3 text-sm leading-7 text-[#66717c] dark:text-white/54">Funding from &#36;{{ number_format($package->minAmount, 2) }} with a configured duration of {{ $package->Duration }}.</p>
                    <a href="{{ url('/register') }}" class="mt-6 inline-flex text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">View account options →</a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Need context before choosing?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">The plan should fit the objective—not the other way around.</h2>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Talk to our team</a>
    </div>
</section>
@endsection
