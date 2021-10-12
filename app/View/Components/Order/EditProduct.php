<?php

namespace App\View\Components\Order;

use Illuminate\View\Component;

class EditProduct extends Component
{
    public $type;
    public $component;
    public $product;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $component, $product)
    {
        $this->type = $type;
        $this->component = $component;
        $this->product = $product;
    }

    public function setID(){
        switch ($this->type){
            case 'Motherboard':
                return 'edit_motherboard_product_' . $this->product->id;
            case 'CPU':
                return 'edit_cpu_product_' . $this->product->id;
            case 'CPU Cooler':
                return 'edit_cpu_cooler_product_' . $this->product->id;
            case 'Graphics Card':
                return 'edit_graphics_card_product_' . $this->product->id;
            case 'RAM':
                return 'edit_ram_product_' . $this->product->id;
            case 'Storage':
                return 'edit_storage_product_' . $this->product->id;
            case 'PSU':
                return 'edit_psu_product_' . $this->product->id;
            case 'Computer Case':
                return 'edit_computer_case_product_' . $this->product->id;
            default:
                return null;
        }
    }

    public function setRoute(){
        switch ($this->type){
            case 'Motherboard':
                return route('seller.products.motherboards.orders.edit', [$this->component, $this->product]);
            case 'CPU':
                return route('seller.products.cpus.orders.edit', [$this->component, $this->product]);
            case 'CPU Cooler':
                return route('seller.products.cpu_coolers.orders.edit', [$this->component, $this->product]);
            case 'Graphics Card':
                return route('seller.products.graphics_cards.orders.edit', [$this->component, $this->product]);
            case 'RAM':
                return route('seller.products.rams.orders.edit', [$this->component, $this->product]);
            case 'Storage':
                return route('seller.products.storages.orders.edit', [$this->component, $this->product]);
            case 'PSU':
                return route('seller.products.psus.orders.edit', [$this->component, $this->product]);
            case 'Computer Case':
                return route('seller.products.computer_cases.orders.edit', [$this->component, $this->product]);
            default:
                return null;
        }
    }

    public function oldField($string){
        switch ($string){
            case 'product_name':
                return $this->component->name;
            case 'product_price':
                return $this->product->price;
            case 'product_description':
                return $this->product->description;
            default:
                return null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order.edit-product');
    }
}
