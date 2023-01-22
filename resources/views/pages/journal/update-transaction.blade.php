<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah transaksi jurnal') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.journal.index',$umkm) }}">{{__('Jurnal')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Ubah transaksi jurnal')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:journal.form-journal-transaction action="update" :data-id="$id" :umkm="$umkm"/>
    </div>
</x-app-layout>
