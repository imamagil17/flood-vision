function bukaModalBerita(id, judul, tanggal, fotoUrl) {
    document.getElementById('modalBeritaJudul').innerText = judul;
    document.getElementById('modalBeritaTanggal').innerText = tanggal;
    
    const fotoEl = document.getElementById('modalBeritaFoto');
    if(fotoUrl) {
        fotoEl.src = fotoUrl;
        fotoEl.classList.remove('hidden');
    } else {
        fotoEl.classList.add('hidden');
    }
    
    const rawContentEl = document.getElementById('konten-berita-'+id);
    const modalDescEl = document.getElementById('modalBeritaDeskripsi');
    if(rawContentEl && modalDescEl) {
        // Handle both innerHTML replace or innerText from user dash
        modalDescEl.innerHTML = rawContentEl.innerHTML.replace(/\n/g, '<br>');
    }
    
    const modal = document.getElementById('modalBerita');
    const content = document.getElementById('modalBeritaContent');
    if(modal && content) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }, 10);
    }
    if (typeof lucide !== 'undefined') lucide.createIcons();
}

function tutupModalBerita() {
    const modal = document.getElementById('modalBerita');
    const content = document.getElementById('modalBeritaContent');
    if(modal && content) {
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        content.classList.remove('scale-100');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }
}
