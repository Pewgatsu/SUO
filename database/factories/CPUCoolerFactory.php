<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\CPUCooler;
use Illuminate\Database\Eloquent\Factories\Factory;

class CPUCoolerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CPUCooler::class;

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
                'AM2',
                'AM2+',
                'AM3',
                'AM3+',
                'AM4',
                'C32',
                'FM1',
                'FM2',
                'FM2+',
                'G34',
                'LGA1150',
                'LGA1151',
                'LGA1155',
                'LGA1156',
                'LGA1200',
                'LGA1356',
                'LGA1366',
                'LGA2011',
                'LGA2011-3',
                'LGA2011-3 Narrow',
                'LGA2066',
                'LGA3647',
                'LGA771',
                'LGA775',
                'sTR4',
                'sTRX4'
            ]),
            'fan_speed' => $this->faker->numerify('### - #### RPM'),
            'noise_level' => $this->faker->numerify('## - ## dB'),
            'water_cooled_support' => $this->faker->optional()->numerify('### mm')
        ];
    }
}
