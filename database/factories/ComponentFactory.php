<?php

namespace Database\Factories;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComponentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Component::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['Motherboard','CPU','CPU Cooler','Graphics Card','RAM','Storage','PSU','Computer Case']),
            'manufacturer' => $this->faker->company(),
            'series' => $this->faker->word(),
            'model' => $this->faker->word(),
            'color' => $this->faker->colorName(),
            'length' => $this->faker->randomFloat(2,0,1000),
            'width' => $this->faker->randomFloat(2,0,1000),
            'height' => $this->faker->randomFloat(2,0,1000),
        ];
    }
}
