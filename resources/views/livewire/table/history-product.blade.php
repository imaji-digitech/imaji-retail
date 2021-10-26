<div>
    <x-data-table :data="$data" :model="$products">
        <x-slot name="head">
            <tr>
                <th style="width: 20px">#</th>
                <th style="width: 170px !important;">
                    <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        User
                        @include('components.sort-icon', ['field' => 'user_id'])
                    </a>
                </th>
                <th>
                    Keterangan
                </th>
                <th>
                    Keterangan tambahan
                </th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach ($products as $index=>$product)
                <tr x-data="window.__controller.dataTableController({{ $product->id }})">
                    <td style="height: 10px !important;">{{ $index }}</td>
                    <td style="height: 10px !important;">{{ $product->user->name }}</td>
                    <td style="height: 10px !important;">{{ $product->note }}</td>
                    <td style="height: 10px !important;">{{ $product->user_note }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>


</div>
