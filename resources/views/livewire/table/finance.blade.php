<div>
    <x-data-table :data="$data" :model="$finances">
        <x-slot name="head">
            <tr>
                <th style="width: 120px !important;">
                    Tanggal
                </th>
                <th style="width: 120px !important;">
                    Nama
                </th>
                <th style="width: 120px !important;">
                    Pengajuan
                </th>
                <th style="width: 120px !important;">
                    Status RAB
                </th>
                <th style="width: 120px !important;">
                    Status SPJ
                </th>
                <th style="width: 170px !important;">
                    Uang RAB
                </th>
                <th style="width: 170px !important;">
                    Uang SPJ
                </th>
                <th style="width: 550px !important;">
                    Aksi
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($finances as $finance)
                <tr x-data="window.__controller.dataTableController({{ $finance->id }})">
                    <td style="height: 10px !important;">{{ $finance->created_at->format('H:m d/M/Y') }}</td>
                    <td style="height: 10px !important;">{{ $finance->user->name }}</td>
                    <td style="height: 10px !important;">{{ $finance->title }}</td>
                    <td style="height: 10px !important;">{{ $finance->rabStatus->title }}</td>
                    <td style="height: 10px !important;">{{ $finance->spjStatus->title }}</td>
                    <td style="height: 10px !important;"></td>
                    <td style="height: 10px !important;"></td>
                    <td style="height: 10px !important;">
                        <a role="button" href="{{ route('admin.finance.show',[$finance->product_type_id,$finance->id]) }}" class="mr-1 btn btn-success">
                            Lihat RAB
                        </a>
                        <a role="button" href="{{route('admin.finance.note.index',[$finance->product_type_id,$finance->id])}}" class="mr-1 btn btn-dark">
                            Lihat SPJ
                        </a>
                        <a role="button" href="" class="mr-1 btn btn-primary">
                            Edit
                        </a>
                        <a role="button" href="{{route('admin.finance.comparison',[$finance->product_type_id,$finance->id])}}" class="mr-1 btn btn-warning">
                            Bandingkan RAB & SPJ
                        </a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#" class="btn btn-danger">
                            Hapus
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>

</div>
