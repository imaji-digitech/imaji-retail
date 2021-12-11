<?php

namespace Database\Seeders;

use App\Models\AssetCode;
use App\Models\AssetOwnership;

use App\Models\AssetState;
use App\Models\CodeCashBook;
use App\Models\FinanceStatus;
use App\Models\FinanceUnit;
use App\Models\PaymentStatus;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        AssetOwnership::create(['title'=>'Bumdes']);
        AssetOwnership::create(['title'=>'Desa']);
        AssetOwnership::create(['title'=>'Imaji']);
        AssetOwnership::create(['title'=>'Pribadi']);

        AssetState::create(['title'=>'Layak pakai']);
        AssetState::create(['title'=>'Cacat']);
        AssetState::create(['title'=>'Rusak']);
        AssetState::create(['title'=>'Tidak layak pakai']);
        AssetState::create(['title'=>'Aktif']);
        AssetState::create(['title'=>'TIdak aktif']);

        AssetCode::create(['type'=>'Asset tetap', 'code'=>'0101', 'title'=>'Tanah']);
        AssetCode::create(['type'=>'Asset tetap', 'code'=>'0102', 'title'=>'Mesin']);
        AssetCode::create(['type'=>'Asset tetap', 'code'=>'0103', 'title'=>'Bangunan']);
        AssetCode::create(['type'=>'Asset tetap', 'code'=>'0104', 'title'=>'Kendaraan']);
        AssetCode::create(['type'=>'Asset tetap', 'code'=>'0105', 'title'=>'Furnitur']);
        AssetCode::create(['type'=>'Asset tetap', 'code'=>'0106', 'title'=>'Peralatan']);
        AssetCode::create(['type'=>'Asset lancar', 'code'=>'0107', 'title'=>'Dana tunai']);
        AssetCode::create(['type'=>'Asset lancar', 'code'=>'0108', 'title'=>'Investasi jangka pendek']);
        AssetCode::create(['type'=>'Asset lancar', 'code'=>'0109', 'title'=>'Piutang']);
        AssetCode::create(['type'=>'Asset tidak berwujud', 'code'=>'0310', 'title'=>'Hak cipta']);
        AssetCode::create(['type'=>'Asset tidak berwujud', 'code'=>'0311', 'title'=>'Hak sewa']);
        AssetCode::create(['type'=>'Asset tidak berwujud', 'code'=>'0312', 'title'=>'Franchise']);

        FinanceStatus::create(['title'=>'Waiting']);
        FinanceStatus::create(['title'=>'Accepted']);
        FinanceStatus::create(['title'=>'Decline']);
        FinanceStatus::create(['title'=>'Revision']);
        FinanceStatus::create(['title'=>'Nothing']);

        FinanceUnit::create(['title'=>'pcs']);
        FinanceUnit::create(['title'=>'pack']);
        FinanceUnit::create(['title'=>'kg']);
        FinanceUnit::create(['title'=>'ml']);
        FinanceUnit::create(['title'=>'paket']);
        FinanceUnit::create(['title'=>'lembar']);
        FinanceUnit::create(['title'=>'OH']);
        FinanceUnit::create(['title'=>'box']);
        FinanceUnit::create(['title'=>'meter']);


        // \App\Models\User::factory(10)->create();
        Status::create(['title' => 'Belum terbayar']);
        Status::create(['title' => 'Sebagian terbayar']);
        Status::create(['title' => 'Sudah terbayar']);

        PaymentStatus::create(['title' => 'Transfer']);
        PaymentStatus::create(['title' => 'Tunai']);
        PaymentStatus::create(['title' => 'Piutang Usaha']);

        CodeCashBook::create(['title' => 'Kas Awal']);
        CodeCashBook::create(['title' => 'Pendanaan']);
        CodeCashBook::create(['title' => 'Pendapatan']);
        CodeCashBook::create(['title' => 'Biaya Produksi']);
        CodeCashBook::create(['title' => 'Pembelian']);
        CodeCashBook::create(['title' => 'Hutang']);
        CodeCashBook::create(['title' => 'Piutang']);
        CodeCashBook::create(['title' => 'Biaya Pemasaran']);
        CodeCashBook::create(['title' => 'Biaya Packing']);
        CodeCashBook::create(['title' => 'Biaya Transportasi']);
        CodeCashBook::create(['title' => 'Biaya Listrik']);
        CodeCashBook::create(['title' => 'Biaya Air']);
        CodeCashBook::create(['title' => 'Biaya Upah']);
        CodeCashBook::create(['title' => 'Prive']);
        CodeCashBook::create(['title' => 'Musibah']);
        CodeCashBook::create(['title' => 'Lainnya']);
        CodeCashBook::create(['id' => 999, 'title' => 'Pembukaan toko']);

//        User::create('')
    }
}
