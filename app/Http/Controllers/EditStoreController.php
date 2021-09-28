<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Component;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditStoreController extends Controller
{
    private array  $productsArray = array('motherboards' => array(),
        'cpus' => array(),
        'cpu_coolers' => array(),
        'graphics_cards' => array(),
        'rams' => array(),
        'storages' => array(),
        'psus' => array(),
        'computer_cases' => array()
    );


    public function index(){
        if (Auth::check()) {
            //checks if the user is logged in
            $userId = Auth::user()->getAuthIdentifier();
            if($userId == session('presentStoreId') ){
                $this->fetchComponents();
                $productArray =$this->productsArray;
                //dd($this->productsArray['motherboards'][0]->name);

                return view('store.editStore',compact('productArray'));

            }else{
                return view('landing.landingpage');
            }

        }else {
            return view('landing.landingpage');
        }
    }
    //validate when the one who logged  is a consumer not a seller
    //just create a function for validation then re direct if it is true or it fails
    public function saveInfo(Request  $request)
    {

        //validate the input fields

        if (Auth::check()) {
            //checks if the user is logged in
            $userId = Auth::user()->getAuthIdentifier();
            if($userId == session('presentStoreId') ){

                $this->validate($request, [
                    'storeBanner' => 'nullable|image|max:1000',
                    'storeName' => 'required|string',
                    'storeLocation' => 'required|string|starts_with:https://www.google.com/maps/embed?pb|ends_with:sph',
                    'storeAddress' => 'required|string',
                    'storeDescription' => 'nullable|string',
                    'motherboards' => 'nullable|numeric|min:0',
                    'cpus' => 'nullable|numeric|min:0',
                    'cpu_coolers' => 'nullable|numeric|min:0',
                    'graphics_cards' => 'nullable|numeric|min:0',
                    'rams' => 'nullable|numeric|min:0',
                    'storages' => 'nullable|numeric|min:0',
                    'psus' => 'nullable|numeric|min:0',
                    'computer_cases' => 'nullable|numeric|min:0'
                ]);

                if($request->hasFile('storeBanner')){
                    $store_banner = time().'-'.$request->storeBanner.'.'.$request->storeBanner->extension();
                    $request->storeBanner->move(public_path('images/Store_Banner'), $store_banner);
                }else{
                    $store_banner=" ";
                }


                //Checks whether record already exists , if not creates a new instance
                $storeInfo = Store::firstOrCreate(
                    ['account_id' => session('userId')],
                    ['banner' => $store_banner,
                        'name' => $request->storeName,
                        'address' => $request->storeAddres,
                        'location' =>$request->storeLocation,
                        'description' => $request->storeDescription,
                        'featured_motherboards' => $request->motherboards,
                        'featured_cpus' => $request->cpus,
                        'featured_cpu_coolers' => $request->cpu_coolers,
                        'featured_graphics_cards' => $request->graphics_cards,
                        'featured_rams' => $request->rams,
                        'featured_storages' => $request->storages,
                        'featured_psus' => $request->psus,
                        'featured_computer_cases' => $request->computer_cases]
                );


                if ($storeInfo->wasRecentlyCreated) {

                    // Store Information just created in the database; it didn't exist before.
                    $storeId=Store::select('id')->where('account_id',$userId)->get();
                    //dd($storeId[0]->id);
                    $storeId = $storeId[0]->id;
                    return redirect()->route('viewStore',$storeId);
                } else {
                    // Store Information already existed and was pulled from database.
                    $storeId=Store::select('id')->where('account_id',$userId)->get();
                    $storeId = $storeId[0]->id;

                    if($store_banner != " "){
                        Store::where('account_id', session('userId'))->update(
                            ['account_id' => session('userId'),
                                'banner' => $store_banner,
                                'name' => $request->storeName,
                                'address' => $request->storeAddress,
                                'location' =>$request->storeLocation,
                                'description' => $request->storeDescription,
                                'featured_motherboards' => $request->motherboards,
                                'featured_cpus' => $request->cpus,
                                'featured_cpu_coolers' => $request->cpu_coolers,
                                'featured_graphics_cards' => $request->graphics_cards,
                                'featured_rams' => $request->rams,
                                'featured_storages' => $request->storages,
                                'featured_psus' => $request->psus,
                                'featured_computer_cases' => $request->computer_cases]
                        );
                    }else{
                        Store::where('account_id', session('userId'))->update(
                            ['account_id' => session('userId'),
                                'name' => $request->storeName,
                                'address' => $request->storeAddress,
                                'location' =>$request->storeLocation,
                                'description' => $request->storeDescription,
                                'featured_motherboards' => $request->motherboards,
                                'featured_cpus' => $request->cpus,
                                'featured_cpu_coolers' => $request->cpu_coolers,
                                'featured_graphics_cards' => $request->graphics_cards,
                                'featured_rams' => $request->rams,
                                'featured_storages' => $request->storages,
                                'featured_psus' => $request->psus,
                                'featured_computer_cases' => $request->computer_cases]
                        );
                    }

                    return redirect()->route('viewStore',$storeId);
                }




            }else{
                return view('landing.landingpage');
            }

        }else {
            return view('landing.landingpage');
        }





        //Inserting in in the database

    }


    //enable debug bar and finish the add select query or the join query
    public function fetchComponents(){
        $storeId=Store::select('id')->where('account_id',session('presentStoreId'))->get();
        $storeId = $storeId[0]->id;


        $this->productsArray['motherboards'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','motherboard')
            ->addSelect(['name' => Component::select('name')
            ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['cpus'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','cpu')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['cpu_coolers'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','cpu_cooler')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['graphics_cards'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','graphics_card')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['rams'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','ram')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
       $this->productsArray['storages'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','storage')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
       $this->productsArray['psus'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','psu')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
       $this->productsArray['computer_cases'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','computer_case')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();



    }



}

