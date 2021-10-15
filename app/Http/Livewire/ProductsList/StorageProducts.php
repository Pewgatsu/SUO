<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class StorageProducts extends Component
{
    private array $other_components = array('motherboards', 'cpus', 'cpu_coolers', 'graphics_cards', 'rams', 'psus', 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available Storages from Different Stores
        $store_products = Product::where('type', 'Storage')
            ->where('status', 'Available')
            ->orderBy('created_at')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)) {
            $product_storages = Product::with('store', 'component')
                ->whereIn('products.id', $product_ids)
                ->select('products.*')
                ->join('components','components.id','=','products.component_id')
                ->orderBy('components.name')
                ->paginate(10);

            return view('livewire.products-list.storage-products', [
                'product_storages' => $product_storages
            ]);
        }

        // Filtering Component
        $storages = Product::whereIn('id', $product_ids)->get();
        $storage_distances = array();
        foreach ($storages as $storage) {
            $storage_distances["$storage->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $storage)) {
                    $storage_distances["$storage->id"]["$product->type"] = 1 / (1 + $distance);
                } else {
                    $storage_distances["$storage->id"]["$product->type"] = 1 / (1 + ComponentDistance::ComputeDistance($product, $storage));
                }
            }
        }

        // Get Maximum Standard Score
        foreach ($storage_distances as $id => $storage_distance) {
            $storage_distances[$id] = max($storage_distance);
        }

        // Sort the Distance in Descending Order
        arsort($storage_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($storage_distances);

        $product_order = implode(',', $product_ids);

        $product_storages = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.storage-products', [
            'product_storages' => $product_storages
        ]);
    }
}
