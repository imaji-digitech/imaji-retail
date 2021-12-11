<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Produk') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Produk')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.product name="product" :model="$product" :dataId="$umkm" />
    </div>
</x-app-layout>
