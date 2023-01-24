<?php

namespace App\Http\Livewire\Journal;

use App\Models\JournalCode;
use App\Models\JournalCodeAccount;
use Livewire\Component;

class FormJournalCode extends Component {
    public $optionSubCode;
    public $data;
    public $dataId;
    public $umkm;
    public $action;

    public function mount()
    {
        $this->data = [

            'product_type_id'=>$this->umkm,
            'journal_code_account_id' => 1,
            'title'                   => '',
            'code'                    => '',
            'description'             => '',
        ];
        $this->optionSubCode = [];
        foreach (JournalCodeAccount::get() as $subCode) {
            $this->optionSubCode[] = [
                'value' => $subCode->id,
                'title' => $subCode->code . ' - ' . $subCode->title,
            ];
        }
    }
    public function create(){
        $this->resetErrorBag();
        JournalCode::create($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan jurnal code',
        ]);
        $this->emit('redirect', route('admin.journal.create-code',$this->umkm));
    }

    public function render()
    {
        return view('livewire.journal.form-journal-code');
    }
}
