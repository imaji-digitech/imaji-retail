<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class UmkmAssetController extends Controller
{
    public function index(){
        $umkm = auth()->user()->product_type_id;
        return view('pages.asset.index',['asset'=>Asset::class,'umkm'=>$umkm]);
    }
    public function create(){
        $umkm = auth()->user()->product_type_id;
        return view('pages.asset.create',compact('umkm'));
    }
    public function edit($id){
        $umkm = auth()->user()->product_type_id;
        return view('pages.asset.edit',compact('id','umkm'));
    }
}
