<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whys = [
            [
                'sort' => '1',
                'title' => 'COMMUNITY AND DIVERSITY',
                'body' => 'The diversity of industries and individuals is the core value at CO-55, allowing collaboration and unlimited networking opportunities with potential clients and partners.',
                'image' => 'why1.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sort' => '2',
                'title' => 'COMMUNITY AND DIVERSITY',
                'body' => 'The diversity of industries and individuals is the core value at CO-55, allowing collaboration and unlimited networking opportunities with potential clients and partners.',
                'image' => 'why2.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sort' => '3',
                'title' => 'COMMUNITY AND DIVERSITY',
                'body' => 'The diversity of industries and individuals is the core value at CO-55, allowing collaboration and unlimited networking opportunities with potential clients and partners.',
                'image' => 'why3.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('whys')->insert($whys);
    }
}
