<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Mobil;
use Alert;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('pages.sewa.index',[
            'transaksis'        => Transaksi::get(),
            'mobils'        => Mobil::where('status','=',0)
                                ->get()
        ]);
    }
    public function store(Request $request)
    {
        $datanya = Transaksi::create([
            'user_id'       => auth()->user()->id,
            'mobil_id'      => $request->mobil_id,
            'tglPinjam'     => $request->tglPinjam,
            'tglKembali'     => $request->tglKembali,
        ]);
        $mobil = Mobil::where('id','=',$request->mobil_id)->update(['status' => 1]);

        if ($datanya == true) {
            Alert::toast('Berhasil Simpan Data', 'success');
            return redirect()->route('transaksi.index');
        } else {
            Alert::toast('Gagal Simpan Data', 'error');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $mobil = Mobil::find($id);
        return view('pages.sewa.edit',compact('mobil'));
    }
}
