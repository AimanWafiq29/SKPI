<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'prodi',
        'no_ijazah',
        'no_dokumen',
        'tgl_dokumen',
        'tahun_masuk',
        'tahun_lulus',
        'gelar',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function informasiTambahan()
    {
        return $this->hasOne(InformasiTambahan::class);
    }

    public function buktiPrestasi()
    {
        return $this->hasMany(BuktiPrestasi::class);
    }

    public function isComplete()
    {
        return !empty($this->nim)
            && !empty($this->nama)
            && !empty($this->tempat_lahir)
            && !empty($this->tanggal_lahir)
            && !empty($this->prodi)
            && !empty($this->no_ijazah)
            && !empty($this->no_dokumen)
            && !empty($this->tgl_dokumen)
            && !empty($this->tahun_masuk)
            && !empty($this->tahun_lulus)
            && !empty($this->gelar);
    }
}
