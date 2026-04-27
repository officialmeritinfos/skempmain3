{{-- resources/views/home/service.blade.php --}}
@extends('layouts.app')

@section('content')
    {{-- =========================
         SERVICES — Premium Glass Cards + Waves
    ========================= --}}
    <section id="sectors" class="relative isolate overflow-hidden py-28" style="background: var(--bg);">

        {{-- Gradient defs --}}
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="servicesWaveGlow" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0" stop-color="#8b5cf6"/>
                    <stop offset=".45" stop-color="#e879f9"/>
                    <stop offset="1" stop-color="#f3d38a"/>
                </linearGradient>
            </defs>
        </svg>

        {{-- Top wave --}}
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="url(#servicesWaveGlow)"></path>
        </svg>

        {{-- Ambient glows --}}
        <div class="pointer-events-none absolute -top-24 -left-24 h-[28rem] w-[28rem] rounded-full bg-violet-500/14 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/12 blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.16),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Heading --}}
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-block rounded-full px-4 py-1.5 text-[11px] font-bold tracking-wide text-white shadow"
                      style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                    What We Do
                </span>

                <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl"
                    style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent)); -webkit-background-clip: text; background-clip: text; color: transparent;">
                    Sectors We Earn in
                </h2>

                @isset($web)
                    <p class="mt-3 text-sm" style="color: var(--ink-soft);">
                        {{ $web->name ?? $siteName ?? config('app.name') }}
                    </p>
                @endisset
            </div>

            {{-- Cards --}}
            @if(isset($services) && count($services))
                <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($services as $service)
                        <article class="group relative rounded-[28px] p-[2px] transition-transform duration-300 ease-out will-change-transform hover:-translate-y-1"
                                 style="
                                    background: conic-gradient(
                                        from 220deg,
                                        rgba(139,92,246,.95),
                                        rgba(232,121,249,.92),
                                        rgba(192,38,211,.85),
                                        rgba(243,211,138,.82),
                                        rgba(139,92,246,.95)
                                    );
                                    box-shadow:
                                        0 30px 90px -40px rgba(139,92,246,.24),
                                        0 24px 80px -48px rgba(232,121,249,.20);
                                 ">
                            <div class="relative h-full overflow-hidden rounded-[26px] backdrop-blur"
                                 style="background: var(--surface); border: 1px solid var(--line);">

                                {{-- Image --}}
                                <div class="relative aspect-[16/10] w-full overflow-hidden">
                                    <img
                                        src="{{ asset('home/serv/' . $service->photo) }}"
                                        alt="{{ $service->title }}"
                                        class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.04]">

                                    {{-- Overlay glow --}}
                                    <span class="absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                                          style="background:
                                              radial-gradient(800px 320px at 20% -10%, rgba(139,92,246,.24), transparent 60%),
                                              radial-gradient(900px 360px at 120% 10%, rgba(232,121,249,.22), transparent 60%),
                                              linear-gradient(180deg, rgba(20,10,35,0) 45%, rgba(20,10,35,.28) 100%);"></span>

                                    {{-- Mobile vignette --}}
                                    <span class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/20 to-transparent sm:hidden"></span>
                                </div>

                                {{-- Content --}}
                                <div class="relative p-7 sm:p-8">
                                    <div class="flex items-start gap-4">
                                        <span class="grid h-12 w-12 place-items-center rounded-xl"
                                              style="background: linear-gradient(135deg, rgba(139,92,246,.14), rgba(232,121,249,.12), rgba(243,211,138,.10)); border: 1px solid var(--line);">
                                            <svg class="h-5 w-5" style="color: var(--brand-2);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                                <path d="M3 3v18h18M7 15l4-4 3 3 5-6"/>
                                            </svg>
                                        </span>

                                        <div class="min-w-0">
                                            <h3 class="truncate text-lg font-bold sm:text-xl" style="color: var(--ink);">
                                                <a href="{{ route('service.details', ['id' => $service->id]) }}" class="hover:opacity-90">
                                                    {{ $service->title }}
                                                </a>
                                            </h3>

                                            @if(!empty($service->short))
                                                <p class="mt-2 line-clamp-3 text-sm leading-relaxed" style="color: var(--ink-soft);">
                                                    {{ $service->short }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-6 flex items-center justify-between">
                                        <a href="{{ route('service.details', ['id' => $service->id]) }}"
                                           class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-semibold text-white shadow transition hover:opacity-95 focus:outline-none"
                                           style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                                            Read More
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M7.05 4.55a.75.75 0 011.06 0l5 5a.75.75 0 01-1.06 1.06L8.56 6.62v7.69a.75.75 0 01-1.5 0V4.55z"/>
                                            </svg>
                                        </a>

                                        <span class="h-2 w-2 rounded-full transition-shadow"
                                              style="background: rgba(232,121,249,.78);"
                                              onmouseover="this.style.boxShadow='0 0 24px 6px rgba(232,121,249,.45)'"
                                              onmouseout="this.style.boxShadow='none'"></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="mt-14 text-center">
                    <p style="color: var(--ink-soft);">
                        No services are available at the moment. Please check back later.
                    </p>
                </div>
            @endif
        </div>

        {{-- Bottom wave --}}
        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z"
                  fill="url(#servicesWaveGlow)"></path>
        </svg>
    </section>
@endsection
