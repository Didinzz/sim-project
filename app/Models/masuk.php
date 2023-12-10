<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $fillable = ['nomor_berkas', 'alamat_pengirim', 'tanggal_surat', 'nomor_surat', 'perihal', 'petunjuk', 'nomor_paket', 'path'];
}
