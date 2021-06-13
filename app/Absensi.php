<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'user_id', 'status', 'tanggal', 'jam_masuk', 'jam_keluar', 'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMasuk($query, $id)
    {
        return $this->whereUserId($id)->whereStatus('Masuk')->whereMonth('tanggal', \Carbon\Carbon::now()->month)->count();
    }

    public function scopeIjin($query, $id)
    {
        return $this->whereUserId($id)->whereStatus('Ijin')->whereMonth('tanggal', \Carbon\Carbon::now()->month)->count();
    }

    public function scopeCuti($query, $id)
    {
        return $this->whereUserId($id)->whereStatus('Cuti')->whereMonth('tanggal', \Carbon\Carbon::now()->month)->count();
    }

    public function scopeAlpa($query, $id)
    {
        return $this->whereUserId($id)->whereStatus('Alpa')->whereMonth('tanggal', \Carbon\Carbon::now()->month)->count();
    }
}
