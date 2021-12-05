<div>
    <div class="container">
        <div class="row">
            {{--            <div class="col-12 mt-3 mb-3 row">--}}
            <div class="col-6 mt-2 mb-2" style="font-size: 16px">
                <h2>
                    <span>Uang yang diajukan dalam RAB</span>
                    <span style="float: right">Rp. {{ number_format($rab,0,',','.') }}</span>
                </h2>

                <h2>
                    <span>Uang yang diajukan dalam SPJ</span>
                    <span style="float: right">Rp. {{ number_format($spj,0,',','.') }}</span>
                </h2>
            </div>
            <div class="col-6 mt-2 mb-2" style="font-size: 16px">
                <h2>
                @if($spj>$rab)
                        <span>Effisient</span>
                        <span style="float: right">
                            Rp. {{ number_format($spj-$rab,0,',','.') }}
                        </span>
                @else
                    <span>Defisit</span>
                        <span style="float: right">
                            Rp. {{ number_format($rab-$spj,0,',','.') }}
                        </span>
                @endif
                </h2>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">harga</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($finance->financeItems as $index=>$fi)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$fi->title}}  </td>
                            <td>{{$fi->amount}}</td>
                            <td>{{ number_format($fi->price,0,',','.') }}</td>
                            <td>{{ number_format($fi->price*$fi->amount,0,',','.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">harga</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($finance->financeNotes as $index=>$fn)
                        @foreach($fn->financeNoteItems as$fi)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$fi->title}}  </td>
                                <td>{{$fi->amount}}</td>
                                <td>Rp. {{ number_format($fi->price,0,',','.') }}</td>
                                <td>Rp. {{ number_format($fi->price*$fi->amount,0,',','.') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
