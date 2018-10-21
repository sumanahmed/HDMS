<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->integer('mobile');
            $table->text('address')->nullable();
            $table->text('problem');
            $table->string('blood_precure');
            $table->integer('weight');
            $table->integer('supervise_doctor_id')->unsigned()->nullable();
            $table->integer('test_id')->unsigned()->nullable();
            $table->integer('prescription_id')->unsigned()->nullable();
            $table->integer('patient_current_status_id')->unsigned()->nullable();
            $table->text('image')->nullable();
            $table->rememberToken();
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
        Schema::drop('patients');
    }
}
