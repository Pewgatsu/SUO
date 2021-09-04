<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class SystemBuilderController extends Controller
{
    //
    public function index(){
        return view('systemBuilder/systemBuilder');
    }


    public function print(Request $request){
        $components=array(
            'motherboards' => '+',
            'cpus'=> '+',
            'cpu_coolers' => '+',
            'graphics_cards' => '+',
            'rams' => '+',
            'storages' => '+',
            'psus' => '+' ,
            'computer_cases' => '+'
        );

        $component=array('type'=>'');
        $component['type'] = $request->input('selectedComponents');
        foreach ($components as $key=> $comp) {
            if ($key == $component['type'] ){
                $components[$key]=$component['type'];


                switch ($key){
                    case "motherboards":
                        $holder = Models\Motherboard::all();
                        break;
                    case "cpus":
                        $holder = Models\CPU::all();
                        break;
                    case "cpu_coolers":
                        $holder = Models\CPUCooler::all();
                        break;
                    case "graphics_cards":
                        $holder = Models\GraphicsCard::all();
                        break;
                    case "rams":
                        $holder = Models\RAM::all();
                        break;
                    case "storages":
                        $holder = Models\Storage::all();
                        break;
                    case "psus":
                        $holder = Models\PSU::all();
                        break;
                    case "computer_cases":
                        $holder = Models\ComputerCase::all();
                        break;
                }
            }
        }

        return view('components/showComponents',compact('holder'));
    }


}
