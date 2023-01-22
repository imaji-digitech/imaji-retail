<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Jurnal') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Jurnal')}}</a></div>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <livewire:table.main name="journal-transaction" :model="$journalTransaction" :dataId="$umkm"/>
        </div>
        <div class="col-md-6 mt-4">
            <livewire:table.main name="journal-code" :model="$journalCode" :dataId="$umkm"/>
        </div>

        <div class="col-md-6 mt-4">
            <div class="p-4 mt-2 bg-white" x-data="window.__controller.dataTableMainController()"
                 x-init="setCallback();">
                <a href="" class="btn btn-primary" style="width: 100%">
                    Laporan Neraca
                </a>
                <br>
                <br>
                <a href="" class="btn btn-primary" style="width: 100%">
                    Laporan Neraca
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
