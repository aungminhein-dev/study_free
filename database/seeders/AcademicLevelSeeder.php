<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicLevelSeeder extends Seeder
{
    public function run()
    {
        $educationTypes = DB::table('education_types')->pluck('id', 'name');

        $generalEducationId = $educationTypes['Grade-12 (Myanmar)'];
        $igcseId = $educationTypes['IGCSE'];

        DB::table('academic_levels')->insert([
            ['academic_level' => 'Grade 1', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 2', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 3', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 4', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 5', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 6', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 7', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 8', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 9', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 10', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 11', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'Grade 12', 'education_type_id' => $generalEducationId],
            ['academic_level' => 'IGCSE', 'education_type_id' => $igcseId],
        ]);
    }
}
