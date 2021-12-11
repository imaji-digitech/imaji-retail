<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function active($umkm)
    {
        return view('pages.transaction.active', ['transaction' => Transaction::class,'umkm'=>$umkm]);
    }

    public function history($umkm)
    {
        return view('pages.transaction.history', ['transaction' => Transaction::class,'umkm'=>$umkm]);
    }

    public function payment($umkm,$id)
    {
        return view('pages.transaction.payment', compact('id','umkm'));
    }
    public function paymentCash($umkm,$id)
    {
        return view('pages.transaction.payment-cash', compact('id','umkm'));
    }

    public function create($umkm)
    {
        return view('pages.transaction.create',compact('umkm'));
    }

    public function edit($umkm,$id)
    {
        return view('pages.transaction.show', compact('id','umkm'));
    }

    public function show($umkm,$id)
    {
        return view('pages.transaction.show', compact('id','umkm'));
    }

    public function return($umkm,$id)
    {
        return view('pages.transaction.return', compact('id','umkm'));
    }
}
