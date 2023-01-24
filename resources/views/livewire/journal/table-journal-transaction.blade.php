@php use App\Models\JournalTransaction; @endphp
<div>
    <x-data-table :data="$data" :model="$journalTransactions">
        <x-slot name="head">
            <tr>
                <th colspan="2">
                    <a wire:click.prevent="sortBy('transaction_date')" role="button" href="#">
                        Tanggal transaksi @include('components.sort-icon', ['field' => 'transaction_date'])
                    </a>
                </th>
                <th colspan="2">Judul (auto)</th>
            </tr>
            <tr>
                <th>Account code</th>
                <th>Note</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($journalTransactions as $journal)
                <tr x-data="window.__controller.dataTableController({{ $journal->id }})" style="background: #d0d0d0">
                    <td colspan="2" style="height: 40px !important;"><b>{{ $journal->transaction_date }}</b></td>
                    <td colspan="1" style="height: 40px !important;">{{ $journal->title }} </td>
                    <td colspan="1" style="height: 40px !important;">
                        @if(JournalTransaction::whereProductTypeId($dataId)->orderByDesc('id')->first()->id==$journal->id)
                            <a href="#">
                                <i class="fa fa-trash text-danger" wire:click="deleteConfirm({{ $journal->id }})"> Hapus</i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                        @endif
                        <a href="{{ route('admin.journal.update-transaction',[$dataId,$journal->id]) }}">
                            <i class="fa fa-pencil text-primary"> Ubah</i>
                        </a>
                    </td>
                </tr>
                @foreach($journal->journals as $t)
                    <tr>
                        <td style="height: 10px !important;">{{ $t->journalCode->code. ' - ' .$t->journalCode->title }}</td>
                        <td style="height: 10px !important;">{{ $t->note }}</td>
                        <td style="height: 10px !important;">{{ $t->debit }}</td>
                        <td style="height: 10px !important;">{{ $t->credit }}</td>
                    </tr>
                @endforeach
            @endforeach
        </x-slot>
    </x-data-table>
</div>
