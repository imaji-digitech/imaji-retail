<div>
    <x-data-table :data="$data" :model="$receipts">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        Nomer
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('finance_id')" role="button" href="#">
                        Nama Bendahara
                        @include('components.sort-icon', ['field' => 'finance_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('recipient_id')" role="button" href="#">
                        Nama PIC
                        @include('components.sort-icon', ['field' => 'recipient_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Status Dana
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('nominal')" role="button" href="#">
                        Nominal
                        @include('components.sort-icon', ['field' => 'nominal'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('receipt_type')" role="button" href="#">
                        Jenis Kwitansi
                        @include('components.sort-icon', ['field' => 'receipt_type'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                        status
                        @include('components.sort-icon', ['field' => 'status'])
                    </a></th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($receipts as $receipt)
                <tr x-data="window.__controller.dataTableController({{ $receipt->id }})">
                    <td>{{ $receipt->no_receipt }}</td>
                    <td>{{ $receipt->finance->name }}</td>
                    <td>{{ $receipt->recipient->name }}</td>
                    <td>{{ $receipt->title }}</td>
                    <td>{{ $receipt->nominal }}</td>
                    <td>{{ ($receipt->receipt_type==1)?'Pemasukan':'Pengeluaran' }}</td>
                    <td>{{ ($receipt->status==1)?'Belum disetujui':'Sudah disetujui' }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @if($receipt->status==1)
                            <a role="button"
                               href="{{ route('admin.receipt.edit',[$receipt->product_type_id,$receipt->id]) }}"
                               class="mr-3"><i
                                    class="fa fa-16px fa-pen"></i></a>
                        @endif
                        <a role="button"
                           href="{{ route('admin.receipt.show',[$receipt->product_type_id,$receipt->id]) }}"
                           class="mr-3"><i
                                class="fa fa-16px fa-eye"></i></a>
                        @if($receipt->status==1)
                            <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                    class="fa fa-16px fa-trash text-red-500"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
