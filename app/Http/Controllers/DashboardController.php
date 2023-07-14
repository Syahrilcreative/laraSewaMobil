<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Mobil,User};

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard',[
            'jumlahMobil'       => Mobil::count(),
            'jumlahUser'       => User::where('role','!=','admin')->count(),
            'MobilKembali'       => Mobil::where('status','=',0)->count(),
            'MobilJalan'       => Mobil::where('status','=',1)->count(),
        ]);
    }
}
