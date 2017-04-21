<?php

use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ['id'=>1, 'user_id'=>'1', 'firstname'=>'Jonas', 'lastname'=>'Jonaitis', 'position'=>'Administratorius', 'email'=>'sbadmin@sbadmin.lt', 'phone'=>'Nėra', 'birthday'=>'2017-04-05', 'photo'=>'img.jpg',],
        ];

        foreach ($seeds as $seed) {
            \App\Profile::create($seed);
        }
    }
}
