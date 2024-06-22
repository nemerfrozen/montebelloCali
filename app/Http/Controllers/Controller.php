<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;
    //pico y placa
    public function picoPlaca(){
        return view('util.pico-placa');
    }

    // wizard
    public function wizard(){
        return view('components.wizard');
    }
}
