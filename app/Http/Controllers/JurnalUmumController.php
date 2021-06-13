<?php

namespace App\Http\Controllers;

use App\JurnalUmum;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $data['jurnalUmum'] = JurnalUmum::all();
        return view('jurnalumum.index', $data);
    }

    public function laporan_periode(Request $request)
    {
        $data['jurnalUmum'] = JurnalUmum::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        return view('jurnalumum.index', $data);
    }
}
