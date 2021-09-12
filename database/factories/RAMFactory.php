<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\RAM;
use Illuminate\Database\Eloquent\Factories\Factory;

class RAMFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RAM::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'memory_type' => $this->faker->randomElement([
                'DDR',
                'DDR2',
                'DDR3',
                'DDR4'
            ]),
            'memory_speed' => $this->faker->randomNumber(4),
            'memory_capacity' => $this->faker->randomNumber(2),
            'memory_form_factor' => $this->faker->randomElement([
                '184-pin DIMM',
                '200-pin SODIMM',
                '204-pin SODIMM',
                '240-pin DIMM',
                '260-pin SODIMM',
                '288-pin DIMM'
            ]),
            'modules' => $this->faker->randomElement([
                '1 x 2GB',
                '2 x 1GB',
                '3 x 1GB',
                '1 x 4GB',
                '2 x 2GB',
                '3 x 2GB',
                '1 x 8GB',
                '2 x 4GB',
                '4 x 2GB',
                '3 x 4GB',
                '6 x 2GB',
                '1 x 16GB',
                '2 x 8GB',
                '4 x 4GB',
                '3 x 8GB',
                '6 x 4GB',
                '1 x 32GB',
                '2 x 16GB',
                '4 x 8GB'
            ]),
            'memory_voltage' => $this->faker->randomFloat(1,0,3),
            'memory_timings' => $this->faker->numerify('##-##-##-##'),
            'ecc' => $this->faker->boolean(),
            'registered' => $this->faker->boolean(),
            'heat_spreader' => $this->faker->boolean()
        ];
    }
}
