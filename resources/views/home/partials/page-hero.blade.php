<section class="ih-page-hero {{ !empty($image) ? 'ih-page-hero-visual' : '' }}">
    <div class="ih-container">
        <nav class="ih-breadcrumb" aria-label="Breadcrumb"><a href="{{ url('/') }}">Home</a><span aria-hidden="true">/</span>@if(!empty($parentLabel))<a href="{{ url($parentPath) }}">{{ $parentLabel }}</a><span aria-hidden="true">/</span>@endif<span aria-current="page">{{ $label }}</span></nav>
        <div class="ih-page-hero-grid">
            <div class="ih-page-hero-copy"><p class="ih-eyebrow"><span></span>{{ $label }}</p><h1>{{ $heading }}@if(!empty($accent))<br><em>{{ $accent }}</em>@endif</h1>@if(!empty($intro))<p class="ih-page-intro">{{ $intro }}</p>@endif
                @if(!empty($actionLabel))<a class="ih-button" href="{{ $actionHref ?? url('/contact') }}">{{ $actionLabel }} <svg class="ih-icon" aria-hidden="true"><use href="#ih-arrow"/></svg></a>@endif
            </div>
            @if(!empty($image))<div class="ih-page-hero-photo"><img src="{{ $image }}" alt="{{ $imageAlt ?? '' }}" width="1400" height="1000" fetchpriority="high">@if(!empty($imageNote))<div class="ih-page-image-note">{{ $imageNote }}</div>@endif</div>@endif
        </div>
    </div>
</section>
