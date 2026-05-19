function updateUserStatusPanel(level, status) {
    const icon    = document.getElementById('userStatusIcon');
    const label   = document.getElementById('userStatusLabel');
    const desc    = document.getElementById('userStatusDesc');
    const bar     = document.getElementById('userLevelBar');
    const levelEl = document.getElementById('userLevelValue');

    if (!icon || !label) return;

    levelEl.innerHTML = `${Math.round(level)}<span class="text-sm font-semibold">%</span>`;
    if(bar) bar.style.width = `${Math.round(level)}%`;

    const card = document.getElementById('floodStatusCard');

    if (status === 'AWAS' || level > 70) {
        icon.style.background    = 'linear-gradient(135deg,#ef4444,#b91c1c)';
        icon.innerHTML           = '<i data-lucide="alert-triangle" class="w-10 h-10"></i>';
        label.textContent        = 'AWAS';
        label.className          = 'text-3xl font-black text-red-600 animate-pulse';
        desc.textContent         = 'Bahaya! Segera evakuasi ke tempat aman.';
        if(bar) bar.style.background     = 'linear-gradient(90deg,#ef4444,#b91c1c)';
        if(card) card.className  = 'bg-red-500/10 backdrop-blur-md rounded-3xl p-6 shadow-[0_0_30px_rgba(239,68,68,0.3)] border border-red-500/30 flex flex-col relative overflow-hidden group transition-all duration-500';
    } else if (status === 'SIAGA' || level > 35) {
        icon.style.background    = 'linear-gradient(135deg,#f59e0b,#d97706)';
        icon.innerHTML           = '<i data-lucide="alert-circle" class="w-10 h-10"></i>';
        label.textContent        = 'SIAGA';
        label.className          = 'text-3xl font-black text-amber-600';
        desc.textContent         = 'Waspada! Pantau kondisi dan bersiap evakuasi.';
        if(bar) bar.style.background     = 'linear-gradient(90deg,#f59e0b,#d97706)';
        if(card) card.className  = 'bg-amber-500/10 backdrop-blur-md rounded-3xl p-6 shadow-[0_0_30px_rgba(245,158,11,0.3)] border border-amber-500/30 flex flex-col relative overflow-hidden group transition-all duration-500';
    } else {
        icon.style.background    = 'linear-gradient(135deg,#10b981,#059669)';
        icon.innerHTML           = '<i data-lucide="check-circle" class="w-10 h-10"></i>';
        label.textContent        = 'AMAN';
        label.className          = 'text-3xl font-black text-slate-800';
        desc.textContent         = 'Kondisi air normal. Tidak perlu khawatir.';
        if(bar) bar.style.background     = 'linear-gradient(90deg,#10b981,#059669)';
        if(card) card.className  = 'bg-white/40 backdrop-blur-md rounded-3xl p-6 shadow-sm border border-white/40 flex flex-col relative overflow-hidden group transition-all duration-500';
    }
    if(typeof lucide !== 'undefined') lucide.createIcons();
}

function toggleMapModal() {
    const modal = document.getElementById('mapModal');
    if(!modal) return;
    if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => modal.classList.remove('opacity-0'), 10);
    } else {
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const originalStatusTextUpdate = document.getElementById('statusText');
    if (originalStatusTextUpdate) {
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.target.innerText === 'AWAS') {
                    mutation.target.className = "px-4 py-1.5 rounded-full text-sm font-extrabold bg-red-100 text-red-600 tracking-wide animate-pulse shadow-[0_0_15px_rgba(220,38,38,0.5)]";
                } else if (mutation.target.innerText === 'SIAGA') {
                    mutation.target.className = "px-4 py-1.5 rounded-full text-sm font-extrabold bg-orange-100 text-orange-600 tracking-wide";
                } else if (mutation.target.innerText === 'WASPADA') {
                    mutation.target.className = "px-4 py-1.5 rounded-full text-sm font-extrabold bg-yellow-100 text-yellow-600 tracking-wide";
                } else {
                    mutation.target.className = "px-4 py-1.5 rounded-full text-sm font-extrabold bg-green-100 text-green-600 tracking-wide";
                }
            });
        });
        observer.observe(originalStatusTextUpdate, { childList: true, characterData: true, subtree: true });
    }
});
