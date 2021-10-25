<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'messageContent' => 'Hi,, aku ada masalah nih buat download software Eclipse.',
            'messageSender' => '2201712345'
        ]);

        Message::create([
            'messageContent' => 'Hi juga, jadi caranya begini...',
            'messageSender' => 'Admin'
        ]);
    }
}
