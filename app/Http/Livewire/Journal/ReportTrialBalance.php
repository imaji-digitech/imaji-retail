<?php

namespace App\Http\Livewire\Journal;

use Carbon\Carbon;
use Livewire\Component;

class ReportTrialBalance extends Component
{
    public $umkm;
    public $rangeDate;
    public $optionFilter;
    public $filter;
    public $range;
    public function mount(){
        $this->range = explode(' - ', Carbon::now()->format('Y-m-d') . ' - ' . Carbon::now()->format('Y-m-d'));
        $this->rangeDate = Carbon::now()->format('Y-m-d') . ' - ' . Carbon::now()->format('Y-m-d');
        $this->optionFilter = [
            ['value' => '', 'title' => ''],
            ['value' => Carbon::now()->format('Y-m-d') . ' - ' . Carbon::now()->format('Y-m-d'), 'title' => 'Hari ini'],
            ['value' => Carbon::now()->firstOfMonth()->format('Y-m-d') . ' - ' . Carbon::now()->lastOfMonth()->format('Y-m-d'), 'title' => 'Bulan ini'],
            ['value' => Carbon::now()->firstOfQuarter()->format('Y-m-d') . ' - ' . Carbon::now()->lastOfQuarter()->format('Y-m-d'), 'title' => 'Quartal ini'],
            ['value' => Carbon::now()->firstOfYear()->format('Y-m-d') . ' - ' . Carbon::now()->lastOfYear()->format('Y-m-d'), 'title' => 'Tahun ini'],
        ];
    }

    public function check()
    {
        if ($this->filter != null) {
            $this->rangeDate = $this->filter;
        }
        $this->range = explode(' - ', $this->rangeDate);
    }

    public function download()
    {
        $this->emit('swal:alert', [
            'icon' => 'success', 'title' => 'Melakukan download',
        ]);
        $this->emit('redirect-new-tab', route('admin.journal.report-trial-balance.download', [$this->umkm, $this->range[0], $this->range[1]]));
    }
    public function render()
    {
        return view('livewire.journal.report-trial-balance');
    }
}
