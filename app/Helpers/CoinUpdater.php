<?php

namespace App\Helpers;

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
      error_log('haha', 0);
  }
}
