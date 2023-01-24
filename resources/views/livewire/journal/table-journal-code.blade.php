<div>
    <x-data-table :data="$data" :model="$codes">
        <x-slot name="head">
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('code')" role="button" href="#">
                        Account code @include('components.sort-icon', ['field' => 'code'])
                    </a>
                </th>
                <th>aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($codes as $code)
                <tr x-data="window.__controller.dataTableController({{ $code->id }})">
                    <td style="height: 10px !important;">{{ $code->code }} - {{ $code->title }}</td>
                    <td style="height: 10px !important;">
                        <a role="button" href="{{ route('admin.journal.update-code',[$code->product_type_id,$code->id]) }}" class="mr-3"><i class="fa fa-16px fa-pen">Ubah</i></a>
{{--                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>--}}
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>

</div>
