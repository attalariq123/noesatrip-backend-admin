<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\UserBaru::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Attalariq',
            'email' => 'attalariq@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Fauji',
            'email' => 'fauji@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Irgi Aditya',
            'email' => 'irgi@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bilal',
            'email' => 'bilal@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Naufal',
            'email' => 'naufal@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Widi Fadil',
            'email' => 'widil@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        // DB::table('destinations')->insert([
        //     'kode' => 'LBJ01',
        //     'name' => 'Labuan Bajo',
        //     'description' => 'Labuan Bajo is a fishing town located at the western end of the large island of Flores in the Nusa Tenggara region of east Indonesia. It is the capital of the West Manggarai Regency (Kabupaten Manggarai Barat), one of the eight regencies which are the major administrative divisions of Flores.',
        //     'price' => 1499000,
        // ]);
    }
}
