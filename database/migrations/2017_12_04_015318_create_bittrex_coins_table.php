<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBittrexCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bittrex_coins', function (Blueprint $table) {
            $table->string('MarketName');
            $table->double('High');
            $table->double('Low');
            $table->double('Volume');
            $table->double('Last');
            $table->double('BaseVolume');
            $table->dateTime('TimeStamp');//"TimeStamp": "2017-12-04T02:52:58.233",
            $table->double('Bid');
            $table->double('Ask');
            $table->integer('OpenBuyOrders');
            $table->integer('OpenSellOrders');
            $table->double('PrevDay');
            $table->dateTime('Created');//"Created": "2017-06-06T01:22:35.727"

            $table->string('MarketCurrency');
            $table->string('BaseCurrency');
            $table->string('MarketCurrencyLong');
            $table->string('BaseCurrencyLong');

            $table->double('MinTradeSize');
            $table->boolean('IsActive');//"IsActive": true,
            $table->string('Notice')->nullable();
            $table->boolean('IsSponsored')->nullable();
            $table->string('LogoUrl', 255)->nullable();

            $table->timestamps();
            $table->primary('MarketName');
            $table->unique('MarketName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bittrex_coins');
    }
}
