@switch($icon ?? 'home')
    @case('home')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 10 8-6 8 6v9a1 1 0 0 1-1 1h-5v-6h-4v6H5a1 1 0 0 1-1-1v-9Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
        @break
    @case('chart')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V9M10 19V5M16 19v-7M22 19H2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
    @case('deposit')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('withdraw')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21V9m0 0 4 4m-4-4-4 4M5 3h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('transfer')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 7h14m0 0-3-3m3 3-3 3M19 17H5m0 0 3 3m-3-3 3-3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('briefcase')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2M4 8h16v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8Zm0 4h16" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
        @break
    @case('card')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M3 10h18M7 15h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
    @case('finance')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 10 12 4l9 6M5 10v8M10 10v8M14 10v8M19 10v8M3 20h18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('badge')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="9" r="5" stroke="currentColor" stroke-width="1.6"/><path d="m8.5 13-1 8 4.5-2 4.5 2-1-8" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
        @break
    @case('wallet')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12H6a2 2 0 0 1-2-2V7Z" stroke="currentColor" stroke-width="1.6"/><path d="M16 11h5v4h-5a2 2 0 1 1 0-4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
        @break
    @case('users')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 5.5a3 3 0 0 1 0 5.5M16.5 14a5 5 0 0 1 4 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
    @case('settings')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/><path d="M19 12a7 7 0 0 0-.1-1.2l2-1.5-2-3.4-2.4 1a7 7 0 0 0-2-1.2L14.2 3h-4.4l-.3 2.7a7 7 0 0 0-2 1.2l-2.4-1-2 3.4 2 1.5A7 7 0 0 0 5 12c0 .4 0 .8.1 1.2l-2 1.5 2 3.4 2.4-1a7 7 0 0 0 2 1.2l.3 2.7h4.4l.3-2.7a7 7 0 0 0 2-1.2l2.4 1 2-3.4-2-1.5c.1-.4.1-.8.1-1.2Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
        @break
    @case('shield')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 5 6v5c0 4.5 2.8 8.2 7 10 4.2-1.8 7-5.5 7-10V6l-7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('logout')
        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M10 5H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h4M14 8l4 4-4 4M18 12H9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
@endswitch
