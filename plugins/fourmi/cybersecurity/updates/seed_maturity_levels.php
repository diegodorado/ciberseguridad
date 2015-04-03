<?php namespace Fourmi\CyberSecurity\Updates;

use Fourmi\CyberSecurity\Models\Country;
use Fourmi\CyberSecurity\Models\Indicator;
use Fourmi\CyberSecurity\Models\MaturityLevel;

use October\Rain\Database\Updates\Seeder;

class SeedMaturityLevels extends Seeder
{

    public function run()
    {

      $country_ids = Country::lists('id');
      $indicator_ids = Indicator::lists('id');

      foreach ($country_ids as $c_id) {
        foreach ($indicator_ids as $i_id) {
          MaturityLevel::create(['country_id' => $c_id, 'indicator_id' => $i_id, 'level' =>rand(1, 5)]);
        }
      }



    }

}
