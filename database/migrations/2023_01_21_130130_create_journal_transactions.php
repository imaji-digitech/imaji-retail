<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_transactions', function (Blueprint $table) {
//            journal_transaction
//umkm_id
//title -> (generate from jumlah jurnal di input pada umkm itu)
//date
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->date('transaction_date');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_transactions');
    }
}
