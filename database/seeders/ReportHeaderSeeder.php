<?php

namespace Database\Seeders;

use App\Models\ReportHeader;
use Illuminate\Database\Seeder;

class ReportHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportHeader::create([
            'categoryId' => 2,
            'nim' => '2201712345',
            'status' => 'waiting',
            'title' => 'Perihal instalasi software',
            'description' => 'Mau instalasi software Eclipse, tapi ngga bisa.'
        ]);

        // status bisa waiting, on progress, closed
    }
}
