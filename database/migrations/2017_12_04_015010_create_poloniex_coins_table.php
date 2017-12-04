<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoloniexCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poloniex_coins', function (Blueprint $table) {
            $table->string('name');
            $table->integer('id');
            $table->double('last');
            $table->double('lowestAsk');
            $table->double('highestBid');
            $table->double('percentChange');
            $table->double('baseVolume');
            $table->double('quoteVolume');
            $table->integer('isFrozen');
            $table->double('high24hr');
            $table->double('low24hr');
            $table->timestamps();
            $table->primary('name');
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poloniex_coins');
    }
}
