<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\CPU;
use Illuminate\Database\Eloquent\Factories\Factory;

class CPUFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CPU::class;

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
            'microarchitecture' => $this->faker->randomElement([
                'Bulldozer',
                'Excavator',
                'Jaguar',
                'K10',
                'Lynx',
                'Piledriver',
                'Puma+',
                'Steamroller',
                'Zen',
                'Zen 2',
                'Zen 3',
                'Zen+',
                'Broadwell',
                'Cascade Lake',
                'Coffee Lake',
                'Coffee Lake Refresh',
                'Comet Lake',
                'Core',
                'Haswell',
                'Haswell Refresh',
                'Ivy Bridge',
                'Kaby Lake',
                'Nehalem',
                'Rocket Lake',
                'Sandy Bridge',
                'Skylake',
                'Westmere',
                'Wolfdale',
                'Yorkfield'
            ]),
            'core_count' => $this->faker->numberBetween(0,16),
            'thread_count' => $this->faker->numberBetween(0,16),
            'base_clock' => $this->faker->randomFloat(1,0,9),
            'boost_clock' => $this->faker->optional()->randomFloat(1,0,9),
            'max_mem_support' => $this->faker->randomNumber(3),
            'tdp' => $this->faker->randomNumber(3),
            'smt_support' => $this->faker->boolean(),
            'ecc_support' => $this->faker->boolean(),
            'integrated_graphics' => $this->faker->optional()->randomElement([
                'Intel HD Graphics P4000',
                'Intel HD Graphics P4600',
                'Intel UHD Graphics 610',
                'Intel UHD Graphics 630',
                'Intel UHD Graphics 730',
                'Intel UHD Graphics 750',
                'Iris Pro Graphics 6200',
                'Radeon HD 6370D',
                'Radeon HD 6410D',
                'Radeon HD 6530D',
                'Radeon HD 6550D',
                'Radeon HD 7480D',
                'Radeon HD 7540D',
                'Radeon HD 7560D',
                'Radeon HD 7660D'
            ])
        ];
    }
}
