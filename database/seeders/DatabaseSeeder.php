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
            'price' => '37,000 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '2',
            'price' => '24,000 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '3',
            'price' => '23,000 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '4',
            'price' => '11,000 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '5',
            'price' => '12,000 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '6',
            'price' => '11,500 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '7',
            'price' => '9,000 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '8',
            'price' => '5,600 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '9',
            'price' => '5,500 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '10',
            'price' => '5,300 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '11',
            'price' => '2,600 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '12',
            'price' => '5,300 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
        'store_id' => '1',
        'component_id' => '13',
        'price' => '4,500 Php',
        'type' => 'PSU',
        'status' => 'Available',
        'status_date' => $date,
        'created_at' => $date,
        'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '14',
            'price' => '4,000 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '15',
            'price' => '1,600 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '16',
            'price' => '2,300 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '17',
            'price' => '2,000 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '18',
            'price' => '3,100 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '19',
            'price' => '1,800 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '20',
            'price' => '4,300 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '21',
            'price' => '1,050 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '1',
            'component_id' => '22',
            'price' => '1,000 Php',
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
            'price' => '14,574.897 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '24',
            'price' => '16,585.297 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '25',
            'price' => '19,801.937 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '26',
            'price' => '28,145.097 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '38',
            'price' => '2,512.497 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '39',
            'price' => '7,244.979 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '40',
            'price' => '4,724.44 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '41',
            'price' => '2,763.797 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '42',
            'price' => '9,046.297 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '58',
            'price' => '2,261.187 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '59',
            'price' => '2,060.157 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '60',
            'price' => '3,266.397 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '61',
            'price' => '6030.697 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '74',
            'price' => '3,969.534 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '75',
            'price' => '4,020.297 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '76',
            'price' => '4,221.337 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '77',
            'price' => '6,281.997 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '90',
            'price' => '37,688.466 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '91',
            'price' => '5,528.097 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '92',
            'price' => '2,009.897 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '93',
            'price' => '10,302.797 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '104',
            'price' => '3,768.49 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '105',
            'price' => '4,774.197 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '106',
            'price' => '3,768.49 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '107',
            'price' => '3,517.194 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '119',
            'price' => '9,901.22 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '120',
            'price' => '9,800.197 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '121',
            'price' => '5,196.884 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '122',
            'price' => '3,870.02 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '135',
            'price' => '38,847.964 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '136',
            'price' => '14,574.394 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '137',
            'price' => '41,464.5 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '2',
            'component_id' => '138',
            'price' => '20,103.497 Php',
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
            'price' => '16,585.297 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '28',
            'price' => '8,895.517 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '29',
            'price' => '37,191.897 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '30',
            'price' => '13,014.827 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '43',
            'price' => '9,046.297 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '44',
            'price' => '12,411.204 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '45',
            'price' => '1,984.767 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '46',
            'price' => '17,680.965 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '47',
            'price' => '4,271.597 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '62',
            'price' => '8,162.726 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '63',
            'price' => '1,557.557 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '64',
            'price' => '13,602.266 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '65',
            'price' => '6,642.361 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '78',
            'price' => '4,573.157 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '79',
            'price' => '4,522.897 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '80',
            'price' => '8,744.7374 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '81',
            'price' => '9,800.197 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '94',
            'price' => '6,782.084 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '95',
            'price' => '3,768.498 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '96',
            'price' => '4,774.197 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '97',
            'price' => '2,512.497 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '108',
            'price' => '7,538.497 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '109',
            'price' => '4,774.197 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '110',
            'price' => '4,522.897 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '111',
            'price' => '6,030.697 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '123',
            'price' => '16,535.54 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '124',
            'price' => '9,046.297 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '125',
            'price' => '5,528.097 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '126',
            'price' => '4,522.897 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '139',
            'price' => '35,181.497 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '140',
            'price' => '25,079.74 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '141',
            'price' => '35,131.74 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '3',
            'component_id' => '142',
            'price' => '65,337.497 Php',
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
            'price' => '11,708.067 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '32',
            'price' => '11,559.297 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '33',
            'price' => '19,098.297 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '34',
            'price' => '13,318.397 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '48',
            'price' => '7,936.054 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '49',
            'price' => '321,658.974 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '50',
            'price' => '2,336.587 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '51',
            'price' => '1,618.372 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '52',
            'price' => '6,533.297 Php',
            'type' => 'Storage',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '66',
            'price' => '5,526.087 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '67',
            'price' => '4,518.374 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '68',
            'price' => '7,035.897 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '69',
            'price' => '10,051.497 Php',
            'type' => 'CPU Cooler',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '82',
            'price' => '3,517.697 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '83',
            'price' => '7,035.897 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '84',
            'price' => '3,165.877 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '85',
            'price' => '4,171.077 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '98',
            'price' => '6,784.597 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '99',
            'price' => '6,784.597 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '100',
            'price' => '5,649.726 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '112',
            'price' => '7,538.497 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '113',
            'price' => '6,784.597 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '114',
            'price' => '5,024 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '115',
            'price' => '6,784.597 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '127',
            'price' => '22,616.497 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '128',
            'price' => '3,517.697 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '129',
            'price' => '9,292.068 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '130',
            'price' => '10,049.487 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '143',
            'price' => '153,040.192 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '144',
            'price' => '35,584.08 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '145',
            'price' => '29,607.1608',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '4',
            'component_id' => '146',
            'price' => '183,449 Php',
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
            'price' => '24,375.597 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '36',
            'price' => '27,386.171 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '37',
            'price' => '4975.74 Php',
            'type' => 'CPU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '53',
            'price' => '2,311.457 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '54',
            'price' => '3,266.397 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '55',
            'price' => '4,723.937 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '56',
            'price' => '2,512.497 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '57',
            'price' => '4171.077 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '70',
            'price' => '12,313.197 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '71',
            'price' => '3,515.184 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '72',
            'price' => '5,023.487 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '73',
            'price' => '5,528.097 Php',
            'type' => 'Seller',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '86',
            'price' => '4,271.597 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '87',
            'price' => '200,030.48 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '88',
            'price' => '4,020.297 Php',
            'type' => 'RAM',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '101',
            'price' => '8,292.397 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '102',
            'price' => '7,387.717 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '103',
            'price' => '6,231.737 Php',
            'type' => 'PSU',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '116',
            'price' => '7,538.497 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '117',
            'price' => '4,019.794 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '118',
            'price' => '8,292.397 Php',
            'type' => 'Computer Case',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '131',
            'price' => '6,030.697 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '132',
            'price' => '7,287.197 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '133',
            'price' => '9,046.297 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '134',
            'price' => '11,213.508 Php',
            'type' => 'Motherboard',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '147',
            'price' => '26,351.318 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '148',
            'price' => '35,181.497 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '149',
            'price' => '30,500 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        Product::insert([
            'store_id' => '5',
            'component_id' => '150',
            'price' => '33,673.697 Php',
            'type' => 'Graphics Card',
            'status' => 'Available',
            'status_date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
