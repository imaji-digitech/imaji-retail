<!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">
    <title>{{ 'NOTA RETURN - '.$transaction->transaction->no_invoice.' - '.$transaction->transaction->user->name }}</title>
    <style>
        header {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            height: 150px;
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

    </style>
</head>
<body style="padding: 150px 40px 30px 40px;margin: 0;">
<header style="width: 100%" id="header">
    <img style="width: 100%" src="{{public_path('images/kop_ret.jpg')}}" alt="">
</header>
<footer id="footer">
    <img style="width: 100%" src="{{public_path('images/kop_bawah.jpg')}}" alt="">
</footer>

<main style="width:100%;padding: 0 50px" id="content">
    <div style="">
        <table style="font-size: 11px;width: 100%">
            <tr>
                <td style="width: 70px"><b>Customer</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px">{{ $transaction->transaction->user->name }}</td>
                <td style="width: 70px"><b>No. Invoice</b></td>
                <td style="width: 10px">:</td>
                <td>{{ $transaction->transaction->no_invoice }}</td>
            </tr>
            <tr>
                <td style="width: 70px"><b>No Telp</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px">{{ $transaction->transaction->user->telp }}</td>
                <td style="width: 70px"><b>Tanggal</b></td>
                <td style="width: 10px">:</td>
                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td style="width: 70px"><b>Alamat</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px">{{ $transaction->transaction->user->address}}</td>
                <td style="width: 70px"><b>Pembayaran</b></td>
                <td style="width: 10px">:</td>
                <td>{{ $transaction->transaction->paymentStatus->title }}</td>
            </tr>
        </table>
        @php($detail=$transaction->transactionReturnDetails)
        <table bordercolor="#000000" style="margin-top:10px;width: 100%; font-size: 11px">
            <tr style="text-align: center">
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    Nama Barang
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 60px">
                    Qty
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 100px">
                    Harga Satuan
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px"> Total
                </th>
            </tr>
            @for($i=0;$i<10;$i++)
                <tr>
                    <td style="text-align:left;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                        {{(isset($detail[$i])? $detail[$i]->product->title: ' ')}}
                    </td>
                    <td style="text-align:center;height:12px;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                        {{(isset($detail[$i])? $detail[$i]->quantity: ' ')}}
                    </td>
                    <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                        {{(isset($detail[$i])? number_format($detail[$i]->total/$detail[$i]->quantity,0,'.','.'): ' ')}}
                    </td>
                    <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                        {{(isset($detail[$i])? number_format($detail[$i]->total,0,'.','.'): '')}}
                    </td>
                </tr>

            @endfor
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid; text-align: right">Sub total :</td>
                <td style="border: .5px solid">{{ number_format($detail->sum('total'),0,'.','.') }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid; text-align: right">Pajak :</td>
                <td style="border: .5px solid">0</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid; text-align: right"><b>Total :</b></td>
                <td style="border: .5px solid">{{ number_format($detail->sum('total'),0,'.','.') }}</td>
            </tr>
        </table>
        <br>

        <table style="width: 100%;font-size: 12px;text-align: center">
            <tr>
                <td style="width: 50%"><b>Penerima/Pembeli</b></td>
                <td style="width: 50%"><b>Sociopreneur Community</b></td>
            </tr>
        </table>
    </div>
</main>
</body>
</html>
