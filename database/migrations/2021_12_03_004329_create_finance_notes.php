<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_notes', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->unsignedBigInteger('finance_id');
            $table->foreign('finance_id')
                ->references('id')
                ->on('finances')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_notes');
    }
}
