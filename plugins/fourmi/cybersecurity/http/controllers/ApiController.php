<?php
namespace Fourmi\CyberSecurity\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Fourmi\CyberSecurity\Models\Country;
use Fourmi\CyberSecurity\Models\Dimension;
use RainLab\Translate\Models\Message;
use Response;
use Excel;

class ApiController extends Controller
{

    public function all($locale)
    {

            $response = [
                'countries' => [],
                'dimensions' => [],
            ];
            $statusCode = 200;


            $countries = Country::with('maturity_levels')->get();

            foreach($countries as $country){
                $country->translateContext($locale);
                $data = [
                  'id' => $country->id,
                  'code' => $country->code,
                  'name' => $country->name,
                  'excerpt' => $country->excerpt,
                  'description' => $country->description,
                  'population' => $country->population,
                  'people_with_internet' => $country->people_with_internet,
                  'mobile_phone_subscriptions' => $country->people_with_mobile_phone
                ];
                foreach($country->maturity_levels as $ml)
                  $data['maturity_levels'][$ml->indicator_id] = $ml->level;

                $response['countries'][] = $data;

            }

            $dimensions = Dimension::with('factors.indicators')->get();


            foreach($dimensions as $dimension){
                $dimension->translateContext($locale);

                $data = [
                    'id' => $dimension->id,
                    'name' => $dimension->name,
                    'title' => $dimension->title
                ];
                foreach($dimension->factors as $factor){
                    $factor->translateContext($locale);

                    $data_f = [
                        'id' => $factor->id,
                        'code' => $factor->code,
                        'title' => $factor->title,
                        'description' => $factor->description
                    ];
                    foreach($factor->indicators as $indicator){
                        $indicator->translateContext($locale);

                        $data_f['indicators'][] = [
                            'id' => $indicator->id,
                            'title' => $indicator->title,
                            'maturity_level1_text' => $indicator->maturity_level1_text,
                            'maturity_level2_text' => $indicator->maturity_level2_text,
                            'maturity_level3_text' => $indicator->maturity_level3_text,
                            'maturity_level4_text' => $indicator->maturity_level4_text,
                            'maturity_level5_text' => $indicator->maturity_level5_text,
                        ];

                    }
                    $data['factors'][] = $data_f;
                }
                $response['dimensions'][] = $data;
            }

            return Response::json($response, $statusCode);

    }



    public function excel($locale, $countries, $dimensions)
    {
      $dimensions = explode('-', $dimensions);
      $dimensions = Dimension::whereIn('id', $dimensions)->with('factors.indicators')->get();
      $countries = explode('-', $countries);
      $countries = Country::whereIn('code', $countries)->with('maturity_levels')->get();

      $countries_array = [];
      foreach($countries as $country){
          $data = [
            'id' => $country->id,
            'code' => $country->code,
            'name' => $country->name,
          ];
          foreach($country->maturity_levels as $ml)
            $data['maturity_levels'][$ml->indicator_id] = $ml->level;

          $countries_array[] = $data;
      }
      $countries = $countries_array;


      Excel::create('CiberSeguridad', function($excel) use($locale,$dimensions, $countries) {
          $excel->sheet('Dimensiones', function($sheet) use($locale,$dimensions, $countries) {
              $sheet->setStyle(array(
                  'border' => array(
                      'color'      =>  array('rgb' => 'FF0000')
                  )
              ));
              $sheet->loadView('fourmi.cybersecurity::excel', array(
                'locale' => $locale,
                'dimensions' => $dimensions,
                'countries' => $countries
              ));
          });

      })->export('xls');

    }



}
