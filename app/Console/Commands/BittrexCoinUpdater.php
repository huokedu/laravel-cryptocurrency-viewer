<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\BittrexCoin;

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
        // create curl resource 
        $ch = curl_init(); 
        
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://bittrex.com/api/v1.1/public/getmarketsummaries"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $result1 = json_decode(curl_exec($ch)); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://bittrex.com/api/v1.1/public/getmarkets"); 
        
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $result2 = json_decode(curl_exec($ch)); 

        // close curl resource to free up system resources 
        curl_close($ch);
        
        $summaries = $result1->result;
        $markets = $result2->result;
        
        // check existency
        $savedCoins = BittrexCoin::all();
        foreach($savedCoins as $savedCoin) {
            $deleted = true;
            foreach($summaries as $summary) {
                if ($savedCoin->MarketName === $summary->MarketName) {
                    $deleted = false;
                }
            }

            // doesn't exist in live data
            if ($deleted) {
                $savedCoin->delete();
            }
        }

        foreach($summaries as $summary) {
            $coin = BittrexCoin::where('MarketName', '=', $summary->MarketName)->first();
            // $coin = BittrexCoin::find(`'` . $summary->MarketName . `'`);
            // not exist?
            if ($coin === NULL) {
                $coin = new BittrexCoin;
                $coin->MarketName = $summary->MarketName;
            }

            $coin->High = $summary->High;
            $coin->Low = $summary->Low;
            $coin->Volume = $summary->Volume;
            $coin->Last = $summary->Last;
            $coin->BaseVolume = $summary->BaseVolume;
            $coin->TimeStamp = $summary->TimeStamp; // "TimeStamp": "2017-12-04T02:52:58.233",
            $coin->Bid = $summary->Bid;
            $coin->Ask = $summary->Ask;
            $coin->OpenBuyOrders = $summary->OpenBuyOrders;
            $coin->OpenSellOrders = $summary->OpenSellOrders;
            $coin->PrevDay = $summary->PrevDay;
            $coin->Created = $summary->Created; // "Created": "2017-06-06T01:22:35.727"

            $found = false;
            foreach($markets as $market) {
                if ($summary->MarketName === $market->MarketName) {
                    $found = true;
                    $coin->MarketCurrency = $market->MarketCurrency;
                    $coin->BaseCurrency = $market->BaseCurrency;
                    $coin->MarketCurrencyLong = $market->MarketCurrencyLong;
                    $coin->BaseCurrencyLong = $market->BaseCurrencyLong;
        
                    $coin->MinTradeSize = $market->MinTradeSize;
                    $coin->IsActive = $market->IsActive; //"IsActive": true,
                    $coin->Notice = $market->Notice;
        
                    $coin->IsSponsored = $market->IsSponsored;
                    $coin->LogoUrl = $market->LogoUrl;
                    break;
                }
            }
            if ($found === true) {
                $coin->save();
            }
            
        }
        Log::info('bittrex cron job is at ' . Carbon::now());
    }
}
