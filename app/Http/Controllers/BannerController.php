<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = banner::all();
        return response()->json($banners);
    }

    public function store(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'nama' => 'required',
            'gambar' => 'required'
        ]);

        $banner = new Banner();

        // Input teks
        $banner->nama = $request->input('nama');

        // Unggah gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $allowedFileExtensions = ['jpg', 'png'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtensions);

            if ($check) {
                $name = time() . $file->getClientOriginalName();
                $file->move('assets/images', $name);
                $banner->gambar = url('assets/images/' . $name);
            }
        }

        $banner->save();

        return response()->json($banner);
    }

    public function show($id)
    {
        $banner = banner::where('id', $id)->get();
        return response()->json($banner);
    }

    public function update(Request $request, $id)
    {
        banner::where('id', $id)->update($request->all());
        return response()->json('Data Sudah di Update!');
    }

    public function destroy($id)
    {
        banner::where('id', $id)->delete();
        return response()->json('Banner berhasil dihapus!');
    }
}
