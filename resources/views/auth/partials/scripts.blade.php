<script>
(() => {
    const root = document.documentElement;
    const themeButton = document.querySelector('[data-auth-theme]');
    const updateThemeLabel = () => {
        const label = root.classList.contains('dark') ? 'Switch to light theme' : 'Switch to dark theme';
        themeButton?.setAttribute('aria-label', label);
        themeButton?.setAttribute('title', label);
    };
    themeButton?.addEventListener('click', () => {
        const dark = root.classList.toggle('dark');
        const theme = dark ? 'dark' : 'light';
        root.dataset.theme = theme;
        root.style.colorScheme = theme;
        try { localStorage.setItem('site-theme', theme); } catch (_) {}
        updateThemeLabel();
    });
    updateThemeLabel();

    document.querySelectorAll('[data-password-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const input = document.getElementById(button.dataset.passwordToggle);
            if (!input) return;
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            button.setAttribute('aria-pressed', String(show));
            const name = document.querySelector(`label[for="${input.id}"]`)?.textContent.trim().toLowerCase() || 'password';
            button.setAttribute('aria-label', `${show ? 'Hide' : 'Show'} ${name}`);
        });
    });
    document.querySelectorAll('[data-auth-password]').forEach(input => {
        const warning = input.closest('.ac-field')?.querySelector('[data-caps-warning]');
        const update = event => { if (warning) warning.hidden = !event.getModifierState?.('CapsLock'); };
        input.addEventListener('keydown', update);
        input.addEventListener('keyup', update);
        input.addEventListener('blur', () => { if (warning) warning.hidden = true; });
    });

    document.querySelectorAll('[data-auth-form]').forEach(form => {
        form.addEventListener('submit', () => {
            const button = form.querySelector('[data-auth-submit]');
            const label = button?.querySelector('[data-submit-label]');
            if (button) button.disabled = true;
            if (label) label.textContent = button.dataset.loadingLabel;
            form.setAttribute('aria-busy', 'true');
        });
    });
    window.addEventListener('pageshow', () => {
        document.querySelectorAll('[data-auth-form]').forEach(form => {
            const button = form.querySelector('[data-auth-submit]');
            const label = button?.querySelector('[data-submit-label]');
            if (button) button.disabled = false;
            if (label) label.textContent = button.dataset.defaultLabel;
            form.removeAttribute('aria-busy');
        });
    });

    // Set presentation before Google's existing checkbox widget loads.
    const captcha = document.getElementById('register-captcha');
    if (captcha) {
        captcha.dataset.theme = root.classList.contains('dark') ? 'dark' : 'light';
        if (captcha.parentElement.clientWidth < 304) captcha.dataset.size = 'compact';
    }
})();
</script>
