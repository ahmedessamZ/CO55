<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            [
                'icon' => '1674569672-High-speed Internet.png',
                'title' => 'High-speed Internet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674569743-Complimentary Refreshments.png',
                'title' => 'Complimentary Refreshments',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674569863-Office Supplies.png',
                'title' => 'Office Supplies',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674569880-Fully-serviced Kitchenette.png',
                'title' => 'Fully-serviced Kitchenette',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674569903-Outdoor Terrace.png',
                'title' => 'Outdoor Terrace',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674569972-Personal Lockers.png',
                'title' => 'Personal Lockers',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674983591-All-inclusive bill for the services.png',
                'title' => 'All-inclusive bill for the services',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674983591-Daily access to meeting rooms.png',
                'title' => 'Daily access to meeting rooms',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674983647-Access across all branches.png',
                'title' => 'Access across all branches',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674983647-Access to in-house events.png',
                'title' => 'Access to in-house events',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674983647-Monthly guest passes.png',
                'title' => 'Monthly guest passes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => '1674983647-Personal storage cabinets.png',
                'title' => 'Personal storage cabinets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('amenities')->insert($amenities);
    }
}
