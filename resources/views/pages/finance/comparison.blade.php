<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('keuangan') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('keuangan')}}</a></div>
        </div>
    </x-slot>

    <div class="bg-white p-3 rounded">
        <livewire:finance-comparison dataId="{{$id}}" />
    </div>
</x-app-layout>
