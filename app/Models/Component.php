<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $table = 'components';

    protected $fillable = [
        'image_path',
        'name',
        'manufacturer',
        'series',
        'model',
        'color',
        'length',
        'width',
        'height'
    ];

    public function type(){
        if ($this->motherboard()->find($this->id)){
            return 'Motherboard';
        }
        elseif ($this->cpu()->find($this->id)){
            return 'CPU';
        }
        elseif ($this->cpu_cooler()->find($this->id)){
            return 'CPU Cooler';
        }
        elseif ($this->graphics_card()->find($this->id)){
            return 'Graphics Card';
        }
        elseif ($this->ram()->find($this->id)){
            return 'RAM';
        }
        elseif ($this->storage()->find($this->id)){
            return 'Storage';
        }
        elseif ($this->psu()->find($this->id)){
            return 'PSU';
        }
        elseif ($this->computer_case()->find($this->id)){
            return 'Computer Case';
        }
        else {
            return null;
        }
    }

    public function motherboard(){
        return $this->hasOne(Motherboard::class);
    }
    public function cpu(){
        return $this->hasOne(CPU::class);
    }

    public function cpu_cooler(){
        return $this->hasOne(CPUCooler::class);
    }

    public function graphics_card(){
        return $this->hasOne(GraphicsCard::class);
    }

    public function ram(){
        return $this->hasOne(RAM::class);
    }

    public function storage(){
        return $this->hasOne(Storage::class);
    }

    public function psu(){
        return $this->hasOne(PSU::class);
    }

    public function computer_case(){
        return $this->hasOne(ComputerCase::class);
    }
}
