<?php

namespace App\Http\Livewire;

use App\Models\CashBook;
use App\Models\CashNote;
use App\Models\CodeCashBook;
use App\Models\ProductType;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormCustomer extends Component
{
    public $action;
    public $dataId;
    public $data;

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function mount()
    {
        $this->data=[
            'name'=>'',
            'address'=>'',
            'no_phone'=>'',
            'password'=>Hash::make('secret123'),
            'email'=>$this->generateRandomString(8).rand(1,100).'@imajisociopreneur.id',
            'role'=>4
        ];
        if ($this->dataId!=null){
            $data=User::find($this->dataId);
            $this->data=[
                'name'=>$data->name,
                'address'=>$data->address,
                'no_phone'=>$data->no_phone,
                'email'=>$data->email,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();

        User::create($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan data customer',
        ]);
        UserLog::create([
            'user_id'=>auth()->id(),
            'note'=>"membuat data customer ".$this->data['name'],
        ]);
        $this->emit('redirect', route('admin.customer.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();

        User::find($this->dataId)->update($this->data);
        UserLog::create([
            'user_id'=>auth()->id(),
            'note'=>"mengubah data customer ".$this->data['name'],
        ]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengubah data customer',
        ]);
        $this->emit('redirect', route('admin.customer.index'));
    }

    public function render()
    {
        return view('livewire.form-customer');
    }

    protected function getRules()
    {
        return [
            'data.name' => 'required',
            'data.address' => 'required',
            'data.no_phone' => 'required',
        ];
    }
}
