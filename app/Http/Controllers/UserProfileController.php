<?php

namespace App\Http\Controllers;



use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function index(){
        $account = $this->getUser();

        return view('user-profile.profile',['profile_path'=>$account->profile_path ,'username' => $account->username, 'email' =>$account->email]);
    }

    public function getUser(){
        $account = Auth::user();
        return $account;
    }

    public function update_profile(Request $request){

        $this->validate($request,$this->getRules(),$this->getMessages());

        $account = $this->getUser();

        $file_name = 'Account_'.$account->id;

        if(isset($request->photo)){

            if(Storage::disk('do_spaces')->exists($account->profile_path)){
                Storage::delete($account->profile_path);
            }

            $new_path = Storage::disk('do_spaces')->putFileAs('photos/profile/'.$account->id,$request->photo,$file_name,'public');
            $path = Storage::disk('do_spaces')->url($new_path);

        }else{
            $path = $account->profile_path;
        }

        $account->update([
            'username' => $request->username,
            'email' => $request->email,
            'profile_path' => $path
        ]);

        session()->flash('alert_message','Account successfully saved!');

        return redirect()->route('user.profile');
    }

    public function index_user(Account $account){
        return view('user-profile.index',[
            'account' => $account
        ]);
    }

    public function index_verify_account(){
        $account = $this->getUser();

        return view('user-profile.verify-account',['valid_id_path' => $account->valid_id_path]);
    }

    public function verify_account(Request $request){

        $this->validate($request,['nullable','image','5048']);

        $account = $this->getUser();

        $file_name = 'Account_'.$account->id;



        if(isset($request->valid_id)){

            if(Storage::disk('do_spaces')->exists($account->valid_id_path)){
                Storage::delete($account->valid_id_path);
            }

            $new_path = Storage::disk('do_spaces')->putFileAs('photos/id/'.$account->id,$request->valid_id,$file_name,'public');
            $path = Storage::disk('do_spaces')->url($new_path);
        }else{
            $path = $account->valid_id_path;
        }

        $account->update([
            'valid_id_path' => $path
        ]);


        session()->flash('alert_message','ID submitted!');

        return redirect()->route('seller.verify');
    }



    public function getRules(){
        return [
            //
            'username' => ['required','string', Rule::unique('accounts','username')->ignore(Auth::id())],
            'email' => ['required','email', Rule::unique('accounts','email')->ignore(Auth::id())],
            'photo' => ['nullable','image','max:1024']
        ];
    }

    public function getMessages(){
        return [
            'unique' => ':Attribute is already taken!',
            'required' => 'Field must not be empty!'
        ];
    }


}
