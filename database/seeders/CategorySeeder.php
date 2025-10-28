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
        ]);
        
        Category::factory()->create([
            'name' => 'Meubels',
        ]);

        Category::factory()->create([
            'name' => 'Fietsen',
        ]);

        Category::factory()->create([
            'name' => 'Hobby',
        ]);

        $catCount = Category::count();

        Advert::all()->each(function ($advert) use ($catCount) {
            $advert->categories()->attach(Category::all()->random(rand(0, $catCount))->pluck('id')->toArray());
        });
    }
}
