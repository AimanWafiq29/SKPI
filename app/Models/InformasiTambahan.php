<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiTambahan extends Model
{
    use HasFactory;

    protected $table = 'informasi_tambahan';

    protected $fillable = [
        'biodata_id',
        'pelatihan',
        'penhargaan',
        'organisasi',
        'skripsi',
        'magang',
        'seminar',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}
