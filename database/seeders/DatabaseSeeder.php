<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::create([
            "name"=> "Department"
        ]);

        User::create([
            "name"=> "Admin",
            "email"=> "admin@gmail.com",
            "password"=> "12345678",
            'usertype'=> "admin",
            "department_id"=> 1,
            


        ]);

    }
}
