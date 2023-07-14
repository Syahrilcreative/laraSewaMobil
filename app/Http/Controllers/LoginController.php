<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function loginStore(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
            return redirect()->intended('dashboard');
            }else{
                return redirect()->intended('transaksi');
            }
        };
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'alamat'    => 'required',
            'sim'       => 'required|unique:users',
            'telp'      => 'required|unique:users',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:8'
        ]);
        $user = User::create([
            'name'          => $data['name'],
            'alamat'        => $data['alamat'],
            'sim'           => $data['sim'],
            'telp'          => $data['telp'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'role'          => 'user',
        ]);
        if ($user == true) {
            toast('Berhasil Registrasi','success');
            return redirect()->route('login');
        } else {
            toast('Gagal Registrasi','error');
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
