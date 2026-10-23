@extends('layouts.investment-home')
@section('title', 'Privacy policy | ' . ($siteName ?? config('app.name')))
@section('meta_description', 'How personal information is collected, used, protected and retained when you use our website and related services.')
@section('content')
@include('home.partials.page-hero', ['label' => 'Privacy policy', 'heading' => 'Your information.', 'accent' => 'Our privacy policy.', 'intro' => 'How personal information is collected, used, protected and retained when you use our website and related services.'])
<section class="ih-section"><div class="ih-container ih-document-grid"><aside class="ih-document-nav"><p>On this page</p><a href="#privacy-introduction">1. Introduction</a><a href="#privacy-collection">2. Collection of information</a><a href="#privacy-cookies">3. Cookies</a><a href="#privacy-security">4. Security</a><a href="#privacy-storage">5. Storage and data transfers</a><a href="#privacy-retention">6. How long personal information is kept</a></aside><article class="ih-document ih-prose"><div class="ih-document-meta"><span>Website & client services</span><span aria-hidden="true">/</span><a href="{{ url('/contact') }}">Questions? Contact us</a></div><section>
                    <h2 id="privacy-introduction">1. Introduction</h2>
                    <div>
                        <p>This policy explains how personal information is collected, used, disclosed and protected when you use our website, applications or related services, or otherwise interact with {{ ($siteName ?? config('app.name')) }}.</p>
                        <p>We may update this policy from time to time. Where appropriate, changes may be communicated through the website, account experience or other reasonable channels.</p>
                    </div>
                </section><section>
                    <h2 id="privacy-collection">2. Collection of information</h2>
                    <div>
                        <p>When you create an account or use certain services, information may be collected to identify you, administer the service, prevent fraud, comply with applicable requirements and communicate with you.</p>
                        <p>Information you provide may include your name, email address, contact details, account information and other information you choose or are required to provide in connection with the service.</p>
                    </div>
                </section><section>
                    <h2 id="privacy-cookies">3. Cookies</h2>
                    <p>Cookies and similar technologies may be used to support authentication, preferences, security and website functionality. Most browsers allow you to remove or reject cookies, although doing so may affect parts of the service.</p>
                </section><section>
                    <h2 id="privacy-security">4. Security</h2>
                    <div>
                        <p>{{ ($siteName ?? config('app.name')) }} takes reasonable measures intended to protect personal information against loss, theft, misuse and unauthorised access, disclosure, alteration or destruction.</p>
                        <p>Where you choose a password or other credential to access an account, you are responsible for keeping that credential confidential. No transmission over the internet can be guaranteed to be completely secure.</p>
                        <p>Where notification of a personal-data breach is required by applicable law, affected individuals and/or relevant authorities will be notified as required.</p>
                    </div>
                </section><section>
                    <h2 id="privacy-storage">5. Storage and data transfers</h2>
                    <p>Personal information may be stored or processed using cloud infrastructure and service providers located in different jurisdictions. Where information is transferred, reasonable steps should be taken to handle it in accordance with this policy and applicable data-protection requirements.</p>
                </section><section>
                    <h2 id="privacy-retention">6. How long personal information is kept</h2>
                    <div>
                        <p>Personal information is retained for as long as reasonably necessary for the purpose for which it was collected, to provide the relevant service, comply with requirements, resolve disputes or satisfy legitimate record-keeping needs.</p>
                        <p>Questions about privacy can be directed to the official contact details published on the <a href="{{ url('/contact') }}">Contact page</a>.</p>
                    </div>
                </section></article></div></section>
@endsection
