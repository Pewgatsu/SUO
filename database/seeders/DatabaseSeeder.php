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
            'account_type' => 'Admin',
            'is_admin' => true,
            'firstname' => 'Test',
            'lastname' => 'Admin',
            'created_at' => $date,
            'updated_at' => $date,
            'is_active' => true
        ]);

        Account::insert([
            'username' => 'seller',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'created_at' => $date,
            'updated_at' => $date,
            'is_active' => true,
        ]);

        Account::insert([
            'username' => 'customer',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Customer',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Customer',
            'created_at' => $date,
            'updated_at' => $date,
            'is_active' => true
        ]);
    }
}
