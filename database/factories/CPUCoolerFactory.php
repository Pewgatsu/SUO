<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\CPUCooler;
use Illuminate\Database\Eloquent\Factories\Factory;

class CPUCoolerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CPUCooler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'fan_speed' => $this->faker->numerify('### - #### RPM'),
            'noise_level' => $this->faker->numerify('## - ## dB'),
            'water_cooled_support' => $this->faker->optional()->numerify('### mm')
        ];
    }
}
