<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah Kwitansi') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kwitansi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.receipt.index',$umkm) }}">Ubah Kwitansi</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-receipt action="update" :dataId="$id" :umkm="$umkm"/>
    </div>
</x-app-layout>
