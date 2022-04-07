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
            'email' => 'attalariq@admin.com',
            'password' => bcrypt('12312312'),
            'role' => 'admin',
        ]);

        DB::table('destinations')->insert([
            'kode' => 'LBJ01',
            'name' => 'Labuan Bajo',
            'description' => 'Labuan Bajo is a fishing town located at the western end of the large island of Flores in the Nusa Tenggara region of east Indonesia. It is the capital of the West Manggarai Regency (Kabupaten Manggarai Barat), one of the eight regencies which are the major administrative divisions of Flores.',
            'price' => 1499000,
        ]);
    }
}
