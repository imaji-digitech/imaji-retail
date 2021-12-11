<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index($umkm)
    {
        return view('pages.product.index',['product'=>Product::class,'umkm'=>$umkm]);
    }
    public function create($umkm)
    {
        return view('pages.product.create',compact('umkm'));
    }

    public function edit($umkm,$id)
    {
        return view('pages.product.edit',compact('umkm','id'));
    }
    public function show($umkm,$id)
    {
        return view('pages.product.show',compact('umkm','id'));
    }
    public function manufacture($umkm,$id){
        $product=Product::findOrFail($id);
        return view('pages.product.manufacture',compact('product','umkm'));
    }
    public function graph(Request $request){
        $validated = $request->validate([
            'productId'=>'required'
        ]);

        $data=$request->productId;
        return view('pages.product.graph',compact('data'));
    }

    public function stock($umkm,$id){
        return view('pages.product.stock',compact('umkm','id'));
    }
    public function history($umkm,$id){
        $p=Product::findOrFail($id);
        return view('pages.product.history',['product'=>UserLog::class,'dataId'=>$id,'p'=>$p,'umkm'=>$umkm]);
    }
}
