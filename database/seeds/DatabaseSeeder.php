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
            'password' => bcrypt('101010'),
        ]);

        User::firstOrCreate([
            'name' => 'student',
            'reg_no' => 'student',
            'email' => 'student@gmail.com',
            'user_type' => UserTypes::STUDENT,
            'access' => 1
        ], [
            'password' => bcrypt('010101'),
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
                'password' => bcrypt('776498'),
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
                'password' => bcrypt('340851'),
            ]);
        }
        // $this->call(UserSeeder::class);
    }
}
