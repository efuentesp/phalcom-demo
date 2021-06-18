<?php

namespace App\Controllers;

use App\Controllers\HttpExceptions\Http400Exception;
use App\Controllers\HttpExceptions\Http422Exception;
use App\Controllers\HttpExceptions\Http500Exception;
//use App\Services\AbstractService;

class SayController //extends AbstractController
{
    
    function currentDate() {
        echo date('Y-m-d');
    }
}