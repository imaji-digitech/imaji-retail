<?php

namespace App\Http\Livewire;


use App\Models\Receipt;
use Livewire\Component;

class SalaryAccept extends Component
{
    public $salaries;
    public function render()
    {
        $this->salaries=Receipt::whereRecipientId(auth()->id())->orderBy('created_at','desc')->get();
        return view('livewire.salary-accept');
    }
    public function agree($id){
        Receipt::find($id)->update([
            'status'=>2
        ]);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Berhasil menyetujui kwitansi hubungi bendahara untuk proses lebih lanjut',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }
}
