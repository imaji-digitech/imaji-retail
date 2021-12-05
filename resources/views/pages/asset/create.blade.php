<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Menambahkan asset baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.asset.index') }}">{{__('asset')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Menambahkan asset baru')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-asset action="create"/>
    </div>
</x-app-layout>
