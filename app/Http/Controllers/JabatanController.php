<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\JabatanRequest;
use Session;

class JabatanController extends Controller
{
    public function index()
    {
        $data['jabatan'] = Jabatan::all();
        return view('jabatan.index', $data);
    }


    public function store(JabatanRequest $request)
    {
        Jabatan::create($request->all());
        Session::flash('message', 'Tambah Jabatan berhasil.'); 
        return redirect()->route('jabatan.index');
    }

    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->fill($request->all())->save();
        Session::flash('message', 'Update Jabatan berhasil.'); 
        return redirect()->route('jabatan.index'); 
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->back();  
    }

    
}
