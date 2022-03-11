<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Component;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $userId = Auth::user()->getAuthIdentifier();
        //dd($store->account->id);
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $path = "";
        //validate the input fields
        if(!Auth::check() || $userId != $store->account_id ){
            return view('landing.landingpage');
        }else{
            $this->validate($request, [
                'storeBanner' => 'nullable|image|max:1000',
                'storeName' => 'required|string',
                'storeLocation' => 'nullable|string|starts_with:https://www.google.com/maps/embed?pb|ends_with:sph',
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
                $store_banner = time().'-'."banner".'.'.$request->storeBanner->extension();

//                $mobo_image_filename = time() . '-' . $request->mobo_name . '.' . $request->mobo_image->extension();
//                $new_path = Storage::disk('do_spaces')->putFileAs('images/Store_Banner', $request->storeBanner, $store_banner,'public');
//                $path = Storage::disk('do_spaces')->url($new_path);

                $request->storeBanner->move(public_path('images/Store_Banner'), $store_banner);

            }
            //dd($path);
            if(!$request->hasFile('storeBanner') || !$request->has('storeLocation')){

                if($request->hasFile('storeBanner')){
                    $store->update(['banner'=> $path]);
                }
                if($request->has('storeLocation')) {
                    $store->update(['location'=> $request->storeLocation]);
                }


                Store::where('account_id', session('userId'))->update(
                    ['account_id' => session('userId'),
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
            }else{
                $input = $request->all();
                $store->update(
                    ['account_id' => session('userId'),
                        'banner' => $path,
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

            return redirect()->route('myStore');
        }
        //Inserting in in the database
    }


    //enable debug bar and finish the add select query or the join query
    public function fetchComponents(){
        $storeId=Store::select('id')->where('account_id',session('presentStoreId'))->get();
        $storeId = $storeId[0]->id;


        $this->productsArray['motherboards'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','Motherboard')
            ->addSelect(['name' => Component::select('name')
            ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['cpus'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','CPU')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['cpu_coolers'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','CPU Cooler')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['graphics_cards'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','Graphics Card')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
        $this->productsArray['rams'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','RAM')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
       $this->productsArray['storages'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','Storage')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
       $this->productsArray['psus'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','PSU')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();
       $this->productsArray['computer_cases'] = Product::select('id','component_id')->where('store_id',$storeId)->where('type','Computer Case')
            ->addSelect(['name' => Component::select('name')
                ->whereColumn('component_id', 'components.id')
            ])->get();



    }



}

