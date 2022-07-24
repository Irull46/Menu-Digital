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
        banner::create($request->all());
        return response()->json($request);
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
