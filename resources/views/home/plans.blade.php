@extends('layouts.marketing')

@section('title', config('app.name') . ' | Investment Plans')
@section('meta_description', 'Explore configured investment plans, funding ranges, durations and return terms with clear risk context.')

@section('content')
<section class="relative overflow-hidden bg-ink-950 text-white">
    <div class="absolute inset-0 opacity-70" aria-hidden="true">
        <div class="absolute -right-24 top-14 h-96 w-96 rounded-full border border-bronze-300/10"></div>
        <div class="absolute right-12 top-40 h-52 w-52 rounded-full border border-white/5"></div>
    </div>
    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">Investment plans</p>
            <h1 class="mt-5 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Choose structure with the same care you choose opportunity.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg">Each published plan has its own funding range, duration and configured return terms. Review the terms alongside your liquidity needs, time horizon and tolerance for risk before committing capital.</p>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[.7fr_1.3fr] lg:gap-16">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Published options</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">Compare the terms. Then consider the fit.</h2>
                <p class="mt-5 text-base leading-8 text-ink-700">A higher configured return is not automatically a better fit. Duration, minimum commitment, liquidity and the underlying strategy should all be considered together.</p>
                <div class="mt-7 rounded-2xl border border-bronze-500/20 bg-bronze-100/55 p-5 text-sm leading-7 text-ink-700"><strong class="text-ink-950">Important:</strong> displayed plan rates are configured terms, not a statement that investment outcomes are risk-free. Investment values and realised outcomes can differ.</div>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                @forelse($packages as $package)
                    @inject('option','App\Defaults\Custom')
                    <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group flex flex-col overflow-hidden rounded-[1.8rem] border border-ink-950/8 bg-white shadow-sm transition duration-400 hover:-translate-y-1 hover:border-bronze-500/30 hover:shadow-2xl hover:shadow-ink-950/7" style="--reveal-delay: {{ ($loop->index % 4) * 70 }}ms">
                        <div class="border-b border-ink-950/8 bg-ink-950 p-6 text-white sm:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <div><p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">Plan {{ str_pad((string)$loop->iteration, 2, '0', STR_PAD_LEFT) }}</p><h3 class="mt-2 font-display text-3xl font-semibold">{{ $package->name }}</h3></div>
                                <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 text-bronze-300"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 19 9 9l3 6 3-5 5 9H4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg></span>
                            </div>
                            <div class="mt-7 flex items-end gap-2"><span class="font-display text-5xl font-semibold text-bronze-300">{{ rtrim(rtrim(number_format((float)$package->roi, 2), '0'), '.') }}%</span><span class="pb-1 text-xs text-white/45">{{ $option->getReturnType($package->returnType) }}</span></div>
                            @if($package->note)<p class="mt-4 text-sm leading-6 text-white/55">{{ $package->note }}</p>@endif
                        </div>

                        <div class="flex flex-1 flex-col p-6 sm:p-7">
                            <dl class="space-y-0 divide-y divide-ink-950/8 text-sm">
                                <div class="flex items-start justify-between gap-4 py-4 first:pt-0"><dt class="text-ink-600">Funding range</dt><dd class="text-right font-semibold text-ink-950">${{ number_format($package->minAmount, 2) }} – @if($package->isUnlimited != 1) ${{ number_format($package->maxAmount, 2) }} @else Open-ended @endif</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-ink-600">Duration</dt><dd class="text-right font-semibold text-ink-950">{{ $package->Duration }}</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-ink-600">Number of returns</dt><dd class="text-right font-semibold text-ink-950">{{ $package->numberOfReturns }}</dd></div>
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-ink-600">Configured total rate</dt><dd class="text-right font-semibold text-ink-950">{{ rtrim(rtrim(number_format((float)($package->roi * $package->numberOfReturns), 2), '0'), '.') }}%</dd></div>
                                @if((float)$package->referral > 0)<div class="flex items-start justify-between gap-4 py-4"><dt class="text-ink-600">Referral rate</dt><dd class="text-right font-semibold text-ink-950">{{ $package->referral }}%</dd></div>@endif
                            </dl>
                            <div class="mt-auto pt-7"><a href="{{ url('/register') }}" class="inline-flex w-full items-center justify-center rounded-full bg-ink-950 px-5 py-3.5 text-sm font-bold text-white transition hover:bg-ink-900">Continue with this plan</a></div>
                        </div>
                    </article>
                @empty
                    <div class="md:col-span-2 rounded-[1.8rem] border border-dashed border-ink-950/15 bg-white p-10 text-center"><p class="text-sm text-ink-700">No investment plans are currently published.</p></div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@if(isset($cannabis_packages) && $cannabis_packages->isNotEmpty())
<section class="bg-paper-100 py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-ink-950/10 pb-8"><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Specialised strategies</p><h2 class="mt-4 font-display text-4xl font-semibold text-ink-950 sm:text-5xl">Additional published opportunities.</h2></div>
        <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach($cannabis_packages as $package)
                <article class="rounded-[1.6rem] border border-ink-950/8 bg-white p-6"><h3 class="font-display text-2xl font-semibold text-ink-950">{{ $package->name }}</h3><p class="mt-3 text-sm leading-7 text-ink-700">Funding from ${{ number_format($package->minAmount, 2) }} with a configured duration of {{ $package->Duration }}.</p><a href="{{ url('/register') }}" class="mt-6 inline-flex text-sm font-bold text-ink-950 hover:text-bronze-700">View account options →</a></article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="bg-ink-900 py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Need context before choosing?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">The plan should fit the objective—not the other way around.</h2></div>
        <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-bronze-200">Talk to our team</a>
    </div>
</section>
@endsection
