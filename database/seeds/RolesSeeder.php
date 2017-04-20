<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ['id'=>1, 'title'=>'Administratorius',],
            ['id'=>2, 'title'=>'Vadybininkas',],
            ['id'=>3, 'title'=>'Darbuotojas',],
        ];

        foreach ($seeds as $seed) {
            \App\Role::create($seed);
        }
    }
}
