<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ReceiptController extends Controller
{
    public function index($umkm)
    {
        $receipt=Receipt::class;
        return view('pages.receipt.index',compact('receipt','umkm'));
    }
    public function create($umkm)
    {
        return view('pages.receipt.create',compact('umkm'));
    }

    public function edit($umkm,$id)
    {
        return view('pages.receipt.edit',compact('umkm','id'));
    }
    public function show($id)
    {
        $receipt = Receipt::find($id);
        $pdf = App::make('dompdf.wrapper');
        if ($receipt->receipt_type==1){
            $name="Kwitansi Pemasukan";
            $pdf->loadView('pdf.income', compact('receipt'))->setPaper([0, 0, 470.00, 603.80], 'landscape');
        }else{
            $name="Kwitansi Pengeluaran";
            $pdf->loadView('pdf.outcome', compact('receipt'))->setPaper([0, 0, 470.00, 603.80], 'landscape');
        }
        return $pdf->stream($name.' - ' . $receipt->no_receipt . '.pdf');
//        return view('pages.receipt.show',compact('id'));
    }
}
