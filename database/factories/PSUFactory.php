<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\PSU;
use Illuminate\Database\Eloquent\Factories\Factory;

class PSUFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PSU::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'psu_form_factor' => $this->faker->randomElement([
                'ATX',
                'ATX / BTX',
                'ATX12V',
                'ATX12V / EPS12V',
                'Flex ATX',
                'Micro ATX',
                'Mini ITX',
                'SFX12V',
                'TFX12V'
            ]),
            'wattage' => $this->faker->randomNumber(3),
            'efficiency_rating' => $this->faker->randomElement([
                '80+ Titanium',
                '80+ Platinum',
                '80+ Gold',
                '80+ Silver',
                '80+ Bronze',
                '80+'
            ]),
            'modular' => $this->faker->randomElement([
                'None',
                'Semi',
                'Full'
            ]),
            'atx_connector' => $this->faker->numberBetween(0,16),
            'eps_connector' => $this->faker->numberBetween(0,16),
            'sata_connector' => $this->faker->numberBetween(0,16),
            'molex_4pin_connector' => $this->faker->numberBetween(0,16),
            'pcie_8pin_connector' => $this->faker->numberBetween(0,16),
            'pcie_6+2pin_connector' => $this->faker->numberBetween(0,16),
            'pcie_6pin_connector' => $this->faker->numberBetween(0,16)
        ];
    }
}
