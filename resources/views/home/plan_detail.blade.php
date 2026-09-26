@extends('layouts.marketing')

@section('title', config('app.name') . ' | ' . ($pageName ?? 'Investment Plans'))
@section('meta_description', 'Review published investment plan terms, durations, funding ranges and configured return structures from ' . config('app.name') . '.')

@inject('option','App\Defaults\Custom')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <a href="{{ url('/plans') }}" class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">← Investment plans</a>
            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">{{ $pageName ?? 'Investment Plans' }}</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">Review the available plan terms as a complete structure—not only the headline rate. Funding range, duration and liquidity all matter.</p>
        </div>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @forelse($packages as $package)
                <article x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up flex flex-col overflow-hidden rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_50px_rgba(15,23,42,.09)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->index % 6) * 55 }}ms">
                    <div class="border-b border-[#132131]/8 bg-[#f0ede5] p-6 sm:p-7 dark:border-white/8 dark:bg-[#101c27]">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Plan {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                <h2 class="mt-2 font-display text-3xl font-bold tracking-[-0.03em]">{{ $package->name }}</h2>
                            </div>
                            <p class="font-display text-3xl font-bold">{{ rtrim(rtrim(number_format((float) $package->roi, 2), '0'), '.') }}%</p>
                        </div>
                        <p class="mt-3 text-[10px] font-bold uppercase tracking-[0.15em] text-[#7a848d] dark:text-white/38">{{ $option->getReturnType($package->returnType) }}</p>
                        @if(!empty($package->note))
                            <p class="mt-4 text-sm leading-6 text-[#64707b] dark:text-white/52">{{ $package->note }}</p>
                        @endif
                    </div>

                    <div class="flex flex-1 flex-col p-6 sm:p-7">
                        <dl class="divide-y divide-[#132131]/8 text-sm dark:divide-white/8">
                            <div class="flex items-start justify-between gap-4 py-4 first:pt-0">
                                <dt class="text-[#7a848d] dark:text-white/42">Funding range</dt>
                                <dd class="text-right font-bold">
                                    &#36;{{ number_format($package->minAmount,2) }} –
                                    @if($package->isUnlimited != 1)
                                        &#36;{{ number_format($package->maxAmount,2) }}
                                    @else
                                        Open-ended
                                    @endif
                                </dd>
                            </div>
                            <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Profit return</dt><dd class="text-right font-bold">{{ rtrim(rtrim(number_format((float) $package->roi, 2), '0'), '.') }}% {{ $option->getReturnType($package->returnType) }}</dd></div>
                            <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Contract duration</dt><dd class="text-right font-bold">{{ $package->Duration }}</dd></div>
                            @if((float) $package->referral > 0)
                                <div class="flex items-start justify-between gap-4 py-4"><dt class="text-[#7a848d] dark:text-white/42">Referral bonus</dt><dd class="text-right font-bold">{{ $package->referral }}%</dd></div>
                            @endif
                        </dl>

                        <div class="mt-auto pt-7">
                            <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-[#0b1b2b] px-5 py-3.5 text-sm font-bold text-white transition hover:bg-[#162c41] dark:bg-[#e4c38f] dark:text-[#0b1b2b] dark:hover:bg-[#efd3a6]">Get started</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-dashed border-[#132131]/15 bg-[#fbfaf7] p-10 text-center text-[#6c7782] dark:border-white/15 dark:bg-white/3 dark:text-white/45">No plans are currently available.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Need help choosing?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Talk through the objective before committing capital.</h2>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Contact our team</a>
    </div>
</section>
@endsection