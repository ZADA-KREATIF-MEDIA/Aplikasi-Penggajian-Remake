<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class SlipGajiController extends Controller
{
    public function index()
    {
        $data['karyawan'] = User::role('karyawan')->whereId(auth()->user()->id)->get();
        return view('penggajian.index', $data);
    }

    public function show($id)
    {
        $month_now = date('m');
        $data['karyawan'] = User::find($id);
        $lembur = DB::table('lemburs')->where('user_id',$id)->whereMonth('tanggal',$month_now)->get();
        $data['lembur'] = $lembur->sum('lama_lembur');
        $masuk = DB::table('absensis')->where('user_id',$id)->where('status','Masuk')->whereMonth('tanggal',$month_now)->get();
        $data['masuk'] = $masuk->count();
        return view('slipgaji.cetak', $data);
    }
}
