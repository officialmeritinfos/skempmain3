<button
    type="button"
    @click="$store.theme.toggle()"
    class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-900/10 bg-white/70 text-slate-700 shadow-sm backdrop-blur-xl transition hover:-translate-y-0.5 hover:border-cyan-400/30 hover:text-slate-950 dark:border-white/10 dark:bg-white/7 dark:text-white/70 dark:hover:border-cyan-300/30 dark:hover:bg-white/10 dark:hover:text-white"
    :aria-label="$store.theme.isDark ? 'Switch to light theme' : 'Switch to dark theme'"
    :title="$store.theme.isDark ? 'Light theme' : 'Dark theme'"
>
    <svg x-show="$store.theme.isDark" class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/>
        <path d="M12 2.8v2.1M12 19.1v2.1M21.2 12h-2.1M4.9 12H2.8M18.5 5.5 17 7M7 17l-1.5 1.5M18.5 18.5 17 17M7 7 5.5 5.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
    </svg>
    <svg x-show="!$store.theme.isDark" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M20.4 15.2A8.2 8.2 0 0 1 8.8 3.6 8.3 8.3 0 1 0 20.4 15.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
    </svg>
</button>
