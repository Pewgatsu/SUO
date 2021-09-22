<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditStoreController extends Controller
{

    public function index(){
        if (Auth::check()) {
            //checks if the user is logged in
            $userId = Auth::user()->getAuthIdentifier();
            if($userId == session('presentStoreId') ){
                return view('store.editStore');
            }else{
                return view('landing.landingpage');
            }

        }else {
            return view('landing.landingpage');
        }
    }

    public function saveInfo(Request  $request)
    {
        //validate the input fields



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
            ['banner' => $store_banner],
            ['name' => $request->storeName],
            ['address' => $request->storeAddress],
                ['description' => $request->storeDescription],
                ['featured_motherboards' => $request->motherboards],
                ['featured_cpus' => $request->cpus],
                ['featured_cpu_coolers' => $request->cpu_coolers],
                ['featured_graphics_cards' => $request->graphics_cards],
                ['featured_rams' => $request->rams],
                ['featured_storages' => $request->storages],
                ['featured_psus' => $request->psus],
                ['featured_computer_cases' => $request->computer_cases]
        );


        if ($storeInfo->wasRecentlyCreated) {
            // Store Information just created in the database; it didn't exist before.
            return redirect()->route('viewStore',session('presentStoreId'));
        } else {
            // Store Information already existed and was pulled from database.
            Store::where('id', session('presentStoreId'))->update(
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
            return redirect()->route('viewStore',session('presentStoreId'));
        }



        //Inserting in in the database




    }
}
