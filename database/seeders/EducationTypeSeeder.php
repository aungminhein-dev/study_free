<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationType; // Import the EducationType model

class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $educationTypes = [
            ['name' => 'Grade-12 (Myanmar)', 'publish_status' => true],
            ['name' => 'IGCSE', 'publish_status' => true],
            ['name' => 'GED', 'publish_status' => true],
        ];

        foreach ($educationTypes as $type) {
            EducationType::create($type);
        }
    }
}
