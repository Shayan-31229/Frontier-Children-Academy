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
                'faculty' => 'Kinder Garden',
                'faculty_code' => 'KG',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 2,
            ],
            [
                'faculty' => 'Nursary',
                'faculty_code' => 'NR',
                'scale' => 100,
                'duration' => 4,
                'credit_required' => 2,
            ],
            [
                'faculty' => 'Class I',
                'faculty_code' => 'I',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class II',
                'faculty_code' => 'II',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class III',
                'faculty_code' => 'III',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class IV',
                'faculty_code' => 'IV',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class V',
                'faculty_code' => 'V',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class VI',
                'faculty_code' => 'VI',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class VII',
                'faculty_code' => 'VII',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class VIII',
                'faculty_code' => 'VIII',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class IX',
                'faculty_code' => 'IX',
                'scale' => 100,
                'duration' => 2,
                'credit_required' => 60,
            ],
            [
                'faculty' => 'Class X',
                'faculty_code' => 'X',
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
        $this->seedSemesters('KG', 2, $facultyIds['KG'], $now);
        $this->seedSemesters('NR', 2, $facultyIds['NR'], $now);
        $this->seedSemesters('I', 2, $facultyIds['I'], $now);
        $this->seedSemesters('II', 2, $facultyIds['II'], $now);
        $this->seedSemesters('III', 2, $facultyIds['III'], $now);
        $this->seedSemesters('IV', 2, $facultyIds['IV'], $now);
        $this->seedSemesters('V', 2, $facultyIds['V'], $now);
        $this->seedSemesters('VI', 2, $facultyIds['VI'], $now);
        $this->seedSemesters('VII', 2, $facultyIds['VII'], $now);
        $this->seedSemesters('VIII', 2, $facultyIds['VIII'], $now);
        $this->seedSemesters('IX', 2, $facultyIds['IX'], $now);
        $this->seedSemesters('X', 2, $facultyIds['X'], $now);
    }

    private function seedSemesters(string $facultyCode, int $count, int $facultyId, Carbon $now)
    {
        for ($i = 1; $i <= $count; $i++) {
            $semesterName = chr($i + 64);
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
