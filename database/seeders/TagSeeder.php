<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            '県主催',
            '街コン',
            '駐車場無料',
            '参加料無料',
            'オンライン開催',
            '飲食あり',
            '参加特典あり',
            'グルメフェス',
            'ファミリー向け',
            '花火大会',
            '事前予約制',
            '就活イベント',
            '当日参加OK'
        ];

        foreach ($tags as $index => $name) {
            DB::table('tags')->insert([
                'id' => $index + 1,
                'name' => $name,
            ]);
        }
    }
}
