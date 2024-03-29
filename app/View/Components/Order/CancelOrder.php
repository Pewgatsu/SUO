<?php

namespace App\View\Components\Order;

use Illuminate\View\Component;

class CancelOrder extends Component
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
                return 'cancel_motherboard_product_' . $this->product->id;
            case 'CPU':
                return 'cancel_cpu_product_' . $this->product->id;
            case 'CPU Cooler':
                return 'cancel_cpu_cooler_product_' . $this->product->id;
            case 'Graphics Card':
                return 'cancel_graphics_card_product_' . $this->product->id;
            case 'RAM':
                return 'cancel_ram_product_' . $this->product->id;
            case 'Storage':
                return 'cancel_storage_product_' . $this->product->id;
            case 'PSU':
                return 'cancel_psu_product_' . $this->product->id;
            case 'Computer Case':
                return 'cancel_computer_case_product_' . $this->product->id;
            default:
                return null;
        }
    }

    public function setRoute(){
        switch ($this->type){
            case 'Motherboard':
                return route('seller.products.motherboards.orders.cancel', [$this->component, $this->product]);
            case 'CPU':
                return route('seller.products.cpus.orders.cancel', [$this->component, $this->product]);
            case 'CPU Cooler':
                return route('seller.products.cpu_coolers.orders.cancel', [$this->component, $this->product]);
            case 'Graphics Card':
                return route('seller.products.graphics_cards.orders.cancel', [$this->component, $this->product]);
            case 'RAM':
                return route('seller.products.rams.orders.cancel', [$this->component, $this->product]);
            case 'Storage':
                return route('seller.products.storages.orders.cancel', [$this->component, $this->product]);
            case 'PSU':
                return route('seller.products.psus.orders.cancel', [$this->component, $this->product]);
            case 'Computer Case':
                return route('seller.products.computer_cases.orders.cancel', [$this->component, $this->product]);
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
        return view('components.order.cancel-order');
    }
}
