<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'John',
            'email' => 'johnnyboi@dud.com',
            'password' => 'Doedoedoe',
            'premium' => '0',
        ]);

        User::factory()->create([
            'name' => 'Mary',
            'email' => 'maryanne@blud.com',
            'password' => 'Cleanslate',
            'premium' => '0',
        ]);

        Category::factory()->create([
            'name' => 'Electronica',
        ]);

        Category::factory()->create([
            'name' => 'Meubels',
        ]);

        $this->call([
            AdvertSeeder::class,
            BidSeeder::class,
        ]);
    }
}
