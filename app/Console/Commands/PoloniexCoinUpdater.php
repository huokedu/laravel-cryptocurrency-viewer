<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\PoloniexCoin;
use Carbon\Carbon;
use AndreasGlaser\PPC\PPC;

class PoloniexCoinUpdater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PoloniexCoinUpdater:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Poloniex Coin';

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
        $ch = curl_init(); 
        
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://poloniex.com/public?command=returnTicker"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $coinArray = json_decode(curl_exec($ch)); 

        // close curl resource to free up system resources 
        curl_close($ch);

        $savedCoins = PoloniexCoin::all();
        foreach($savedCoins as $savedCoin) {
            $deleted = true;
            foreach($coinArray as $key => $value) {
                if ($savedCoin->name === $key) {
                    // print_r($key.'<br/>');
                    $deleted = false;
                }
            }

            // doesn't exist in live data
            if ($deleted) {
                $savedCoin->delete();
            }
        }

        $coins = PoloniexCoin::all();

        foreach($coinArray as $key => $value) {
            $find = false;
            foreach($coins as $coin) {
                if ($key === $coin->name) {
                    $find = true;
                    $coin->id = $value->id;
                    $coin->last = $value->last;
                    $coin->lowestAsk = $value->lowestAsk;
                    $coin->highestBid = $value->highestBid;
                    $coin->percentChange = $value->percentChange;
                    $coin->baseVolume = $value->baseVolume;
                    $coin->quoteVolume = $value->quoteVolume;
                    $coin->isFrozen = $value->isFrozen;
                    $coin->high24hr = $value->high24hr;
                    $coin->low24hr = $value->low24hr;
                    $coin->save();
                    break;
                }
            }
            if (!$find) {
                $newCoin = new PoloniexCoin;
                $newCoin->name = $key;
                $newCoin->id = $value->id;
                $newCoin->last = $value->last;
                $newCoin->lowestAsk = $value->lowestAsk;
                $newCoin->highestBid = $value->highestBid;
                $newCoin->percentChange = $value->percentChange;
                $newCoin->baseVolume = $value->baseVolume;
                $newCoin->quoteVolume = $value->quoteVolume;
                $newCoin->isFrozen = $value->isFrozen;
                $newCoin->high24hr = $value->high24hr;
                $newCoin->low24hr = $value->low24hr;
                $newCoin->save();
            }
        }

        Log::info('poloniex cron job is at ' . Carbon::now());
    }
}
