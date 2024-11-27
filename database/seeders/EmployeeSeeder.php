<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $employees =  [
            [
                'name' => 'Architect A',
                'email' => 'architect1@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765',
                'isAdmin' => false
            ],
            [
                'name' => 'Architect B',
                'email' => 'architect2@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765',
                'isAdmin' => false
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number'  => '089765456765',
                'isAdmin' => true
            ],
           
        ];

        foreach($employees as $employee){
            Employee::create($employee);
        } 
       
    }
}
