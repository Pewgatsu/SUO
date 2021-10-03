<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => Account::factory(),
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'description' => $this->faker->optional()->paragraph()
        ];
    }
}
