<div>
    <x-data-table :data="$data" :model="$transactions">
        <x-slot name="head">
            <tr>
                <th style="width: 190px !important;">
                    <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        Nama Customer @include('components.sort-icon', ['field' => 'user_id'])
                    </a>
                </th>
                <th style="width: 170px !important;">
                    <a wire:click.prevent="sortBy('no_invoice')" role="button" href="#">
                        No Invoice @include('components.sort-icon', ['field' => 'no_invoice'])
                    </a>
                </th>

                <th style="width: 170px !important;">
                    <a wire:click.prevent="sortBy('status_id')" role="button" href="#">
                        Jenis pembayaran
                        @include('components.sort-icon', ['field' => 'status_id'])
                    </a>
                </th>
                <th style="width: 170px">
                    Jumlah transaksi
                </th>
                <th style="width: 250px">
                    Detail penjualan
                </th>
                <th style="width: 170px">
                    Action
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($transactions as $transaction)
                <tr x-data="window.__controller.dataTableController({{ $transaction->id }})">
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->no_invoice }}</td>
                    <td>{{ $transaction->paymentStatus->title }}</td>
                    <td>Rp {{ number_format($transaction->transactionDetails->sum('total'),0,',','.') }}</td>
                    <td>
                        @foreach($transaction->transactionDetails as $td)
                            <p>{{$td->product->title. " : " .$td->quantity}}</p>
                        @endforeach
                    </td>
                    <td>
                        <a role="button" href="{{ route('admin.transaction.show',$transaction->id) }}" class="mr-3">
                            <i class="fa fa-16px fa-eye text-blue-500"></i>
                        </a>
                        <a role="button" href="{{ route('admin.transaction.export',$transaction->id) }}" class="mr-3" target="_blank">
                            <i class="fa fa-16px fa-download text-blue-500"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
