<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SystemBuilderController extends Controller
{
    private array $components=array('motherboards' ,'cpus', 'cpu_coolers', 'graphics_cards', 'rams', 'storages', 'psus' , 'computer_cases');
    private array $title=array('Motherboard' ,'CPU', 'CPU Cooler', 'Graphics Card', 'RAM', 'Storage', 'PSU' , 'Computer Case');

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

        return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);

    }

    public function control(Request $request){
        //dd($request->hold);
        if($request->exists('orderComponents')){
            $this->orderComponent($request);
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
        }elseif($request->exists('buildName')){
            $this->saveBuild($request);
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
        }elseif($request->exists('hold')){
            $this->checkBoxState($request);
        }
    }

    public function print(Request $request){
        $key = $request->input('selectedComponents');

        return view('systemBuilder.builder');

    }
    public function product_session($type,$name,$price,$owned=0)
    {

        $componentInfo = array("name"=>$name,"price"=>$price,'owned'=>$owned);
        switch ($type) {
            case "Motherboard":
                //checks if session motherboards is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('motherboards.name')) {
                    session(['motherboards.name'=>$name] );
                    session(['motherboards.price'=>$price] );
                    session(['motherboards.owned'=>'0'] );
                } else {
                    session()->put('motherboards', $componentInfo);
                }
                break;
            case "CPU":
                //checks if session cpus is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('cpus.name')) {
                    session(['cpus.name'=>$name] );
                    session(['cpus.price'=>$price] );
                    session(['cpus.owned'=>'0'] );
                } else {
                    session()->put('cpus', $componentInfo);
                }
                break;
            case "CPU Cooler":
                //checks if session cpu_coolers is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('cpu_coolers.name')) {
                    session(['cpu_coolers.name'=>$name] );
                    session(['cpu_coolers.price'=>$price] );
                    session(['cpu_coolers.owned'=>'0'] );
                } else {
                    session()->put('cpu_coolers', $componentInfo);
                }
                break;
            case "Graphics Card":
                //checks if session graphics_cards is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('graphics_cards.name')) {
                    session(['graphics_cards.name'=>$name] );
                    session(['graphics_cards.price'=>$price] );
                    session(['graphics_cards.owned'=>'0'] );
                } else {
                    session()->put('graphics_cards', $componentInfo);
                }
                break;

            case "RAM":
                //checks if session rams is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('rams.name')) {
                    session(['rams.name'=>$name] );
                    session(['rams.price'=>$price] );
                    session(['rams.owned'=>'0'] );
                } else {
                    session()->put('rams', $componentInfo);
                }
                break;

            case "Storage":
                //checks if session storages is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('storages.name')) {
                    session(['storages.name'=>$name] );
                    session(['storages.price'=>$price] );
                    session(['storages.owned'=>'0'] );
                } else {
                    session()->put('storages', $componentInfo);
                }
                break;

            case "PSU":
                //checks if session psus is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('psus.name')) {
                    session(['psus.name'=>$name] );
                    session(['psus.price'=>$price] );
                    session(['psus.owned'=>'0'] );
                } else {
                    session()->put('psus', $componentInfo);
                }
                break;
            case "Computer Case":
                //checks if session computer_cases is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('computer_cases.name')) {
                    session(['computer_cases.name'=>$name] );
                    session(['computer_cases.price'=>$price] );
                    session(['computer_cases.owned'=>'0'] );
                } else {
                    session()->put('computer_cases', $componentInfo);
                }
                break;
        }

        //dd(session('motherboards'));

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

        $this->validate($request, [
            'buildName' => 'required|string',
            'buildDescription' => 'nullable|string'
        ]);


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

    public function edit_build(Build $build)
    {
        //unset all sessions
        session()->forget(['motherboards', 'cpus','cpu_coolers','graphics_cards','rams','storages','psus','computer_cases']);

        session(['buildId' => $build->id]);

        //dd($build->products[0]->component->name);
        //dd($build->products[0]);
        //dd($build->build_product[0]->owned);
        foreach ($build->products as $key=>$p){
            $this->product_session($p->type,
                                    $build->products[$key]->component->name ,
                                    $build->products[$key]->price,
                                     $build->build_product[$key]->owned);

        }



        return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);

    }

}
