<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    public function index()
    {
        $builds = Build::where('account_id', auth()->user()->getAuthIdentifier())->paginate(10);
        return view('builds.builds', [
            'builds' => $builds,
        ]);
    }

    public function delete_build(Build $build)
    {
        $build->delete();
        return back();
    }
}
