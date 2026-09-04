@extends('layouts.dashboard')

@section('title', $pageName ?? 'KYC Verification')
@section('page_heading', 'Identity verification')

@section('content')
    @php
        $canSubmitKyc = in_array((int) $user->isVerified, [2, 3], true);
        $kycUnderReview = (int) $user->isVerified === 4;
        $kycVerified = !$canSubmitKyc && !$kycUnderReview;
    @endphp

    <div class="mx-auto max-w-6xl space-y-6">
        @include('templates.notification')

        <section class="overflow-hidden rounded-[28px] border border-ink-950/8 bg-ink-950 text-white shadow-sm dark:border-white/8">
            <div class="grid gap-8 px-5 py-7 sm:px-7 lg:grid-cols-[1.25fr_.75fr] lg:px-9 lg:py-9">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.22em] text-bronze-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-bronze-300"></span>
                        Account verification
                    </div>
                    <h1 class="mt-4 font-display text-3xl font-semibold tracking-[-0.03em] sm:text-4xl">Confirm the identity behind your account.</h1>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-white/58">
                        Submit clear identity documents and a recent selfie so your account can be reviewed. Your details should match the information attached to your account.
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-3 lg:grid-cols-1">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.045] p-4">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-white/35">Current status</p>
                        <div class="mt-2 flex items-center gap-2 text-sm font-semibold">
                            <span class="h-2 w-2 rounded-full {{ $kycVerified ? 'bg-emerald-400' : ($kycUnderReview ? 'bg-amber-300' : 'bg-bronze-300') }}"></span>
                            {{ $kycVerified ? 'Verified' : ($kycUnderReview ? 'Under review' : 'Action required') }}
                        </div>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/[0.045] p-4">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-white/35">Account</p>
                        <p class="mt-2 truncate text-sm font-semibold text-white/82">{{ $user->username }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/[0.045] p-4">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-white/35">Reference</p>
                        <p class="mt-2 truncate text-sm font-semibold text-white/82">{{ $user->userRef }}</p>
                    </div>
                </div>
            </div>
        </section>

        @if($canSubmitKyc)
            <div
                x-data="{
                    submitting: false,
                    frontName: '',
                    backName: '',
                    selfieName: '',
                    membershipName: ''
                }"
                class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_310px]"
            >
                <section class="rounded-[26px] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035] sm:p-7">
                    <div class="border-b border-ink-950/8 pb-5 dark:border-white/8">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-bronze-600 dark:text-bronze-300">Verification details</p>
                        <h2 class="mt-2 text-xl font-bold text-ink-950 dark:text-white">Identity information</h2>
                        <p class="mt-2 text-sm leading-6 text-ink-600 dark:text-white/45">Use the same legal details shown on the identity document you upload.</p>
                    </div>

                    <form
                        method="POST"
                        action="{{ route('kyc.update') }}"
                        enctype="multipart/form-data"
                        class="mt-6 space-y-7"
                        @submit="submitting = true"
                    >
                        @csrf

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="kyc-dob" class="mb-2 block text-xs font-bold text-ink-800 dark:text-white/70">Date of birth</label>
                                <input
                                    id="kyc-dob"
                                    type="date"
                                    name="dob"
                                    value="{{ old('dob', $user->dateOfBirth) }}"
                                    required
                                    class="w-full rounded-xl border border-ink-950/10 bg-paper-50 px-4 py-3 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-2 focus:ring-bronze-300/20 dark:border-white/10 dark:bg-white/5 dark:text-white"
                                >
                            </div>

                            <div>
                                <label for="kyc-country" class="mb-2 block text-xs font-bold text-ink-800 dark:text-white/70">Country</label>
                                <input
                                    id="kyc-country"
                                    type="text"
                                    name="country"
                                    value="{{ old('country', $user->country) }}"
                                    required
                                    autocomplete="country-name"
                                    class="w-full rounded-xl border border-ink-950/10 bg-paper-50 px-4 py-3 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-2 focus:ring-bronze-300/20 dark:border-white/10 dark:bg-white/5 dark:text-white"
                                >
                            </div>

                            <div>
                                <label for="kyc-id-type" class="mb-2 block text-xs font-bold text-ink-800 dark:text-white/70">Identity document</label>
                                <select
                                    id="kyc-id-type"
                                    name="idType"
                                    required
                                    class="w-full rounded-xl border border-ink-950/10 bg-paper-50 px-4 py-3 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-2 focus:ring-bronze-300/20 dark:border-white/10 dark:bg-[#10232a] dark:text-white"
                                >
                                    <option value="">Select document type</option>
                                    @foreach(['Drivers License', 'National ID Card', 'International Passport'] as $idType)
                                        <option value="{{ $idType }}" @selected(old('idType', $user->docType) === $idType)>{{ $idType }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="kyc-id-number" class="mb-2 block text-xs font-bold text-ink-800 dark:text-white/70">Document number</label>
                                <input
                                    id="kyc-id-number"
                                    type="text"
                                    name="idNumber"
                                    value="{{ old('idNumber', $user->docNumber) }}"
                                    placeholder="Enter document number"
                                    required
                                    class="w-full rounded-xl border border-ink-950/10 bg-paper-50 px-4 py-3 text-sm text-ink-950 outline-none transition focus:border-bronze-400 focus:ring-2 focus:ring-bronze-300/20 dark:border-white/10 dark:bg-white/5 dark:text-white"
                                >
                            </div>
                        </div>

                        <div>
                            <div class="mb-4">
                                <p class="text-xs font-bold text-ink-800 dark:text-white/70">Identity document images</p>
                                <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/40">Upload clear, uncropped images. The front is required; the back is optional when your document has no reverse-side information.</p>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <label class="group relative cursor-pointer rounded-2xl border border-dashed border-ink-950/15 bg-paper-50 p-5 transition hover:border-bronze-400 hover:bg-bronze-100/25 dark:border-white/12 dark:bg-white/[0.025] dark:hover:border-bronze-300/50">
                                    <input type="file" name="frontImage" accept="image/*" required class="sr-only" @change="frontName = $event.target.files[0]?.name || ''">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-ink-950 text-bronze-300 dark:bg-white/8">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 16V5m0 0-4 4m4-4 4 4M5 19h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                    <span class="mt-4 block text-sm font-bold text-ink-950 dark:text-white">Front of ID</span>
                                    <span class="mt-1 block truncate text-xs text-ink-600 dark:text-white/40" x-text="frontName || 'Choose image'">Choose image</span>
                                </label>

                                <label class="group relative cursor-pointer rounded-2xl border border-dashed border-ink-950/15 bg-paper-50 p-5 transition hover:border-bronze-400 hover:bg-bronze-100/25 dark:border-white/12 dark:bg-white/[0.025] dark:hover:border-bronze-300/50">
                                    <input type="file" name="backImage" accept="image/*" class="sr-only" @change="backName = $event.target.files[0]?.name || ''">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-paper-200 text-ink-700 dark:bg-white/8 dark:text-white/60">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 16V5m0 0-4 4m4-4 4 4M5 19h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                    <span class="mt-4 block text-sm font-bold text-ink-950 dark:text-white">Back of ID <span class="font-medium text-ink-600 dark:text-white/35">(optional)</span></span>
                                    <span class="mt-1 block truncate text-xs text-ink-600 dark:text-white/40" x-text="backName || 'Choose image'">Choose image</span>
                                </label>
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="group relative cursor-pointer rounded-2xl border border-dashed border-ink-950/15 bg-paper-50 p-5 transition hover:border-bronze-400 hover:bg-bronze-100/25 dark:border-white/12 dark:bg-white/[0.025] dark:hover:border-bronze-300/50">
                                <input type="file" name="selfie" accept="image/*" required class="sr-only" @change="selfieName = $event.target.files[0]?.name || ''">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-ink-950 text-bronze-300 dark:bg-white/8">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="9" r="3" stroke="currentColor" stroke-width="1.6"/><path d="M5 20a7 7 0 0 1 14 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                </span>
                                <span class="mt-4 block text-sm font-bold text-ink-950 dark:text-white">Recent selfie</span>
                                <span class="mt-1 block truncate text-xs text-ink-600 dark:text-white/40" x-text="selfieName || 'Face clearly visible'">Face clearly visible</span>
                            </label>

                            <label class="group relative cursor-pointer rounded-2xl border border-dashed border-ink-950/15 bg-paper-50 p-5 transition hover:border-bronze-400 hover:bg-bronze-100/25 dark:border-white/12 dark:bg-white/[0.025] dark:hover:border-bronze-300/50">
                                <input type="file" name="membership" accept="image/*" class="sr-only" @change="membershipName = $event.target.files[0]?.name || ''">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-paper-200 text-ink-700 dark:bg-white/8 dark:text-white/60">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><circle cx="9" cy="11" r="2" stroke="currentColor" stroke-width="1.5"/><path d="M13 10h4M13 14h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </span>
                                <span class="mt-4 block text-sm font-bold text-ink-950 dark:text-white">Membership ID <span class="font-medium text-ink-600 dark:text-white/35">(optional)</span></span>
                                <span class="mt-1 block truncate text-xs text-ink-600 dark:text-white/40" x-text="membershipName || 'If already issued'">If already issued</span>
                            </label>
                        </div>

                        <div class="flex flex-col gap-3 border-t border-ink-950/8 pt-6 dark:border-white/8 sm:flex-row sm:items-center sm:justify-between">
                            <p class="max-w-lg text-xs leading-5 text-ink-600 dark:text-white/40">Review your details before submitting. Once sent, the verification will move into review.</p>
                            <button
                                type="submit"
                                :disabled="submitting"
                                class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-ink-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-ink-900 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-bronze-300 dark:text-ink-950 dark:hover:bg-bronze-200"
                            >
                                <svg x-show="submitting" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3"/><path class="opacity-80" d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                                <span x-text="submitting ? 'Submitting...' : 'Submit for review'">Submit for review</span>
                            </button>
                        </div>
                    </form>
                </section>

                <aside class="space-y-4 lg:sticky lg:top-[106px] lg:self-start">
                    <div class="rounded-[24px] border border-ink-950/8 bg-white p-5 shadow-sm dark:border-white/8 dark:bg-white/[0.035]">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-bronze-600 dark:text-bronze-300">Before you submit</p>
                        <div class="mt-4 space-y-4">
                            @foreach([
                                ['Clear images', 'All corners and document details should be readable.'],
                                ['Matching details', 'Your date of birth and country should match your document.'],
                                ['Recent selfie', 'Use a current photograph with your face unobstructed.'],
                            ] as $item)
                                <div class="flex gap-3">
                                    <span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                                        <svg class="h-3 w-3" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m5 10 3 3 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-bold text-ink-950 dark:text-white">{{ $item[0] }}</p>
                                        <p class="mt-1 text-xs leading-5 text-ink-600 dark:text-white/40">{{ $item[1] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-[24px] border border-bronze-300/30 bg-bronze-100/45 p-5 dark:bg-bronze-300/[0.06]">
                        <p class="text-xs font-bold text-ink-950 dark:text-white">Need help with verification?</p>
                        <p class="mt-2 text-xs leading-5 text-ink-600 dark:text-white/45">Use the official support channel if you are unsure which document to submit.</p>
                    </div>
                </aside>
            </div>
        @elseif($kycUnderReview)
            <section class="rounded-[28px] border border-amber-300/35 bg-white p-6 shadow-sm dark:border-amber-300/15 dark:bg-white/[0.035] sm:p-8">
                <div class="flex max-w-2xl flex-col gap-5 sm:flex-row sm:items-start">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-amber-100 text-amber-700 dark:bg-amber-300/10 dark:text-amber-300">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber-700 dark:text-amber-300">Submission received</p>
                        <h2 class="mt-2 text-2xl font-bold text-ink-950 dark:text-white">Your KYC is under review.</h2>
                        <p class="mt-3 text-sm leading-7 text-ink-600 dark:text-white/45">Your identity information has been submitted and is awaiting review. No further action is required on this page right now.</p>
                    </div>
                </div>
            </section>
        @else
            <section class="rounded-[28px] border border-emerald-300/35 bg-white p-6 shadow-sm dark:border-emerald-300/15 dark:bg-white/[0.035] sm:p-8">
                <div class="flex max-w-2xl flex-col gap-5 sm:flex-row sm:items-start">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 5 6v5c0 4.5 2.8 8.2 7 10 4.2-1.8 7-5.5 7-10V6l-7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-700 dark:text-emerald-300">Verification complete</p>
                        <h2 class="mt-2 text-2xl font-bold text-ink-950 dark:text-white">Your identity is verified.</h2>
                        <p class="mt-3 text-sm leading-7 text-ink-600 dark:text-white/45">Your account has completed the current KYC verification process. Your verified status remains visible from your client workspace.</p>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
