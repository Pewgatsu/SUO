<?php

namespace App\Http\Controllers;

use App\Models\ComponentData;

class SearchController extends Controller
{
    public function index()
    {
        $data = ComponentData::all ();
        return view('search/index')->withData ( $data );
    }
}
