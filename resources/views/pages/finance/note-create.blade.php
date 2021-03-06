<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Menambahkan keuangan baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.finance.note.create',$id) }}">{{__('keuangan')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Menambahkan keuangan baru')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-finance-note action="create" financeId="{{$id}}"/>
    </div>
</x-app-layout>
