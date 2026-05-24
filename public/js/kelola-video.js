/**
 * kelola-video.js - Flood Vision v1.0
 * Separation of Concerns: Javascript Logic for YOLO & Computer Vision Simulation
 */

// 1. Database Aturan Ambang Batas (Threshold) Centimeter (cm) per Sungai
const RIVER_THRESHOLDS = {
    "Sungai Gumbasa": { waspada: 250, siaga: 350, bahaya: 450 },
    "Sungai Palu":     { waspada: 150, siaga: 200, bahaya: 280 },
    "Sungai Lindu":    { waspada: 300, siaga: 390, bahaya: 500 },
    "Sungai Lariang":  { waspada: 400, siaga: 550, bahaya: 700 },
    "Sungai Pakuli":   { waspada: 200, siaga: 300, bahaya: 400 },
    "Sungai Marawola": { waspada: 180, siaga: 270, bahaya: 360 },
    "Sungai Palolo":   { waspada: 220, siaga: 320, bahaya: 420 },
    "Sungai Kulawi":   { waspada: 280, siaga: 370, bahaya: 470 },
    "Sungai Ngatabaru":{ waspada: 160, siaga: 230, bahaya: 300 },
    "Sungai Wuno":     { waspada: 170, siaga: 250, bahaya: 330 },
    "Sungai Bangga":   { waspada: 240, siaga: 340, bahaya: 440 },
    "Sungai Samba":    { waspada: 260, siaga: 360, bahaya: 460 }
};

// State penyimpanan record yang sedang aktif disimulasikan
let currentSimulatedRecord = null;

// 2. Fungsi Utama Penentu Klasifikasi Status Bencana Berdasarkan Tinggi Air (cm) & Sungai
function getConditionDetails(sungai, levelCm) {
    const rules = RIVER_THRESHOLDS[sungai] || { waspada: 200, siaga: 300, bahaya: 400 };
    
    let status = 'NORMAL';
    let badgeClass = 'bg-emerald-50 text-emerald-600 border-emerald-200';
    
    if (levelCm >= rules.bahaya) {
        status = 'BAHAYA';
        badgeClass = 'bg-red-50 text-red-600 border-red-200';
    } else if (levelCm >= rules.siaga) {
        status = 'SIAGA';
        badgeClass = 'bg-orange-50 text-orange-600 border-orange-200';
    } else if (levelCm >= rules.waspada) {
        status = 'WASPADA';
        badgeClass = 'bg-amber-50 text-amber-600 border-amber-200';
    }
    
    return { status, badgeClass };
}

// Fungsi untuk memutar / menjeda preview video
function togglePreviewVideo() {
    const videoPlayer = document.getElementById('previewVideoPlayer');
    const playIcon = document.getElementById('previewPlayIcon');
    if (!videoPlayer) return;

    if (videoPlayer.paused) {
        videoPlayer.play().catch(err => console.log("Play failed:", err));
        if (playIcon) {
            playIcon.setAttribute('data-lucide', 'pause');
        }
    } else {
        videoPlayer.pause();
        if (playIcon) {
            playIcon.setAttribute('data-lucide', 'play');
        }
    }
    if (typeof lucide !== 'undefined') lucide.createIcons();
}

// 3. Menghubungkan Event Listener & Sinkronisasi Data Awal
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi ikon Lucide
    if (typeof lucide !== 'undefined') lucide.createIcons();

    // SINKRONISASI BADGE OTOMATIS: Hitung & tampilkan status video dummy awal bawaan HTML
    const existingCards = document.querySelectorAll('.video-card-item');
    existingCards.forEach(card => {
        const sungai = card.getAttribute('data-river');
        const levelCm = parseInt(card.getAttribute('data-cm'));
        
        if (sungai && levelCm) {
            const details = getConditionDetails(sungai, levelCm);
            const targetContainer = card.querySelector('.status-badge-target');
            if (targetContainer) {
                targetContainer.innerHTML = `<span class="text-[10px] font-extrabold px-2 py-0.5 ${details.badgeClass} border rounded-md uppercase tracking-wide inline-block">${details.status}</span>`;
            }
        }
    });

    const fileInput = document.getElementById('videoFileInput');
    const previewContainer = document.getElementById('filePreview');
    const previewText = document.getElementById('filePreviewText');
    const searchInput = document.getElementById('searchVideo');
    const dropzone = document.getElementById('dropzone');

    // Drag & Drop feedback visual
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
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files.length) {
                fileInput.files = files;
                // Trigger change manually to show preview
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        }, false);
    }

    // Tampilkan detail file saat admin memilih video
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                previewText.textContent = `File Terpilih: ${file.name} (${(file.size / (1024 * 1024)).toFixed(1)} MB)`;
                previewContainer.classList.remove('hidden');
            }
        });
    }

    // Reset preview box ketika klik batal
    const btnBatal = document.getElementById('btnBatal');
    if (btnBatal) {
        btnBatal.addEventListener('click', function() {
            if (previewContainer) previewContainer.classList.add('hidden');
            // Sembunyikan juga panel preview Video Terdeteksi di kanan
            const placeholder = document.getElementById('previewPlaceholder');
            const loader = document.getElementById('previewLoader');
            const content = document.getElementById('previewContent');
            if (placeholder) placeholder.classList.remove('hidden');
            if (loader) loader.classList.add('hidden');
            if (content) content.classList.add('hidden');
            
            const videoPlayer = document.getElementById('previewVideoPlayer');
            if (videoPlayer) {
                videoPlayer.pause();
                videoPlayer.src = '';
                videoPlayer.classList.add('hidden');
            }
            currentSimulatedRecord = null;
        });
    }

    // Fitur Filter Pencarian Video Instan
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.video-card-item');

            cards.forEach(card => {
                const dataName = card.getAttribute('data-name');
                if (dataName) {
                    card.style.display = dataName.includes(query) ? 'flex' : 'none';
                }
            });
        });
    }
});

// 4. 🤖 EKSEKUSI SIMULASI DETEKSI COMPUTER VISION & YOLO
function executeYoloSimulation(event) {
    event.preventDefault();
    
    const fileInput = document.getElementById('videoFileInput');
    const sungai = document.getElementById('nama_sungai').value;
    const tanggal = document.getElementById('input_tanggal').value;
    const waktu = document.getElementById('input_waktu').value || '12:00';
    
    if (!fileInput.files[0] || !sungai) return;

    const file = fileInput.files[0];
    const sizeText = (file.size / (1024 * 1024)).toFixed(1) + ' MB';
    
    // Konversi tampilan format tanggal
    const dateParts = tanggal.split('-');
    const formattedDate = dateParts.length === 3 ? `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}` : '24/05/2026';

    // Dapatkan element target preview kanan
    const placeholder = document.getElementById('previewPlaceholder');
    const loader = document.getElementById('previewLoader');
    const content = document.getElementById('previewContent');
    const previewFileName = document.getElementById('previewFileName');
    const previewWaterLevel = document.getElementById('previewWaterLevel');
    const previewYoloAccuracy = document.getElementById('previewYoloAccuracy');
    const previewStatusBadge = document.getElementById('previewStatusBadge');
    const videoPlayer = document.getElementById('previewVideoPlayer');

    // Sembunyikan content dan placeholder, tunjukkan loader
    if (placeholder) placeholder.classList.add('hidden');
    if (content) content.classList.add('hidden');
    if (loader) loader.classList.remove('hidden');

    // Hentikan video player lama jika ada
    if (videoPlayer) {
        videoPlayer.pause();
        videoPlayer.src = '';
        videoPlayer.classList.add('hidden');
    }

    // Berikan efek scanning delay 1500ms agar realistis dan memukau
    setTimeout(() => {
        // Hancurkan loader, tampilkan content
        if (loader) loader.classList.add('hidden');
        if (content) content.classList.remove('hidden');

        // 🚨 SIMULASI ALGORITMA COMPUTER VISION YOLO (Mengonversi rasio koordinat piksel menjadi satuan cm)
        // Menghasilkan angka acak tinggi air antara 50 cm sampai dengan 750 cm
        const simLevelCm = Math.floor(Math.random() * (750 - 50 + 1)) + 50;
        const details = getConditionDetails(sungai, simLevelCm);
        
        // Akurasi simulasi YOLO dinamis dalam persen (%)
        const yoloAcc = (Math.random() * (98.8 - 92.4) + 92.4).toFixed(1);

        // Isi data visual preview
        if (previewFileName) previewFileName.textContent = file.name;
        if (previewWaterLevel) previewWaterLevel.textContent = `${simLevelCm} cm`;
        if (previewYoloAccuracy) previewYoloAccuracy.textContent = `${yoloAcc}%`;
        if (previewStatusBadge) {
            previewStatusBadge.innerHTML = `<span class="text-[10px] font-extrabold px-2.5 py-0.5 ${details.badgeClass} border rounded-md uppercase tracking-wide inline-block">${details.status}</span>`;
        }

        // Setup Video Player
        if (videoPlayer) {
            videoPlayer.src = URL.createObjectURL(file);
            videoPlayer.classList.remove('hidden');
            videoPlayer.play().catch(err => console.log("Auto-play blocked or failed:", err));
            
            // Set durasi video dinamis
            videoPlayer.onloadedmetadata = function() {
                const mins = Math.floor(videoPlayer.duration / 60).toString().padStart(2, '0');
                const secs = Math.floor(videoPlayer.duration % 60).toString().padStart(2, '0');
                const durationElem = document.getElementById('previewDuration');
                if (durationElem) durationElem.textContent = `${mins}:${secs}`;
            };
            
            // Set icon to pause since it is playing
            const playIcon = document.getElementById('previewPlayIcon');
            if (playIcon) {
                playIcon.setAttribute('data-lucide', 'pause');
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }
        }

        // Simpan state simulasi aktif saat ini
        currentSimulatedRecord = {
            fileName: file.name,
            sungai: sungai,
            formattedDate: formattedDate,
            sizeText: sizeText,
            simLevelCm: simLevelCm,
            yoloAcc: yoloAcc,
            details: details
        };

        if (typeof lucide !== 'undefined') lucide.createIcons();
    }, 1500);
}

// 5. 💾 SIMPAN HASIL DETEKSI KE DAFTAR VIDEO TERSIMPAN
function saveSimulatedResult() {
    if (!currentSimulatedRecord) return;

    const r = currentSimulatedRecord;
    const listContainer = document.getElementById('videoListContainer');

    const newRow = `
        <div class="flex items-center justify-between p-4 bg-white border border-blue-200 bg-gradient-to-r from-blue-50/20 to-transparent rounded-2xl shadow-sm video-card-item animate-[slideDown_0.25s_ease-out]" data-name="${r.fileName.toLowerCase()} ${r.sungai.toLowerCase()}" data-river="${r.sungai}" data-cm="${r.simLevelCm}">
            <div class="flex items-center gap-4 min-w-0">
                <div class="w-12 h-12 rounded-xl bg-slate-900 flex items-center justify-center text-slate-400 shrink-0 shadow-sm relative overflow-hidden">
                    <i data-lucide="video" class="w-5 h-5"></i>
                </div>
                <div class="min-w-0">
                    <h4 class="font-bold text-sm text-slate-800 truncate">${r.fileName}</h4>
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1 text-xs text-slate-500">
                        <span class="font-bold text-slate-700">${r.sungai}</span>
                        <span>•</span>
                        <span>${r.formattedDate}</span>
                        <span>•</span>
                        <span>${r.sizeText}</span>
                        <span>•</span>
                        <span class="font-bold text-blue-600">YOLO: <span class="cm-display">${r.simLevelCm}</span> cm</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-[10px] font-extrabold px-2 py-0.5 ${r.details.badgeClass} border rounded-md uppercase tracking-wide inline-block">${r.details.status}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-2 pl-4 shrink-0">
                <button class="p-2 hover:bg-slate-50 text-blue-600 rounded-xl"><i data-lucide="play" class="w-4 h-4 fill-blue-600/10"></i></button>
                <button class="p-2 hover:bg-slate-50 text-slate-600 rounded-xl"><i data-lucide="download" class="w-4 h-4"></i></button>
            </div>
        </div>
    `;

    if (listContainer) {
        listContainer.insertAdjacentHTML('afterbegin', newRow);
        // Auto scroll container ke atas agar record baru langsung terlihat
        listContainer.scrollTop = 0;
    }
    
    if (typeof lucide !== 'undefined') lucide.createIcons();

    // Ubah isi teks notifikasi sistem atas sesuai data deteksi riil
    const alertBox = document.getElementById('simulationAlert');
    const alertText = document.getElementById('simulationAlertText');
    
    if (alertBox && alertText) {
        alertText.textContent = `Log Tersimpan! Analisis YOLO & Computer Vision ${r.sungai} berhasil disimpan permanen ke database (${r.simLevelCm} cm - [${r.details.status.toUpperCase()}]).`;
        alertBox.classList.remove('hidden');
    }
    
    // Hentikan video player preview
    const videoPlayer = document.getElementById('previewVideoPlayer');
    if (videoPlayer) {
        videoPlayer.pause();
        videoPlayer.src = '';
        videoPlayer.classList.add('hidden');
    }

    // Reset Form input & Preview Card
    const form = document.getElementById('standaloneVideoForm');
    if (form) form.reset();
    
    const previewContainer = document.getElementById('filePreview');
    if (previewContainer) previewContainer.classList.add('hidden');

    const placeholder = document.getElementById('previewPlaceholder');
    const content = document.getElementById('previewContent');
    if (placeholder && content) {
        placeholder.classList.remove('hidden');
        content.classList.add('hidden');
    }

    currentSimulatedRecord = null;
}
