<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $data['kategoris'] = Kategori::all();
        return view('kategori.index', $data);
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'id_kategori' => 'required',
            'kategori_barang' => 'required|max:150',
        ]);

        Kategori::create($validated);

        if($request->save == true) {
            return redirect()->route('kategori');
        } else {
            return redirect()->route('kategori.create');
        }
    }

    public function edit(string $id_kategori){
        $data['kategoris'] = Kategori::find($id_kategori);
        return view('kategori.edit', $data);
    }

    public function update(Request $request, string $id_kategori){
        $kategori = Kategori::find($id_kategori);

        $validated = $request->validate([
            'id_kategori' => 'required',
            'kategori_barang' => 'required|max:150',
        ]);
        
        Kategori::where('id_kategori', $id_kategori)->update($validated);

        return redirect()->route('kategori');
    }
}
