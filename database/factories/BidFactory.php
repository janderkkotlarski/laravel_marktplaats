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

    public function other_bid_user($advert_user_id) {
        $bid_user_id = $advert_user_id;

        $amount = User::all()->count();

        while ($bid_user_id == $advert_user_id &&
               $amount != 1) {
            $bid_user_id = User::inRandomOrder()->first()->id;
        }

        return $bid_user_id;
    }

    public function definition(): array
    {
        $advert = Advert::inRandomOrder()->first();
        $advert_user_id = $advert->user_id;

        $bid_user_id = BidFactory::other_bid_user($advert_user_id);

        return [
            // 'user_id' => User::inRandomOrder()->first()->id,
            'user_id' => $bid_user_id,            
            'advert_id' => $advert->id,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
