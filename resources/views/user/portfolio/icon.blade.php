<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="pd-icon" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
@switch($name ?? '')
@case('menu')<path d="M4 6h16M4 12h16M4 18h10"/>@break
@case('close')<path d="m6 6 12 12M18 6 6 18"/>@break
@case('plus')<path d="M12 5v14M5 12h14"/>@break
@case('arrow')<path d="M5 12h14m-5-5 5 5-5 5"/>@break
@case('back')<path d="M19 12H5m5-5-5 5 5 5"/>@break
@case('external')<path d="M7 17 17 7M7 7h10v10"/>@break
@case('chevron')<path d="m8 10 4 4 4-4"/>@break
@case('search')<circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 4 4"/>@break
@case('theme')<path d="M20.5 14.5A8.5 8.5 0 0 1 9.5 3.5a8.5 8.5 0 1 0 11 11Z"/>@break
@case('eye')<path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/>@break
@case('copy')<rect x="8" y="8" width="12" height="13" rx="2"/><path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"/>@break
@case('check')<path d="m5 12 4 4L19 6"/>@break
@case('bank')<path d="m3 8 9-5 9 5H3Zm2 3v7m5-7v7m4-7v7m5-7v7M3 21h18"/>@break
@case('crypto')<path d="M9 4v16M13 4v2m0 12v2M6 6h8a3 3 0 0 1 0 6H9m0 0h6a3 3 0 0 1 0 6H6"/>@break
@case('gold')<path d="m6 8 3-4h6l3 4 3 12H3L6 8Zm0 0h12M9 4l3 4 3-4"/>@break
@case('support')<path d="M4 14v-3a8 8 0 0 1 16 0v3M4 12H3v6h4v-6H4Zm16 0h1v6h-4v-6h3Zm0 6c0 3-4 3-6 3"/>@break
@case('clock')<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>@break
@case('shield')<path d="m12 3 8 3v5c0 5-5 9-8 10-3-1-8-5-8-10V6l8-3Z"/><path d="m8 12 3 3 5-6"/>@break
@case('download')<path d="M12 3v12m-4-4 4 4 4-4M4 17v4h16v-4"/>@break
@case('info')<circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7h.01"/>@break
@default<path d="M5 18 10 12l4 3 5-9M15 6h4v4"/>
@endswitch
</svg>
