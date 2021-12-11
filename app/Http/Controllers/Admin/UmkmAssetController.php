<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class UmkmAssetController extends Controller
{
    public function index(){
        return view('pages.asset.index',['asset'=>Asset::class]);
    }
    public function create(){
        return view('pages.asset.create');
    }
    public function edit($id){
        return view('pages.asset.edit',compact('id'));
    }
}
