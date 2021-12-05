<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->integer('amount');
            $table->integer('nominal');
            $table->unsignedBigInteger('asset_state_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('asset_code_id');
            $table->unsignedBigInteger('asset_ownership_id');
            $table->timestamps();

            $table->foreign('asset_state_id')
                ->references('id')
                ->on('asset_states')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('asset_code_id')
                ->references('id')
                ->on('asset_codes')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('asset_ownership_id')
                ->references('id')
                ->on('asset_ownerships')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
