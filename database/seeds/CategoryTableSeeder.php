<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Carretera',
                'slug' => 'carretera',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, perferendis!',
                'color' => '#440022'
            ],
            [
                'name' => 'Muntanya',
                'slug' => 'mtb',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, perferendis!',
                'color' => '#445500'
            ]
        );
        Category::insert($data);
    }
}
