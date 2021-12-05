<div>
    <x-data-table :data="$data" :model="$finances">
        <x-slot name="head">
            <tr>
                <th>Nota</th>
                <th>List barang</th>
                <th>Total Uang</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($finances as $finance)
                <tr x-data="window.__controller.dataTableController({{ $finance->id }})">
                    <td style="max-width: 200px !important;">
                        <img src="{{asset('storage/'.$finance->note)}}" alt="" style="max-width: 200px !important;">
                    </td>
                    <td style="">
                        @foreach($finance->financeNoteItems as $fni)
                            {{$fni->title}} - Rp. {{number_format($fni->amount*$fni->price,0,',','.')}}<br>
                        @endforeach
                    </td>
                    <td style=""></td>
                    <td style="">
                        <a role="button" x-on:click.prevent="deleteItem" href="#" class="btn btn-danger">
                            Hapus
                        </a>
                        <a role="button" href="{{route('admin.finance.note.show',$finance->id)}}" class="mr-1 btn btn-dark">
                            Tambah item
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>

</div>
