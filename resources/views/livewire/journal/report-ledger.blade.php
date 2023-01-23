@php use App\Models\Journal; @endphp
<div class="card">
    <div class="card-body">
        <table style="width: 100%">
            <tr>
                <td colspan="2">Nama akun/tanggal</td>
                <td>Transaksi</td>
                <td>Deskripsi</td>
                <td>Debit</td>
                <td>Kredit</td>
                <td>Saldo</td>
            </tr>
            @foreach($journals as $journalCode)
                @php
                    $j=Journal::whereJournalCodeId($journalCode->id)->get();
//					dd($j)
                $totalCredit=0;
                    $totalDebit=0;
                @endphp
                @if($j!=null)
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
                @endif
                <tr style="height: 5px">
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
