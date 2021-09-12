<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Storage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_id' => Component::factory(),
            'storage_type' => $this->faker->randomElement([
                'SSD',
                '5200RPM',
                '5400RPM',
                '5700RPM',
                '5760RPM',
                '5900RPM',
                '7200RPM',
                '10000RPM',
                '10025RPM',
                '10500RPM',
                '10520RPM',
                '15000RPM',
                'Hybrid'
            ]),
            'storage_capacity' => $this->faker->randomNumber(4),
            'interface' => $this->faker->randomElement([
                'SAS 12 Gb/s',
                'SAS 6 Gb/s',
                'SAS 3 Gb/s',
                'SATA 6 Gb/s',
                'SATA 3 Gb/s',
                'SATA 1.5 Gb/s',
                'Micro SATA 6 Gb/s',
                'Micro SATA 3 Gb/s',
                'PATA 133',
                'PATA 100',
                'PCIe x16',
                'PCIe x8',
                'PCIe x4',
                'PCIe x2',
                'PCIe x1',
                'mSATA',
                'M.2 (B+M)',
                'M.2 (M)',
                'U.2 (SFF-8639)'
            ]),
            'storage_form_factor' => $this->faker->randomElement([
                '1.8"',
                '2.5"',
                '3.5"',
                'M.2-22110',
                'M.2-2242',
                'M.2-2260',
                'M.2-2280',
                'mSATA',
                'PCI-E'
            ]),
            'storage_cache' => $this->faker->randomNumber(4),
            'nvme' => $this->faker->boolean()
        ];
    }
}
