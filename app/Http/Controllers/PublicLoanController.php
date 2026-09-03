<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\Package;

class PublicLoanController extends Controller
{
    public function __invoke()
    {
        $web = GeneralSetting::where('id', 1)->first();

        return view('home.loan', [
            'siteName' => $web?->name ?? config('app.name'),
            'web' => $web,
            'pageName' => 'Financing',
            'packages' => Package::where('status', 1)->get(),
        ]);
    }
}
