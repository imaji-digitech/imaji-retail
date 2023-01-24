<div>
    <div id="form-create" class="card">
        <div class="card-body">

            <form wire:submit.prevent="{{ $action }}">
                <div class=" row">
                    <div class="form-group col-md-3">
                        <label for="">Jumlah input jurnal</label>
                        <input type="number" class="form-control" wire:model="input">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Tanggal transaksi</label>
                        <input type="date" class="form-control" wire:model="date">
                    </div>
                </div>
                @for($i=0;$i<$input;$i++)
                    <hr>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">Kode akuntan</label>
                            <select name="" id="" class="form-control" wire:model="data.{{$i}}.code">
                                <option value=""></option>
                                @foreach($optionJournalCode as $code)
                                    <option value="{{ $code['value'] }}">{{ $code['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Debit</label>
                            <input type="text" class="form-control" wire:model="data.{{$i}}.debit">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Kredit</label>
                            <input type="text" class="form-control" wire:model="data.{{$i}}.credit">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Catatan</label>
                            <input type="text" class="form-control" wire:model="data.{{$i}}.note">
                        </div>
                        {{--            'journal_code_id', 'journal_transaction_id', 'credit', 'debit', 'note',--}}
                    </div>
                @endfor
                <hr>
                <br>
                <input type="submit" class="btn btn-primary col-md-12">
            </form>
        </div>
    </div>
</div>
