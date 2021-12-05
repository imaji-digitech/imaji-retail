<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\FinanceItem;
use App\Models\FinanceNote;
use App\Models\FinanceNoteItem;
use App\Models\FinanceUnit;
use Livewire\Component;

class FormFinanceNoteItem extends Component
{
    public $financeId;
    public $financeNote;
    public $financeItem;
    public $optionUnit;
    public $note;
    public function mount(){
        $this->financeNote=FinanceNote::find($this->financeId);

        $this->financeItem=[
            'finance_note_id' => $this->financeId,
            'finance_unit_id'=>1,
            'title'=>'',
            'amount'=>0,
            'price'=>0,
        ];
        $this->optionUnit=eloquent_to_options(FinanceUnit::get(),'id','title');
    }
    protected function getRules()
    {
        return[
            'financeItem.finance_unit_id'=>'required|numeric',
            'financeItem.title'=>'required|max:255',
            'financeItem.amount'=>'required|numeric',
            'financeItem.price'=>'required|numeric',
        ];
    }

    public function create(){
        $this->validate();
        FinanceNoteItem::create($this->financeItem);
        $this->financeItem=[
            'finance_note_id' => $this->financeId,
            'finance_unit_id'=>1,
            'title'=>'',
            'amount'=>0,
            'price'=>0,
        ];
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan data item rab',
        ]);
    }
    public function delete($id){
        FinanceNoteItem::find($id)->delete();
    }

    public function render()
    {
        $finances=FinanceNoteItem::whereFinanceNoteId($this->financeId)->orderBy('title')->get();
        $total=0;
        foreach ($finances as $f){
            $total+=($f->price*$f->amount);
        }
        return view('livewire.form-finance-note-item',compact('finances'));
    }
}
