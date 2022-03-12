<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-select :options="$optionUser" :selected="$data['recipient_id']" title="PIC"
                  model="data.recipient_id"/>
        <x-select :options="$optionType" :selected="$data['receipt_type']" title="Jenis Kwitansi"
                  model="data.receipt_type"/>
        <x-input type="text" model="data.title" title="Status Dana"/>
        <x-summernote title="Perihal Dana" model="data.regarding"/>
        <x-input type="number" model="data.nominal" title="Nominal"/>
        <x-summernote title="Catatan" model="data.note"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
