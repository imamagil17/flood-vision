<?php

namespace App\Http\Controllers;

use App\Models\CitizenReport;
use Illuminate\Http\Request;

class CitizenReportController extends Controller
{
    public function index()
    {
        $reports = CitizenReport::with('user')->latest()->paginate(15);
        return view('admin.citizen_reports.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|string|max:255',
            'tingkat_genangan' => 'required|in:Aman,Waspada,Siaga,Bahaya',
            'deskripsi' => 'nullable|string'
        ]);

        $report = CitizenReport::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'lokasi' => $request->lokasi,
            'tingkat_genangan' => $request->tingkat_genangan,
            'deskripsi' => $request->deskripsi,
            'status' => 'Pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil dikirim.',
            'data' => $report
        ], 201);
    }

    public function verify($id)
    {
        $report = CitizenReport::findOrFail($id);
        $report->status = 'Terverifikasi';
        $report->save();

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil diverifikasi.'
        ]);
    }
}
