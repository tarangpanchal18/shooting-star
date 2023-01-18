<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Generator;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        Admin::updateOrCreate(
            ['email' => 'demo@demo.com'],
            [
                'name' => 'Super Admin',
                'email' => 'demo@demo.com',
                'phonecode' => '91',
                'phone' => $faker->numerify('##########'),
                'password' => \Hash::make('123456'),
                'status' => 'Active',
            ]
        );
    }
}
