<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Advert;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function other_sender($user_id) {
    
        $sender_id = $user_id;

        $amount = User::all()->count();

        while ($sender_id == $user_id &&
               $amount != 1) {
            $sender_id = User::inRandomOrder()->first()->id;
        }

        return $sender_id;
    }

    public function definition(): array
    {
        $user_id = User::inRandomOrder()->first()->id;

        $sender_id = MessageFactory::other_sender($user_id);

        $advert_title = Advert::inRandomOrder()->where('user_id', $user_id)->first()->title;

        return [
            'user_id' => $user_id,
            'sender_id' => $sender_id,
            'advert_title' => $advert_title,
            'entry' => $this->faker->sentence,
        ];
    }
}
