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
        //
    }

    public function show(banner $id)
    {
        $banner = banner::find($id);
        return response()->json($banner);
    }

    public function update(Request $request, banner $banner)
    {
        //
    }

    public function destroy(banner $id)
    {
        $banner = banner::find($id);
        $banner->delete();
        return response()->json('Banner berhasil dihapus!');
    }
}
