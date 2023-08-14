<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpeditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expeditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dest_id');
            $table->foreign('dest_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->enum('route',['Darat','Laut']);
            $table->enum('type',['Kereta','Truck Kontainer','Kapal']);
            $table->integer('capacity');
            $table->integer('time_taken');
            $table->integer('cost');
            $table->integer('ratingSpeed');
            $table->integer('ratingQuality');
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
        Schema::dropIfExists('expeditions');
    }
}
