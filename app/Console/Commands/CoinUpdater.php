<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Coin;
use Carbon\Carbon;

class CoinUpdater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CoinUpdater:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Coin';

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
        // $coin = new Coin;
        // $coin->name = 'AAA';
        // $coin->id = 1;
        // $coin->last = 0;
        // $coin->lowestAsk = 0;
        // $coin->highestBid = 0;
        // $coin->percentChange = 0;
        // $coin->baseVolume = 0;
        // $coin->quoteVolume = 0;
        // $coin->isFrozen = 0;
        // $coin->high24hr = 0;
        // $coin->low24hr = 0;
        // $coin->save();
        // Storage::disk('local')->put('file.txt', 'Contents');
        // error_log('command~');
        Log::info('cron job is at ' . Carbon::now());
    }
}
