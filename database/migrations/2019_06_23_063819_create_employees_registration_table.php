<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employees_registration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('attendance_registration');
            $table->string('exist_registration')->nullable();
            $table->string('temprory_out_registration')->nullable();
            $table->string('return_registration')->nullable();
            $table->string('day');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('employees_registration');
    }
}
