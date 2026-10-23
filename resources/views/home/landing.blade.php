@extends('layouts.investment-home')

@php
    $homepageServices = collect($services ?? [])
        ->reject(fn ($service) => (int) data_get($service, 'isSector', 2) === 1)
        ->take(3)->values();
    $serviceFallbacks = [
        ['title' => 'Investment management', 'copy' => 'Put your capital to work with a clearer understanding of the opportunities, the terms and the risks involved.'],
        ['title' => 'Wealth planning', 'copy' => 'Bring today’s priorities and tomorrow’s ambitions into the same conversation, from your next milestone to your long-term future.'],
        ['title' => 'Asset management', 'copy' => 'Look at the bigger picture. Consider how different assets can work together, with a role for each part of your portfolio.'],
    ];
    $investmentAreas = [
        ['title' => 'Real estate', 'label' => 'Tangible opportunities', 'copy' => 'Explore property as part of a broader investment strategy.', 'image' => 'real-estate', 'alt' => 'Contemporary residential architecture surrounded by trees', 'url' => '/realestate'],
        ['title' => 'Stocks & ETFs', 'label' => 'Connected to global markets', 'copy' => 'Discover investment opportunities across public markets.', 'image' => 'global-markets', 'alt' => 'Financial market price chart showing market movements', 'url' => '/stocks'],
        ['title' => 'Agriculture', 'label' => 'Investing in the real economy', 'copy' => 'Consider the opportunities in an essential global sector.', 'image' => 'agriculture', 'alt' => 'Cultivated fields stretching towards the horizon at sunset', 'url' => '/agriculture'],
    ];
@endphp

@section('content')
    <section class="ih-hero" aria-labelledby="hero-title">
        <div class="ih-hero-image"><img src="{{ asset('home/redesign/images/financial-district.webp') }}" alt="Glass towers rising above a modern financial district" width="1800" height="1200" fetchpriority="high"></div>
        <div class="ih-hero-shade"></div>
        <div class="ih-container ih-hero-inner">
            <div class="ih-hero-copy">
                <p class="ih-eyebrow ih-eyebrow-light"><span></span>Perspective. Purpose. Possibility.</p>
                <h1 id="hero-title">A future worth<br><em>investing in.</em></h1>
                <p class="ih-hero-description">Your ambitions deserve a thoughtful investment approach. We bring a wider perspective to managing your wealth, with your long-term future in focus.</p>
                <div class="ih-hero-actions">
                    @auth
                        <a class="ih-button ih-button-cream" href="{{ route('user.dashboard') }}">Go to your dashboard <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>
                    @else
                        <a class="ih-button ih-button-cream" href="{{ url('/register') }}">Start your journey <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>
                    @endauth
                    <a class="ih-hero-secondary" href="#expertise">Discover our expertise <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a>
                </div>
                <a class="ih-hero-scroll" href="#perspective"><span class="ih-scroll-line"></span> A wider view of your wealth</a>
            </div>
            <div class="ih-hero-caption"><span class="ih-caption-line"></span><p>Looking ahead.<br><strong>Thinking long term.</strong></p></div>
        </div>
    </section>

    <div class="ih-principles" id="perspective">
        <div class="ih-container ih-principles-grid">
            <div><span class="ih-principle-number">01</span><p>Your goals.<br><strong>Our starting point.</strong></p></div>
            <div><span class="ih-principle-number">02</span><p>A broader perspective.<br><strong>A considered strategy.</strong></p></div>
            <div><span class="ih-principle-number">03</span><p>Today’s decisions.<br><strong>Tomorrow’s possibilities.</strong></p></div>
        </div>
    </div>

    <section class="ih-section ih-expertise" id="expertise" aria-labelledby="expertise-title">
        <div class="ih-container">
            <div class="ih-section-heading">
                <div><p class="ih-eyebrow"><span></span>Our expertise</p><h2 id="expertise-title">Your wealth.<br><em>A wider perspective.</em></h2></div>
                <div class="ih-section-intro"><p>Building wealth is personal. It starts with what you want to achieve, what you need along the way, and the future you have in mind.</p><a class="ih-text-link" href="{{ url('/about') }}">Get to know us <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div>
            </div>
            <div class="ih-services-grid">
                @for($i = 0; $i < 3; $i++)
                    @php
                        $homepageService = $homepageServices->get($i);
                        $serviceTitle = $homepageService?->title ?: $serviceFallbacks[$i]['title'];
                        $serviceCopy = $homepageService ? trim(strip_tags((string) ($homepageService->short ?: $homepageService->content))) : '';
                        $serviceUrl = $homepageService ? route('service.details', ['id' => $homepageService->id]) : url('/services');
                    @endphp
                    <article class="ih-service">
                        <div class="ih-service-top"><span class="ih-service-number">0{{ $i + 1 }}</span><svg class="ih-service-icon" viewBox="0 0 48 48" fill="none" aria-hidden="true">
                            @if($i === 0)<path d="M8 38V25h8v13M20 38V17h8v21M32 38V9h8v29M7 11l11 5L36 5m-8 0h8v8"/>
                            @elseif($i === 1)<path d="M24 6v36M6 24h36M11 11l26 26m0-26L11 37"/><circle cx="24" cy="24" r="11"/>
                            @else<path d="m24 5 18 10-18 10L6 15 24 5ZM6 24l18 10 18-10M6 33l18 10 18-10"/>
                            @endif
                        </svg></div>
                        <h3><a href="{{ $serviceUrl }}">{{ $serviceTitle }}</a></h3>
                        <p>{{ $serviceCopy !== '' ? \Illuminate\Support\Str::limit($serviceCopy, 180) : $serviceFallbacks[$i]['copy'] }}</p>
                        <a class="ih-text-link" href="{{ $serviceUrl }}">Explore service <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg><span class="ih-sr-only">: {{ $serviceTitle }}</span></a>
                    </article>
                @endfor
            </div>
        </div>
    </section>

    <section class="ih-goals ih-section" aria-labelledby="goals-title">
        <div class="ih-container ih-goals-grid">
            <div class="ih-goals-visual">
                <img src="{{ asset('home/redesign/images/planning-together.webp') }}" alt="Professionals discussing plans together around a table" width="1100" height="734" loading="lazy">
                <div class="ih-image-note"><span class="ih-note-mark" aria-hidden="true">“</span><p>Every investment<br>starts with <em>a purpose.</em></p><span class="ih-note-line"></span></div>
                <span class="ih-photo-caption">Your next chapter starts with a conversation.</span>
            </div>
            <div class="ih-goals-copy">
                <p class="ih-eyebrow"><span></span>Built around you</p>
                <h2 id="goals-title">What does your<br><em>future look like?</em></h2>
                <p>No two financial journeys are the same. Explore an approach that reflects where you are today and where you want to go.</p>
                <div class="ih-goal-tabs" role="tablist" aria-label="Your financial priorities">
                    <button type="button" role="tab" id="goal-grow" aria-controls="panel-grow" aria-selected="true" tabindex="0">Grow</button>
                    <button type="button" role="tab" id="goal-preserve" aria-controls="panel-preserve" aria-selected="false" tabindex="-1">Preserve</button>
                    <button type="button" role="tab" id="goal-plan" aria-controls="panel-plan" aria-selected="false" tabindex="-1">Plan ahead</button>
                </div>
                <div class="ih-goal-panel" role="tabpanel" id="panel-grow" aria-labelledby="goal-grow" tabindex="0"><h3>Give your ambitions room to grow.</h3><p>Whether you’re building your first portfolio or looking for new opportunities, start with a clear view of your goals, your time horizon and the level of risk you’re prepared to take.</p><a class="ih-text-link" href="{{ url('/services') }}">Explore your options <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div>
                <div class="ih-goal-panel" role="tabpanel" id="panel-preserve" aria-labelledby="goal-preserve" tabindex="0" hidden><h3>Take care of what you’ve built.</h3><p>Your priorities can change as your wealth grows. Think about concentration, access to your money and how each investment fits within your wider financial position.</p><a class="ih-text-link" href="{{ url('/contact') }}">Discuss your priorities <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div>
                <div class="ih-goal-panel" role="tabpanel" id="panel-plan" aria-labelledby="goal-plan" tabindex="0" hidden><h3>Make space for your next chapter.</h3><p>A new home, retirement, or a legacy for the next generation: the destination matters. Start a conversation about what you’re working towards and the choices along the way.</p><a class="ih-text-link" href="{{ url('/retirement-and-iras') }}">Look further ahead <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div>
            </div>
        </div>
    </section>

    <section class="ih-section ih-areas" id="investment-areas" aria-labelledby="areas-title">
        <div class="ih-container">
            <div class="ih-section-heading"><div><p class="ih-eyebrow"><span></span>Investment areas</p><h2 id="areas-title">A world of<br><em>possibility.</em></h2></div><div class="ih-section-intro"><p>Look beyond a single market. Explore different asset classes and understand the part each could play in your investment journey.</p><a class="ih-text-link" href="{{ url('/services') }}">Explore all opportunities <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div></div>
            <div class="ih-area-grid">
                @foreach($investmentAreas as $area)
                    <a class="ih-area-card" href="{{ url($area['url']) }}">
                        <div class="ih-area-image"><img src="{{ asset('home/redesign/images/' . $area['image'] . '.webp') }}" alt="{{ $area['alt'] }}" width="900" height="700" loading="lazy"><span class="ih-area-open"><svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></span></div>
                        <div class="ih-area-caption"><p class="ih-area-label">{{ $area['label'] }}</p><h3>{{ $area['title'] }}</h3><p>{{ $area['copy'] }}</p></div>
                    </a>
                @endforeach
            </div>
            <div class="ih-more-areas"><span>Broaden your perspective</span><div><a href="{{ url('/gold') }}">Gold <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a><a href="{{ url('/forex') }}">Foreign exchange <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a><a href="{{ url('/retirement-and-iras') }}">Retirement & IRAs <svg class="ih-icon" aria-hidden="true"><use href="#ih-diagonal"/></svg></a></div></div>
        </div>
    </section>

    <section class="ih-approach" id="approach" aria-labelledby="approach-title">
        <div class="ih-approach-rings" aria-hidden="true"></div>
        <div class="ih-container">
            <div class="ih-approach-heading"><div><p class="ih-eyebrow ih-eyebrow-light"><span></span>A considered approach</p><h2 id="approach-title">Big ambitions.<br><em>Clear next steps.</em></h2></div><p>A good investment decision starts with understanding. Take the time to explore your options, review the details and make an informed choice.</p></div>
            <div class="ih-steps-grid">
                <article><span>01 <i></i></span><h3>Create your profile.</h3><p>Open your account and get access to the client portal. Your investment journey starts here.</p></article>
                <article><span>02 <i></i></span><h3>Know your options.</h3><p>Review the available plans, their requirements and their terms. Ask questions before you commit.</p></article>
                <article><span>03 <i></i></span><h3>Stay connected.</h3><p>Use your dashboard to follow your investments and account activity, with support a conversation away.</p></article>
            </div>
            <a class="ih-button ih-button-cream" href="{{ url('/plans') }}">Explore investment plans <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>
        </div>
    </section>

    <section class="ih-section ih-faq" aria-labelledby="faq-title">
        <div class="ih-container ih-faq-grid">
            <div><p class="ih-eyebrow"><span></span>A little more clarity</p><h2 id="faq-title">Good questions.<br><em>Clear answers.</em></h2><p>Take the next step with a little more understanding.</p><a class="ih-text-link" href="{{ url('/faqs') }}">Visit our help centre <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div>
            <div class="ih-faq-list">
                <details open><summary>How do I get started?<span aria-hidden="true"></span></summary><div><p>Create an account to access the client portal and explore the available investment plans. If you would like to discuss your options first, <a href="{{ url('/contact') }}">contact our team</a>.</p></div></details>
                <details><summary>Where can I review investment plans?<span aria-hidden="true"></span></summary><div><p><a href="{{ url('/plans') }}">Sign in to view the investment plans</a> and review their requirements, duration and terms before deciding whether a plan is right for you.</p></div></details>
                <details><summary>What should I consider before investing?<span aria-hidden="true"></span></summary><div><p>Consider your objectives, how long you can invest, when you may need access to your funds and the amount of loss you can afford. Investment values can fall as well as rise; returns are not guaranteed.</p></div></details>
                <details><summary>How can I follow my investments?<span aria-hidden="true"></span></summary><div><p>Your client dashboard brings your investment and account activity together. <a href="{{ url('/login') }}">Sign in to your account</a> to view your activity, or contact the team if you need help.</p></div></details>
            </div>
        </div>
    </section>

    <section class="ih-contact-banner" aria-labelledby="contact-title"><div class="ih-container ih-contact-inner"><div><p class="ih-eyebrow"><span></span>Your future, in focus</p><h2 id="contact-title">Let’s start with<br><em>what matters to you.</em></h2></div><div><p>A question, an ambition, a plan for the future.<br>We’d like to hear it.</p><a class="ih-button" href="{{ url('/contact') }}">Talk to our team <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a></div></div></section>
@endsection
