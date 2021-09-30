<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index_motherboards()
    {
        $account = Account::with('store')->find(auth()->user()->id);
        $motherboard_products = Product::with('component')->where('store_id',$account->store->id)->where('type', 'Motherboard')->paginate(10);

        $motherboard_table = array();
        foreach ($motherboard_products as $motherboard_product){
            $index = $motherboard_product->component_id;
            if (in_array($index,array_keys($motherboard_table))){
                $motherboard_table[$index]['quantity'] += 1;
                if($motherboard_product->status === 'Sold Out'){
                    $motherboard_table[$index]['sold'] += 1;
                }
                if ($motherboard_product->created_at > $motherboard_table[$index]['date_added']){
                    $motherboard_table[$index]['date_added'] = $motherboard_product->created_at;
                }
            }
            else {
                $motherboard_table[$index] = array(
                    "name" => $motherboard_product->component->name,
                    "date_added" => $motherboard_product->created_at,
                    "quantity" => 1,
                    "sold" => $motherboard_product->status === 'Sold Out' ? 1 : 0,
                    "unit_price" => $motherboard_product->price
                );
            }
        }

        return view('seller.products.index', [
            'motherboard_table' => $motherboard_table,
            'motherboard_products' => $motherboard_products
        ]);
    }

    public function index_cpus()
    {
        $cpu_products = Product::where('type', 'CPU')->get();
        return view('seller.products.index', [
            'cpu_products' => $cpu_products
        ]);
    }

    public function index_cpu_coolers()
    {
        $cpu_cooler_products = Product::where('type', 'CPU Cooler')->get();
        return view('seller.products.index', [
            'cpu_cooler_products' => $cpu_cooler_products
        ]);
    }

    public function index_graphics_cards()
    {
        $graphics_card_products = Product::where('type', 'Graphics Card')->get();
        return view('seller.products.index', [
            'graphics_card_products' => $graphics_card_products
        ]);
    }

    public function index_rams()
    {
        $ram_products = Product::where('type', 'RAM')->get();
        return view('seller.products.index', [
            'ram_products' => $ram_products
        ]);
    }

    public function index_storages()
    {
        $storage_products = Product::where('type', 'Storage')->get();
        return view('seller.products.index', [
            'storage_products' => $storage_products
        ]);
    }

    public function index_psus()
    {
        $psu_products = Product::where('type', 'PSU')->get();
        return view('seller.products.index', [
            'psu_products' => $psu_products
        ]);
    }

    public function index_computer_cases()
    {
        $computer_case_products = Product::where('type', 'Computer Case')->get();
        return view('seller.products.index', [
            'computer_case_products' => $computer_case_products
        ]);
    }
}
