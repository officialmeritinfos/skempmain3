<aside class="ac-story" aria-label="{{ $authName }}">
    <img class="ac-story-image" src="{{ asset('home/redesign/images/financial-district.webp') }}" alt="" width="1800" height="1200" fetchpriority="high">
    <div class="ac-story-overlay"></div>
    <div class="ac-story-inner">
        <div class="ac-story-top">
            <a class="ac-story-brand" href="{{ url('/') }}" aria-label="{{ $authName }} home"><img src="{{ $authLogo }}" alt="{{ $authName }}" width="123" height="66"></a>
            <p>Investment &<br>asset management</p>
        </div>
        <div class="ac-story-bottom">
            <p class="ac-story-kicker"><span></span>@yield('story_eyebrow', 'A wider perspective')</p>
            <h2>@yield('story_title', 'Your future.<br><em>Always in focus.</em>')</h2>
            <p class="ac-story-copy">@yield('story_copy', 'A wider view of your investments, with your next chapter in mind.')</p>
            <div class="ac-story-foot"><span>Perspective. Purpose. Possibility.</span><span class="ac-story-mark" aria-hidden="true">↗</span></div>
        </div>
    </div>
</aside>
