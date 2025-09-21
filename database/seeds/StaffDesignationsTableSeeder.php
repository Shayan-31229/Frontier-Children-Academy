<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StaffDesignationsTableSeeder extends Seeder
{
    public function run()
    {
        $designations = [
            'Principal',
            'Vice Principal',
            'Head of Department',
            'Lecturer',
            'Assistant Lecturer',
            'Lab Assistant',
            'Clerk',
            'Peon',
            'Security Guard',
        ];

        foreach ($designations as $title) {
            DB::table('staff_designations')->insert([
                'created_at' => Carbon::now(),
                'created_by' => 1,
                'title'      => $title,
                'status'     => 1,
            ]);
        }


            $timestamp = Carbon::now();

            $purposes = [
            'Admission Inquiry',
            'Complaint',
            'Delivery',
            'Job Application',
            'Guest Lecturer',
            'Facility Inspection',
            'Maintenance',
            'Parent Visit',
        ];

        $data = [];

        foreach ($purposes as $title) {
            $data[] = [
                'title' => $title,
                'status' => 1,
                'created_by' => 1,
                'last_updated_by' => null,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        DB::table('visitor_purposes')->insert($data);

        $batches = [
            '2023',
            '2024',
            '2025',
        ];

        $data = [];

        foreach ($batches as $year) {
            $data[] = [
                'title' => $year,
                'active_status' => $year === '2025' ? 1 : 0,
                'status' => 1,
                'created_by' => 1,
                'last_updated_by' => null,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        DB::table('student_batches')->insert($data);


    }
}