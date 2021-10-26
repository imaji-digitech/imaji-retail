<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Stock produk') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{__('Produk')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Stock produk')}}</a></div>
        </div>
    </x-slot>

    <div>
{{--        {{dd($id)}}--}}
        <livewire:product-stock :dataId="$id"/>
    </div>

</x-app-layout>
