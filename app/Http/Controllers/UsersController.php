<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(10);
        return view('users.index', [
            'accounts' => $accounts
        ]);
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return back();
    }
}
