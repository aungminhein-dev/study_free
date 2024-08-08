<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Subject; // Import the Chapter model
use Illuminate\Database\Seeder; // Import the Subject model

class ChapterSeeder extends Seeder
{
    public function run()
    {
        // Define example chapters for various subjects
        $chaptersData = [
            'Mathematics' => [
                'Algebra',
                'Geometry',
                'Trigonometry',
                'Calculus',
                'Statistics',
            ],
            'Science' => [
                'Physics',
                'Chemistry',
                'Biology',
                'Earth Science',
                'Astronomy',
            ],
            'English' => [
                'Grammar',
                'Literature',
                'Composition',
                'Vocabulary',
                'Creative Writing',
            ],
            'History' => [
                'Ancient Civilizations',
                'Middle Ages',
                'Modern History',
                'World Wars',
                'Contemporary History',
            ],
            'Geography' => [
                'Physical Geography',
                'Human Geography',
                'Map Reading',
                'Climate Studies',
                'Urban Studies',
            ],
        ];

        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            $subjectChapters = $chaptersData[$subject->name] ?? [];

            foreach ($subjectChapters as $chapterName) {
                Chapter::updateOrCreate(
                    ['subject_id' => $subject->id, 'name' => $chapterName],
                    ['subject_id' => $subject->id, 'name' => $chapterName]
                );
            }
        }
    }
}
