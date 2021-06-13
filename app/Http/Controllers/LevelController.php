<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use Session;

class LevelController extends Controller
{
    public function index()
    {
        $data['roles'] = Level::all();
        return view('admin.role.index', $data);
    }

    public function store(Request $request)
    {   
        Level::create($request->all());
        Session::flash('message', 'Tambah Level berhasil.');
        return redirect()->route('level.index');
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->fill($request->all())->save();
        Session::flash('message', 'Update Level berhasil.');
        return redirect()->route('level.index');
    }
    
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        Session::flash('message', 'Hapus Level berhasil.');
        return redirect()->route('level.index');
    }
}
