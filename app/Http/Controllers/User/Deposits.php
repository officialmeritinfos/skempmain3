<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Defaults\Wallet;
use App\Http\Controllers\Controller;
use App\Jobs\SendDepositNotification;
use App\Models\Coin;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Deposits extends Controller
{
    use Regular, Wallet;

    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web' => $web,
            'user' => $user,
            'deposits' => Deposit::where('user', $user->id)->paginate(),
            'pageName' => 'Deposit Lists',
            'siteName' => $web->name,
        ];

        return view('user.deposits', $dataView);
    }

    public function newDeposit()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web' => $web,
            'user' => $user,
            'coins' => Coin::where('status', 1)->get(),
            'cryptoMinimum' => (float) config('deposits.crypto_minimum', 30),
            'bankMinimum' => (float) config('deposits.bank_minimum', 3000),
            'pageName' => 'New Deposit',
            'siteName' => $web->name,
        ];

        return view('user.new_deposit', $dataView);
    }

    public function processDeposit(Request $request)
    {
        $web = GeneralSetting::where('id', 1)->first();
        $user = Auth::user();

        $validator = Validator::make($request->input(), [
            'deposit_type' => ['required', 'in:crypto,bank'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'asset' => ['nullable', 'string', 'required_if:deposit_type,crypto'],
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }

        $input = $validator->validated();
        $depositType = $input['deposit_type'];
        $minimumDeposit = $depositType === 'bank'
            ? (float) config('deposits.bank_minimum', 3000)
            : (float) config('deposits.crypto_minimum', 30);

        if ((float) $input['amount'] < $minimumDeposit) {
            return back()
                ->withInput()
                ->with('error', 'Amount to Deposit is less than minimum Deposit of $' . number_format($minimumDeposit, 2));
        }

        $reference = $this->generateId('deposits', 'reference', 10);

        if ($depositType === 'bank') {
            $dataDeposit = [
                'user' => $user->id,
                'reference' => $reference,
                'amount' => $input['amount'],
                'asset' => config('deposits.bank_asset', 'USD'),
                'deposit_type' => 'bank',
                'details' => config(
                    'deposits.bank_details_message',
                    'Contact support for the unique bank details assigned to your account before making payment.'
                ),
                'paymentRef' => $reference,
                'paymentMethod' => 2,
                'methodType' => 2,
            ];
        } else {
            $coinExists = Coin::where('asset', strtoupper($input['asset']))->first();

            if (empty($coinExists)) {
                return back()->withInput()->with('error', 'Asset is not supported');
            }

            switch ($web->paymentMethod) {
                case 1:
                    $dataInvoice = [
                        'name' => 'Account Funding',
                        'description' => 'Account Funding by ' . $user->name,
                        'amount' => $input['amount'],
                        'payerName' => $user->name,
                        'email' => $user->email,
                        'asset' => $input['asset'],
                        'fiat' => 'USD',
                        'customId' => $reference,
                    ];

                    $result = $this->createInvoice($dataInvoice);
                    $response = $result->json();

                    if ($result->successful()) {
                        $address = $response['data']['address'];
                        $dataDeposit = [
                            'user' => $user->id,
                            'reference' => $reference,
                            'amount' => $input['amount'],
                            'cryptoAmount' => $response['data']['cryptoAmount'],
                            'asset' => $input['asset'],
                            'deposit_type' => 'crypto',
                            'details' => $response['data']['address'],
                            'paymentRef' => $response['data']['reference'],
                            'paymentMethod' => 1,
                            'methodType' => 1,
                        ];
                    } else {
                        return back()->withInput()->with('error', $response['data']['error']);
                    }
                    break;

                default:
                    $address = $coinExists->address;
                    $dataDeposit = [
                        'user' => $user->id,
                        'reference' => $reference,
                        'amount' => $input['amount'],
                        'asset' => $input['asset'],
                        'deposit_type' => 'crypto',
                        'details' => $coinExists->address,
                        'paymentRef' => $reference,
                        'paymentMethod' => 2,
                        'methodType' => 2,
                    ];
                    break;
            }
        }

        $create = Deposit::create($dataDeposit);

        if (!empty($create)) {
            $admin = User::where('is_admin', 1)->first();

            if ($depositType === 'bank') {
                $userMessage = "
                    Your new bank deposit request of $<b>" . $input['amount'] . "</b>
                    has been received and is awaiting payment. Please contact support for the unique bank
                    details assigned to your account before making payment.
                ";

                $adminMessage = "
                    A new bank deposit request of $<b>" . $input['amount'] . "</b>
                    has been placed by the investor <b>" . $user->name . "</b> with reference
                    <b>" . $reference . "</b>. The investor has been instructed to contact support for
                    their unique bank details.
                ";
            } else {
                $userMessage = "
                    Your new deposit request of $<b>" . $input['amount'] . " worth of " . $input['asset'] . "</b>
                    has been received and awaiting payment. To complete your deposit, send your payment to the Address
                    below: <br>
                    <b>Wallet Address:</b> " . $address . ".
                ";

                $adminMessage = "
                    A new deposit request of $<b>" . $input['amount'] . " worth of " . $input['asset'] . "</b>
                    has been placed by the investor <b>" . $user->name . "</b> with reference <b>" . $reference . "</b>
                ";
            }

            //SendDepositNotification::dispatch($user,$userMessage,'Pending Deposit');
            $user->notify(new InvestmentMail($user, $userMessage, 'Pending Deposit Request'));

            if (!empty($admin)) {
                //SendDepositNotification::dispatch($admin,$adminMessage,'New Pending Deposit');
                $admin->notify(new InvestmentMail($admin, $adminMessage, 'New Pending Deposit'));
            }

            return redirect()->route('deposit_detail', ['id' => $create->id])
                ->with('success', 'Deposit Initiated. Follow the instruction below to complete it');
        }

        return back()->withInput()->with('error', 'Something went wrong');
    }

    public function depositDetails($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $deposit = Deposit::where('user', $user->id)->findOrFail($id);

        $dataView = [
            'web' => $web,
            'user' => $user,
            'deposit' => $deposit,
            'pageName' => 'Deposit Details',
            'siteName' => $web->name,
        ];

        return view('user.deposit_details', $dataView);
    }

    public function cancel($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $deposit = Deposit::where('user', $user->id)->findOrFail($id);

        if ($deposit->status == 3) {
            return back()->with('error', 'Deposit already cancelled. Please contact support for help');
        }

        $data = [
            'status' => 3,
        ];

        $update = Deposit::where('id', $id)->update($data);

        if ($update) {
            $admin = User::where('is_admin', 1)->first();
            $userMessage = "
                Your deposit with reference: <b>" . $deposit->reference . "</b> has been cancelled.
            ";

            //SendDepositNotification::dispatch($user,$userMessage,'Deposit Cancelled');
            $user->notify(new InvestmentMail($user, $userMessage, 'Deposit Cancelled'));

            if (!empty($admin)) {
                $adminMessage = "
                    The deposit request with reference <b>" . $deposit->reference . "</b> placed by the
                    investor <b>" . $user->name . "</b> has been cancelled.
                ";

                //SendDepositNotification::dispatch($admin,$adminMessage,'New Deposit Cancelled');
                $admin->notify(new InvestmentMail($admin, $adminMessage, 'New Deposit Cancelled'));
            }

            return back()->with('success', 'Deposit cancelled');
        }

        return back()->with('error', 'Something went wrong');
    }

    public function submitProof(Request $request, $id)
    {
        $user = Auth::user();

        $deposit = Deposit::where('user', $user->id)->findOrFail($id);

        $data = $request->validate([
            'tx_hash' => ['nullable', 'string', 'max:255'],
            'proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:5120'],
        ]);

        if ($request->hasFile('proof')) {
            $uploadDir = public_path('uploads');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true);
            }

            $ext = $request->file('proof')->getClientOriginalExtension();
            $filename = 'deposit_' . $deposit->id . '_' . time() . '_' . Str::random(6) . '.' . $ext;
            $request->file('proof')->move($uploadDir, $filename);
            $relativePath = 'uploads/' . $filename;
            $data['proof'] = $relativePath;
        }

        $deposit->transactionHash = $data['tx_hash'] ?? null;
        $deposit->paymentProof = $relativePath ?? null;
        $deposit->status = 4;
        $deposit->save();

        $admin = User::where('is_admin', 1)->first();

        if ($admin) {
            $msgAdmin = "A payment proof was submitted for deposit <b>#{$deposit->reference}</b> by <b>{$user->name}</b>.";
            $admin->notify(new InvestmentMail($admin, $msgAdmin, 'Deposit Proof Submitted'));
        }

        return back()->with('success', 'Payment proof submitted. We’ll verify and update your deposit status soon.');
    }

    public function doSubmitProof(Request $request, $id)
    {
        $user = Auth::user();

        $deposit = Deposit::where('user', $user->id)->findOrFail($id);

        $deposit->status = 4;
        $deposit->save();

        $admin = User::where('is_admin', 1)->first();

        if ($admin) {
            $msgAdmin = "The deposit <b>#{$deposit->reference}</b> by <b>{$user->name}</b> has been marked by the investor as paid.";
            $admin->notify(new InvestmentMail($admin, $msgAdmin, 'Deposit marked as paid'));
        }

        return back()->with('success', 'Deposit marked as paid. We’ll verify and update your deposit status soon.');
    }
}
