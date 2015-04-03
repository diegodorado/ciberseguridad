<?php namespace Fourmi\CyberSecurity\Updates;

use Fourmi\CyberSecurity\Models\Country;
use October\Rain\Database\Updates\Seeder;

class SeedCountries extends Seeder
{

    public function run()
    {

      Country::create(['id' => '1', 'name' => 'Antigua y Barbuda']);
      Country::create(['id' => '2', 'name' => 'Argentina']);
      Country::create(['id' => '3', 'name' => 'Bahamas']);
      Country::create(['id' => '4', 'name' => 'Barbados']);
      Country::create(['id' => '5', 'name' => 'Belize']);
      Country::create(['id' => '6', 'name' => 'Bolivia']);
      Country::create(['id' => '7', 'name' => 'Brasil']);
      Country::create(['id' => '8', 'name' => 'Chile']);
      Country::create(['id' => '9', 'name' => 'Colombia']);
      Country::create(['id' => '10', 'name' => 'Costa Rica']);
      Country::create(['id' => '11', 'name' => 'Dominica']);
      Country::create(['id' => '12', 'name' => 'Ecuador']);
      Country::create(['id' => '13', 'name' => 'El Salvador']);
      Country::create(['id' => '14', 'name' => 'Grenada']);
      Country::create(['id' => '15', 'name' => 'Guatemala']);
      Country::create(['id' => '16', 'name' => 'Guyana']);
      Country::create(['id' => '17', 'name' => 'Haití']);
      Country::create(['id' => '18', 'name' => 'Honduras']);
      Country::create(['id' => '19', 'name' => 'Jamaica']);
      Country::create(['id' => '20', 'name' => 'México']);
      Country::create(['id' => '21', 'name' => 'Nicaragua']);
      Country::create(['id' => '22', 'name' => 'Panamá']);
      Country::create(['id' => '23', 'name' => 'Paraguay']);
      Country::create(['id' => '24', 'name' => 'Perú']);
      Country::create(['id' => '25', 'name' => 'República Dominicana']);
      Country::create(['id' => '26', 'name' => 'Saint Kitts y Nevis']);
      Country::create(['id' => '27', 'name' => 'San Vicente y las Granadinas']);
      Country::create(['id' => '28', 'name' => 'Santa Lucía']);
      Country::create(['id' => '29', 'name' => 'Suriname']);
      Country::create(['id' => '30', 'name' => 'Trinidad y Tobago']);
      Country::create(['id' => '31', 'name' => 'Uruguay']);
      Country::create(['id' => '32', 'name' => 'Venezuela']);


    }

}
