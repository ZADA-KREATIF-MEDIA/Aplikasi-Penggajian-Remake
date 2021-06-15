<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        $data['karyawan'] = User::where('level','karyawan')->get();
        return view('penggajian.index', $data);
    }
}
