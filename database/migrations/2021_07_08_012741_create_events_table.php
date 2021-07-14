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
            $table->text('image');
            $table->string('title');
            $table->foreignId('categories_id')->constrained();
            $table->string('description');
            $table->string('location');
            $table->dateTime('dateTime');
            $table->double('priceAdult');
            $table->double('priceKid');
            $table->boolean('available');
            $table->integer('inventory');
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
        Schema::dropIfExists('events');
    }
}
