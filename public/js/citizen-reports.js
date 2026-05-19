// Admin Verifikasi
function verifikasiLaporan(id, btnElement) {
    if(!confirm('Verifikasi laporan darurat ini?')) return;
    const originalText = btnElement.innerHTML;
    btnElement.innerHTML = '<i data-lucide="loader-2" class="w-3 h-3 animate-spin"></i>';
    
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
    
    fetch('/admin/reports/'+id+'/verify', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            const statusDiv = document.getElementById('status-report-'+id);
            if(statusDiv) {
                statusDiv.innerHTML = '<span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-emerald-100 text-emerald-700 border border-emerald-200"><i data-lucide="check" class="w-2.5 h-2.5 inline"></i> Verif</span>';
            }
            btnElement.remove();
            if(typeof lucide !== 'undefined') lucide.createIcons();
        } else {
            alert('Gagal memverifikasi');
            btnElement.innerHTML = originalText;
            if(typeof lucide !== 'undefined') lucide.createIcons();
        }
    })
    .catch(err => {
        console.error(err);
        alert('Terjadi kesalahan jaringan.');
        btnElement.innerHTML = originalText;
        if(typeof lucide !== 'undefined') lucide.createIcons();
    });
}

// User Dashboard Form Submit
document.addEventListener('DOMContentLoaded', () => {
    const reportForm = document.getElementById('citizenReportForm');
    if (reportForm) {
        reportForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitReport');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i data-lucide="loader-2" class="w-4 h-4 animate-spin"></i> Mengirim...';
            if(typeof lucide !== 'undefined') lucide.createIcons();

            const payload = {
                lokasi: document.getElementById('reportLokasi').value,
                tingkat_genangan: document.getElementById('reportGenangan').value,
                deskripsi: document.getElementById('reportDeskripsi').value
            };

            try {
                const csrfMeta = document.querySelector('meta[name="csrf-token"]');
                const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
                const response = await fetch('/api/reports', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(payload)
                });

                const resData = await response.json();
                if (response.ok && resData.success) {
                    alert('Laporan berhasil dikirim! Terima kasih atas partisipasi Anda.');
                    reportForm.reset();
                } else {
                    alert('Gagal mengirim laporan. Silakan coba lagi.');
                }
            } catch (err) {
                alert('Terjadi kesalahan koneksi.');
                console.error(err);
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalText;
                if(typeof lucide !== 'undefined') lucide.createIcons();
            }
        });
    }
});
