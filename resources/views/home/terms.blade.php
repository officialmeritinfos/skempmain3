@extends('layouts.investment-home')
@section('title', 'Terms of use | ' . ($siteName ?? config('app.name')))
@section('meta_description', 'The terms governing use of our website, client accounts and the services made available through them.')
@section('content')
@include('home.partials.page-hero', ['label' => 'Terms of use', 'heading' => 'The terms.', 'accent' => 'Clearly set out.', 'intro' => 'The terms governing use of our website, client accounts and the services made available through them.'])
<section class="ih-section"><div class="ih-container ih-document-grid"><aside class="ih-document-nav"><p>On this page</p><a href="#terms-introduction">1. Introduction</a><a href="#terms-obligations">2. Obligations</a><a href="#terms-disclaimer">3. Disclaimer and limitation of liability</a><a href="#terms-termination">4. Termination</a><a href="#terms-general">5. General terms</a></aside><article class="ih-document ih-prose"><div class="ih-document-meta"><span>Website & client services</span><span aria-hidden="true">/</span><a href="{{ url('/contact') }}">Questions? Contact us</a></div><section>
                    <h2 id="terms-introduction">1. Introduction</h2>
                    <div>
                        <p>{{ ($siteName ?? config('app.name')) }} provides investment-related services through its website and associated applications. By using the website, you agree to these Terms of Use and to the Privacy Policy.</p>
                        <p>For these terms, a User is an individual who uses the website to evaluate the service or access general information. A Client is an individual who creates an account and uses services made available through {{ ($siteName ?? config('app.name')) }}. Clients may also be subject to additional terms presented when an account is created or an investment is funded.</p>
                    </div>
                </section><section>
                    <h2 id="terms-obligations">2. Obligations</h2>
                    <div>
                        <p>You must be 18 or older to access services intended for account holders. Access or use by anyone below the applicable age requirement is not authorised.</p>
                        <p>To access certain features you may be required to create a user account and choose a password. You are responsible for safeguarding your password and account information and for notifying {{ ($siteName ?? config('app.name')) }} if you believe your credentials have been compromised.</p>
                        <p>Information supplied during registration or account use should be true, accurate, current and complete.</p>
                    </div>
                </section><section>
                    <h2 id="terms-disclaimer">3. Disclaimer and limitation of liability</h2>
                    <div>
                        <p>Investment outcomes cannot be guaranteed. All investments involve risk, including the possibility of loss. Information made available to a User who is not receiving a specific client service is provided for general or educational purposes and should not be treated as personal legal, tax or financial-planning advice.</p>
                        <p>You remain responsible for considering your own objectives, financial circumstances and risk tolerance before acting on general information.</p>
                    </div>
                </section><section>
                    <h2 id="terms-termination">4. Termination</h2>
                    <div>
                        <p>Either party may end the relationship subject to outstanding obligations and the terms applicable to active investments. {{ ($siteName ?? config('app.name')) }} may suspend or terminate access where fraud, unlawful activity, misuse of the service or a material breach of applicable terms is reasonably suspected.</p>
                        <p>Where required by law, regulation or valid legal process, {{ ($siteName ?? config('app.name')) }} may cooperate with relevant authorities.</p>
                    </div>
                </section><section>
                    <h2 id="terms-general">5. General terms</h2>
                    <div>
                        <p>If any provision of these Terms of Use is held invalid or unenforceable, the remaining provisions continue in effect. A failure to enforce a right or provision does not automatically waive that right or provision.</p>
                        <p>These terms may be updated from time to time by publishing a revised version. If you do not agree with revised terms, you should stop using the relevant service and contact {{ ($siteName ?? config('app.name')) }} regarding any existing client obligations.</p>
                    </div>
                </section></article></div></section>
@endsection
