<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\EducationType;
use App\Models\Question;

class PracticePaperSeeder extends Seeder
{
    public function run()
    {
        $type = EducationType::create(['name' => 'Grade-12'],['name' => 'GED'],['name' => 'IGCSE']);

        $subject = Subject::create([
            'name' => 'Mathematics',
            'education_type_id' => $type->id
        ]);

        $chapter = Chapter::create([
            'name' => 'Algebra',
            'subject_id' => $subject->id
        ]);

        // MCQ Question
        Question::create([
            'chapter_id' => $chapter->id,
            'type' => 'mcq',
            'question_text' => 'What is 2+2?',
            'options' => json_encode(['2', '3', '4', '5']),
            'answer_text' => '4'
        ]);

        // Fill in the blank Question
        Question::create([
            'chapter_id' => $chapter->id,
            'type' => 'fill_in_the_blank',
            'question_text' => 'The capital of France is _____.',
            'answer_text' => 'Paris'
        ]);
    }
}
