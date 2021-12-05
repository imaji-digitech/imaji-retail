<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finance_id');
            $table->string('title');
            $table->integer('amount');
            $table->integer('price');
            $table->unsignedBigInteger('finance_unit_id');
            $table->timestamps();
            $table->foreign('finance_id')
                ->references('id')
                ->on('finances')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('finance_unit_id')
                ->references('id')
                ->on('finance_units')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_items');
    }
}
