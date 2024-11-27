<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users =  [
            [
                'name' => 'B Interior',
                'email' => 'info@binterior.in',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765'
            ],
           
        ];

        foreach($users as $user){
            User::create($user);
        } 
       
    }
}
