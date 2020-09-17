<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFizzupCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fizzup_customers', function (Blueprint $table) {
            $table->increments('id');//primary key
            $table->string('email')->unique()->nullable(false);//could be use as key
            $table->string('pseudo')->unique()->nullable(false);//could be use as key
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
        Schema::dropIfExists('fizzup_customers');
    }
}
