@php use App\Models\Journal;use App\Models\JournalCode;use App\Models\JournalTransaction;use Carbon\Carbon; @endphp
    <!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">
    <title>{{ $type->title.' '. $start.' - '.$end }}</title>
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
            border: 1px solid #ababab;
            padding: 5px;
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
        {{ strtoupper($type->title) }} <br>
        {{ \App\Models\ProductType::find($umkm)->title }} <br>
        {{ strtoupper($start.' - '.$end) }}
    </h6>
    <hr style="margin: 0;padding: 0; background: black">
    <br>
    <table style="width: 100%; text-align: center; font-size: 12px">
        <tr style="background: orange; font-weight: bold">
            <td colspan="2">
                TANGGAL
            </td>
            <td>
                KETERANGAN
            </td>
            <td>REFF</td>
            <td>DEBET</td>
            <td>Kredit</td>
        </tr>
        @php
            $totalDebit=0;
			$totalCredit=0;
        @endphp
        @foreach($journalTransaction as $transaction)
            @foreach($transaction->journals as $index=>$journal)
                <tr>
                    <td style="width: 70px">{{ $index==0?Carbon::parse($transaction->transaction_date)->isoFormat('MMMM'):'' }}</td>
                    <td style="width: 25px">{{ $index==0?Carbon::parse($transaction->transaction_date)->isoFormat('d'):'' }}</td>
                    <td style="text-align: left; {{ $journal->credit!=0?'padding-left:50px':'' }}">
                        {{ $journal->debit!=0?$journal->journalCode->title:'' }}
                        {{ $journal->credit!=0?$journal->journalCode->title:'' }}
                        @php
                            $totalDebit+=$journal->debit;
							$totalCredit+=$journal->credit;
                        @endphp
                    </td>
                    <td style="width: 35px">{{ $journal->journalCode->code }}</td>
                    <td style="width: 110px; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                        <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 80%">
                            {{ $journal->debit!=0?number_format($journal->debit,0,'.','.'):''  }}
                        </div>
                    </td>
                    <td style="width: 110px; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                        <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 80%">
                            {{ $journal->credit!=0?number_format($journal->credit,0,'.','.'):''  }}
                        </div>
                    </td>
                </tr>
            @endforeach
            @if($journal->note!=null)
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="1" style="text-align: left">{{ $journal->note }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
        @endforeach
        <tr style="font-weight: bold; background: lightgreen">
            <td colspan="4">JUMLAH</td>
            <td style="width: 110px; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                <div style="text-align: right; display: inline-block; width: 80%">
                    {{ number_format($totalDebit,0,'.','.') }}
                </div>
            </td>
            <td style="width: 110px; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                <div style="text-align: right; display: inline-block; width: 80%">
                    {{ number_format($totalCredit,0,'.','.')  }}
                </div>
            </td>
        </tr>
    </table>
</main>
</body>
</html>
