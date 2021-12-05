<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        @if(auth()->id()!=22)
            <x-select :options="$optionProductType" :selected="$data['product_type_id']" title="Usaha"
                      model="data.product_type_id"/>
        @endif
        <x-select :options="$optionState" :selected="$data['asset_state_id']" title="Kondisi"
                  model="data.asset_state_id"/>
        <x-select :options="$optionCode" :selected="$data['asset_code_id']" title="Kode" model="data.asset_code_id"/>
        <x-select :options="$optionOwnership" :selected="$data['asset_ownership_id']" title="Kode"
                  model="data.asset_ownership_id"/>
        <x-input type="text" model="data.title" title="Nama asset"/>
        <x-input type="number" model="data.amount" title="Jumlah asset"/>
        <x-input type="number" model="data.nominal" title="Nominal"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
