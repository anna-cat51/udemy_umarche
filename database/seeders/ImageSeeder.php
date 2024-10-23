<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'filename' => 'sumple1.jpeg',
                'title' => null,
            ],
            [
                'owner_id' => 1,
                'filename' => 'sumple2.jpeg',
                'title' => null,
            ],
            [
                'owner_id' => 1,
                'filename' => 'sumple3.jpeg',
                'title' => null,
            ],
            [
                'owner_id' => 1,
                'filename' => 'sumple4.jpeg',
                'title' => null,
            ],
            [
                'owner_id' => 1,
                'filename' => 'sumple5.jpeg',
                'title' => null,
            ],
            [
                'owner_id' => 1,
                'filename' => 'sumple6.jpeg',
                'title' => null,
            ],
        ]);
    }
}
