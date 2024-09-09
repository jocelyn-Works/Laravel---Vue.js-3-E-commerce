<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dashboard() 
    {
        $data=[
            'title' =>'Dashboard'
        ];
        return view('admin.dashboard', $data);
    }
}
