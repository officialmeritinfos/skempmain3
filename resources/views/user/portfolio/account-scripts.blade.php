<script>
(() => {
    const one = (selector, root = document) => root.querySelector(selector);
    const all = (selector, root = document) => [...root.querySelectorAll(selector)];
    const money = value => new Intl.NumberFormat('en-US',{style:'currency',currency:'USD'}).format(Number(value)||0);
    const text = (selector, value, root = document) => all(selector,root).forEach(node=>node.textContent=value);
    all('[data-open-section]').forEach(link=>link.addEventListener('click',()=>{const target=document.getElementById(link.dataset.openSection);if(target)target.open=true;}));
    const managed = one('[data-managed-form]');
    if (managed) {
        function update() {
            const selected = one('[name=subDuration]:checked',managed);const amount = Number(selected?.dataset.amount||0);const balance = Number(managed.dataset.balance);
            text('[data-managed-title]',selected?.dataset.title || 'Choose a duration',managed);
            text('[data-managed-length]',selected?.dataset.duration || '—',managed);
            text('[data-managed-fee]',selected ? money(amount) : '—',managed);
            text('[data-managed-remaining]',selected ? money(balance-amount) : '—',managed);
            one('[name=amount]',managed).value = selected?.dataset.amount || '';
            const warning=one('[data-managed-insufficient]',managed);warning.hidden=!selected || amount<=balance;
            if(!managed.dataset.submitting)one('[data-submit-button]',managed).disabled=!selected || amount>balance;
        }
        managed.addEventListener('change',update);update();
    }
    const card = one('[data-card-form]');
    if(card){const update=()=>{text('[data-card-preview-name]',one('[name=name]',card).value.trim()||'Your name');text('[data-card-preview-network]',one('[name=cardType]:checked',card)?.value||'Your network');};card.addEventListener('input',update);card.addEventListener('change',update);update();}
    const loan=one('[data-loan-form]');
    if(loan){const update=()=>{text('[data-loan-amount]',money(one('[name=amount]',loan).value),loan);text('[data-loan-type]',one('[name=loanType]:checked',loan)?.value||'Select a horizon',loan);};loan.addEventListener('input',update);loan.addEventListener('change',update);update();}
    all('[data-share-link]').forEach(button=>button.addEventListener('click',async()=>{
        const input=document.getElementById(button.dataset.shareLink);
        if(!input?.value)return;
        if(navigator.share){try{await navigator.share({title:document.title,url:input.value});}catch(error){if(error.name!=='AbortError')text('[data-copy-status]','Sharing is unavailable. Use the copy button to share your link.');}}
        else{one('[data-referral-copy]')?.click();}
    }));
    const imageUrls=new Map();
    function uploadCount(){const form=one('[data-kyc-form]');if(!form)return;const required=all('[data-image-file][required]',form);const completed=required.filter(input=>input.files.length>0).length;text('[data-kyc-upload-count]',`${completed} of ${required.length} required images selected`,form);const bar=one('[data-kyc-upload-progress]',form);if(bar)bar.style.width=(required.length?completed/required.length*100:0)+'%';}
    all('[data-image-upload]').forEach(group=>{
        const input=one('[data-image-file]',group),preview=one('[data-image-preview]',group),label=one('[data-image-name]',group);
        function update(){
            if(imageUrls.has(input)){URL.revokeObjectURL(imageUrls.get(input));imageUrls.delete(input);}
            const file=input.files[0];label.textContent=file?file.name:'No image selected';preview.hidden=true;preview.removeAttribute('src');
            input.setCustomValidity(file&&file.type&&!file.type.startsWith('image/')?'Choose an image file.':'');
            if(file&&(!file.type||file.type.startsWith('image/'))){const url=URL.createObjectURL(file);imageUrls.set(input,url);preview.src=url;preview.hidden=false;}
            uploadCount();
        }
        input.addEventListener('change',update);preview.addEventListener('error',()=>{preview.hidden=true;});
    });
    uploadCount();
    window.addEventListener('pagehide',event=>{if(!event.persisted)imageUrls.forEach(url=>URL.revokeObjectURL(url));});
    const passwordForm=one('[data-change-password]');
    if(passwordForm){const password=one('[name=new_password]',passwordForm),confirmation=one('[name=new_password_confirmation]',passwordForm);const validate=()=>confirmation.setCustomValidity(confirmation.value&&confirmation.value!==password.value?'The new passwords do not match.':'');password.addEventListener('input',validate);confirmation.addEventListener('input',validate);}
    const settings=one('[data-settings]');
    if(settings){
        const tabs=all('[role=tab]',settings),panels=all('[role=tabpanel]',settings);
        function activate(id,focus=false){
            if(!panels.some(panel=>panel.id===id))return;
            tabs.forEach(tab=>{const active=tab.getAttribute('aria-controls')===id;tab.setAttribute('aria-selected',String(active));tab.tabIndex=active?0:-1;if(active&&focus)tab.focus();});
            panels.forEach(panel=>panel.hidden=panel.id!==id);
        }
        tabs.forEach((tab,index)=>{tab.addEventListener('click',()=>{const id=tab.getAttribute('aria-controls');activate(id);history.replaceState(null,'','#'+id);});tab.addEventListener('keydown',event=>{let next=null;if(event.key==='ArrowRight'||event.key==='ArrowDown')next=(index+1)%tabs.length;if(event.key==='ArrowLeft'||event.key==='ArrowUp')next=(index+tabs.length-1)%tabs.length;if(event.key==='Home')next=0;if(event.key==='End')next=tabs.length-1;if(next!==null){event.preventDefault();activate(tabs[next].getAttribute('aria-controls'),true);}});});
        const requested=location.hash.slice(1);if(requested&&!settings.dataset.forceTab)activate(requested);
        settings.addEventListener('invalid',event=>{const panel=event.target.closest('[role=tabpanel]');if(panel)activate(panel.id);},true);
    }
})();
</script>
