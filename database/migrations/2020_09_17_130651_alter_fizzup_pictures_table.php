<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFizzupPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fizzup_pictures', function (Blueprint $table) {
            $table->unsignedInteger('survey_id')->nullable(true);
            $table->foreign('survey_id')->references('id')->on('fizzup_surveys')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fizzup_pictures', function (Blueprint $table) {
            //
        });
    }
}
