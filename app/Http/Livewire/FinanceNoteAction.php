<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use Livewire\Component;

class FinanceNoteAction extends Component
{
    public $dataId;
    public $finance;
    public $note;
    public function mount(){
        $this->finance=Finance::find($this->dataId);
    }
    public function render()
    {
        return view('livewire.finance-note-action');
    }
    public function accepted(){
        Finance::find($this->dataId)->update([
            'status_spj_id'=>2,
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mensetujui spj',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
    public function submit(){
        Finance::find($this->dataId)->update([
            'status_spj_id'=>1,
            'spj_note'=>$this->note
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengajukan spj',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
    public function decline(){
        Finance::find($this->dataId)->update([
            'status_spj_id'=>3,
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengajukan spj',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
    public function revision(){
        Finance::find($this->dataId)->update([
            'status_spj_id'=>2,
            'spj_revision_note'=>$this->note,
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengajukan spj',
        ]);
        $this->emit('redirect',route('admin.finance.index',$this->finance->product_type_id));
    }
}
