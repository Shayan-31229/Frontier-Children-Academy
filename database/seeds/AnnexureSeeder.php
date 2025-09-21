<?php

use Illuminate\Database\Seeder;

class AnnexureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annexures')->insert([
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'University Registration Form & Offer Letter',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'College Registration Fee Receipt',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Matric Marksheet & Certificate',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'FA/FSC Marksheet & Certificate',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Graduation Marksheet',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Post Graduation Marksheet',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Special-Category Certificate',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Migration Certificate',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Character Certificate',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Passport Size Photographs',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'CNIC/B-Form',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Domicile Certificate',
                'default'  => 0,
                'status' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Other',
                'default'  => 0,
                'status' => 1
            ]
        ]);
    }
}



