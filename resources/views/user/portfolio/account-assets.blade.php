@push('head')
    @include('user.portfolio.account-styles')
    <noscript><style>.pd-body .pa-settings-panel[hidden]{display:block!important}.pa-settings-tabs{display:none}.pa-settings-panel+.pa-settings-panel{margin-top:22px}</style></noscript>
@endpush
@push('scripts')
    @include('user.portfolio.account-scripts')
@endpush
