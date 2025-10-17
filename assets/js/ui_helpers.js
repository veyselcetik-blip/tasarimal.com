
// assets/js/ui_helpers.js
document.addEventListener('submit', function(e){
    const btn = e.target.querySelector('button[type="submit"], input[type="submit"]');
    if (btn) {
        btn.disabled = true;
        btn.dataset.origText = btn.innerText || btn.value || '';
        if (btn.tagName.toLowerCase() === 'button') btn.innerText = 'Bekleyiniz...';
        else btn.value = 'Bekleyiniz...';
    }
});
