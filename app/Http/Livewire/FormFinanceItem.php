<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\FinanceItem;
use App\Models\FinanceUnit;
use Livewire\Component;

class FormFinanceItem extends Component
{
    public $financeId;
    public $finance;
    public $financeItem;
    public $optionUnit;
    public $note;
    public function mount(){
        $this->finance=Finance::find($this->financeId);
//        $this->note=$this->finance->rab_note;
        $this->financeItem=[
            'finance_id' => $this->financeId,
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
        FinanceItem::create($this->financeItem);
        $this->financeItem=[
            'finance_id' => $this->financeId,
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
        FinanceItem::find($id)->delete();
    }
    public function submit(){
        Finance::find($this->financeId)->update([
            'status_rab_id'=>1,
            'rab_note'=>$this->note
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengajukan rab',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
//FinanceStatus::create(['title'=>'Waiting']);
//FinanceStatus::create(['title'=>'Accepted']);
//FinanceStatus::create(['title'=>'Decline']);
//FinanceStatus::create(['title'=>'Revision']);
//FinanceStatus::create(['title'=>'Nothing']);
    public function accepted(){
        Finance::find($this->financeId)->update([
            'status_rab_id'=>2,
        ]);

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mensetujui rab',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
    public function decline(){
        Finance::find($this->financeId)->update([
            'status_rab_id'=>3,
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengajukan rab',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
    public function revision(){
        Finance::find($this->financeId)->update([
            'status_rab_id'=>2,
            'rab_revision_note'=>$this->note,
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengajukan rab',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }


    public function render()
    {
        $finances=FinanceItem::whereFinanceId($this->financeId)->orderBy('title')->get();
        $total=0;
        foreach ($finances as $f){
            $total+=($f->price*$f->amount);
        }
        return view('livewire.form-finance-item',compact('finances'));
    }
}
