<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpizode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epizode', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('broj');
            $table->text('opis');
            $table->integer('sezona_id')->unsigned();
            $table->timestamps();

            $table->foreign('sezona_id')->references('id')->on('sezone')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epizode');
    }
}
