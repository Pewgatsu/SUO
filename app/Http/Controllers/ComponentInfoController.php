<?php

namespace App\Http\Controllers;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentInfoController extends Controller
{
    public function index()
    {
        return view('componentinfo/componentinfo');
    }
    public function show($component_name){
        $data = [
            'component_id',
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
    public function print(Request $request){

        $holder = array();
        $holder2 = array();
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
        $component['type'] = $request->input('');
        foreach ($components as $key=> $comp) {
            if ($key == $component['type'] ){
                $components[$key]=$component['type'];

                switch ($key){
                    case "motherboards":
                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\Motherboard::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;

                    case "cpus":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach ( Models\CPU::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;

                    case "cpu_coolers":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach ( Models\CPUCooler::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;
                    case "graphics_cards":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\GraphicsCard::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;

                    case "rams":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\RAM::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;

                    case "storages":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\Storage::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;

                    case "psus":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\PSU::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;
                    case "computer_cases":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\ComputerCase::all() as $hold){
                            $id = DB::table('component')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }

                        break;
                }
            }
        }
        return view('components/showComponents',compact('holder'));
    }
}
