<?php

namespace Database\Factories;

use App\Models\CPUSocket;
use Illuminate\Database\Eloquent\Factories\Factory;

class CPUSocketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CPUSocket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
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
            ])
        ];
    }
}
