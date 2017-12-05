<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BittrexCoin extends Model
{
    //
    protected $primaryKey = 'MarketName';
    public $incrementing = false;
}
