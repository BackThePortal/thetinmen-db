<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alex',
            'email' => 'backtheportal@gmail.com',
            'password' => Hash::make('Bloodtears')
        ]);


        $this->call([
            TopicSeeder::class,
            //PostSeeder::class,
        ]);
    }
}
