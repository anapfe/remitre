<?php

use Illuminate\Database\Seeder;
use \App\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
          1 => ['Licuadoras', 2],
          2 => ['Cafeteras', 2],
          3 => ['Ventiladores', 1],
          4 => ['Aspiradoras', 2],
          5 => ['Heladeras', 5],
          6 => ['Lavarropas', 3],
          7 => ['Secarropas', 3],
          8 => ['Procesadoras', 2],
          9 => ['Hornos Eléctricos', 4],
          10 => ['Cocinas/Anafes', 4],
          11 => ['Estufas', 1],
          12 => ['Calefones', 1],
          13 => ['Termotanques', 1],
          14 => ['Purificadores', 4],
          15 => ['Lustradoras', 2],
          16 => ['Barrealfombras', 2],
          17 => ['Microondas', 2],
          18 => ['Acondicionadores de Aire', 1],
          19 => ['Freezers', 5]
        ];
        foreach ($subcategories as $subcategory => $props) {
          $subcategory = Subcategory::create([
            "name" => $props[0],
            "category_id" => $props[1]
          ]);
        }
    }
}
