<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WebSocket\Client;
use Illuminate\Support\Facades\Log;
// use Pepijnolivier\Bittrex\Bittrex;
use Angelkurten\Bittrex\Bittrex;

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
        // create curl resource 
        $ch = curl_init(); 
        
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://bittrex.com/api/v1.1/public/getmarketsummaries"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);
        print_r($output);     
        // $result = Bittrex::getMarketSummaries();
        // print_f($result);
        // $coins = Coin::all();
        // $name = 'zhu';

        // return view('home')->with('coins', $coins);
    }
}
