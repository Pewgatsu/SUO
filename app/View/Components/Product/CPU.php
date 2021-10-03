<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class CPU extends Component
{
    public $mode;
    public $cpuComponents;
    public $cpuComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $cpuComponents = null, $cpuComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->cpuComponents = $cpuComponents;
        $this->cpuComponent = $cpuComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_cpu_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_cpu_products_' . $this->cpuComponent->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_cpu');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.cpus.edit', $this->cpuComponent);
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
                case 'cpu_component':
                    return $this->cpuComponent->name;
                case 'cpu_quantity':
                    return $this->cpuComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'cpu_price':
                    return $this->cpuComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'cpu_description':
                    return $this->cpuComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.cpu');
    }
}
