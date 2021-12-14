<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;


class UmkmTransactionController extends Controller
{
    public function active()
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.active', ['transaction' => Transaction::class,'umkm'=>$umkm]);
    }

    public function history()
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.history', ['transaction' => Transaction::class, 'umkm'=>$umkm]);
    }

    public function payment($id)
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.payment', compact('id','umkm'));
    }

    public function create()
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.create', compact('umkm'));
    }

    public function edit($id)
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.show', compact('id','umkm'));
    }

    public function show($id)
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.show', compact('id','umkm'));
    }

    public function return($id)
    {
        $umkm = auth()->user()->product_type_id;
        return view('pages.transaction.return', compact('id','umkm'));
    }
}
