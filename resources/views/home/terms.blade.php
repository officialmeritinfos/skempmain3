{{-- resources/views/pages/terms.blade.php --}}
@extends('layouts.app', ['title' => $pageName ?? 'Terms of Use'])

@section('content')
    {{-- =========================
        PAGE HEADER — Premium Violet + Wave
    ========================= --}}
    <section class="relative isolate overflow-hidden" style="background: var(--bg);">
        <svg width="0" height="0" class="absolute">
            <defs>
                <linearGradient id="termsGlow" x1="0" x2="1" y1="0" y2="0">
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
            <div class="absolute -left-14 top-16 h-48 w-48 rounded-full bg-violet-400/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(139,92,246,.18),transparent_60%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,rgba(243,211,138,.10),transparent_60%)]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-[11px] font-extrabold tracking-wide text-white shadow"
                  style="background: linear-gradient(135deg, var(--brand), var(--brand-2), var(--accent));">
                <span class="h-2 w-2 rounded-full bg-white/80"></span>
                Terms of Use
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
        TERMS — Premium Glass Prose
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
                Terms of Use
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
                    <p>{{ $siteName }} is an automated investment platform available online and through mobile applications.</p>
                    <p>We offer an automated investment service. As our Client, we will manage your investment on your behalf in a very low cost manner to maximize your returns. By using our website, you enter into a series of legally binding agreements. You also agree to our Privacy Policy which covers how we collect, use, share and store your personal information.</p>
                    <p>When you access our website ("our website" (which includes our blog), "our app" or “{{ $siteName }}") as a User and Client, you're agreeing to be bound by the following Terms of Use. Please therefore take the time to read the following binding Terms of Use below. For the purpose of this agreement a User is an individual who uses our website to evaluate our service, or for educational purposes and a Client is an individual who signs up on {{ $siteName }} that entitles the Client to have her or his investment portfolio managed by {{ $siteName }}. This Agreement, as well as the Privacy Policy applies to both Users and Clients. If you elect to become a Client, you will be subject to these Terms of Use, our Client Agreement, our Privacy Policy and any additional terms to which you agree when you create and fund an investment plan.</p>

                    <h4>2. Obligations</h4>
                    <p>You must be 18 or older to access our website or mobile applications.</p>
                    <p>{{ $siteName }} is intended solely for individuals who are 18 or older. Any access to or use of {{ $siteName }} by anyone under 18 is unauthorized, unlicensed, and in violation of these Terms of Use. By accessing or using {{ $siteName }}, you represent and warrant that you are 18 or older.</p>
                    <p>In order to access certain features of {{ $siteName }}, you must register to create an account ("User Account"). When you register, you will be asked to choose a password, which you will be required to use to access your User Account. {{ $siteName }} has physical, electronic and procedural safeguards that comply with regulatory standards to guard Users' and Clients' non-public personal information (see Privacy Policy). You are responsible for safeguarding your password and other User Account information. You agree not to disclose your password to any third party and you will notify {{ $siteName }} immediately if your password is lost or stolen or if you suspect any unauthorized use of your User Account. As a User you agree that you shall be solely responsible for any activities or actions under your User Account, whether or not you have authorized such activities or actions. You agree that the information you provide to us on account registration through our website or mobile applications will be true, accurate, current, and complete.</p>

                    <h4>3. Disclaimer and Limit of Liability</h4>
                    <p>{{ $siteName }} cannot be held responsible for any financial insights or recommendations provided to users.</p>
                    <p>For a User who is not a Client You understand and acknowledge that the investment results you could obtain from investment information and financial insights provided by {{ $siteName }} cannot be guaranteed and that {{ $siteName }} Finance cannot be held responsible. All investments entail a risk of loss and that you may lose money. Investment management services may be offered to individuals who become clients, at the sole discretion of {{ $siteName }}. Your election to engage our investment services are subject to your explicit enrollment and acceptance of this Terms of Use.. You agree and understand that your use of {{ $siteName }} is for educational purposes only and is not intended to provide legal, tax or financial planning advice. You agree as a User that you are responsible for your own investment research and investment decisions, that {{ $siteName }} is only one of many tools you may use as part of a comprehensive investment education process, that you should not and will not rely on {{ $siteName }} as the primary basis of your investment decisions and, except as otherwise provided for herein, {{ $siteName }} will not be liable for decisions/actions you take or authorize third parties to take on your behalf based on information you receive as a User of {{ $siteName }} or information you otherwise see on our website.</p>

                    <h4>4. Termination</h4>
                    <p>Each of us can end this agreement at any time, subject to the maturity of all plans. We may terminate or suspend your access to {{ $siteName }}, at any time with prior notice to you if your account is found to be fraudulent.</p>
                    <p>We will fully cooperate with any law enforcement authorities or court order requesting or directing us to disclose the identity of anyone posting, publishing, or otherwise making available any User information, emails, or other materials that are believed to violate these Terms of Use. Any suspension, termination, or cancellation shall not affect your obligations to {{ $siteName }} under these Terms of Use (including but not limited to ownership, indemnification, and limitation of liability), which by their sense and context are intended to survive such suspension, termination, or cancellation.</p>

                    <h4>5. General Terms</h4>
                    <p>In the event that any provision in these Terms of Use is held to be invalid or unenforceable, the remaining provisions will remain in full force and effect. The failure of a party to enforce any right or provision of these Terms of Use will not be deemed a waiver of such right or provision. You may not assign this Agreement (by operation of law or otherwise) without the prior written consent of {{ $siteName }}, and any prohibited assignment will be null and void.</p>
                    <p>{{ $siteName }} may assign this Terms of Use Agreement or any rights hereunder without your consent. The relationship of the parties under these Terms of Use is that of independent contractors, and these Terms of Use will not be construed to imply that either party is the agent, employee, or joint venture of the other. Note that if you elect to become a Client, the relationship of the parties will be governed by these Terms of Use, our Privacy Policy and any additional terms to which you agree when you create and fund an investment account. We reserve the right to change this Agreement by posting a revised Terms of Use and we agree that changes cannot be retroactive. If you don't agree with these changes, you must stop using {{ $siteName }}.</p>
                </article>
            </div>
        </div>
    </section>
@endsection
