<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournals extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_code_id');
            $table->unsignedBigInteger('journal_transaction_id');
            $table->integer('credit');
            $table->integer('debit');
            $table->integer('note');
            $table->timestamps();

            $table->foreign('journal_code_id')
                ->references('id')
                ->on('journal_codes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('journal_transaction_id')
                ->references('id')
                ->on('journal_transactions')
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
        Schema::dropIfExists('journals');
    }
}
