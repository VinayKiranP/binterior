<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =  [
            [
                'type_interior_id' => 1,
                'name' => 'Modern',
                'image' => 'modern.jpg',
                'description' => 'Modern Interior',
            ],
            [
                'type_interior_id' => 2,
                'name' => 'Italian Kitchen',
                'image' => 'minimalis.jpg',
                'description' => 'Italian Kitchen Interior',
            ],
            [
                'type_interior_id' => 3,
                'name' => 'Living Area',
                'image' => 'scandinavian.jpg',
                'description' => 'Living Area Interior',
            ],
            [
                'type_interior_id' => 4,
                'name' => 'Asian',
                'image' => 'asian.jpg',
                'description' => 'Asian Interior',
            ],
            [
                'type_interior_id' => 5,
                'name' => 'Luxury',
                'image' => 'luxury.jpg',
                'description' => 'Luxury Interior',
            ],
            [
                'type_interior_id' => 6,
                'name' => 'Industrial',
                'image' => 'industrial.jpg',
                'description' => 'Industrial Interior',
            ],
           
        ];

        foreach($types as $type){
            Portfolio::create($type);
        } 
    }
}
