<?php
namespace Fourmi\CyberSecurity\Http\Controllers;
use Illuminate\Routing\Controller;
use Fourmi\CyberSecurity\Models\Country;
use Fourmi\CyberSecurity\Models\Dimension;
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

            $countries = Country::all();
            $locale = \RainLab\Translate\Classes\Translator::instance()->getLocale(true);


            foreach($countries as $country){
                $country->translateContext($locale);

                $response['countries'][] = [
                    'id' => $country->id,
                    'name' => $country->name
                ];

            }

/*
        }catch (Exception $e){
            $statusCode = 404;
        }finally{*/
            return Response::json($response, $statusCode);
//        }
    }

    public function all()
    {
//        try{

            $response = [
                'countries' => [],
                'dimensions' => [],
                'locale' => ''
            ];
            $statusCode = 200;

            $countries = Country::all();
            $locale = \RainLab\Translate\Classes\Translator::instance()->getLocale(true);
            $response['locale'] = $locale;


            foreach($countries as $country){
                $country->translateContext($locale);

                $response['countries'][] = [
                    'id' => $country->id,
                    'name' => $country->name
                ];

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
                            'title' => $indicator->title
                        ];
                    }
                    $data['factors'][] = $data_f;
                }
                $response['dimensions'][] = $data;
            }



//        }catch (Exception $e){
//            $statusCode = 404;
//        }finally{
            return Response::json($response, $statusCode);
//        }
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



}
