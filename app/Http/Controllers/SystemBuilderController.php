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
        //dd($request->hold);
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

        $componentInfo = array("name"=>'default value',"price"=>0,'owned'=>'0');
        $key = $request->input('selectedComponents');;
        switch ($key) {
            case "motherboards":
                //checks if session motherboards is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('motherboards.name')) {
                    session(['motherboards.name'=>"Pressed motherboard twice"] );
                    session(['motherboards.price'=>0] );
                    session(['motherboards.owned'=>'0'] );
                } else {
                    session()->put('motherboards', $componentInfo);
                }
                break;
            case "cpus":
                //checks if session cpus is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('cpus.name')) {
                    session(['cpus.name'=>"Pressed cpu twice"] );
                    session(['cpus.price'=>0] );
                    session(['cpus.owned'=>'0'] );
                } else {
                    session()->put('cpus', $componentInfo);
                }
                break;
            case "cpu_coolers":
                //checks if session cpu_coolers is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('cpu_coolers.name')) {
                    session(['cpu_coolers.name'=>"Pressed cpu_coolers twice"] );
                    session(['cpu_coolers.price'=>0] );
                    session(['cpu_coolers.owned'=>'0'] );
                } else {
                    session()->put('cpu_coolers', $componentInfo);
                }
                break;
            case "graphics_cards":
                //checks if session graphics_cards is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('graphics_cards.name')) {
                    session(['graphics_cards.name'=>"Pressed graphics_cards twice"] );
                    session(['graphics_cards.price'=>0] );
                    session(['graphics_cards.owned'=>'0'] );
                } else {
                    session()->put('graphics_cards', $componentInfo);
                }
                break;

            case "rams":
                //checks if session rams is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('rams.name')) {
                    session(['rams.name'=>"Pressed rams twice"] );
                    session(['rams.price'=>0] );
                    session(['rams.owned'=>'0'] );
                } else {
                    session()->put('rams', $componentInfo);
                }
                break;

            case "storages":
                //checks if session storages is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('storages.name')) {
                    session(['storages.name'=>"Pressed storages twice"] );
                    session(['storages.price'=>0] );
                    session(['storages.owned'=>'0'] );
                } else {
                    session()->put('storages', $componentInfo);
                }
                break;

            case "psus":
                //checks if session psus is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('psus.name')) {
                    session(['psus.name'=>"Pressed psus twice"] );
                    session(['psus.price'=>0] );
                    session(['psus.owned'=>'0'] );
                } else {
                    session()->put('psus', $componentInfo);
                }
                break;
            case "computer_cases":
                //checks if session computer_cases is created? TRUE overrides the content : FALSE creates a session
                if ($request->session()->has('computer_cases.name')) {
                    session(['computer_cases.name'=>"Pressed computer_cases twice"] );
                    session(['computer_cases.price'=>0] );
                    session(['computer_cases.owned'=>'0'] );
                } else {
                    session()->put('computer_cases', $componentInfo);
                }
                break;
        }
       // return view('components/showComponents', compact('holder'));
        return view('systemBuilder.builder');
    }

    public function checkBoxState(Request $request){

        $data= $request->hold;
        $loops = explode("," ,$data);
        foreach ($this->components as $key=>$component){
            if($loops[$key]==1){
                session([$component.'.owned' => '1']);
            }else{
                session([$component.'.owned' => '0']);
            }
        }
        Log::info($data);
        return response()->json(['success'=> $data]);
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
