<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UmkmProductController extends Controller
{
    public function index()
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.index',['product'=>Product::class,'umkm'=>$umkm]);
    }
    public function create()
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.create',compact('umkm'));
    }

    public function edit($id)
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.edit',compact('id','umkm'));
    }
    public function show($id)
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.show',compact('id','umkm'));
    }
    public function manufacture($id){
        $product=Product::findOrFail($id);
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.manufacture',compact('product','umkm'));
    }
    public function graph(Request $request){
        $validated = $request->validate([
            'productId'=>'required'
        ]);

        $data=$request->productId;
        return view('pages.product.graph',compact('data'));
    }

    public function stock($id){
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.stock',compact('id','umkm'));
    }
    public function history($id){
        $p=Product::findOrFail($id);
        $umkm = auth()->user()->product_type_id;
        return view('pages.product.history',['product'=>UserLog::class,'dataId'=>$id,'p'=>$p,'umkm'=>$umkm]);
    }
}
