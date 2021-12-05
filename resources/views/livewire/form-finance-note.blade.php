<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="create">
        <x-input type="file" title="Upload nota" model="thumbnail" accept="image/*"/>
        <div wire:loading wire:target="thumbnail">
            Proses upload
        </div>
        @if($thumbnail)
            <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
        @endif
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
