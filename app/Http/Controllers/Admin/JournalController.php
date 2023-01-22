<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JournalCode;
use App\Models\JournalTransaction;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index($umkm){
        $journalCode=JournalCode::class;
        $journalTransaction=JournalTransaction::class;
        return view('pages.journal.index',compact('umkm','journalCode','journalTransaction'));
    }
    public function createCode($umkm){
        return view('pages.journal.create-code',compact('umkm'));
    }
    public function createTransaction($umkm){
        return view('pages.journal.create-transaction',compact('umkm'));
    }
}
