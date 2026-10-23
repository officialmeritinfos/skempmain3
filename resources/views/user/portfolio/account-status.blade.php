@php
    $accountStatusLabels = match($kind) {
        'managed'=>[1=>'Completed',2=>'Pending',3=>'Cancelled',4=>'Ongoing'],
        'card'=>[1=>'Active',2=>'Pending',3=>'Cancelled'],
        'loan'=>[1=>'Active',2=>'Pending review',3=>'Cancelled'],
        'referral'=>[1=>'Active',2=>'Inactive'],
        'kyc'=>[1=>'Verified',2=>'Not submitted',3=>'Action required',4=>'Under review'],
        default=>[],
    };
    $accountStatusText = $accountStatusLabels[(int)$status] ?? ($kind === 'managed' ? 'Cancelled' : ($kind === 'referral' ? 'Inactive' : 'Unknown'));
    $accountStatusTone = (int)$status === 1 ? 'success' : ((int)$status === 3 ? 'danger' : ((int)$status === 2 ? 'pending' : 'neutral'));
@endphp
<span class="pd-status pd-status-{{ $accountStatusTone }}"><i aria-hidden="true"></i>{{ $accountStatusText }}</span>
