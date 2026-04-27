{{-- resources/views/pages/privacy.blade.php --}}
@extends('layouts.app', ['title' => $pageName ?? 'Privacy Policy'])

@section('content')
    {{-- =========================
        PAGE HEADER — Premium Violet + Wave
    ========================= --}}
    <section class="relative isolate overflow-hidden" style="background: var(--bg);">
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="privacyGlow" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0" stop-color="#8b5cf6"/>
                    <stop offset=".55" stop-color="#e879f9"/>
                    <stop offset="1" stop-color="#f3d38a"/>
                </linearGradient>
            </defs>
        </svg>

        <div class="absolute inset-0 -z-10"
             style="background:
                radial-gradient(900px 420px at 10% -10%, rgba(139,92,246,.20), transparent 60%),
                radial-gradient(720px 420px at 90% 0%, rgba(232,121,249,.16), transparent 58%),
                radial-gradient(680px 380px at 50% 115%, rgba(243,211,138,.12), transparent 62%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));"></div>

        <div class="pointer-events-none absolute inset-0 -z-10 opacity-60">
            <div class="absolute right-8 top-8 h-36 w-36 rounded-full bg-fuchsia-400/15 blur-2xl"></div>
            <div class="absolute -left-14 top-14 h-48 w-48 rounded-full bg-violet-400/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                Privacy Policy
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl md:text-5xl"
                style="color: var(--ink);">
                {{ $pageName }}
            </h1>

            <nav class="mt-4 text-xs sm:text-sm" style="color: var(--muted);">
                <a href="{{ url('/') }}" class="hover:underline" style="color: var(--ink-soft);">Home</a>
                <span class="mx-2 opacity-60">/</span>
                <span style="color: var(--ink);">{{ $pageName }}</span>
            </nav>
        </div>

        <svg class="absolute bottom-0 left-0 right-0 h-[120px] w-full pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 L0,120 Z" fill="var(--bg)"></path>
        </svg>
    </section>

    {{-- =========================
        PRIVACY — Prose in Premium Glass
    ========================= --}}
    <section class="relative overflow-hidden py-16 lg:py-24" style="background: var(--bg);">
        <svg class="absolute -top-[118px] left-0 right-0 h-[120px] w-full rotate-180 pointer-events-none"
             viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,96 C240,128 480,64 720,88 C960,112 1200,48 1440,88 L1440,120 Z" fill="var(--bg)"></path>
        </svg>

        <div class="pointer-events-none absolute -top-16 -left-24 h-[28rem] w-[28rem] rounded-full bg-violet-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-20 -right-24 h-[30rem] w-[30rem] rounded-full bg-fuchsia-400/10 blur-3xl"></div>

        <div class="relative z-10 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <span class="inline-block rounded-full px-4 py-1.5 text-[11px] font-bold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                Privacy Policy
            </span>

            <div class="mt-6 rounded-[28px] p-[2px] shadow-[0_30px_90px_-55px_rgba(0,0,0,.28)]"
                 style="background:
                    conic-gradient(from 210deg,
                    rgba(139,92,246,.55),
                    rgba(232,121,249,.18),
                    rgba(243,211,138,.14),
                    rgba(255,255,255,0),
                    rgba(139,92,246,.55));">
                <article class="prose mt-0 max-w-none rounded-[26px] p-6 sm:p-8 backdrop-blur
                                prose-headings:font-extrabold
                                prose-a:no-underline
                                hover:prose-a:underline"
                         style="
                            background: var(--surface);
                            border: 1px solid var(--line);

                            --tw-prose-body: color-mix(in srgb, var(--ink-soft) 100%, transparent);
                            --tw-prose-headings: var(--ink);
                            --tw-prose-links: var(--brand-2);
                            --tw-prose-bold: var(--ink);
                            --tw-prose-bullets: var(--brand);
                            --tw-prose-counters: var(--brand);
                            --tw-prose-hr: var(--line);
                            --tw-prose-quotes: var(--ink);
                            --tw-prose-quote-borders: var(--line);
                            --tw-prose-captions: var(--muted);
                            --tw-prose-code: var(--brand-2);
                            --tw-prose-pre-code: #fff;
                            --tw-prose-pre-bg: #1a1028;
                            --tw-prose-th-borders: var(--line);
                            --tw-prose-td-borders: var(--line);
                         ">
                    <h4>1. Introduction</h4>
                    <p>Hi! We've created this privacy policy to explain how we collect, use, disclose and protect your information; including any nonpublic personal information.</p>

                    <p>This policy applies to information we collect when you use our website (collectively, "Services") or otherwise interact with us as described below. We may change this privacy policy from time to time. If we make changes, we will notify you by revising the date at the top of this policy, and in some cases, we may provide you with additional notice (such as by adding a statement to the homepages of our website or by sending you an email notification).</p>

                    <p>We encourage you to review the privacy policy whenever you interact with us to stay informed about our information practices and the ways you can help protect your privacy. This privacy policy applies to the Services provided by {{ $siteName }} (“we” or “us”).</p>

                    <h4>2. Collection of Information</h4>
                    <p>When you create an {{ $siteName }} account, we may collect information, including non-public personal information about you from non-affiliated third party service providers in order to verify your identity and for fraud prevention, including your prior addresses and names.</p>
                    <p>We may collect information you provide to us, such as your name, email address and any other information you choose to provide. For example, we may collect such information if you request an invite to join {{ $siteName }} or if you enter into any contest or promotion.</p>

                    <h4>3. Cookies</h4>
                    <p>Most web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove or reject browser cookies. Please note that if you choose to remove or reject cookies, this could affect the availability and functionality of our Services.</p>

                    <h4>4. Security</h4>
                    <p>{{ $siteName }} takes reasonable measures to help protect all information about you from loss, theft, misuse and unauthorized access, disclosure, alteration and destruction. Additionally, {{ $siteName }} implements policies designed to protect the confidentiality and security of your nonpublic personal information, including a privacy protection policy. {{ $siteName }} limits access to your nonpublic personal information to employees that have a business reason to know such information, and implement security practices and procedures designed to protect the confidentiality and security of such information and prohibit unlawful disclosure of such information in accordance with its policies.</p>

                    <p>Where you have chosen a password that allows you to access certain parts of the website, you are responsible for keeping this password confidential. We advise you not to share your password with anyone. We have also taken measures to comply with provision of security facilities for the protection of your nonpublic personal information through the set up of firewalls, limited access to specified authorized individuals, encryption and continuous capacity building for relevant personnel. We therefore have digital and physical security measures to limit and eliminate possibilities of data privacy breach incidents.</p>

                    <p>Although we use appropriate security measures once we have received your personal information, the transmission of data over the internet (including by email) is never completely secure. We endeavour to protect personal information, but we cannot guarantee the security of data transmitted to us or by us. We will notify you and any applicable regulator of a breach where we are legally required to do so.</p>

                    <h4>5. Where we store your Data</h4>
                    <p>The data that we collect from you will be transferred to and stored at a destination outside the United States of America. By submitting your personal data, you agree to this transfer, storing or processing. We will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this privacy policy. All information you provide to us is stored on our secure cloud storage solution.</p>

                    <p>Your personal information will not be retained for longer than is necessary for the purposes for which it was processed.</p>

                    <h4>6. How long we keep your personal information</h4>
                    <p>We will hold your personal information on {{ $siteName }}’s systems for as long as is necessary to fulfil the purpose for which it was collected or to comply with legal, regulatory or internal policy requirements.</p>
                </article>
            </div>
        </div>
    </section>
@endsection
