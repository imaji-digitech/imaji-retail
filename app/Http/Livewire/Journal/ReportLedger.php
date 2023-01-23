<?php

namespace App\Http\Livewire\Journal;

use App\Models\JournalCode;
use App\Models\ProductType;
use Livewire\Component;

class ReportLedger extends Component {
    public $umkm;
    public $journals;

    public function mount()
    {
//        dd(um);
//        $this->umkm = ProductType::find($this->umkm);
        $this->journals = JournalCode::whereProductTypeId($this->umkm)->get();



//        foreach($this->journals as $journalCode){
//            $j=\App\Models\Journal::whereJournalCodeId($journalCode->journal_code_id)->get();
//            dd($j);
//            if ($j==null){
//                dd($j);
//            }
//        }

//        dd(\App\Models\JournalTransaction::whereHas('journals',function ($q) use ($j){
//            $q->whereIn('id',$j->pluck('id'));
//        })->get());
//        dd($this->journals);
    }

    public function render()
    {
        return view('livewire.journal.report-ledger');
    }
}
