<?php

namespace Database\Factories;

use App\Models\MemorySpeed;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemorySpeedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemorySpeed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->numerify('DDR#-####')
        ];
    }
}
