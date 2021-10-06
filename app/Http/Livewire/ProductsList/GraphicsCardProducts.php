<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\Product;
use Livewire\Component;

class GraphicsCardProducts extends Component
{
    public function render()
    {
        $store_products = Product::where('type', 'Graphics Card')
            ->where('status', 'Available')
            ->groupBy(['store_id','component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product){
            $product_ids[] = $store_product->id;
        }

        $product_graphics_cards = Product::with('store','component')
            ->whereIn('id',$product_ids)->paginate(10);

        return view('livewire.products-list.graphics-card-products', [
            'product_graphics_cards' => $product_graphics_cards
        ]);
    }
}
