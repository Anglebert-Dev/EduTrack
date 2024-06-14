<?php

// database/seeders/SubjectSeeder.php

// database/seeders/SubjectSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['name' => 'Math'],
            ['name' => 'Science'],
            ['name' => 'Kinyarwanda'],
            ['name' => 'Social Studies'],
            ['name' => 'Kiswahili'],
            ['name' => 'Religion'],
            ['name' => 'English'],
            ['name' => 'French'],
            ['name' => 'Sport'],
        ];

        Subject::insert($subjects);
    }
}

