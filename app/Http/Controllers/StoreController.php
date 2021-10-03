<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Component;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //validate view for  users account type when can they view the store
    public function index($id){

        if (Auth::check()) {

            //checks if the user is logged in
            $userId = Auth::user()->getAuthIdentifier();
            $type =Account::where('id',$userId)->get('account_type');
            $type =$type[0]->account_type;
            session(['htmlId' => $id]);

            if($type == "Seller"){
                session(['userId' => $userId]);
                //Determine if the seller owns the store
                $storeId=Store::select('account_id')->where('id',$id)->get();
                if(!$storeId->isEmpty()){

                    if( $storeId[0]->account_id == $userId ){
                        session(['presentStoreId' => $storeId[0]->account_id]);
                        session(['seller' => ' ']);
                        $this->getContent($id);
                    }else{
                        session()->forget(['seller']);
                        $this->getContent($id);
                    }
                    return view('store.store');
                }else{
                    abort(404, 'Oops...Store Not Found!');
                }
            }else{
                $this->getContent($id);
                return view('store.store');
            }
        }else{
            session()->forget(['userId','seller']);

            $findId=Store::where('id',$id)->get();
            if(!$findId->isEmpty()){
                $this->getContent($id);
                return view('store.store');
            }else{
                abort(404, 'Oops...Store Not Found!');
            }
        }
    }

    public function getContent($id){
        $findId=Store::where('id',$id)->get();

        $contact = Store::select('name')->where('id',$id)->addSelect(['contact' => Account::select('contact')
            ->whereColumn('account_id','accounts.id')
        ])->addSelect(['email' => Account::select('email')
            ->whereColumn('account_id','accounts.id')
        ])->addSelect(['ownerFN' => Account::select('firstname')
            ->whereColumn('account_id','accounts.id')
        ])->addSelect(['ownerLN' => Account::select('lastname')
            ->whereColumn('account_id','accounts.id')
        ])->addSelect(['creation' => Account::select('created_at')
            ->whereColumn('account_id','accounts.id')
        ])->get();

        $banner = explode('\\', $findId[0]->banner);
        $storeInfo = array(
            'banner'=> '/images/Store_Banner/'.end($banner) ,
            'storeName'=>$findId[0]->name,
            'storeAddress' =>$findId[0]->address,
            'storeLocation' =>$findId[0]->location,
            'storeDescription'=>$findId[0]->description,
            'featured_motherboards'=>$findId[0]->featured_motherboards,
            'featured_cpus'=>$findId[0]->featured_cpus,
            'featured_cpu_coolers'=>$findId[0]->featured_cpu_coolers,
            'featured_graphics_cards'=>$findId[0]->featured_graphics_cards,
            'featured_rams'=>$findId[0]->featured_rams,
            'featured_storages'=>$findId[0]->featured_storages,
            'featured_psus'=>$findId[0]->featured_psus,
            'featured_computer_cases'=>$findId[0]->featured_computer_cases,
            'contact' =>$contact[0]['contact'],
            'email'   =>$contact[0]['email'],
            'ownerFN' =>$contact[0]['ownerFN'],
            'ownerLN' =>$contact[0]['ownerLN'],
            'creation'=>$contact[0]['creation']
        );

        session()->put('storeInfo',$storeInfo);


        //dd(session('storeInfo.banner'));

        $productsArray = array('motherboards' => array(),
            'cpus' => array(),
            'cpu_coolers' => array(),
            'graphics_cards' => array(),
            'rams' => array(),
            'storages' => array(),
            'psus' => array(),
            'computer_cases' => array()
        );

        $productsArray['motherboards'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_motherboards') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)

            ])->get();
        $productsArray['cpus'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_cpus') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();
        $productsArray['cpu_coolers'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_cpu_coolers') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();
        $productsArray['graphics_cards'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_graphics_cards') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();
        $productsArray['rams'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_rams') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();
        $productsArray['storages'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_storages') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();
        $productsArray['psus'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_psus') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();
        $productsArray['computer_cases'] = Component::select('image_path','name')->where('id',session('storeInfo.featured_computer_cases') )
            ->addSelect(['price' => Product::select('price')
                ->whereColumn('component_id', 'components.id')
                ->where('store_id', $id)->limit(1)
            ])->get();

        session()->put('productsArray', $productsArray);

        if(strlen(session('banner')) <=4){
            session()->forget(['banner']);
        }
    }
    //to view personal store visit this url
    public function myStore(){

        $motherboard_components = Component::where('type','Motherboard')->get();
        $cpu_components = Component::where('type','CPU')->get();
        $cpu_cooler_components = Component::where('type','CPU Cooler')->get();
        $graphics_card_components = Component::where('type','Graphics Card')->get();
        $ram_components = Component::where('type','RAM')->get();
        $storage_components = Component::where('type','Storage')->get();
        $psu_components = Component::where('type','PSU')->get();
        $computer_case_components = Component::where('type','Computer Case')->get();

        if (Auth::check()) {
            //checks if the user is logged in
            $userId = Auth::user()->getAuthIdentifier();
            $type =Account::where('id',$userId)->get('account_type');
            $type =$type[0]->account_type;
            //session(['htmlId' => $id]);

            if($type == "Seller"){
                //Determine if the seller owns the store
                $storeId=Store::select('account_id')->where('id',$userId)->get();
                if($storeId->isEmpty()){

                    //checks if the store record already exist else creates a new record
                    $storeInfo = Store::firstOrCreate(
                        ['account_id' => $userId],
                            ['banner' => ' ',
                            'name' => "LOREM IPSUM DOLOR",
                            'address' => " ",
                                'location' => " ",
                            'description' => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..",
                            'featured_motherboards' => 0,
                            'featured_cpus' => 0,
                            'featured_cpu_coolers' => 0,
                            'featured_graphics_cards' => 0,
                            'featured_rams' => 0,
                            'featured_storages' => 0,
                            'featured_psus' => 0,
                            'featured_computer_cases' => 0]
                    );
                }
                $storeId=Store::select('id')->where('account_id',$userId)->get();
                //dd($storeId[0]->id);
                $this->index($storeId[0]->id);
                return view('store.store', [
                    'motherboard_components' => $motherboard_components,
                    'cpu_components' => $cpu_components,
                    'cpu_cooler_components' => $cpu_cooler_components,
                    'graphics_card_components' => $graphics_card_components,
                    'ram_components' => $ram_components,
                    'storage_components' => $storage_components,
                    'psu_components' => $psu_components,
                    'computer_case_components' => $computer_case_components
                ]);
            }else{
                return view('landing.landingpage');
            }
        }else{
            return view('landing.landingpage');
        }
    }

    public function add_motherboard(Request $request){
        // Validate
        $this->validate($request, [
            'mobo_component' => 'required|numeric',
            'mobo_quantity' => 'required|numeric|min:1',
            'mobo_price' => 'required|numeric|min:0',
            'mobo_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->mobo_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->mobo_component,
                'price' => $request->mobo_price,
                'type' => 'Motherboard',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->mobo_description
            ]);
        }

        return back();
    }

    public function add_cpu(Request $request){
        // Validate
        $this->validate($request, [
            'cpu_component' => 'required|numeric',
            'cpu_quantity' => 'required|numeric|min:1',
            'cpu_price' => 'required|numeric|min:0',
            'cpu_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->cpu_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->cpu_component,
                'price' => $request->cpu_price,
                'type' => 'CPU',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->cpu_description
            ]);
        }

        return back();
    }

    public function add_cpu_cooler(Request $request){
        // Validate
        $this->validate($request, [
            'cpu_cooler_component' => 'required|numeric',
            'cpu_cooler_quantity' => 'required|numeric|min:1',
            'cpu_cooler_price' => 'required|numeric|min:0',
            'cpu_cooler_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->cpu_cooler_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->cpu_cooler_component,
                'price' => $request->cpu_cooler_price,
                'type' => 'CPU Cooler',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->cpu_cooler_description
            ]);
        }

        return back();
    }

    public function add_graphics_card(Request $request){
        // Validate
        $this->validate($request, [
            'graphics_card_component' => 'required|numeric',
            'graphics_card_quantity' => 'required|numeric|min:1',
            'graphics_card_price' => 'required|numeric|min:0',
            'graphics_card_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->graphics_card_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->graphics_card_component,
                'price' => $request->graphics_card_price,
                'type' => 'Graphics Card',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->graphics_card_description
            ]);
        }

        return back();
    }

    public function add_ram(Request $request){
        // Validate
        $this->validate($request, [
            'ram_component' => 'required|numeric',
            'ram_quantity' => 'required|numeric|min:1',
            'ram_price' => 'required|numeric|min:0',
            'ram_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->ram_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->ram_component,
                'price' => $request->ram_price,
                'type' => 'RAM',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->ram_description
            ]);
        }

        return back();
    }

    public function add_storage(Request $request){
        // Validate
        $this->validate($request, [
            'storage_component' => 'required|numeric',
            'storage_quantity' => 'required|numeric|min:1',
            'storage_price' => 'required|numeric|min:0',
            'storage_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->storage_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->storage_component,
                'price' => $request->storage_price,
                'type' => 'Storage',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->storage_description
            ]);
        }

        return back();
    }

    public function add_psu(Request $request){
        // Validate
        $this->validate($request, [
            'psu_component' => 'required|numeric',
            'psu_quantity' => 'required|numeric|min:1',
            'psu_price' => 'required|numeric|min:0',
            'psu_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->psu_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->psu_component,
                'price' => $request->psu_price,
                'type' => 'PSU',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->psu_description
            ]);
        }

        return back();
    }

    public function add_computer_case(Request $request){
        // Validate
        $this->validate($request, [
            'case_component' => 'required|numeric',
            'case_quantity' => 'required|numeric|min:1',
            'case_price' => 'required|numeric|min:0',
            'case_description' => 'nullable|string'
        ]);

        // Store
        $store = Store::where('account_id',Auth::user()->getAuthIdentifier())->firstOrFail();

        for ($i = 0; $i < intval($request->case_quantity); $i++){
            Product::create([
                'store_id' => $store->id,
                'component_id' => $request->case_component,
                'price' => $request->case_price,
                'type' => 'Computer Case',
                'status' => 'Available',
                'status_date' => Carbon::now()->toDateTimeString(),
                'description' => $request->case_description
            ]);
        }

        return back();
    }
}
