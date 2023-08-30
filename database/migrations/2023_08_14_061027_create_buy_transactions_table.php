<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expedition_id');
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buy_id');
            $table->foreign('buy_id')->references('id')->on('buys')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('inv_id');
            $table->foreign('inv_id')->references('id')->on('inventories')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount');
            $table->integer('demand_fulfilled');
            $table->enum('status',['sending','arrived','sold']);
            $table->dateTime('sent_at');
            $table->dateTime('arrived_at');
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
        Schema::dropIfExists('buy_transactions');
    }
}
