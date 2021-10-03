<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index_motherboards()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $motherboard_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Motherboard')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'motherboard_components' => $motherboard_components
        ]);
    }

    public function index_cpus()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $cpu_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'CPU')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'cpu_components' => $cpu_components
        ]);
    }

    public function index_cpu_coolers()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $cpu_cooler_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'CPU Cooler')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'cpu_cooler_components' => $cpu_cooler_components
        ]);
    }

    public function index_graphics_cards()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $graphics_card_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Graphics Card')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'graphics_card_components' => $graphics_card_components
        ]);
    }

    public function index_rams()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $ram_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'RAM')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'ram_components' => $ram_components
        ]);
    }

    public function index_storages()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $storage_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Storage')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'storage_components' => $storage_components
        ]);
    }

    public function index_psus()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $psu_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'PSU')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'psu_components' => $psu_components
        ]);
    }

    public function index_computer_cases()
    {
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        $computer_case_components = Component::with('products')
            ->whereRelation('products', 'store_id', $store->id)
            ->whereRelation('products', 'type', 'Computer Case')
            ->paginate(10);
        return view('seller.products.index', [
            'store' => $store,
            'computer_case_components' => $computer_case_components
        ]);
    }

    public function edit_motherboard(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'mobo_component' => 'integer|size:' . $component->id,
            'mobo_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'mobo_price' => 'required|numeric|min:0',
            'mobo_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_motherboard_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $motherboard_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($motherboard_products as $motherboard_product){
            $motherboard_product->price = $request->mobo_price;
            $motherboard_product->description = $request->mobo_description;

            if ($motherboard_product->isDirty()){
                $motherboard_product->save();
            }
        }

        return back();
    }

    public function edit_cpu(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'cpu_component' => 'integer|size:' . $component->id,
            'cpu_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'cpu_price' => 'required|numeric|min:0',
            'cpu_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_cpu_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $cpu_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($cpu_products as $cpu_product){
            $cpu_product->price = $request->cpu_price;
            $cpu_product->description = $request->cpu_description;

            if ($cpu_product->isDirty()){
                $cpu_product->save();
            }
        }

        return back();
    }

    public function edit_cpu_cooler(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'cpu_cooler_component' => 'integer|size:' . $component->id,
            'cpu_cooler_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'cpu_cooler_price' => 'required|numeric|min:0',
            'cpu_cooler_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_cpu_cooler_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $cpu_cooler_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($cpu_cooler_products as $cpu_cooler_product){
            $cpu_cooler_product->price = $request->cpu_cooler_price;
            $cpu_cooler_product->description = $request->cpu_cooler_description;

            if ($cpu_cooler_product->isDirty()){
                $cpu_cooler_product->save();
            }
        }

        return back();
    }

    public function edit_graphics_card(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'graphics_card_component' => 'integer|size:' . $component->id,
            'graphics_card_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'graphics_card_price' => 'required|numeric|min:0',
            'graphics_card_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_graphics_card_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $graphics_card_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($graphics_card_products as $graphics_card_product){
            $graphics_card_product->price = $request->graphics_card_price;
            $graphics_card_product->description = $request->graphics_card_description;

            if ($graphics_card_product->isDirty()){
                $graphics_card_product->save();
            }
        }

        return back();
    }

    public function edit_ram(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'ram_component' => 'integer|size:' . $component->id,
            'ram_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'ram_price' => 'required|numeric|min:0',
            'ram_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_ram_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $ram_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($ram_products as $ram_product){
            $ram_product->price = $request->ram_price;
            $ram_product->description = $request->ram_description;

            if ($ram_product->isDirty()){
                $ram_product->save();
            }
        }

        return back();
    }

    public function edit_storage(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'storage_component' => 'integer|size:' . $component->id,
            'storage_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'storage_price' => 'required|numeric|min:0',
            'storage_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_storage_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $storage_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($storage_products as $storage_product){
            $storage_product->price = $request->storage_price;
            $storage_product->description = $request->storage_description;

            if ($storage_product->isDirty()){
                $storage_product->save();
            }
        }

        return back();
    }

    public function edit_psu(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'psu_component' => 'integer|size:' . $component->id,
            'psu_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'psu_price' => 'required|numeric|min:0',
            'psu_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_psu_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $psu_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($psu_products as $psu_product){
            $psu_product->price = $request->psu_price;
            $psu_product->description = $request->psu_description;

            if ($psu_product->isDirty()){
                $psu_product->save();
            }
        }

        return back();
    }

    public function edit_computer_case(Component $component, Request $request){
        $store = Store::where('account_id', auth()->user()->getAuthIdentifier())->firstOrFail();
        // Validate
        $validator = Validator::make($request->all(), [
            'case_component' => 'integer|size:' . $component->id,
            'case_quantity' => 'integer|size:' . $component->products->where('store_id',$store->id)->where('status','Available')->count(),
            'case_price' => 'required|numeric|min:0',
            'case_description' => 'nullable|string'
        ]);

        if ($validator->fails()){
            return back()->with('modal_id','edit_computer_case_products_' . $component->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        // Update
        $computer_case_products = $component->products->where('store_id',$store->id)->where('status','Available');
        foreach ($computer_case_products as $computer_case_product){
            $computer_case_product->price = $request->case_price;
            $computer_case_product->description = $request->case_description;

            if ($computer_case_product->isDirty()){
                $computer_case_product->save();
            }
        }

        return back();
    }
}
