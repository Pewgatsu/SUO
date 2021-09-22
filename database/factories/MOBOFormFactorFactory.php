<?php

namespace Database\Factories;

use App\Models\MOBOFormFactor;
use Illuminate\Database\Eloquent\Factories\Factory;

class MOBOFormFactorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MOBOFormFactor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'AT',
                'ATX',
                'EATX',
                'Flex ATX',
                'HPTX',
                'Micro ATX',
                'Mini ITX',
                'Thin Mini ITX',
                'Mini DTX',
                'SSI CEB',
                'SSI EEB',
                'XL ATX'
            ])
        ];
    }
}
