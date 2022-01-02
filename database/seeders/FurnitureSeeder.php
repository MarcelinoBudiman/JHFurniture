<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('furnitures')->insert([
            'name' => 'Jessheim',
            'price' => 850000,
            'type' => 'Bed',
            'color' => 'Black',
            'images' => 'Jessheim.jpg'
        ]);
    }
}
