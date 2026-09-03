@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3.5 text-red-800">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m6 6 8 8M14 6l-8 8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                </svg>
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
    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3.5 text-emerald-800">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m5.5 10.5 3 3 6-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3.5 text-red-800">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M10 5.5v5M10 14h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                    <circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/>
                </svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('error') }}</p>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3.5 text-amber-900">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-100">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M10 5.5v5M10 14h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                    <circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/>
                </svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('warning') }}</p>
        </div>
    </div>
@endif

@if(session('info'))
    <div class="mb-6 rounded-2xl border border-sky-200 bg-sky-50 px-4 py-3.5 text-sky-900">
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-sky-100">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M10 9v5M10 6h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                    <circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/>
                </svg>
            </span>
            <p class="min-w-0 flex-1 text-sm leading-6">{{ session('info') }}</p>
        </div>
    </div>
@endif
