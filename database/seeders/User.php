<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); //the argument is used for country code

        $user = ModelsUser::create(
            [
            'id_departemen' => 1,
            'name' => 'Sandy Priyo',
            'username' => '105194549',
            'email' => 'sandypriyo@gmail.com',
            'password' => Hash::make('userpass'),
            'created_at' => now(),
            'updated_at' => now()
            ]
        );
        $user->assignRole('user');


    }
}
