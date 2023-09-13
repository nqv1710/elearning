<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@ringnet.vn',
                'password' => bcrypt('Ringnet@123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Học Viên 1',
                'email' => 'hv1@ringnet.vn',
                'password' => bcrypt('Ringnet@123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Học Viên 2',
                'email' => 'hv2@ringnet.vn',
                'password' => bcrypt('Ringnet@123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
