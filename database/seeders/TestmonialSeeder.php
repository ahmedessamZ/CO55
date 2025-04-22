<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestmonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'company' => 'leos Den',
                'company_logo' => '1675083559-leos Den.png',
                'author' => 'leos Den',
                'author_title' => 'leos Den',
                'body' => 'Working with this team has been an absolute pleasure. Their attention to detail and creative solutions helped us achieve our goals faster than expected.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company' => 'Bla Bla Studio x',
                'company_logo' => '1674983212-Bla Bla Studio x.jpg',
                'author' => 'Bla Bla Studio x',
                'author_title' => 'Bla Bla Studio x',
                'body' => 'The quality of work delivered exceeded our expectations. Their innovative approach and professional attitude made our project a huge success.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company' => 'SDEX Ltd',
                'company_logo' => '1674983201-SDEX Ltd.png',
                'author' => 'SDEX Ltd',
                'author_title' => 'SDEX Ltd',
                'body' => 'Outstanding service and exceptional results! The team was responsive, efficient, and delivered exactly what we needed on time and within budget.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company' => 'little blessings',
                'company_logo' => '1674983191-little blessings.png',
                'author' => 'little blessings',
                'author_title' => 'little blessings',
                'body' => 'We are extremely satisfied with the level of dedication and expertise shown throughout our collaboration. They truly understand customer needs.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company' => 'Jinni Services',
                'company_logo' => '1674983180-Jinni Services.jpg',
                'author' => 'Jinni Services',
                'author_title' => 'Jinni Services',
                'body' => 'A game-changing partnership that has transformed our business operations. Their solutions are innovative, scalable, and perfectly tailored to our needs.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('testimonials')->insert($testimonials);
    }
}
