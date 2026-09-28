<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Deposit minimums
    |--------------------------------------------------------------------------
    |
    | Crypto deposits can be tuned per environment without changing code.
    | Bank deposits intentionally keep the requested $3,000 minimum.
    |
    */
    'crypto_minimum' => (float) env('CRYPTO_DEPOSIT_MINIMUM', 30),
    'bank_minimum' => (float) env('BANK_DEPOSIT_MINIMUM', 3000),

    /*
    |--------------------------------------------------------------------------
    | Bank deposit defaults
    |--------------------------------------------------------------------------
    |
    | The deposits table requires an asset/details value. Bank deposits are
    | represented in USD and the real account details are issued by support.
    |
    */
    'bank_asset' => 'USD',
    'bank_details_message' => 'Contact support for the unique bank details assigned to your account before making payment.',
];
