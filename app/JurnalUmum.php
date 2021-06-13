<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    protected $fillable = [
        'laporan_id',
		'keterangan',
		'ref',
		'debit',
		'kredit',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
