<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WebSocket\Client;
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
        $coins = Coin::all();
        $name = 'zhu';

        return view('home')->with('coins', $coins);
    }
}
