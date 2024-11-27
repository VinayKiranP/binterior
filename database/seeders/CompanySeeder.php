<?php

namespace Database\Seeders;

use App\Models\Company;
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

        $companies =  [
            [
                'name' => 'B Interior',
                'address' => '8, 5th Cross Rd, D Group Employees Layout, Lingadeeranhalli, Bengaluru, Karnataka 560091',
                'telp' => '+91 8217258093',
                'email' => 'info@binterior.in',
                'description' => 'At B Interior Design, we believe that interiors are more than just spaces they are reflections of your personality, style, and vision.',
                'logo' => 'image_default.png',
            ]
        ];

        foreach($companies as $company){
            Company::create($company);
        } 
    }
}
