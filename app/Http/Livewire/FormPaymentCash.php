<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\TransactionPaymentCash;
use App\Models\UserLog;
use Livewire\Component;

class FormPaymentCash extends Component
{
    public $dataId;
    public $data;
    public $transactionId;
    public $transaction;
    public $total;

    public function mount()
    {
        $this->transaction=Transaction::findOrFail($this->dataId);
        $this->total=$this->transaction->transactionPaymentCashes->sum('total');
        $this->data = [
            'transaction_id' => $this->transactionId,
            'total' => 0,
            'note' => '',
        ];
        if ($this->dataId != null) {
            $data = TransactionPaymentCash::findOrFail($this->dataId);
            $this->data = [
                'transaction_id' => $data->transaction_id,
                'total' => $data->total,
                'note' => $data->note,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        TransactionPaymentCash::create($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan pembayaran',
        ]);

        UserLog::create([
            'user_id'=>auth()->id(),
            'note'=>"melakukan pembayaran cash pada invoice ". $this->transaction->no_invoice,
        ]);
        $this->emit('redirect', route('admin.transaction.active'));
    }

    public function update()
    {
        $this->validate();
        TransactionPaymentCash::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan pembayaran',
        ]);

        UserLog::create([
            'user_id'=>auth()->id(),
            'note'=>"melakukan perubahan  pembayaran cash pada invoice ". $this->transaction->no_invoice,
        ]);
        $this->emit('redirect', route('admin.transaction.active'));
    }

    public function render()
    {
        return view('livewire.form-payment-cash');
    }

    protected function getRules()
    {
        return [
            'data.transaction_id' => 'required',
            'data.total' => 'required'
        ];
    }
}
