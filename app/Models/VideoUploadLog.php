<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoUploadLog extends Model
{
    use HasFactory;

    protected $table = 'video_upload_logs';

    protected $fillable = [
        'nama_sungai',
        'file_video',
        'ukuran_file',
        'waktu_rekaman',
        'nilai_level',
        'status_kondisi',
        'keterangan'
    ];
}