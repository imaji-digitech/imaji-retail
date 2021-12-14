<div class="bg-white p-3">
    <textarea class="form-control" id="" rows="3" wire:model="note"></textarea>
    <br>
    @if($finance->user_id==auth()->id())
        <button class="btn btn-primary mr-2" wire:click="submit()">
            Ajukan SPJ
        </button>
    @endif
    @if(auth()->user()->role==1)
        <button class="btn btn-success mr-2" wire:click="accepted()">
            Setujui SPJ
        </button>
        <button class="btn btn-danger mr-2" wire:click="decline()">
            Batalkan SPJ
        </button>
        <button class="btn btn-warning mr-2" wire:click="decline()">
            Ajukan revisi SPJ
        </button>
    @endif
    <br>
    @if($finance->spj_note!=null)
        <br>
        <h3>Catatan pengaju :</h3>
        {{ $finance->spj_note }}
    @endif
    @if($finance->spj_revision_note!=null)
        <br>
        <h3>Catatan revisi :</h3>
        {{ $finance->spj_revision_note }}
    @endif
</div>
