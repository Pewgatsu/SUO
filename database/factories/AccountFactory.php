<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'username'=> $this->faker->name(),
            'password'=> $this->faker->password(),
            'email'=> $this->faker->safeEmail(),
            'account_type' => $this->faker->randomElement(['Seller','Customer']),
            'profile_path'=> $this->faker->name(),
            'firstname'=> $this->faker->firstName(),
            'lastname'=> $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Male','Female']),
            'birthdate' => $this->faker->date('Y-m-d','now'),
            'address'=> $this->faker->address(),
            'contact' => $this->faker->randomDigit(),
            'is_verified' => $this->faker->boolean(50),
            'is_active' => $this->faker->boolean(50),
            'is_admin' => $this->faker->boolean(50),
            'created_at' => $this->faker->date('Y-m-d','now'),
            'updated_at' => $this->faker->date('Y-m-d','now')
        ];
    }
}
