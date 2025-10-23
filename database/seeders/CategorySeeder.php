<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Advert;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Electronica',
        ])->each(Advert::orderBy('created_at', 'desc')->get());

        Category::factory()->create([
            'name' => 'Meubels',
        ]);

        Category::factory()->create([
            'name' => 'Fietsen',
        ]);
    }
}
