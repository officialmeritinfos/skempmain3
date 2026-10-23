<style>
@font-face{font-family:'AC Sans';src:url('{{ asset('home/redesign/fonts/dm-sans-regular.woff2') }}') format('woff2');font-weight:400 500;font-style:normal;font-display:swap}
@font-face{font-family:'AC Sans';src:url('{{ asset('home/redesign/fonts/dm-sans-medium.woff2') }}') format('woff2');font-weight:600 800;font-style:normal;font-display:swap}
@font-face{font-family:'AC Display';src:url('{{ asset('home/redesign/fonts/libre-caslon-display.woff2') }}') format('woff2');font-weight:400;font-style:normal;font-display:swap}
.ac-auth{--ac-paper:#fff;--ac-canvas:#f3f5f8;--ac-ink:#151923;--ac-muted:#68717f;--ac-line:#dce1e9;--ac-blue:#2459d3;--ac-soft:#f4f7fc;--ac-input:#fff;margin:0;background:var(--ac-canvas);color:var(--ac-ink);font-family:'AC Sans',Arial,sans-serif;font-size:14px;line-height:1.6;-webkit-font-smoothing:antialiased}
.dark .ac-auth{--ac-paper:#12151b;--ac-canvas:#0b0e13;--ac-ink:#f2f5fb;--ac-muted:#a3adbd;--ac-line:#343b48;--ac-blue:#9bb9ff;--ac-soft:#1b2230;--ac-input:#181d26}
.ac-auth *{box-sizing:border-box}
.ac-auth [hidden]{display:none!important}
.ac-auth h1,.ac-auth h2,.ac-auth h3,.ac-auth p{margin:0}
.ac-auth a{color:inherit;text-decoration:none}
.ac-auth button,.ac-auth input{font:inherit}
.ac-auth a,.ac-auth button{-webkit-tap-highlight-color:transparent}
.ac-auth button{cursor:pointer}
.ac-auth :focus-visible{outline:2px solid var(--ac-blue);outline-offset:4px}
.ac-auth ::selection{background:#dce7ff;color:#151923}
.ac-auth .ac-icon{display:block;width:20px;height:20px;flex:none;fill:none;stroke:currentColor;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round}
.ac-symbols{position:absolute;width:0;height:0;overflow:hidden}
.ac-skip{position:fixed;left:20px;top:-90px;background:var(--ac-paper);color:var(--ac-ink);padding:12px 20px;z-index:1000}
.ac-skip:focus{top:20px}
.ac-shell{display:grid;grid-template-columns:minmax(0,.92fr) minmax(0,1.08fr);min-height:100svh;padding:18px;align-items:start;gap:0}
.ac-story{position:sticky;top:18px;height:calc(100svh - 36px);min-height:630px;background:#151923;color:#fff;border-radius:18px;overflow:hidden;isolation:isolate}
.ac-story-image{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:47% center;filter:grayscale(.75) brightness(.66)}
.ac-story-overlay{position:absolute;inset:0;background:linear-gradient(180deg,#11162045 0%,#11162016 22%,#111620bd 52%,#111620f5 83%,#111620 100%)}
.ac-story-inner{position:relative;display:flex;flex-direction:column;justify-content:space-between;height:100%;min-height:630px;padding:30px 42px 32px}
.ac-story-top{display:flex;align-items:center;gap:21px}
.ac-story-brand{display:block;flex:none;border-radius:5px;background:#fff;padding:5px 13px}
.ac-story-brand>img{display:block;width:110px;height:60px;object-fit:contain}
.ac-story-top>p{font-size:10px;line-height:1.8;color:#e6eaf1;letter-spacing:.03em}
.ac-story-bottom{max-width:470px;padding-top:90px}
.ac-story-kicker{display:flex;align-items:center;gap:12px;font-size:10px;letter-spacing:.13em;text-transform:uppercase;font-weight:600;color:#bdcfff;margin-bottom:25px!important}
.ac-story-kicker>span{width:26px;height:1px;background:currentColor}
.ac-auth .ac-story h2{font-family:'AC Display',Georgia,serif;font-size:clamp(47px,4.5vw,67px);line-height:1.02;letter-spacing:-.02em;font-weight:400}
.ac-story h2 em{color:#b4caff;font-style:normal}
.ac-story-copy{max-width:340px;font-size:13px;line-height:1.9;color:#c5cedc;margin-top:23px!important}
.ac-story-foot{display:flex;align-items:center;justify-content:space-between;gap:20px;border-top:1px solid #ffffff29;padding-top:22px;margin-top:45px;font-size:10px;letter-spacing:.025em;color:#b8c4d6}
.ac-story-mark{font-size:23px;font-weight:400;color:#d9e4ff;line-height:1}
.ac-workspace{display:flex;flex-direction:column;min-width:0;min-height:calc(100svh - 36px);background:var(--ac-paper);border-radius:0 18px 18px 0}
.ac-topbar{position:relative;z-index:50;display:flex;align-items:center;justify-content:space-between;gap:20px;min-height:69px;padding:13px 38px 9px}
.ac-mobile-brand{display:none}
.ac-back-link{display:inline-flex;align-items:center;gap:9px;font-size:11px;color:var(--ac-muted)!important;font-weight:500}
.ac-back-link:hover{color:var(--ac-blue)!important}
.ac-back-link .ac-icon{width:16px;height:16px}
.ac-back-short{display:none}
.ac-utilities{display:flex;align-items:center;gap:15px}
.ac-auth .ac-theme-toggle{display:flex;align-items:center;justify-content:center;width:34px;height:36px;border:1px solid var(--ac-line);border-radius:7px;background:var(--ac-paper);color:var(--ac-ink);transition:background .2s}
.ac-theme-toggle:hover{background:var(--ac-soft)}
.ac-theme-toggle .ac-theme-sun,.dark .ac-theme-toggle .ac-theme-moon{display:none}
.dark .ac-theme-toggle .ac-theme-sun{display:block}
.ac-translate>div>button{padding-inline:3px!important;border:0!important;box-shadow:none!important;background:transparent!important;color:var(--ac-muted)!important;font-size:11px!important;backdrop-filter:none!important}
.ac-translate>div>button svg{width:16px;height:16px}
.ac-main{display:flex;align-items:center;justify-content:center;flex:1;padding:36px 52px 35px;min-width:0;outline:none}
.ac-form-wrap{width:100%;max-width:420px;min-width:0}
.ac-form-wrap-wide{max-width:510px}
.ac-heading{margin-bottom:29px}
.ac-kicker{display:flex;align-items:center;gap:9px;font-size:10px;letter-spacing:.13em;text-transform:uppercase;font-weight:600;color:var(--ac-blue);margin-bottom:13px!important}
.ac-kicker::before{content:'';height:1px;width:22px;background:currentColor}
.ac-auth .ac-heading h1{font-family:'AC Display',Georgia,serif;font-size:47px;line-height:1.06;letter-spacing:-.025em;font-weight:400;color:var(--ac-ink)}
.ac-heading>p:not(.ac-kicker){font-size:13px;line-height:1.85;color:var(--ac-muted);max-width:400px;margin-top:14px}
.ac-heading-icon{display:flex;align-items:center;justify-content:center;width:47px;height:47px;border:1px solid var(--ac-line);border-radius:11px;background:var(--ac-soft);color:var(--ac-blue);margin-bottom:23px}
.ac-heading-icon .ac-icon{width:23px;height:23px}
.ac-form{width:100%}
.ac-fields{display:grid;gap:21px}
.ac-field-grid{display:grid;grid-template-columns:1fr 1fr;gap:19px}
.ac-field{min-width:0}
.ac-label-row{display:flex;align-items:center;justify-content:space-between;gap:15px;margin-bottom:8px;min-height:19px}
.ac-label-row>label,.ac-field>label{font-size:12px;font-weight:600;line-height:1.6;color:var(--ac-ink)}
.ac-label-row>a{font-size:11px;font-weight:500;color:var(--ac-blue);white-space:nowrap}
.ac-label-row>a:hover{text-decoration:underline;text-underline-offset:3px}
.ac-label-row>span{font-size:10px;font-weight:400;color:var(--ac-muted)}
.ac-field>label{display:block;margin-bottom:8px}
.ac-auth .ac-field input{display:block;width:100%;height:51px;padding:13px 15px;border:1px solid var(--ac-line);border-radius:8px;background:var(--ac-input);color:var(--ac-ink);font-family:'AC Sans',Arial,sans-serif;font-size:13px;line-height:1.5;outline:none;box-shadow:none;transition:border-color .18s,box-shadow .18s}
.ac-auth .ac-field input::placeholder{color:#8a93a1;opacity:1}
.dark .ac-auth .ac-field input::placeholder{color:#7f8a9c}
.ac-auth .ac-field input:hover{border-color:#a3adbe}
.ac-auth .ac-field input:focus{border-color:var(--ac-blue);box-shadow:0 0 0 3px #2459d314}
.dark .ac-auth .ac-field input:focus{box-shadow:0 0 0 3px #9bb9ff18}
.ac-auth .ac-field input[aria-invalid=true]{border-color:#c84a52}
.ac-auth .ac-field input[aria-invalid=true]:focus{box-shadow:0 0 0 3px #c84a5218}
.ac-auth input:-webkit-autofill{-webkit-text-fill-color:var(--ac-ink);-webkit-box-shadow:0 0 0 1000px var(--ac-input) inset;caret-color:var(--ac-ink)}
.ac-password-input{position:relative}
.ac-auth .ac-password-input input{padding-right:49px}
.ac-password-toggle{position:absolute;right:4px;top:4px;display:flex;align-items:center;justify-content:center;width:43px;height:43px;color:var(--ac-muted);border:0;border-radius:5px;background:transparent}
.ac-password-toggle:hover{color:var(--ac-blue);background:var(--ac-soft)}
.ac-password-toggle .ac-icon{width:19px;height:19px}
.ac-password-toggle .ac-password-eye-off,.ac-password-toggle[aria-pressed=true] .ac-password-eye{display:none}
.ac-password-toggle[aria-pressed=true] .ac-password-eye-off{display:block}
.ac-field-error{font-size:11px;line-height:1.75;color:#b82e3a;margin-top:7px!important;overflow-wrap:anywhere}
.dark .ac-field-error{color:#ffadb5}
.ac-caps-warning{font-size:10px;line-height:1.6;color:#97651f;margin-top:7px!important}
.dark .ac-caps-warning{color:#efc481}
.ac-account-note{position:relative}
.ac-auth .ac-account-note input[readonly]{padding-right:45px;background:var(--ac-soft);color:var(--ac-muted)}
.ac-account-note>.ac-icon{position:absolute;right:15px;top:16px;width:18px;height:18px;pointer-events:none;color:var(--ac-muted)}
.ac-referral{border-bottom:1px solid var(--ac-line);padding-bottom:18px}
.ac-referral>summary{display:flex;align-items:center;justify-content:space-between;gap:15px;list-style:none;cursor:pointer;font-size:12px;color:var(--ac-ink)}
.ac-referral>summary::-webkit-details-marker{display:none}
.ac-referral>summary>span:last-child{color:var(--ac-blue);font-size:19px;line-height:1;transition:transform .2s}
.ac-referral[open]>summary>span:last-child{transform:rotate(45deg)}
.ac-referral .ac-field{margin-top:17px}
.ac-form-register .ac-fields{gap:19px}
.ac-captcha-block>.ac-label-row{margin-bottom:12px}
.ac-label-row>.ac-captcha-label{font-size:12px;font-weight:600;color:var(--ac-ink)}
.ac-captcha-viewport{width:100%;max-width:100%;min-height:78px;overflow:hidden}
.ac-captcha-viewport>.g-recaptcha{transform-origin:top left}
.ac-captcha-block>.ac-field-error{margin-top:9px!important}
.ac-auth .ac-submit{display:flex;align-items:center;justify-content:center;position:relative;gap:12px;width:100%;min-height:51px;padding:14px 47px;border:1px solid transparent;border-radius:8px;background:#2459d3;color:#fff;font-size:13px;line-height:1.5;font-weight:600;margin-top:27px;transition:background .2s,box-shadow .2s}
.ac-submit:hover{background:#1d49b2;box-shadow:0 4px 14px #2459d31c}
.ac-submit>.ac-submit-arrow{position:absolute;right:17px;top:15px;width:20px;height:20px}
.ac-submit:disabled{cursor:wait;opacity:.72}
.ac-submit .ac-loading-spinner{display:none;width:17px;height:17px;fill:none;stroke:currentColor;stroke-width:1.7;animation:ac-spin 1s linear infinite}
.ac-form[aria-busy=true] .ac-loading-spinner{display:block}
.ac-form[aria-busy=true] .ac-submit-arrow{display:none}
@keyframes ac-spin{to{transform:rotate(360deg)}}
.ac-form-switch{display:flex;align-items:baseline;justify-content:center;flex-wrap:wrap;gap:5px 7px;font-size:12px;color:var(--ac-muted);line-height:1.9;margin-top:25px!important}
.ac-form-switch>a{color:var(--ac-blue);font-weight:600}
.ac-form-switch>a:hover{text-decoration:underline;text-underline-offset:4px}
.ac-support-line{display:flex;align-items:center;justify-content:center;gap:8px;border-top:1px solid var(--ac-line);padding-top:22px;margin-top:27px;font-size:10px;color:var(--ac-muted)}
.ac-support-line>.ac-icon{width:13px;height:13px}
.ac-support-line>a:hover{color:var(--ac-blue)}
.ac-registration-note{font-size:10px;line-height:1.9;color:var(--ac-muted);text-align:center;margin-top:15px!important;max-width:390px;margin-inline:auto!important}
.ac-registration-note>a{color:var(--ac-ink);text-decoration:underline;text-underline-offset:3px}
.ac-recovery-back{display:flex;align-items:center;justify-content:center;gap:9px;margin-top:24px;font-size:12px;color:var(--ac-muted)!important}
.ac-recovery-back:hover{color:var(--ac-blue)!important}
.ac-recovery-back>.ac-icon{width:16px;height:16px}
.ac-recovery-help{font-size:11px;line-height:1.9;color:var(--ac-muted);padding-top:23px;border-top:1px solid var(--ac-line);margin-top:27px!important}
.ac-recovery-help>a{color:var(--ac-blue);text-underline-offset:3px}
.ac-recovery-help>a:hover{text-decoration:underline}
.ac-notice{display:flex;align-items:flex-start;gap:11px;padding:15px 16px;border:1px solid #c8d9fc;border-radius:8px;background:#f0f5ff;color:#294e95;margin-bottom:23px;font-size:12px;line-height:1.8;overflow-wrap:anywhere}
.ac-notice>.ac-icon{width:18px;height:18px;margin-top:2px}
.ac-notice strong{font-weight:600;display:block;margin-bottom:3px}
.ac-notice ul{padding:0;margin:0;list-style:none}
.ac-notice li+li{margin-top:4px}
.ac-notice-error{background:#fff4f4;color:#9e303d;border-color:#edc8ce}
.ac-notice-success{background:#edf6f1;color:#286345;border-color:#c5dfd0}
.ac-notice-warning{background:#fff8ea;color:#865a1c;border-color:#ead7b0}
.dark .ac-notice{background:#1b2b45;color:#bfceec;border-color:#354e73}
.dark .ac-notice-error{background:#301f28;color:#ffbdc5;border-color:#68404b}
.dark .ac-notice-success{background:#192e27;color:#b4d8c5;border-color:#365c4b}
.dark .ac-notice-warning{background:#322b1f;color:#e9c995;border-color:#695737}
.ac-footer{display:flex;align-items:center;justify-content:space-between;gap:20px;min-height:62px;padding:17px 38px 18px;font-size:10px;line-height:1.7;color:var(--ac-muted)}
.ac-footer>p{overflow-wrap:anywhere}
.ac-footer>nav{display:flex;align-items:center;flex:none;gap:21px}
.ac-footer a:hover{color:var(--ac-blue)}
@media(min-width:1600px){.ac-shell{max-width:1900px;margin-inline:auto}.ac-story-inner{padding:38px 55px}.ac-auth .ac-story h2{font-size:76px}.ac-form-wrap{max-width:450px}.ac-form-wrap-wide{max-width:550px}.ac-auth .ac-heading h1{font-size:51px}.ac-main{padding-block:45px}.ac-story-copy{font-size:14px;max-width:380px}}
@media(max-width:1250px){.ac-shell{grid-template-columns:minmax(0,.86fr) minmax(0,1.14fr);padding:14px}.ac-story{top:14px;height:calc(100svh - 28px)}.ac-story-inner{padding:27px 30px 29px}.ac-story-top{gap:15px}.ac-story-brand{padding:4px 11px}.ac-story-brand>img{width:95px;height:54px}.ac-story-top>p{font-size:9px}.ac-story h2{font-size:55px!important}.ac-main{padding:32px 35px}.ac-topbar{padding-inline:26px}.ac-footer{padding-inline:26px;font-size:9px}.ac-workspace{min-height:calc(100svh - 28px)}.ac-utilities{gap:11px}.ac-field-grid{gap:15px}.ac-story-copy{font-size:12px}.ac-story-foot{font-size:9px}.ac-translate>div>button>span>span,.ac-translate>div>button>svg{display:none!important}}
@media(max-width:980px){.ac-shell{display:block;padding:0}.ac-story{display:none}.ac-workspace{border-radius:0;min-height:100svh}.ac-topbar{position:sticky;top:0;min-height:83px;gap:22px;padding:14px 34px;background:var(--ac-paper);border-bottom:1px solid var(--ac-line)}.ac-mobile-brand{display:block;flex:none}.ac-mobile-brand>img{display:block;width:105px;height:54px;object-fit:contain}.dark .ac-mobile-brand{background:#fff;border-radius:5px;padding:3px 9px}.dark .ac-mobile-brand>img{width:87px;height:48px}.ac-back-link{margin-left:auto}.ac-main{padding:46px 34px;align-items:center}.ac-form-wrap{max-width:440px}.ac-form-wrap-wide{max-width:540px}.ac-footer{padding:22px 34px;max-width:760px;margin-inline:auto;width:100%;min-height:65px}.ac-utilities{gap:13px}.ac-auth .ac-heading h1{font-size:46px}.ac-auth-register .ac-main{padding-top:39px;padding-bottom:33px}}
@media(max-width:600px){.ac-topbar{min-height:76px;padding:12px 22px;gap:16px}.ac-mobile-brand>img{width:94px;height:50px}.dark .ac-mobile-brand>img{width:83px;height:45px}.ac-back-full{display:none}.ac-back-short{display:inline}.ac-back-link{font-size:10px;gap:5px}.ac-utilities{gap:11px}.ac-main{padding:37px 26px 34px;align-items:flex-start}.ac-form-wrap{max-width:430px}.ac-auth .ac-heading h1{font-size:43px}.ac-heading>p:not(.ac-kicker){font-size:13px;line-height:1.9;margin-top:13px}.ac-heading{margin-bottom:27px}.ac-kicker{font-size:9px;margin-bottom:13px!important}.ac-field-grid{grid-template-columns:1fr;gap:19px}.ac-auth-register .ac-main{padding-top:31px}.ac-heading-icon{width:44px;height:44px;border-radius:10px;margin-bottom:21px}.ac-auth .ac-field input{height:52px;font-size:16px}.ac-label-row>label,.ac-field>label{font-size:12px}.ac-fields{gap:22px}.ac-form-register .ac-fields{gap:19px}.ac-form-switch{font-size:12px;margin-top:24px!important}.ac-notice{font-size:11px;padding:14px}.ac-footer{padding:20px 26px;font-size:9px;gap:17px;border-top:1px solid var(--ac-line);max-width:none}.ac-footer>nav{gap:16px}.ac-translate>div>div[x-show]{position:fixed!important;top:74px;right:18px!important;left:auto!important;width:min(288px,calc(100vw - 36px))!important}.ac-registration-note{font-size:10px}.ac-referral{padding-bottom:17px}.ac-auth .ac-submit{min-height:52px;font-size:13px}.ac-support-line{font-size:10px}.ac-recovery-help{font-size:11px}}
@media(max-width:390px){.ac-topbar{padding-inline:18px;gap:12px}.ac-mobile-brand>img{width:87px;height:48px}.dark .ac-mobile-brand{padding:3px 7px}.dark .ac-mobile-brand>img{width:78px;height:43px}.ac-utilities{gap:7px}.ac-back-link{gap:3px}.ac-main{padding:31px 20px 30px}.ac-auth-register .ac-main{padding-top:28px}.ac-auth .ac-heading h1{font-size:39px}.ac-heading>p:not(.ac-kicker){font-size:12px}.ac-footer{padding-inline:20px;gap:14px;font-size:8px}.ac-footer>nav{gap:13px}.ac-notice{padding:13px 14px}.ac-label-row>a{font-size:10px}.ac-form-switch{font-size:11px}.ac-heading-icon{margin-bottom:19px}.ac-captcha-block>.ac-label-row>span{font-size:9px}}
@media(max-width:360px){.ac-captcha-viewport>.g-recaptcha:not([data-size="compact"]){transform:scale(.9)}.ac-topbar{gap:9px}.ac-back-link{font-size:9px}.ac-utilities{gap:5px}.ac-topbar .ac-theme-toggle{width:31px}.ac-footer{flex-direction:column;justify-content:center;gap:9px}.ac-auth .ac-heading h1{font-size:37px}}
@media(prefers-reduced-motion:reduce){.ac-auth *,.ac-auth *::after,.ac-auth *::before{transition:none!important;animation:none!important}}
</style>
