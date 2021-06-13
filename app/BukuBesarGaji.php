<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuBesarGaji extends Model
{
    protected $fillable = [
        'laporan_id',
		'keterangan',
		'ref',
		'debit',
		'kredit',
		'saldo',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
