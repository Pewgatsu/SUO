<?php

namespace App\Http\Controllers;

use App\Models\ComponentData;

class ComponentInfoController extends Controller
{
    public function index()
    {
        return view('componentinfo/componentinfo');
    }
    public function show($component_name){
        $data = [
            'component_id'=>$component_id,
            'component_name',
            'component_type',
            'component_price',
            'manufacturer',
            'series',
            'model',
            'color',
            'length',
            'width',
            'height'
        ];

        return view( 'componentinfo/componentinfo',[
           'componentinfo' => $data[$component_name]??'Product'.$component_name.'does not exist'
        ]);
    }
}
