<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\Motherboard;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => Store::factory(),
            'component_id' => Component::factory(),
            'price' => $this->faker->randomFloat(2,0,50000),
            'type' => $this->faker->randomElement(['Motherboard','CPU','CPU Cooler','Graphics Card','RAM','Storage','PSU','Computer Case']),
            'status' => $this->faker->randomElement(['Available','Ordered','Confirmed', 'Sold Out']),
            'status_date' => $this->faker->date() . ' ' . $this->faker->time(),
            'description' => $this->faker->optional()->paragraph()
        ];
    }
}
