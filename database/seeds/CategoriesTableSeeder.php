<?php

use Illuminate\Database\Seeder;
use \App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          1 => 'Climatización',
          2 => 'Pequeños Electrodomésticos',
          3 => 'Lavado y Secado',
          4 => 'Cocina',
          5 => 'Refrigeración',
        ];

        foreach ($categories as $category => $name) {
          $category = Category::create([
            "name" => $name
          ]);
        }
    }
}
