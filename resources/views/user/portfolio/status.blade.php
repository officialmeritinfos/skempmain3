@php
    $statusLabels = ($kind ?? '') === 'deposit' ? [1=>'Completed',2=>'Awaiting payment',3=>'Cancelled',4=>'Under review'] : (($kind ?? '') === 'investment' ? [1=>'Completed',2=>'Pending payment',3=>'Cancelled',4=>'Active'] : [1=>'Completed',2=>'Pending',3=>'Cancelled',4=>'Processing']);
    $statusText = $statusLabels[(int)$status] ?? (($kind ?? '') === 'deposit' ? 'Partial' : 'Processing');
    $statusTone = match((int)$status) {1=>'success',3=>'danger',2=>'pending',default=>'neutral'};
@endphp
<span class="pd-status pd-status-{{ $statusTone }}"><i aria-hidden="true"></i>{{ $statusText }}</span>
