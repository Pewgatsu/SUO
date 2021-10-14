<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class CPUProducts extends Component
{
    private array $other_components = array('motherboards', 'cpu_coolers', 'graphics_cards', 'rams', 'storages', 'psus', 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available CPUs from Different Stores
        $store_products = Product::where('type', 'CPU')
            ->where('status', 'Available')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)) {
            $product_cpus = Product::with('store', 'component')
                ->whereIn('id', $product_ids)->paginate(10);

            return view('livewire.products-list.cpu-products', [
                'product_cpus' => $product_cpus
            ]);
        }

        // Filtering Component
        $cpus = Product::whereIn('id', $product_ids)->get();
        $cpu_distances = array();
        foreach ($cpus as $cpu) {
            $cpu_distances["$cpu->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $cpu)) {
                    $cpu_distances["$cpu->id"]["$product->type"] = 1 / (1 + $distance);
                } else {
                    $cpu_distances["$cpu->id"]["$product->type"] = 1 / (1 + ComponentDistance::ComputeDistance($product, $cpu));
                }
            }
        }

        // Get Maximum Standard Score
        foreach ($cpu_distances as $id => $cpu_distance) {
            $cpu_distances[$id] = max($cpu_distance);
        }

        // Sort the Distance in Descending Order
        arsort($cpu_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($cpu_distances);

        $product_order = implode(',', $product_ids);

        $product_cpus = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.cpu-products', [
            'product_cpus' => $product_cpus
        ]);
    }
}
