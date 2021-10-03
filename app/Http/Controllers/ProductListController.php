<?php
namespace App\Http\Controllers;

use App\Models\Product;


class ProductListController extends Controller
{
    public function index_motherboards()
    {
        $motherboard_products=Product::with('component')->where('type', 'Motherboard')->paginate(10);

        return view('products.index', [
            'motherboard_products' => $motherboard_products,
        ]);
    }

    public function index_cpus()
    {
        $cpu_products=Product::with('component')->where('type', 'CPU')->paginate(10);
        return view('products.index', [
            'cpus_products' => $cpu_products,
        ]);
    }

    public function index_cpu_coolers()
    {
        $cpu_cooler_products=Product::with('component')->where('type', 'CPU_Cooler')->paginate(10);
        return view('products.index', [
            'cpu_cooler_products' => $cpu_cooler_products,
        ]);
    }

    public function index_graphics_cards()
    {
        $graphics_card_products=Product::with('component')->where('type', 'Graphics_Card')->paginate(10);
        return view('products.index', [
            'graphics_cards' => $graphics_card_products,
        ]);
    }

    public function index_rams()
    {
        $ram_products=Product::with('component')->where('type', 'RAM')->paginate(10);
        return view('products.index', [
            'rams'=> $ram_products,
        ]);
    }

    public function index_storages()
    {
        $storage_products=Product::with('component')->where('type', 'Storage')->paginate(10);
        return view('products.index', [
            'storage'=> $storage_products,
        ]);
    }

    public function index_psus()
    {
        $psu_products=Product::with('component')->where('type', 'PSU')->paginate(10);
        return view('products.index', [
            'psus'=> $psu_products,
        ]);
    }

    public function index_computer_cases()
    {
        $cases_products=Product::with('component')->where('type', 'Case')->paginate(10);
        return view('products.index', [
            'cases'=> $cases_products,
        ]);
    }
}
