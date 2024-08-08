<?php

namespace Database\Seeders;

use App\Models\AcademicLevel;
use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        // Global system subjects categorized by common academic levels
        $globalSubjects = [
            'Primary School' => [
                'Mathematics',
                'Science',
                'English',
                'Art',
                'Physical Education',
            ],
            'Middle School' => [
                'Mathematics',
                'Science',
                'History',
                'Geography',
                'English',
                'Physical Education',
                'Computer Science',
            ],
            'High School' => [
                'Mathematics',
                'Biology',
                'Chemistry',
                'Physics',
                'History',
                'Geography',
                'English',
                'Physical Education',
                'Computer Science',
                'Economics',
                'Literature',
            ],
            'Higher Education' => [
                'Calculus',
                'Linear Algebra',
                'Statistics',
                'Biology',
                'Chemistry',
                'Physics',
                'Economics',
                'Computer Science',
                'Engineering',
                'Medicine',
                'Law',
            ],
        ];

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
            'Art' => [
                'Art History',
                'Drawing',
                'Painting',
                'Sculpture',
                'Digital Art',
            ],
            'Physical Education' => [
                'Sports',
                'Health',
                'Fitness',
                'Nutrition',
                'Psychomotor Skills',
            ],
            'Computer Science' => [
                'Programming',
                'Data Structures',
                'Algorithms',
                'Networking',
                'Databases',
            ],
            'Economics' => [
                'Microeconomics',
                'Macroeconomics',
                'International Economics',
                'Development Economics',
                'Behavioral Economics',
            ],
            'Literature' => [
                'Classical Literature',
                'Modern Literature',
                'Poetry',
                'Drama',
                'Criticism',
            ],
            'Engineering' => [
                'Mechanical Engineering',
                'Electrical Engineering',
                'Civil Engineering',
                'Chemical Engineering',
                'Computer Engineering',
            ],
            'Medicine' => [
                'Anatomy',
                'Physiology',
                'Pharmacology',
                'Pathology',
                'Clinical Practice',
            ],
            'Law' => [
                'Constitutional Law',
                'Criminal Law',
                'Civil Law',
                'International Law',
                'Legal Theory',
            ],
        ];

        // Map academic levels to global education stages
        $levelMappings = [
            'Grade 1' => 'Primary School',
            'Grade 2' => 'Primary School',
            'Grade 3' => 'Primary School',
            'Grade 4' => 'Primary School',
            'Grade 5' => 'Primary School',
            'Grade 6' => 'Middle School',
            'Grade 7' => 'Middle School',
            'Grade 8' => 'Middle School',
            'Grade 9' => 'High School',
            'Grade 10' => 'High School',
            'Grade 11' => 'High School',
            'Grade 12' => 'High School',
            'Year 1' => 'Higher Education',
            'Year 2' => 'Higher Education',
            'Year 3' => 'Higher Education',
            'Year 4' => 'Higher Education',
            'Year 5' => 'Higher Education',
            'Year 6' => 'Higher Education',
            'Year 7' => 'Higher Education',
            'Year 8' => 'Higher Education',
            'Year 9' => 'Higher Education',
            'Year 10' => 'Higher Education',
            'Year 11' => 'Higher Education',
            'Year 12' => 'Higher Education',
        ];

        // Fetch all academic levels
        $academicLevels = AcademicLevel::all();

        // Insert subjects and chapters
        foreach ($academicLevels as $level) {
            $mappedStage = $levelMappings[$level->academic_level] ?? null;

            if ($mappedStage) {
                // Get subjects for the mapped stage
                $subjects = $globalSubjects[$mappedStage];

                foreach ($subjects as $subjectName) {
                    // Create or update subject
                    $subject = Subject::updateOrCreate(
                        ['academic_level_id' => $level->id, 'name' => $subjectName],
                        ['academic_level_id' => $level->id]
                    );

                    // Add chapters for this subject
                    $subjectChapters = $chaptersData[$subjectName] ?? [];
                    foreach ($subjectChapters as $chapterName) {
                        Chapter::updateOrCreate(
                            ['subject_id' => $subject->id, 'name' => $chapterName],
                            ['subject_id' => $subject->id, 'name' => $chapterName]
                        );
                    }
                }
            } else {
                // Log or handle levels with no mapped stage
                Log::info("No subject data defined for academic level: {$level->academic_level}");
            }
        }
    }
}
