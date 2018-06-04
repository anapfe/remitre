<?php

use Illuminate\Database\Seeder;
use \App\Brand;

class BrandsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $brands = [
      1 => 'Ariston',
      2 => 'Philips',
      3 => 'Oster',
      4 => 'Longvie',
      5 => 'Samsung',
      6 => 'LG',
      7 => 'General Electric',
      8 => 'Sigma',
      9 => 'Whirlpool',
      10 => 'Eslabon de Lujo',
      11 => 'Drean',
      12 => 'Candy',
      13 => 'Coventry',
      14 => 'Siemens',
      15 => 'Bosch',
      16 => 'Electrolux',
      17 => 'Eskabe',
      18 => 'Orbis',
      19 => 'Domec',
      20 => 'Robertshaw',
      21 => 'Escorial',
      22 => 'Spar',
      23 => 'Liliana',
      24 => 'Atma',
      25 => 'Kenwood',
      26 => 'Arno',
      27 => 'Braun',
      28 => 'Gafa',
      29 => 'Mabe',
      30 => 'Patrick',
      31 => 'Sanyo',
      32 => 'Ultracomb',
      33 => 'Yelmo',
      34 => 'Value',
      35 => 'Bluestar',
      36 => 'Columbia',
      37 => 'Kohinoor',
      38 => 'Moulinex',
      39 => 'Delonghi',
      40 => 'Hoover',
      41 => 'Einhell'
    ];

    foreach ($brands as $brand => $name) {
      $brands = Brand::create([
        "name" => $name
      ]);
    }
  }
}
