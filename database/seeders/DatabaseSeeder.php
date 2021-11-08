<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('admins')->insert([
            'name' => Str::random(10),
            'role' => 'sa',
            'email' => 'sa@mail.com',
            'password' => Hash::make('password'),

        ]);
        DB::table('admins')->insert([
            'name' => Str::random(10),
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),

        ]);
        DB::table('categories')->insert ([
            'id' =>1,
            'name'=>'Obat Dalam'
        ]);
        DB::table('categories')->insert ([
            'id' =>2,
            'name'=>'Obat Luar'
        ]);
        DB::table('products')->insert ([

            'name'=>'Dumin',
            'price'=>6000,
            'stock'=>120,
            'category_id'=>1,
        ]);
        DB::table('products')->insert ([

            'name'=>'Betadine',
            'price'=>10000,
            'stock'=>100,
            'category_id'=>2,
        ]);
    }
}
