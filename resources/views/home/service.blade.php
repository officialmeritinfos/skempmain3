@extends('layouts.marketing')

@section('title', config('app.name') . ' | Services')
@section('meta_description', 'Explore wealth, asset and investment management services from ' . config('app.name') . '.')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1fr_.72fr] lg:items-end lg:gap-16 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">What we do</p>
            </div>
            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">Different financial needs. One connected view of capital.</h1>
        </div>
        <p class="text-base leading-8 text-[#64707b] lg:pb-1 dark:text-white/56">Our services help clients think more clearly about growth, preservation, allocation and the role each strategy should play in the wider financial picture.</p>
    </div>
</section>

<section class="bg-white py-24 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.72fr_1.28fr] lg:gap-16">
            <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <div class="flex items-center gap-3">
                    <span class="h-px w-8 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Service architecture</p>
                </div>
                <h2 class="mt-5 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Start with the objective. Choose the tool second.</h2>
                <p class="mt-5 text-base leading-8 text-[#64707b] dark:text-white/56">We prefer to understand what the capital needs to do before deciding which service, asset class or opportunity deserves attention.</p>
                <a href="{{ url('/contact') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">Talk to our team <span aria-hidden="true">→</span></a>
            </aside>

            <div class="grid gap-5 sm:grid-cols-2">
                @forelse($services as $service)
                    <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group overflow-hidden rounded-2xl border border-[#132131]/10 bg-[#fbfaf7] transition hover:-translate-y-1 hover:border-[#9a7445]/35 hover:shadow-[0_18px_50px_rgba(15,23,42,.09)] dark:border-white/10 dark:bg-white/4 dark:hover:border-[#e4c38f]/25" style="--reveal-delay: {{ ($loop->index % 4) * 60 }}ms">
                        @if(!empty($service->photo))
                            <div class="aspect-[16/10] overflow-hidden bg-[#d8d8d2] dark:bg-[#111c27]">
                                <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.025]" loading="lazy">
                            </div>
                        @else
                            <div class="flex aspect-[16/10] items-end bg-[#0b1b2b] p-5 text-white">
                                <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#e4c38f]">Service {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        @endif
                        <div class="p-6 sm:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    @if(!empty($service->photo))
                                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6538] dark:text-[#e4c38f]">Service {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                                    @endif
                                    <h3 class="mt-2 font-display text-2xl font-bold leading-tight tracking-[-0.025em]">{{ $service->title }}</h3>
                                </div>
                                <span class="text-xl text-[#8b949c] transition group-hover:text-[#7b5a32] dark:text-white/35 dark:group-hover:text-[#e4c38f]">↗</span>
                            </div>
                            <p class="mt-4 text-sm leading-7 text-[#65717d] dark:text-white/54">{{ \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 175) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="sm:col-span-2 rounded-2xl border border-dashed border-[#132131]/15 bg-[#fbfaf7] p-10 text-center text-[#6c7782] dark:border-white/15 dark:bg-white/3 dark:text-white/45">Services will appear here once they are published.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="bg-[#0b1b2b] py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
        <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Not sure where to begin?</p>
            <h2 class="mt-5 max-w-3xl font-display text-4xl font-bold leading-[1.03] tracking-[-0.045em] sm:text-5xl">Bring us the objective before you bring us the product.</h2>
            <p class="mt-5 max-w-2xl text-base leading-8 text-white/58">We can start with what you are trying to grow, protect or prepare for and work outward from there.</p>
        </div>
        <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:bg-[#efd3a6]">Start a conversation</a>
    </div>
</section>
@endsection