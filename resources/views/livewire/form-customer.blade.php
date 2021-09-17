<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-input title="Nama Customer" model="data.name" type="text"/>
        <x-input title="Alamat Customer" model="data.address" type="text"/>
        <x-input title="No HP Customer" model="data.no_phone" type="text"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
