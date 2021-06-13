<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->level == "admin") {
                $request->session()->put('data',[
                    'id_admin'   => auth()->user()->id,
                    'nama'      => auth()->user()->name,
                    'level'     => auth()->user()->level,
                ]);
                return redirect('/home');
            }else if(auth()->user()->level == "karyawan"){
                $request->session()->put('data',[
                    'id_karyawan' => auth()->user()->id,
                    'nama'      => auth()->user()->name,
                    'level'   => auth()->user()->level,
                ]);
                return redirect('/slipgaji');
            } else {
                Session::flash('message', 'Username tidak ditemukan');
                return redirect('/');
            }
        }else{
            Session::flash('message', 'Username atau password salah'); 
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->forget('data');
        return redirect('/');
    }
}
