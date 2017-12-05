<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        
        // $result = Bittrex::getMarketSummaries();
        // print_f($result);
        // $coins = Coin::all();
        // $name = 'zhu';

        // return view('home')->with('coins', $coins);
    }
}
