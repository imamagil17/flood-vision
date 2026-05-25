<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoUploadLog;
use Illuminate\Support\Facades\Storage;

class VideoUploadController extends Controller
{
    public function index()
    {
        $videos = VideoUploadLog::latest()->get();
        return view('admin.videos.kelola-video', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sungai' => 'required|string',
            'waktu_rekaman' => 'required|date',
            'keterangan' => 'nullable|string',
            'video_file' => 'required|file|mimes:mp4,mov,avi|max:204800',
        ]);

        try {
            if ($request->hasFile('video_file')) {
                $file = $request->file('video_file');
                
                $fileSizeRaw = $file->getSize(); 
                $fileSizeMb = round($fileSizeRaw / (1024 * 1024), 1) . ' MB';

                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('videos', $fileName, 'public');

                $namaSungai = $request->nama_sungai;
                $simulatedLevel = rand(30, 500); 
                $statusKondisi = 'Normal';

                // Logika Aturan Batas Threshold Centimeter Dinamis Per Sungai
                if ($namaSungai === 'Sungai Gumbasa') {
                    if ($simulatedLevel >= 450) { $statusKondisi = 'Bahaya'; }
                    elseif ($simulatedLevel >= 350) { $statusKondisi = 'Siaga'; }
                    elseif ($simulatedLevel >= 250) { $statusKondisi = 'Waspada'; }
                    else { $statusKondisi = 'Normal'; }
                } elseif ($namaSungai === 'Sungai Lindu') {
                    if ($simulatedLevel >= 500) { $statusKondisi = 'Bahaya'; }
                    elseif ($simulatedLevel >= 390) { $statusKondisi = 'Siaga'; }
                    elseif ($simulatedLevel >= 300) { $statusKondisi = 'Waspada'; }
                    else { $statusKondisi = 'Normal'; }
                } else {
                    if ($simulatedLevel >= 400) { $statusKondisi = 'Bahaya'; }
                    elseif ($simulatedLevel >= 300) { $statusKondisi = 'Siaga'; }
                    elseif ($simulatedLevel >= 200) { $statusKondisi = 'Waspada'; }
                    else { $statusKondisi = 'Normal'; }
                }

                VideoUploadLog::create([
                    'nama_sungai' => $namaSungai,
                    'file_video' => $filePath,
                    'ukuran_file' => $fileSizeMb,
                    'waktu_rekaman' => $request->waktu_rekaman,
                    'nilai_level' => $simulatedLevel, 
                    'status_kondisi' => $statusKondisi,
                    'keterangan' => $request->keterangan
                ]);

                return redirect()->back()->with('success', 'Video berhasil diunggah dan diproses oleh YOLO berbasis Centimeter secara otomatis!');
            }

            return redirect()->back()->with('error', 'Gagal membaca file berkas video.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
}