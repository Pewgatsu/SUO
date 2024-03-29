<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class CPUCooler extends Component
{
    public $mode;
    public $cpuCoolerComponents;
    public $cpuCoolerComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $cpuCoolerComponents = null, $cpuCoolerComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->cpuCoolerComponents = $cpuCoolerComponents;
        $this->cpuCoolerComponent = $cpuCoolerComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_cpu_cooler_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_cpu_cooler_products_' . $this->cpuCoolerComponent->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_cpu_cooler');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.cpu_coolers.edit', $this->cpuCoolerComponent);
        }
        else {
            return null;
        }
    }

    public function setTitle(){
        if (strtolower($this->mode) === 'add'){
            return 'Add';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'Edit';
        }
        else {
            return null;
        }
    }

    public function oldField($string){
        if (strtolower($this->mode) === 'edit'){
            switch ($string){
                case 'cpu_cooler_component':
                    return $this->cpuCoolerComponent->name;
                case 'cpu_cooler_quantity':
                    return $this->cpuCoolerComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'cpu_cooler_price':
                    return $this->cpuCoolerComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'cpu_cooler_description':
                    return $this->cpuCoolerComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
                default:
                    return null;
            }
        }
        return null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.cpu-cooler');
    }
}
