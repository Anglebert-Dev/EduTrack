<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homework;

class HomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeworkData = [
            [
                'teacher_id' => 3,
                'subject' => 'Math',
                'description' => 'Complete exercises 1-10 on page 50 of the textbook.',
                'class_name' => 'Grade 10',
                'submission_date' => now()->addDays(7),
            ],
            [
                'teacher_id' => 3,
                'subject' => 'Science',
                'description' => 'Write a report on photosynthesis.',
                'class_name' => 'Grade 8',
                'submission_date' => now()->addDays(5),
            ],

        ];

        foreach ($homeworkData as $data) {
            Homework::create($data);
        }
    }
}
