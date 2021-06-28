<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->string('image');
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->dateTime('dateTime');
            $table->string('category');
            $table->double('priceAdult');
            $table->double('priceKid');
            $table->boolean('available');
            $table->integer('inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
