<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'user_id',
        'bulan',
        'tahun',
        'gapok',
        'tunjangan',
        'lembur',
        'pph',
        'bpjs',
        'gaji_bersih',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jurnalUmum()
    {
        return $this->hasMany(JurnalUmum::class);
    }

    public function bukuBesarKas()
    {
        return $this->hasMany(BukuBesarKas::class);
    }

    public function bukuBesarGaji()
    {
        return $this->hasMany(BukuBesarGaji::class);
    }
}
