<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\KaryawanRequest;
use Session;

class KaryawanController extends Controller
{
    public function index()
    {
        $data['karyawan'] = User::where('level','karyawan')->get();
        return view('karyawan.index', $data);
    }

    public function store(KaryawanRequest $request)
    {

        User::create($request->all());
        return redirect()->route('karyawan.index');
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->except('password');
        $user = User::findOrFail($id);
        $user->update($requestData);
        return redirect()->route('karyawan.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function trash()
    {
        $pengguna = User::onlyTrashed()->get();
        return view('karyawan/pengguna_trash', ['pengguna' => $pengguna]);
    }

    public function restore($id)
    {
        $pengguna = User::onlyTrashed()->where('id', $id);
        $pengguna->restore();
        return redirect()->route('karyawan.index');
    }

    public function force_delete($id)
    {
        $pengguna = User::onlyTrashed()->where('id', $id);
        $pengguna->forceDelete();
        return redirect()->route('karyawan.index');
    }
}
