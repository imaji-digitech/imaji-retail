<?php

use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\CashBookController;
use App\Http\Controllers\Admin\CashNoteController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Models\CashBook;
use App\Models\CashNote;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Transaction;
use App\Models\TransactionPayment;
use App\Models\TransactionReturn;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/


Route::get('/register', function () {
    return redirect('/login');
});
Route::get('/', function () {
    return view('index');
})->name('user.home');

Route::get('/pesantren-kopi', function () {
    return view('kopi');
})->name('user.kopi');

Route::get('/suburganic', function () {
    return view('suburganic');
})->name('user.suburganic ');

Route::get('/bagon-craft', function () {
    return view('bagon');
})->name('user.bagon ');


Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('simple-qr-code', function () {
    return view('pdf.product');
});

Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum', 'web', 'verified'])->group(function () {
    Route::post('/summernote-upload', [SupportController::class, 'upload'])->name('summernote_upload');
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::resource('content', ContentController::class)->only(['index', 'create', 'edit']);
    Route::resource('product-type', ProductTypeController::class)->only(['index', 'create', 'edit']);
    Route::get('product-type/export/{id}', function ($id) {
        $umkm = ProductType::find($id);
        $turnover = 0;
        foreach ($umkm->products as $u) {
            $turnover += $u->transactionPaymentDetails->sum('total');
        }
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.umkm', compact('umkm', 'turnover'));
        return $pdf->stream('REPORT USAHA - ' . strtoupper($umkm->name) . '.pdf');
    })->name('product-type.export');
    Route::resource('product', ProductController::class)->only(['index', 'create', 'show', 'edit']);
    Route::resource('customer', CustomerController::class)->only(['index', 'create', 'show', 'edit']);
    Route::get('product/export/{id}', function ($id) {
        $product = Product::findOrFail($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.product', compact('product'));
        return $pdf->stream('REPORT PRODUK - ' . strtoupper($product->name) . '.pdf');
    })->name('product.export');

    Route::get('product/stock/{id}', [ProductController::class, 'stock'])->name('product.stock');
    Route::get('product/history/{id}', [ProductController::class, 'history'])->name('product.history');

//    Route::resource('cash-book', CashBookController::class)->only(['index', 'create', 'edit']);
    Route::get('/cash-book/{umkm}', [CashBookController::class, 'index'])->name('cash-book.index');
    Route::get('/cash-book/{umkm}/create', [CashBookController::class, 'create'])->name('cash-book.create');
    Route::get('/cash-book/{umkm}/edit/{id}', [CashBookController::class, 'edit'])->name('cash-book.edit');

//    Route::resource('cash-note', CashNoteController::class)->only(['index', 'create', 'edit', 'show']);
    Route::get('/cash-note/{umkm}', [CashNoteController::class, 'index'])->name('cash-note.index');
    Route::get('/cash-note/{umkm}/create', [CashNoteController::class, 'create'])->name('cash-note.create');
    Route::get('/cash-note/{umkm}/edit/{id}', [CashNoteController::class, 'edit'])->name('cash-note.edit');
    Route::get('/cash-note/{umkm}/show/{id}', [CashNoteController::class, 'show'])->name('cash-note.show');
    Route::get('/cash-note/{umkm}/export{id}', function ($umkm, $id) {
        $umkm = ProductType::find($umkm);
        $c1 = CashNote::find($id);
        $c = CashNote::whereProductTypeId($umkm->id)->where('id', '<', $id)->orderByDesc('id')->first();
        $cashBooks = CashBook::whereProductTypeId($umkm->id)
            ->where('id', '<=', $c1->cash_book_id)
            ->where('id', '>=', $c->cash_book_id)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.cash-note', compact('cashBooks', 'c1', 'c', 'umkm'));
        return $pdf->stream();
    })->name('cash-note.export');

    Route::get('/product/manufacture/{id}', [ProductController::class, 'manufacture'])->name('product.manufacture');
    Route::post('/product', [ProductController::class, 'graph'])->name('product.graph');
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('/transaction/history', [TransactionController::class, 'history'])->name('transaction.history');

    Route::get('/transaction/active', [TransactionController::class, 'active'])->name('transaction.active');
    Route::get('/transaction/payment/{id}', [TransactionController::class, 'payment'])->name('transaction.payment');
    Route::get('/transaction/payment/export/{id}', function ($id) {
        $transaction = TransactionPayment::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.payment', compact('transaction'))->setPaper([0, 0, 470.00, 603.80], 'landscape');
        return $pdf->stream('NOTA PEMBAYARAN - ' . $transaction->transaction->no_invoice . ' - ' . $transaction->transaction->user->name . '.pdf');
    })->name('transaction.payment.export');

    Route::get('/transaction/return/{id}', [TransactionController::class, 'return'])->name('transaction.return');
    Route::get('/transaction/return/export/{id}', function ($id) {
        $transaction = TransactionReturn::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.return', compact('transaction'))->setPaper([0, 0, 470.00, 603.80], 'landscape');
        return $pdf->stream('NOTA RETURN - ' . $transaction->transaction->no_invoice . ' - ' . $transaction->transaction->user->name . '.pdf');
    })->name('transaction.return.export');

    Route::get('/transaction/show/{id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/transaction/export/{id}', function ($id) {
        $transaction = Transaction::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.invoice', compact('transaction'))->setPaper([0, 0, 470.00, 603.80], 'landscape');
        return $pdf->stream('INVOICE - ' . $transaction->no_invoice . ' - ' . $transaction->user->name . '.pdf');
    })->name('transaction.export');

    Route::resource('finance', FinanceController::class)->only(['index','create','show','edit']);
    Route::get('finance/{id}/comparison',[FinanceController::class,'comparison'])->name('finance.comparison');
    Route::get('finance/{id}/note',[FinanceController::class,'note'])->name('finance.note.index');
    Route::get('finance/{id}/note/create',[FinanceController::class,'noteCreate'])->name('finance.note.create');
    Route::get('finance/note/{note}',[FinanceController::class,'noteShow'])->name('finance.note.show');
    Route::get('finance/{id}/spj',[FinanceController::class,'noteSubmit'])->name('finance.note.submit');

    Route::resource('asset', AssetController::class)->only(['index','create','show','edit']);

    Route::get('/user', [UserController::class, "index"])->name('user');
    Route::view('/user/new', "pages.user.create")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');

    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });
});
