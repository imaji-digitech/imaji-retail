<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\UserLog;
use Livewire\Component;

class ProductStock extends Component
{
    public $product;
    public $data;
    public $dataId;

    public function update(){
        UserLog::create([
            'user_id'=>auth()->id(),
            'product_id'=>$this->dataId,
            'note'=>"perubahan stock sejumlah ". $this->data['amount'],
            'user_note'=>$this->data['note']
        ]);
        $this->product->update([
            'stock'=>$this->product->stock+$this->data['amount']
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil memperbarui stock',
        ]);

        $this->emit('redirect', route('admin.product.index'));
    }


    public function mount()
    {
        $this->data=['note'=>'','amount'=>0];
        $this->product = Product::find($this->dataId);
    }

    public function render()
    {
        return view('livewire.product-stock');
    }
}
