<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Interfaces\UserTypes;
use App\Interfaces\Locations;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'admin',
            'reg_no' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => UserTypes::ADMIN,
        ], [
            'password' => bcrypt('123456'),
        ]);

        foreach(Locations::NG as $key => $value){
            $location = strtolower($key);
            User::firstOrCreate([
                'name' => "admin-{$location}",
                'reg_no' => "admin-{$location}",
                'email' => "admin-{$location}@gmail.com",
                'user_type' => UserTypes::SUPERVISOR,
                'supervisor_location' => $value
            ], [
                'password' => bcrypt('205090'),
            ]);
        }

        foreach(Locations::IN as $key => $value){
            $location = strtolower($key);
            User::firstOrCreate([
                'name' => "admin-{$location}",
                'reg_no' => "admin-{$location}",
                'email' => "admin-{$location}@gmail.com",
                'user_type' => UserTypes::SUPERVISOR,
                'supervisor_location' => $value
            ], [
                'password' => bcrypt('205090'),
            ]);
        }
        // $this->call(UserSeeder::class);
    }
}
