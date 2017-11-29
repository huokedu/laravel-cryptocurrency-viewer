<?php

namespace App\Helpers;

use AndreasGlaser\PPC\PPC;
use App\Coin;

class CoinUpdater
{

  public function __construct() {

  }
  /**
   * Define the application's command schedule.
   *
   * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
   * @return void
   */
  public function update()
  {
    $coins = Coin::all();

    // $pcc = new PPC();
    // $result = $pcc->getTicker();
    // print_r(count($result->decoded));
    $coin = new Coin;
    $coin->name = 'AAA';
    $coin->id = 1;
    $coin->last = 0;
    $coin->lowestAsk = 0;
    $coin->highestBid = 0;
    $coin->percentChange = 0;
    $coin->baseVolume = 0;
    $coin->quoteVolume = 0;
    $coin->isFrozen = 0;
    $coin->high24hr = 0;
    $coin->low24hr = 0;
    error_log('haha', 0);
  }
}
