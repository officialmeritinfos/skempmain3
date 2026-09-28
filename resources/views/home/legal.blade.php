@extends('layouts.marketing')

@section('title', config('app.name') . ' | Legal')
@section('meta_description', 'Corporate certificates and legal documentation published by ' . config('app.name') . ' for reference.')

@section('content')
<section class="bg-[#f5f3ed] text-[#132131] dark:bg-[#08111b] dark:text-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24">
        <div x-data="revealOnScroll(.03)" :class="{ 'is-visible': shown }" class="reveal-up max-w-4xl">
            <div class="flex items-center gap-3">
                <span class="h-px w-9 bg-[#9a7445] dark:bg-[#e4c38f]"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#7b5a32] dark:text-[#e4c38f]">Legal documentation</p>
            </div>

            <h1 class="mt-7 font-display text-5xl font-bold leading-[.98] tracking-[-0.055em] text-[#0b1b2b] sm:text-6xl lg:text-7xl dark:text-white">
                Corporate records, presented clearly.
            </h1>

            <p class="mt-7 max-w-2xl text-base leading-8 text-[#5f6a75] sm:text-lg dark:text-white/60">
                Review certificates and supporting legal documentation made available by {{ config('app.name') }}.
            </p>
        </div>
    </div>
</section>

<section class="bg-white py-20 text-[#132131] dark:bg-[#0b1520] dark:text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div x-data="revealOnScroll()" :class="{ 'is-visible': shown }" class="reveal-up max-w-3xl">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#7b5a32] dark:text-[#e4c38f]">Certificates</p>
                <h2 class="mt-4 font-display text-4xl font-bold tracking-[-0.04em] sm:text-5xl">Company certificates.</h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-[#65717c] sm:text-base dark:text-white/55">
                    Select a certificate to view the available document at full size.
                </p>
            </div>
        </div>

        {{-- Replace with certificate-1/2.jpg, .jpeg, .png or .webp under public/home/images/legal/. --}}
        <div class="mt-10 grid gap-6 lg:grid-cols-2">
            @foreach($certificates as $certificate)
                <article
                    x-data="revealOnScroll()"
                    :class="{ 'is-visible': shown }"
                    class="reveal-up overflow-hidden rounded-[1.75rem] border border-[#132131]/10 bg-[#fbfaf7] shadow-[0_18px_55px_rgba(15,23,42,.05)] dark:border-white/10 dark:bg-white/[0.035]"
                    style="--reveal-delay: {{ ($loop->iteration - 1) * 70 }}ms"
                >
                    <div class="flex items-center justify-between gap-4 border-b border-[#132131]/8 px-5 py-4 dark:border-white/10 sm:px-6">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.17em] text-[#8a6538] dark:text-[#e4c38f]">Official document</p>
                            <h3 class="mt-1 font-display text-xl font-bold tracking-[-0.02em]">{{ $certificate['label'] }}</h3>
                        </div>

                        @if($certificate['path'])
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.12em] text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">Available</span>
                        @else
                            <span class="rounded-full bg-[#132131]/5 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.12em] text-[#6a7480] dark:bg-white/8 dark:text-white/42">Pending upload</span>
                        @endif
                    </div>

                    @if($certificate['path'])
                        <a href="{{ asset($certificate['path']) }}" target="_blank" rel="noopener" class="group block bg-[#ece9e1] p-4 dark:bg-[#0b1520] sm:p-6">
                            <div class="overflow-hidden rounded-2xl border border-[#132131]/8 bg-white dark:border-white/10">
                                <img
                                    src="{{ asset($certificate['path']) }}"
                                    alt="{{ $certificate['label'] }}"
                                    class="aspect-[4/3] w-full object-contain transition duration-500 group-hover:scale-[1.015]"
                                >
                            </div>
                            <p class="mt-4 text-center text-xs font-semibold text-[#697480] transition group-hover:text-[#7b5a32] dark:text-white/45 dark:group-hover:text-[#e4c38f]">Open certificate in full size</p>
                        </a>
                    @else
                        <div class="flex aspect-[4/3] items-center justify-center bg-[#ece9e1] p-8 dark:bg-[#0b1520]">
                            <div class="max-w-xs text-center">
                                <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl border border-[#132131]/10 bg-white text-[#8a6538] shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-[#e4c38f]">
                                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M7 3h7l4 4v14H7V3Zm7 0v5h5M10 13h5M10 17h5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <h4 class="mt-5 font-display text-2xl font-bold text-[#132131] dark:text-white">Certificate image pending.</h4>
                                <p class="mt-2 text-sm leading-6 text-[#68737e] dark:text-white/45">The document will appear here automatically after the certificate image is added.</p>
                            </div>
                        </div>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#f0ede5] py-20 text-[#132131] dark:bg-[#08111b] dark:text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            x-data="revealOnScroll()"
            :class="{ 'is-visible': shown }"
            class="reveal-up overflow-hidden rounded-[2rem] bg-[#0b1b2b] p-7 text-white sm:p-9 lg:flex lg:items-center lg:justify-between lg:gap-12 lg:p-12"
        >
            <div class="max-w-2xl">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#e4c38f]">Supporting document</p>
                <h2 class="mt-4 font-display text-3xl font-bold tracking-[-0.035em] sm:text-4xl">Legal document in PDF format.</h2>
                <p class="mt-4 text-sm leading-7 text-white/58 sm:text-base">
                    Use the document below for the complete supporting legal record made available for download.
                </p>
            </div>

            <div class="mt-7 shrink-0 lg:mt-0">
                @if($legalPdfPath)
                    <a
                        href="{{ asset($legalPdfPath) }}"
                        download
                        class="inline-flex w-full items-center justify-center gap-3 rounded-xl bg-[#e4c38f] px-6 py-3.5 text-sm font-bold text-[#0b1b2b] transition hover:-translate-y-0.5 hover:bg-[#efd3a6] sm:w-auto"
                    >
                        <svg class="h-4.5 w-4.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M10 3v9m0 0 3.5-3.5M10 12 6.5 8.5M4 16h12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Download legal PDF
                    </a>
                @else
                    <span class="inline-flex w-full cursor-not-allowed items-center justify-center gap-3 rounded-xl border border-white/15 bg-white/6 px-6 py-3.5 text-sm font-bold text-white/45 sm:w-auto">
                        <svg class="h-4.5 w-4.5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M10 3v9m0 0 3.5-3.5M10 12 6.5 8.5M4 16h12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        PDF pending upload
                    </span>
                @endif
            </div>
        </div>

        <p class="mt-6 text-xs leading-6 text-[#6a7480] dark:text-white/38">
            For questions concerning any document shown here, use the official contact information published on the <a href="{{ url('/contact') }}" class="font-bold text-[#7b5a32] transition hover:text-[#0b1b2b] dark:text-[#e4c38f] dark:hover:text-white">Contact page</a>.
        </p>
    </div>
</section>
@endsection
