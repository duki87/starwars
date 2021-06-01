<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomeworldToSpecies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->unsignedInteger('planet_id')->nullable();
        });

        Schema::table('species', function (Blueprint $table) {
            $table->foreign('planet_id')->references('id')->on('planets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('species', function (Blueprint $table) {
            //
        });
    }
}
