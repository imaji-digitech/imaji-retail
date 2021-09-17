<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Customer Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Customer</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Buat Customer Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-customer action="create" />
    </div>
</x-app-layout>
