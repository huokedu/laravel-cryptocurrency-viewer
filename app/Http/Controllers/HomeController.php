<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AndreasGlaser\PPC\PPC;

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
        
        print_r(($result->decoded));
        // var_dump(gettype($result));
        error_log('ok');
        // return view('home');
    }
}
