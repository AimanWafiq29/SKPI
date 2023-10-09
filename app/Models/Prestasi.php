<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_prestasi',
        'deskripsi',
        'tanggal_prestasi',
        'file',
    ];

    // Definisikan relasi dengan tabel "User" di sini
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
