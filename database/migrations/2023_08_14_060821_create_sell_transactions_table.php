<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sell_id');
            $table->foreign('sell_id')->references('id')->on('sells')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('inv_id');
            $table->foreign('inv_id')->references('id')->on('inventories')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount');
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
        Schema::dropIfExists('sell_transactions');
    }
}
