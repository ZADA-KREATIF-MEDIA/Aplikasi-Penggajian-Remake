<?php

namespace App\Http\Controllers;

use App\Lembur;
use Illuminate\Http\Request;
use Session;

class LemburController extends Controller
{
    public function index()
    {
        $data['lembur'] = Lembur::all();
        return view('lembur.index', $data);
    }

    public function store(Request $request)
    {
        if (Lembur::whereUserId($request->user_id)->whereTanggal($request->tanggal)->first()) {
            Session::flash('message', 'User Sudah Lembur Pada Tanggal Tersebut.'); 
            return redirect()->back();
        }
        Lembur::create($request->all());
        return redirect()->route('lembur.index');
    }

    public function update(Request $request, Lembur $lembur)
    {
        $lembur->fill($request->all())->save();
        Session::flash('message', 'Update Lembur berhasil.'); 
        return redirect()->route('lembur.index');
    }

    public function destroy(Lembur $lembur)
    {
        $lembur->delete();
        return redirect()->back();  
    }
}
