<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat transaksi jurnal') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.journal.index',$umkm) }}">{{__('Jurnal')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Buat transaksi jurnal')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:journal.form-journal-transaction action="create" :umkm="$umkm"/>
    </div>
</x-app-layout>
