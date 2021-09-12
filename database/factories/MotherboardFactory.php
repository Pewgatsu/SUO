<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\Motherboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherboardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Motherboard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'cpu_socket' => $this->faker->randomElement([
                'AM1',
                'AM2+',
                'AM3',
                'AM3+',
                'AM4',
                'C32',
                'FM1',
                'FM2',
                'FM2+',
                'G34',
                'LGA771',
                'LGA775',
                'LGA1150',
                'LGA1151',
                'LGA1155',
                'LGA1156',
                'LGA1200',
                'LGA1356',
                'LGA1366',
                'LGA2011',
                'LGA2011-3',
                'LGA2066',
                'sTR4',
                'sTRX4'
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
            'mobo_chipset' => $this->faker->randomElement([
                'AMD A75',
                'AMD A78',
                'AMD A85X',
                'AMD A88X',
                'AMD AM1',
                'AMD B350',
                'AMD B450',
                'AMD B550',
                'Intel C606',
                'Intel C612',
                'Intel G31',
                'Intel G33',
                'Intel G41',
                'Intel G43',
                'Intel G45',
                'Intel H110'
            ]),
            'memory_slot' => $this->faker->numberBetween(0,16),
            'memory_type' => $this->faker->randomElement([
                'DDR2',
                'DDR3',
                'DDR4'
            ]),
            'max_mem_support' => $this->faker->randomNumber(3),
            'mem_speed_support' => $this->faker->randomElement([
                'DDR4-3000',
                'DDR4-3200',
                'DDR4-3300',
                'DDR4-3333',
                'DDR4-3400',
                'DDR4-3466',
                'DDR4-3600',
                'DDR4-3666',
                'DDR4-3733',
                'DDR4-3800',
                'DDR4-3866',
                'DDR4-4000',
                'DDR4-4133',
                'DDR4-4266',
                'DDR4-4300',
                'DDR4-4400',
                'DDR4-4500'
            ]),
            'pcie_x16_slot' => $this->faker->randomDigit(),
            'pcie_x8_slot' => $this->faker->randomDigit(),
            'pcie_x4_slot' => $this->faker->randomDigit(),
            'pcie_x1_slot' => $this->faker->randomDigit(),
            'pci_slot' => $this->faker->randomDigit(),
            'm2_slot' => $this->faker->randomDigit(),
            'sata_6gb_slot' => $this->faker->randomDigit(),
            'sata_3gb_slot' => $this->faker->randomDigit(),
            'multigraphics_support' => $this->faker->optional()->randomElement([
                'CrossFire Capable',
                '2-Way SLI Capable',
                '3-Way SLI Capable',
                '4-Way SLI Capable'
            ]),
            'ecc_support' => $this->faker->boolean(),
            'raid_support' => $this->faker->boolean(),
            'wireless_support' => $this->faker->optional()->randomElement([
                '2 x 10 Gbit/s + 2 x 1 Gbit/s',
                '2 x 10 Gbit/s + 1 x 1 Gbit/s',
                '2 x 10 Gbit/s',
                '1 x 10 Gbit/s + 1 x 2.5 Gbit/s',
                '1 x 10 Gbit/s + 2 x 1 Gbit/s',
                '1 x 10 Gbit/s + 1 x 1 Gbit/s',
                '1 x 10 Gbit/s',
                '1 x 5 Gbit/s + 1 x 1 Gbit/s',
                '2 x 2.5 Gbit/s',
                '1 x 2.5 Gbit/s + 2 x 1 Gbit/s',
                '1 x 2.5 Gbit/s + 1 x 1 Gbit/s',
                '1 x 2.5 Gbit/s'
            ])
        ];
    }
}
