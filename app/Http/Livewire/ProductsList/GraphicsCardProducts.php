<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class GraphicsCardProducts extends Component
{
    private array $other_components = array('motherboards', 'cpus', 'cpu_coolers', 'rams', 'storages', 'psus', 'computer_cases');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available Graphics Cards from Different Stores
        $store_products = Product::where('type', 'Graphics Card')
            ->where('status', 'Available')
            ->orderBy('created_at')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // No Other Components Selected
        if (empty($current_build)) {
            $product_graphics_cards = Product::with('store', 'component')
                ->whereIn('products.id', $product_ids)
                ->select('products.*')
                ->join('components','components.id','=','products.component_id')
                ->orderBy('components.name')
                ->paginate(10);

            return view('livewire.products-list.graphics-card-products', [
                'product_graphics_cards' => $product_graphics_cards
            ]);
        }

        // Filtering Component
        $graphics_cards = Product::whereIn('id', $product_ids)->get();
        $graphics_card_distances = array();
        foreach ($graphics_cards as $graphics_card) {
            $graphics_card_distances["$graphics_card->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $graphics_card)) {
                    $graphics_card_distances["$graphics_card->id"]["$product->type"] = $distance;
                } else {
                    $graphics_card_distances["$graphics_card->id"]["$product->type"] = ComponentDistance::ComputeDistance($product, $graphics_card);
                }
            }
        }

        // Get Maximum Standard Score
        foreach ($graphics_card_distances as $id => $graphics_card_distance) {
            if (min($graphics_card_distance) < 0){
                unset($graphics_card_distances[$id]);
            }
            else {
                $graphics_card_distances[$id] = min($graphics_card_distance);
            }
        }

        // Sort the Distance in Descending Order
        asort($graphics_card_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($graphics_card_distances);

        $product_order = implode(',', $product_ids);

        $product_graphics_cards = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.graphics-card-products', [
            'product_graphics_cards' => $product_graphics_cards
        ]);
    }
}
