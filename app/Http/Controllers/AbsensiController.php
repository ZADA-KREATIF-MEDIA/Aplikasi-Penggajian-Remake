<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AbsensiRequest;
use App\Absensi;
use Session;

class AbsensiController extends Controller
{
    public function index()
    {
        $data['absensi'] = Absensi::orderBy('id', 'desc')->get();
        return view('absensi.index', $data);
    }

    public function store(AbsensiRequest $request)
    {
        if (Absensi::whereUserId($request->user_id)->whereTanggal($request->tanggal)->first()) {
            Session::flash('message', 'User Sudah Melakukan Absen Pada Tanggal Tersebut.');
            return redirect()->back();
        }
        Absensi::create($request->all());
        return redirect()->route('absensi.index');
    }

    public function update(Request $request, Absensi $absensi)
    {
        $absensi->fill($request->all())->save();
        Session::flash('message', 'Update Absensi berhasil.');
        return redirect()->route('absensi.index');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->back();
    }
}
