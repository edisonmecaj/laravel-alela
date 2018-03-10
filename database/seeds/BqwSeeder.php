<?php

use Illuminate\Database\Seeder;

class BqwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Role::create([
            "id" => "1",
            "role" => "basic",
            "label" => "Basic User",
            "level" => "0"
        ]);

        App\Role::create([
            "id" => "2",
            "role" => "admin",
            "label" => "Administrator",
            "level" => "50"
        ]);

        App\Role::create([
            "id" => "3",
            "role" => "dev",
            "label" => "Developer",
            "level" => "99"
        ]);

        App\User::create([
            "username" => "edison",
            "first_name" => "Edison",
            "last_name" => "Mecaj",
            "email" => "edisonmecaj@gmail.com",
            "password" => Hash::make("admin123"),
            "profile_pic" => "dev.png",
            "role_id" => 3
        ]);
    }
}
