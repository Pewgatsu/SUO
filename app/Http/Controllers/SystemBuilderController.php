<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemBuilderController extends Controller
{
    //
    public function index(){
        return view('systemBuilder/systemBuilder');
    }

}
