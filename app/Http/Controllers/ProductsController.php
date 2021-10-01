<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Store;

class ProductsController extends Controller
{
    public function index_motherboards()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $motherboard_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Motherboard')
            ->paginate(10);
        $motherboards = Component::where('type', 'Motherboard')->get();
        return view('seller.products.index', [
            'store' => $store,
            'motherboard_components' => $motherboard_components,
            'motherboards' => $motherboards
        ]);
    }

    public function index_cpus()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $cpu_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'CPU')
            ->paginate(10);
        $cpus = Component::where('type', 'CPU')->get();
        return view('seller.products.index', [
            'store' => $store,
            'cpu_components' => $cpu_components,
            'cpus' => $cpus
        ]);
    }

    public function index_cpu_coolers()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $cpu_cooler_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'CPU Cooler')
            ->paginate(10);
        $cpu_coolers = Component::where('type', 'CPU Cooler')->get();
        return view('seller.products.index', [
            'store' => $store,
            'cpu_cooler_components' => $cpu_cooler_components,
            'cpu_coolers' => $cpu_coolers
        ]);
    }

    public function index_graphics_cards()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $graphics_card_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Graphics Card')
            ->paginate(10);
        $graphics_cards = Component::where('type', 'Graphics Card')->get();
        return view('seller.products.index', [
            'store' => $store,
            'graphics_card_components' => $graphics_card_components,
            'graphics_cards' => $graphics_cards
        ]);
    }

    public function index_rams()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $ram_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'RAM')
            ->paginate(10);
        $rams = Component::where('type', 'RAM')->get();
        return view('seller.products.index', [
            'store' => $store,
            'ram_components' => $ram_components,
            'rams' => $rams
        ]);
    }

    public function index_storages()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $storage_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Storage')
            ->paginate(10);
        $storages = Component::where('type', 'Storage')->get();
        return view('seller.products.index', [
            'store' => $store,
            'storage_components' => $storage_components,
            'storages' => $storages
        ]);
    }

    public function index_psus()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $psu_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'PSU')
            ->paginate(10);
        $psus = Component::where('type', 'PSU')->get();
        return view('seller.products.index', [
            'store' => $store,
            'psu_components' => $psu_components,
            'psus' => $psus
        ]);
    }

    public function index_computer_cases()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $computer_case_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Computer Case')
            ->paginate(10);
        $computer_cases = Component::where('type', 'Computer Case')->get();
        return view('seller.products.index', [
            'store' => $store,
            'computer_case_components' => $computer_case_components,
            'computer_cases' => $computer_cases
        ]);
    }
}
