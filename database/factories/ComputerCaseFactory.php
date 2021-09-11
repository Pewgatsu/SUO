<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\ComputerCase;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerCaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComputerCase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'case_type' => $this->faker->randomElement([
                'ATX Desktop',
                'ATX Full Tower',
                'ATX Mid Tower',
                'ATX Mini Tower',
                'ATX Test Bench',
                'HTPC',
                'MicroATX Desktop',
                'MicroATX Mid Tower',
                'MicroATX Mini Tower',
                'MicroATX Slim',
                'Mini ITX Desktop',
                'Mini ITX Test Bench',
                'Mini ITX Tower'
            ]),
            'mobo_form_factor' => $this->faker->randomElement([
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
            ]),
            'power_supply' => $this->faker->optional()->numerify('### W'),
            'power_supply_shroud' => $this->faker->boolean(),
            'side_panel_window' => $this->faker->optional()->randomElement([
                'Acrylic',
                'Mesh',
                'Tinted Acrylic',
                'Tempered Glass',
                'Tinted Tempered Glass'
            ]),
            'water_cooled_support' => $this->faker->boolean(),
            'cooler_clearance' => $this->faker->randomFloat(2,0,1000),
            'graphics_clearance' => $this->faker->randomFloat(2,0,1000),
            'psu_clearance' => $this->faker->randomFloat(2,0,1000),
            'full_height_e_slot' => $this->faker->randomDigitNot(9),
            'half_height_e_slot' => $this->faker->randomDigitNot(9),
            'external_525_bay' => $this->faker->randomDigitNot(9),
            'external_350_bay' => $this->faker->randomDigitNot(9),
            'internal_350_bay' => $this->faker->randomDigitNot(9),
            'internal_250_bay' => $this->faker->randomDigitNot(9)
        ];
    }
}
