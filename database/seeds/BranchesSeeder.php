<?php

use Illuminate\Database\Seeder;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert(
            [
                'created_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'title' => 'Frontier Children\'s Academy',
                'address' => 'Hayatabad, Peshawar',
                'contact_no' => '091-5812069, 5813344',
                'email' => 'info@fca.edu.pk',
                'code' => 'fca',
                'mask' => 'FCA',
                'status' => 1
            ]);
    }
}
