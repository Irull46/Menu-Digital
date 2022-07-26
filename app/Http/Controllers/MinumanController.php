<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;

class MinumanController extends Controller
{
    public function index()
    {
        $minumans = Minuman::all();
        return response()->json($minumans);
    }

    public function store(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'required'
        ]);

        $minuman = new Minuman();

        // Input teks
        $minuman->nama = $request->input('nama');
        $minuman->harga = $request->input('harga');

        // Unggah gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $allowedFileExtensions = ['jpg', 'png'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtensions);

            if ($check) {
                $name = time() . $file->getClientOriginalName();
                $file->move('assets/images', $name);
                $minuman->gambar = url('assets/images/' . $name);
            }
        }

        $minuman->save();

        return response()->json($minuman);
    }

    public function show($id)
    {
        $minuman = Minuman::where('id', $id)->get();
        return response()->json($minuman);
    }

    public function update(Request $request, $id)
    {
        Minuman::where('id', $id)->update($request->all());
        return response()->json('Data Sudah di Update!');
    }

    public function destroy($id)
    {
        Minuman::where('id', $id)->delete();
        return response()->json('Data berhasil dihapus!');
    }
}
