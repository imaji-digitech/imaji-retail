<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($finances as $f)
                                <tr>
                                    <td class="font-weight-600">{{$f->title}}</td>
                                    <td>{{$f->amount.$f->financeUnit->title}}</td>
                                    <td>Rp {{number_format($f->price,0,',','.')}}</td>
                                    <td>Rp {{number_format($f->amount*$f->price,0,',','.')}}</td>
                                    <td>
                                        <a href="#" wire:click="delete({{$f->id}})" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="m-3">
                            <label for="" class="form-label">Catatan RAB</label>
                            <textarea class="form-control" id="" rows="3" wire:model="note"></textarea>
                            <button class="btn btn-primary mt-2 mb-2 float-right" wire:click="submit()">
                                Ajukan RAB
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div id="form-create" class=" card p-4">
                <form wire:submit.prevent="create">
                    <x-input type="text" title="Nama Item" model="financeItem.title"/>
                    <x-input type="number" title="Jumlah Item " model="financeItem.amount"/>
{{--                    <x-select title="Satuan Item" model="financeItem.finance_unit_id" :options="$optionUnit" :selected="$financeItem['finance_unit_id']"/>--}}
                    <x-input type="number" title="Harga Item " model="financeItem.price"/>
                    <div class="form-group col-span-6 sm:col-span-5"></div>
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
