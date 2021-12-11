<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index($umkm)
    {
        return view('pages.asset.index', ['asset' => Asset::class, 'umkm' => $umkm]);
    }

    public function create($umkm)
    {
        return view('pages.asset.create', compact('umkm'));
    }

    public function edit($umkm, $id)
    {
        return view('pages.asset.edit', compact('id', 'umkm'));
    }
}
