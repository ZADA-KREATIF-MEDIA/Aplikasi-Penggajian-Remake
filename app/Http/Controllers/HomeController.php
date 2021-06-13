<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jabatan;

class HomeController extends Controller
{
    public function index()
    {
        $data['karyawan'] = User::where('level','karyawan')->count();
        $data['jabatan'] = Jabatan::count();

        return view('home', $data);
    }
}
