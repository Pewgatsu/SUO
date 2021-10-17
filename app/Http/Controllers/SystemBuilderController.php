<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\BuildProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\Session;

class SystemBuilderController extends Controller
{
    private array $components=array('cpus','motherboards' , 'graphics_cards', 'rams', 'storages', 'psus' ,'computer_cases', 'cpu_coolers');
    private array $title=array('CPU' ,'Motherboard' , 'Graphics Card', 'RAM', 'Storage', 'PSU','Computer Case' , 'CPU Cooler');
    private array $componentStatus=array('','','','','','','','Available');
    private array $validate=array(0,0,0,0,0,0,0,0);

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

        if(session()->has('buildInfo')){
            $this->productStatusChecker(session('buildInfo.buildId'));
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title,'componentStatus'=>$this->componentStatus]);
        }else{
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
        }

    }

    public function control(Request $request){
        if($request->exists('orderComponents')){
            $component = $request->input('orderComponents');

            $product_id = session($component.'.id');
            $details = Product::with('build_products')->findOrFail($product_id);

            return $this->orderComponent($details);

            //return redirect()->route('consumer.builds.view', $details->builds->where('account_id',auth()->user()->getAuthIdentifier())->firstOrFail());

        }elseif($request->exists('buildName')){
            return $this->saveBuild($request);
        }elseif($request->exists('hold')){
            $this->checkBoxState($request);
        }elseif($request->exists('unsetSelected')){
            if(session()->has($request->input('unsetSelected'))){
                if(!session()->has('buildInfo')) {
                    session()->forget([$request->input('unsetSelected')]);
                }else{
                    $this->productStatusChecker(session('buildInfo.buildId'));
                    foreach ($this->components as $key => $component) {
                        if ($component == $request->input('unsetSelected') and $this->componentStatus[$key] == 'Available') {
                            session()->forget([$request->input('unsetSelected')]);
                        }
                    }
                    return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title,'componentStatus'=>$this->componentStatus]);
                }
            }
        }elseif($request->exists('clearSelection')) {
            $this->unset($request);
        }

        if(session()->has('buildInfo')){
            $this->productStatusChecker(session('buildInfo.buildId'));
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title,'componentStatus'=>$this->componentStatus]);
        }else{
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
        }



    }


    public function product_session( $type,$id,$name,$price,$owned=0)
    {
        $componentInfo = array("id"=>$id,"name"=>$name,"price"=>$price,'owned'=>$owned);
        switch ($type) {
            case "Motherboard":
                //checks if session motherboards is created? TRUE overrides the content : FALSE creates a session
                if (session()->has('motherboards.name')) {
                    session(['motherboards.id'=>$id]);
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
                    session(['cpus.id'=>$id]);
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
                    session(['cpu_coolers.id'=>$id]);
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
                    session(['graphics_cards.id'=>$id]);
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
                    session(['rams.id'=>$id]);
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
                    session(['storages.id'=>$id]);
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
                    session(['psus.id'=>$id]);
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
                    session(['computer_cases.id'=>$id]);
                    session(['computer_cases.name'=>$name] );
                    session(['computer_cases.price'=>$price] );
                    session(['computer_cases.owned'=>'0'] );
                } else {
                    session()->put('computer_cases', $componentInfo);
                }
                break;
        }


       //return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
        //dd(session('motherboards'));

    }

    public function checkBoxState(Request $request){

        $data= $request->hold;
        $loops = explode("," ,$data);
        foreach ($this->components as $key=>$component){
            if(session()->has($component)){
                if($loops[$key]==1){
                    session([$component.'.owned' => 1]);
                }else{
                    session([$component.'.owned' => 0]);
                }
            }

        }
        return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
    }

    public function unset(Request $request){

        session()->forget(['motherboards', 'cpus','cpu_coolers','graphics_cards','rams','storages','psus','computer_cases','buildInfo']);
    }


    public function saveBuild(Request $request){


        $this->validate($request, [
            'buildName' => 'required|string',
            'buildDescription' => 'nullable|string'
        ]);

        $total_price = 0;
        foreach($this->components as $key=>$component)
        {
            if(!session()->has($component)){
                $this->validate[$key] =1;
            }else{
                $this->validate[$key] =0;
                $total_price += session($component.'.price');
            }
        }

        $this->validate[7] =0;

        if (in_array(1, $this->validate)) {
            //dd($this->validate);
            return view('systemBuilder.builder',['validateComponents'=>$this->validate ,'components' => $this->components,'title'=>$this->title]);
        }else{
            if(session()->has('buildInfo')){

                $build=Build::with('build_products','products')->where('id',session('buildInfo.buildId'))->first();
                //dd(count($build->build_products));

                $build->build_name =$request->buildName;
                $build->total_price =$total_price ;
                $build->build_description =$request->buildDescription ;
                $build->save();

                //dd($build->products[0]->type);
                foreach($this->components as $key=>$component) {
                    if($component == 'cpu_coolers') {
                        if (session()->has('cpu_coolers') ) {
                            $product = Product::select('id','type','description','status','status_date')->where('id',session($component.'.id'))->get();
                            if($product[0]->status=='Available' && count($build->build_products) ==8 ){
                                BuildProduct::where(['build_id' => session('buildInfo.buildId'),
                                    'type' => $this->title[$key]] )->update([
                                    'product_id' => $product[0]->id,
                                    'type' => $product[0]->type,
                                    'status'=>$product[0]->status,
                                    'status_date' => $product[0]->status_date,
                                    'owned' => session($component.'.owned' )
                                ]);
                            }else{
                                $build_product= new BuildProduct;
                                $build_product->build_id = $build->id;
                                $build_product->product_id = $product[0]->id;
                                $build_product->type = $product[0]->type;
                                $build_product->status="Available";
                                $build_product->status_date =Carbon::now()->toDateTimeString();
                                $build_product->owned = session($component.'.owned' );

                                $build_product->save();
                                unset($build_product);
                            }

                            unset($product);
                        }else{
                            if(count($build->build_products) == 8 && $build->build_products[7]->type == 'CPU Cooler' && $build->build_products[7]->status == 'Available' ){
                                //dd($build->build_products[7]);
                               BuildProduct::where(['id'=> $build->build_products[7]->id,  'type'=> 'CPU Cooler'])->delete();
                            }

                        }
                        unset($build);
                    }else{
                        $product = Product::select('id','type','description','status','status_date')->where('id',session($component.'.id'))->get();
                        if($product[0]->status=='Available'){
                            BuildProduct::where(['build_id' => session('buildInfo.buildId'),
                                'type' => $this->title[$key]] )->update([
                                'product_id' => $product[0]->id,
                                'type' => $product[0]->type,
                                'status'=>$product[0]->status,
                                'status_date' => $product[0]->status_date,
                                'owned' => session($component.'.owned' )
                            ]);
                        }
                        unset($product);
                    }

                }
            }else{
                $build = new Build;
                $build->account_id = auth()->user()->getAuthIdentifier();
                $build->build_name = $request->buildName;
                $build->total_price = $total_price;
                if(isset($request->buildDescription)){
                    $build->build_description = $request->buildDescription;
                }
                $build->save();
               //dd($build->id);
               // $product = Product::select('id','type','description','status_date')->where('id',session($component.'.id'))->get();
                //dd($product->id);

                foreach($this->components as $component){
                    if($component == 'cpu_coolers'){
                        if(session()->has('cpu_coolers')){
                            $build_product= new BuildProduct;
                            $product = Product::select('id','type','description','status_date')->where('id',session($component.'.id'))->get();
                            $build_product->build_id = $build->id;
                            $build_product->product_id = $product[0]->id;
                            $build_product->type = $product[0]->type;
                            $build_product->status="Available";
                            $build_product->status_date =Carbon::now()->toDateTimeString();
                            $build_product->owned = session($component.'.owned' );

                            $build_product->save();
                            unset($build_product);
                            unset($product);
                        }
                    }else{
                        $build_product= new BuildProduct;
                        $product = Product::select('id','type','description','status_date')->where('id',session($component.'.id'))->get();
                        $build_product->build_id = $build->id;
                        $build_product->product_id = $product[0]->id;
                        $build_product->type = $product[0]->type;
                        $build_product->status="Available";
                        $build_product->status_date =Carbon::now()->toDateTimeString();
                        $build_product->owned = session($component.'.owned' );

                        $build_product->save();
                        unset($build_product);
                        unset($product);
                    }

                }

            }
            session()->forget(['motherboards', 'cpus','cpu_coolers','graphics_cards','rams','storages','psus','computer_cases','buildInfo']);
            return redirect()->route('builds');
        }

    }


    public function orderComponent(Product $product){

        $time =Carbon::now()->toDateTimeString();

        if($product->build_products[0]->status =="Available" && $product->status="Available"){
            $product->build_products[0]->status= "Ordered";
            $product->status="Ordered";
            $product->status_date = $time;
            $product->build_products[0]->status_date = $time;

            $product->build_products[0]->save();
            $product->save();

            return back();
        }else{
            $unavailable = $product->name;
            //dd($product->component->name);
            //with('error_code', 5)
              return back()->with('unavailable', $product->component->name);

        }


    }

    public function edit_build(Build $build)
    {
        //unset all sessions
        session()->forget(['motherboards', 'cpus','cpu_coolers','graphics_cards','rams','storages','psus','computer_cases','buildInfo']);

        $buildInfo = array("buildId"=>$build->id,"build_name"=>$build->build_name,"build_description"=>$build->build_description);
        session()->put('buildInfo', $buildInfo);

       // dd($build->build_description);
        //dd($request);
        //dd($build->products[0]->component->name);
        //dd($build->products[0]);
        //dd($build->build_products);
        foreach ($build->products as $key=>$p){
            $this->product_session($p->type,
                                    $build->products[$key]->id,
                                    $build->products[$key]->component->name ,
                                    $build->products[$key]->price,
                                    (int)$build->build_products[$key]->owned);

            $this->componentStatus[$key] =$build->build_products[$key]->status;

        }

//        dd($this->componentStatus);
        return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title,'componentStatus'=>$this->componentStatus]);
    }

    public function view_build(Build $build){
        session()->forget(['motherboards', 'cpus','cpu_coolers','graphics_cards','rams','storages','psus','computer_cases','buildInfo']);

        $buildInfo = array("buildId"=>$build->id,"build_name"=>$build->build_name,"build_description"=>$build->build_description);
        session()->put('buildInfo', $buildInfo);

        foreach ($build->products as $key=>$p){
            $this->product_session($p->type,
                $build->products[$key]->id,
                $build->products[$key]->component->name ,
                $build->products[$key]->price,
                (int)$build->build_products[$key]->owned);

            $this->componentStatus[$key] =$build->build_products[$key]->status;
        }

        return view('systemBuilder.builder',[
            'components' => $this->components,
            'title'=>$this->title,
            'componentStatus'=>$this->componentStatus,
            'is_view' => true
        ]);
    }

    public function productStatusChecker( $id){
        if(session()->has('buildInfo')){
            $build  = Build::with('build_products')->findOrFail($id);
            //dd($build->build_products);
            foreach ($build->products as $key=>$p){
                $this->componentStatus[$key] =$build->build_products[$key]->status;
            }
        }

    }

    public function add_product(Product $product, Request $request){


       // dd($product->component->name);

        if(session()->has('buildInfo')){
            $this->productStatusChecker(session('buildInfo.buildId'));
           // dd($this->componentStatus);
            //dd($product->type);
            foreach ($this->title as $key=>$component){

                if ($component == $product->type AND $this->componentStatus[$key]=='Available'){
                    //dd($this->componentStatus[$key]);
                    //dd($component == $product->type AND $this->componentStatus[$key]=='Available');
                    $this->product_session($product->type,$product->id,$product->component->name,$product->price);
                }else if($component == 'CPU Cooler' && $this->componentStatus[$key]=='Available'){
                    $this->product_session($product->type,$product->id,$product->component->name,$product->price);
                }
            }

            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title,'componentStatus'=>$this->componentStatus]);
        }else{
            $this->product_session($product->type,$product->id,$product->component->name,$product->price);
            return view('systemBuilder.builder',['components' => $this->components,'title'=>$this->title]);
        }
    }

}
