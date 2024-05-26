<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $data['barangs'] = Barang::with('kategori')->get();
        return view('barang.index', $data);
    }

    public function create(){
        $data['kategoris'] = Kategori::pluck('kategori_barang','id_kategori');
        return view('barang.create' ,$data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required|max:150',
            'kategori_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required|max:10',
        ]);

        Barang::create($validated);

        if($request->save == true) {
            return redirect()->route('barang');
        } else {
            return redirect()->route('barang.create');
        }
    }
}
