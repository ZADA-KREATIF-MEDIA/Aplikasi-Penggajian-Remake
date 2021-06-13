<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    protected $fillable = [
        'user_id', 'tanggal', 'lama_lembur', 'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTotalLembur($query, $id)
    {
        $result = $query->whereUserId($id)->whereMonth('tanggal', \Carbon\Carbon::now()->month)->sum('lama_lembur');

    	return $result ? $result : 0;
    }
}
