<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;

class SystemBuilderController extends Controller
{
    //
    public function index(){

        return view('systemBuilder.builder');
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

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\Motherboard::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session motherboards is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('motherboards')) {
                            session(['motherboards'=> 'pressed motherboard again','motherboardsPrice'=>'10']);
                        }else{
                            session(['motherboards'=> 'pressed motherboard','motherboardsPrice'=>'00','motherboardsCheckBox'=>' ','motherboardsOrder'=>' ']);
                        }

                        break;

                    case "cpus":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach ( Models\CPU::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session cpus is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('cpus')) {
                            session(['cpus'=> 'pressed cpus again','cpusPrice'=>'10']);
                        }else{
                            session(['cpus'=> 'pressed cpus','cpusPrice'=>'00','cpusCheckBox'=>' ','cpusOrder'=>' ']);
                        }

                        break;

                    case "cpu_coolers":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach ( Models\CPUCooler::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session cpu_coolers is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('cpu_coolers')) {
                            session(['cpu_coolers'=> 'pressed cpu_coolers again','cpu_coolersPrice'=>'10']);
                        }else{
                            session(['cpu_coolers'=> 'pressed cpu_coolers','cpu_coolersPrice'=>'00','cpu_coolersCheckBox'=>' ','cpu_coolersOrder'=>' ']);
                        }

                        break;
                    case "graphics_cards":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\GraphicsCard::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session graphics_cards is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('graphics_cards')) {
                            session(['graphics_cards'=> 'pressed graphics_cards again','graphics_cardsPrice'=>'10']);
                        }else{
                            session(['graphics_cards'=> 'pressed graphics_cards','graphics_cardsPrice'=>'00','graphics_cardsCheckBox'=>' ','graphics_cardsOrder'=>' ']);
                        }

                        break;

                    case "rams":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\RAM::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session rams is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('rams')) {
                            session(['rams'=> 'pressed rams again','ramsPrice'=>'10']);
                        }else{
                            session(['rams'=> 'pressed rams','ramsPrice'=>'00','ramsCheckBox'=>' ','ramsOrder'=>' ']);
                        }

                        break;

                    case "storages":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\Storage::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session storages is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('storages')) {
                            session(['storages'=> 'pressed storages again','storagesPrice'=>'10']);
                        }else{
                            session(['storages'=> 'pressed storages','storagesPrice'=>'00','storagesCheckBox'=>' ','storagesOrder'=>' ']);
                        }

                        break;

                    case "psus":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\PSU::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session psus is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('psus')) {
                            session(['psus'=> 'pressed psus again','psusPrice'=>'10']);
                        }else{
                            session(['psus'=> 'pressed psus','psusPrice'=>'00','psusCheckBox'=>' ','psusOrder'=>' ']);
                        }

                        break;
                    case "computer_cases":

                        //Fetch the name and component id in the database using eloquent and query builder
                        foreach (Models\ComputerCase::all() as $hold){
                            $id = DB::table('components')->find($hold->component_id);
                            array_push($holder, array('id' =>$id->id, 'name'=>$id->name));
                        }
                        //checks if session computer_cases is created? TRUE overrides the content : FALSE creates a session
                        if ($request->session()->has('computer_cases')) {
                            session(['computer_cases'=> 'pressed computer_cases again','computer_casesPrice'=>'10']);
                        }else{
                            session(['computer_cases'=> 'pressed computer_cases','computer_casesPrice'=>'00','computer_casesCheckBox'=>' ','computer_casesOrder'=>' ']);
                        }

                        break;
                }
            }
        }

        return view('components/showComponents',compact('holder'));
    }


}
