<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FacultyAndSemesterSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Step 1: Insert faculties with their properties
        $faculties = [
            [
                'faculty' => 'POST RN',
                'faculty_code' => 'POST-RN',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 2,
            ],
            [
                'faculty' => 'BSN Program',
                'faculty_code' => 'BSN',
                'scale' => 4,
                'duration' => 4,
                'credit_required' => 2,
            ],
            [
                'faculty' => 'LHV Program',
                'faculty_code' => 'LHV',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
        ];

        foreach ($faculties as &$faculty) {
            $faculty['gradingType_id'] = 1;
            $faculty['registration_validate'] = null;
            $faculty['sorting'] = null;
            $faculty['status'] = 1;
            $faculty['created_by'] = 1;
            $faculty['last_updated_by'] = null;
            $faculty['created_at'] = $now;
            $faculty['updated_at'] = $now;
        }

        DB::table('faculties')->insert($faculties);

        // Get inserted faculty IDs
        $facultyIds = DB::table('faculties')->pluck('id', 'faculty_code');

        // Step 2: Insert semesters
        $this->seedSemesters('BSN', 8, $facultyIds['BSN'], $now);
        $this->seedSemesters('POST-RN', 4, $facultyIds['POST-RN'], $now);
        $this->seedSemesters('LHV', 4, $facultyIds['LHV'], $now);
    }

    private function seedSemesters(string $facultyCode, int $count, int $facultyId, Carbon $now)
    {
        for ($i = 1; $i <= $count; $i++) {
            $semesterName = "Semester {$i}";
            $slug = Str::slug("{$facultyCode}-{$semesterName}");

            DB::table('semesters')->insert([
                'semester' => $semesterName,
                'slug' => $slug,
                'staff_id' => null,
                'gradingType_id' => 1,
                'semester_fee' => 0,
                'major_subject_count' => null,
                'status' => 1,
                'created_by' => 1,
                'last_updated_by' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $semesterId = DB::table('semesters')->where('slug', $slug)->value('id');

            DB::table('faculty_semester')->insert([
                'faculty_id' => $facultyId,
                'semester_id' => $semesterId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
