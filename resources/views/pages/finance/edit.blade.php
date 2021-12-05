<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah keuangan') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.finance.index') }}">{{__('keuangan')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Ubah keuangan')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-finance action="update" :dataId="$id"/>
    </div>

</x-app-layout>
