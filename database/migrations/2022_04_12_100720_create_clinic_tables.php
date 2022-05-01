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
        //
        Schema::create('customer', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->text('title');
            $table->text('lname');
            $table->text('fname');
            $table->text('addressline');
            $table->text('town');
            $table->text('zipcode');
            $table->text('phone');
            $table->text('img_path') -> default('default_customer.png');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pet', function ($table) {
            $table->increments('id');
            $table->text('pet_name');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->text('age');
            $table->text('img_path') -> default('default_pet.png');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('employee', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('lname');
            $table->text('fname');
            $table->text('phone');
            $table->text('img_path') -> default('default_employee.png');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('groom_service', function ($table) {
            $table->increments('id');
            $table->text('groom_name');
            $table->float('price');
            $table->text('description');
            $table->text('img_path') -> default('default_service.png');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
        Schema::dropIfExists('groom_service');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('pet');
    }
};
