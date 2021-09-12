<?php

namespace App\Http\Controllers;

use App\Models\ComponentData;

class ComponentInfoController extends Controller
{
    public function index()
    {
        $data = ComponentData::all ();
        return view('componentinfo/componentinfo')->withData ( $data );
    }
}
