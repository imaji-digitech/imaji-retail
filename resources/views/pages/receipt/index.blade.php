<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Customer') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Customer</a></div>
        </div>
    </x-slot>

    <div>
{{--        {{ $umkm }}--}}
        <livewire:table.main name="receipt" :model="$receipt" :dataId="$umkm" />
    </div>
</x-app-layout>
