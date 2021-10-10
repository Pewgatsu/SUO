<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\ComponentDistance;
use App\Models\Product;
use Livewire\Component;

class ComputerCaseProducts extends Component
{
    private array $other_components = array('motherboards', 'cpus', 'cpu_coolers', 'graphics_cards', 'rams', 'storages', 'psus');

    public function render()
    {
        // Retrieve Current Selected Products
        $current_build = array();
        foreach ($this->other_components as $other_component) {
            if (session()->has($other_component)) {
                $current_build["$other_component"] = Product::find(session("$other_component.id"));
            }
        }

        // Retrieve All Unique Available Computer Cases from Different Stores
        $store_products = Product::where('type', 'Computer Case')
            ->where('status', 'Available')
            ->groupBy(['store_id', 'component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product) {
            $product_ids[] = $store_product->id;
        }

        // Not Other Components Selected
        if (empty($current_build)) {
            $product_computer_cases = Product::with('store', 'component')
                ->whereIn('id', $product_ids)->paginate(10);

            return view('livewire.products-list.computer-case-products', [
                'product_computer_cases' => $product_computer_cases
            ]);
        }

        // Filtering Component
        $computer_cases = Product::whereIn('id', $product_ids)->get();
        $computer_case_distances = array();
        foreach ($computer_cases as $computer_case) {
            $computer_case_distances["$computer_case->id"] = array();
            foreach ($current_build as $product) {
                if ($distance = ComponentDistance::getDistanceIfExist($product, $computer_case)) {
                    $computer_case_distances["$computer_case->id"]["$product->type"] = 1 / (1 + $distance);
                } else {
                    $computer_case_distances["$computer_case->id"]["$product->type"] = 1 / (1 + ComponentDistance::ComputeDistance($product, $computer_case));
                }
            }
        }

        // Average the Distances
        foreach ($computer_case_distances as $id => $computer_case_distance) {
            $computer_case_distances[$id] = array_sum($computer_case_distance) / count($computer_case_distance);
        }

        // Sort the Distance in Descending Order
        arsort($computer_case_distances);

        // Get the Order of Product IDs
        $product_ids = array_keys($computer_case_distances);

        $product_order = implode(',', $product_ids);

        $product_computer_cases = Product::with('store', 'component')
            ->whereIn('id', $product_ids)->orderByRaw("FIELD(id,$product_order)")->paginate(10);

        return view('livewire.products-list.computer-case-products', [
            'product_computer_cases' => $product_computer_cases
        ]);
    }
}
