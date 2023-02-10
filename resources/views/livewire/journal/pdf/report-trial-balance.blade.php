@php use App\Models\Journal;use App\Models\JournalCode;use App\Models\ProductType; @endphp
    <!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">
    <title>{{ 'Kwitansi - ' }}</title>
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
            border: 1px solid black;
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
        NERACA SALDO <br>
        {{ strtoupper(ProductType::find($umkm)->title) }} <br>
        {{ $start. ' - '. $end }}
    </h6>
    <hr style="margin: 0;padding: 0; background: black">
    <br>
    <table style="width: 100%; text-align: center">
        <tr style="background: #ffb700; font-weight:bold ">
            <td rowspan="2" style="width: 100px">NO. AKUN</td>
            <td rowspan="2">NAMA AKUN</td>
            <td colspan="2">NERACA SALDO</td>
        </tr>
        <tr style="background: #ffb700; font-weight:bold ">
            <td style="width: 170px">DEBET</td>
            <td style="width: 170px">KREDIT</td>
        </tr>
        @php
            $totalDebit=0;
			$totalCredit=0;
        @endphp
        @foreach(JournalCode::whereProductTypeId($umkm)->get() as $code)
            <tr>
                <td>{{ $code->code }}</td>
                <td style="text-align: left;padding-left: 10px">{{ $code->title }}</td>
                <td style="width: 100%; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                    <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                    <div style="text-align: right; display: inline-block; width: 80%">
                        @php($debit=Journal::getDebitCredit($umkm,$start,$end,$code->id,'debit'))
                        {{ number_format($debit,0,'.','.') }}
                        @php($totalDebit+=$debit)
                    </div>
                </td>
                <td style="width: 100%; padding-top: 10px; padding-left: 5px">
                    <div style="text-align: left; display: inline-block; width: 10%">Rp.</div>
                    <div style="text-align: right; display: inline-block; width: 80%">
                        @php($credit=Journal::getDebitCredit($umkm,$start,$end,$code->id,'credit'))
                        {{ number_format($credit,0,'.','.') }}
                        @php($totalCredit+=$credit)
                    </div>
                </td>
            </tr>
        @endforeach
        <tr style="background: lightgreen; font-weight: bold">
            <td></td>
            <td>Jumlah</td>
            <td style="width: 100%; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                <div style="text-align: right; display: inline-block; width: 80%">
                    {{ number_format($totalDebit,0,'.','.') }}
                </div>
            </td>
            <td style="width: 100%; padding-top: 10px; padding-left: 10px; padding-right: 10px">
                <div style="text-align: left; display: inline-block; width: 20%">Rp.</div>
                <div style="text-align: right; display: inline-block; width: 80%">
                    {{ number_format($totalCredit,0,'.','.') }}
                </div>
            </td>
        </tr>
    </table>
</main>
</body>
</html>
