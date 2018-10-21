<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('1=Admin,2=Manager,3=accountant,4=pathlogist,5=it,6=receiptionist,7=security guard');
            $table->string('name');
            $table->integer('mobile');
            $table->integer('age')->nullable();
            $table->tinyInteger('gender');
            $table->string('nid')->nullable();
            $table->string('degree')->nullable();
            $table->date('joining_date');
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
        Schema::drop('stuffs');
    }
}
