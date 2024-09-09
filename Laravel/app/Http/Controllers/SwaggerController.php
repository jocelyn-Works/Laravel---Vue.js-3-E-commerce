<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
    public function SwaggerShow(){
        return view('apiSwagger');
    }
}
