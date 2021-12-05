<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_rab_id');
            $table->text('rab_note')->nullable();
            $table->text('rab_revision_note')->nullable();
            $table->unsignedBigInteger('status_spj_id');
            $table->text('spj_note')->nullable();
            $table->text('spj_revision_note')->nullable();
            $table->timestamps();
            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('status_rab_id')
                ->references('id')
                ->on('finance_statuses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('status_spj_id')
                ->references('id')
                ->on('finance_statuses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('finances');
    }
}
