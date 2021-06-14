<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\JurnalUmum;
use App\BukuBesarKas;
use App\BukuBesarGaji;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $month_now = date('m');
        $data['karyawan'] = User::all();

        $lembur = DB::table('lemburs')->whereMonth('tanggal',$month_now)->get();
        $data['lembur'] = $lembur->sum('lama_lembur');

        $masuk = DB::table('absensis')->where('status','Masuk')->whereMonth('tanggal',$month_now)->get();
        $ijin = DB::table('absensis')->where('status','Ijin')->whereMonth('tanggal',$month_now)->get();
        $sakit = DB::table('absensis')->where('status','Sakit')->whereMonth('tanggal',$month_now)->get();
        $data['ijin'] = $ijin->count();
        $data['masuk'] = $masuk->count();
        $data['sakit'] = $sakit->count();

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
