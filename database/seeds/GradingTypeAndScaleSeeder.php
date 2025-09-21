<?php

use Illuminate\Database\Seeder;
use App\Models\GradingType;
use App\Models\GradingScale;
use Carbon\Carbon;

class GradingTypeAndScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

             // Insert Grading Types
        $bsn = GradingType::create([
            'created_by' => 1,
            'last_updated_by' => null,
            'title' => 'BSN GRADING SYSTEM',
            'slug' => 'BSN-GRADING-SYSTEM',
            'status' => 1,
        ]);

        $lhv = GradingType::create([
            'created_by' => 1,
            'last_updated_by' => null,
            'title' => 'LHV GRADING SYSTEM',
            'slug' => 'LHV-GRADING-SYSTEM',
            'status' => 1,
        ]);

        $postrn = GradingType::create([
            'created_by' => 1,
            'last_updated_by' => null,
            'title' => 'POST RN GRADING SYSTEM',
            'slug' => 'POST-RN-GRADING-SYSTEM',
            'status' => 1,
        ]);

        // Seed Grading Scales for BSN
        $bsnScales = [
            ['name' => 'F',  'percentage_from' => 0.00,  'percentage_to' => 59.00,  'grade_point' => 0.00],
            ['name' => 'C',  'percentage_from' => 60.00, 'percentage_to' => 64.00,  'grade_point' => 2.00],
            ['name' => 'C+','percentage_from' => 65.00, 'percentage_to' => 69.00,  'grade_point' => 2.50],
            ['name' => 'B',  'percentage_from' => 70.00, 'percentage_to' => 74.00,  'grade_point' => 3.00],
            ['name' => 'B+','percentage_from' => 75.00, 'percentage_to' => 79.00,  'grade_point' => 3.50],
            ['name' => 'A',  'percentage_from' => 80.00, 'percentage_to' => 89.00,  'grade_point' => 4.00],
            ['name' => 'A+','percentage_from' => 90.00, 'percentage_to' => 100.00, 'grade_point' => 4.00],
        ];

        
        // Seed Grading Scales for BSN
        $postrnScales = [
            ['name' => 'F',  'percentage_from' => 0.00,  'percentage_to' => 59.00,  'grade_point' => 0.00],
            ['name' => 'C',  'percentage_from' => 60.00, 'percentage_to' => 64.00,  'grade_point' => 2.00],
            ['name' => 'C+','percentage_from' => 65.00, 'percentage_to' => 69.00,  'grade_point' => 2.50],
            ['name' => 'B',  'percentage_from' => 70.00, 'percentage_to' => 74.00,  'grade_point' => 3.00],
            ['name' => 'B+','percentage_from' => 75.00, 'percentage_to' => 79.00,  'grade_point' => 3.50],
            ['name' => 'A',  'percentage_from' => 80.00, 'percentage_to' => 89.00,  'grade_point' => 4.00],
            ['name' => 'A+','percentage_from' => 90.00, 'percentage_to' => 100.00, 'grade_point' => 4.00],
        ];

        
        // Seed Grading Scales for BSN
        $lhvScales = [
            ['name' => 'F',  'percentage_from' => 0.00,  'percentage_to' => 59.00,  'grade_point' => 0.00],
            ['name' => 'C',  'percentage_from' => 60.00, 'percentage_to' => 64.00,  'grade_point' => 2.00],
            ['name' => 'C+','percentage_from' => 65.00, 'percentage_to' => 69.00,  'grade_point' => 2.50],
            ['name' => 'B',  'percentage_from' => 70.00, 'percentage_to' => 74.00,  'grade_point' => 3.00],
            ['name' => 'B+','percentage_from' => 75.00, 'percentage_to' => 79.00,  'grade_point' => 3.50],
            ['name' => 'A',  'percentage_from' => 80.00, 'percentage_to' => 89.00,  'grade_point' => 4.00],
            ['name' => 'A+','percentage_from' => 90.00, 'percentage_to' => 100.00, 'grade_point' => 4.00],
        ];        

        foreach ($bsnScales as $scale) {
            GradingScale::create([
                'created_by' => 1,
                'created_at' => $now,
                'last_updated_by' => null,
                'gradingType_id' => $bsn->id, // 👈 dynamic foreign key
                'name' => $scale['name'],
                'percentage_from' => $scale['percentage_from'],
                'percentage_to' => $scale['percentage_to'],
                'grade_point' => $scale['grade_point'],
                'description' => null,
                'status' => 1,
            ]);
        }


        foreach ($postrnScales as $scale) {
            GradingScale::create([
                'created_by' => 1,
                'created_at' => $now,
                'last_updated_by' => null,
                'gradingType_id' => $postrn->id, // 👈 dynamic foreign key
                'name' => $scale['name'],
                'percentage_from' => $scale['percentage_from'],
                'percentage_to' => $scale['percentage_to'],
                'grade_point' => $scale['grade_point'],
                'description' => null,
                'status' => 1,
            ]);
        }

    }
}
