<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;

class SystemBuilderController extends Controller
{
    //
    public function index(){
        return view('systemBuilder/systemBuilder');
    }


    public function print(Request $request){
        $holder = array();
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
                        foreach (Models\Motherboard::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "cpus":
                        foreach ( Models\CPU::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "cpu_coolers":
                        foreach ( Models\CPUCooler::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "graphics_cards":
                        foreach (Models\GraphicsCard::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "rams":
                        foreach (Models\RAM::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "storages":
                        foreach (Models\Storage::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "psus":
                        foreach (Models\PSU::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                    case "computer_cases":
                        foreach (Models\ComputerCase::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        break;
                }
            }
        }

        //dd($holder);
        return view('components/showComponents',compact('holder'));
    }


}
