# 🌊 Flood-Vision: Sistem Mitigasi Banjir Cerdas

Sistem Mitigasi Banjir Cerdas terintegrasi **Computer Vision** (OpenCV.js) dan **AI** (Gemini) untuk pemantauan level air permukaan sungai secara *real-time*. Platform modern ini ditujukan untuk mereduksi risiko kerugian akibat bencana banjir dengan memberikan peringatan dini kepada warga melalui dashboard pintar dan terotomatisasi.

---

## 🚀 Fitur Utama

Sistem ini dipecah menjadi tiga gerbang interaksi utama dengan fitur-fitur mutakhir:

### 📱 1. Dashboard Warga (Citizen Portal)
- **Status Mitigasi Real-Time:** Panel dinamis yang menampilkan kondisi level air (Aman, Siaga, Waspada, Awas).
- **Grafik Tren Air (Chart.js):** Visualisasi historis pergerakan air dari waktu ke waktu yang otomatis ter-update (*auto-refresh*).
- **Mading Berita Digital:** Menampilkan rilis berita dan informasi kebencanaan terkini dari pihak berwenang lengkap dengan pop-up modal elegan.
- **Form Laporan Warga (AJAX):** Fitur pelaporan mandiri dua arah bagi warga untuk melaporkan genangan abnormal secara instan.
- **AI Chatbot Assistant:** Asisten cerdas (berbasis Gemini API) untuk menjawab pertanyaan mitigasi dan evakuasi secara interaktif.
- **Peta Evakuasi & Panduan Keselamatan:** Peta interaktif menuju titik aman BPBD terdekat beserta *checklist* siaga darurat.

### 🛡️ 2. Dashboard Admin (Command Center)
- **Live Camera Feed (OpenCV.js):** Mendeteksi garis level air menggunakan algoritma *Canny Edge Detection* secara langsung dari sumber video lokal.
- **AI Analytics & Prediction Engine:** Menganalisis risiko banjir (Risk Score) dan memprediksi level air untuk 30 menit ke depan menggunakan Machine Learning/AI API.
- **Verifikasi Laporan Darurat:** Sistem manajemen laporan warga di mana admin dapat memverifikasi laporan yang masuk.
- **Sistem Manajemen Berita:** CRUD untuk merilis peringatan publik ke Dashboard Warga dan Beranda.
- **Real-Time Weather Data:** Sinkronisasi API cuaca (suhu, kelembapan) berdasarkan lokasi operasional.

### 🌐 3. Halaman Publik (Welcome Page)
- **Live Demo Monitoring:** Panel prakiraan cuaca 3 hari dan status sensor secara transparan.
- **Penjelasan Arsitektur Sistem:** Visualisasi alur kerja deteksi OpenCV, AI, dan Bot Telegram.
- **Berita Publik:** Pengunjung non-login tetap dapat membaca mading informasi darurat.

---

## 🛠️ Tech Stack & Teknologi

- **Backend:** Laravel (PHP)
- **Frontend & Styling:** Tailwind CSS (Glassmorphism UI), Blade Templating
- **Computer Vision:** OpenCV.js (Image Processing & Canny Edge)
- **Artificial Intelligence:** Google Gemini API (Analytics & NLP Chatbot)
- **Data Visualization:** Chart.js
- **Database:** MySQL (Eloquent ORM)
- **Assets & Icons:** Lucide Icons

---

## 💻 Panduan Instalasi (Development)

Ikuti langkah-langkah berikut untuk menjalankan Flood-Vision di mesin lokal Anda:

1. **Clone Repository**
   ```bash
   git clone https://github.com/imamagil17/capstone-12
   cd capstone-12
   ```

2. **Install Dependensi PHP & Node.js**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Lingkungan (.env)**
   ```bash
   cp .env.example .env
   ```
   *Buka file `.env`, atur koneksi `DB_DATABASE` ke MySQL lokal Anda, dan jangan lupa masukkan API Key untuk Weather dan Gemini AI (jika dikonfigurasi di backend).*

4. **Generate Application Key & Migrasi Database**
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```
   *(Catatan: Tambahkan `--seed` jika Anda memiliki seeder data awal untuk admin/user).*

5. **Kompilasi Aset Frontend (Tailwind)**
   ```bash
   npm run dev
   ```

6. **Jalankan Laravel Server**
   Buka terminal baru, dan jalankan:
   ```bash
   php artisan serve
   ```
   Aplikasi kini dapat diakses melalui `http://localhost:8000`.
---

> **Developed by Imam Agil Aiman (F55123066) - Universitas Tadulako | Teknik Informatika**
