<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use Alert;

class MobilController extends Controller
{
    public function index()
    {
        return view('pages.mobil.index',[
            'mobils'        => Mobil::get()
        ]);
    }
    public function create()
    {
        return view('pages.mobil.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'merek'         => 'required',
            'model'         => 'required',
            'nmrPlat'       => 'required|unique:mobils',
            'tarif'         => 'required',
            'image'         => 'required|mimes:jpg,jpeg,png'
        ]);
        $imageName = $request->file('image')->getClientOriginalName();
        $name = str_replace(' ', '_', $imageName);
        $data['image']  = $request->file('image')->storeAs('gambarMobil', date('Ymdhis').$name);
        $datanya = Mobil::create($data);
        if ($datanya == true) {
            Alert::toast('Berhasil Simpan Data', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Gagal Simpan Data', 'error');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $mobil = Mobil::find($id);
        return view('pages.mobil.edit',compact('mobil'));
    }
    public function update($id,Request $request)
    {
        $mobil = Mobil::find($id);
        $data = $request->validate([
            'merek'         => 'required',
            'model'         => 'required',
            'nmrPlat'       => 'required',
            'tarif'         => 'required',
            'image'         => 'mimes:jpg,jpeg,png'
        ]);
        if($request->image){
            $imageName = $request->file('image')->getClientOriginalName();
            $name = str_replace(' ', '_', $imageName);
            $data['image']  = $request->file('image')->storeAs('gambarMobil', date('Ymdhis').$name);
        }
        $datanya = $mobil->update($data);
        if ($datanya == true) {
            Alert::toast('Berhasil Simpan Data', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Gagal Simpan Data', 'error');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $datanya = $mobil->delete();
        if ($datanya == true) {
            Alert::toast('Berhasil Hapus Data', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Gagal Hapus Data', 'error');
            return redirect()->back();
        }
    }
}
