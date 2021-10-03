<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class ComputerCase extends Component
{
    public $mode;
    public $computerCaseComponents;
    public $computerCaseComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $computerCaseComponents = null, $computerCaseComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->computerCaseComponents = $computerCaseComponents;
        $this->computerCaseComponent = $computerCaseComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_computer_case_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_computer_case_products_' . $this->computerCaseComponent->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_computer_case');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.computer_cases.edit', $this->computerCaseComponent);
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
                case 'case_component':
                    return $this->computerCaseComponent->name;
                case 'case_quantity':
                    return $this->computerCaseComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'case_price':
                    return $this->computerCaseComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'case_description':
                    return $this->computerCaseComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.computer-case');
    }
}
