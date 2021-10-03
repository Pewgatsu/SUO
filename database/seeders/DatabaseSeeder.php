<?php

namespace Database\Seeders;

use App\Models\Account;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();
        Account::insert([
            'username' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'admin',
            'is_admin' => true,
            'firstname' => 'Test',
            'lastname' => 'Admin',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        Account::insert([
            'username' => 'seller',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'seller',
            'is_admin' => true,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        Account::insert([
            'username' => 'customer',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'customer',
            'is_admin' => true,
            'firstname' => 'Test',
            'lastname' => 'Customer',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
