<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Store;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //
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
        //dd($findId);
        session(['banner'=>$findId[0]->banner,
            'storeName'=>$findId[0]->name,
            'storeAddress' =>$findId[0]->address,
            'storeDescription'=>$findId[0]->description,
            'featured_motherboards'=>$findId[0]->featured_motherboards,
            'featured_cpus'=>$findId[0]->featured_cpus,
            'featured_cpu_coolers'=>$findId[0]->featured_cpu_coolers,
            'featured_graphics_cards'=>$findId[0]->featured_graphics_cards,
            'featured_rams'=>$findId[0]->featured_rams,
            'featured_storages'=>$findId[0]->featured_storages,
            'featured_psus'=>$findId[0]->featured_psus,
            'featured_computer_cases'=>$findId[0]->featured_computer_cases
        ]);
        if(strlen(session('banner')) ==1){
            //{{session('banner')}}
            //session(['banner'=> '{{asset("/images/placeholder.jpg") }}']);
            session()->forget(['banner']);
        }
    }

}
