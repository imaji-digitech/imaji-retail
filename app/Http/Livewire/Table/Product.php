<?php


namespace App\Http\Livewire\Table;


class Product extends Main
{
    public $checked;
    public $umkm;

    public function mount()
    {
        $this->umkm=$this->dataId;
        $this->checked = [];
    }

    public function graph()
    {

    }

    public function exportPDF($id)
    {

    }
}
