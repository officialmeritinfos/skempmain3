@php
    $translateTone = $tone ?? 'adaptive';
    $translateFullWidth = $fullWidth ?? false;
    $translateAlign = $align ?? 'right';

    $buttonClasses = $translateTone === 'dark'
        ? 'border-white/15 bg-white/[0.06] text-white/80 hover:border-white/25 hover:bg-white/10 hover:text-white'
        : 'border-ink-950/10 bg-white text-ink-700 hover:border-ink-950/15 dark:border-white/10 dark:bg-white/5 dark:text-white/70 dark:hover:bg-white/10 dark:hover:text-white';

    $panelClasses = $translateTone === 'dark'
        ? 'border-white/10 bg-ink-900 text-white shadow-black/30'
        : 'border-ink-950/10 bg-white text-ink-950 dark:border-white/10 dark:bg-ink-900 dark:text-white';

    $inputClasses = $translateTone === 'dark'
        ? 'border-white/10 bg-white/[0.06] text-white placeholder:text-white/35 focus:border-bronze-300/60'
        : 'border-ink-950/10 bg-paper-50 text-ink-950 placeholder:text-ink-600/60 focus:border-bronze-400 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-white/35';

    $itemClasses = $translateTone === 'dark'
        ? 'text-white/70 hover:bg-white/[0.07] hover:text-white'
        : 'text-ink-700 hover:bg-paper-100 hover:text-ink-950 dark:text-white/70 dark:hover:bg-white/[0.06] dark:hover:text-white';
@endphp

<div x-data="gtUi()" x-init="init()" class="relative {{ $translateFullWidth ? 'w-full' : '' }}">
    <button
        type="button"
        @click="toggle()"
        :aria-expanded="open"
        aria-haspopup="listbox"
        class="{{ $translateFullWidth ? 'w-full justify-between' : '' }} inline-flex h-10 items-center gap-2 rounded-xl border px-3 text-xs font-semibold shadow-sm backdrop-blur-md transition {{ $buttonClasses }}"
    >
        <span class="inline-flex items-center gap-2">
            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/>
                <path d="M3.5 12h17M12 3c2.2 2.4 3.4 5.4 3.4 9S14.2 18.6 12 21c-2.2-2.4-3.4-5.4-3.4-9S9.8 5.4 12 3Z" stroke="currentColor" stroke-width="1.5"/>
            </svg>
            <span class="{{ $translateFullWidth ? '' : 'hidden sm:inline' }}" x-text="label"></span>
            @unless($translateFullWidth)
                <span class="sm:hidden">Translate</span>
            @endunless
        </span>

        <svg class="h-3.5 w-3.5 shrink-0 opacity-55 transition-transform" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <path d="m6 8 4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    <div
        x-show="open"
        x-cloak
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-[80] mt-2 w-[min(18rem,calc(100vw-2rem))] overflow-hidden rounded-2xl border shadow-2xl {{ $translateAlign === 'left' ? 'left-0' : 'right-0' }} {{ $panelClasses }}"
    >
        <div class="border-b border-current/10 p-3">
            <div class="relative">
                <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 opacity-40" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.6"/>
                    <path d="m16 16 4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
                <input
                    x-model="q"
                    type="search"
                    placeholder="Search language..."
                    class="w-full rounded-xl border py-2.5 pl-9 pr-3 text-xs outline-none transition {{ $inputClasses }}"
                >
            </div>
        </div>

        <div class="max-h-64 overflow-y-auto p-2" role="listbox" aria-label="Languages">
            <template x-for="lang in filtered()" :key="lang.code">
                <button
                    type="button"
                    @click="setLang(lang.code, lang.name)"
                    class="block w-full rounded-xl px-3 py-2.5 text-left text-xs font-semibold transition {{ $itemClasses }}"
                    role="option"
                >
                    <span x-text="lang.name"></span>
                </button>
            </template>

            <div x-show="filtered().length === 0" class="px-3 py-6 text-center text-xs opacity-45">
                No languages found.
            </div>
        </div>

        <div class="flex items-center justify-between border-t border-current/10 px-3 py-2.5 text-[10px] font-semibold">
            <button type="button" @click="setLang('en', 'English')" class="opacity-55 transition hover:opacity-100">Reset to English</button>
            <span class="opacity-35">Powered by Google</span>
        </div>
    </div>
</div>
