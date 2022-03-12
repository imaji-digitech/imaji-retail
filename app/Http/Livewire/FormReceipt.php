<?php

namespace App\Http\Livewire;

use App\Models\CashBook;
use App\Models\CashNote;
use App\Models\ProductType;
use App\Models\Receipt;
use App\Models\User;
use App\Models\UserLog;
use Carbon\Carbon;
use Livewire\Component;

class FormReceipt extends Component
{
    public $data;
    public $dataId;
    public $action;
    public $optionUser;
    public $optionType;
    public $umkm;

    public function mount()
    {
        $this->data = [
            'title' => '',
            'finance_id' => 26,
            'recipient_id' => 1,
            'product_type_id'=>$this->umkm,
            'regarding'=>'',
            'note'=>'',
            'nominal'=>0,
            'receipt_type'=>1,
            'no_receipt'=>'-',
            'created_at'=>Carbon::now()
        ];
        $this->optionType=[
            ['title'=>'Pemasukan','value'=>1],
            ['title'=>'Pengeluaran','value'=>2],
        ];
        $this->optionUser = eloquent_to_options(User::get(), 'id', 'name');
        if ($this->dataId != null) {
            $data = Receipt::find($this->dataId);
            $this->data = [
                'title' => $data->title,
                'finance_id' => $data->finance_id,
                'recipient_id' => $data->recipient_id,
                'product_type_id'=>$data->product_type_id,
                'regarding'=>$data->regarding,
                'note'=>$data->note,
                'nominal'=>$data->nominal,
                'receipt_type'=>$data->receipt_type,
                'no_receipt'=>$data->no_receipt,
                'created_at'=>$data->created_at
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $pt = Receipt::create($this->data);
        $pt=Receipt::getCode($pt->id);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        UserLog::create([
            'user_id' => auth()->id(),
            'note' => "membuat kwitansi baru " . $pt->no_receipt,
        ]);
        $this->emit('redirect', route('admin.receipt.index',$this->umkm));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $pt = Receipt::find($this->dataId)->update($this->data);
//        $pt=Receipt::getCode($pt->id);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        UserLog::create([
            'user_id' => auth()->id(),
            'note' => "mengubah kwitansi " . $pt['no_receipt'],
        ]);
        $this->emit('redirect', route('admin.receipt.index',$this->umkm));
    }

    public function render()
    {
        return view('livewire.form-receipt');
    }

    protected function rules()
    {
        return [
            'data.title' => 'required|max:255',
        ];
    }
}
