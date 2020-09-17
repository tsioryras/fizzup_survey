<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFizzupSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fizzup_surveys', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable(false);
            $table->foreign('customer_id')->references('id')->on('fizzup_customers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fizzup_surveys', function (Blueprint $table) {
            //
        });
    }
}
