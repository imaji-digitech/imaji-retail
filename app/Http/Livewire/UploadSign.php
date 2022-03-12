<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadSign extends Component
{
    use WithFileUploads;
    public $sign;
    public $user;
    protected function getRules()
    {
        return[
            'sign' => ['required', 'image', 'max:1024'],
        ];
    }

    public function mount(){
        $this->user=auth()->user();
    }
    public function render()
    {
        return view('livewire.upload-sign');
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        $sign = md5(rand()).'.'.$this->sign->getClientOriginalExtension();
        $this->sign->storeAs('public/sign/', $sign);
        $this->user->update(['sign'=>$sign]);
    }
}
