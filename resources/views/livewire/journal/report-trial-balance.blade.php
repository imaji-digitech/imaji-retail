@php use App\Models\Journal;use App\Models\JournalCode;use Carbon\Carbon; @endphp
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

        <table style="width: 100%; text-align: center;" class="border table-bordered">
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
                    <td style="width: 150px;height: 10px; padding: 5px">
                        <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                            <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 100px">
                                @php($debit=Journal::getDebitCredit($umkm,$range[0],$range[1],$code->id,'debit'))
                                {{ number_format($debit,0,'.','.') }}
                                @php($totalDebit+=$debit)
                            </div>
                        </div>
                    </td>
                    <td style="width: 150px;height: 10px; padding: 5px">
                        <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                            <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 100px">
                                @php($credit=Journal::getDebitCredit($umkm,$range[0],$range[1],$code->id,'credit'))
                                {{ number_format($credit,0,'.','.') }}
                                @php($totalCredit+=$credit)
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
            <tr style="background: lightgreen; font-weight: bold">
                <td></td>
                <td>Jumlah</td>
                <td style="width: 150px;height: 10px; padding: 5px">
                    <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                        <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 100px">
                            {{ number_format($totalDebit,0,'.','.') }}
                        </div>
                    </div>
                </td>
                <td style="width: 150px;height: 10px; padding: 5px">
                    <div style="width: 150px; padding-top: 10px; padding-left: 5px">
                        <div style="text-align: left; display: inline-block; width: 30px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 100px">
                            {{ number_format($totalCredit,0,'.','.') }}
                        </div>
                    </div>
                </td>

            </tr>
        </table>

    </div>
</div>
