<div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kwitansi</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($salaries as $salary)
                            <li>
                                <span>
                                    Dibuat pada : {{$salary->created_at->formatLocalized('%d %B %Y')}}
                                    <br>
                                    Status : {{($salary->status==1)?'Belum disetujui':'Sudah disetujui'}}
                                    <br>
                                    Status dana : {{ $salary->title }}
                                    <br>
                                    No Kwitansi : {{ $salary->no_receipt }}
                                    <br>
                                    Nominal : {{ $salary->nominal }}
                                </span>
                                <span class="float-right">
<a role="button" href="{{ route('admin.receipt.show',$salary->id) }}" class="mr-3" target="_blank">
                            <i style="font-size: 30px" class="fa fa-eye text-primary"></i>
</a>
                                    @if($salary->status==1)
                                        <a role="button" href="#" class="mr-3" wire:click="agree({{ $salary->id }})">
                            <i style="font-size: 30px" class="fa fa-check text-success"></i>
                                        </a>
                                    @endif
{{--                            <i style="font-size: 30px" class="fa fa-ban text-red-500"></i>--}}
                    </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
