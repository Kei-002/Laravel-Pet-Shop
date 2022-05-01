<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactionline', function (Blueprint $table) {
            $table-> increments('id');
            $table->integer('transac_id')->unsigned();
            $table->foreign('transac_id')->references('id')->on('transactioninfo');

            $table->integer('service_id') ->unsigned();
            $table->foreign('service_id')->references('id')->on('groom_service');
            
            $table->integer('pet_id') ->unsigned();
            $table->foreign('pet_id')->references('id')->on('pet');

            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactionline');
    }
};
