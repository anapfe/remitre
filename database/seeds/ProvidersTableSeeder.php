<?php

use Illuminate\Database\Seeder;
use \App\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = [
          1 => ['Deyce SRL', 'Alvarez Jonte 3639, CABA', '1407', '4566-3057', 'info@distribuidoradc.com.ar', '30-70944630-0', '9 a 13 / 14 a 17:30', '4' ]
        ];
        foreach($providers as $provider => $props) {
          $provider = Provider::create([
            "name" => $props[0],
            'address' => $props[1],
            'cp' => $props[2],
            'phone' => $props[3],
            'email' => $props[4],
            'cuit' => $props[5],
            'open' => $props[6],
            'tax_condition_id' => $props[7]
          ]);
        }
    }
}
