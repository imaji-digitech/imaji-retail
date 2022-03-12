<!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">
    <title>{{ 'Kwitansi - '.$receipt->no_receipt }}</title>
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

    </style>
</head>
<body style="padding: 130px 40px 30px 40px;margin: 0;">
<header style="width: 100%" id="header">
    <img style="width: 100%" src="{{public_path('images/income.jpg')}}" alt="">
</header>
<footer id="footer">
    <img style="width: 100%" src="{{public_path('images/kop_bawah.jpg')}}" alt="">
</footer>

<main style="width:100%;padding: 0 50px" id="content">
    <div style="">
        <table style="font-size: 11px;width: 100%">
            <tr>
                <td style="width: 70px"><b></b></td>
                <td style="width: 10px"></td>
                <td style="width: 350px"></td>
                <td style="width: 100px"><b>No Kwitansi :</b></td>
                <td style="width: 120px; text-align: right"> {{ $receipt->no_receipt }}</td>
                <td></td>
            </tr>

        </table>
        {{--        @php($detail=$transaction->transactionDetails)--}}
        {{--        @php($cd=0)--}}
        {{--        @foreach($detail as $d)--}}
        {{--            @if($d->discount==100)--}}
        {{--                @php($cd+=0)--}}
        {{--            @else--}}
        {{--                @php($cd+=$d->total/(100-$d->discount)*$d->discount)--}}
        {{--            @endif--}}
        {{--        @endforeach--}}
        <table bordercolor="#000000" style="margin-top:10px;width: 650px; font-size: 12px">
            <tr style="text-align: center">
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    HARI/TANGGAL
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;">
                    DITERIMA DARI
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;">
                    STATUS DANA
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;">
                    PERIHAL DANA
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    NOMINAL
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    CATATAN
                </th>
            </tr>
            <tr>
                <td style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    {{ $receipt->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                <td style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    {{ $receipt->recipient->name }}
                </td>
                <td style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    {{ $receipt->title }}
                </td>
                <td style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    {!! $receipt->regarding !!}
                </td>
                <td style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    {{ $receipt->nominal }}
                </td>
                <td style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    {!! $receipt->note !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border: .5px solid; text-align: right"><b>Jumlah</b></td>
                <td style="padding:0 5px;text-align:center;border: .5px solid">
                    <b>Rp. {{ number_format($receipt->nominal,0,'.','.') }}</b>
                </td>
                <td></td>
            </tr>
        </table>
        <br>

        <table style="width: 100%;font-size: 12px;text-align: center">
            <tr>
                <td style="width: 50%"><b></b></td>
                <td style="width: 50%">Jember, {{ $receipt->created_at->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td style="width: 50%">Penyetor</td>
                <td style="width: 50%">Mengetahui</td>
            </tr>
            <tr>

                <td style="width: 50%">
                    @if($receipt->status==2)
                        @if($receipt->recipient->sign!=null)
                            <img src="{{public_path('storage/sign/'.$receipt->recipient->sign )}}"
                                 alt="Silakan upload ttd di profile"
                                 style="height: 100px">
                        @else
                            Silakan mengupload ttd di profile
                        @endif
                    @endif
                </td>

                <td style="width: 50%; height: 100px">
                    @if($receipt->finance->sign!=null)
                        <img src="{{public_path('storage/sign/'.$receipt->finance->sign )}}" alt=""
                             style="height: 100px">
                    @else
                        Silakan mengupload ttd di profile
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 50%">{{ $receipt->recipient->name }}</td>
                <td style="width: 50%">{{ $receipt->finance->name }}</td>
            </tr>
            <tr>
                <td style="width: 50%">{{ $receipt->recipient->position }}</td>
                <td style="width: 50%">{{ $receipt->finance->position }}</td>
            </tr>
        </table>
    </div>
</main>
</body>
</html>
