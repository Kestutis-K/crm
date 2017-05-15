<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'id'=>1,
                'title'=>'Įmonės pavadinimas',
                'comp_id'=>'Įmonės kodas',
                'comp_vat'=>'PVM kodas',
                'address'=>'Adresas',
                'country'=>'Lietuva',
                'postcode'=>'Pašto kodas',
                'register_nr'=>"Registracijos numeris",
                'email'=>'El. pašto adresas',
                'phone'=>'Telefonas',
                'fax'=>'Faksas',
                'mob_phone'=>'Mobilusis telefonas',
                'website'=>'Internetinis puslapis',
                'logo'=>'logo.png',
                'prices_vat'=>'1',
                'vat'=>'21',
            ],
        ];

        foreach ($seeds as $seed) {
            \App\Company::create($seed);
        }
    }
}
