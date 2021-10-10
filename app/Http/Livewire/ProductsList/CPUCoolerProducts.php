<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class CPUCoolerProducts extends Component
{
    private array $other_components = array('motherboards', 'cpus', 'graphics_cards', 'rams', 'storages', 'psus', 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available CPU Coolers from Different Stores
        $store_products = Product::where('type', 'CPU Cooler')
            ->where('status', 'Available')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)) {
            $product_cpu_coolers = Product::with('store', 'component')
                ->whereIn('id', $product_ids)->paginate(10);

            return view('livewire.products-list.cpu-cooler-products', [
                'product_cpu_coolers' => $product_cpu_coolers
            ]);
        }

        // Filtering Component
        $cpu_coolers = Product::whereIn('id', $product_ids)->get();
        $cpu_cooler_distances = array();
        foreach ($cpu_coolers as $cpu_cooler) {
            $cpu_cooler_distances["$cpu_cooler->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $cpu_cooler)) {
                    $cpu_cooler_distances["$cpu_cooler->id"]["$product->type"] = 1 / (1 + $distance);
                } else {
                    $cpu_cooler_distances["$cpu_cooler->id"]["$product->type"] = 1 / (1 + ComponentDistance::ComputeDistance($product, $cpu_cooler));
                }
            }
        }

        // Average the Distances
        foreach ($cpu_cooler_distances as $id => $cpu_cooler_distance) {
            $cpu_cooler_distances[$id] = array_sum($cpu_cooler_distance) / count($cpu_cooler_distance);
        }

        // Sort the Distance in Descending Order
        arsort($cpu_cooler_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($cpu_cooler_distances);

        $product_order = implode(',', $product_ids);

        $product_cpu_coolers = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.cpu-cooler-products', [
            'product_cpu_coolers' => $product_cpu_coolers
        ]);
    }
}
