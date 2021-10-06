<?php

namespace App\Http\Livewire\ProductsList;

use App\Models\Product;
use Livewire\Component;

class MotherboardProducts extends Component
{
    public function render()
    {
        $store_products = Product::where('type', 'Motherboard')
            ->where('status', 'Available')
            ->groupBy(['store_id','component_id'])->get();

        $product_ids = array();
        foreach ($store_products as $store_product){
            $product_ids[] = $store_product->id;
        }

        $product_motherboards = Product::with('store','component')
            ->whereIn('id',$product_ids)->paginate(10);

        return view('livewire.products-list.motheboard-products', [
            'product_motherboards' => $product_motherboards
        ]);
    }
}
