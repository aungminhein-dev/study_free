<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Track if header row is processed
        $headerProcessed = false;

        foreach ($rows as $row) {
            // Skip header row if it's not already processed
            if (! $headerProcessed) {
                $headerProcessed = true;

                continue; // Skip the header row
            }

            // Proceed with data rows
            Question::create([
                'question_group_id' => $row[0], // Ensure this is an integer
                'type' => $row[1],
                'question_text' => $row[2],
                'options' => json_encode($row[3]), // Ensure options is properly formatted
                'answer' => $row[4],
            ]);
        }
    }
}
