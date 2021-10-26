<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('History Produk - '. $p->title) }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{route('admin.product.index')}}">{{__('Produk')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('History Produk')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.product name="product-history" :model="$product" :dataId="$dataId"/>
    </div>
</x-app-layout>
