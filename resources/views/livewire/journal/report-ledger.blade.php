@php use App\Models\Journal; @endphp
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <x-daterange title="Cek" model="rangeDate"/>
            </div>
            <div class="col-md-3">
                <label for="name">Filter</label>
                <select class="form-control" wire:model="filter">
                    @foreach($optionFilter as $filter)
                        <option value="{{ $filter['value'] }}">{{ $filter['title'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="" style="color: transparent"> .</label>
                <input type="submit" class="form-control btn btn-primary" wire:click="check">
            </div>
        </div>




        <table style="width: 100%">
            <tr>
                <td colspan="2">Nama akun/tanggal</td>
                <td>Transaksi</td>
                <td>Deskripsi</td>
                <td>Debit</td>
                <td>Kredit</td>
                <td>Saldo</td>
            </tr>
            @php
                $nullAll=true;
            @endphp
            @foreach($journals as $journalCode)
                @php
                    $j=Journal::whereHas('journalTransaction',function ($q) use ($range){
					    $q->whereBetween('transaction_date',[$range[0],$range[1]]);
                    })->whereJournalCodeId($journalCode->id)->get();
					$totalCredit=0;
                    $totalDebit=0;
                @endphp
                @if(count($j)!=0)
                    @php
                    $nullAll=false;
                    @endphp
                    <tr style="background: #d0d0d0">
                        <td colspan="7">({{ $journalCode->code }}) {{ $journalCode->title }}</td>

                    </tr>
                    @foreach($j as $k)

                        <tr>
                            <td style="width: 20px"></td>
                            <td>{{ $k->journalTransaction->transaction_date }}</td>
                            <td>{{ $k->journalTransaction->title }}</td>
                            <td>{{ $k->note }}</td>
                            <td>{{ $k->debit }}</td>
                            <td>{{ $k->credit }}</td>
                            <td>
                                @if($k->debit-$k->credit>0)
                                    {{ $k->debit-$k->credit }}
                                @else
                                    ({{ $k->credit-$k->debit }})
                                @endif

                            </td>
                            @php
                                $totalCredit+=$k->credit;
                                $totalDebit+=$k->debit;
                            @endphp
                        </tr>
                    @endforeach
                    <tr style="border-bottom: 1px black solid">
                        <td colspan="4  ">({{ $journalCode->code }}) {{ $journalCode->title }} | Saldo akhir</td>
                        <td>{{ $totalDebit }}</td>
                        <td>{{ $totalCredit }}</td>
                        <td>
                            @if($totalDebit-$totalCredit>0)
                                {{ $totalDebit-$totalCredit }}
                            @else
                                ({{ $totalCredit-$totalDebit }})
                            @endif
                        </td>
                    </tr>
                    @else
                @endif
                <tr style="height: 5px">
                    <td></td>
                </tr>
            @endforeach
        </table>
        @if($nullAll)
            <h4 style="font-size: 20px"><b>Tidak ada data masuk</b></h4>
        @endif
    </div>

</div>
