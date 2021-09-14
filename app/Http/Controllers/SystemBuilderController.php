<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SystemBuilderController extends Controller
{
    private array $components=array('motherboards' ,'cpus', 'cpu_coolers', 'graphics_cards', 'rams', 'storages', 'psus' , 'computer_cases');

    public function index(){
        //checks if user is logged in and creates a session to enable saving and naming builds
        if (Auth::check())
        {
            $userId = Auth::user()->getAuthIdentifier();
            session(['userId' => $userId]);
            session(['saveForm'=> ' ']);
        }else{
            session()->forget(['saveForm', 'userId']);
        }

        return view('systemBuilder.builder');

    }

    public function control(Request $request){
        if($request->exists('orderComponents')){
            $this->orderComponent($request);
            return view('systemBuilder.builder');
        }elseif($request->exists('buildName')){
            $this->saveBuild($request);
            return view('systemBuilder.builder');
        }elseif($request->exists('hold')){
            $this->checkBoxState($request);
        }
    }

    public function print(Request $request)
    {
        $holder = array();
        $key = $request->input('selectedComponents');;
        switch ($key) {
            case "motherboards":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\Motherboard::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session motherboards is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('motherboards')) {
                    session(['motherboards' => 'pressed motherboard again', 'motherboardsPrice' => '10']);
                } else {
                    session(['motherboards' => 'pressed motherboard', 'motherboardsPrice' => '00', 'motherboardsCheckBox' => ' ', 'motherboardsOrder' => ' ']);
                }

                break;

            case "cpus":
                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\CPU::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session cpus is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('cpus')) {
                    session(['cpus' => 'pressed cpus again', 'cpusPrice' => '10']);
                } else {
                    session(['cpus' => 'pressed cpus', 'cpusPrice' => '00', 'cpusCheckBox' => ' ', 'cpusOrder' => ' ']);
                }

                break;

            case "cpu_coolers":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\CPUCooler::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session cpu_coolers is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('cpu_coolers')) {
                    session(['cpu_coolers' => 'pressed cpu_coolers again', 'cpu_coolersPrice' => '10']);
                } else {
                    session(['cpu_coolers' => 'pressed cpu_coolers', 'cpu_coolersPrice' => '00', 'cpu_coolersCheckBox' => ' ', 'cpu_coolersOrder' => ' ']);
                }

                break;

            case "graphics_cards":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\GraphicsCard::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session graphics_cards is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('graphics_cards')) {
                    session(['graphics_cards' => 'pressed graphics_cards again', 'graphics_cardsPrice' => '10']);
                } else {
                    session(['graphics_cards' => 'pressed graphics_cards', 'graphics_cardsPrice' => '00', 'graphics_cardsCheckBox' => ' ', 'graphics_cardsOrder' => ' ']);
                }

                break;

            case "rams":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\RAM::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session rams is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('rams')) {
                    session(['rams' => 'pressed rams again', 'ramsPrice' => '10']);
                } else {
                    session(['rams' => 'pressed rams', 'ramsPrice' => '00', 'ramsCheckBox' => ' ', 'ramsOrder' => ' ']);
                }

                break;

            case "storages":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\Storage::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session storages is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('storages')) {
                    session(['storages' => 'pressed storages again', 'storagesPrice' => '10']);
                } else {
                    session(['storages' => 'pressed storages', 'storagesPrice' => '00', 'storagesCheckBox' => ' ', 'storagesOrder' => ' ']);
                }

                break;

            case "psus":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\PSU::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session psus is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('psus')) {
                    session(['psus' => 'pressed psus again', 'psusPrice' => '10']);
                } else {
                    session(['psus' => 'pressed psus', 'psusPrice' => '00', 'psusCheckBox' => ' ', 'psusOrder' => ' ']);
                }

                break;
            case "computer_cases":

                //Fetch the name and component id in the database using eloquent and query builder
                foreach (Models\ComputerCase::all() as $hold) {
                    $id = DB::table('components')->find($hold->component_id);
                    array_push($holder, array('id' => $id->id, 'name' => $id->name));
                }
                //checks if session computer_cases is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('computer_cases')) {
                    session(['computer_cases' => 'pressed computer_cases again', 'computer_casesPrice' => '10']);
                } else {
                    session(['computer_cases' => 'pressed computer_cases', 'computer_casesPrice' => '00', 'computer_casesCheckBox' => ' ', 'computer_casesOrder' => ' ']);
                }

                break;
        }

        return view('components/showComponents', compact('holder'));
    }

    public function checkBoxState(Request $request){

        $data= $request->hold;
        $loops = explode("," ,$data);

        foreach ($this->components as $key=>$component){
            if($loops[$key]==1){
                session([$component.'Owned' => 'checked']);
            }else{
                session([$component.'Owned' => ' ']);
            }
        }
        // Log::info($data);
        //return response()->json(['success'=> $data]);
    }

    public function saveBuild(Request $request){
        $componentArray = array(
            'motherboards' => array(),
            'cpus' => array(),
            'cpu_coolers' => array(),
            'graphics_cards' => array(),
            'rams' => array(),
            'storages' => array(),
            'psus' => array(),
            'computer_cases' => array()
        );
        if ($request->filled('buildName')) {
            session()->forget(['alert']);

            foreach ($this->components as $component) {
                if (session()->has($component)) {
                    //array_push($componentArray[$component], )
                }

            }


        } else {
            session(['alert' => 'is-invalid']);
        }

    }

    public function orderComponent(Request $request){
        $component = $request->input('orderComponents');

        switch ($component){
            case "cpus":
            case "motherboards":
            case "cpu_coolers":
            case "graphics_cards":
            case "rams":
            case "storages":
            case "psus":
            case "computer_cases":
                break;
        }
    }

}
