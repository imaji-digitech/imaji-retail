<div id="form-create" class="card">
    <form wire:submit.prevent="{{ $action }}" class="card-body">
        <x-select :options="$optionSubCode"
                  :selected="$data['journal_code_account_id']"
                  title="Sub kode jurnal"
                  model="data.journal_code_account_id"/>
        <x-input type="text" title="Kode akuntan" model="data.code"/>
        <x-input type="text" title="Judul kode akuntan" model="data.title"/>
        <x-textarea title="Deskripsi" model="data.description"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


