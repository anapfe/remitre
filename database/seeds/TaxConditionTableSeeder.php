<?php

use Illuminate\Database\Seeder;
use \App\TaxCondition;

class TaxConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxConditions = [
          1 => ['Consumidor Final', '21', '0'],
          2 => ['Exento', '0', '50'],
          3 => ['Monostributo', '21', '50'],
          4 => ['Responsable Inscripto','21', '50']
        ];
        foreach ($taxConditions as $taxCondition => $props) {
          $taxCondition = TaxCondition::create([
            "name" => $props[0],
            "iva" => $props[1],
            "discount" => $props[2]
          ]);
        }
    }
}
