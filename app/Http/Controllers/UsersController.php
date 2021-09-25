<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(10);
        return view('admin.users.index', [
            'accounts' => $accounts
        ]);
    }

    public function remove(Account $account)
    {
        // Delete Profile Pic
        if (isset($account->profile_path) && file_exists(public_path('images/accounts/' . $account->profile_path))){
            unlink(public_path('images/accounts/' . $account->profile_path));
        }

        $account->delete();

        return back();
    }

    public function suspend(Account $account)
    {
        $account->is_active = 0;
        $account->save();
        return back();
    }

    public function unsuspend(Account $account)
    {
        $account->is_active = 1;
        $account->save();
        return back();
    }
}
