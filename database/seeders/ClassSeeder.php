<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            ['name' => 'Primary 1'],
            ['name' => 'Primary 2'],
            ['name' => 'Primary 3'],
            ['name' => 'Primary 4'],
            ['name' => 'Primary 5'],
            ['name' => 'Primary 6'],
        ];

        DB::table('classes')->insert($classes);
    }
}
