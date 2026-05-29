/**
 * kelola-video.js - Flood Vision v1.0 (PRODUCTION MODE)
 * Menangani interaksi UI murni tanpa memalsukan data.
 */

document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi ikon Lucide
    if (typeof lucide !== 'undefined') lucide.createIcons();

    const fileInput = document.getElementById('videoFileInput');
    const previewContainer = document.getElementById('filePreview');
    const previewText = document.getElementById('filePreviewText');
    const searchInput = document.getElementById('searchVideo');
    const dropzone = document.getElementById('dropzone');

    // 2. Animasi Drag & Drop
    if (dropzone && fileInput) {
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, e => {
                e.preventDefault();
                dropzone.classList.add('border-blue-500', 'bg-blue-50/50', 'scale-[0.99]');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, e => {
                e.preventDefault();
                dropzone.classList.remove('border-blue-500', 'bg-blue-50/50', 'scale-[0.99]');
            }, false);
        });

        dropzone.addEventListener('drop', e => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-500', 'bg-blue-50/50', 'scale-[0.99]');
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files.length) {
                fileInput.files = files;
                // Picu event change agar teks nama file muncul
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        }, false);
    }

    // 3. Tampilkan Nama & Ukuran File Saat Dipilih
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                previewText.textContent = `File Terpilih: ${file.name} (${(file.size / (1024 * 1024)).toFixed(1)} MB)`;
                previewContainer.classList.remove('hidden');
            }
        });
    }

    // 4. Reset Form Saat Tombol "Batal" Ditekan
    const btnBatal = document.getElementById('btnBatal');
    if (btnBatal) {
        btnBatal.addEventListener('click', function() {
            if (previewContainer) previewContainer.classList.add('hidden');
            
            const placeholder = document.getElementById('previewPlaceholder');
            const loader = document.getElementById('previewLoader');
            
            // Kembalikan ke tampilan awal
            if (placeholder) placeholder.classList.remove('hidden');
            if (loader) loader.classList.add('hidden');
        });
    }

    // 5. Fitur Filter Pencarian Instan (Daftar Video di Kanan)
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.video-card-item');

            cards.forEach(card => {
                const dataName = card.getAttribute('data-name') || '';
                if (dataName) {
                    card.style.display = dataName.includes(query) ? 'flex' : 'none';
                }
            });
        });
    }
});

// =========================================================================
// 6. ANIMASI LOADING SAAT FORM DI-SUBMIT
// =========================================================================
function showLoading(event) {
    const fileInput = document.getElementById('videoFileInput');
    
    // Jika input file kosong, hentikan fungsi ini agar HTML5 bisa memunculkan pesan "Required"
    if (!fileInput || !fileInput.files[0]) return; 

    // PENTING: Kita TIDAK menuliskan event.preventDefault() di sini!
    // Biarkan browser melakukan tugasnya mengirim file (POST) ke Controller Laravel.

    const placeholder = document.getElementById('previewPlaceholder');
    const loader = document.getElementById('previewLoader');
    const submitBtn = document.getElementById('btnSubmit');

    // Sembunyikan panel "Belum Ada Video"
    if (placeholder) placeholder.classList.add('hidden');
    
    // Munculkan animasi Spinner Mutar (Loader YOLO)
    if (loader) loader.classList.remove('hidden'); 

    // Ubah tombol "Upload Video" menjadi state Loading agar tidak diklik 2x
    if (submitBtn) {
        submitBtn.innerHTML = `<i data-lucide="loader-2" class="w-4 h-4 animate-spin"></i> Memproses YOLO...`;
        submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
        
        // Render ikon Lucide baru yang baru saja disisipkan
        if (typeof lucide !== 'undefined') lucide.createIcons();
    }
}