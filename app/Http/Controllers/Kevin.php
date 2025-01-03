<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Kevin extends Controller
{
    public function index()
    {
        $produks = Produk::paginate(5);
        return view('index', compact('produks'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image'
        ]);

        $path = $request->file('gambar') ? $request->file('gambar')->store('public/images') : null;

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $path ? str_replace('public/', '', $path) : null
        ]);

        return redirect()->route('produk.index');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image'
        ]);

        $produk = Produk::find($id);

        if ($request->file('gambar')) {
            $path = $request->file('gambar')->store('public/images');
            $produk->gambar = str_replace('public/', '', $path);
        }

        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();

        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->gambar) {
            Storage::delete($produk->gambar);
        }
        $produk->delete();

        return redirect()->route('produk.index');
    }
}