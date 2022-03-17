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
                @if(auth()->id()==$finance->user_id or $finance->status_rab_id!=5)
                    <tr x-data="window.__controller.dataTableController({{ $finance->id }})">
                        <td style="height: 10px !important;">{{ $finance->created_at->format('H:m d/M/Y') }}</td>
                        <td style="height: 10px !important;">{{ $finance->user->name }}</td>
                        <td style="height: 10px !important;">{{ $finance->title }}</td>
                        <td style="height: 10px !important;">{{ $finance->rabStatus->title }}</td>
                        <td style="height: 10px !important;">{{ $finance->spjStatus->title }}</td>
                        @php($rab=0)
                        @php($spj=0)
                        @foreach($finance->financeItems as $fi)
                            @php($rab+=$fi->amount*$fi->price)
                        @endforeach
                        @foreach($finance->financeNotes as $fn)
                            @foreach($fn->financeNoteItems as $fi)
                                @php($spj+=$fi->amount*$fi->price)
                            @endforeach
                        @endforeach
                        <td style="height: 10px !important;">{{ $rab }}</td>
                        <td style="height: 10px !important;">{{ $spj }}</td>
                        <td style="height: 10px !important;">
                            <a role="button"
                               href="{{ route('admin.finance.show',[$finance->product_type_id,$finance->id]) }}"
                               class="mr-1 btn btn-success">
                                Lihat RAB
                            </a>
                            @if($finance->status_rab_id==2)
                                <a role="button"
                                   href="{{route('admin.finance.note.index',[$finance->product_type_id,$finance->id])}}"
                                   class="mr-1 btn btn-dark">
                                    Lihat SPJ
                                </a>
                                <a role="button"
                                   href="{{route('admin.finance.comparison',[$finance->product_type_id,$finance->id])}}"
                                   class="mr-1 btn btn-warning">
                                    Bandingkan RAB & SPJ
                                </a>
                            @endif
                            {{--                        <a role="button" href="" class="mr-1 btn btn-primary">--}}
                            {{--                            Edit--}}
                            {{--                        </a>--}}


                            <a role="button" x-on:click.prevent="deleteItem" href="#" class="btn btn-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>

</div>
