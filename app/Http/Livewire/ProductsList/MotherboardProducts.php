<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class MotherboardProducts extends Component
{
    private array $other_components =array('cpus', 'cpu_coolers', 'graphics_cards', 'rams', 'storages', 'psus' , 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component){
            if (session()->has($other_component)){
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available Products from different Stores
        $store_products = Product::where('type', 'Motherboard')
            ->where('status', 'Available')
            ->groupBy(['store_id','component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product){
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)){
            $product_motherboards = Product::with('store','component')
                ->whereIn('id',$product_ids)->paginate(10);

            return view('livewire.products-list.motheboard-products', [
                'product_motherboards' => $product_motherboards
            ]);
        }

        // Filtering Component
        $motherboards = Product::whereIn('id',$product_ids)->get();
        $motherboard_distances = array();
        foreach ($motherboards as $motherboard) {
            $motherboard_distances["$motherboard->id"] = array();
            foreach ($current_build as $product){
                if ($distance = ComponentDistance::getDistanceIfExist($product,$motherboard)){
                    $motherboard_distances["$motherboard->id"]["$product->type"] = $distance;
                }
                else {
                    $motherboard_distances["$motherboard->id"]["$product->type"] = ComponentDistance::ComputeDistance($product,$motherboard);
                }
            }
        }

        $product_order = implode(',',$product_ids);

        $product_motherboards = Product::with('store','component')
            ->whereIn('id',$product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);


        return view('livewire.products-list.motheboard-products', [
            'product_motherboards' => $product_motherboards
        ]);
    }
}
