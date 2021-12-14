<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use App\Models\AssetCode;
use App\Models\AssetOwnership;
use App\Models\AssetState;
use App\Models\CashBook;
use App\Models\ProductType;
use App\Models\UserLog;
use Livewire\Component;

class FormAsset extends Component
{
    public $data;
    public $dataId;
    public $action;
    public $umkm;
//    public $optionProductType;
    public $optionState;
    public $optionCode;
    public $optionOwnership;

    public function mount()
    {
//        $this->optionProductType=eloquent_to_options(ProductType::get(),'id','title');
        $this->optionState=eloquent_to_options(AssetState::get(),'id','title');
        $this->optionCode=eloquent_to_options(AssetCode::get(),'id','title');
        $this->optionOwnership=eloquent_to_options(AssetOwnership::get(),'id','title');
        $this->data = [
            'product_type_id' => $this->umkm,
            'asset_state_id' => 1,
            'asset_code_id' => 1,
            'asset_ownership_id' => 1,
            'title' => '',
            'amount' => 0,
            'nominal' => 0
        ];
//        if (auth()->id()==22){
//            $this->data['product_type_id']=8;
//        }
        if ($this->dataId != null) {
            $data = Asset::find($this->dataId);
            $this->data = [
                'product_type_id' => 1,
                'asset_state_id' => $data->asset_state_id,
                'asset_code_id' => $data->asset_code_id,
                'asset_ownership_id' => $data->asset_ownership_id,
                'title' => $data->title,
                'amount' => $data->amount,
                'nominal' => $data->nominal
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $codeNow=Asset::whereProductTypeId($this->data['product_type_id'])
            ->whereAssetCodeId($this->data['asset_code_id'])
            ->orderBy('id','desc')
            ->first();
        if ($codeNow==null){
            $this->data['code']=AssetCode::find($this->data['asset_code_id'])->code."001";
        }else{
            $this->data['code']=str_pad((int)$codeNow->code+1, 7, '0', STR_PAD_LEFT);
        }
        Asset::create($this->data);
        $role='admin';
        if (auth()->user()->role==3){
            $role='umkm';
        }
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan data asset',
        ]);
        $this->emit('redirect', route("$role.asset.index",$this->umkm));
    }
    public function update()
    {
        $this->validate();
        Asset::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil merubah data asset',
        ]);
        $role='admin';
        if (auth()->user()->role==3){
            $role='umkm';
        }
        $this->emit('redirect', route("$role.asset.index",$this->umkm));
    }

    public function render()
    {
        return view('livewire.form-asset');
    }

    protected function getRules()
    {
        return [
            'data.product_type_id' => 'required',
            'data.asset_state_id' => 'required',
            'data.asset_code_id' => 'required',
            'data.asset_ownership_id' => 'required',
            'data.title' => 'required',
            'data.amount' => 'required',
            'data.nominal' => 'required'
        ];
    }
}
