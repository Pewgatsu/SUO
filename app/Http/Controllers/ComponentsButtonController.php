<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsButtonController extends Controller
{
    //

    public function print(Request $request){
        $components=array(
                                    'motherboards' => '+',
                                    'cpus'=> '+',
                                    'cpu_coolers' => '+',
                                    'graphics_cards' => '+',
                                    'rams' => '+',
                                    'storages' => '+',
                                    'computer_cases' => '+'
                                 );
        $name = $request->input('selectedComponents');

        foreach ($components as $component) {
            if ($component ==$name ){
                $components[$component]=$name;
            }
        }
        //$name = $request->input('selectedComponents');
        dd($name);

        return redirect('/');
    }

//    public function returnData($value){
//        $motherboards = 'somedata';
//    }

}
