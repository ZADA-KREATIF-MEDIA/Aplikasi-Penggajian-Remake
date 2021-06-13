<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        $data['roles'] = Level::all();
        return view('pengguna.index', $data);
    }

    public function store(UserRequest $request)
    {
        $post = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ];
        dd($post);
        User::create($post);
        return redirect()->route('pengguna.index');
    }

    public function update(Request $request, $id)
    {
        $post = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ];
        $user = User::findOrFail($id);
        $user->update($post);
        return redirect()->route('pengguna.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('pengguna.index');
    }

}
