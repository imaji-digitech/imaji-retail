<div>
    <x-data-table :data="$data" :model="$assets">
        <x-slot name="head">
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('product_type_id')" role="button" href="#">
                        Usaha @include('components.sort-icon', ['field' => 'product_type_id'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('code')" role="button" href="#">
                        Kode Asset @include('components.sort-icon', ['field' => 'code'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('asset_ownership_id')" role="button" href="#">
                        Kepemilikan @include('components.sort-icon', ['field' => 'asset_ownership_id'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('asset_code_id')" role="button" href="#">
                        Jenis @include('components.sort-icon', ['field' => 'asset_code_id'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Nama @include('components.sort-icon', ['field' => 'title'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('amount')" role="button" href="#">
                        Jumlah @include('components.sort-icon', ['field' => 'amount'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('nominal')" role="button" href="#">
                        Nominal @include('components.sort-icon', ['field' => 'nominal'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('asset_state_id')" role="button" href="#">
                        Keadaan @include('components.sort-icon', ['field' => 'asset_state_id'])
                    </a>
                </th>
                <th>aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($assets as $asset)
                <tr x-data="window.__controller.dataTableController({{ $asset->id }})">
                    <td style="height: 10px !important;">{{ $asset->productType->title }}</td>
                    <td style="height: 10px !important;">{{ $asset->code }}</td>
                    <td style="height: 10px !important;">{{ $asset->assetOwnership->title }}</td>
                    <td style="height: 10px !important;">{{ $asset->assetCode->type }}</td>
                    <td style="height: 10px !important;">{{ $asset->title }}</td>
                    <td style="height: 10px !important;">{{ $asset->amount }}</td>
                    <td style="height: 10px !important;">{{ number_format($asset->nominal,0,',','.') }}</td>
                    <td style="height: 10px !important;">{{ $asset->assetState->title }}</td>
                    <td style="height: 10px !important;">
                        <a role="button" href="{{ route('admin.asset.edit',[$asset->product_type_id,$asset->id]) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>

</div>
