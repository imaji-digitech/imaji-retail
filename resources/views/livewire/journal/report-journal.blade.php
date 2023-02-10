@php use App\Models\Journal;use Carbon\Carbon; @endphp
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
                <input type="submit" class="form-control btn btn-primary" wire:click="check" value="Submit">
            </div>
            <div class="col-md-3">
                <label for="" style="color: transparent"> .</label>
                <input type="submit" class="form-control btn btn-success" value="Download" wire:click="download">
            </div>
        </div>

        <table class="table table-bordered " style="width: 100%; text-align: center;">
            <tr style="background: orange; font-weight: bold;">
                <td colspan="2" style="width:95px !important;height: 10px; padding: 5px">
                    TANGGAL
                </td>
                <td style="height: 10px; padding: 5px">
                    KETERANGAN
                </td>
                <td style="width:50px;text-align: left;height: 10px; padding: 5px">REFF</td>
                <td style="height: 10px; padding: 5px">DEBET</td>
                <td style="height: 10px; padding: 5px">Kredit</td>
            </tr>
            @php
                $totalDebit=0;
                $totalCredit=0;
            @endphp
            @foreach($journalTransaction as $transaction)
                @foreach($transaction->journals as $index=>$journal)
                    <tr style="height: 10px; padding: 5px">
                        <td style="width: 70px;height: 10px; padding: 5px">{{ $index==0?Carbon::parse($transaction->transaction_date)->isoFormat('MMMM'):'' }}</td>
                        <td style="width: 30px;height: 10px; padding: 5px">{{ $index==0?Carbon::parse($transaction->transaction_date)->isoFormat('d'):'' }}</td>
                        <td style="text-align: left;height: 10px; padding: 5px; {{ $journal->credit!=0?'padding-left:50px':'' }}">
                            {{ $journal->debit!=0?$journal->journalCode->title:'' }}
                            {{ $journal->credit!=0?$journal->journalCode->title:'' }}
                            @php
                                $totalDebit+=$journal->debit;
                                $totalCredit+=$journal->credit;
                            @endphp
                        </td>
                        <td style="width: 35px;height: 10px; padding: 5px">{{ $journal->journalCode->code }}</td>
                        <td style="width: 150px;height: 10px; padding: 5px">
                            <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                                <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                                <div style="text-align: right; display: inline-block; width: 100px">
                                    {{ $journal->debit!=0?number_format($journal->debit,0,'.','.'):''  }}
                                </div>
                            </div>
                        </td>
                        <td style="width: 150px;height: 10px; padding: 5px">
                            <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                                <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                                <div style="text-align: right; display: inline-block; width: 100px">
                                    {{ $journal->credit!=0?number_format($journal->credit,0,'.','.'):''  }}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($journal->note!=null)
                    <tr>
                        <td style="text-align: left;height: 10px; padding: 5px"></td>
                        <td style="text-align: left;height: 10px; padding: 5px"></td>
                        <td style="text-align: left;height: 10px; padding: 5px">{{ $journal->note }}</td>
                        <td style="text-align: left;height: 10px; padding: 5px"></td>
                        <td style="text-align: left;height: 10px; padding: 5px"></td>
                        <td style="text-align: left;height: 10px; padding: 5px"></td>
                    </tr>
                @endif
            @endforeach
            <tr style="font-weight: bold; background: lightgreen">
                <td style="text-align: left;height: 10px; padding: 5px" colspan="4">JUMLAH</td>
                <td style="width: 150px;text-align: left;height: 10px; padding: 5px">
                    <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                        <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 100px">
                            {{ number_format($totalDebit,0,'.','.') }}
                        </div>
                    </div>
                </td>
                <td style="width: 150px;text-align: center;height: 10px; padding: 5px">
                    <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                        <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 100px">
                            {{ number_format($totalCredit,0,'.','.')  }}
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>
</div>
