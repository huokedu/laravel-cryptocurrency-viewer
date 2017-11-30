<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AndreasGlaser\PPC\PPC;
use App\Coin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // print_r(($result->decoded));
        
        // error_log('ok');


        // return view('home');

        // $array = array(
        //     'fruit1' => 'apple',
        //     'fruit2' => 'orange',
        //     'fruit3' => 'grape',
        //     'fruit4' => 'apple',
        //     'fruit5' => 'apple');
        // foreach($array as $key => $value)
        // {
            
        // }

        // print_r($array);
    }
}
