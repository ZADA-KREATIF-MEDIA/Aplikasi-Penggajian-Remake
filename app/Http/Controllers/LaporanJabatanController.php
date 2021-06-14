<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\JurnalUmum;
use App\BukuBesarKas;
use App\BukuBesarGaji;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
class LaporanJabatanController extends Controller
{
    public function index()
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
        
        $data['laporan'] = Laporan::all();
        return view('laporan_jabatan.index', $data);
    }

}
