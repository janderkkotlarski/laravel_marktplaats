<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    public function response(Message $message, int $depth)
    {
        Message::factory()->create([
            'user_id' => $message->sender_id,
            'sender_id' => $message->user_id,
            'advert_title' => $message->advert_title,
            'entry' => 'response depth: ' . $depth,
        ]);

        if ($depth > 1)
        {
            MessageSeeder::response($message, $depth - 1);
        }
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() > 1) {
            Message::factory()->count(100)->create();
        }

        MessageSeeder::response(Message::where('id', 1)->first(), 3);
    }
}
