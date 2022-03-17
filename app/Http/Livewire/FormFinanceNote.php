<?php

namespace App\Http\Livewire;


use App\Models\FinanceNote;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormFinanceNote extends Component
{
    use WithFileUploads;
    public $data;
    public $thumbnail;
    public $financeId;
    public function getRules(){
        return['thumbnail'=>'required|image|max:10240'];
    }
    public function create(){
        $this->validate();
        $image = $this->thumbnail;
        $filename = Str::slug(auth()->user()->name.'-'.time() ). '.' . $image->getClientOriginalExtension();
        $image = Image::make($image)->resize(null, 1080, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->stream();
        Storage::disk('local')->put('public/finance/' . $filename, $image, 'public');
        $fn=FinanceNote::create(['finance_id'=>$this->financeId,'note'=>'finance/' . $filename]);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan nota',
        ]);
//        finance.note.index
        $this->emit('redirect',route('admin.finance.note.show',$fn->id));
    }
    public function render()
    {
        return view('livewire.form-finance-note');
    }
}
