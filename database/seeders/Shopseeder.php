<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Shopseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'ここに店名が入ります',
                'information' => 'ここにお店の情報が入りますここにお店の情報が入りますここにお店の情報が入ります',
                'filename' => 'sample1.jpeg',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' => 'ここに店名が入ります',
                'information' => 'ここにお店の情報が入りますここにお店の情報が入りますここにお店の情報が入ります',
                'filename' => 'sample2.jpeg',
                'is_selling' => true
            ],
        ]);
    }
}
