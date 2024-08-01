<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('education_types')->insert([
            ['name' => 'Grade-12 (Myanmar)', 'publish_status' => true],
            ['name' => 'IGCSE', 'publish_status' => true],
        ]);
    }
}
