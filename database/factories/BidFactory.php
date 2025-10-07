<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Advert;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function not_same_user($advert_user_id) {



        return 1;
    }

    public function definition(): array
    {
        $advert = Advert::inRandomOrder()->first();
        $adver_user_id = $advert->user_id();

        // $user_id = User::inRandomOrder()->first()->id

        return [
            // 'user_id' => User::inRandomOrder()->first()->id,
            'user_id' => BidFactory::not_same_user($adver_user_id),
            'advert_id' => $advert->id,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
