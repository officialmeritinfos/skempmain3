@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-300/30 bg-red-500/8 px-4 py-3.5 text-red-700 dark:border-red-300/20 dark:bg-red-400/10 dark:text-red-100">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-500/10 text-red-600 dark:bg-red-300/10 dark:text-red-200">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m6 6 8 8M14 6l-8 8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
            </span>
            <div class="min-w-0 flex-1 text-sm leading-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="mb-6 rounded-2xl border border-emerald-300/30 bg-emerald-500/8 px-4 py-3.5 text-emerald-800 dark:border-emerald-300/20 dark:bg-emerald-300/10 dark:text-emerald-100">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-500/10 text-emerald-700 dark:bg-emerald-300/10 dark:text-emerald-200">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m5.5 10.5 3 3 6-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 rounded-2xl border border-red-300/30 bg-red-500/8 px-4 py-3.5 text-red-700 dark:border-red-300/20 dark:bg-red-400/10 dark:text-red-100">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-500/10 text-red-600 dark:bg-red-300/10 dark:text-red-200">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 5.5v5M10 14h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/></svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('error') }}</p>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="mb-6 rounded-2xl border border-amber-300/30 bg-amber-500/8 px-4 py-3.5 text-amber-800 dark:border-amber-300/20 dark:bg-amber-300/10 dark:text-amber-100">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-500/10 text-amber-700 dark:bg-amber-300/10 dark:text-amber-200">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 5.5v5M10 14h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/></svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('warning') }}</p>
        </div>
    </div>
@endif

@if(session('info'))
    <div class="mb-6 rounded-2xl border border-cyan-300/30 bg-cyan-500/8 px-4 py-3.5 text-cyan-800 dark:border-cyan-300/20 dark:bg-cyan-300/10 dark:text-cyan-100">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-cyan-500/10 text-cyan-700 dark:bg-cyan-300/10 dark:text-cyan-200">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 9v5M10 6h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/></svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('info') }}</p>
        </div>
    </div>
@endif
