<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::all();
        return response()->json($makanans);
    }

    public function store(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'required'
        ]);

        $makanan = new Makanan();

        // Input teks
        $makanan->nama = $request->input('nama');
        $makanan->harga = $request->input('harga');

        // Unggah gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $allowedFileExtensions = ['jpg', 'png'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtensions);

            if ($check) {
                $name = time() . $file->getClientOriginalName();
                $file->move('assets/images', $name);
                $makanan->gambar = url('assets/images/' . $name);
            }
        }

        $makanan->save();

        return response()->json($makanan);
    }

    public function show($id)
    {
        $makanan = Makanan::where('id', $id)->get();
        return response()->json($makanan);
    }

    public function update(Request $request, $id)
    {
        Makanan::where('id', $id)->update($request->all());
        return response()->json('Data Sudah di Update!');
    }

    public function destroy($id)
    {
        Makanan::where('id', $id)->delete();
        return response()->json('Data berhasil dihapus!');
    }
}
