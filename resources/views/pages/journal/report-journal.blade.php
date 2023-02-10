<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __( \App\Models\JournalTransactionType::whereCode($type)->first()->title. ' - '. \App\Models\ProductType::find($umkm)->title) }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.journal.index',$umkm) }}">{{__('Jurnal')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Buku Besar')}}</a></div>
        </div>
    </x-slot>
    <div>
        <livewire:journal.report-journal :umkm="$umkm" :type="$type"/>
    </div>
</x-app-layout>
