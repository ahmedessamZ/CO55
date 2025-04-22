<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'logo' => '1690390892-hourly.svg',
                'title' => 'hourly',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'logo' => '1690390908-monthly.svg',
                'title' => 'monthly',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'logo' => '1690390925-annualy.svg',
                'title' => 'annualy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'logo' => '1690390937-daily.svg',
                'title' => 'daily',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('plans')->insert($plans);
    }
}
