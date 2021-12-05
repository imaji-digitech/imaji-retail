<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul pengajuan" model="data.title"/>
        <x-textarea title="Catatan" model="data.note_rab"/>
        <x-select :options="$optionProductType" :selected="$data['product_type_id']" title="Usaha" model="data.product_type_id"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
