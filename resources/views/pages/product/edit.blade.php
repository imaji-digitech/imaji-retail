<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah produk') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.product.index',$umkm) }}">{{__('Produk')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Ubah produk')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-product action="update" :dataId="$id" :umkm="$umkm"/>
    </div>

</x-app-layout>
