<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Coin;
use Carbon\Carbon;
use AndreasGlaser\PPC\PPC;

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
        $pcc = new PPC();
        $result = $pcc->getTicker();
        $coinArray = $result->decoded;
        foreach($coinArray as $key => $value) {
            $coin = Coin::where('name', $key)->first();
            if ($coin === NULL) {
                $coin = new Coin;
                $coin->name = $key;
            }

            $coin->id = $value['id'];
            $coin->last = $value['last'];
            $coin->lowestAsk = $value['lowestAsk'];
            $coin->highestBid = $value['highestBid'];
            $coin->percentChange = $value['percentChange'];
            $coin->baseVolume = $value['baseVolume'];
            $coin->quoteVolume = $value['quoteVolume'];
            $coin->isFrozen = $value['isFrozen'];
            $coin->high24hr = $value['high24hr'];
            $coin->low24hr = $value['low24hr'];
            $coin->save();
        }

        Log::info('cron job is at ' . Carbon::now());
    }
}
