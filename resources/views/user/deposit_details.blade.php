@extends('layouts.dashboard')

@section('title', 'Deposit Invoice')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
        @include('templates.notification')

        {{-- Invoice Header --}}
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Invoice</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        ID: <span class="font-medium text-blue-600 dark:text-blue-400">#{{ $deposit->reference }}</span>
                    </p>
                </div>
                <div class="mt-4 sm:mt-0">
                    @switch($deposit->status)
                        @case(1)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700 dark:bg-green-700/20 dark:text-green-300">Completed</span>
                            @break
                        @case(2)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-700 dark:bg-blue-700/20 dark:text-blue-300">Pending</span>
                            @break
                        @case(3)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700 dark:bg-red-700/20 dark:text-red-300">Cancelled</span>
                            @break
                        @case(4)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                         bg-amber-100 text-amber-700 dark:bg-amber-700/20 dark:text-amber-300">
                                Proof Submitted
                            </span>
                        @break

                        @default
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-700 dark:bg-gray-700/20 dark:text-gray-300">Partial</span>
                    @endswitch
                </div>
            </div>
        </div>

        {{-- Details Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- User Info --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 space-y-2">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Billed To</h3>
                <p class="text-sm text-gray-800 dark:text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $web->address }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400"><i class="fas fa-phone mr-1"></i>{{ $web->phone }}</p>
            </div>

            {{-- Invoice Meta --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 space-y-2">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Invoice Details</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">ID: <span class="text-gray-800 dark:text-white">#{{ $deposit->reference }}</span></p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Created: <span class="text-gray-800 dark:text-white">{{ $deposit->created_at->format('Y-m-d H:i') }}</span></p>
                @if($deposit->status == 4 && $deposit->transactionHash)
                    <p class="text-sm text-gray-500 dark:text-gray-400">Transaction Hash: <span class="text-gray-800 dark:text-white">{{ $deposit->transactionHash }}</span></p>
                @endif
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded-xl shadow-sm">
            <table class="min-w-full text-sm bg-white dark:bg-gray-800 text-left">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Payment Method</th>
                    <th class="px-4 py-3">Address</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                <tr>
                    <td class="px-4 py-4">1</td>
                    <td class="px-4 py-4">Account Funding</td>
                    <td class="px-4 py-4">${{ number_format($deposit->amount, 2) }}</td>
                    <td class="px-4 py-4">{{ $deposit->asset }}</td>
                    <td class="px-4 py-4">{{ $deposit->details }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        {{-- Payment Instructions --}}
        <div class="bg-blue-50 dark:bg-blue-900/10 text-blue-800 dark:text-blue-300 rounded-xl p-6 shadow space-y-4">
            @if($deposit->paymentMethod == 1)
                <p>
                    Please send <strong>{{ number_format($deposit->cryptoAmount, 5) }} {{ $deposit->asset }}</strong> to the address below.
                    Your account will be credited once payment is confirmed. Do not send less than the exact amount.
                </p>
            @else
                <p>
                    Please send <strong>${{ number_format($deposit->amount, 2) }} worth of {{ $deposit->asset }}</strong> to the address below.
                    After payment, contact support for instant confirmation.
                </p>
            @endif

            <div
                x-data="{ copy() { navigator.clipboard.writeText('{{ $deposit->details }}').then(() => toastr.success('Address copied to clipboard')) } }"
                class="flex flex-wrap items-center gap-3"
            >
                <div
                    id="address"
                    class="bg-gray-100 dark:bg-gray-800 px-4 py-2 rounded text-sm break-all font-mono"
                >
                    {{ $deposit->details }}
                </div>

                <button
                    @click="copy"
                    type="button"
                    class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white text-sm transition"
                >
                    Copy Address
                </button>
            </div>

                {{-- QR + Wallet Address (Tailwind) --}}
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                    {{-- QR Card --}}
                    <div class="bg-white/80 dark:bg-gray-900/40 border border-blue-100 dark:border-blue-900/40
                rounded-2xl p-4 sm:p-6 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-white">
                                    Scan QR Code
                                </h4>
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">
                                    Scan to copy the address instantly.
                                </p>
                            </div>

                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                         bg-blue-100 text-blue-700 dark:bg-blue-700/20 dark:text-blue-300">
                {{ $deposit->asset }}
            </span>
                        </div>

                        <div class="mt-4 flex items-center justify-center">
                            <img
                                class="h-40 w-40 sm:h-44 sm:w-44 rounded-xl bg-white p-2 shadow"
                                alt="Wallet address QR code"
                                src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($deposit->details) }}"
                                loading="lazy"
                            >
                        </div>

                        <p class="mt-4 text-center text-xs text-gray-500 dark:text-gray-400">
                            If scanning fails, use the “Copy Address” button.
                        </p>
                    </div>

                </div>

                {{-- Action Bar --}}
                <div class="flex flex-wrap items-center gap-3">
                    @if(in_array($deposit->status, [2, 4]))
{{--                        <button--}}
{{--                            x-data--}}
{{--                            @click="$dispatch('open-proof-modal')"--}}
{{--                            type="button"--}}
{{--                            class="btn-pink-blue"--}}
{{--                        >--}}
{{--                            I’ve Deposited--}}
{{--                        </button>--}}

                        <a
                             href="{{ route('deposit.havePaid', $deposit->id) }}"
                            class="btn-pink-blue"
                        >
                            I’ve Deposited
                        </a>
                    @endif

                    @if($deposit->status == 4 && $deposit->paymentProof)
                        <a href="{{ url($deposit->paymentProof) }}" target="_blank"
                           class="px-4 py-2 rounded bg-emerald-600 hover:bg-emerald-700 text-white text-sm transition">
                            View Submitted Proof
                        </a>
                    @endif
                </div>


        </div>

    </div>

    {{-- Proof Modal --}}
    <div
        x-data="{ open: false }"
        x-on:open-proof-modal.window="open = true"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center"
        aria-modal="true"
        role="dialog"
    >
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/50" @click="open = false"></div>

        {{-- Dialog --}}
        <div class="relative w-full max-w-lg mx-4 rounded-2xl shadow-xl overflow-hidden
                bg-white dark:bg-gray-800">
            {{-- Header --}}
            <div class="px-6 py-4 bg-gradient-to-r from-pink-500 via-rose-500 to-blue-600 text-white">
                <div class="flex items-center justify-between">
                    <h4 class="font-semibold">Submit Payment Proof</h4>
                    <button @click="open = false" class="text-white/90 hover:text-white">&times;</button>
                </div>
            </div>

            {{-- Body --}}
            <form action="{{ route('deposits.proof', ['id' => $deposit->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-6 py-5 space-y-4">
                    <div>
                        <label for="tx_hash" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Transaction Hash
                        </label>
                        <input
                            type="text"
                            id="tx_hash"
                            name="tx_hash"
                            class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700
               bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100
               px-4 py-3 text-sm
               shadow-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500
               transition duration-200 ease-in-out"
                            placeholder="Paste your blockchain TX hash">
                    </div>

                    <div class="mt-5">
                        <label for="proof" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Payment Proof (PNG, JPG, WEBP, or PDF • max 5MB)
                        </label>
                        <input
                            type="file"
                            id="proof"
                            name="proof"
                            accept=".png,.jpg,.jpeg,.webp,.pdf"
                            class="mt-1 w-full text-sm
               file:mr-4 file:py-2.5 file:px-4
               file:rounded-lg file:border-0
               file:text-white file:font-medium
               file:bg-gradient-to-r file:from-pink-500 file:via-rose-500 file:to-blue-600
               hover:file:from-pink-600 hover:file:to-blue-700
               dark:file:from-pink-500 dark:file:to-blue-600
               rounded-xl border border-gray-300 dark:border-gray-700
               bg-gray-50 dark:bg-gray-900 px-4 py-2
               shadow-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500
               transition duration-200 ease-in-out">
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Tip: Upload screenshots or PDF receipts. Ensure details are clear and readable.
                        </p>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900 flex items-center justify-end gap-3">
                    <button type="button" @click="open = false"
                            class="px-4 py-2 rounded-lg text-sm bg-gray-200 dark:bg-gray-700
                               text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 rounded-lg text-sm text-white
                               bg-gradient-to-r from-pink-500 via-rose-500 to-blue-600
                               hover:from-pink-600 hover:to-blue-700">
                        Submit Proof
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
