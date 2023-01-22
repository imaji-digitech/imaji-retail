<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalSubCodeAccounts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_sub_code_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_code_account_id');
            $table->string('title');
            $table->string('code');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('journal_code_account_id')
                ->references('id')
                ->on('journal_code_accounts')
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
        Schema::dropIfExists('journal_sub_code_accounts');
    }
}
