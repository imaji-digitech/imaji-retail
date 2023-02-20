<?php

namespace App\Http\Livewire\Journal;

use App\Models\Journal;
use App\Models\JournalCode;
use App\Models\JournalTransaction;
use App\Models\JournalTransactionType;
use Carbon\Carbon;
use Livewire\Component;

class FormJournalTransaction extends Component {
    public $input = 2;
    public $date;
    public $data;
    public $umkm;
    public $action;
    public $dataId;
    public $optionJournalCode;
    public $optionType;
    public $type;


    public function mount()
    {
        $this->date = Carbon::now();
        $this->optionType=[];
        foreach (JournalTransactionType::get() as $transactionType){
            $this->optionType[]=['value' => $transactionType->id, 'title' => "$transactionType->title ($transactionType->code)"];
        }
        $this->optionJournalCode = [];
        foreach (JournalCode::whereProductTypeId($this->umkm)->orderBy('code')->get() as $subCode) {
            $this->optionJournalCode[] = [
                'value' => $subCode->id,
                'title' => $subCode->code . ' - ' . $subCode->title,
            ];
        }
        if ($this->dataId != null) {
            $jt = JournalTransaction::find($this->dataId);
            $this->data = [];
            foreach ($jt->journals as $j) {
                $this->data[] = [
                    'code' => $j['journal_code_id'],
                    'credit'          => $j['credit'],
                    'debit'           => $j['debit'],
                    'note'            => $j['note'],
                ];
            }
            $this->input=$jt->journals->count();
        }
    }

    public function update()
    {
//        $count = JournalTransaction::whereProductTypeId($this->umkm)->count();
        $transaction = JournalTransaction::find($this->dataId)->update([
            'transaction_date' => $this->date,
            'journal_transaction_type_id'=>$this->type,
        ]);
        Journal::where('journal_transaction_id', $this->dataId)->delete();
        for ($i = 0; $i < $this->input; $i++) {
            if (isset($this->data[$i]['code'])) {
                if ($this->data[$i]['code'] != null) {
                    Journal::create([
                        'journal_code_id'        => $this->data[$i]['code'],
                        'journal_transaction_id' => $this->dataId,
                        'credit'                 => $this->data[$i]['credit'] ?? 0,
                        'debit'                  => $this->data[$i]['debit'] ?? 0,
                        'note'                   => $this->data[$i]['note'] ?? '',
                    ]);
                }
            }
        }

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon'    => 'success',
        ]);
        $this->emit('redirect', route('admin.journal.index', $this->umkm));

    }

    public function create()
    {
        $count = JournalTransaction::whereProductTypeId($this->umkm)->count();
        $transaction = JournalTransaction::create([
            'product_type_id'  => $this->umkm,
            'transaction_date' => $this->date,
            'title'            => 'Transaksi - ' . ($count + 1),
            'description'      => '',
            'journal_transaction_type_id'=>$this->type,
        ]);

        for ($i = 0; $i < $this->input; $i++) {
            if (isset($this->data[$i]['code'])) {
                if ($this->data[$i]['code'] != null) {
                    Journal::create([
                        'journal_code_id'        => $this->data[$i]['code'],
                        'journal_transaction_id' => JournalTransaction::whereTitle($transaction->title)->whereProductTypeId($this->umkm)->first()->id,
                        'credit'                 => $this->data[$i]['credit'] ?? 0,
                        'debit'                  => $this->data[$i]['debit'] ?? 0,
                        'note'                   => $this->data[$i]['note'] ?? '',
                    ]);
                }
            }
        }

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon'    => 'success',
        ]);
        $this->emit('redirect', route('admin.journal.index', $this->umkm));

    }

    public function render()
    {
        return view('livewire.journal.form-journal-transaction');
    }
}
