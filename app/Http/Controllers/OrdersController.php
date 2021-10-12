<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index_motherboards(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $motherboard_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'motherboard_products' => $motherboard_products
        ]);
    }

    public function index_cpus(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $cpu_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'cpu_products' => $cpu_products
        ]);
    }

    public function index_cpu_coolers(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $cpu_cooler_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'cpu_cooler_products' => $cpu_cooler_products
        ]);
    }

    public function index_graphics_cards(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $graphics_card_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'graphics_card_products' => $graphics_card_products
        ]);
    }

    public function index_rams(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $ram_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'ram_products' => $ram_products
        ]);
    }

    public function index_storages(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $storage_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'storage_products' => $storage_products
        ]);
    }

    public function index_psus(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $psu_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'psu_products' => $psu_products
        ]);
    }

    public function index_computer_cases(Component $component){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $computer_case_products = Product::where('store_id',$store->id)
            ->where('component_id',$component->id)
            ->paginate(10);
        return view('seller.products.orders.index', [
            'component' => $component,
            'computer_case_products' => $computer_case_products
        ]);
    }

    public function delete_product(Component $component, Product $product){
        $product->delete();
        return back();
    }
}
