@extends('layouts.marketing')

@section('title', config('app.name') . ' | Services')
@section('meta_description', 'Explore wealth, asset and investment management services from ' . config('app.name') . '.')

@section('content')
<section class="relative isolate overflow-hidden bg-[#040813] text-white">
    <div class="mesh-grid absolute inset-0 -z-20 opacity-45"></div>
    <div class="glow-orb glow-orb-top"></div>
    <div class="glow-orb glow-orb-right"></div>
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-white/8 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.24em] text-cyan-200 backdrop-blur-xl">
                <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_14px_rgba(103,232,249,.9)]"></span>
                What we do
            </span>
            <h1 class="mt-8 font-display text-5xl font-bold leading-[.98] tracking-[-0.05em] sm:text-6xl lg:text-7xl">Different financial needs. <span class="aurora-text">One connected view of capital.</span></h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/68 sm:text-lg">Our services are designed to help clients think more clearly about growth, preservation, allocation and the role each asset or strategy should play in the wider financial picture.</p>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#07111e] py-24 text-white sm:py-28">
    <div class="glow-orb glow-orb-service"></div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.72fr_1.28fr] lg:gap-16">
            <aside x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-cyan-200/80">Service architecture</p>
                <h2 class="mt-4 font-display text-4xl font-bold leading-[1.03] tracking-[-0.04em] sm:text-5xl">Start with the objective. Choose the tool second.</h2>
                <p class="mt-5 text-base leading-8 text-white/65">We prefer to understand what the capital needs to do before deciding which service, asset class or opportunity deserves attention.</p>
                <a href="{{ url('/contact') }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-cyan-200 transition hover:text-white">Talk to our team <span aria-hidden="true">→</span></a>
            </aside>

            <div class="grid gap-5 sm:grid-cols-2">
                @forelse($services as $service)
                    <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up premium-card group overflow-hidden rounded-[1.8rem] border border-white/10 bg-white/[0.05] shadow-[0_20px_50px_rgba(0,0,0,.22)] backdrop-blur-xl transition duration-500 hover:-translate-y-1.5 hover:border-cyan-300/25" style="--reveal-delay: {{ ($loop->index % 4) * 70 }}ms">
                        @if(!empty($service->photo))
                            <div class="relative aspect-[16/10] overflow-hidden bg-slate-950">
                                <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="card-image h-full w-full object-cover" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#040813] via-[#040813]/20 to-transparent"></div>
                                <span class="absolute bottom-4 left-5 text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200">0{{ $loop->iteration }}</span>
                            </div>
                        @else
                            <div class="flex aspect-[16/10] items-end bg-[radial-gradient(circle_at_65%_35%,rgba(168,85,247,.22),transparent_34%),linear-gradient(145deg,#07111e,#030712)] p-5"><span class="text-[10px] font-bold uppercase tracking-[0.2em] text-cyan-200">0{{ $loop->iteration }}</span></div>
                        @endif
                        <div class="p-6 sm:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <h3 class="font-display text-2xl font-semibold leading-tight text-white">{{ $service->title }}</h3>
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/12 bg-white/8 text-cyan-200 transition group-hover:border-cyan-300/30 group-hover:bg-cyan-300/10">↗</span>
                            </div>
                            <p class="mt-4 text-sm leading-7 text-white/62">{{ \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 175) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="sm:col-span-2 rounded-[1.8rem] border border-dashed border-white/15 bg-white/[0.03] p-10 text-center text-white/60">Services will appear here once they are published.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="bg-[#030712] py-24 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="glass-panel glow-border rounded-[2rem] p-7 sm:p-10 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:p-12">
            <div><p class="text-xs font-bold uppercase tracking-[0.22em] text-fuchsia-200/80">Not sure where to begin?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-bold leading-tight sm:text-5xl">Bring us the objective before you bring us the product.</h2><p class="mt-5 max-w-2xl text-base leading-8 text-white/62">We can start with what you are trying to grow, protect or prepare for and work outward from there.</p></div>
            <a href="{{ url('/contact') }}" class="glow-button-primary mt-7 inline-flex min-w-48 items-center justify-center rounded-full px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:-translate-y-0.5 lg:mt-0">Start a conversation</a>
        </div>
    </div>
</section>
@endsection
