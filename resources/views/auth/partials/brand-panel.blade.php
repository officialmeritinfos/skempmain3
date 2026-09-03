@php
    $authEyebrow = $authEyebrow ?? 'Secure client access';
    $authHeadline = $authHeadline ?? 'Move forward with clarity.';
    $authCopy = $authCopy ?? 'Access your account through the same disciplined, long-term thinking that shapes how we approach capital.';
@endphp

<section class="relative isolate min-h-[330px] overflow-hidden bg-ink-950 text-white lg:sticky lg:top-0 lg:h-screen lg:min-h-screen lg:self-start">
    <div class="absolute inset-0 -z-30">
        <img
            src="{{ asset('home/images/brand/alpine-ibex-hero.svg') }}"
            alt=""
            class="h-full w-full object-cover object-center lg:object-[58%_center]"
        >
    </div>
    <div class="absolute inset-0 -z-20 bg-gradient-to-r from-ink-950 via-ink-950/88 to-ink-950/25"></div>
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-ink-950 via-ink-950/25 to-ink-950/35"></div>
    <div class="hero-film-grain pointer-events-none absolute inset-0 -z-10 opacity-20"></div>

    <div class="pointer-events-none absolute left-[8%] top-0 hidden h-full w-px bg-white/8 xl:block"></div>
    <div class="pointer-events-none absolute right-[8%] top-0 hidden h-full w-px bg-white/8 xl:block"></div>

    <div class="relative flex min-h-[330px] h-full flex-col justify-end px-4 pb-10 pt-28 sm:px-6 sm:pb-12 lg:min-h-screen lg:px-10 lg:pb-14 xl:px-16 xl:pb-16">
        <div class="max-w-xl">
            <p class="inline-flex items-center gap-2.5 rounded-full border border-bronze-300/25 bg-black/20 px-3.5 py-2 text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300 backdrop-blur-md">
                <span class="h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                {{ $authEyebrow }}
            </p>

            <h1 class="mt-5 max-w-lg font-display text-4xl font-semibold leading-[1.02] tracking-[-0.035em] text-white sm:text-5xl lg:text-6xl">
                {{ $authHeadline }}
            </h1>

            <p class="mt-5 max-w-lg text-sm leading-7 text-white/62 sm:text-base sm:leading-8">
                {{ $authCopy }}
            </p>

            <div class="mt-8 hidden grid-cols-3 border-t border-white/12 pt-6 lg:grid">
                @foreach([
                    ['Perspective', 'Long-term'],
                    ['Discipline', 'Risk-aware'],
                    ['Access', 'Private'],
                ] as $signal)
                    <div class="pr-5 last:pr-0">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-bronze-300/75">{{ $signal[0] }}</p>
                        <p class="mt-1.5 text-xs font-semibold text-white/75">{{ $signal[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
