<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PoloniexCoin;

class PoloniexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('cors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $coins = PoloniexCoin::all();
        return view('poloniex')->with('coins', $coins);
    }

    // public function getAllCoinInfo()
    // {
    //     $coins = BittrexCoin::all();
    //     return response()->json(json_encode($coins));
    // }

    public function showTradingView($marketName) {
        $splitNames = explode("_", $marketName);
        $symbol = "POLONIEX:" . $splitNames[1] . $splitNames[0];
        return view('tradingview')->with('symbol', $symbol);
    }
}
