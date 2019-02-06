<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the user seeder
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('nl_NL');

        for ($i = 0; $i < 50; $i++) {
            App\User::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->email,
                    'password' => Hash::make('jebaited')
                ]
            );
        }
    }
}
