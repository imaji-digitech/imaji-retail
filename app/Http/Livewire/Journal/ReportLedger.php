<?php

namespace App\Http\Livewire\Journal;

use App\Models\JournalCode;
use App\Models\ProductType;
use Carbon\Carbon;
use Livewire\Component;

class ReportLedger extends Component {
    public $umkm;
    public $rangeDate;
    public $optionFilter;
    public $filter;
    public $journals;
    public $range;

    public function check(){
        if ($this->filter!=null){
            $this->rangeDate=$this->filter;
        }
        $this->range=explode(' - ',$this->rangeDate);

    }

    public function mount()
    {
        $this->journals = JournalCode::whereProductTypeId($this->umkm)->get();
        $this->range= explode(' - ',Carbon::now()->format('Y-m-d').' - '.Carbon::now()->format('Y-m-d'));
        $this->rangeDate=Carbon::now()->format('Y-m-d').' - '.Carbon::now()->format('Y-m-d');
        $this->optionFilter=[
            ['value'=>'','title'=>''],
            ['value'=>Carbon::now()->format('Y-m-d').' - '.Carbon::now()->format('Y-m-d'),'title'=>'Hari ini'],
            ['value'=>Carbon::now()->firstOfMonth()->format('Y-m-d').' - '.Carbon::now()->lastOfMonth()->format('Y-m-d'),'title'=>'Bulan ini'],
            ['value'=>Carbon::now()->firstOfQuarter()->format('Y-m-d').' - '.Carbon::now()->lastOfQuarter()->format('Y-m-d'),'title'=>'Quartal ini'],
            ['value'=>Carbon::now()->firstOfYear()->format('Y-m-d').' - '.Carbon::now()->lastOfYear()->format('Y-m-d'),'title'=>'Tahun ini'],
        ];


    }

    public function render()
    {
        return view('livewire.journal.report-ledger');
    }
}
