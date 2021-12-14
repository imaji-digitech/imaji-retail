<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\FinanceNote;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function comparison($umkm, $id)
    {
        return view('pages.finance.comparison', compact('id', 'umkm'));
    }

    public function index($umkm)
    {
        return view('pages.finance.index', [
            'finance' => Finance::class,
            'umkm' => $umkm
        ]);
    }

    public function create($umkm)
    {
        return view('pages.finance.create', compact('umkm'));
    }

    public function show($umkm, $id)
    {
        return view('pages.finance.show', compact('id', 'umkm'));
    }

    public function edit($umkm, $id)
    {

    }

    public function note($umkm, $id)
    {
        $financeNote = FinanceNote::class;
        return view('pages.finance.note-index', compact('id', 'financeNote', 'umkm'));
    }

    public function noteCreate($id)
    {
        return view('pages.finance.note-create', compact('id'));
    }

    public function noteShow( $id)
    {
        return view('pages.finance.note-show', compact('id'));
    }

    public function noteSubmit($id)
    {
        $f = Finance::find($id);
        $f->update(['status_spj_id' => 1]);
        $umkm = $f->product_type_id;
        return redirect(route('admin.finance.index', compact('umkm')));
    }
}
