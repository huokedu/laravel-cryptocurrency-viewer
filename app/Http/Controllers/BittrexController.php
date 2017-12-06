<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BittrexCoin;

class BittrexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $coins = BittrexCoin::all();
        return view('bittrex')->with('coins', $coins);
    }

    public function getAllCoinInfo()
    {
        $coins = BittrexCoin::all();
        return response()->json(json_encode($coins));
    }

    public function showTradingView($marketName) {
        $splitNames = explode("-", $marketName);
        $symbol = "BITTREX:" . $splitNames[1] . $splitNames[0];
        return view('tradingview')->with('symbol', $symbol);
    }
}
