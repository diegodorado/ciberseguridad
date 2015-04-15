<?php namespace Fourmi\CyberSecurity\Components;

use Cms\Classes\ComponentBase;
use Fourmi\CyberSecurity\Models\Dimension;
use Fourmi\CyberSecurity\Models\Country;


class LiveReport extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'LiveReport Component',
            'description' => 'A Cyber Security Report'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        // This code will be executed when the page or layout is
        // loaded and the component is attached to it.

        $this->dimensions = Dimension::all();
        $this->countries = Country::all();
        $this->locale = \RainLab\Translate\Classes\Translator::instance()->getLocale(true);



    }

}
