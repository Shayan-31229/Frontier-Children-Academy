<?php

use Illuminate\Database\Seeder;

class DomicileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $districts = [
            'Abbottabad',
            'Bajaur',
            'Bannu',
            'Battagram',
            'Buner',
            'Charsadda',
            'Chitral Lower',
            'Chitral Upper',
            'Dera Ismail Khan',
            'Hangu',
            'Haripur',
            'Karak',
            'Khyber',
            'Kohat',
            'Kohistan Lower',
            'Kohistan Upper',
            'Kolai-Palas',
            'Kurram',
            'Lakki Marwat',
            'Lower Dir',
            'Malakand',
            'Mansehra',
            'Mardan',
            'Mohmand',
            'Nowshera',
            'Orakzai',
            'Peshawar',
            'Shangla',
            'Swabi',
            'Swat',
            'Tank',
            'Torghar',
            'Upper Dir',
            'North Waziristan',
            'South Waziristan'
        ];

        foreach ($districts as $district) {
            DB::table('domiciles')->insert([
                'district' => $district,
            ]);
        }
    }
}
