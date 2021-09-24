<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class GraphicsCard extends Component
{
    public $mode;
    public $graphicsCard;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $graphicsCard = null)
    {
        $this->mode = $mode;
        $this->graphicsCard = $graphicsCard;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_graphics_card';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_graphics_card_' . $this->graphicsCard->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_graphics_card');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.graphics_cards.edit', $this->graphicsCard->component);
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
                case 'graphics_card_name':
                    return $this->graphicsCard->component->name;
                case 'graphics_card_manufacturer':
                    return $this->graphicsCard->component->manufacturer;
                case 'graphics_card_series':
                    return $this->graphicsCard->component->series;
                case 'graphics_card_model':
                    return $this->graphicsCard->component->model;
                case 'graphics_card_color':
                    return $this->graphicsCard->component->color;
                case 'graphics_card_length':
                    return $this->graphicsCard->component->length;
                case 'graphics_card_width':
                    return $this->graphicsCard->component->width;
                case 'graphics_card_height':
                    return $this->graphicsCard->component->height;
                case 'graphics_card_chipset':
                    return $this->graphicsCard->gpu_chipset;
                case 'graphics_card_memory':
                    return $this->graphicsCard->gpu_memory;
                case 'graphics_card_memory_type':
                    return $this->graphicsCard->gpu_memory_type;
                case 'graphics_card_base_clock':
                    return $this->graphicsCard->base_clock;
                case 'graphics_card_boost_clock':
                    return $this->graphicsCard->boost_clock;
                case 'graphics_card_interface':
                    return $this->graphicsCard->interface;
                case 'graphics_card_tdp':
                    return $this->graphicsCard->tdp;
                case 'graphics_card_multigraphics_support':
                    return $this->graphicsCard->multigraphics_support;
                case 'graphics_card_frame_sync':
                    return $this->graphicsCard->frame_sync;
                case 'graphics_card_dvi_port':
                    return $this->graphicsCard->dvi_port;
                case 'graphics_card_hdmi_port':
                    return $this->graphicsCard->hdmi_port;
                case 'graphics_card_mini_hdmi_port':
                    return $this->graphicsCard->mini_hdmi_port;
                case 'graphics_card_displayport_port':
                    return $this->graphicsCard->displayport_port;
                case 'graphics_card_mini_displayport_port':
                    return $this->graphicsCard->mini_displayport_port;
                case 'graphics_card_e_slot_width':
                    return $this->graphicsCard->e_slot_width;
                case 'graphics_card_external_power':
                    return $this->graphicsCard->external_power;
                case 'graphics_card_cooling':
                    return $this->graphicsCard->cooling;
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
        return view('components.component.graphics-card');
    }
}
