<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Product;
use App\Models\Store;
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
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        Account::insert([
            'username' => 'seller',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        Account::insert([
            'username' => 'customer',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Customer',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Customer',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Account::insert([
            'username' => 'LemTech',
            'email' => 'lemuelantonioph@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Lemuel',
            'lastname' => 'Antonio',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        //LemTech Store Details
        Store::insert([
            'account_id' => '4',
            'banner' => 'lemtech_banner.jpg',
            'name' => 'LemTech',
            'address' => 'Makati City, Philippines',
            'location' => '14.556586, 121.023415',
            'description' => 'Your PC Components Shopping Cart',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        $this->call([
            ComponentsSeeder::class,
            CPUsSeeder::class,
            CPUCoolersSeeder::class,
            ComputerCasesSeeder::class,
            GraphicsCardsSeeder::class,
            MotherboardsSeeder::class,
            PSUsSeeder::class,
            RAMsSeeder::class,
            StoragesSeeder::class
        ]);

        //LemTech Products
        Product::insert([
            'store_id' => '1',
            'component_id' => '1',
            'price' => '37000',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '2',
            'price' => '24000',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '3',
            'price' => '23000',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '4',
            'price' => '11000',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '5',
            'price' => '12000',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '6',
            'price' => '11500',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '7',
            'price' => '9000',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '8',
            'price' => '5600',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '9',
            'price' => '5500',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '10',
            'price' => '5300',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '11',
            'price' => '2600',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '12',
            'price' => '5300',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
        'store_id' => '1',
        'component_id' => '13',
        'price' => '4500',
        'type' => 'PSU',
        'status' => 'Available',
        'status_date' => $date,
        'created_at' => $date,
        'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '14',
            'price' => '4000',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '15',
            'price' => '1600',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '16',
            'price' => '2300',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '17',
            'price' => '2000',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '18',
            'price' => '3100',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '19',
            'price' => '1800',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '20',
            'price' => '4300',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '21',
            'price' => '1050',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '22',
            'price' => '1000',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);


        //Dummy Store 1 & Products
        Account::insert([
            'username' => 'System Store 1',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Store::insert([
            'account_id' => '5',
            'name' => 'System Store 1',
            'address' => 'Quezon City, Philippines',
            'location' => '14.676208, 121.043861',
            'description' => 'PC Super Store',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '23',
            'price' => '14574.897',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '24',
            'price' => '16585.297',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '25',
            'price' => '19801.937',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '26',
            'price' => '28145.097',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '38',
            'price' => '2512.497',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '39',
            'price' => '7244.979',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '40',
            'price' => '4724.44',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '41',
            'price' => '2763.797',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '42',
            'price' => '9046.297',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '58',
            'price' => '2261.187',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '59',
            'price' => '2060.157',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '60',
            'price' => '3266.397',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '61',
            'price' => '6030.697',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '74',
            'price' => '3969.534',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '75',
            'price' => '4020.297',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '76',
            'price' => '4221.337',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '77',
            'price' => '6281.997',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '90',
            'price' => '37688.466',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '91',
            'price' => '5528.097',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '92',
            'price' => '2009.897',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '93',
            'price' => '10302.797',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '104',
            'price' => '3768.49',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '105',
            'price' => '4774.197',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '106',
            'price' => '3768.49',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '107',
            'price' => '3517.194',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '119',
            'price' => '9901.22',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '120',
            'price' => '9800.197',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '121',
            'price' => '5196.884',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '122',
            'price' => '3870.02',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '135',
            'price' => '38847.964',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '136',
            'price' => '14574.394',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '137',
            'price' => '41464.5',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '138',
            'price' => '20103.497',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);


        //Dummy Store 2 & Products
        Account::insert([
            'username' => 'System Store 2',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Store::insert([
            'account_id' => '6',
            'name' => 'System Store 1',
            'address' => 'Quezon City, Philippines',
            'location' => '14.676208, 121.043861',
            'description' => 'PC Super Store',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '27',
            'price' => '16585.297',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '28',
            'price' => '8895.517',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '29',
            'price' => '37191.897',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '30',
            'price' => '13014.827',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '43',
            'price' => '9046.297',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '44',
            'price' => '12411.204',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '45',
            'price' => '1984.767',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '46',
            'price' => '17680.965',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '47',
            'price' => '4271.597',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '62',
            'price' => '8162.726',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '63',
            'price' => '1557.557',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '64',
            'price' => '13602.266',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '65',
            'price' => '6642.361',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '78',
            'price' => '4573.157',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '79',
            'price' => '4522.897',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '80',
            'price' => '8744.7374',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '81',
            'price' => '9800.197',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '94',
            'price' => '6782.084',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '95',
            'price' => '3768.498',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '96',
            'price' => '4774.197',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '97',
            'price' => '2512.497',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '108',
            'price' => '7538.497',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '109',
            'price' => '4774.197',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '110',
            'price' => '4522.897',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '111',
            'price' => '6030.697',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '123',
            'price' => '16535.54',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '124',
            'price' => '9046.297',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '125',
            'price' => '5528.097',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '126',
            'price' => '4522.897',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '139',
            'price' => '35181.497',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '140',
            'price' => '25079.74',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '141',
            'price' => '35131.74',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '142',
            'price' => '65337.497',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        //Dummy Store 3 & Products
        Account::insert([
            'username' => 'System Store 3',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Store::insert([
            'account_id' => '7',
            'name' => 'System Store 1',
            'address' => 'Quezon City, Philippines',
            'location' => '14.676208, 121.043861',
            'description' => 'PC Super Store',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '31',
            'price' => '11708.067',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '32',
            'price' => '11559.297',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '33',
            'price' => '19098.297',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '34',
            'price' => '13318.397',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '48',
            'price' => '7936.054',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '49',
            'price' => '321658.974',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '50',
            'price' => '2336.587',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '51',
            'price' => '1618.372',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '52',
            'price' => '6533.297',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '66',
            'price' => '5526.087',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '67',
            'price' => '4518.374',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '68',
            'price' => '7035.897',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '69',
            'price' => '10051.497',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '82',
            'price' => '3517.697',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '83',
            'price' => '7035.897',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '84',
            'price' => '3165.877',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '85',
            'price' => '4171.077',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '98',
            'price' => '6784.597',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '99',
            'price' => '6784.597',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '100',
            'price' => '5649.726',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '112',
            'price' => '7538.497',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '113',
            'price' => '6784.597',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '114',
            'price' => '5024',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '115',
            'price' => '6784.597',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '127',
            'price' => '22616.497',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '128',
            'price' => '3517.697',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '129',
            'price' => '9292.068',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '130',
            'price' => '10049.487',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '143',
            'price' => '153040.192',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '144',
            'price' => '35584.08',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '145',
            'price' => '29,607.16',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '146',
            'price' => '183449',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);


        //Dummy Store 4 & Products
        Account::insert([
            'username' => 'System Store 4',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'account_type' => 'Seller',
            'is_admin' => false,
            'firstname' => 'Test',
            'lastname' => 'Seller',
            'is_active' =>1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Store::insert([
            'account_id' => '8',
            'name' => 'System Store 1',
            'address' => 'Quezon City, Philippines',
            'location' => '14.676208, 121.043861',
            'description' => 'PC Super Store',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '35',
            'price' => '24375.597',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '36',
            'price' => '27386.171',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '37',
            'price' => '4975.74',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '53',
            'price' => '2311.457',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '54',
            'price' => '3266.397',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '55',
            'price' => '4723.937',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '56',
            'price' => '2512.497',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '57',
            'price' => '4171.077',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '70',
            'price' => '12313.197 ',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '71',
            'price' => '3515.184 ',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '72',
            'price' => '5023.487',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '73',
            'price' => '5528.097',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '86',
            'price' => '4271.597 ',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '87',
            'price' => '200030.48 ',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '88',
            'price' => '4020.297',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '101',
            'price' => '8292.397',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '102',
            'price' => '7387.717',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '103',
            'price' => '6231.737',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '116',
            'price' => '7538.497',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '117',
            'price' => '4019.794',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '118',
            'price' => '8292.397',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '131',
            'price' => '6030.697',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '132',
            'price' => '7287.197',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '133',
            'price' => '9046.297',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '134',
            'price' => '11213.508',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '147',
            'price' => '26351.318',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '148',
            'price' => '35181.497',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '149',
            'price' => '30500',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '150',
            'price' => '33673.697',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
