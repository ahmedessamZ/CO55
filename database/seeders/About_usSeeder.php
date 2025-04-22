<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class About_usSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'about'=>'about',
            'philosophy'=>'philosophy',
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
    }
}
