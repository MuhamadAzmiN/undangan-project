<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "Muhamad Azmi Naziyulloh",
            "nis" => 12309770,
            "romble" => "PPLG",
            "rayon" => "Cibedug 1",
            "password" => bcrypt('password'),
            "is_admin" => true,
            "petugas" => true,
        ]);

        User::create([
            "name" => "AdminGanteng",
            "nis" => 12345678,
            "romble" => "PPLG",
            "rayon" => "Cibedug 1",
            
            "password" => bcrypt('password'),
            "is_admin" => true,
            "petugas" => true
        ]);

        User::create([
            "name" => "Nabylla Yospi",
            "nis" => 12309881,
            "romble" => "HTL",
            "rayon" => "Cibedug 4",
            "password" => bcrypt('password')
        ]);


        User::create([
            "name" => "Zakwan",
            "nis" => 12309811,
            "romble" => "PPLG",
            "rayon" => "Sukasari 2",
            "password" => bcrypt('password')
        ]);

        User::create([
            "name" => "Andika Satrio",
            "nis" => 12309812,
            "romble" => "PPLG",
            "rayon" => "Cicurug",
            "password" => bcrypt('password')
        ]);



        User::create([
            "name" => "petugas",
            "nis" => 12309814,
            "romble" => "PPLG",
            "rayon" => "Cicurug",
            "password" => bcrypt('password'),
            "petugas" => true
        ]);

        User::create([
            "name" => "Zaek",
            "nis" => 12309824,
            "romble" => "PPLG",
            "rayon" => "Cicurug",
            "password" => bcrypt('password'),
            "petugas" => true
        ]);


        
        User::create([
            "name" => "Pen",
            "nis" => 12309224,
            "romble" => "DKV",
            "rayon" => "Cicurug",
            "password" => bcrypt('password'),
            "petugas" => true
        ]);


        

        





    }
}
