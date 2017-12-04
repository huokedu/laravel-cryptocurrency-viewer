<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Pepijnolivier\Bittrex\Bittrex;

class BittrexCoinUpdater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BittrexCoinUpdater:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Bittrex Coin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $result = Bittrex::getMarketSummaries();
        Log::info('bittrex cron job is at ' . $result);
    }
}
