<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        User::factory()->create([
            'name' => 'Bulktron',
            'email' => 'bulk@tron.com',
            'password' => 'Eatmorebloats',
            'premium' => '1',
        ]);
    }
}
