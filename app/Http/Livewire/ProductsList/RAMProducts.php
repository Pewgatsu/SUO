<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class RAMProducts extends Component
{
    private array $other_components = array('motherboards', 'cpus', 'cpu_coolers', 'graphics_cards', 'storages', 'psus', 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available RAMs from Different Stores
        $store_products = Product::where('type', 'RAM')
            ->where('status', 'Available')
            ->orderBy('created_at')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)) {
            $product_rams = Product::with('store', 'component')
                ->whereIn('products.id', $product_ids)
                ->select('products.*')
                ->join('components','components.id','=','products.component_id')
                ->orderBy('components.name')
                ->paginate(10);

            return view('livewire.products-list.ram-products', [
                'product_rams' => $product_rams
            ]);
        }

        // Filtering Component
        $rams = Product::whereIn('id', $product_ids)->get();
        $ram_distances = array();
        foreach ($rams as $ram) {
            $ram_distances["$ram->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $ram)) {
                    $ram_distances["$ram->id"]["$product->type"] = 1 / (1 + $distance);
                } else {
                    $ram_distances["$ram->id"]["$product->type"] = 1 / (1 + ComponentDistance::ComputeDistance($product, $ram));
                }
            }
        }

        // Get Maximum Standard Score
        foreach ($ram_distances as $id => $ram_distance) {
            $ram_distances[$id] = max($ram_distance);
        }

        // Sort the Distance in Descending Order
        arsort($ram_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($ram_distances);

        $product_order = implode(',', $product_ids);

        $product_rams = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.ram-products', [
            'product_rams' => $product_rams
        ]);
    }
}
