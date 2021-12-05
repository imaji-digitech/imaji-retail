<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\FinanceNote;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function comparison($id){
        return view('pages.finance.comparison',compact('id'));
    }
    public function index()
    {
        return view('pages.finance.index',[
            'finance'=>Finance::class
        ]);
    }

    public function create()
    {
        return view('pages.finance.create');
    }

    public function show($id)
    {
        return view('pages.finance.show',compact('id'));
    }

    public function edit($id)
    {

    }
    public function note($id)
    {
        $financeNote=FinanceNote::class;
        return view('pages.finance.note-index',compact('id','financeNote'));
    }
    public function noteCreate($id)
    {
        return view('pages.finance.note-create',compact('id'));
    }

    public function noteShow($id)
    {
        return view('pages.finance.note-show',compact('id'));
    }
    public function noteSubmit($id)
    {
        Finance::find($id)->update(['status_spj_id'=>1]);
        return redirect(route('admin.finance.index'));
    }
}
