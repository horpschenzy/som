<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'reg_no' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'ADMIN',
            'password' => bcrypt('123456'),
        ]);
        // $this->call(UserSeeder::class);
    }
}
