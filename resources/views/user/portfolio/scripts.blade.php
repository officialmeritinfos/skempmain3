<script>
(() => {
    'use strict';
    const one = (s, root = document) => root.querySelector(s);
    const all = (s, root = document) => [...root.querySelectorAll(s)];
    const currency = value => new Intl.NumberFormat('en-US', {style:'currency', currency:'USD', maximumFractionDigits:2}).format(Number(value) || 0);
    const setText = (selector, text, root = document) => all(selector, root).forEach(node => node.textContent = text);
    const menu = one('#portfolio-menu');
    all('[data-open-menu]').forEach(button => button.addEventListener('click', () => menu.showModal()));
    one('[data-close-menu]')?.addEventListener('click', () => menu.close());
    menu?.addEventListener('click', event => { if (event.target === menu && event.clientX > menu.getBoundingClientRect().right) menu.close(); });
    const themeButton = one('[data-portfolio-theme-toggle]');
    function updateThemeLabel() { themeButton?.setAttribute('aria-label', document.documentElement.dataset.portfolioTheme === 'dark' ? 'Switch to light theme' : 'Switch to dark theme'); }
    updateThemeLabel();
    themeButton?.addEventListener('click', () => {
        const theme = document.documentElement.dataset.portfolioTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.dataset.portfolioTheme = theme;
        document.documentElement.classList.toggle('dark', theme === 'dark');
        document.documentElement.style.colorScheme = theme;
        try { localStorage.setItem('portfolio-theme', theme); } catch (error) {}
        updateThemeLabel();
    });
    document.addEventListener('click', event => {
        all('.pd-profile[open]').forEach(profile => { if (!profile.contains(event.target)) profile.open = false; });
    });
    document.addEventListener('keydown', event => { if (event.key === 'Escape') all('.pd-profile').forEach(profile => profile.open = false); });
    all('[data-copy]').forEach(button => button.addEventListener('click', async () => {
        const target = document.getElementById(button.dataset.copy);
        const value = target?.value ?? target?.textContent?.trim();
        const original = button.getAttribute('aria-label') || button.textContent.trim();
        if (!value) return;
        try {
            if (navigator.clipboard && window.isSecureContext) await navigator.clipboard.writeText(value);
            else {
                const input = document.createElement('textarea'); input.value = value; input.style.position = 'fixed'; input.style.opacity = '0'; document.body.append(input); input.select();
                const success = document.execCommand('copy'); input.remove(); if (!success) throw new Error('Copy unavailable');
            }
            setText('[data-copy-status]', 'Copied to clipboard.');
            button.setAttribute('aria-label', 'Copied');
            const label = one('[data-copy-label]', button); if (label) label.textContent = 'Copied';
            setTimeout(() => { button.setAttribute('aria-label', original); if (label) label.textContent = 'Copy address'; }, 2200);
        } catch (error) { setText('[data-copy-status]', 'Could not copy. Select the text and copy it manually.'); }
    }));
    let hiddenBalances = false;
    one('[data-hide-balances]')?.addEventListener('click', event => {
        hiddenBalances = !hiddenBalances;
        all('[data-sensitive]').forEach(node => { if (!node.dataset.value) node.dataset.value = node.textContent; node.textContent = hiddenBalances ? '••••••' : node.dataset.value; });
        const button = event.currentTarget; button.setAttribute('aria-pressed', String(hiddenBalances)); button.setAttribute('aria-label', hiddenBalances ? 'Show balances' : 'Hide balances');
        all('[data-financial-chart]').forEach(node => node.hidden = hiddenBalances);
        all('[data-chart-hidden]').forEach(node => node.hidden = !hiddenBalances);
        all('.pd-chart-details').forEach(node => { node.hidden = hiddenBalances; if (hiddenBalances) node.open = false; });
    });
    all('[data-password-toggle]').forEach(button => button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.passwordToggle); const visible = input.type === 'password';
        input.type = visible ? 'text' : 'password'; button.textContent = visible ? 'Hide' : 'Show'; button.setAttribute('aria-label', visible ? 'Hide password' : 'Show password'); button.setAttribute('aria-pressed', String(visible));
    }));
    all('form[data-portfolio-form]').forEach(form => {
        const buttons = all('[data-submit-button]', form);
        buttons.forEach(button => { button.dataset.initialDisabled = String(button.disabled); button.dataset.original = one('[data-submit-label]', button)?.textContent || ''; });
        form.addEventListener('submit', event => {
            if (form.dataset.submitting === 'true') { event.preventDefault(); return; }
            form.dataset.submitting = 'true'; form.setAttribute('aria-busy','true');
            buttons.forEach(button => { button.disabled = true; setText('[data-submit-label]', form.dataset.loading || 'Submitting…', button); });
        });
        window.addEventListener('pageshow', () => {
            delete form.dataset.submitting; form.removeAttribute('aria-busy');
            buttons.forEach(button => { button.disabled = button.dataset.initialDisabled === 'true'; setText('[data-submit-label]', button.dataset.original, button); });
            form.dispatchEvent(new Event('change'));
        });
    });
    all('[data-confirm-action]').forEach(link => link.addEventListener('click', event => { if (!window.confirm(link.dataset.confirmAction)) event.preventDefault(); }));
    all('[data-proof-input]').forEach(input => input.addEventListener('change', () => {
        input.setCustomValidity(input.files[0]?.size > 5 * 1024 * 1024 ? 'Choose a file smaller than 5 MB.' : '');
    }));
    all('[data-activity]').forEach(section => {
        const rows = all('[data-activity-row]', section), search = one('[data-activity-search]', section), filter = one('[data-activity-filter]', section);
        function apply() {
            const term = (search?.value || '').trim().toLocaleLowerCase(); const status = filter?.value || ''; let count = 0;
            rows.forEach(row => { const match = (!term || row.textContent.toLocaleLowerCase().includes(term)) && (!status || row.dataset.status === status); row.hidden = !match; if (match) count++; });
            const empty = one('[data-no-results]', section); if (empty) empty.hidden = count > 0;
            setText('[data-filter-result]', `${count} matching ${count === 1 ? 'record' : 'records'} on this ${section.dataset.activity === 'all' ? 'list' : 'page'}.`, section);
        }
        search?.addEventListener('input', apply); filter?.addEventListener('change', apply); apply();
    });
    const depositForm = one('[data-deposit-form]');
    if (depositForm) {
        const amount = one('[name=amount]', depositForm), assetGroup = one('[data-deposit-assets]', depositForm);
        function depositChange() {
            const type = one('[name=deposit_type]:checked', depositForm)?.value || 'crypto';
            const bank = type === 'bank'; const minimum = bank ? depositForm.dataset.bankMin : depositForm.dataset.cryptoMin;
            assetGroup.hidden = bank; assetGroup.disabled = bank;
            amount.min = minimum; setText('[data-deposit-minimum]', currency(minimum), depositForm);
            all('[data-bank-info]', depositForm).forEach(node => node.hidden = !bank);
            all('[data-crypto-info]', depositForm).forEach(node => node.hidden = bank);
            setText('[data-review-method]', bank ? 'Bank transfer' : 'Cryptocurrency', depositForm);
            setText('[data-review-asset]', bank ? 'USD' : (one('[name=asset]:checked', depositForm)?.value || 'Select an asset'), depositForm);
            setText('[data-review-amount]', currency(amount.value), depositForm);
            const submit = one('[data-submit-button]', depositForm); if (!depositForm.dataset.submitting) submit.disabled = !bank && !one('[name=asset]', assetGroup);
        }
        depositForm.addEventListener('change', depositChange); amount.addEventListener('input', depositChange); depositChange();
    }
    const withdrawalForm = one('[data-withdrawal-form]');
    if (withdrawalForm) {
        function updateWithdrawal() {
            const selected = one('[name=account]:checked', withdrawalForm); const amount = one('[name=amount]', withdrawalForm);
            setText('[data-review-source]', selected?.dataset.label || 'Select a balance', withdrawalForm);
            setText('[data-review-balance]', selected ? currency(selected.dataset.balance) : '—', withdrawalForm);
            setText('[data-review-asset]', one('[name=asset]:checked', withdrawalForm)?.value || 'Select an asset', withdrawalForm);
            setText('[data-review-amount]', currency(amount.value), withdrawalForm);
            if (selected) amount.max = selected.dataset.balance; else amount.removeAttribute('max');
        }
        withdrawalForm.addEventListener('change', updateWithdrawal); one('[name=amount]', withdrawalForm).addEventListener('input', updateWithdrawal); updateWithdrawal();
    }
    const transferForm = one('[data-transfer-form]');
    if (transferForm) {
        function updateTransfer() { setText('[data-review-recipient]', one('[name=username]', transferForm).value || 'Recipient username', transferForm); setText('[data-review-amount]', currency(one('[name=amount]', transferForm).value), transferForm); }
        transferForm.addEventListener('input', updateTransfer); updateTransfer();
    }
    const investmentForm = one('[data-investment-form]');
    if (investmentForm) {
        const amount = one('[name=amount]', investmentForm); let previousType = one('[name=investment_type]:checked', investmentForm)?.value;
        function updateInvestment() {
            const type = one('[name=investment_type]:checked', investmentForm)?.value;
            if (type !== previousType) { all('[name=package]', investmentForm).forEach(input => input.checked = false); previousType = type; }
            all('[data-plan-group]', investmentForm).forEach(group => { group.hidden = group.dataset.planGroup !== type; group.disabled = group.hidden; });
            const selected = one('[name=package]:checked:not(:disabled)', investmentForm);
            const profit = one('[name=account][value="2"]', investmentForm);
            const cannotReinvest = selected?.dataset.reinvest !== '1';
            if (profit) { profit.disabled = !!selected && cannotReinvest; if (profit.disabled) profit.checked = false; }
            const notice = one('[data-reinvestment-note]', investmentForm); if (notice) notice.hidden = !selected || !cannotReinvest;
            setText('[data-review-type]', type === 'gold' ? 'Gold' : 'Crypto', investmentForm);
            setText('[data-review-plan]', selected?.dataset.name || 'Choose a plan', investmentForm);
            setText('[data-review-duration]', selected?.dataset.duration || '—', investmentForm);
            setText('[data-review-rate]', selected ? selected.dataset.rate + '% per return' : '—', investmentForm);
            setText('[data-review-amount]', currency(amount.value), investmentForm);
            const source = one('[name=account]:checked:not(:disabled)', investmentForm);
            setText('[data-review-source]', source?.dataset.label || 'Select a balance', investmentForm);
            setText('[data-plan-limits]', selected ? `Plan range: ${currency(selected.dataset.min)}${selected.dataset.max ? ' – ' + currency(selected.dataset.max) : ' and above'}.` : 'Choose a plan to see its funding limits.', investmentForm);
            if (selected) { amount.min = selected.dataset.min; if (selected.dataset.max) amount.max = selected.dataset.max; else amount.removeAttribute('max'); } else { amount.min = '0.01'; amount.removeAttribute('max'); }
            if (source) { const max = Math.min(Number(source.dataset.balance), selected?.dataset.max ? Number(selected.dataset.max) : Infinity); amount.max = String(max); }
            const button = one('[data-submit-button]', investmentForm); if (!investmentForm.dataset.submitting) button.disabled = !selected;
        }
        investmentForm.addEventListener('change', updateInvestment); amount.addEventListener('input', updateInvestment); updateInvestment();
    }
    const chartRoot = one('[data-chart-root]');
    if (chartRoot) {
        const cache = new Map(); let requestNumber = 0;
        const svgNS = 'http://www.w3.org/2000/svg';
        const element = (name, attributes, text) => { const node = document.createElementNS(svgNS, name); Object.entries(attributes).forEach(([key,value]) => node.setAttribute(key,value)); if(text !== undefined)node.textContent = text; return node; };
        async function showChart(button) {
            const request = ++requestNumber;
            all('[data-chart-url]', chartRoot).forEach(item => item.setAttribute('aria-pressed', String(item === button)));
            const canvas = one('[data-chart-canvas]', chartRoot); canvas.replaceChildren();
            const message = document.createElement('div'); message.className = 'pd-chart-message'; message.textContent = 'Loading account activity…'; canvas.append(message); chartRoot.setAttribute('aria-busy','true');
            setText('[data-chart-series]', button.textContent.trim(), chartRoot);
            setText('[data-chart-total]', '—', chartRoot); one('[data-chart-table]', chartRoot).replaceChildren();
            try {
                let raw = cache.get(button.dataset.chartUrl);
                if (!raw) {
                    const controller = new AbortController(); const timeout = setTimeout(() => controller.abort(), 12000);
                    try { const response = await fetch(button.dataset.chartUrl, {headers:{Accept:'application/json'},credentials:'same-origin',signal:controller.signal}); if (!response.ok) throw new Error('Unavailable'); raw = await response.json(); }
                    finally { clearTimeout(timeout); }
                    if (!Array.isArray(raw)) throw new Error('Invalid activity'); cache.set(button.dataset.chartUrl,raw);
                }
                if (request !== requestNumber) return;
                const daily = new Map();
                raw.forEach(row => { if(!Array.isArray(row)||row.length<2)return;const date = new Date(Number(row[0])), amount = Number(row[1]); if(!Number.isFinite(date.getTime()) || !Number.isFinite(amount))return;const key=date.toISOString().slice(0,10);daily.set(key,(daily.get(key)||0)+amount); });
                const values = [...daily].sort((a,b)=>a[0].localeCompare(b[0])); const total = values.reduce((sum,item)=>sum+item[1],0);
                const totalNode = one('[data-chart-total]', chartRoot); totalNode.dataset.value = currency(total); totalNode.textContent = hiddenBalances ? '••••••' : currency(total);
                setText('[data-chart-period]', values.length ? `${new Date(values[0][0]+'T00:00:00').toLocaleDateString(undefined,{month:'short',day:'numeric',year:'numeric'})} – ${new Date(values.at(-1)[0]+'T00:00:00').toLocaleDateString(undefined,{month:'short',day:'numeric',year:'numeric'})}` : 'All available records', chartRoot);
                if (!values.length) { message.textContent = 'No '+button.textContent.trim().toLowerCase()+' recorded yet.'; return; }
                canvas.replaceChildren();
                const svg = element('svg',{viewBox:'0 0 620 230',role:'img','aria-label':`${button.textContent.trim()} by day. Data available in the table below.`});
                const max = Math.max(...values.map(item=>item[1]),1), min = Math.min(...values.map(item=>item[1]),0); const range = max-min || 1;
                const left=58,right=600,top=12,bottom=193; const minTime=Date.parse(values[0][0]),maxTime=Date.parse(values.at(-1)[0]);
                const x = day => maxTime===minTime ? (left+right)/2 : left+(Date.parse(day)-minTime)/(maxTime-minTime)*(right-left);
                const y = value => bottom-(value-min)/range*(bottom-top);
                for(let i=0;i<4;i++){const value = min+range*i/3, yy=y(value);svg.append(element('line',{x1:left,y1:yy,x2:right,y2:yy}));svg.append(element('text',{x:left-10,y:yy+3,'text-anchor':'end'},new Intl.NumberFormat('en',{notation:'compact',maximumFractionDigits:1}).format(value)));}
                const points=values.map(([day,amount])=>[x(day),y(amount)]);
                if(points.length>1){const area=`M${points[0][0]},${bottom} L${points.map(p=>p.join(',')).join(' L')} L${points.at(-1)[0]},${bottom} Z`;svg.append(element('path',{d:area,fill:'var(--pd-accent)',opacity:'.07'}));svg.append(element('polyline',{points:points.map(p=>p.join(',')).join(' '),fill:'none',stroke:'var(--pd-accent)','stroke-width':2,'stroke-linejoin':'round'}));}
                values.forEach(([day,amount],index)=>{const point=element('circle',{cx:points[index][0],cy:points[index][1],r:values.length<30?3:1.8,class:'pd-chart-point'});point.append(element('title',{},day+': '+currency(amount)));svg.append(point);
                    const row=document.createElement('tr'), dateCell=document.createElement('td'),amountCell=document.createElement('td');dateCell.textContent=day;amountCell.textContent=currency(amount);row.append(dateCell,amountCell);one('[data-chart-table]',chartRoot).append(row);
                });
                const labels=[values[0][0],...(values.length>2?[values[Math.floor((values.length-1)/2)][0]]:[]),...(values.length>1?[values.at(-1)[0]]:[])];
                labels.forEach((day,index)=>svg.append(element('text',{x:x(day),y:222,'text-anchor':labels.length===1?'middle':index===0?'start':index===labels.length-1?'end':'middle'},new Date(day+'T00:00:00').toLocaleDateString(undefined,{month:'short',day:'numeric'}))));
                canvas.append(svg);
            } catch(error) { if(request!==requestNumber)return;message.textContent='Activity could not be loaded. Select a category to try again.'; }
            finally { if(request===requestNumber)chartRoot.removeAttribute('aria-busy'); }
        }
        all('[data-chart-url]',chartRoot).forEach(button=>button.addEventListener('click',()=>showChart(button)));
        const first=one('[data-chart-url]',chartRoot); if(first)showChart(first);
    }
})();
</script>
