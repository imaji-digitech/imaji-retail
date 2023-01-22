<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalCodes extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_sub_code_account_id');
            $table->unsignedBigInteger('product_type_id');
            $table->string('title');
            $table->string('code');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('journal_sub_code_account_id')
                ->references('id')
                ->on('journal_sub_code_accounts')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

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
        Schema::dropIfExists('journal_codes');
    }
}
