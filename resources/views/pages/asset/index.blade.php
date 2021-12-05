<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('asset') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('asset')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="asset" :model="$asset" />
    </div>
</x-app-layout>
