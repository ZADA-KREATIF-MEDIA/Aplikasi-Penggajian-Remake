<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\BukuBesarKas;
use App\BukuBesarGaji;
use Illuminate\Http\Request;
use Session;

class LaporanController extends Controller
{
    public function index()
    {
        $data['laporan'] = Laporan::all();
        return view('laporan.index', $data);
    }

    public function create(Request $request)
    {
        $data['laporan'] = Laporan::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        return view('laporan.create', $data);
    }

    
    public function store(Request $request)
    {
        $cek = Laporan::whereUserId($request->user_id)->whereBulan($request->bulan)->whereTahun($request->tahun)->first();
        $laporan = Laporan::firstOrCreate(['user_id'=>$request->user_id, 'bulan'=>$request->bulan, 'tahun'=>$request->tahun], $request->all());
        if (! $cek) {
            Session::flash('message', 'Gaji Karyawan Berhasil.'); 
            // jurnal
            $laporan->jurnalUmum()->create(['keterangan'=>'Gaji', 'debit'=> $request->gaji_bersih]);
            $laporan->jurnalUmum()->create(['keterangan'=>'Kas', 'kredit'=> $request->gaji_bersih]);
            // buku besar kas
            $laporan->bukuBesarKas()->create(['keterangan'=>'Gaji', 'kredit'=> $request->gaji_bersih, 'saldo'=> $request->gaji_bersih + BukuBesarKas::sum('kredit') ]); 
            // buku besar gaji
            $laporan->bukuBesarGaji()->create(['keterangan'=>'Kas', 'debit'=> $request->gaji_bersih, 'saldo'=> $request->gaji_bersih + BukuBesarGaji::sum('debit') ]);
        } else {
            Session::flash('message', 'Karyawan atas nama ' . $laporan->user->name . ' sudah gajian bulan ini pada tanggal ' . $laporan->created_at->format('d, F Y')); 
        }
        return back();
    }
}
