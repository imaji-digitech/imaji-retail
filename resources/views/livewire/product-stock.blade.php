<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="update">
        Nama produk : {{$product->title}}
        <br>
        Keadaan saat ini : {{$product->stock}}
        <x-input title="Jumlah perubahan" model="data.amount" type="number"/>
        <x-textarea title="Keterangan" model="data.note"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
