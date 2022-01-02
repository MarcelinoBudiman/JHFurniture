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
            'image' => 'Jessheim.jpg'
        ]);

        DB::table('furnitures')->insert([
            'name' => 'Grimsbu',
            'price' => 1850000,
            'type' => 'Bed',
            'color' => 'White',
            'image' => 'Grimsbu.jpg'
        ]);

        DB::table('furnitures')->insert([
            'name' => 'Antilop',
            'price' => 200000,
            'type' => 'Chair',
            'color' => 'White',
            'image' => 'Antilop.jpg'
        ]);

        DB::table('furnitures')->insert([
            'name' => 'Mammut',
            'price' => 85000,
            'type' => 'Chair',
            'color' => 'White',
            'image' => 'Mammut.jpg'
        ]);

        DB::table('furnitures')->insert([
            'name' => 'Hemlingby',
            'price' => 185000,
            'type' => 'Chair',
            'color' => 'Black',
            'image' => 'Hemlingby.jpg'
        ]);

        DB::table('furnitures')->insert([
            'name' => 'Lack',
            'price' => 145000,
            'type' => 'Table',
            'color' => 'Black',
            'image' => 'Lack.jpg'
        ]);

        DB::table('furnitures')->insert([
            'name' => 'Knarrevik',
            'price' => 185000,
            'type' => 'Chair',
            'color' => 'Black',
            'image' => 'Knarrevik.jpg'
        ]);

    }
}
