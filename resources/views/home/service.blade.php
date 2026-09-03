@extends('layouts.marketing')

@section('title', config('app.name') . ' | Services')
@section('meta_description', 'Investment, wealth and asset management services designed around long-term objectives, risk awareness and disciplined stewardship.')

@section('content')
<section class="relative overflow-hidden bg-ink-950 text-white">
    <div class="absolute inset-0 opacity-60" aria-hidden="true">
        <div class="absolute -right-24 top-12 h-96 w-96 rounded-full border border-bronze-300/10"></div>
        <div class="absolute right-24 top-32 h-56 w-56 rounded-full border border-white/5"></div>
    </div>
    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
        <div x-data="revealOnScroll(.05)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-bronze-300">What we do</p>
            <h1 class="mt-5 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.04em] sm:text-6xl lg:text-7xl">Different decisions. One disciplined view of capital.</h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/62 sm:text-lg">Our services are designed to help clients think more clearly about where capital should sit, what risk it should take, what it should protect and how each decision connects to the wider financial picture.</p>
        </div>
    </div>
</section>

<section class="bg-paper-50 py-20 sm:py-24 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[.68fr_1.32fr] lg:gap-16">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up lg:sticky lg:top-28 lg:self-start">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-600">Our service architecture</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-tight tracking-[-0.03em] text-ink-950 sm:text-5xl">Start with the objective. Choose the tool second.</h2>
                <p class="mt-5 text-base leading-8 text-ink-700">The strongest financial decisions rarely come from asking “what should I buy?” first. We begin with the role the capital needs to play, then evaluate the appropriate strategy, asset or service.</p>
                <a href="{{ url('/contact') }}" class="group mt-7 inline-flex items-center gap-2 text-sm font-bold text-ink-950 transition hover:text-bronze-700">Talk to our team <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="none"><path d="M4 10h12M11.5 5.5 16 10l-4.5 4.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                @forelse($services as $service)
                    <a href="{{ route('service.details', ['id' => $service->id]) }}" x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up group overflow-hidden rounded-[1.8rem] border border-ink-950/8 bg-white shadow-sm transition duration-500 hover:-translate-y-1.5 hover:border-bronze-500/35 hover:shadow-2xl hover:shadow-ink-950/8" style="--reveal-delay: {{ ($loop->index % 4) * 70 }}ms">
                        @if(!empty($service->photo))
                            <div class="relative aspect-[16/10] overflow-hidden bg-ink-900">
                                <img src="{{ asset('home/serv/' . $service->photo) }}" alt="{{ $service->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-ink-950/55 via-transparent to-transparent"></div>
                                <span class="absolute bottom-4 left-5 text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-200">0{{ $loop->iteration }}</span>
                            </div>
                        @else
                            <div class="flex aspect-[16/10] items-end bg-ink-900 p-5"><span class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-300">0{{ $loop->iteration }}</span></div>
                        @endif
                        <div class="p-6 sm:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <h3 class="font-display text-2xl font-semibold leading-tight text-ink-950">{{ $service->title }}</h3>
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-ink-950/10 text-ink-950 transition group-hover:border-bronze-500/40 group-hover:bg-bronze-100"><svg class="h-4 w-4" viewBox="0 0 20 20" fill="none"><path d="M5 15 15 5M8 5h7v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                            </div>
                            <p class="mt-4 text-sm leading-7 text-ink-700">{{ \Illuminate\Support\Str::limit(trim(strip_tags($service->short ?: $service->content)), 175) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="sm:col-span-2 rounded-[1.8rem] border border-dashed border-ink-950/15 bg-white p-10 text-center"><p class="text-sm text-ink-700">Services will appear here once they are published.</p></div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="bg-ink-900 py-20 text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-end">
            <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-bronze-300">Not sure where to start?</p><h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">Bring us the objective before you bring us the product.</h2><p class="mt-5 max-w-2xl text-base leading-8 text-white/55">We can start with what you are trying to achieve, preserve or prepare for and work outward from there.</p></div>
            <a href="{{ url('/contact') }}" class="inline-flex min-w-48 items-center justify-center rounded-full bg-bronze-300 px-6 py-3.5 text-sm font-bold text-ink-950 transition hover:bg-bronze-200">Start a conversation</a>
        </div>
    </div>
</section>
@endsection
