<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priceTypes = [
            '無料',
            '有料',
        ];

        foreach ($priceTypes as $index => $name) {
            DB::table('price_types')->insert([
                'id' => $index + 1,
                'name' => $name,
            ]);
        }
    }
}
