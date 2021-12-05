<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use Livewire\Component;

class FinanceComparison extends Component
{
    public $finance;
//    public $dataSpj;
//    public $dataRab;
    public $spj;
    public $rab;
    public $dataId;

    public function mount()
    {
        $this->finance = Finance::find($this->dataId);
        $this->rab = 0;
        $this->spj = 0;
        foreach ($this->finance->financeItems as $fi) {
            $this->rab += $fi->price * $fi->amount;
        }
        foreach ($this->finance->financeNotes as $fn) {
            foreach ($fn->financeNoteItems as $fni) {
                $this->spj += $fni->price * $fni->amount;
            }
        }
//        $this->dataRab = $this->finance->financeItems;
//        $this->dataSpj = Finance::leftJoin('financeNotes', function ($join) {
//            $join->on('finances.id', '=', 'finance_notes.finance_id');
//        })->where();

    }

    public function render()
    {
        return view('livewire.finance-comparison');
    }
}
