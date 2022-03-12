<div>
    <div id="form-create" class="">
        <form wire:submit.prevent="update">
            <x-input type="file" title="Sign" model="sign"/>

            @if($sign)
                <img src="{{$sign->temporaryUrl()}}" alt="" style="max-height: 300px; margin-bottom: 20px">
            @else
                @if($user->sign)
                    <img src="{{asset('storage/sign/'.$user->sign)}}" alt="">
                @endif
            @endif
            <div class="form-group col-span-6 sm:col-span-5"></div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
