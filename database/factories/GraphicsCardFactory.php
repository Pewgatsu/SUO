<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\GraphicsCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class GraphicsCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GraphicsCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'gpu_chipset' => $this->faker->randomElement([
                'GeForce GTX 1050',
                'GeForce GTX 1050 Ti',
                'GeForce GTX 1060 3GB',
                'GeForce GTX 1060 6GB',
                'GeForce GTX 1070',
                'GeForce GTX 1070 Ti',
                'GeForce GTX 1080',
                'GeForce GTX 1080 Ti',
                'GeForce GTX 1650 G5',
                'GeForce GTX 1650 G6',
                'GeForce GTX 1650 SUPER',
                'GeForce GTX 1660',
                'GeForce GTX 1660 SUPER',
                'GeForce GTX 1660 Ti',
                'Radeon RX 570',
                'Radeon RX 580',
                'Radeon RX 590',
                'Radeon RX 5500 XT',
                'Radeon RX 5600 XT',
                'Radeon RX 5700',
                'Radeon RX 5700 XT',
                'Radeon RX 6600 XT',
                'Radeon RX 6700 XT',
                'Radeon RX 6800',
                'Radeon RX 6800 XT',
                'Radeon RX 6900 XT'
            ]),
            'gpu_memory' => $this->faker->randomFloat('2',0,32),
            'gpu_memory_type' => $this->faker->randomElement([
                'DDR',
                'DDR2',
                'DDR3',
                'DDR4',
                'GDDR2',
                'GDDR3',
                'GDDR5',
                'GDDR5X',
                'GDDR6',
                'GDDR6X',
                'HBM',
                'HBM2'
            ]),
            'base_clock' => $this->faker->randomFloat(0,0,3000),
            'boost_clock' => $this->faker->optional()->randomFloat(0,0,3000),
            'interface' => $this->faker->randomElement([
                'PCI',
                'AGP',
                'PCIe x16',
                'PCIe x8',
                'PCIe x1'
            ]),
            'tdp' => $this->faker->randomNumber(3),
            'multigraphics_support' => $this->faker->optional()->randomElement([
                '4-way SLI Capable',
                '3-way SLI Capable',
                '2-way SLI Capable',
                '4-way CrossFire Capable',
                '3-way CrossFire Capable',
                '2-way CrossFire Capable'
            ]),
            'frame_sync' => $this->faker->optional()->randomElement([
                'FreeSync',
                'G-Sync'
            ]),
            'dvi_port' => $this->faker->randomDigitNot(9),
            'hdmi_port' => $this->faker->randomDigitNot(9),
            'mini_hdmi_port' => $this->faker->randomDigitNot(9),
            'displayport_port' => $this->faker->randomDigitNot(9),
            'mini_displayport_port' => $this->faker->randomDigitNot(9),
            'e_slot_width' => $this->faker->randomDigitNot(9),
            'external_power' => $this->faker->optional()->randomElement([
                '1 PCIe 6-pin',
                '2 PCIe 6-pin',
                '1 PCIe 8-pin',
                '1 PCIe 8-pin + 1 PCIe 6-pin',
                '2 PCIe 8-pin',
                '2 PCIe 8-pin + 1 PCIe 6-pin',
                '3 PCIe 8-pin',
                '4 PCIe 8-pin',
                '1 PCIe 12-pin'
            ]),
            'cooling' => $this->faker->optional()->randomElement([
                '1 Fan',
                '2 Fans',
                '3 Fans',
                '4 Fans',
                '5 Fans',
                '120 mm Radiator',
                '120 mm Radiator + 1 Fan',
                '120 mm Radiator + 2 Fans',
                '240 mm Radiator',
                '240 mm Radiator + 1 Fan',
                '360 mm Radiator + 1 Fan'
            ])
        ];
    }
}
