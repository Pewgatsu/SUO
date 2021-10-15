<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class PSUProducts extends Component
{
    private array $other_components = array('motherboards', 'cpus', 'cpu_coolers', 'graphics_cards', 'rams', 'storages', 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available PSUs from Different Stores
        $store_products = Product::where('type', 'PSU')
            ->where('status', 'Available')
            ->orderBy('created_at')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)) {
            $product_psus = Product::with('store', 'component')
                ->whereIn('products.id', $product_ids)
                ->select('products.*')
                ->join('components','components.id','=','products.component_id')
                ->orderBy('components.name')
                ->paginate(10);

            return view('livewire.products-list.psu-products', [
                'product_psus' => $product_psus
            ]);
        }

        // Filtering Component
        $psus = Product::whereIn('id', $product_ids)->get();
        $psu_distances = array();
        foreach ($psus as $psu) {
            $psu_distances["$psu->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $psu)) {
                    $psu_distances["$psu->id"]["$product->type"] = 1 / (1 + $distance);
                } else {
                    $psu_distances["$psu->id"]["$product->type"] = 1 / (1 + ComponentDistance::ComputeDistance($product, $psu));
                }
            }
        }

        // Get Maximum Standard Score
        foreach ($psu_distances as $id => $psu_distance) {
            $psu_distances[$id] = max($psu_distance);
        }

        // Sort the Distance in Descending Order
        arsort($psu_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($psu_distances);

        $product_order = implode(',', $product_ids);

        $product_psus = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.psu-products', [
            'product_psus' => $product_psus
        ]);
    }
}
