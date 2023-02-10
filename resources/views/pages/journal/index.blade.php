@php use App\Models\ProductType; @endphp
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Jurnal '. ProductType::find($umkm)->title) }}</h1>

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
            <div class="p-4 mt-2 bg-white">
                <a href="{{ route('admin.journal.report-ledger',$umkm) }}" class="btn btn-primary" style="width: 100%">
                    Laporan buku besar
                </a>
                <br><br>
                <a href="{{ route('admin.journal.report-trial-balance',$umkm) }}" class="btn btn-success" style="width: 100%">
                    Laporan neraca saldo
                </a>
                <br><br>
                <a href="{{ route('admin.journal.report-worksheet',$umkm) }}" class="btn btn-danger" style="width: 100%">
                    Laporan neraca lajur
                </a>
                <br><br>
                <hr style="border:1px solid #8d8d8d">
                <br>
                <a href="{{ route('admin.journal.report-journal',[$umkm,'JU']) }}" class="btn btn-warning"
                   style="width: 100%">
                    Laporan jurnal umum
                </a>
                <br><br>
                <a href="{{ route('admin.journal.report-journal',[$umkm,'AJP']) }}" class="btn btn-warning"
                   style="width: 100%">
                    Laporan jurnal penyesuaian
                </a>
                <br><br>
                <a href="{{ route('admin.journal.report-journal',[$umkm,'JPtp']) }}" class="btn btn-warning"
                   style="width: 100%">
                    Laporan jurnal penutup
                </a>
                <br><br>
                <a href="{{ route('admin.journal.report-journal',[$umkm,'JPb']) }}" class="btn btn-warning"
                   style="width: 100%">
                    Laporan jurnal pembalik
                </a>
            </div>
        </div>
        <div class="col-md-6 mt-4">

        </div>
    </div>
</x-app-layout>
