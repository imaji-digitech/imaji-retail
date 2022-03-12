<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Kwitansi Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kwitansi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.receipt.index',$umkm) }}">Buat Kwitansi Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-receipt action="create" :umkm="$umkm" />
    </div>
</x-app-layout>
