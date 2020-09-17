<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFizzupSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fizzup_surveys', function (Blueprint $table) {
            $table->increments('id');//primary key
            $table->string('product_reference')->nullable(true);//product reference
            $table->text('comment')->nullable(true);//could be NULL
            $table->integer('note')->default(0);//note between 0 and 5
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
        Schema::dropIfExists('fizzup_surveys');
    }
}
