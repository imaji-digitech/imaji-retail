<?php

namespace App\Http\Livewire;


use App\Models\Finance;
use App\Models\ProductType;
use App\Models\UserLog;
use Livewire\Component;

class FormFinance extends Component
{
    public $action;
    public $type;
    public $data;
    public $dataId;
    public $optionProductType;
    public function mount(){
        $this->optionProductType=eloquent_to_options(ProductType::get(),'id','title');
        $this->data=[
            'product_type_id'=>1,
            'status_rab_id'=>5,
            'status_spj_id'=>5,
            'title'=>'',
            'user_id'=>auth()->id(),
            'rab_note'=>'',
            'rab_revision_note'=>'',
            'spj_note'=>'',
            'spj_revision_note'=>'',
        ];
        if ($this->dataId!=null){
            $data=Finance::find($this->dataId);
            $this->data=[
                'product_type_id'=>$data->product_type_id,
                'status_rab_id'=>$data->status_rab_id,
                'status_spj_id'=>$data->status_spj_id,
                'title'=>$data->title,
                'rab_note'=>$data->rab_note,
                'rab_revision_note'=>$data->rab_revision_note,
                'spj_note'=>$data->spj_note,
                'spj_revision_note'=>$data->spj_revision_note,
            ];
        }
    }
    public function getRules()
    {
        return[
            'data.title'=>'required'
        ];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Finance::create($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan data customer',
        ]);
        UserLog::create([
            'user_id'=>auth()->id(),
            'note'=>"membuat data rab ".$this->data['title'],
        ]);
        $this->emit('redirect', route('admin.customer.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Finance::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan data customer',
        ]);
        UserLog::create([
            'user_id'=>auth()->id(),
            'note'=>"merubah data rab ".$this->data['title'],
        ]);
        $this->emit('redirect', route('admin.customer.index'));
    }
    public function render()
    {
        if ($this->type=="rab") {
            return view('livewire.form-finance-rab');
        }
    }
}
