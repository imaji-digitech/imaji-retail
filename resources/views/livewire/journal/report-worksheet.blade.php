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

        <table style="width: 100%; text-align: center;color: black; font-size: 9px"
               class=" table border table-bordered">
            <tr>
                <td class="m-0 p-0 h-25" rowspan="2" style="width: 50px">No Akun</td>
                <td class="m-0 p-0 h-25" rowspan="2">Nama Akun</td>
                <td class="m-0 p-0 h-25" colspan="2">Necara Awal</td>
                <td class="m-0 p-0 h-25" colspan="2">AJP</td>
                <td class="m-0 p-0 h-25" colspan="2">NSSD</td>
                <td class="m-0 p-0 h-25" colspan="2">Ikhtisar Laba-Rugi</td>
                <td class="m-0 p-0 h-25" colspan="2">Neraca Akhir</td>
            </tr>
            <tr>
                <td class="m-0 p-0 h-25">Debet</td>
                <td class="m-0 p-0 h-25">Kredit</td>

                <td class="m-0 p-0 h-25">Debet</td>
                <td class="m-0 p-0 h-25">Kredit</td>

                <td class="m-0 p-0 h-25">Debet</td>
                <td class="m-0 p-0 h-25">Kredit</td>

                <td class="m-0 p-0 h-25">Debet</td>
                <td class="m-0 p-0 h-25">Kredit</td>

                <td class="m-0 p-0 h-25">Debet</td>
                <td class="m-0 p-0 h-25">Kredit</td>
            </tr>
            @php
                $totalDebitJu=0;
                $totalCreditJu=0;
				$totalDebitAjp=0;
                $totalCreditAjp=0;
				$totalDebitNssd=0;
                $totalCreditNssd=0;
				$totalDebitLr=0;
                $totalCreditLr=0;
				$totalDebitNa=0;
                $totalCreditNa=0;
            @endphp
            @foreach(JournalCode::whereProductTypeId($umkm)->get() as $code)
                <tr>
                    <td class="m-0 p-0 h-25">{{ $code->code }}</td> {{-- No akun --}}
                    <td class="m-0 h-25" style="text-align: left; padding-left: 5px">
                        {{ $code->title }}
                    </td> {{-- Nama akun --}}

                    {{-- Start Debet JU --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                @php
                                    $debitJu=Journal::getWorksheetDebitCredit($umkm,1,$code->id,$range[0],$range[1],'debit');
									$totalDebitJu+=$debitJu;
                                @endphp
                                {{ $debitJu!=0? thousand_format($debitJu):''  }}

                            </div>
                        </div>
                    </td>

                    {{-- Start Kredit JU --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                {{--                                {{ thousand_format(Journal::getWorksheetDebitCredit($umkm,1,$code->id,$range[0],$range[1],'credit')) }}--}}
                                @php
                                    $creditJu=Journal::getWorksheetDebitCredit($umkm,1,$code->id,$range[0],$range[1],'credit');
									$totalCreditJu+=$creditJu;
                                @endphp
                                {{ $creditJu!=0? thousand_format($creditJu):''  }}
                            </div>
                        </div>
                    </td>

                    {{-- Start Debet AJP --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                {{--                                {{ thousand_format(Journal::getWorksheetDebitCredit($umkm,2,$code->id,$range[0],$range[1],'debit')) }}--}}
                                @php
                                    $debitAjp=Journal::getWorksheetDebitCredit($umkm,2,$code->id,$range[0],$range[1],'debit');
									$totalDebitAjp+=$debitAjp;
                                @endphp
                                {{ $debitAjp!=0? thousand_format($debitAjp):''  }}
                            </div>
                        </div>
                    </td>

                    {{-- Start Kredit AJP --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                @php
                                    $creditAjp=Journal::getWorksheetDebitCredit($umkm,2,$code->id,$range[0],$range[1],'credit');
									$totalCreditAjp+=$creditAjp;
                                @endphp
                                {{ $creditAjp!=0? thousand_format($creditAjp):''  }}
                            </div>
                        </div>
                    </td>

                    @php
                        $nssd = Journal::getWorksheetDebitCredit($umkm,1,$code->id,$range[0],$range[1],'debit')-
        Journal::getWorksheetDebitCredit($umkm,1,$code->id,$range[0],$range[1],'credit')+
        Journal::getWorksheetDebitCredit($umkm,2,$code->id,$range[0],$range[1],'debit')-
        Journal::getWorksheetDebitCredit($umkm,2,$code->id,$range[0],$range[1],'credit');
						if ($nssd>0){
							$totalDebitNssd+=$nssd;
						}else{
							$totalCreditNssd+=($nssd*-1);
						}
                    @endphp
                    {{-- Start Debet NSSD --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                {{ $nssd>0? thousand_format($nssd):''  }}
                            </div>
                        </div>
                    </td>

                    {{-- Start Kredit NSSD --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                {{ $nssd<0? thousand_format($nssd*-1):''  }}
                            </div>
                        </div>
                    </td>

                    {{-- Start Debet LR --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                @if($code->journal_code_account_id>3)
                                    {{ $nssd>0? thousand_format($nssd):''  }}
                                    @php($totalDebitLr+=$nssd)
                                @endif
                            </div>
                        </div>
                    </td>

                    {{-- Start Kredit LR --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                @if($code->journal_code_account_id>3)
                                    {{ $nssd<0? thousand_format($nssd*-1):''  }}
                                    @php($totalCreditLr+=($nssd*-1))
                                @endif
                            </div>
                        </div>
                    </td>

                    {{-- Start Debet NA --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                @if($code->journal_code_account_id<=3 and $nssd>=0)
                                    {{ thousand_format($nssd) }}
                                    @php($totalDebitNa+=$nssd)
                                @endif
                            </div>
                        </div>
                    </td>

                    {{-- Start Kredit NA --}}
                    <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                        <div style="width: 85px;">
                            <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                            <div style="text-align: right; display: inline-block; width: 65px">
                                @if($code->journal_code_account_id<=3 and $nssd<=0)
                                    {{ thousand_format($nssd*-1) }}
                                    @php($totalCreditNa+=($nssd*-1))
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr style="background: #d2d2d2">
                <td class="m-0 p-0 h-25"></td>
                <td class="m-0 p-0 h-25">Jumlah</td>
                {{--JU--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitJu!=0?thousand_format($totalDebitJu):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditJu!=0?thousand_format($totalCreditJu):'' }}
                        </div>
                    </div>
                </td>
                {{--AJP--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitAjp!=0?thousand_format($totalDebitAjp):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditAjp!=0?thousand_format($totalCreditAjp):'' }}
                        </div>
                    </div>
                </td>
                {{--NSSD--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitNssd!=0?thousand_format($totalDebitNssd):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditNssd!=0?thousand_format($totalCreditNssd):'' }}
                        </div>
                    </div>
                </td>
                {{--LR--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitLr!=0?thousand_format($totalDebitLr):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditLr!=0?thousand_format($totalCreditLr):'' }}
                        </div>
                    </div>
                </td>
                {{--NA--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitNa!=0?thousand_format($totalDebitNa):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditNa!=0?thousand_format($totalCreditNa):'' }}
                        </div>
                    </div>
                </td>

            </tr>

            <tr>
                <td class="m-0 p-0 h-25"></td>
                <td class="m-0 p-0 h-25"></td>
                {{--JU--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalCreditJu-$totalDebitJu<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditJu-$totalDebitJu<0?thousand_format($totalCreditJu-$totalDebitJu):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalDebitJu-$totalCreditJu<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitJu-$totalCreditJu<0?thousand_format($totalDebitJu-$totalCreditJu):'' }}
                        </div>
                    </div>
                </td>
                {{--AJP--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalCreditAjp-$totalDebitAjp<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditAjp-$totalDebitAjp<0?thousand_format($totalCreditAjp-$totalDebitAjp):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalDebitAjp-$totalCreditAjp<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitAjp-$totalCreditAjp<0?thousand_format($totalDebitAjp-$totalCreditAjp):'' }}
                        </div>
                    </div>
                </td>
                {{--NSSD--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalCreditNssd-$totalDebitNssd<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditNssd-$totalDebitNssd<0?thousand_format($totalCreditNssd-$totalDebitNssd):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalDebitNssd-$totalCreditNssd<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitNssd-$totalCreditNssd<0?thousand_format($totalDebitNssd-$totalCreditNssd):'' }}
                        </div>
                    </div>
                </td>
                {{--LR--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalCreditLr-$totalDebitLr<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditLr-$totalDebitLr<0?thousand_format($totalCreditLr-$totalDebitLr):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalDebitLr-$totalCreditLr<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitLr-$totalCreditLr<0?thousand_format($totalDebitLr-$totalCreditLr):'' }}
                        </div>
                    </div>
                </td>
                {{--NA--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalCreditNa-$totalDebitNa<0?'background-color:#f07373':'' }}
                ">

                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalCreditNa-$totalDebitNa<0?thousand_format($totalCreditNa-$totalDebitNa):'' }}
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px;
                {{ $totalDebitNa-$totalCreditNa<0?'background-color:#f07373':'' }}
                ">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            {{ $totalDebitNa-$totalCreditNa<0?thousand_format($totalDebitNa-$totalCreditNa):'' }}
                        </div>
                    </div>
                </td>
            </tr>

            <tr style="background: #d2d2d2">
                <td class="m-0 p-0 h-25"></td>
                <td class="m-0 p-0 h-25"></td>
                {{--JU--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditJu<$totalDebitJu)
                                {{ thousand_format($totalCreditJu) }}
                            @elseif($totalCreditJu>$totalDebitJu)
                                {{ thousand_format($totalDebitJu) }}
                            @endif
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditJu<$totalDebitJu)
                                {{ thousand_format($totalCreditJu) }}
                            @elseif($totalCreditJu>$totalDebitJu)
                                {{ thousand_format($totalDebitJu) }}
                            @endif
                        </div>
                    </div>
                </td>
                {{--AJP--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditAjp<$totalDebitAjp)
                                {{ thousand_format($totalCreditAjp) }}
                            @elseif($totalCreditAjp>$totalDebitAjp)
                                {{ thousand_format($totalDebitAjp) }}
                            @endif
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditAjp<$totalDebitAjp)
                                {{ thousand_format($totalCreditAjp) }}
                            @elseif($totalCreditAjp>$totalDebitAjp)
                                {{ thousand_format($totalDebitAjp) }}
                            @endif
                        </div>
                    </div>
                </td>
                {{--NSSD--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditNssd<$totalDebitNssd)
                                {{ thousand_format($totalCreditNssd) }}
                            @elseif($totalCreditNssd>$totalDebitNssd)
                                {{ thousand_format($totalDebitNssd) }}
                            @endif
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditNssd<$totalDebitNssd)
                                {{ thousand_format($totalCreditNssd) }}
                            @elseif($totalCreditNssd>$totalDebitNssd)
                                {{ thousand_format($totalDebitNssd) }}
                            @endif
                        </div>
                    </div>
                </td>
                {{--LR--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditLr<$totalDebitLr)
                                {{ thousand_format($totalCreditLr) }}
                            @elseif($totalCreditLr>$totalDebitLr)
                                {{ thousand_format($totalDebitLr) }}
                            @endif
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditLr<$totalDebitLr)
                                {{ thousand_format($totalCreditLr) }}
                            @elseif($totalCreditLr>$totalDebitLr)
                                {{ thousand_format($totalDebitLr) }}
                            @endif
                        </div>
                    </div>
                </td>
                {{--NA--}}
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditNa<$totalDebitNa)
                                {{ thousand_format($totalCreditNa) }}
                            @elseif($totalCreditNa>$totalDebitNa)
                                {{ thousand_format($totalDebitNa) }}
                            @endif
                        </div>
                    </div>
                </td>
                <td class="m-0  h-25" style="padding: 0 3px; width: 90px;height: 10px; font-size: 8px">
                    <div style="width: 85px;">
                        <div style="text-align: left; display: inline-block; width: 15px">Rp.</div>
                        <div style="text-align: right; display: inline-block; width: 65px">
                            @if($totalCreditNa<$totalDebitNa)
                                {{ thousand_format($totalCreditNa) }}
                            @elseif($totalCreditNa>$totalDebitNa)
                                {{ thousand_format($totalDebitNa) }}
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>
</div>
