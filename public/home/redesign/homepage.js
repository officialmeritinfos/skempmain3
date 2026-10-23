(() => {
    'use strict';
    const root = document.documentElement;
    const themeButton = document.querySelector('[data-theme-toggle]');
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

    const menuButton = document.querySelector('[data-menu-toggle]');
    const menu = document.getElementById('mobile-navigation');
    const setMenu = (open) => {
        if (!menu || !menuButton) return;
        menu.hidden = !open;
        menuButton.setAttribute('aria-expanded', String(open));
        menuButton.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    };
    menuButton?.addEventListener('click', () => setMenu(menuButton.getAttribute('aria-expanded') !== 'true'));
    menu?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && menu && !menu.hidden) {
            setMenu(false);
            menuButton?.focus();
        }
    });
    document.addEventListener('click', event => {
        if (menu && !menu.hidden && !document.getElementById('site-header')?.contains(event.target)) setMenu(false);
    });
    const desktop = window.matchMedia('(min-width: 1051px)');
    desktop.addEventListener('change', event => { if (event.matches) setMenu(false); });

    document.querySelectorAll('.ih-goal-tabs').forEach(tablist => {
        const tabs = [...tablist.querySelectorAll('[role="tab"]')];
        const select = (selected, focus = false) => {
            tabs.forEach(tab => {
                const active = tab === selected;
                tab.setAttribute('aria-selected', String(active));
                tab.tabIndex = active ? 0 : -1;
                const panel = document.getElementById(tab.getAttribute('aria-controls'));
                if (panel) panel.hidden = !active;
            });
            if (focus) selected.focus();
        };
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => select(tab));
            tab.addEventListener('keydown', event => {
                let next = index;
                if (event.key === 'ArrowRight') next = (index + 1) % tabs.length;
                else if (event.key === 'ArrowLeft') next = (index - 1 + tabs.length) % tabs.length;
                else if (event.key === 'Home') next = 0;
                else if (event.key === 'End') next = tabs.length - 1;
                else return;
                event.preventDefault();
                select(tabs[next], true);
            });
        });
    });
})();


// Native disclosure menus retain keyboard support and work without this enhancement.
(() => {
    const groups = [...document.querySelectorAll('[data-nav-group]')];
    groups.forEach(group => group.addEventListener('toggle', () => {
        if (group.open) groups.forEach(other => { if (other !== group) other.open = false; });
    }));
    document.addEventListener('click', event => groups.forEach(group => {
        if (!group.contains(event.target)) group.open = false;
    }));
    document.addEventListener('keydown', event => {
        if (event.key !== 'Escape') return;
        const current = groups.find(group => group.open);
        if (current) { current.open = false; current.querySelector('summary')?.focus(); }
    });
    const faqSearch = document.querySelector('[data-faq-search]');
    const questions = [...document.querySelectorAll('[data-faq-item]')];
    faqSearch?.addEventListener('input', () => {
        const query = faqSearch.value.trim().toLocaleLowerCase();
        let visible = 0;
        questions.forEach(question => {
            const matches = question.textContent.toLocaleLowerCase().includes(query);
            question.hidden = !matches;
            if (matches) visible++;
        });
        const empty = document.querySelector('[data-faq-empty]');
        if (empty) empty.hidden = visible !== 0;
        const count = document.querySelector('[data-faq-count]');
        if (count) count.textContent = `${visible} ${visible === 1 ? 'question' : 'questions'}`;
    });
})();
