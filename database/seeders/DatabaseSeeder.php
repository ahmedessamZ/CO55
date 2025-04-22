<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(About_usSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(Static_pageSeeder::class);
        $this->call(WhySeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(TestmonialSeeder::class);
        $this->call(PlanSeeder::class);
    }
}
