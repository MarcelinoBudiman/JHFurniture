<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pw1 = 'admin';
        $pw1 = bcrypt($pw1);

        $pw2 = 'admin2';
        $pw2 = bcrypt($pw2);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => $pw1,
            'address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloribus molestiae voluptate corrupti, eligendi officiis quod. Ratione, maxime quidem? Obcaecati aspernatur consequuntur vero dolor enim, explicabo vitae nesciunt inventore dolore|',
            'gender' => 'Male',
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => $pw2,
            'address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloribus molestiae voluptate corrupti, eligendi officiis quod. Ratione, maxime quidem? Obcaecati aspernatur consequuntur vero dolor enim, explicabo vitae nesciunt inventore dolore!',
            'gender' => 'Female',
            'role' => 'Admin'
        ]);
    }
}
