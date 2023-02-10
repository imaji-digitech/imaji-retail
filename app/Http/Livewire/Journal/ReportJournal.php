<?php

namespace App\Http\Livewire\Journal;

use App\Models\JournalCode;
use App\Models\JournalTransaction;
use App\Models\JournalTransactionType;
use Carbon\Carbon;
use Livewire\Component;

class ReportJournal extends Component {

    public $type;
    public $journalTransaction;
    public $umkm;
    public $rangeDate;
    public $optionFilter;
    public $filter;
    public $range;

    public function mount()
    {
        $this->type = JournalTransactionType::whereCode($this->type)->first();
        $this->range = explode(' - ', Carbon::now()->format('Y-m-d') . ' - ' . Carbon::now()->format('Y-m-d'));
        $this->rangeDate = Carbon::now()->format('Y-m-d') . ' - ' . Carbon::now()->format('Y-m-d');
        $this->optionFilter = [
            ['value' => '', 'title' => ''],

            ['value' => Carbon::now()->format('Y-m-d') . ' - ' . Carbon::now()->format('Y-m-d'), 'title' => 'Hari ini'],

            ['value' => Carbon::now()->firstOfMonth()->format('Y-m-d') . ' - ' . Carbon::now()->lastOfMonth()->format('Y-m-d'), 'title' => 'Bulan ini'],

            ['value' => Carbon::now()->firstOfQuarter()->format('Y-m-d') . ' - ' . Carbon::now()->lastOfQuarter()->format('Y-m-d'), 'title' => 'Quartal ini'],

            ['value' => Carbon::now()->firstOfYear()->format('Y-m-d') . ' - ' . Carbon::now()->lastOfYear()->format('Y-m-d'), 'title' => 'Tahun ini'],
        ];

        $this->journalTransaction = JournalTransaction::whereProductTypeId($this->umkm)->where('journal_transaction_type_id', $this->type->id)->whereBetween('transaction_date', [date($this->range[0]), date($this->range[1])])->get();
//        dd($this->journalTransaction);
//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadView('livewire.journal.pdf.recap-journal',compact('journalTransaction','start','end','type'));
    }

    public function check()
    {
        if ($this->filter != null) {
            $this->rangeDate = $this->filter;
        }
        $this->range = explode(' - ', $this->rangeDate);
        $this->journalTransaction = JournalTransaction::whereProductTypeId($this->umkm)->where('journal_transaction_type_id', $this->type->id)->whereBetween('transaction_date', [date($this->range[0]), date($this->range[1])])->orderBy('transaction_date')->get();
    }

    public function download()
    {
        $this->emit('swal:alert', [
            'icon' => 'success', 'title' => 'Melakukan download',
        ]);
        $this->emit('redirect-new-tab', route('admin.journal.report-journal.download', [$this->umkm, $this->type->code, $this->range[0], $this->range[1]]));
    }

    public function render()
    {
        return view('livewire.journal.report-journal');
    }
}
