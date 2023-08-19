<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PhoneNumber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Iman Behboodi',
             'email' => '09393834726',
         ]);

         PhoneNumber::factory()->create([
             "owner_id" => 1,
             "phone_number" => "02191340088",
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Alireza Mohammadi',
             'email' => '09378419977',
         ]);


        PhoneNumber::factory()->create([
            "owner_id" => 2,
            "phone_number" => "02191340099",
        ]);


    }
}
