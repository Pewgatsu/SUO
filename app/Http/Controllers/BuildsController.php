<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    public function index()
    {
        $builds = Build::with('build_products')->where('account_id', auth()->user()->getAuthIdentifier())->paginate(10);
        //dd($builds[0]->build_products[0]->status);
        return view('builds.builds', [
            'builds' => $builds,
        ]);
    }

    public function delete_build(Build $build)
    {
        if(!in_array('Ordered',array_column($build->build_products->toArray(),'status')) and
             !in_array('Confirmed',array_column($build->build_products->toArray(),'status')) and
             !in_array('Sold Out',array_column($build->build_products->toArray(),'status'))
        ){
            $build->delete();
        }

        return back();
    }
}
