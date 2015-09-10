<?php
namespace Fourmi\CyberSecurity\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Fourmi\CyberSecurity\Models\Country;
use Fourmi\CyberSecurity\Models\Dimension;
use RainLab\Translate\Models\Message;
use Response;

class ApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('fourmi.cybersecurity::welcome');
    }

    public function countries()
    {
//        try{

            $response = [
                'countries' => []
            ];
            $statusCode = 200;

            $locale = \RainLab\Translate\Classes\Translator::instance()->getLocale(true);

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
                  'people_with_broadband' => $country->people_with_broadband,
                  'people_with_mobile_phone' => $country->people_with_mobile_phone
                ];
                foreach($country->maturity_levels as $ml)
                  $data['maturity_levels'][$ml->indicator_id] = $ml->level;

                $response['$countries'][] = $data;

            }


/*
        }catch (Exception $e){
            $statusCode = 404;
        }finally{*/
            return Response::json($response, $statusCode);
//        }
    }

    public function all($locale)
    {
//        try{

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
                  'people_with_broadband' => $country->people_with_broadband,
                  'people_with_mobile_phone' => $country->people_with_mobile_phone
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
                        'title' => $factor->title
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


    public function changeLocale($locale)
    {
        //try{

            $response = [];
            $statusCode = 200;

            \RainLab\Translate\Classes\Translator::instance()->setLocale($locale);
            $response['locale'] = \RainLab\Translate\Classes\Translator::instance()->getLocale(true);

        //}catch (Exception $e){
        //    $statusCode = 404;
        //}finally{
            return Response::json($response, $statusCode);
        //}
    }

    public function messages(Request $request)
    {
        $lang = $request->input('lang');
        $response = [];
        $statusCode = 200;

        $messages = Message::all();
        foreach($messages as $message){
          if (array_key_exists($lang, $message->message_data)) {
            $response[$message->code] = $message->message_data[$lang];
          }else{
            $response[$message->code] = $message->message_data['x'];
          }
        }

        $response = Cms\Classes\Theme::getActiveTheme();

        return Response::json($response, $statusCode);
    }


}
