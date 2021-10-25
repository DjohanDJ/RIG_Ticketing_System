<?php

namespace Database\Seeders;

use App\Models\ReportMessage;
use Illuminate\Database\Seeder;

class ReportMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportMessage::create([
            'reportId' => 1,
            'messageId' => 1
        ]);

        ReportMessage::create([
            'reportId' => 1,
            'messageId' => 2
        ]);
    }
}
