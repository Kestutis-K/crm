<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
                'email'=>'sbadmin@sbadmin.lt',
                'password'=>'$2y$10$uuzJR6kqNYEZ4SP0S8Jg1OTI0Q3xJqMuN/7D7q9Ze3r7QcyrZdwMK',
                'role_id'=>'1',
                'remember_token' => '',
                'is_active'=>'1',
            ],
        ];

        foreach ($seeds as $seed) {
            \App\User::create($seed);
        }
    }
}
