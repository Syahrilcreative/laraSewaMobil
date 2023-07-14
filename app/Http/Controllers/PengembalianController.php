<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Mobil;
use Alert;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('pages.pengembalian.index',[
            'pengembalians'        => Transaksi::where('status','=',0)->get()
        ]);
    }
    public function edit($id)
    {
        $pengembalian = Transaksi::find($id);
        return view('pages.pengembalian.edit',compact('pengembalian'));
    }
    public function update($id, Request $request)
    {
        $datanya = Transaksi::where('id','=',$id)
                                    ->update([
                                            'total'     => $request->total,
                                            'status'    => 1
                                        ]);
        $mobil = Mobil::where('id','=',$request->mobil_id)->update(['status' => 0]);
        if ($datanya == true) {
            Alert::toast('Berhasil Simpan Data', 'success');
            return redirect()->route('pengembalian.index');
        } else {
            Alert::toast('Gagal Simpan Data', 'error');
            return redirect()->back();
        }

    }
}
