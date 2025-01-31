<?php

namespace Database\Seeders;

use App\Models\job_tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(28)->create();

        // User::factory()->create([
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'test@example.com',
        // ]);
        
        job_tag::factory(28)->create();
        // $this->call(JobSeeder::class);
    }
}
