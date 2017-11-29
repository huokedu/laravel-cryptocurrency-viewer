<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->integer('id');
            $table->double('last');
            $table->double('lowestAsk');
            $table->double('highestBid');
            $table->double('percentChange');
            $table->double('baseVolume');
            $table->double('quoteVolume');
            $table->double('isFrozen');
            $table->double('high24hr');
            $table->double('low24hr');
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
        Schema::dropIfExists('coins');
    }
}
