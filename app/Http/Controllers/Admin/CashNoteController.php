<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CashBook;
use App\Models\CashNote;
use App\Models\ProductHistory;
use App\Models\ProductType;

class CashNoteController extends Controller
{
    public function index($umkm)
    {
        $umkm = ProductType::find($umkm);
        return view('pages.cash-note.index', ['cashNote' => CashNote::class, 'umkm' => $umkm]);
    }

    public function create($umkm)
    {
        $cashNote = CashNote::whereProductTypeId($umkm)->orderByDesc('id')->first();
        $cashbook = CashBook::whereProductTypeId($umkm)->where('id', '>', $cashNote->cash_book_id)->get();
        $cashbookId = CashBook::create([
            'income' => 0,
            'outcome' => 0,
            'code_cash_book_id' => 1,
            'note' => "Kas Awal",
            'product_type_id' => $umkm
        ]);
        $data = [
            'cash_book_id' => $cashbookId->id,
            'balance' => $cashNote->balance + $cashbook->sum('income') - $cashbook->sum('outcome'),
            'product_type_id' => $umkm
        ];
        $cn=CashNote::create($data);
        foreach (ProductType::find($umkm)->products as $product){
            ProductHistory::create([
                'product_id'=>$product->id,
                'cash_note_id'=>$cn->id,
                'price'=>$product->price,
                'stock'=>$product->stock
            ]);
        }

//        protected $fillable = ['product_id', 'cash_note_id', 'price', 'stock', 'created_at', 'updated_at'];
        return redirect()->back();
    }

    public function show($umkm, $id)
    {
        $umkm = ProductType::find($umkm);
        $c1 = CashNote::find($id);
        $c = CashNote::whereProductTypeId($umkm->id)->where('id', '<', $id)->orderByDesc('id')->first();
        $cashBooks = CashBook::whereProductTypeId($umkm->id)
            ->where('id', '<=', $c1->cash_book_id)
            ->where('id', '>=', $c->cash_book_id)->get();
        return view('pages.cash-note.show', compact('cashBooks', 'c', 'umkm'));
    }

    public function edit($umkm, $id)
    {

    }
}
