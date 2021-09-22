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

    public function index(){
        if (Auth::check()) {
            //checks if the user is logged in
            $userId = Auth::user()->getAuthIdentifier();
            if($userId == session('presentStoreId') ){
                $this->fetchComponents();
                return view('store.editStore');

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
                    'storeBanner' => 'nullable|image|max:5048',
                    'storeName' => 'required|string',
                    'storeAddress' => 'required|string|starts_with:https://www.google.com/maps/embed?pb|ends_with:sph',
                    'storeDescription' => 'nullable|string',
                    'motherboards' => 'nullable|numeric|min:0|max:16',
                    'cpus' => 'nullable|numeric|min:0|max:16',
                    'cpu_coolers' => 'nullable|numeric|min:0|max:16',
                    'graphics_cards' => 'nullable|numeric|min:0|max:16',
                    'rams' => 'nullable|numeric|min:0|max:16',
                    'storages' => 'nullable|numeric|min:0|max:16',
                    'psus' => 'nullable|numeric|min:0|max:16',
                    'computer_cases' => 'nullable|numeric|min:0|max:16'
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

                    Store::where('account_id', session('userId'))->update(
                        ['account_id' => session('userId'),
                            'banner' => $store_banner,
                                'name' => $request->storeName,
                                'address' => $request->storeAddress,
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

        $productsArray = array(
            'motherboards' => array(),
            'cpus' => array(),
            'cpu_coolers' => array(),
            'graphics_cards' => array(),
            'rams' => array(),
            'storages' => array(),
            'psus' => array(),
            'computer_cases' => array()
        );
        //$productsArray['motherboards']=Product::select('id','component_id')->where('description','motherboards')->where('store_id',$storeId)->get();
        //$cpus=Product::select('id','component_id')->where('description','cpus')->where('store_id',$storeId)->get();
        //$cpu_coolers=Product::select('id','component_id')->where('description','cpu_coolers')->where('store_id',$storeId)->get();
        //$graphics_cards=Product::select('id','component_id')->where('description','graphics_cards')->where('store_id',$storeId)->get();
        //$rams=Product::select('id','component_id')->where('description','rams')->where('store_id',$storeId)->get();
        //$storages=Product::select('id','component_id')->where('description','storages')->where('store_id',$storeId)->get();
        //$psus=Product::select('id','component_id')->where('description','psus')->where('store_id',$storeId)->get();
        //$computer_cases=Product::select('id','component_id')->where('description','computer_cases')->where('store_id',$storeId)->get();

        $productsArray['motherboards'] = Product::select('id','component_id')->where(['store_id'=>$storeId,'description'=>'motherboards'])->
        addSelect(Component::select('name')
            ->whereColumn('id', 'products.id')
            )->get();

//        Destination::addSelect(['last_flight' => Flight::select('name')
//            ->whereColumn('destination_id', 'destinations.id')
//            ->orderByDesc('arrived_at')
//            ->limit(1)
//        ])->get();
        dd($productsArray['motherboards']);


    }



}

