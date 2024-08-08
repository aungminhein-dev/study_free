<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AcademicLevel; // Import the AcademicLevel model

class AcademicLevelSeeder extends Seeder
{
    public function run()
    {
        $educationTypes = DB::table('education_types')->pluck('id', 'name');

        $generalEducationId = $educationTypes['Grade-12 (Myanmar)'];
        $igcseId = $educationTypes['IGCSE'];

        $academicLevels = [
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
            ['academic_level' => 'Year 1', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 2', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 3', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 4', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 5', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 6', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 7', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 8', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 9', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 10', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 11', 'education_type_id' => $igcseId],
            ['academic_level' => 'Year 12', 'education_type_id' => $igcseId],
        ];
        foreach ($academicLevels as $level) {
            AcademicLevel::create($level);
        }
    }
}
