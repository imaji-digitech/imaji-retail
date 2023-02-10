@php use App\Models\Journal;use App\Models\JournalCode;use App\Models\JournalTransaction;use Carbon\Carbon; @endphp
    <!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">
    <title></title>
    <style>
        header {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            height: 130px;
            text-align: center;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            right: 0;
            height: 30px;
        }

        #footer .page:after {
            content: counter(page, upper-roman);
        }

        table, th, td {
            border: 1px solid #000000;
            padding: 5px;
            vertical-align: top;
        }

    </style>
</head>
<body style="padding: 130px 40px 30px 40px;margin: 0;">
<header style="width: 100%" id="header">
    <img style="width: 100%" src="{{public_path('images/kop_atas.jpg')}}" alt="">
</header>
<footer id="footer">
    <img style="width: 100%" src="{{public_path('images/kop_bawah.jpg')}}" alt="">
</footer>

<main style="width:100%; padding: 0 20px" id="content">
    <h6 style="text-align: center; margin: 0;padding: 0">
        BUKU BESAR<br>
        {{ \App\Models\ProductType::find($umkm)->title }} <br>
        {{ strtoupper($start.' - '.$end) }}
    </h6>
    <hr style="margin: 0;padding: 0; background: black">
    <br>
    <table style="width: 100%; font-size: 10px; vertical-align: top">
        <tr style="background: orange; font-weight: bold">
            <td colspan="2">Nama akun/tanggal</td>
            <td style="width: 70px">Transaksi</td>
            <td>Deskripsi</td>
            <td style="width: 80px">Debit</td>
            <td style="width: 80px">Kredit</td>
            <td style="width: 80px">Saldo</td>
        </tr>
        @foreach($journals as $journalCode)
            @php
                $j=Journal::whereHas('journalTransaction',function ($q) use ($start,$end){
                    $q->whereBetween('transaction_date',[$start,$end]);
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
                        <td style="width: 30px"></td>
                        <td style="width: 55px">{{ $k->journalTransaction->transaction_date }}</td>
                        <td>{{ $k->journalTransaction->title }}</td>
                        <td>{{ $k->note }}</td>
                        <td>
                            <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 90%">
                                {{ number_format($k->debit,0,'.','.') }}
                            </div>
                        </td>
                        <td>
                            <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 90%">
                                {{ number_format($k->credit,0,'.','.') }}
                            </div>
                        </td>
                        <td>
                            @if($k->debit-$k->credit>0)
                                <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                                <div style="text-align: right; display: inline-block; width: 90%">
                                    {{ number_format($k->debit-$k->credit*1000,0,'.','.') }}
                                </div>
                            @else
                                <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                                <div style="text-align: right; display: inline-block; width: 90%">
                                    ({{ number_format($k->credit-$k->debit*1000,0,'.','.') }})
                                </div>
                            @endif
                        </td>
                        @php
                            $totalCredit+=$k->credit;
                            $totalDebit+=$k->debit;
                        @endphp
                    </tr>
                @endforeach
                <tr style="font-weight: bold">
                    <td colspan="4">({{ $journalCode->code }}) {{ $journalCode->title }} | Saldo akhir</td>
                    <td>
                        <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 90%">
                            {{ number_format($totalDebit,0,'.','.') }}
                        </div>
                    </td>
                    <td>
                        <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 90%">
                            {{ number_format($totalCredit,0,'.','.') }}
                        </div>
                    </td>
                    <td>
                        @if($totalDebit-$totalCredit>0)
                            <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 90%">
                                {{ number_format($totalDebit-$totalCredit*1000,0,'.','.') }}
                            </div>
                        @else
                            <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 90%">
                                ({{ number_format($totalCredit-$totalDebit*1000,0,'.','.') }})
                            </div>
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</main>
</body>
</html>
