<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccupantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Occupant::create([
            'name' => 'Fadhil',
            'gender' => 'Pria',
            'birth_place' => 'Tanjung Balai Karimun',
            'birth_date' => '1997-12-29',
            'origin_place' => 'Tanjung Balai Karimun',
            'education' => 'Graduated from Politeknik Negeri Batam',
            'occupation' => 'Programmer at PT. Tigernix Solutions Indonesia',
            'phone_number' => '0812-6619-0787'
        ]);
    }
}
