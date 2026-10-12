<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class About extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'title' => 'About Me',
            'description' => 'description description description',
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
