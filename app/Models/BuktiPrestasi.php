<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPrestasi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'nama_prestasi',
        'kategori',
        'file',
    ];

     // Definisikan relasi dengan tabel "User" di sini
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
