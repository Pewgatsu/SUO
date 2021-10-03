<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class DeleteProduct extends Component
{
    public $type;
    public $component;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $component, $store)
    {
        $this->type = $type;
        $this->component = $component;
        $this->store = $store;
    }

    public function setID(){
        switch ($this->type){
            case 'Motherboard':
                return 'delete_motherboard_products_' . $this->component->id;
            case 'CPU':
                return 'delete_cpu_products_' . $this->component->id;
            case 'CPU Cooler':
                return 'delete_cpu_cooler_products_' . $this->component->id;
            case 'Graphics Card':
                return 'delete_graphics_card_products_' . $this->component->id;
            case 'RAM':
                return 'delete_ram_products_' . $this->component->id;
            case 'Storage':
                return 'delete_storage_products_' . $this->component->id;
            case 'PSU':
                return 'delete_psu_products_' . $this->component->id;
            case 'Computer Case':
                return 'delete_computer_case_products_' . $this->component->id;
            default:
                return null;
        }
    }

    public function setRoute(){
        switch ($this->type){
            case 'Motherboard':
                return route('seller.products.motherboards.delete', $this->component);
            case 'CPU':
                return route('seller.products.cpus.delete', $this->component);
            case 'CPU Cooler':
                return route('seller.products.cpu_coolers.delete', $this->component);
            case 'Graphics Card':
                return route('seller.products.graphics_cards.delete', $this->component);
            case 'RAM':
                return route('seller.products.rams.delete', $this->component);
            case 'Storage':
                return route('seller.products.storages.delete', $this->component);
            case 'PSU':
                return route('seller.products.psus.delete', $this->component);
            case 'Computer Case':
                return route('seller.products.computer_cases.delete', $this->component);
            default:
                return null;
        }
    }

    public function setQuantity(){
        return $this->component->products->where('store_id',$this->store->id)->where('status','Available')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.delete-product');
    }
}
