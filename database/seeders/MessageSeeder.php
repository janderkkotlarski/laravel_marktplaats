<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    public function latestMessage()
    {
        return Message::where('id',  Message::count())->first();
    }

    public function response(Message $message, int $depth)
    {
        Message::factory()->create([
            'user_id' => $message->sender_id,
            'sender_id' => $message->user_id,
            'advert_title' => $message->advert_title,
            'entry' => '[' . $message->entry . '] - ' . 'response depth: ' . $depth,
        ]);

        if ($depth > 1)
        {
            MessageSeeder::response(MessageSeeder::latestMessage(), $depth - 1);
        }
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() > 1) {
            $loop = 10;
            $iter = 0;

            while ($iter < $loop) {
                Message::factory()->create();

                MessageSeeder::response(MessageSeeder::latestMessage(), 3);
                ++$iter;
            }
        }        
    }
}
