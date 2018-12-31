<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dht22;

class Dht22Controller extends Controller
{
       public function index()
        {
        error_log ("*** Dht22Controller index() ***");

        $datas = Dht22::all();
           return $datas;
        }
}
