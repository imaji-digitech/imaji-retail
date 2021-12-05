<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use Livewire\Component;

class FinanceNoteList extends Component
{
    public $financeId;
    public $financeNotes;
    public function render()
    {
        $this->financeNotes=Finance::find($this->financeId);
        return view('livewire.finance-note-list');
    }
}
